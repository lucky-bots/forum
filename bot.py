from flask import Flask, request, abort
from linebot import LineBotApi, WebhookHandler
from linebot.exceptions import InvalidSignatureError
from linebot.models import MessageEvent, TextMessage, TextSendMessage
import random
import os
from googletrans import Translator

import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password=""
)

app = Flask(__name__)

# MySQL configurations
app.config['MYSQL_DATABASE_HOST'] = os.environ.get('DB_HOST')
app.config['MYSQL_DATABASE_PORT'] = 3306
app.config['MYSQL_DATABASE_USER'] = os.environ.get('DB_USER')
app.config['MYSQL_DATABASE_PASSWORD'] = os.environ.get('DB_PASSWORD')
app.config['MYSQL_DATABASE_DB'] = os.environ.get('DB_SCHEMA')
mysql.init_app(app)

CHANNEL_ACCESS_TOKEN = os.environ.get('CHANNEL_ACCESS_TOKEN')
CHANNEL_SECRET = os.environ.get('CHANNEL_SECRET')

line_bot_api = LineBotApi(CHANNEL_ACCESS_TOKEN)
handler = WebhookHandler(CHANNEL_SECRET)

@app.route('/')
def hello():
    return 'Hello World!'

@app.route('/webhook', methods=['POST'])
def webhook():
    # get X-Line-Signature header value
    signature = request.headers['X-Line-Signature']

    # get request body as Text
    body = request.get_data(as_text=True)
    app.logger.info('Request body: '+body)

    # handler webhook body
    try:
        handler.handle(body, signature)
    except InvalidSignatureError:
        abort(400)

    return 'OK'

@handler.add(MessageEvent, message=TextMessage)
def handle_message(event):
    conn = mysql.connect()
    c = conn.cursor()

    q = event.message.text.strip(' ')
    print('q=:'+q+':')

    if q.startswith('.'):
        firstSpace = q.find(' ')
        if firstSpace > 0:
            k = q[1:firstSpace]
            if k:
                v = q[firstSpace+1:]
                print('k=:'+k+':')
                print('v=:'+v+':')
                queryString = (k)
                c.execute('SELECT answer FROM chat WHERE question = %s', queryString)
                fname = c.fetchone()
                if fname:
                    queryString = (v, k)
                    c.execute('UPDATE chat SET answer = %s WHERE question = %s', queryString)
                    conn.commit()
                    line_bot_api.reply_message(
                        event.reply_token,
                        TextSendMessage(text='update...OK'))
                else:
                    queryString = (k, v)
                    c.execute('INSERT INTO chat (question, answer) VALUES (%s, %s)', queryString)
                    conn.commit()
                    line_bot_api.reply_message(
                        event.reply_token,
                        TextSendMessage(text='insert...OK'))

    elif q.startswith('('):
        inputWord = q[1:]
        translator = Translator()
        tsl = translator.translate(inputWord, src='th')
        print(tsl.text)
        line_bot_api.reply_message(
            event.reply_token,
            TextSendMessage(text=tsl.text))


    queryString = ('%'+q+'%')
    c.execute('SELECT answer FROM chat WHERE question LIKE %s', queryString)
    a = c.fetchall()
    if a:
        print(a)
        randRow = random.choice(a)
        print(randRow[0])
        line_bot_api.reply_message(
            event.reply_token,
            # TextSendMessage(text=a[0]))
            TextSendMessage(text=randRow[0]))
    else:
        if queryString.find('อับดุล') > -1:
            foo = ['เรียกผมเหรอครับ', 'วาจังดายย', 'อะไรวะ', 'เรียกอยู่ได้', 'ถาหาขาไพ่?', 'Zzzz', 'ครับครับ', 'ย๊างหมอ']
            randAns = random.choice(foo)
            # print(randAns)
            line_bot_api.reply_message(
                event.reply_token,
                TextSendMessage(text=randAns))

    c.close()
    conn.close()

if __name__ == '__main__':
    app.run()
