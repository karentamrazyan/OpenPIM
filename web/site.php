<?php
class Site {

  public static $name = 'OpenPIM';
  public static $url = 'http://www.openpim.org/';

  public static $email_admin = 'admin@example.com';
  public static $email_postmaster = 'noreply@example.com';

  public static $request = '';
  public static $args = array();
  public static $headers = array();
  public static $content = '';
  public static $showads = false;

  public static $meta_title = 'OpenPIM: Open Source Personal Information Management'; // Maximum 70 symbols for Google
  public static $meta_description = 'A one stop shop to manage your personal information like tasks, bookmarks, contacts and addresses.'; // Maximum 150???????
  public static $meta_keywords = 'todo,tasks,calendar,contacts,bookmarks'; // Maximum 1024???????
  public static $meta_robots = 'index,follow';

  public static function redirect($destination) {
    header( "HTTP/1.1 301 Moved Permanently" );
    header( "Location: $destination" );
    die("Page moved permanently to $destination");
  }

  public static function redirectTemp($destination) {
    header( "Location: $destination" );
    die("Page moved temporarily to $destination");
  }

  public static function notFound() {
    header("HTTP/1.1 404 Not Found");
    die("<!DOCTYPE HTML PUBLIC \"-//IETF//DTD HTML 2.0//EN\">\n<html><head>\n<title>404 Not Found</title>\n</head><body>\n<h1>Not Found</h1>\n<p>The requested URL {$_SERVER["REQUEST_URI"]} was not found on this server.</p>\n</body></html>\n");
  }

  public static function head() {
    self::$content = '<!DOCTYPE html
     PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
     "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>'.self::$meta_title.'</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Description" content="'.self::$meta_description.'" />
<meta name="Keywords" content="'.self::$meta_keywords.'" />
<meta name="Robots" content="'.self::$meta_robots.'" />
</head>
<body>
';
  }

  public static function foot() {
    self::$content .= '
<p>&copy; 2009 <a href="http://www.openpim.org/">OpenPIM</a> &bull; <a href="/terms">Terms of Use</a> &bull; <a href="/privacy">Privacy Policy</a> &bull; <a href="/about">About</a> &bull; <a href="/contact" rel="nofollow">Contact</a></p>
<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-2783203-20");
pageTracker._trackPageview();
} catch(err) {}</script>
</body>
</html>
';
  }

  public static function output() {
    foreach (self::$headers as $header) {
      header($header);
    }
    print(self::$content);
  }
}
?>
