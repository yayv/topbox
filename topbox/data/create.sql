-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2016 at 10:48 AM
-- Server version: 5.6.26
-- PHP Version: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `topbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `cake_contents`
--

CREATE TABLE IF NOT EXISTS `cake_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `cover` int(11) NOT NULL,
  `shortname` char(32) NOT NULL COMMENT '唯一标识串，尽量体现内容含义',
  `substract` varchar(255) NOT NULL COMMENT '内容摘要',
  `content` text COMMENT '文本内容',
  `contenttype` char(32) NOT NULL COMMENT 'Content-Type',
  `file` varchar(255) NOT NULL COMMENT '对应文件系统的路径和文件名',
  `width` int(11) NOT NULL DEFAULT '0',
  `height` int(11) NOT NULL DEFAULT '0',
  `resolution` int(11) NOT NULL,
  `size` int(11) NOT NULL DEFAULT '0',
  `length` int(11) NOT NULL DEFAULT '0' COMMENT 'time_length',
  `source` varchar(255) NOT NULL COMMENT '来源',
  `sourcetype` char(8) NOT NULL COMMENT '来源类型',
  `author` char(16) NOT NULL COMMENT '作者',
  `editor` char(16) NOT NULL COMMENT '编辑',
  PRIMARY KEY (`id`),
  UNIQUE KEY `shortname` (`shortname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='资源内容表' AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cake_contents`
--

INSERT INTO `cake_contents` (`id`, `title`, `cover`, `shortname`, `substract`, `content`, `contenttype`, `file`, `width`, `height`, `resolution`, `size`, `length`, `source`, `sourcetype`, `author`, `editor`) VALUES
(1, '', 0, 'baoxiangongsidaobizenmeban', '保险公司倒闭了，怎么办？', '<h3>原因分析</h3>\r\n1. 客户可能因听说国外有保险公司倒闭，才产生一些判断或联想。\r\n2. 对未来保险公司是否稳固产生不安。\r\n\r\n<h3>处理原则</h3>\r\n1. 应将事实做说明,另应仔细向客户说明整个保险公司管理及相关的规定。其实是在保护客户的权利。\r\n2. 可以利用杂事、报纸正面评价的部分，当做解说与印证的辅助资料，甚至提供数据以获取客户对公司的信心\r\n\r\n<h3>话术范例</h3>\r\nA1. 这问题的确值得我们进一步了解。中国自有保险以来，尚没有保险公司倒闭的情况。目前在我国，保险公司的营运必须经过相关部门严格的管理及约束，除了随时受监管外，每年还要作审查，一旦发现违规操作，轻者纠正，重者撤销执照。所以一笔保费到保险公司后，主管机关就注意其流程是否经严格的核保、安全性的评估、再保的分配等，以保障客户的权益。至于保险公司对外的投资，主管机关也严格规定其投资标的的安全性、稳定性、及投资比率。\r\nA2. 给您诚心的建议，在投保前先考虑保险公司的声誉形象甚至财力，再予评估，然后投保，友邦保险是一家值得信赖的公司。', 'text/html', '', 0, 0, 0, 0, 0, '', '原创', '刘策', '刘策');

-- --------------------------------------------------------

--
-- Table structure for table `cake_video`
--

CREATE TABLE IF NOT EXISTS `cake_video` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `author` varchar(16) NOT NULL,
  `cover` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portal_datagroup_inproject`
--

CREATE TABLE IF NOT EXISTS `portal_datagroup_inproject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` char(8) NOT NULL,
  `showname` varchar(50) NOT NULL,
  `userdefinedname` varchar(50) NOT NULL,
  `alt` varchar(500) NOT NULL,
  `members` text,
  `datasource` char(255) NOT NULL DEFAULT '',
  `sourcetype` enum('manual','rss','json') NOT NULL,
  `updatetype` char(8) NOT NULL DEFAULT '',
  `reference` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `projectid` (`projectid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `portal_datagroup_inproject`
--

INSERT INTO `portal_datagroup_inproject` (`id`, `projectid`, `name`, `type`, `showname`, `userdefinedname`, `alt`, `members`, `datasource`, `sourcetype`, `updatetype`, `reference`) VALUES
(96, 17, 'title', 'single', ' 网页标题', ' 网页标题', '这里只写标题文字就够了,其他不用填写', NULL, '', 'manual', '', 1),
(97, 17, 'content', 'single', '内容部分', '内容部分', 'content', NULL, '', 'manual', '', 1),
(100, 17, 'idx', 'list', 'idx', '循环演示', 'idx', NULL, '', 'manual', '', 1),
(101, 26, 'testloop', 'list', 'testloop', '轮播图', 'testloop', NULL, '', 'manual', '', 1),
(102, 26, 'title', 'single', 'title', '页面标题', 'title', NULL, '', 'manual', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `portal_data_inproject`
--

CREATE TABLE IF NOT EXISTS `portal_data_inproject` (
  `projectid` int(11) NOT NULL,
  `datagroupname` varchar(128) NOT NULL,
  `datagrouptype` char(8) NOT NULL,
  `id` int(11) NOT NULL,
  `orderingroup` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `abstract` text NOT NULL,
  `alt` varchar(255) NOT NULL,
  `dateline` int(11) NOT NULL,
  `writer` char(60) NOT NULL,
  PRIMARY KEY (`projectid`,`datagroupname`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `portal_data_inproject`
--

INSERT INTO `portal_data_inproject` (`projectid`, `datagroupname`, `datagrouptype`, `id`, `orderingroup`, `title`, `url`, `image`, `abstract`, `alt`, `dateline`, `writer`) VALUES
(17, 'content', 'single', 1, 1427168202, 'title1', 'http://www.baidu.com', '', '', '', 1427168202, ''),
(17, 'idx', 'list', 1, 1427169362, '1', '', '', '', '', 1427169362, ''),
(17, 'idx', 'list', 2, 1427169367, '2', '', '', '', '', 1427169367, ''),
(17, 'idx', 'list', 3, 1427169372, '3', '', '', '', '', 1427169372, ''),
(17, 'title', 'single', 1, 1427168179, '这里才是标题', '', '', '', '', 1427168179, ''),
(26, 'testloop', 'list', 1, 1467639758, '新闻第一条', 'http://www.baidu.com', '', '', '', 1467639758, ''),
(26, 'testloop', 'list', 2, 1467639813, '新闻第二条', 'http://www.fblife.com', '', '', '', 1467639813, ''),
(26, 'testloop', 'list', 3, 1467641512, '新闻第三条', '', '', '', '', 1467641512, ''),
(26, 'testloop', 'list', 4, 1467641521, '新闻第四条', '', '', '', '', 1467641521, ''),
(26, 'testloop', 'list', 5, 1467641530, '新闻第五条', '', '', '', '', 1467641530, ''),
(26, 'testloop', 'list', 6, 1467641539, '新闻第五条', '', '', '', '', 1467641539, ''),
(26, 'testloop', 'list', 7, 1467641547, '新闻第六条', '', '', '', '', 1467641547, ''),
(26, 'testloop', 'list', 8, 1467641584, '新闻第七条', '', '', '', '', 1467641584, ''),
(26, 'testloop', 'list', 9, 1467641593, '新闻第八条', '', '', '', '', 1467641593, ''),
(26, 'testloop', 'list', 10, 1467641600, '新闻第九条', '', '', '', '', 1467641600, ''),
(26, 'testloop', 'list', 11, 1467641609, '新闻第十条', '', '', '', '', 1467641609, ''),
(26, 'testloop', 'list', 12, 1467641622, '新闻第十一条', '', '', '', '', 1467641622, ''),
(26, 'testloop', 'list', 13, 1467641631, '新闻第十二条', '', '', '', '', 1467641631, ''),
(26, 'testloop', 'list', 14, 1467641639, '新闻第十三条', '', '', '', '', 1467641639, ''),
(26, 'testloop', 'list', 15, 1467805187, '新闻第十四条', '', '', '', '', 1467805187, ''),
(26, 'testloop', 'list', 16, 1467805196, '新闻第十五条', '', '', '', '', 1467805196, ''),
(26, 'testloop', 'list', 17, 1467805204, '新闻第十六条', '', '', '', '', 1467805204, ''),
(26, 'testloop', 'list', 18, 1467805212, '新闻第十七条', '', '', '', '', 1467805212, ''),
(26, 'testloop', 'list', 19, 1467805222, '新闻第十八条', '', '', '', '', 1467805222, ''),
(26, 'testloop', 'list', 20, 1467805232, '新闻第十九条', '', '', '', '', 1467805232, ''),
(26, 'testloop', 'list', 21, 1467805247, '二十一条了', '', '', '', '', 1467805247, ''),
(26, 'title', 'single', 1, 1467602386, '1', '11', '1', '1', '1', 1467602386, '');

-- --------------------------------------------------------

--
-- Table structure for table `portal_imageupload_inproject`
--

CREATE TABLE IF NOT EXISTS `portal_imageupload_inproject` (
  `projectid` int(11) NOT NULL,
  `datagroupname` varchar(128) NOT NULL,
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dateline` datetime NOT NULL,
  PRIMARY KEY (`projectid`,`datagroupname`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `portal_pages_inproject`
--

CREATE TABLE IF NOT EXISTS `portal_pages_inproject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `templateid` int(11) NOT NULL,
  `pagename` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `publishtype` char(10) NOT NULL,
  `user_hook_filename` varchar(50) NOT NULL DEFAULT '',
  `hookfile_content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projectid` (`projectid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `portal_pages_inproject`
--

INSERT INTO `portal_pages_inproject` (`id`, `projectid`, `templateid`, `pagename`, `filename`, `publishtype`, `user_hook_filename`, `hookfile_content`) VALUES
(16, 17, 14, '首页 ', 'index.html', 'static', '', '<?php\r\n\r\n    //processData() is the main function, do NOT change the function name\r\n\r\n   function processData($static, $dynamic){\r\n      # code .... \r\n    }\r\n     '),
(17, 17, 14, '啊啊', 'page.html', 'dynamic', 'hook_page.html', '<?php\r\n\r\n   //processData() is the main function, do NOT change the function name\r\n\r\n   function processData($static, $dynamic){\r\n      # code .... \r\n    }\r\n     \r\n'),
(18, 26, 16, '首页', 'index.html', 'static', '', '<?php\n\n   //processData() is the main function, do NOT change the function name\n\n   function processData($static, $dynamic){\n      # code .... \n    }\n     ');

-- --------------------------------------------------------

--
-- Table structure for table `portal_templates`
--

CREATE TABLE IF NOT EXISTS `portal_templates` (
  `templateid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `group` varchar(50) NOT NULL,
  `type` char(10) NOT NULL,
  PRIMARY KEY (`templateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `portal_templates_inproject`
--

CREATE TABLE IF NOT EXISTS `portal_templates_inproject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `from_templateid` int(11) NOT NULL,
  `templatename` varchar(50) NOT NULL,
  `templatefile` varchar(50) NOT NULL,
  `hookfile_content` text NOT NULL COMMENT 'hook filename formatï¼šhook_dynamicfilename',
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projectid` (`projectid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `portal_templates_inproject`
--

INSERT INTO `portal_templates_inproject` (`id`, `projectid`, `from_templateid`, `templatename`, `templatefile`, `hookfile_content`, `content`) VALUES
(14, 17, 0, '首页模板', 'index.tpl.html', '', '<html>\r\n<head>\r\n<title>{$title->title showname='' 网页标题'' alt=''这里只写标题文字就够了,其他不用填写''}</title>\r\n</head>\r\n<body>\r\n<h2><a href=''{$content->url showname=''内容部分''}'' title=''{$content->alt}''>{$content->title}</a></h2>\r\n{section name=i loop=$idx}\r\n{$index[i]->title showname=''演示一个循环'' alt=''只有标题''}\r\n{/section}\r\n</body>\r\n</html>\r\n'),
(16, 26, 0, '首页模板', 'index.templates', '', '\r\n{section loop=$testloop name=a}\r\n1\r\n{/section}');

-- --------------------------------------------------------

--
-- Table structure for table `portal_topics`
--

CREATE TABLE IF NOT EXISTS `portal_topics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `programmer` varchar(20) NOT NULL,
  `directory` varchar(256) NOT NULL,
  `url` varchar(250) NOT NULL,
  `group` varchar(50) NOT NULL,
  `staticdata` varchar(50) NOT NULL,
  `dynamicdata` varchar(50) NOT NULL,
  `dynamic_content` text NOT NULL,
  `zipname` varchar(50) NOT NULL,
  `editor` varchar(255) NOT NULL,
  `dateline` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `portal_topics`
--

INSERT INTO `portal_topics` (`id`, `title`, `description`, `programmer`, `directory`, `url`, `group`, `staticdata`, `dynamicdata`, `dynamic_content`, `zipname`, `editor`, `dateline`) VALUES
(17, '演示', '', '延分 ', '/Data/webapps/minisites/show2', 'http://show2.minisite.localhost', '', 's.dump', 'd.dump', '', '', '刘策', '2015-03-24 11:32:25'),
(26, '首页', '用来做网站首页的专题', 'liuce', './data/topics/indexpage', 'http://www.topbox.localhost/', '', 's.dump', 'd.dump', '', '', 'liuce', '2016-07-03 15:29:03');

-- --------------------------------------------------------

--
-- Table structure for table `roach_old_todo`
--

CREATE TABLE IF NOT EXISTS `roach_old_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) NOT NULL,
  `type` char(8) NOT NULL,
  `status` char(8) NOT NULL,
  `changetime` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2173 ;

-- --------------------------------------------------------

--
-- Table structure for table `roach_result`
--

CREATE TABLE IF NOT EXISTS `roach_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) NOT NULL,
  `status` char(8) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `parses` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roach_rules`
--

CREATE TABLE IF NOT EXISTS `roach_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` char(64) NOT NULL,
  `url_rule` varchar(256) NOT NULL,
  `callfunction` varchar(64) NOT NULL,
  `functiontype` char(8) NOT NULL,
  `parse_rule` varchar(256) NOT NULL,
  `interval` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `host` (`host`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `roach_rules`
--

INSERT INTO `roach_rules` (`id`, `host`, `url_rule`, `callfunction`, `functiontype`, `parse_rule`, `interval`) VALUES
(1, 'game.youku.com', '/http\\:\\/\\/game\\.youku\\.com\\/index\\/lol/', 'saveContentPageUrl', 'list', '/\\"(http\\:\\/\\/v\\.youku\\.com\\/v_show\\/id_[a-zA-Z0-9]*\\.html)\\"\\starget=\\"video\\"\\stitle=\\"(.*)\\"/', 0),
(2, 'game.youku.com', '/http\\:\\/\\/game\\.youku\\.com\\/index\\/lol/', 'saveListUrl', 'list', '/<a href=\\"(http\\:\\/\\/game\\.youku\\.com\\/index\\/lol\\/_page[0-9]*_[0-9]*\\.html)\\"/', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roach_todo`
--

CREATE TABLE IF NOT EXISTS `roach_todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `sourcesite` varchar(16) NOT NULL,
  `gamename` char(16) NOT NULL,
  `title` varchar(255) NOT NULL,
  `sourceauthor` varchar(16) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `type` char(16) NOT NULL DEFAULT 'list' COMMENT 'list,waterfall,content',
  `lazyload` int(11) NOT NULL,
  `willupdate` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `questdate` datetime NOT NULL,
  `status` char(16) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`),
  KEY `questdate` (`questdate`),
  KEY `status` (`status`),
  KEY `questdate_2` (`questdate`,`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1842 ;


-- --------------------------------------------------------

--
-- Table structure for table `tb_games`
--

CREATE TABLE IF NOT EXISTS `tb_games` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(48) NOT NULL COMMENT '游戏名',
  `oldname` char(50) NOT NULL,
  `producer` char(50) NOT NULL COMMENT '厂商',
  `platform` char(1) NOT NULL COMMENT '平台',
  `platformtype` char(8) NOT NULL COMMENT '大平台类型',
  `year` char(4) NOT NULL COMMENT '年份',
  `17173` varchar(255) NOT NULL,
  `17173site` varchar(255) NOT NULL COMMENT '17173专区地址',
  `duowan` varchar(255) NOT NULL,
  `56pai` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='游戏列表' AUTO_INCREMENT=2173 ;


-- --------------------------------------------------------

--
-- Table structure for table `tb_games_17173`
--

CREATE TABLE IF NOT EXISTS `tb_games_17173` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(48) NOT NULL COMMENT '游戏名',
  `producer` char(50) NOT NULL COMMENT '厂商',
  `platform` char(1) NOT NULL COMMENT '平台',
  `platformtype` char(8) NOT NULL COMMENT '大平台类型',
  `year` char(4) NOT NULL COMMENT '年份',
  `17173` varchar(255) NOT NULL,
  `duowan` varchar(255) NOT NULL,
  `56pai` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='游戏列表' AUTO_INCREMENT=490 ;

