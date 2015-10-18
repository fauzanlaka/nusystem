-- SENAYAN Library Automation
-- Version 3.0 stable
-- Core database structure

-- --------------------------------------------------------

--
-- Table structure for table `backup_log`
--

CREATE TABLE `backup_log` (
  `backup_log_id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `backup_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `backup_file` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`backup_log_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biblio`
--

CREATE TABLE `biblio` (
  `biblio_id` int(11) NOT NULL auto_increment,
  `gmd_id` int(3) default NULL,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `edition` varchar(50) collate utf8_unicode_ci default NULL,
  `isbn_issn` varchar(20) collate utf8_unicode_ci default NULL,
  `publisher_id` int(11) default NULL,
  `publish_year` int(4) default NULL,
  `collation` varchar(50) collate utf8_unicode_ci default NULL,
  `series_title` varchar(200) collate utf8_unicode_ci default NULL,
  `call_number` varchar(50) collate utf8_unicode_ci default NULL,
  `language_id` char(5) collate utf8_unicode_ci default 'en',
  `source` varchar(3) collate utf8_unicode_ci default NULL,
  `publish_place_id` int(11) default NULL,
  `classification` varchar(40) collate utf8_unicode_ci default NULL,
  `notes` text collate utf8_unicode_ci,
  `image` varchar(100) collate utf8_unicode_ci default NULL,
  `file_att` varchar(255) collate utf8_unicode_ci default NULL,
  `input_date` datetime default NULL,
  `last_update` datetime default NULL,
  PRIMARY KEY  (`biblio_id`),
  KEY `references_idx` (`gmd_id`,`publisher_id`,`language_id`, `publish_place_id`),
  KEY `classification` (`classification`),
  FULLTEXT KEY `title_ft_idx` (`title`),
  FULLTEXT KEY `notes_ft_idx` (`notes`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biblio_author`
--

CREATE TABLE `biblio_author` (
  `biblio_id` int(11) NOT NULL default '0',
  `author_id` int(11) NOT NULL default '0',
  `level` int(1) NOT NULL default '1',
  PRIMARY KEY  (`biblio_id`,`author_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `biblio_topic`
--

CREATE TABLE `biblio_topic` (
  `biblio_id` int(11) NOT NULL default '0',
  `topic_id` int(11) NOT NULL default '0',
  `level` int(1) NOT NULL default '1',
  PRIMARY KEY  (`biblio_id`,`topic_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fines`
--

CREATE TABLE `fines` (
  `fines_id` int(11) NOT NULL auto_increment,
  `fines_date` date NOT NULL,
  `member_id` varchar(20) collate utf8_unicode_ci NOT NULL,
  `debet` int(11) default '0',
  `credit` int(11) default '0',
  `description` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`fines_id`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `fines`
--


-- --------------------------------------------------------

--
-- Table structure for table `group_access`
--

CREATE TABLE `group_access` (
  `group_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `r` int(1) NOT NULL default '0',
  `w` int(1) NOT NULL default '0',
  PRIMARY KEY  (`group_id`,`module_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `group_access`
--

INSERT INTO `group_access` (`group_id`, `module_id`, `r`, `w`) VALUES
(1, 1, 1, 1),
(1, 2, 1, 1),
(1, 3, 1, 1),
(1, 4, 1, 1),
(1, 5, 1, 1),
(1, 6, 1, 1),
(1, 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `holiday`
--

CREATE TABLE `holiday` (
  `holiday_id` int(11) NOT NULL auto_increment,
  `holiday_dayname` varchar(20) collate utf8_unicode_ci NOT NULL,
  `holiday_date` date default NULL,
  `description` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`holiday_id`),
  UNIQUE KEY `holiday_dayname` (`holiday_dayname`,`holiday_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL auto_increment,
  `biblio_id` int(11) default NULL,
  `coll_type_id` int(3) default NULL,
  `item_code` varchar(20) collate utf8_unicode_ci default NULL,
  `received_date` date default NULL,
  `supplier_id` varchar(6) collate utf8_unicode_ci default NULL,
  `order_no` varchar(20) collate utf8_unicode_ci default NULL,
  `location_id` varchar(3) collate utf8_unicode_ci default NULL,
  `order_date` date default NULL,
  `item_status_id` char(3) collate utf8_unicode_ci default NULL,
  `site` varchar(50) collate utf8_unicode_ci default NULL,
  `source` int(1) NOT NULL default '0',
  `invoice` varchar(20) collate utf8_unicode_ci default NULL,
  `price` int(11) default NULL,
  `price_currency` varchar(10) collate utf8_unicode_ci default NULL,
  `invoice_date` date default NULL,
  `input_date` datetime NOT NULL,
  `last_update` datetime default NULL,
  PRIMARY KEY  (`item_id`),
  UNIQUE KEY `item_code` (`item_code`),
  KEY `item_references_idx` (`coll_type_id`, `location_id`,`item_status_id`),
  KEY `biblio_id_idx` (`biblio_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `loan_id` int(11) NOT NULL auto_increment,
  `item_code` varchar(20) collate utf8_unicode_ci default NULL,
  `member_id` varchar(20) collate utf8_unicode_ci default NULL,
  `loan_date` date NOT NULL,
  `due_date` date NOT NULL,
  `renewed` int(11) NOT NULL default '0',
  `loan_rules_id` int(11) NOT NULL default '0',
  `actual` date default NULL,
  `is_lent` int(11) NOT NULL default '0',
  `is_return` int(11) NOT NULL default '0',
  `return_date` date default NULL,
  PRIMARY KEY  (`loan_id`),
  KEY `item_code` (`item_code`),
  KEY `member_id` (`member_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loan`
--


-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` varchar(20) collate utf8_unicode_ci NOT NULL,
  `member_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `gender` int(1) NOT NULL,
  `member_type_id` int(6) default NULL,
  `member_address` varchar(255) collate utf8_unicode_ci default NULL,
  `member_email` varchar(100) collate utf8_unicode_ci default NULL,
  `postal_code` varchar(20) collate utf8_unicode_ci default NULL,
  `inst_name` varchar(100) collate utf8_unicode_ci default NULL,
  `is_new` int(1) default NULL,
  `member_image` varchar(200) collate utf8_unicode_ci default NULL,
  `pin` varchar(50) collate utf8_unicode_ci default NULL,
  `member_phone` varchar(50) collate utf8_unicode_ci default NULL,
  `member_fax` varchar(50) collate utf8_unicode_ci default NULL,
  `member_since_date` date default NULL,
  `register_date` date default NULL,
  `expire_date` date NOT NULL,
  `member_notes` text collate utf8_unicode_ci,
  `input_date` date default NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`member_id`),
  KEY `member_name` (`member_name`),
  KEY `member_type_id` (`member_type_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_author`
--

CREATE TABLE `mst_author` (
  `author_id` int(11) NOT NULL auto_increment,
  `author_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `authority_type` enum('p', 'o', 'c') collate utf8_unicode_ci NULL DEFAULT 'p',
  `input_date` date NOT NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`author_id`),
  UNIQUE KEY `author_name` (`author_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_coll_type`
--

CREATE TABLE `mst_coll_type` (
  `coll_type_id` int(3) NOT NULL auto_increment,
  `coll_type_name` varchar(30) collate utf8_unicode_ci NOT NULL default '',
  `input_date` date default NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`coll_type_id`),
  UNIQUE KEY `coll_type_name` (`coll_type_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_gmd`
--

CREATE TABLE `mst_gmd` (
  `gmd_id` int(11) NOT NULL auto_increment,
  `gmd_code` varchar(3) collate utf8_unicode_ci default NULL,
  `gmd_name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `icon_image` varchar(100) collate utf8_unicode_ci default NULL,
  `input_date` date NOT NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`gmd_id`),
  UNIQUE KEY `gmd_code` (`gmd_code`),
  UNIQUE KEY `gmd_name` (`gmd_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_item_status`
--

CREATE TABLE `mst_item_status` (
  `item_status_id` char(3) collate utf8_unicode_ci NOT NULL,
  `item_status_name` varchar(30) collate utf8_unicode_ci NOT NULL,
  `rules` varchar(255) collate utf8_unicode_ci default NULL,
  `input_date` date default NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`item_status_id`),
  UNIQUE KEY `item_status_name` (`item_status_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_item_status`
--

INSERT INTO `mst_item_status` (`item_status_id`, `item_status_name`, `rules`, `input_date`, `last_update`) VALUES
('R', 'Repair', 'a:1:{i:0;s:1:"1";}', '2007-10-01', '2008-01-07'),
('NL', 'No Loan', 'a:1:{i:0;s:1:"1";}', '2008-01-23', '2008-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `mst_language`
--

CREATE TABLE `mst_language` (
  `language_id` char(5) collate utf8_unicode_ci NOT NULL default '',
  `language_name` varchar(20) collate utf8_unicode_ci NOT NULL default '',
  `input_date` date default NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`language_id`),
  UNIQUE KEY `language_name` (`language_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_language`
--

INSERT INTO `mst_language` (`language_id`, `language_name`, `input_date`, `last_update`) VALUES
('id', 'Indonesia', '2007-08-30', '2007-08-30'),
('en', 'English', '2007-08-30', '2007-08-30');

-- --------------------------------------------------------

--
-- Table structure for table `mst_loan_rules`
--

CREATE TABLE `mst_loan_rules` (
  `loan_rules_id` int(11) NOT NULL auto_increment,
  `member_type_id` int(11) NOT NULL default '0',
  `coll_type_id` int(11) default '0',
  `gmd_id` int(11) default '0',
  `loan_limit` int(3) default '0',
  `loan_periode` int(3) default '0',
  `reborrow_limit` int(3) default '0',
  `fine_each_day` int(3) default '0',
  `grace_periode` int(2) NULL default 0,
  `input_date` date default NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`loan_rules_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_location`
--

CREATE TABLE `mst_location` (
  `location_id` varchar(3) collate utf8_unicode_ci NOT NULL default '',
  `location_name` varchar(100) collate utf8_unicode_ci default NULL,
  `input_date` date NOT NULL,
  `last_update` date NOT NULL,
  PRIMARY KEY  (`location_id`),
  UNIQUE KEY `location_name` (`location_name`)

) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_member_type`
--

CREATE TABLE `mst_member_type` (
  `member_type_id` int(11) NOT NULL auto_increment,
  `member_type_name` varchar(50) collate utf8_unicode_ci NOT NULL,
  `loan_limit` int(11) NOT NULL,
  `loan_periode` int(11) NOT NULL,
  `enable_reserve` int(1) NOT NULL default '0',
  `reserve_limit` int(11) NOT NULL default '0',
  `member_periode` int(11) NOT NULL,
  `reborrow_limit` int(11) NOT NULL,
  `fine_each_day` int(11) NOT NULL,
  `grace_periode` int(2) NULL default 0,
  `input_date` date NOT NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`member_type_id`),
  UNIQUE KEY `member_type_name` (`member_type_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_member_type`
--

INSERT INTO `mst_member_type` (`member_type_id`, `member_type_name`, `loan_limit`, `loan_periode`, `enable_reserve`, `reserve_limit`, `member_periode`, `reborrow_limit`, `fine_each_day`, `input_date`, `last_update`) VALUES
(1, 'Standard', 2, 14, 1, 1, 365, 1, 1000, '2007-11-29', '2007-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `mst_module`
--

CREATE TABLE `mst_module` (
  `module_id` int(3) NOT NULL auto_increment,
  `module_name` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `module_path` varchar(200) collate utf8_unicode_ci default NULL,
  `module_desc` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`module_id`),
  UNIQUE KEY `module_name` (`module_name`,`module_path`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mst_module`
--

INSERT INTO `mst_module` (`module_id`, `module_name`, `module_path`, `module_desc`) VALUES
(1, 'bibliography', 'bibliography', 'Manage your bibliographic/catalog and items/copies database'),
(2, 'circulation', 'circulation', 'Module for doing library items circulation such as loan and return'),
(3, 'membership', 'membership', 'Manage your library membership and membership type'),
(4, 'master_file', 'master_file', 'Manage your referential data that will be used by other modules'),
(5, 'stock_take', 'stock_take', 'Ease your pain in doing library stock opname process'),
(6, 'system', 'system', 'Configure system behaviour, user and backups'),
(7, 'reporting', 'reporting', 'Real time and dynamic report about library collections and circulation');

-- --------------------------------------------------------

--
-- Table structure for table `mst_place`
--

CREATE TABLE `mst_place` (
  `place_id` int(11) NOT NULL auto_increment,
  `place_name` varchar(30) collate utf8_unicode_ci NOT NULL default '',
  `input_date` date default NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`place_id`),
  UNIQUE KEY `place_name` (`place_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_publisher`
--

CREATE TABLE `mst_publisher` (
  `publisher_id` int(11) NOT NULL auto_increment,
  `publisher_name` varchar(100) collate utf8_unicode_ci NOT NULL,
  `publisher_place` varchar(30) collate utf8_unicode_ci default NULL,
  `input_date` date default NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`publisher_id`),
  UNIQUE KEY `publisher_name` (`publisher_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mst_supplier`
--

CREATE TABLE `mst_supplier` (
  `supplier_id` int(11) NOT NULL auto_increment,
  `supplier_name` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `address` varchar(100) collate utf8_unicode_ci default NULL,
  `postal_code` char(10) collate utf8_unicode_ci default NULL,
  `phone` char(14) collate utf8_unicode_ci default NULL,
  `contact` char(30) collate utf8_unicode_ci default NULL,
  `fax` char(14) collate utf8_unicode_ci default NULL,
  `account` char(12) collate utf8_unicode_ci default NULL,
  `e_mail` char(80) collate utf8_unicode_ci default NULL,
  `input_date` date default NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`supplier_id`),
  UNIQUE KEY `supplier_name` (`supplier_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mst_topic`
--

CREATE TABLE `mst_topic` (
  `topic_id` int(11) NOT NULL auto_increment,
  `topic` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `input_date` date default NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`topic_id`),
  UNIQUE KEY `topic` (`topic`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE `reserve` (
  `reserve_id` int(11) NOT NULL auto_increment,
  `member_id` varchar(20) collate utf8_unicode_ci NOT NULL,
  `biblio_id` int(11) NOT NULL,
  `item_code` varchar(20) collate utf8_unicode_ci NOT NULL,
  `reserve_date` datetime NOT NULL,
  PRIMARY KEY  (`reserve_id`),
  KEY `references_idx` (`member_id`,`biblio_id`),
  KEY `item_code_idx` (`item_code`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `setting_id` int(3) NOT NULL auto_increment,
  `setting_name` varchar(30) collate utf8_unicode_ci NOT NULL default '',
  `setting_value` varchar(100) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`setting_id`),
  UNIQUE KEY `setting_name` (`setting_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_take`
--

CREATE TABLE `stock_take` (
  `stock_take_id` int(11) NOT NULL auto_increment,
  `stock_take_name` varchar(200) collate utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime default NULL,
  `init_user` varchar(50) collate utf8_unicode_ci NOT NULL,
  `total_item_stock_taked` int(11) default NULL,
  `total_item_lost` int(11) default NULL,
  `total_item_exists` int(11) default '0',
  `total_item_loan` int(11) default NULL,
  `stock_take_users` mediumtext collate utf8_unicode_ci,
  `is_active` int(1) NOT NULL default '0',
  `report_file` varchar(255) collate utf8_unicode_ci default NULL,
  PRIMARY KEY  (`stock_take_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stock_take_item`
--


CREATE TABLE IF NOT EXISTS `stock_take_item` (
  `stock_take_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `item_code` varchar(20) collate utf8_unicode_ci NOT NULL,
  `title` varchar(255) collate utf8_unicode_ci NOT NULL,
  `gmd_name` varchar(30) collate utf8_unicode_ci default NULL,
  `classification` varchar(30) collate utf8_unicode_ci default NULL,
  `coll_type_name` varchar(30) collate utf8_unicode_ci default NULL,
  `call_number` varchar(50) collate utf8_unicode_ci default NULL,
  `location` varchar(100) collate utf8_unicode_ci default NULL,
  `status` enum('e','m','u','l') collate utf8_unicode_ci NOT NULL default 'm',
  `checked_by` varchar(50) collate utf8_unicode_ci NOT NULL,
  `last_update` datetime default NULL,
  PRIMARY KEY  (`stock_take_id`,`item_id`),
  UNIQUE KEY `item_code` (`item_code`),
  KEY `status` (`status`),
  KEY `item_properties_idx` (`gmd_name`,`classification`,`coll_type_name`,`location`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `stock_take_item`
--


-- --------------------------------------------------------

--
-- Table structure for table `system_log`
--

CREATE TABLE `system_log` (
  `log_id` int(11) NOT NULL auto_increment,
  `log_type` enum('staff','member','system') collate utf8_unicode_ci NOT NULL default 'staff',
  `id` varchar(50) collate utf8_unicode_ci default NULL,
  `log_location` varchar(50) collate utf8_unicode_ci NOT NULL,
  `log_msg` text collate utf8_unicode_ci NOT NULL,
  `log_date` datetime NOT NULL,
  PRIMARY KEY  (`log_id`),
  KEY `log_type` (`log_type`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL auto_increment,
  `username` varchar(50) collate utf8_unicode_ci NOT NULL default '',
  `realname` varchar(100) collate utf8_unicode_ci NOT NULL default '',
  `passwd` varchar(35) collate utf8_unicode_ci NOT NULL default '',
  `last_login` datetime default NULL,
  `last_login_ip` char(15) collate utf8_unicode_ci default NULL,
  `groups` varchar(200) collate utf8_unicode_ci default NULL,
  `input_date` date default '0000-00-00',
  `last_update` date default NULL,
  PRIMARY KEY  (`user_id`),
  UNIQUE KEY `username` (`username`),
  KEY `realname` (`realname`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `realname`, `passwd`, `last_login`, `last_login_ip`, `groups`, `input_date`, `last_update`) VALUES
(1, 'admin', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', '2007-11-29 15:42:21', '127.0.0.1', 'a:1:{i:0;s:1:"1";}', '2007-09-03', '2007-11-29');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `group_id` int(11) NOT NULL auto_increment,
  `group_name` varchar(30) collate utf8_unicode_ci NOT NULL default '',
  `input_date` date default NULL,
  `last_update` date default NULL,
  PRIMARY KEY  (`group_id`),
  UNIQUE KEY `group_name` (`group_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`group_id`, `group_name`, `input_date`, `last_update`) VALUES
(1, 'Administrator', '2007-11-29', '2007-11-29');
