<?php
if (count(Site::$args) != 3) Site::notFound();

$taskid = Site::$args[2];
$task = mysql_fetch_array(Database::query("SELECT * FROM tasks WHERE uid = '{$_SESSION['uid']}' AND taskid = '$taskid' AND completed IS null"));

if (!$task) Site::notFound();

if (isset($_POST['yes'])) {
  Database::query("UPDATE tasks SET completed = UNIX_TIMESTAMP() WHERE uid = '{$_SESSION['uid']}' AND taskid = '{$task['taskid']}'");
  if (isset($_POST['ref'])) Site::redirectTemp($_POST['ref']);
  else Site::redirectTemp(Site::$url.'tasks');
} elseif (isset($_POST['cancel'])) {
  if (isset($_POST['ref'])) Site::redirectTemp($_POST['ref']);
  else Site::redirectTemp(Site::$url.'tasks');
}

Site::$meta_title = Site::$name.' - Tasks - Complete Task';
$content = '';

//print_r($_POST);

//if (isset($_SERVER['HTTP_REFERER'])) $ref = $_SERVER['HTTP_REFERER'];

//$current_url = ;

$color = '';
if ($task['prioid'] == 1) $color = ' style="color:red;"';
elseif ($task['prioid'] == 3) $color = ' style="color:silver;"';

$content .= "<h1>Complete task</h1>\n<p>Mark the task \"<b$color>{$task['name']}</b>\" as <b style=\"color:green;\">completed</b>?\n";
$content .= '<form name="completed" action="'.$_SERVER['REQUEST_URI'].'" method="post">
<input type="submit" name="yes" value="Yes" />
<input type="submit" name="cancel" value="Cancel" />';

if (isset($_SERVER['HTTP_REFERER']) && !count($_POST)) {
  $content .= "\n".'<input type="hidden" name="ref" value="'.$_SERVER['HTTP_REFERER'].'" />'."\n";
}

$content .= "\n</form>\n";


// Output
Site::head();
Site::$content .= $content;
Site::foot();

?>
