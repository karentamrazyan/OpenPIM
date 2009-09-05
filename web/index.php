<?php

/**
 * This is the main web entry point for OpenPIM.
 * See the README file for basic setup instructions.
 * http://www.openpim.org/
 *
 * ----------
 *
 * Copyright (C) 2009 Karen Tamrazyan.
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301, USA.
 * http://www.gnu.org/copyleft/gpl.html
 */

error_reporting(E_ALL | E_STRICT);
require_once './site.php';
require_once './database.php';
require_once './navigator.php';
Navigator::navigate();
Site::output();
?>
