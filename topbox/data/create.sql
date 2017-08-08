-- MySQL dump 10.13  Distrib 5.6.26, for osx10.8 (x86_64)
--
-- Host: localhost    Database: topbox
-- ------------------------------------------------------
-- Server version	5.6.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cake_contents`
--

DROP TABLE IF EXISTS `cake_contents`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cake_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `subtitle` varchar(50) NOT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='资源内容表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cake_contents`
--

LOCK TABLES `cake_contents` WRITE;
/*!40000 ALTER TABLE `cake_contents` DISABLE KEYS */;
INSERT INTO `cake_contents` VALUES (1,'保险公司倒闭了，怎么办？','',0,'baoxiangongsidaobizenmeban','保险公司倒闭了，怎么办？','实际上，在选择时需要考虑的因素并不多。其实通过简单的分类，就可以将选择范围缩小到可控制的几个技术组合内，进而将每种技术与正确的应用范围相对应。<br><br>首先，你得了解「技术栈（tech stack）」的定义。<br><br><b>一.什么是技术栈？<br>技术栈是用于创建 Web 或移动应用的软件产品与编程语言的组合。应用通常包含两个软件组件：客户端与服务端，也称为前端与后端。<br></b><br>拒绝「技术栈」选择恐惧症<br><br>应用的每一层都建立在其下一层的功能基础上，整体构成了一个栈。上图显示了典型技术栈的主要区块，但是也可以包含其他支持组件。<br><br>二.后端技术栈<br>后端包含驱动应用运转的业务逻辑。用户永远都不会与后端直接交互，所有的信息都通过前端来传递。<br><br>最著名的后端技术栈要属 「LAMP 栈」（Linux, Apache, MySQL, PHP）。最近，该栈也出现一些变形：使用 Ruby 或 Python 取代 PHP 编程语言。<br><br>选择编程语言时得选定对应的 Web 框架。框架用处极大，能为开发者提供多种经过审查的常见 Web 功能，包括用户验证、数据存取等，是的开发无需从零开始。<br><br>常见的 Web 框架有：<br><br>框架&nbsp;&nbsp; &nbsp;语言<br>Ruby on Rails&nbsp;&nbsp; &nbsp;Ruby<br>Django&nbsp;&nbsp; &nbsp;Python<br>Node.js&nbsp;&nbsp; &nbsp;Javascript<br>Laravel&nbsp;&nbsp; &nbsp;PHP<br>.NET&nbsp;&nbsp; &nbsp;C#','text/html','',0,0,0,0,0,'','原创','刘策','刘策'),(2,'测试创建文件','发表一篇文章',0,'test','content contents ',NULL,'','',0,0,0,0,0,'http://www.pyapp.com','','liuce','Liuce'),(3,'','',0,'','',NULL,'','',0,0,0,0,0,'','','',''),(4,'1','2',0,'3','4','<br>','','',0,0,0,0,0,'','','','5');
/*!40000 ALTER TABLE `cake_contents` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cake_video`
--

DROP TABLE IF EXISTS `cake_video`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cake_video` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `author` varchar(16) NOT NULL,
  `cover` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cake_video`
--

LOCK TABLES `cake_video` WRITE;
/*!40000 ALTER TABLE `cake_video` DISABLE KEYS */;
/*!40000 ALTER TABLE `cake_video` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portal_data_inproject`
--

DROP TABLE IF EXISTS `portal_data_inproject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portal_data_inproject` (
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
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portal_data_inproject`
--

LOCK TABLES `portal_data_inproject` WRITE;
/*!40000 ALTER TABLE `portal_data_inproject` DISABLE KEYS */;
INSERT INTO `portal_data_inproject` VALUES (17,'content','single',1,1427168202,'title1','http://www.baidu.com','','','',1427168202,''),(17,'idx','list',1,1427169362,'1','','','','',1427169362,''),(17,'idx','list',2,1501717286,'2','http://baidu.com','','','',1501717286,''),(17,'idx','list',3,1427169372,'3','','','','',1427169372,''),(17,'title','single',1,1427168179,'这里才是标题','','','','',1427168179,''),(26,'testloop','list',1,1467639758,'新闻第一条','http://www.baidu.com','','','',1467639758,''),(26,'testloop','list',2,1467639813,'新闻第二条','http://www.fblife.com','','','',1467639813,''),(26,'testloop','list',3,1467641512,'新闻第三条','','','','',1467641512,''),(26,'testloop','list',4,1467641521,'新闻第四条','','','','',1467641521,''),(26,'testloop','list',5,1467641530,'新闻第五条','','','','',1467641530,''),(26,'testloop','list',6,1467641539,'新闻第五条','','','','',1467641539,''),(26,'testloop','list',7,1467641547,'新闻第六条','','','','',1467641547,''),(26,'testloop','list',8,1467641584,'新闻第七条','','','','',1467641584,''),(26,'testloop','list',9,1467641593,'新闻第八条','','','','',1467641593,''),(26,'testloop','list',10,1467641600,'新闻第九条','','','','',1467641600,''),(26,'testloop','list',11,1467641609,'新闻第十条','','','','',1467641609,''),(26,'testloop','list',12,1467641622,'新闻第十一条','','','','',1467641622,''),(26,'testloop','list',13,1467641631,'新闻第十二条','','','','',1467641631,''),(26,'testloop','list',14,1467641639,'新闻第十三条','','','','',1467641639,''),(26,'testloop','list',15,1467805187,'新闻第十四条','','','','',1467805187,''),(26,'testloop','list',16,1467805196,'新闻第十五条','','','','',1467805196,''),(26,'testloop','list',17,1467805204,'新闻第十六条','','','','',1467805204,''),(26,'testloop','list',18,1467805212,'新闻第十七条','','','','',1467805212,''),(26,'testloop','list',19,1467805222,'新闻第十八条','','','','',1467805222,''),(26,'testloop','list',20,1467805232,'新闻第十九条','','','','',1467805232,''),(26,'testloop','list',21,1467805247,'二十一条了','','','','',1467805247,''),(26,'title','single',1,1467602386,'1','11','1','1','1',1467602386,''),(33,'copyright','single',0,1502004039,'copyright','','','Beijing Dongshiwen Network Technology Ltd. Co. 2014-2017','',1502004039,''),(33,'focus','single',0,1501997987,'TopBox内容管理系统','','','一个使用PHP语言开发的内容关系系统(CMS), 系统以tinycake框架为基础进行开发，包括爬虫、内容编辑、媒体资源管理、标签管理、专题系统、人员管理、用户管理等功能组成，并计划在后续版本再加入更多的插件功能','',1501997987,''),(33,'links','list',1,1502000528,'汽车星球','http://auto.life','','','',1502000528,''),(33,'links','list',2,1502000548,'魔驼汽配','http://motorstore.cn','','','',1502000548,''),(33,'products','list',1,1501997547,'tinycake','','','一个非常简洁紧凑的php开发框架','',1501997547,''),(33,'products','list',2,1501997662,'Install系统','','','开发tinycake框架时，作者做为样例开发的一个小系统。他所实现的核心功能是管理用tinycake框架开发的各种系统，并对这些系统的代码和日志进行分析和管理。完全不依赖数据库就可以运行。','',1501997662,''),(33,'products','list',3,1502000051,'TopticSys','','','TopicSys是一个专题管理系统，可以根据smarty模版自动提取变量，并生成到编辑页面供编辑直接进行操作。','',1502000051,''),(33,'products','list',4,1502012585,'刘策的私人Blog','','','刘策，本站作者。他的个人blog记录了他对一些事情的思考和看法。','',1502012585,''),(33,'products','list',5,1502012614,'脑暴公会','','','刘策维护的一个微信公众号。','',1502012614,''),(33,'products','list',6,1502012633,'关于作者','','','本站作者的自我介绍','',1502012633,''),(33,'title','single',0,1502115876,'PYAPP.com - Programmer‘s Yammy APPs','http://www.pyapp.com','','hi hahaha','',1502115876,'');
/*!40000 ALTER TABLE `portal_data_inproject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portal_datagroup_inproject`
--

DROP TABLE IF EXISTS `portal_datagroup_inproject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portal_datagroup_inproject` (
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
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portal_datagroup_inproject`
--

LOCK TABLES `portal_datagroup_inproject` WRITE;
/*!40000 ALTER TABLE `portal_datagroup_inproject` DISABLE KEYS */;
INSERT INTO `portal_datagroup_inproject` VALUES (96,17,'title','single',' 网页标题',' 网页标题','这里只写标题文字就够了,其他不用填写',NULL,'','manual','',1),(97,17,'content','single','内容部分','内容部分','content',NULL,'','manual','',1),(100,17,'idx','list','idx','循环演示','idx',NULL,'','manual','',1),(101,26,'testloop','list','testloop','轮播图','testloop',NULL,'','manual','',1),(102,26,'title','single','页面标题','页面标题','title',NULL,'','manual','',1),(103,33,'title','single','pyapp网站首页标题','首页标题','title',NULL,'','manual','',1),(105,33,'productname','single','产品名称','产品名称','产品页的产品名称，包括产品名称、产品介绍、图片MxN',NULL,'','manual','',1),(106,33,'products','list','产品列表','产品列表','这里需要3、6、9等3的倍数项内容，包括标题和介绍',NULL,'','manual','',1),(107,33,'focus','single','首页头条内容','首页头条内容','目前只有一条内容，包括标题和介绍',NULL,'','manual','',1),(108,33,'copyright','single','版权信息','版权信息','example: Beijing Dongshiwen Network Tech Ltd. Co. 2014-2017',NULL,'','manual','',1),(110,33,'links','list','友情链接','友情链接','10条外链, 包括标题和连接, alt做提示信息',NULL,'','manual','',1);
/*!40000 ALTER TABLE `portal_datagroup_inproject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portal_imageupload_inproject`
--

DROP TABLE IF EXISTS `portal_imageupload_inproject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portal_imageupload_inproject` (
  `projectid` int(11) NOT NULL,
  `datagroupname` varchar(128) NOT NULL,
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `dateline` datetime NOT NULL,
  PRIMARY KEY (`projectid`,`datagroupname`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portal_imageupload_inproject`
--

LOCK TABLES `portal_imageupload_inproject` WRITE;
/*!40000 ALTER TABLE `portal_imageupload_inproject` DISABLE KEYS */;
/*!40000 ALTER TABLE `portal_imageupload_inproject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portal_pages_inproject`
--

DROP TABLE IF EXISTS `portal_pages_inproject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portal_pages_inproject` (
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
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portal_pages_inproject`
--

LOCK TABLES `portal_pages_inproject` WRITE;
/*!40000 ALTER TABLE `portal_pages_inproject` DISABLE KEYS */;
INSERT INTO `portal_pages_inproject` VALUES (16,17,14,'首页 ','index.html','static','','<?php\r\n\r\n		//processData() is the main function, do NOT change the function name\r\n\r\n		function processData($static, $dynamic){\r\n			# code ....	\r\n		}\r\n			'),(17,17,14,'啊啊','page.html','dynamic','hook_page.html','<?php\r\n\r\n		//processData() is the main function, do NOT change the function name\r\n\r\n		function processData($static, $dynamic){\r\n			# code ....	\r\n		}\r\n			\r\n'),(18,26,16,'首页','index.html','static','','<?php\n\n		//processData() is the main function, do NOT change the function name\n\n		function processData($static, $dynamic){\n			# code ....	\n		}\n			'),(19,33,17,'首页','index.html','static','','<?php\n\n		//processData() is the main function, do NOT change the function name\n\n		function processData($static, $dynamic){\n			# code ....	\n		}\n			');
/*!40000 ALTER TABLE `portal_pages_inproject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portal_templates`
--

DROP TABLE IF EXISTS `portal_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portal_templates` (
  `templateid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `preview` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `group` varchar(50) NOT NULL,
  `type` char(10) NOT NULL,
  PRIMARY KEY (`templateid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portal_templates`
--

LOCK TABLES `portal_templates` WRITE;
/*!40000 ALTER TABLE `portal_templates` DISABLE KEYS */;
/*!40000 ALTER TABLE `portal_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portal_templates_inproject`
--

DROP TABLE IF EXISTS `portal_templates_inproject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portal_templates_inproject` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `from_templateid` int(11) NOT NULL,
  `templatename` varchar(50) NOT NULL,
  `templatefile` varchar(50) NOT NULL,
  `hookfile_content` text NOT NULL COMMENT 'hook filename formatï¼šhook_dynamicfilename',
  `content` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `projectid` (`projectid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portal_templates_inproject`
--

LOCK TABLES `portal_templates_inproject` WRITE;
/*!40000 ALTER TABLE `portal_templates_inproject` DISABLE KEYS */;
INSERT INTO `portal_templates_inproject` VALUES (14,17,0,'首页模板','index.tpl.html','','<html>\r\n<head>\r\n<title>{$title->title showname=\' 网页标题\' alt=\'这里只写标题文字就够了,其他不用填写\'}</title>\r\n</head>\r\n<body>\r\n<h2><a href=\'{$content->url showname=\'内容部分\'}\' title=\'{$content->alt}\'>{$content->title}</a></h2>\r\n{section name=i loop=$idx}\r\n{$index[i]->title showname=\'演示一个循环\' alt=\'只有标题\'}\r\n{/section}\r\n</body>\r\n</html>\r\n'),(16,26,0,'首页模板','index.templates','','{$title->title showname=\'页面标题\'}\r\n\r\n{section loop=$testloop name=a}\r\n1\r\n{/section}'),(17,33,0,'首页模板','index.templates','','<!DOCTYPE html>\r\n<html lang=\"en\">\r\n  <head>\r\n    <meta charset=\"utf-8\">\r\n    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">\r\n    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->\r\n    <meta name=\"description\" content=\"\">\r\n    <meta name=\"author\" content=\"\">\r\n    <link rel=\"icon\" href=\"../../favicon.ico\">\r\n\r\n    <title>{$title->title showname=\'pyapp网站首页标题\' }</title>\r\n\r\n    <!-- Bootstrap core CSS -->\r\n    <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css\">\r\n\r\n    <!-- Custom styles for this template -->\r\n    <link href=\"/homepage/offcanvas.css\" rel=\"stylesheet\">\r\n\r\n    <!-- Just for debugging purposes. Don\'t actually copy these 2 lines! -->\r\n    <!--[if lt IE 9]><script src=\"/homepage/ie8-responsive-file-warning.js\"></script><![endif]-->\r\n    <script src=\"/homepage/ie-emulation-modes-warning.js\"></script>\r\n\r\n    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->\r\n    <!--[if lt IE 9]>\r\n      <script src=\"https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js\"></script>\r\n      <script src=\"https://oss.maxcdn.com/respond/1.4.2/respond.min.js\"></script>\r\n    <![endif]-->\r\n  </head>\r\n\r\n  <body>\r\n    <nav class=\"navbar navbar-fixed-top navbar-inverse\">\r\n      <div class=\"container\">\r\n        <div class=\"navbar-header\">\r\n          <button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#navbar\" aria-expanded=\"false\" aria-controls=\"navbar\">\r\n            <span class=\"sr-only\">Toggle navigation</span>\r\n            <span class=\"icon-bar\"></span>\r\n            <span class=\"icon-bar\"></span>\r\n            <span class=\"icon-bar\"></span>\r\n          </button>\r\n          <a class=\"navbar-brand\" href=\"#\">PYAPP</a>\r\n        </div>\r\n        <div id=\"navbar\" class=\"collapse navbar-collapse\">\r\n          <ul class=\"nav navbar-nav\">\r\n            <li class=\"active\"><a href=\"#\">首页</a></li>\r\n            <li><a href=\"#about\">About</a></li>\r\n            <li><a href=\"#contact\">Contact</a></li>\r\n          </ul>\r\n        </div><!-- /.nav-collapse -->\r\n      </div><!-- /.container -->\r\n    </nav><!-- /.navbar -->\r\n\r\n    <div class=\"container\">\r\n\r\n      <div class=\"row row-offcanvas row-offcanvas-right\">\r\n\r\n        <div class=\"col-xs-12 col-sm-9\">\r\n          <p class=\"pull-right visible-xs\">\r\n            <button type=\"button\" class=\"btn btn-primary btn-xs\" data-toggle=\"offcanvas\">Toggle nav</button>\r\n          </p>\r\n          <div class=\"jumbotron\">\r\n            <h1>{$focus->title showname=\'首页头条内容\' alt=\'目前只有一条内容，包括标题和介绍\'}</h1>\r\n            <p>{$focus->abstract showname=\'首页头条内容\' alt=\'目前只有一条内容，包括标题和介绍\'}</p>\r\n          </div>\r\n          <div class=\"row\">\r\n          {section loop=$products name=idx showname=\'产品列表\' alt=\'这里需要3、6、9等3的倍数项内容，包括标题和介绍\'}\r\n            <div class=\"col-xs-6 col-lg-4\">\r\n              <h2>{$products[idx]->title}</h2>\r\n              <p>{$products[idx]->abstract}</p>\r\n              <p><a class=\"btn btn-default\" href=\"{$products[idx]->url}\" role=\"button\">更多介绍 »</a></p>\r\n            </div><!--/.col-xs-6.col-lg-4-->\r\n          {/section}\r\n          </div><!--/row-->\r\n        </div><!--/.col-xs-12.col-sm-9-->\r\n\r\n        <div class=\"col-xs-6 col-sm-3 sidebar-offcanvas\" id=\"sidebar\">\r\n          <div class=\"list-group\">\r\n          {*\r\n            example : <a href=\"#\" class=\"list-group-item active\">Link</a>\r\n          *}\r\n          {section loop=$links name=idx2 showname=\'友情链接\' alt=\'10条外链, 包括标题和连接, alt做提示信息\'}  \r\n            <a href=\"{$links[idx2]->url}\" class=\"list-group-item\" title=\'{$links[idx2]->alt}\'>{$links[idx2]->title}</a>\r\n          {/section}\r\n          </div>\r\n        </div><!--/.sidebar-offcanvas-->\r\n      </div><!--/row-->\r\n\r\n      <hr>\r\n\r\n      <footer>\r\n        <p>©{$copyright->abstract showname=\'版权信息\' alt=\'example: Beijing Dongshiwen Network Tech Ltd. Co. 2014-2017\'}</p>\r\n      </footer>\r\n\r\n    </div><!--/.container-->\r\n\r\n\r\n    <!-- Bootstrap core JavaScript\r\n    ================================================== -->\r\n    <!-- Placed at the end of the document so the pages load faster -->\r\n    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js\"></script>\r\n    <script src=\"http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js\"></script>\r\n    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js\"></script>\r\n\r\n    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->\r\n    <script src=\"/homepage/ie10-viewport-bug-workaround.js\"></script>\r\n\r\n    <script src=\"/homepage/offcanvas.js\"></script>\r\n  </body>\r\n</html>\r\n\r\n\r\n'),(18,33,0,'产品介绍页','productdetail.template','','{$productname->title showname=\'产品名称\' alt=\'产品页的产品名称，包括产品名称、产品介绍、图片MxN\'}\r\n');
/*!40000 ALTER TABLE `portal_templates_inproject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `portal_topics`
--

DROP TABLE IF EXISTS `portal_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `portal_topics` (
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
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `portal_topics`
--

LOCK TABLES `portal_topics` WRITE;
/*!40000 ALTER TABLE `portal_topics` DISABLE KEYS */;
INSERT INTO `portal_topics` VALUES (17,'演示','','延分 ','/Data/webapps/minisites/show2','http://show2.minisite.localhost','','s.dump','d.dump','','','刘策','2015-03-24 11:32:25'),(26,'首页','用来做网站首页的专题','liuce','./data/topics/indexpage','http://www.topbox.localhost/','','s.dump','d.dump','','','liuce','2016-07-03 15:29:03'),(33,'pyapp首页','好几年没有进展了，今年终于有了变化','liuce','/Data/webapps/minisites/pyapp.com','http://www.pyapp.localhost/','','s.dump','d.dump','','','liuce','2017-07-26 07:37:06');
/*!40000 ALTER TABLE `portal_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roach_result`
--

DROP TABLE IF EXISTS `roach_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roach_result` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(256) NOT NULL,
  `status` char(8) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `parses` varchar(255) NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roach_result`
--

LOCK TABLES `roach_result` WRITE;
/*!40000 ALTER TABLE `roach_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `roach_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roach_rules`
--

DROP TABLE IF EXISTS `roach_rules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roach_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `host` char(64) NOT NULL,
  `url_rule` varchar(256) NOT NULL,
  `callfunction` varchar(64) NOT NULL,
  `functiontype` char(8) NOT NULL,
  `parse_rule` varchar(256) NOT NULL,
  `interval` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `host` (`host`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roach_rules`
--

LOCK TABLES `roach_rules` WRITE;
/*!40000 ALTER TABLE `roach_rules` DISABLE KEYS */;
INSERT INTO `roach_rules` VALUES (1,'game.youku.com','/http\\:\\/\\/game\\.youku\\.com\\/index\\/lol/','saveContentPageUrl','list','/\\\"(http\\:\\/\\/v\\.youku\\.com\\/v_show\\/id_[a-zA-Z0-9]*\\.html)\\\"\\starget=\\\"video\\\"\\stitle=\\\"(.*)\\\"/',0),(2,'game.youku.com','/http\\:\\/\\/game\\.youku\\.com\\/index\\/lol/','saveListUrl','list','/<a href=\\\"(http\\:\\/\\/game\\.youku\\.com\\/index\\/lol\\/_page[0-9]*_[0-9]*\\.html)\\\"/',0);
/*!40000 ALTER TABLE `roach_rules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roach_todo`
--

DROP TABLE IF EXISTS `roach_todo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roach_todo` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roach_todo`
--

LOCK TABLES `roach_todo` WRITE;
/*!40000 ALTER TABLE `roach_todo` DISABLE KEYS */;
/*!40000 ALTER TABLE `roach_todo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_games`
--

DROP TABLE IF EXISTS `tb_games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_games` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='游戏列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_games`
--

LOCK TABLES `tb_games` WRITE;
/*!40000 ALTER TABLE `tb_games` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_games_17173`
--

DROP TABLE IF EXISTS `tb_games_17173`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_games_17173` (
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
) ENGINE=InnoDB AUTO_INCREMENT=490 DEFAULT CHARSET=utf8 COMMENT='游戏列表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_games_17173`
--

LOCK TABLES `tb_games_17173` WRITE;
/*!40000 ALTER TABLE `tb_games_17173` DISABLE KEYS */;
INSERT INTO `tb_games_17173` VALUES (1,'AION','','','','','http://aion.17173.com/','',''),(2,'傲神传','','','','','http://aszol.17173.com/','',''),(3,'暗黑之门','','','','','http://hga.17173.com/','',''),(4,'暗夜传说','','','','','http://xxg.17173.com/','',''),(5,'艾尔之光','','','','','http://els.17173.com/','',''),(6,'阿凡龙','','','','','http://avl.17173.com/','',''),(7,'暗黑纪元','','','','','http://ah.17173.com/','',''),(8,'霸王','','','','','http://ac.17173.com/','',''),(9,'碧雪情天','','','','','http://mygame.17173.com/bxqt/','',''),(10,'百年战争','','','','','http://bn.17173.com/','',''),(11,'八仙过海','','','','','http://8x.17173.com','',''),(12,'霸者无双','','','','','http://bzws.17173.com/','',''),(13,'兵王','','','','','http://bw.17173.com/','',''),(14,'冰火战歌','','','','','http://bh.17173.com/','',''),(15,'赤壁','','','','','http://chibi.17173.com/','',''),(16,'传奇','','','','','http://mir.17173.com/','',''),(17,'传说','','','','','http://saga.17173.com/','',''),(18,'传奇3','','','','','http://mir3.17173.com/','',''),(19,'彩虹岛','','','','','http://chd.17173.com','',''),(20,'传奇世界','','','','','http://woool.17173.com/','',''),(21,'传奇外传','','','','','http://mirs.17173.com/','',''),(22,'超级舞者','','','','','http://sdo.17173.com/','',''),(23,'宠物小精灵','','','','','http://xjlgame.17173.com/','',''),(24,'穿越','','','','','http://cy.17173.com','',''),(25,'苍天','','','','','http://ct.17173.com/','',''),(26,'宠物森林','','','','','http://forest.17173.com/','',''),(27,'超级跑跑','','','','','http://pao.17173.com/','',''),(28,'春秋Ｑ传','','','','','http://cq.17173.com/','',''),(29,'穿越火线','','','','','http://cf.17173.com/','',''),(30,'冲锋','','','','','http://rush.17173.com/','',''),(31,'创世OL','','','','','http://csol.17173.com','',''),(32,'春秋外传','','','','','http://cw.17173.com/','',''),(33,'传奇归来','','','','','http://mymir.17173.com/','',''),(34,'长江7号','','','','','http://cj7.17173.com/','',''),(35,'创世西游','','','','','http://csxy.17173.com','',''),(36,'沧海','','','','','http://canghai.17173.com/','',''),(37,'苍生','','','','','http://cangsheng.17173.com/','',''),(38,'传世群英传','','','','','http://qyz.17173.com/','',''),(39,'超能战联','','','','','http://cyphers.17173.com/','',''),(40,'苍穹之怒','','','','','http://cqzn.17173.com/','',''),(41,'出发OL','','','','','http://chufa.17173.com/','',''),(42,'大海战','','','','','http://navyfield.17173.com/','',''),(43,'大话西游3','','','','','http://xy3.17173.com','',''),(44,'大话西游2','','','','','http://xy.17173.com/','',''),(45,'大话战国','','','','','http://zg2.17173.com','',''),(46,'大话仙剑','','','','','http://xianjian.17173.com/','',''),(47,'刀剑笑','','','','','http://djx.17173.com/','',''),(48,'东方故事','','','','','http://df.17173.com/','',''),(49,'DOTA','','','','','http://dota.17173.com/','',''),(50,'刀剑','','','','','http://bo.17173.com','',''),(51,'地下城与勇士','','','','','http://dnf.17173.com','',''),(52,'大唐豪侠','','','','','http://dt.17173.com/','',''),(53,'帝国传奇','','','','','http://el.17173.com/','',''),(54,'刀剑英雄2','','','','','http://dj2.17173.com/','',''),(55,'大明龙权','','','','','http://dm.17173.com/','',''),(56,'东游记','','','','','http://dyj.17173.com/','',''),(57,'夺宝传世','','','','','http://bao.17173.com/','',''),(58,'大唐无双2','','','','','http://dt2.17173.com/','',''),(59,'东邪西毒','','','','','http://dxxd.17173.com/','',''),(60,'大话西游战歌','','','','','http://xyw.17173.com/','',''),(61,'地下城守护者OL','','','','','http://dk.17173.com/','',''),(62,'斗战神','','','','','http://dzs.17173.com/','',''),(63,'DOTA2','','','','','http://dota2.17173.com/','',''),(64,'刀剑2','','','','','http://d2.17173.com/','',''),(65,'独孤九剑','','','','','http://dgjj.17173.com/','',''),(66,'东海奇谭','','','','','http://dhqt.17173.com/','',''),(67,'第九大陆','','','','','http://c9.17173.com','',''),(68,'斗神','','','','','http://doushen.17173.com/','',''),(69,'大航海时代','','','','','http://dol.17173.com/','',''),(70,'渡仙','','','','','http://dx.17173.com/','',''),(71,'独孤求败','','','','','http://dgqb.17173.com/','',''),(72,'大荒传奇','','','','','http://dhcq.17173.com/','',''),(73,'斗破苍穹','','','','','http://dpol.17173.com','',''),(74,'大决战','','','','','http://djz.17173.com','',''),(75,'EVE','','','','','http://eve.17173.com','',''),(76,'2061','','','','','http://2061.17173.com','',''),(77,'恶魔法则','','','','','http://em.17173.com/','',''),(78,'封神榜','','','','','http://fscs.17173.com/','',''),(79,'凤舞天骄','','','','','http://fw.17173.com/','',''),(80,'疯狂赛车','','','','','http://kart.17173.com/','',''),(81,'飞天风云','','','','','http://ftfy.17173.com/','',''),(82,'反恐行动OL','','','','','http://xd.17173.com/','',''),(83,'富甲西游','','','','','http://fjxy.17173.com/','',''),(84,'封神世界','','','','','http://nabichina.17173.com/','',''),(85,'伏魔者','','','','','http://fm.17173.com/','',''),(86,'封神2','','','','','http://fengshen2.17173.com/','',''),(87,'反恐精英OL','','','','','http://cso.17173.com/','',''),(88,'','','','','','http://fh2.17173.com/','',''),(89,'凡人修仙传','','','','','http://fr.17173.com/','',''),(90,'封神榜3','','','','','http://fs3.17173.com/','',''),(91,'烽火情缘2','','','','','http://fh2.17173.com/','',''),(92,'风云','','','','','http://fy0.17173.com/','',''),(93,'封神','','','','','http://fengshen.17173.com/','',''),(94,'风色幻想','','','','','http://ago.17173.com/','',''),(95,'风暴战区','','','','','http://tf.17173.com/','',''),(96,'风云传奇','','','','','http://fycq.17173.com/','',''),(97,'QQ封神记','','','','','http://fsj.17173.com','',''),(98,'敢达','','','','','http://gd.17173.com/','',''),(99,'功夫小子','','','','','http://kk.17173.com/','',''),(100,'国粹麻将','','','','','http://guocui.17173.com/','',''),(101,'功夫世界','','','','','http://wokchina.17173.com/','',''),(102,'GT劲舞团2','','','','','http://jw2.17173.com/','',''),(103,'鬼吹灯','','','','','http://gcd.17173.com','',''),(104,'古域','','','','','http://gy.17173.com/','',''),(105,'光之冒险','','','','','http://gzmx.17173.com/','',''),(106,'功夫英雄','','','','','http://gfyx.17173.com/','',''),(107,'华夏','','','','','http://hx.17173.com/','',''),(108,'华夏II','','','','','http://hx2.17173.com/','',''),(109,'合金弹头Zero','','','','','http://newgame.17173.com/_metalslugzero/','',''),(110,'幻想大陆','','','','','http://fe.17173.com','',''),(111,'航海世纪','','','','','http://hhsj.17173.com/','',''),(112,'黄易群侠传','','','','','http://hy.17173.com','',''),(113,'幻想世界','','','','','http://hxsj.17173.com/','',''),(114,'海战集结号','','','','','http://hz.17173.com/','',''),(115,'幻灵游侠','','','','','http://hl.17173.com/','',''),(116,'海战传奇','','','','','http://hzcq.17173.com','',''),(117,'火力风暴','','','','','http://firestorm.17173.com/','',''),(118,'核金风暴','','','','','http://giga.17173.com/','',''),(119,'汉武大帝','','','','','http://hw.17173.com/','',''),(120,'火瀑','','','','','http://fire.17173.com/','',''),(121,'画皮2','','','','','http://hp2.17173.com/','',''),(122,'黄易群侠传2','','','','','http://hy2.17173.com','',''),(123,'幻灵仙境','','','','','http://hlxj.17173.com','',''),(124,'决战','','','','','http://droiyan.17173.com/','',''),(125,'剑仙','','','','','http://jianxian.17173.com/','',''),(126,'劲舞团','','','','','http://ddr.17173.com/','',''),(127,'街头篮球','','','','','http://fs.17173.com/','',''),(128,'剑侠情缘','','','','','http://jx.17173.com/','',''),(129,'剑侠情缘II','','','','','http://jx2.17173.com/','',''),(130,'剑侠世界','','','','','http://jxsj.17173.com/','',''),(131,'剑舞江南','','','','','http://jwjn.17173.com/','',''),(132,'金庸群侠传','','','','','http://jinyong.17173.com/','',''),(133,'剑圣','','','','','http://jsol.17173.com/','',''),(134,'九界','','','','','http://9j.17173.com/','',''),(135,'剑啸九州','','','','','http://jxjz.17173.com/','',''),(136,'机战','','','','','http://jz.17173.com/','',''),(137,'巨人','','','','','http://jr.17173.com/','',''),(138,'九洲英雄','','','','','http://9hero.17173.com/','',''),(139,'精灵复兴','','','','','http://pt.17173.com/','',''),(140,'机甲世纪','','','','','http://aoa.17173.com','',''),(141,'剑网3','','','','','http://jx3.17173.com/','',''),(142,'精灵乐章','','','','','http://djol.17173.com','',''),(143,'界王','','','','','http://jw.17173.com/','',''),(144,'剑雨','','','','','http://jianyu.17173.com/','',''),(145,'巨刃','','','','','http://jro.17173.com/','',''),(146,'剑灵','','','','','http://bns.17173.com','',''),(147,'聚仙','','','','','http://juxian.17173.com/','',''),(148,'九刃','','','','','http://9ren.17173.com/','',''),(149,'将军令','','','','','http://jjl.17173.com/','',''),(150,'极光世界','','','','','http://aiai.17173.com/','',''),(151,'精灵传说','','','','','http://jl.17173.com/','',''),(152,'极速轮滑','','','','','http://jslh.17173.com/','',''),(153,'九鼎传说','','','','','http://jd.17173.com/','',''),(154,'激战海陆空','','','','','http://pkhlk.17173.com/','',''),(155,'九阴真经','','','','','http://9yin.17173.com/','',''),(156,'精英部队','','','','','http://ef.17173.com/','',''),(157,'劲舞堂','','','','','http://au2.17173.com/','',''),(158,'九天神话','','','','','http://jtsh.17173.com','',''),(159,'疾风之刃','','','','','http://jf.17173.com','',''),(160,'抗战','','','','','http://pk1937.17173.com/','',''),(161,'开创世纪','','','','','http://kcsji.17173.com/','',''),(162,'开心','','','','','http://kx.17173.com/','',''),(163,'口袋西游','','','','','http://kdxy.17173.com/','',''),(164,'科洛斯II','','','','','http://cronous.17173.com','',''),(165,'空战世纪','','','','','http://kz.17173.com/','',''),(166,'昆仑OL','','','','','http://kl.17173.com/','',''),(167,'开心大陆','','','','','http://kxdl.17173.com/','',''),(168,'洛奇','','','','','http://mabinogi.17173.com/','',''),(169,'龙族','','','','','http://dragon.17173.com/','',''),(170,'龙影','','','','','http://ly.17173.com/','',''),(171,'鹿鼎记','','','','','http://ldj.17173.com/','',''),(172,'龙骑士','','','','','http://lqs.17173.com','',''),(173,'烈焰飞雪','','','','','http://lyfx.17173.com/','',''),(174,'流星花园','','','','','http://2046.17173.com/','',''),(175,'天空战记','','','','','http://sky.17173.com/','',''),(176,'恋爱盒子','','','','','http://lovebox.17173.com/','',''),(177,'炼狱','','','','','http://lianyu.17173.com','',''),(178,'亮剑','','','','','http://lj.17173.com/','',''),(179,'绿色征途','','','','','http://lszt.17173.com','',''),(180,'龙OL','','','','','http://loong.17173.com','',''),(181,'六脉神剑','','','','','http://6msj.17173.com/','',''),(182,'龙之谷','','','','','http://dn.17173.com/','',''),(183,'龙魂','','','','','http://lh.17173.com/','',''),(184,'龙腾世界','','','','','http://ltsj.17173.com/','',''),(185,'六道OL','','','','','http://6dol.17173.com/','',''),(186,'龙剑','','','','','http://ds.17173.com','',''),(187,'猎天','','','','','http://lietian.17173.com/','',''),(188,'狼队','','','','','http://wf.17173.com/','',''),(189,'猎国','','','','','http://lieguo.17173.com/','',''),(190,'流星蝴蝶剑','','','','','http://lx.17173.com/','',''),(191,'猎国','','','','','http://lieguo.17173.com/','',''),(192,'洛奇英雄传','','','','','http://mh.17173.com/','',''),(193,'猎刃','','','','','http://lieren.17173.com/','',''),(194,'浪漫Q唐','','','','','http://lmqt.17173.com/','',''),(195,'雷霆','','','','','http://leiting.17173.com/','',''),(196,'LUNA2','','','','','http://luna2.17173.com/','',''),(197,'烈焰行动','','','','','http://btr.17173.com/','',''),(198,'龙之传奇','','','','','http://lzcq.17173.com/','',''),(199,'黎明之光','','','','','http://lmzg.17173.com/','',''),(200,'零世界','','','','','http://worldzero.17173.com/','',''),(201,'裂天之刃','','','','','http://ltzr.17173.com','',''),(202,'龙门客栈','','','','','http://lmkz.17173.com','',''),(203,'墨香','','','','','http://moxiang.17173.com/','',''),(204,'猛将','','','','','http://mj.17173.com/','',''),(205,'魔法之门','','','','','http://mfm.17173.com','',''),(206,'梦幻龙族','','','','','http://ml.17173.com','',''),(207,'魔兽世界','','','','','http://wow.17173.com','',''),(208,'魔兽台服站','','','','','http://ctm.17173.com/','',''),(209,'梦幻国度','','','','','http://mland.17173.com/','',''),(210,'魔力宝贝','','','','','http://cg.17173.com/','',''),(211,'魔力宝贝II','','','','','http://cg2.17173.com/','',''),(212,'魔界2','','','','','http://mj2.17173.com/','',''),(213,'魔咒OL','','','','','http://mozhou.17173.com/','',''),(214,'魔域','','','','','http://moyu.17173.com/','',''),(215,'冒险岛','','','','','http://mxd.17173.com/','',''),(216,'猛将传','','','','','http://mjz.17173.com/','',''),(217,'梦想世界','','','','','http://mxsj.17173.com/','',''),(218,'魔神争霸','','','','','http://tianji.17173.com/','',''),(219,'明星3缺1','','','','','http://star31.17173.com/','',''),(220,'魔骑士','','','','','http://mqs.17173.com/','',''),(221,'梦三国','','','','','http://m3g.17173.com/','',''),(222,'梦回山海','','','','','http://mhsh.17173.com/','',''),(223,'萌战天下','','','','','http://mztx.17173.com/','',''),(224,'名将','','','','','http://mingjiang.17173.com/','',''),(225,'梦幻诛仙','','','','','http://mhzx.17173.com','',''),(226,'名将三国','','','','','http://wof.17173.com/','',''),(227,'魔神无双','','','','','http://ms.17173.com','',''),(228,'梦想岛','','','','','http://mx.17173.com','',''),(229,'梦幻迪士尼','','','','','http://dsn.17173.com/','',''),(230,'新飞飞','','','','','http://ff.17173.com','',''),(231,'梦幻西游','','','','','http://xyq.17173.com','',''),(232,'梦幻昆仑','','','','','http://mhkl.17173.com/','',''),(233,'魔之精灵','','','','','http://mk.17173.com','',''),(234,'魔狱军团','','','','','http://chaosol.17173.com/','',''),(235,'麻辣江湖','','','','','http://mljh.17173.com/','',''),(236,'梦幻龙族2','','','','','http://ml.17173.com','',''),(237,'诺亚传说','','','','','http://nycs.17173.com','',''),(238,'NBA2K OL','','','','','http://nba2k.17173.com','',''),(239,'逆战','','','','','http://nz.17173.com/','',''),(240,'破天一剑','','','','','http://pcik.17173.com/','',''),(241,'泡泡堂','','','','','http://bnb.17173.com/','',''),(242,'飘流幻境','','','','','http://wl.17173.com/','',''),(243,'拍拍部落','','','','','http://paipai.17173.com','',''),(244,'跑跑卡丁车','','','','','http://popkart.17173.com/','',''),(245,'泡泡战士','','','','','http://bf.17173.com/','',''),(246,'蓬莱','','','','','http://penglai.17173.com/','',''),(247,'盘古战纪','','','','','http://pgzj.17173.com/','',''),(248,'奇迹','','','','','http://mu.17173.com/','',''),(249,'千年','','','','','http://1000y.17173.com/','',''),(250,'七龙珠','','','','','http://newgame.17173.com/_qilongzhu/','',''),(251,'奇迹世界','','','','','http://sun.17173.com/','',''),(252,'QQ飞行岛','','','','','http://nana.17173.com/','',''),(253,'QQ自由幻想','','','','','http://ffo.17173.com/','',''),(254,'什么什么大冒险','','','','','http://iuiuu.17173.com/','',''),(255,'倾国倾城','','','','','http://qg.17173.com','',''),(256,'QQ飞车','','','','','http://speed.17173.com','',''),(257,'QQ仙境','','','','','http://xj.17173.com/','',''),(258,'秦伤','','','','','http://qs.17173.com','',''),(259,'QQ华夏','','','','','http://qqhx.17173.com/','',''),(260,'QQ幻想','','','','','http://fo.17173.com/','',''),(261,'QQ堂','','','','','http://qqtang.17173.com/','',''),(262,'QQ音速','','','','','http://qqr2.17173.com/','',''),(263,'QQ炫舞','','','','','http://x5.17173.com/','',''),(264,'QQ三国','','','','','http://qqsg.17173.com','',''),(265,'倩女幽魂','','','','','http://qn.17173.com','',''),(266,'QQ仙侠传','','','','','http://xxz.17173.com','',''),(267,'QQ西游','','','','','http://qqxy.17173.com/','',''),(268,'奇侠传','','','','','http://qxz.17173.com/','',''),(269,'七龙珠','','','','','http://qlz.17173.com/','',''),(270,'全球使命','','','','','http://qqsm.17173.com/','',''),(271,'奇迹世界2','','','','','http://sun2.17173.com/','',''),(272,'乾坤在线','','','','','http://qkol.17173.com','',''),(273,'QQ仙灵','','','','','http://h2.17173.com/','',''),(274,'枪神纪','','','','','http://tps.17173.com/','',''),(275,'晴空物语','','','','','http://qkwy.17173.com','',''),(276,'热血江湖','','','','','http://rxjh.17173.com/','',''),(277,'热血英豪','','','','','http://bfo.17173.com/','',''),(278,'热舞派对','','','','','http://rwpd.17173.com/','',''),(279,'热血天下','','','','','http://rx.17173.com/','',''),(280,'热血战队','','','','','http://rt.17173.com/','',''),(281,'忍龙','','','','','http://renlong.17173.com/','',''),(282,'神泣','','','','','http://shaiya.17173.com','',''),(283,'丝路传说','','','','','http://sro.17173.com/','',''),(284,'神鬼传奇','','','','','http://sgcq.17173.com/','',''),(285,'兽血外传','','','','','http://sx.17173.com/','',''),(286,'圣斗士OL','','','','','http://sds.17173.com/','',''),(287,'神武','','','','','http://sw.17173.com/','',''),(288,'神鬼世界','','','','','http://sgsj.17173.com/','',''),(289,' 三界奇缘','','','','','http://sj.17173.com/','',''),(290,'蜀山神话','','','','','http://sssh.17173.com/','',''),(291,'守护者OL','','','','','http://sh.17173.com/','',''),(292,'三国群英传2','','','','','http://sg2.17173.com/','',''),(293,'圣堂','','','','','http://st.17173.com/','',''),(294,'三国策','','','','','http://sgc.17173.com/','',''),(295,'生肖传说','','','','','http://12ha.17173.com/','',''),(296,'三国群英传','','','','','http://so.17173.com/','',''),(297,'圣灵传说','','','','','http://sns52.17173.com','',''),(298,'神兽','','','','','http://ssol.17173.com/','',''),(299,'蜀门','','','','','http://shumen.17173.com','',''),(300,'盛世OL','','','','','http://shengol.17173.com/','',''),(301,'十二之天2','','','','','http://12sky2.17173.com/','',''),(302,'三国鼎立','','','','','http://sgdl.17173.com/','',''),(303,'神骑世界','','','','','http://sko.17173.com/','',''),(304,'守护之剑','','','','','http://ga.17173.com','',''),(305,'圣道传奇','','','','','http://sdcq.17173.com/','',''),(306,'蜀山新传','','','','','http://ssxz.17173.com','',''),(307,'神魔大陆','','','','','http://shenmo.17173.com/','',''),(308,'神兵传奇','','','','','http://sbcq.17173.com/','',''),(309,'三国争霸','','','','','http://sgzb.17173.com/','',''),(310,'','','','','','http://sh3d.17173.com/','',''),(311,'十二封印','','','','','http://12fy.17173.com/','',''),(312,'神仙传','','','','','http://sxz.17173.com/','',''),(313,'上古世纪','','','','','http://age.17173.com','',''),(314,'神雕','','','','','http://shendiao.17173.com/','',''),(315,'隋唐演义','','','','','http://styy.17173.com/','',''),(316,'神魔传','','','','','http://smz.17173.com/','',''),(317,'神雕侠侣','','','','','http://sdxl.17173.com/','',''),(318,'轩辕剑','','','','','http://swd.17173.com/','',''),(319,'水浒无双','','','','','http://shuihu.17173.com/','',''),(320,'圣斗士2','','','','','http://sds2.17173.com/','',''),(321,'生化战场','','','','','http://woz.17173.com/','',''),(322,'圣境传说','','','','','http://fn.17173.com/','',''),(323,'三国游侠','','','','','http://sgyx.17173.com/','',''),(324,'圣斗士传说','','','','','http://sdscs.17173.com/','',''),(325,'时空裂痕','','','','','http://rift.17173.com/','',''),(326,'三国演义','','','','','http://sgyy.17173.com/','',''),(327,'圣魔之血','','','','','http://sm.17173.com/','',''),(328,'神话','','','','','http://sh3d.17173.com/','',''),(329,'神途','','','','','http://shentu.17173.com/','',''),(330,'神仙世界','','','','','http://sxsj.17173.com/','',''),(331,'圣域传奇','','','','','http://sycq.17173.com/','',''),(332,'石器时代','','','','','http://stoneage.17173.com/','',''),(333,'三国战魂','','','','','http://sgzh.17173.com/','',''),(334,'神话大陆','','','','','http://shenhua.17173.com','',''),(335,'蜀山剑侠传','','','','','http://ssjxz.17173.com','',''),(336,'圣斗士星矢','','','','','http://seiya.17173.com','',''),(337,'天子','','','','','http://tz.17173.com/','',''),(338,'天道','','','','','http://tiandao.17173.com/','',''),(339,'天堂','','','','','http://lineage.17173.com/','',''),(340,'天堂2','','','','','http://lineage2.17173.com/','',''),(341,'特勤队','','','','','http://tqd.17173.com','',''),(342,'投名状','','','','','http://tmz.17173.com/','',''),(343,'天使之恋','','','','','http://al.17173.com/','',''),(344,'天龙八部OL','','','','','http://tl.17173.com/','',''),(345,'天书奇谈','','','','','http://tianshu.17173.com/','',''),(346,'天源4591','','','','','http://4591.17173.com/','',''),(347,'屠魔','','','','','http://tumo.17173.com/','',''),(348,'天堂梦','','','','','http://ttm.17173.com/','',''),(349,'天骄','','','','','http://tj.17173.com/','',''),(350,'天骄2','','','','','http://tj2.17173.com/','',''),(351,'天下贰','','','','','http://tx2.17173.com','',''),(352,'铁血三国志','','','','','http://txsanguo.17173.com/','',''),(353,'吞食天地','','','','','http://tstd.17173.com/','',''),(354,'特种部队','','','','','http://sf.17173.com','',''),(355,'突击风暴','','','','','http://sa.17173.com/','',''),(356,'天境','','','','','http://5dtj.17173.com/','',''),(357,'天涯OL','','','','','http://tyol.17173.com/','',''),(358,'桃园','','','','','http://taoyuan.17173.com/','',''),(359,'桃花源记','','','','','http://thyj.17173.com/','',''),(360,'天子传奇','','','','','http://tzcq.17173.com/','',''),(361,'坦克世界','','','','','http://wot.17173.com','',''),(362,'TERA','','','','','http://tera.17173.com/','',''),(363,'天之痕','','','','','http://tzh.17173.com/','',''),(364,'天翼决','','','','','http://tyj.17173.com/','',''),(365,'吞食天地2','','','','','http://ts2.17173.com/','',''),(366,'天元','','','','','http://ty.17173.com/','',''),(367,'童梦OL','','','','','http://tm.17173.com/','',''),(368,'天朝','','','','','http://tianchao.17173.com/','',''),(369,'天下3','','','','','http://tx3.17173.com/','',''),(370,'铁血大宋','','','','','http://txds.17173.com/','',''),(371,'颓废之心','','','','','http://rh.17173.com','',''),(372,'天涯明月刀','','','','','http://wuxia.17173.com','',''),(373,'问道','','','','','http://asktao.17173.com/','',''),(374,'问鼎','','','','','http://wending.17173.com/','',''),(375,'舞街区','','','','','http://5jq.17173.com/','',''),(376,'完美世界','','','','','http://world2.17173.com/','',''),(377,'完美国际','','','','','http://w2i.17173.com/','',''),(378,'武林外传','','','','','http://wulin2.17173.com/','',''),(379,'唯舞独尊','','','','','http://we5.17173.com/','',''),(380,'武林群侠传','','','','','http://50.17173.com/','',''),(381,'王者世界','','','','','http://at.17173.com/','',''),(382,'武易','','','','','http://wuyi.17173.com/','',''),(383,'万王之王3','','','','','http://kok3.17173.com/','',''),(384,'我的小傻瓜','','','','','http://xiaoshagua.17173.com','',''),(385,'舞型舞秀','','','','','http://wxwx.17173.com/','',''),(386,'问情','','','','','http://wq.17173.com/','',''),(387,'武神','','','','','http://5shen.17173.com/','',''),(388,'武林至尊','','','','','http://wlzz.17173.com/','',''),(389,'王者','','','','','http://king.17173.com/','',''),(390,'巫师之怒','','','','','http://allods.17173.com/','',''),(391,'武魂','','','','','http://wh.17173.com/','',''),(392,'王者大陆','','','','','http://wzdl.17173.com/','',''),(393,'武林秘籍','','','','','http://wlmj.17173.com/','',''),(394,'希望','','','','','http://sealonline.17173.com/','',''),(395,'新魔界','','','','','http://mwo.17173.com/','',''),(396,'侠义道','','','','','http://xyd.17173.com/','',''),(397,'侠义道II','','','','','http://xyd2.17173.com','',''),(398,'仙侣奇缘II','','','','','http://xlqy2.17173.com','',''),(399,'新郑和OL','','','','','http://xzhonline.17173.com','',''),(400,'笑闹天宫','','','','','http://xn.17173.com','',''),(401,'西游记','','','','','http://xyol.17173.com/','',''),(402,'笑傲江湖','','','','','http://xajh.17173.com','',''),(403,'炫斗之王','','','','','http://xdzw.17173.com/','',''),(404,'西游3','','','','','http://xiyou3.17173.com/','',''),(405,'仙剑OL','','','','','http://pal.17173.com/','',''),(406,'仙界传','','','','','http://xjz.17173.com/','',''),(407,'仙境传说','','','','','http://ro.17173.com/','',''),(408,'星尘传说','','','','','http://xc.17173.com/','',''),(409,'逍遥传说','','','','','http://xycs.17173.com/','',''),(410,'星际文明','','','','','http://xjwm.17173.com','',''),(411,'仙途','','','','','http://xt.17173.com','',''),(412,'西游天下','','','','','http://xytx.17173.com/','',''),(413,'新水浒Q传','','','','','http://hero108.17173.com/','',''),(414,'轩辕剑','','','','','http://swd.17173.com/','',''),(415,'逍遥江湖','','','','','http://xyjh.17173.com/','',''),(416,'新密传','','','','','http://tantra.17173.com','',''),(417,'降龙之剑','','','','','http://xlzj.17173.com/','',''),(418,'星辰变','','','','','http://xcb.17173.com/','',''),(419,'星空之恋','','','','','http://xkzl.17173.com/','',''),(420,'寻仙','','','','','http://xunxian.17173.com/','',''),(421,' 新炫舞','','','','','http://xx5.17173.com','',''),(422,'星战','','','','','http://xz.17173.com/','',''),(423,'仙剑神曲','','','','','http://xjsq.17173.com/','',''),(424,'侠义世界','','','','','http://xyworld.17173.com/','',''),(425,'西游群英传','','','','','http://xyqyz.17173.com/','',''),(426,'仙魔','','','','','http://xm.17173.com/','',''),(427,'修魔','','','','','http://xiumo.17173.com/','',''),(428,'玄天之剑','','','','','http://xtzj.17173.com/','',''),(429,'星辰杀','','','','','http://sha.17173.com','',''),(430,'仙元天下','','','','','http://xytxol.17173.com','',''),(431,'','','','','','http://xunxian.17173.com/','',''),(432,'降龙之剑','','','','','http://xlzj.17173.com/','',''),(433,'轩辕传奇','','','','','http://xycq.17173.com/','',''),(434,'玄武','','','','','http://xuanwu.17173.com/','',''),(435,'降龙极致版','','','','','http://xljz.17173.com/','',''),(436,'仙OL','','','','','http://xian.17173.com/','',''),(437,'侠客列传','','','','','http://xklz.17173.com/','',''),(438,'新惊天动地','','','','','http://cabal.17173.com/','',''),(439,'仙侠世界','','','','','http://xxsj.17173.com/','',''),(440,'行星边际2','','','','','http://ps2.17173.com/','',''),(441,'QQ炫舞2','','','','','http://x52.17173.com','',''),(442,'邪域战灵','','','','','http://xyzl.17173.com','',''),(443,'英雄岛','','','','','http://yxd.17173.com/','',''),(444,'英雄II','','','','','http://hero2.17173.com','',''),(445,'预言','','','','','http://yuyan.17173.com/','',''),(446,'英雄无敌','','','','','http://yx.17173.com/','',''),(447,'倚天剑与屠龙刀','','','','','http://yt.17173.com/','',''),(448,'游戏人生','','','','','http://rs.17173.com/','',''),(449,'勇者斗斗龙','','','','','http://ddl.17173.com','',''),(450,'英雄年代2','','','','','http://yxnd2.17173.com/','',''),(451,'永恒之塔','','','','','http://aion.17173.com/','',''),(452,'勇者传说','','','','','http://yz.17173.com','',''),(453,'永久基地2','','','','','http://19base.17173.com/','',''),(454,'英雄联盟','','','','','http://lol.17173.com/','',''),(455,'勇士','','','','','http://dh.17173.com/','',''),(456,'佣兵天下','','','','','http://yb.17173.com/','',''),(457,'远征','','','','','http://yzol.17173.com/','',''),(458,'倚天屠魔','','','','','http://yttm.17173.com/','',''),(459,'倚天屠龙记','','','','','http://yitian.17173.com/','',''),(460,'御龙在天','','','','','http://yl.17173.com/','',''),(461,'月影传说','','','','','http://moon.17173.com/','',''),(462,'英雄三国','','','','','http://yxsg.17173.com/','',''),(463,'英雄美人','','','','','http://yxmr.17173.com/','',''),(464,'诛仙','','','','','http://zhuxian.17173.com/','',''),(465,'征途','','','','','http://zt.17173.com/','',''),(466,'征途怀旧','','','','','http://zthj.17173.com/','',''),(467,'征服','','','','','http://conquer.17173.com/','',''),(468,'纵横时空','','','','','http://mmochina.17173.com/','',''),(469,'壮志凌云','','','','','http://ace.17173.com/','',''),(470,'真三国无双','','','','','http://wsol.17173.com','',''),(471,'征途2S','','','','','http://zt2.17173.com/','',''),(472,'众神之战','','','','','http://zs.17173.com','',''),(473,'斩魂','','','','','http://zhanhun.17173.com/','',''),(474,'诸侯','','','','','http://zh.17173.com','',''),(475,'中华英雄','','','','','http://zhyx.17173.com/','',''),(476,'真爱西游','','','','','http://ai.17173.com/','',''),(477,'醉逍遥','','','','','http://zxy.17173.com/','',''),(478,'最终幻想14','','','','','http://ff14.17173.com','',''),(479,'战地之王','','','','','http://ava.17173.com','',''),(480,' 醉逍遥','','','','','http://zxy.17173.com/','',''),(481,'卓越之剑2','','','','','http://ge2.17173.com/','',''),(482,'中华龙塔','','','','','http://zhlt.17173.com/','',''),(483,'战OL','','','','','http://zhujiutx.17173.com/','',''),(484,'战地风云','','','','','http://zdfy.17173.com/','',''),(485,'纸片人','','','','','http://zpr.17173.com/','',''),(486,'诸神国度','','','','','http://zsgd.17173.com/','',''),(487,'战争前线','','','','','http://zzqx.17173.com/','',''),(488,'征程','','','','','http://zc.17173.com/','',''),(489,'醉八仙','','','','','http://zbx.17173.com/','','');
/*!40000 ALTER TABLE `tb_games_17173` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-08-09  0:51:09
