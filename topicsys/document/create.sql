-- phpMyAdmin SQL Dump
-- version 3.1.3
-- http://www.phpmyadmin.net
--
-- 主机: db_scenic
-- 生成日期: 2010 年 05 月 13 日 15:40
-- 服务器版本: 5.0.86
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `topicsys`
--

-- --------------------------------------------------------

--
-- 表的结构 `datagroup_inproject`
--

CREATE TABLE IF NOT EXISTS `datagroup_inproject` (
  `id` int(11) NOT NULL auto_increment,
  `projectid` int(11) NOT NULL,
  `name` varchar(128) NOT NULL COMMENT '此内容对应的版块名',
  `type` char(8) NOT NULL COMMENT '数据段的类型:单条,多条',
  `showname` varchar(50) NOT NULL,
  `userdefinedname` varchar(50) NOT NULL,
  `alt` varchar(500) NOT NULL,
  `members` text,
  `datasource` char(255) NOT NULL default '' COMMENT '数据来源，url或手工或程序处理的结果',
  `sourcetype` enum('manual','rss','json') NOT NULL,
  `updatetype` char(8) NOT NULL default '' COMMENT '更新方式',
  `reference` tinyint(1) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `projectid` (`projectid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- 表的结构 `data_inproject`
--

CREATE TABLE IF NOT EXISTS `data_inproject` (
  `projectid` int(11) NOT NULL,
  `datagroupname` varchar(128) NOT NULL COMMENT '此内容对应的版块名',
  `datagrouptype` char(8) NOT NULL COMMENT '数据段的类型:单条,多条',
  `id` int(11) NOT NULL,
  `orderingroup` int(11) NOT NULL COMMENT '此数据在本版块中的顺序号',
  `title` varchar(50) NOT NULL COMMENT '连接的文字',
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL COMMENT '题图',
  `abstract` text NOT NULL COMMENT '摘要',
  `alt` varchar(255) NOT NULL COMMENT '鼠标悬停文字',
  `dateline` int(11) NOT NULL,
  PRIMARY KEY  (`projectid`,`datagroupname`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `imageupload_inproject`
--

CREATE TABLE IF NOT EXISTS `imageupload_inproject` (
  `projectid` int(11) NOT NULL,
  `datagroupname` varchar(128) NOT NULL COMMENT '此内容对应的版块名',
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL COMMENT '题图',
  `dateline` datetime NOT NULL,
  PRIMARY KEY  (`projectid`,`datagroupname`,`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `pages_inproject`
--

CREATE TABLE IF NOT EXISTS `pages_inproject` (
  `id` int(11) NOT NULL auto_increment,
  `projectid` int(11) NOT NULL,
  `templateid` int(11) NOT NULL,
  `pagename` varchar(50) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `publishtype` char(10) NOT NULL,
  `user_hook_filename` varchar(50) NOT NULL default '',
  `hookfile_content` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `projectid` (`projectid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- 表的结构 `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(200) NOT NULL,
  `description` varchar(255) NOT NULL,
  `author` varchar(20) NOT NULL,
  `directory` varchar(32) NOT NULL,
  `url` varchar(250) NOT NULL,
  `group` varchar(50) NOT NULL,
  `staticdata` varchar(50) NOT NULL,
  `dynamicdata` varchar(50) NOT NULL,
  `dynamic_content` text NOT NULL,
  `zipname` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8  ;

-- --------------------------------------------------------

--
-- 表的结构 `templates`
--

CREATE TABLE IF NOT EXISTS `templates` (
  `templateid` int(11) NOT NULL auto_increment,
  `name` varchar(200) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `group` varchar(50) NOT NULL,
  `type` char(10) NOT NULL,
  PRIMARY KEY  (`templateid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 ;

-- --------------------------------------------------------

--
-- 表的结构 `templates_inproject`
--

CREATE TABLE IF NOT EXISTS `templates_inproject` (
  `id` int(11) NOT NULL auto_increment,
  `projectid` int(11) NOT NULL,
  `from_templateid` int(11) NOT NULL,
  `templatename` varchar(50) NOT NULL,
  `templatefile` varchar(50) NOT NULL,
  `hookfile_content` text NOT NULL COMMENT 'hook filename format：hook_dynamicfilename',
  `content` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `projectid` (`projectid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8  ;

