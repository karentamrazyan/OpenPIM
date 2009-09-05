<?php
class Database {

  public static $server = 'localhost';
  public static $username = 'username';
  public static $password = 'password';
  public static $database = 'database';

  public static $link = '';

  public static function init() {
    self::$link = mysql_connect(self::$server, self::$username, self::$password);
    mysql_set_charset('utf8');
    mysql_select_db(self::$database);
  }

  public static function query($query) {
    if (self::$link == '') self::init();
    $result = mysql_query($query);
    if ($result) return $result;
    else die('Invalid query: ' . mysql_error());
  }
}
?>
