<?php

if (count(Site::$args) != 2) Site::notFound();

Site::$meta_title = Site::$name.' - Tasks - Add New Task';
$content = '';
$message_error = '';
$message_success = '';

if (isset($_POST['name']) && isset($_POST['term']) && isset($_POST['prio']) && isset($_POST['description'])) {
  $p_name = mysql_real_escape_string($_POST['name']);
  $p_term = mysql_real_escape_string($_POST['term']);
  $p_prio = mysql_real_escape_string($_POST['prio']);
  if ($_POST['description']) $p_desc = '\''.mysql_real_escape_string($_POST['description']).'\'';
  else $p_desc = 'NULL';
  Database::query("INSERT INTO tasks (termid,prioid,uid,name,description,created) VALUES ('$p_term','$p_prio','{$_SESSION['uid']}','$p_name',$p_desc,UNIX_TIMESTAMP())");
  $message_success = 'Task has been successfully added.';
}

$content .= '<h1>Add new task</h1>';

if ($message_success) $content .= '<p style="color:green;">'.$message_success.'</p>';

$content .= '<form name="add_task" action="/tasks/add" method="post">
<p>Name: <input type="text" name="name" maxlength="50" /></p>
<p>Term: <select name="term"><option value="1" selected="selected">short</option><option value="2">mid</option><option value="3">long</option></select></p>
<p>Prio: <select name="prio"><option value="1">high</option><option value="2" selected="selected">medium</option><option value="3">low</option></select></p>
<p>Description:</p>
<textarea name="description" rows="5" cols="30"></textarea>
<br /><br />
<input type="submit" value="Submit">
</form>
';

$content .= '<p><a href="/tasks">< Tasks</a></p>';

// Output
Site::head();
Site::$content .= $content;
Site::foot();

?>
