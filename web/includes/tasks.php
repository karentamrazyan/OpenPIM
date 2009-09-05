<?php

if (!session_id()) session_start();

if (!isset($_SESSION['user'])) {
  if (count(Site::$args) != 1) Site::notFound();
  Site::head();
  Site::$content .= '<h1>Tasks</h1>
<p>You need to be a registered user in case to manage your tasks. Please, <a href="/register">register</a> or <a href="/login">login</a>.</p>';
  Site::foot();
} else {
  if (count(Site::$args) == 1) {
    require_once "./includes/tasks_main.php";
  } elseif (count(Site::$args) >= 2) {
    switch (Site::$args[1]) {
      case 'add':
        require_once "./includes/tasks_add.php";
        break;
      case 'complete':
        require_once "./includes/tasks_complete.php";
        break;
      case 'edit':
        require_once "./includes/tasks_edit.php";
        break;
      case 'term':
        require_once "./includes/tasks_term.php";
        break;
      default:
        Site::notFound();
    }
  } else Site::notFound();
}

?>
