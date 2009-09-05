<?php

if (count(Site::$args) != 2) Site::notFound();

$content = '';
$message = '';
$error_message = '';
$actcode = Site::$args[1];

if (strlen($actcode) != 16) {
   $error_message = '<br />&bull; <b>Wrong activation code</b>';
} else {
  //$tbl = Database::$name_main_db.'.users_temp';
  $code_full = mysql_fetch_assoc(Database::query("SELECT * FROM users WHERE confirm = '$actcode'"));

  if ($code_full) {
    //$tbl = Database::$name_main_db.'.users';
    $uid = $code_full['uid'];
    $username = $code_full['name'];
    $password = $code_full['pass'];
    $email = $code_full['mail'];
    $timestamp = $code_full['created'];
    //$confirm = 'NULL';
    Database::query("UPDATE users SET confirm = NULL WHERE uid = '$uid'");
    //$tbl = Database::$name_main_db.'.users_temp';
    //Database::query("DELETE FROM $tbl WHERE uid = '$uid'");
    $message = "User <b>$username</b> has been activated! You might want to <a href=\"/login\">login</a> now.";
  } else {
    $error_message = '<br />&bull; Your activation code is either <b>wrong or expired</b>';
  }

}

$content .= '
<h1>Activation</h1>
<br />';

if ($error_message) $content .= '
<p style="background-color: #fcc; border: 1px solid #d77; color: #c52020; margin-bottom: 16px;"><p style="padding: 0 10px;">The registration CANNOT be accepted, because the following errors have occurred:<br />'.$error_message.'<br /><br />Please correct the mistakes and try again.</p></p>';
else $content .= '
<p>'.$message.'</p>
';

// Output
Site::head();
Site::$content .= $content;
Site::foot();

?>
