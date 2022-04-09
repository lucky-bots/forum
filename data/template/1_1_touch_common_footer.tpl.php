<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
<?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?><?php $useragent = strtolower($_SERVER['HTTP_USER_AGENT']);$clienturl = ''?><?php if(strpos($useragent, 'iphone') !== false || strpos($useragent, 'ios') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=ios' : '';?><?php } elseif(strpos($useragent, 'android') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=android' : '';?><?php } elseif(strpos($useragent, 'windows phone') !== false) { $clienturl = $_G['cache']['mobileoem_data']['iframeUrl'] ? $_G['cache']['mobileoem_data']['iframeUrl'].'&platform=windowsphone' : '';?><?php } ?>

<div id="mask" style="display:none;"></div>
<?php if(!$nofooter) { ?>
<div class="footer">
<div>
<?php if(!$_G['uid'] && !$_G['connectguest']) { ?>
<a href="forum.php">หน้าแรก</a> | <a href="member.php?mod=logging&amp;action=login" title="ลงชื่อเข้าใช้">ลงชื่อเข้าใช้</a> | <a href="<?php if($_G['setting']['regstatus']) { ?>member.php?mod=<?php echo $_G['setting']['regname'];?><?php } else { ?>javascript:;" style="color:#D7D7D7;<?php } ?>" title="<?php echo $_G['setting']['reglinkname'];?>">สมัครสมาชิก</a>
<?php } else { ?>
<a href="home.php?mod=space&amp;uid=<?php echo $_G['uid'];?>&amp;do=profile&amp;mycenter=1"><?php echo $_G['member']['username'];?></a> , <a href="member.php?mod=logging&amp;action=logout&amp;formhash=<?php echo FORMHASH;?>" title="ออกจากระบบ" class="dialog">ออกจากระบบ</a>
<?php } ?>
</div>
    <div>
<a href="<?php echo $_G['setting']['mobile']['simpletypeurl']['0'];?>">รูปแบบทั่วไป</a> |  
<a href="javascript:;" style="color:#D7D7D7;">รูปแบบโมเดิร์น</a> | 
<a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>">รูปแบบคอมพิวเตอร์</a> | 
<?php if($clienturl) { ?><a href="<?php echo $clienturl;?>">แอพพลิเคชั่นสำหรับอุปกรณ์พกพา</a><?php } ?>
    </div>
<p>&copy; Comsenz Inc.</p>
</div>
<?php } ?>
</body>
</html><?php updatesession();?><?php if(defined('IN_MOBILE')) { output();?><?php } else { output_preview();?><?php } ?>
