<?php
class Navigator {

  public static function parseRequest() {
    Site::$request = $_SERVER['REQUEST_URI'];
    Site::$args = explode('/',Site::$request);
    array_shift(Site::$args);
    if (strstr(Site::$args[0],'search?')) Site::$args[0] = "search";
  }

  public static function navigate() {
    self::parseRequest();
    date_default_timezone_set('America/New_York');

    $path = Site::$args[0];
    $page = mysql_fetch_assoc(Database::query("SELECT * FROM pages WHERE path = '$path'"));

    if ($page) {
      require_once "./includes/{$page['file']}";
    } else {
      Site::notFound();
    }
  }

}
?>
