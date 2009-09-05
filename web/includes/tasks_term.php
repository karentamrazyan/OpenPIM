<?php
if (count(Site::$args) != 3) Site::notFound();

$turl = Site::$args[2];
$term = mysql_fetch_array(Database::query("SELECT * FROM terms WHERE name = '$turl'"));

if (!$term) Site::notFound();

$content = '';
$uid = $_SESSION['uid'];
$tasks = Database::query("SELECT * FROM tasks WHERE uid = '$uid' AND termid = {$term['termid']} AND completed IS null ORDER BY prioid, created");

$term_name = ucfirst($term['name']);
$content .= "<h1>$term_name-term tasks</h1>";

if (mysql_num_rows($tasks)) {
  while($task = mysql_fetch_assoc($tasks)){
    $color = '';
    if ($task['prioid'] == 1) $color = ' style="color:red;"';
    elseif ($task['prioid'] == 3) $color = ' style="color:silver;"';
    $content .= "<p>&bull; <b$color>{$task['name']}</b> [<a href=\"/tasks/complete/{$task['taskid']}\">done</a> | <a href=\"/tasks/edit/{$task['taskid']}\">edit</a>]</p>\n";
  }
} else {
  $content .= "<p>No {$term['name']}-term tasks defined.</p>";
}

$content .= '<p><a href="/tasks">< Tasks</a> | <a href="/tasks/add">+ Add task</a></p>';

// Output
Site::head();
Site::$content .= $content;
Site::foot();

?>
