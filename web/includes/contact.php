<?php

if (count(Site::$args) != 1) Site::notFound();

$cnt = '';
$p_name = '';
$p_email = '';
$p_message = '';
Site::$meta_title = 'Contact '.Site::$name;
Site::$meta_robots = 'noindex,nofollow,noarchive';

if (count($_POST) > 0) {
  $err_detected = false;
  $err_text = '<p><font color="red"><b>ERROR</b></font>: Your message CANNOT be submitted, because the following errors have occurred:</p><ul>';
  $secret_pre = md5(date('YmdH',mktime(0,0,date("H")-1,date("m"),date("d"),date("Y"))));
  $secret = md5(date('YmdH'));
  if (trim($_POST['name']) == '') {
    $err_detected = true;
    $err_text .= '<li><b>Name</b> is empty.</li>';
  } else {
    $p_name = preg_replace("/\\\/","",trim($_POST['name']));
  }
  if (trim($_POST['email']) == '') {
    $err_detected = true;
    $err_text .= '<li><b>E-mail address</b> is empty.</li>';
  } else {
    $p_email = preg_replace("/\\\/","",trim($_POST['email']));
  }
  if (trim($_POST['message']) == '') {
    $err_detected = true;
    $err_text .= '<li><b>Message</b> is empty.</li>';
  } else if (count(explode('http://',$_POST['message'])) >= 3) {
    $err_detected = true;
    $err_text .= '<li><b>SPAMMERS</b> move on. Here is nothing for you.</li>';
  } else {
    $p_message = preg_replace("/\\\/","",trim($_POST['message']));
  }
  if (trim($_POST['secret']) == '') {
    $err_detected = true;
    $err_text .= '<li><b>Security check</b> has failed. Spam behavior detected.</li>';
  } else {
    if (!((trim($_POST['secret']) == $secret) or (trim($_POST['secret']) == $secret_pre))) {
      $err_detected = true;
      $err_text .= '<li><b>Security check</b> has failed. Spam behavior detected.</li>';
    }
  }
  $err_text .= '</ul>';
  if ($err_detected) {
    $cnt = $err_text;
  } else {
    $d_name = mysql_real_escape_string($p_name);
    $d_email = mysql_real_escape_string($p_email);
    $d_message = mysql_real_escape_string($p_message);
    $d_useragent = mysql_real_escape_string($_SERVER['HTTP_USER_AGENT']);
    if ($_SERVER['HTTP_REFERER']) $d_referer = "'".mysql_real_escape_string($_SERVER['HTTP_REFERER'])."'";
    else $d_referer = 'NULL';
    //Database::query("INSERT INTO contact (name,email,ip,useragent,referer,message,created) VALUES ('$d_name','$d_email','{$_SERVER['REMOTE_ADDR']}','$d_useragent',$d_referer,'$d_message',UNIX_TIMESTAMP())");
    mail(Site::$email_admin, 'Feedback from '.Site::$name.' ['.date("d.m.y H:i:s").']', "Name: $p_name\nE-mail: $p_email\nAgent: $d_useragent\nReferer: {$_SERVER['HTTP_REFERER']}\nIP: {$_SERVER['REMOTE_ADDR']}\nMessage:\n\n".wordwrap($p_message), 'From: '.Site::$email_postmaster);
    $p_message = '';
    $cnt = '<p><font color="green"><b>Thank you!</b></font> Your message has been received.</p>';
  }
}


$secret = md5(date('YmdH'));
$cnt .= '
<p>You can leave a message using the contact form below.</p>
<form name="contact_form" action="/contact" method="post">

<p>Your name: <input type="text" name="name" value="'.$p_name.'" /></p>
<p>Your e-mail: <input type="text" name="email" value="'.$p_email.'" /></p>
<p>Message:</p>
<textarea name="message" rows="10" cols="40">'.$p_message.'</textarea>
<input type="hidden" name="secret" value="'.$secret.'" />
<p><input type="submit" value="Submit" /></p>
</form>';

Site::head();

Site::$content .= '<h1>Contact</h1>'.$cnt;

Site::foot();


?>
