<?php

if (!session_id()) session_start();

$content = '';

$content .= '
<h1><a href="http://www.openpim.org/">OpenPIM</a></h1>
<p>Open Personal Information Management</p>';

if (!isset($_SESSION['user'])) $content .= '<p style="border-style:solid;border-width:1px;padding:5px;background-color:#FFFF99;"><b><a href="/register">REGISTER</a></b> and manage you personal information right away!</p>';

$content .= '
<h2>Why OpenPIM?</h2>
<p>Because:</p>

<ul>
<li><b>Web-based</b> - access your personal information all over the World;</li>
<li><b>Freeware</b> - this service costs you nothing, all expenses are covered by <a href="http://www.freewarelovers.com/">Freeware Lovers</a>;</li>
<li><b>Ads-free</b> - no annoying ads;</li>
<li><b>Open source</b> - we have nothing to hide;</li>
<li><b>High security</b> - we keep your personal information encrypted;</li>
</ul>

<h2>Services</h2>
<p>Manage your:</p>

<ul>
<li><a href="/tasks">Tasks</a></li>
<li>Calendar (in development)</li>
<li>Bookmarks (in development)</li>
</ul>';

if (isset($_SESSION['user'])) $content .= '<p>Or <a href="/logout">logout</a>.</p>';
else $content .= '<p>Start using by <a href="/register">registering</a> or <a href="/login">login</a> if you already a member.</p>';

// Output
Site::head();
Site::$content .= $content;
Site::foot();
?>
