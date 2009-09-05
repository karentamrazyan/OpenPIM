<?php

$content = '';
$content .= '<h1>Tasks</h1>';

$uid = $_SESSION['uid'];

$terms = Database::query("SELECT * FROM terms");

if ($terms) {
  while($term = mysql_fetch_assoc($terms)){
    $count = mysql_result(Database::query("SELECT COUNT(*) FROM tasks WHERE uid = '$uid' AND termid = '{$term['termid']}' AND completed IS null"),0);
    $content .= "<p>&bull; <a href=\"/tasks/term/{$term['name']}\">{$term['name']}-term</a> ($count)</p>\n";
  }
} else {
  $content .= "No terms detected. Bye!";
}

$content .= '<p><a href="/tasks/add">+ Add task</a></p>';

// Output
Site::head();
Site::$content .= $content;
Site::foot();

?>
