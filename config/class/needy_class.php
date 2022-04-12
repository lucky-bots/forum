<?php

  class N{

    public static $e;
    public static $database;
    public static $DIR = "/";
    public static $GMAIL = "jjhu488@gmail.com";
    public static $GMAIL_PASSWORD = "Aakk0000";

    public static function _DB(){
      try {
        self::$database = new PDO('mysql:host=sql6.freesqldatabase.com;dbname=sql6484665;charset=utf8mb4','sql6484665','HEa8wmPhy8');
        self::$database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $e = self::$e;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
      return self::$database;
    }

  }

?>
