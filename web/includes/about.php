<?php

if (count(Site::$args) != 1) Site::notFound();

Site::head();

Site::$content .= '
<h1>About OpenPIM</h1>
<p>OpenPIM is a <b>FREE</b>, Web-based Personal Information Management (PIM) service. It allows users to manage their personal information, like tasks, bookmarks, appointment, contacts and finances. The project is in the early development phase.</p>
<p>OpenPIM is primarily developed by Karen Tamrazyan. The project is funded by <a href="http://www.freewarelovers.com/">Freeware Lovers</a>. The software is freely usable and re-usable by everyone under a <a href="http://www.gnu.org/copyleft/gpl.html">GNU General Public License</a>.</p>
';

Site::foot();

?>
