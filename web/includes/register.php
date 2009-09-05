<?php

if (count(Site::$args) != 1) Site::notFound();

if (!session_id()) session_start();

$content = '';
$error_message = '';
$prev_form_user = '';
$prev_form_email = '';
$mail_sent = '';

if (isset($_POST['submit']) && !isset($_SESSION['user'])) {

// TODO: Protect from injections
// TODO: More checks
// TODO: Check if username or email is already registered.

  if (isset($_POST['username'])) {
    if ($_POST['username']) {
      $prev_form_user = "value=\"{$_POST['username']}\" ";
    } else $error_message .= '<br />&bull; <b>Username</b> is empty';
  } else $error_message .= '<br />&bull; <b>Username</b> is missing';

  if (isset($_POST['email'])) {
    if ($_POST['email']) {
      $prev_form_email = "value=\"{$_POST['email']}\" ";
    } else $error_message .= '<br />&bull; <b>Email</b> is empty';
  } else $error_message .= '<br />&bull; <b>Email</b> is missing';

  if (isset($_POST['password']) && isset($_POST['repeat'])) {
    if ($_POST['password'] && $_POST['repeat']) {
      if ($_POST['password'] == $_POST['repeat']) {
        // Do nothing
      } else $error_message .= '<br />&bull; <b>Passwords</b> do not match';
    } else $error_message .= '<br />&bull; One or both <b>passwords</b> are empty';
  } else $error_message .= '<br />&bull; One or both <b>passwords</b> are missing';

  if (!$error_message) {
    $username = $_POST['username'];
    //$path = strtolower($username);

    //$tbl = Database::$name_main_db.'.users';
    $user_exists = mysql_fetch_assoc(Database::query("SELECT * FROM users WHERE name = '$username'"));

    if ($user_exists) {
      $error_message .= '<br />&bull; User <b>'.$user_exists["name"].'</b> already exists, choose another username';
    } else {
      $password = md5($_POST['password']);
      $email = $_POST['email'];
      $confirm = substr(md5($username.$email),0,16);
      //$entry = Site::$magicstr;

      //$tbl = Database::$name_main_db.'.users_temp';
      //$user_temp_exists = mysql_fetch_assoc(Database::query("SELECT * FROM $tbl WHERE path = '$path'"));

      //if ($user_temp_exists) {
        //$id_old = $user_temp_exists['uid'];
        //Database::query("UPDATE $tbl SET name = '$username', pass = '$password', confirm = '$confirm', path = '$path', mail = '$email', entry = '$entry', created = UNIX_TIMESTAMP() WHERE uid = '$id_old'");
      //} else {
        Database::query("INSERT INTO users (name,pass,confirm,mail,created) VALUES ('$username','$password','$confirm','$email',UNIX_TIMESTAMP())");
      //}

      $sitename = Site::$name;
      $siteurl = Site::$url;
      mail($email, 'Account activation at '.$sitename, "Dear Sir/Madam,\n\nThis email address has been used to register an account at $sitename.\nIf you don't know anything about this, you can simply ignore and delete this mail.\nIf you have registered an account at $sitename, you can activate it by clicking the link below.\n\nYour username: $username\n\nActivation link: {$siteurl}activate/$confirm\n\nThanks for registering,\n\n\nThe $sitename staff\n$siteurl", 'From: '.Site::$name.' <'.Site::$email_postmaster.'>');
      $mail_sent = 'yes!';
    }
  }
}

if ($mail_sent) {
$content .= '<h1>Registered succesfully</h1>
<p>Your account has been registered successfully. Now please <b>activate</b> your account by <b>checking your email</b> and <b>following the activation</b> link.</p>
<br />';
} elseif (isset($_SESSION['user'])) {

$content .= '
<h1>Register</h1>
<p>You are already registered and logged in as <b>'.$_SESSION['user'].'</b>. You need to <a href="/logout">logout</a> first to register a new account.</p>';


} else {

$content .= '
<h1>Register</h1>
<p>Please complete the form below to register an account.</p>
<br />';

if ($error_message) $content .= '
<div style="background-color: #fcc; border: 1px solid #d77; color: #c52020; margin-bottom: 16px;"><p style="padding: 0 10px;">The registration CANNOT be accepted, because the following errors have occurred:<br />'.$error_message.'<br /><br />Please correct the mistakes and try again.</p></div>';

$content .= '
<form name="reg_form" action="/register" method="post">
<table border="0" cellspasing="0" cellpadding="0" width="100%">
<tr>
<td width="255" valign="top"><b>Username:</b><br /><span style="font-size:smaller;">Allowed: <b>A-Z</b>, <b>a-z</b>, <b>0-9</b> and <b>-</b></span></td>
<td><input type="text" name="username" maxlength="20" '.$prev_form_user.'/></td>
</tr>
<tr>
<td width="255"><b>Email:</b></td>
<td><input type="text" name="email" maxlength="64" '.$prev_form_email.'/></td>
</tr>
<tr>
<td width="255"><b>Password:</b></td>
<td><input type="password" name="password" maxlength="32" /></td>
</tr>
<tr>
<td width="255"><b>Retype password:</b></td>
<td><input type="password" name="repeat" maxlength="32" /></td>
</tr>
</table>
<br />
<p><input type="submit" name="submit" value="Register"></p>
</form>
';

}

// Output
Site::head();
Site::$content .= $content;
Site::foot();

?>
