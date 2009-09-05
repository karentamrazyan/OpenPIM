<?php

if (!session_id()) session_start();

$content = '';

if (isset($_POST['form_logout'])) {
  session_unset();
  //session_destroy();
  $_SESSION = array();
}

$url = Site::$request;

if (isset($_SESSION['user'])) {
  $content .= '
<h1>User logout</h1>
<p>You are logged in as <b>'.$_SESSION['user'].'</b>. Do you really want to log out?</p>
<form name="form_logout" method="post" action="/logout">
<p><input type="submit" name="form_logout" value="Logout" /></p>
</form>';
} else {
  $content .= '
<h1>Logout</h1>
<p>You are not logged in. Please, <a href="/login">login</a> or <a href="/register">register</a> in case to use this service.</p>';
}


// Output
Site::head();
Site::$content .= $content;
Site::foot();

?>
