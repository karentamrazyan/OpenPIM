--
-- Database: `openpim`
--

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `pageid` int(4) unsigned NOT NULL auto_increment,
  `path` varchar(50) NOT NULL,
  `file` varchar(20) default NULL,
  PRIMARY KEY  (`pageid`),
  UNIQUE KEY `path` (`path`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageid`, `path`, `file`) VALUES
(1, '', 'main.php'),
(2, 'terms', 'terms.php'),
(3, 'privacy', 'privacy.php'),
(4, 'about', 'about.php'),
(5, 'contact', 'contact.php'),
(6, 'register', 'register.php'),
(7, 'activate', 'activate.php'),
(8, 'login', 'login.php'),
(9, 'logout', 'logout.php'),
(10, 'tasks', 'tasks.php');

-- --------------------------------------------------------

--
-- Table structure for table `prios`
--

CREATE TABLE IF NOT EXISTS `prios` (
  `prioid` int(1) unsigned NOT NULL auto_increment,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY  (`prioid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `prios`
--

INSERT INTO `prios` (`prioid`, `name`) VALUES
(1, 'high'),
(2, 'medium'),
(3, 'low');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tagid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY  (`tagid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `tags`
--


-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `taskid` int(10) unsigned NOT NULL auto_increment,
  `termid` int(1) unsigned NOT NULL,
  `prioid` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text,
  `created` int(11) unsigned NOT NULL,
  `completed` int(11) unsigned default NULL,
  PRIMARY KEY  (`taskid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- Table structure for table `terms`
--

CREATE TABLE IF NOT EXISTS `terms` (
  `termid` int(1) unsigned NOT NULL auto_increment,
  `name` varchar(10) NOT NULL,
  PRIMARY KEY  (`termid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

--
-- Dumping data for table `terms`
--

INSERT INTO `terms` (`termid`, `name`) VALUES
(1, 'short'),
(2, 'mid'),
(3, 'long');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `uid` int(10) unsigned NOT NULL auto_increment,
  `name` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `mail` varchar(64) NOT NULL,
  `confirm` varchar(16) default NULL,
  `created` int(11) unsigned NOT NULL default '0',
  PRIMARY KEY  (`uid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;
