<?php
if (count(Site::$args) != 3) Site::notFound();

$taskid = Site::$args[2];
$task = mysql_fetch_array(Database::query("SELECT * FROM tasks WHERE uid = '{$_SESSION['uid']}' AND taskid = '$taskid' AND completed IS null"));

if (!$task) Site::notFound();

$message_success = '';
$prev_name = " value=\"{$task['name']}\"";
$prev_desc = $task['description'];

if (isset($_POST['name']) && isset($_POST['term']) && isset($_POST['prio']) && isset($_POST['description']) && isset($_POST['edit'])) {
  $p_name = mysql_real_escape_string($_POST['name']);
  $p_term = mysql_real_escape_string($_POST['term']);
  $p_prio = mysql_real_escape_string($_POST['prio']);
  if ($_POST['description']) $p_desc = '\''.mysql_real_escape_string($_POST['description']).'\'';
  else $p_desc = 'NULL';
  Database::query("UPDATE tasks SET termid = '$p_term', prioid = '$p_prio', name = '$p_name', description = $p_desc WHERE uid = '{$_SESSION['uid']}' AND taskid = {$task['taskid']}");
  $message_success = 'Task has been successfully changed.';
} elseif (isset($_POST['cancel'])) {
  if (isset($_POST['ref'])) Site::redirectTemp($_POST['ref']);
  else Site::redirectTemp(Site::$url.'tasks');
}

Site::$meta_title = Site::$name.' - Tasks - Edit Task';
$content = '';

$content .= '<h1>Edit task</h1>';

if ($message_success) $content .= '<p style="color:green;">'.$message_success.'</p>';

else {
$content .= '<form name="edit_task" action="'.$_SERVER['REQUEST_URI'].'" method="post">
<p>Name: <input type="text" name="name" maxlength="50"'.$prev_name.' /></p>';

$terms = Database::query("SELECT * FROM terms");

if (mysql_num_rows($terms)) {
  $content .= '<p>Term: <select name="term">';
  while($term = mysql_fetch_assoc($terms)){
    if ($task['termid'] == $term['termid']) $content .= '<option value="'.$term['termid'].'" selected="selected">'.$term['name'].'</option>';
    else $content .= '<option value="'.$term['termid'].'">'.$term['name'].'</option>';
  }
  $content .= '</select></p>';
}

$prios = Database::query("SELECT * FROM prios");

if (mysql_num_rows($prios)) {
  $content .= '<p>Prio: <select name="prio">';
  while($prio = mysql_fetch_assoc($prios)){
    if ($task['prioid'] == $prio['prioid']) $content .= '<option value="'.$prio['prioid'].'" selected="selected">'.$prio['name'].'</option>';
    else $content .= '<option value="'.$prio['prioid'].'">'.$prio['name'].'</option>';
  }
  $content .= '</select></p>';
}

//$prios = Database::query("SELECT * FROM prios");

//<p>Term: <select name="term"><option value="1" selected="selected">short</option><option value="2">mid</option><option value="3">long</option></select></p>
//<p>Prio: <select name="prio"><option value="1">high</option><option value="2" selected="selected">medium</option><option value="3">low</option></select></p>

$content .= '<p>Description:</p>
<textarea name="description" rows="5" cols="30">'.$prev_desc.'</textarea>
<br /><br />
<input type="submit" name="edit" value="Edit" />
<input type="submit" name="cancel" value="Cancel" />';

if (isset($_SERVER['HTTP_REFERER']) && !count($_POST)) {
  $content .= "\n".'<input type="hidden" name="ref" value="'.$_SERVER['HTTP_REFERER'].'" />'."\n";
}

$content .= "\n</form>\n";
}

$content .= '<p><a href="/tasks">< Tasks</a></p>';

// Output
Site::head();
Site::$content .= $content;
Site::foot();

?>
