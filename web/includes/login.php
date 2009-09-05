<?php

if (count(Site::$args) != 1) Site::notFound();

if (!session_id()) session_start();

$content = '';

if (isset($_POST['form_login']) && isset($_POST['username']) && isset($_POST['password'])) {
  $username = mysql_real_escape_string($_POST['username']);
  $password = md5(mysql_real_escape_string($_POST['password']));
  //$tbl = Database::$name_main_db.'.users';
  $user = mysql_fetch_assoc(Database::query("SELECT * FROM users WHERE name = '$username' AND pass = '$password' LIMIT 1"));
  if ($user) {
    $_SESSION['user'] = $user['name'];  
    $_SESSION['uid'] = $user['uid'];  
  }
}

/*
if (isset($_POST['form_logout'])) {
  session_unset();
  //session_destroy();
  $_SESSION = array();
}
*/

$url = Site::$request;

if (isset($_SESSION['user'])) {
  $content .= '
<h1>User login</h1>
<p>You are logged in as <b>'.$_SESSION['user'].'</b>.</p>
<p>From here you can manage your:</p>
<ul>
<li><a href="/tasks">Tasks</a></li>
</ul>
<p>or <a href="/logout">logout</a>.</p>';
} else {
  $content .= '
<h1>User login</h1>
<form name="form_login" method="post" action="'.$url.'">
<table border="0">
<tr><td>Username:</td><td><input type="text" name="username" maxlength="20" /></td></tr>
<tr><td>Password:</td><td><input type="password" name="password" maxlength="32" /></td></tr>
</table>
<p><input type="submit" name="form_login" value="Submit" /></p>
</form>';
}


// Output
Site::head();
Site::$content .= $content;
Site::foot();

?>
