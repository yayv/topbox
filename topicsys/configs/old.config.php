<?php

$CONFIG = array();
$CONFIG['theme'] = 'v/default';
$CONFIG['compiled_template'] = 'v/_run';

$CONFIG['baseurl'] = 'http://topbox.localhost';
$CONFIG['sitename'] = '塔普播客';

$CONFIG['database'] = array(
	'host' 		=> '127.0.0.1',
	'port' 		=> '3306',
	'username' 	=> 'root',
	'password' 	=> '1234',
	'database' 	=> 'topbox',
	);


//---------[ 本段为服务器环境配置 ]---------------------------------------------
// 正式服务器运行配置
$config['active.local.lvren.cn'] = array(
	// ---[  系统相关  ]---
	'include_separator' => ':',

	// 专题系统在本虚拟主机下的目录，问题:如果是alias的目录怎么办？
	'basedir'  => '/topicsys',   
	// 发布的专题所在的目录
	'topicdir' => '/Data/webapps/active.lvren.cn', 
	// 系统的根URL
	'baseurl'  => 'http://active.local.lvren.cn/topicsys', 
	// 专题发布的根URL
	'topicurl' => 'http://active.local.lvren.cn',  
    //  专题资源包上传路径
	'uploaddir' => '/Data/upload',

	// 数据库
	'dbserver' => 'dbserver_sns',
	'database' => 'topicsys',
	'dbuser'   => 'LVRN',
	'dbpass'   => 'aCim3)J9n$M',

	// ----[ smarty  ]---
	// 主题样式
	'theme'    => 'default',     
	'compile_dir'=>'templates_c',   

	// 一些默认值
	'defaultdynamicdata' => 'vote.dump',
	'defaultstaticdata' =>  'data.dump',
);



// alpha环境需要的配置
$config['active.office.lvren.cn'] = array(
	// ---[  系统相关  ]---
	'include_separator' => ':',

	// 专题系统在本虚拟主机下的目录，问题:如果是alias的目录怎么办？
	'basedir'  => '/topicsys',   
	// 发布的专题所在的目录
	'topicdir' => '/Data/webapps/active.lvren.cn', 
	// 系统的根URL
	'baseurl'  => 'http://active.office.lvren.cn/topicsys', 
	// 专题发布的根URL
	'topicurl' => 'http://active.office.lvren.cn',  
    //  专题资源包上传路径
	'uploaddir' => '/Data/upload',

	// 数据库
	'dbserver' => 'dbserver_sns',
	'database' => 'topicsys',
	'dbuser'   => 'LVRN',
	'dbpass'   => 'aCim3)J9n$M',

	// ----[ smarty  ]---
	// 主题样式
	'theme'    => 'default',     
	'compile_dir'=>'templates_c',   

	// 一些默认值
	'defaultdynamicdata' => 'vote.dump',
	'defaultstaticdata' =>  'data.dump',
);

// 正式服务器运行配置
$config['active.lvren.cn'] = array(
	// ---[  系统相关  ]---
	'include_separator' => ':',

	// 专题系统在本虚拟主机下的目录，问题:如果是alias的目录怎么办？
	'basedir'  => '/topicsys',   
	// 发布的专题所在的目录
	'topicdir' => '/Data/webapps/active.lvren.cn', 
	// 系统的根URL
	'baseurl'  => 'http://active.lvren.cn/topicsys', 
	// 专题发布的根URL
	'topicurl' => 'http://active.lvren.cn',  
    //  专题资源包上传路径
	'uploaddir' => '/Data/upload',

	// 数据库
	'dbserver' => 'dbserver_sns',
	'database' => 'topicsys',
	'dbuser'   => 'LVRN',
	'dbpass'   => 'aCim3)J9n$M',

	// ----[ smarty  ]---
	// 主题样式
	'theme'    => 'default',     
	'compile_dir'=>'templates_c',   

	// 一些默认值
	'defaultdynamicdata' => 'vote.dump',
	'defaultstaticdata' =>  'data.dump',
);

// 正式服务器运行配置, 我自己的服务器
$config['www.pyapp.com'] = array(
	// ---[  系统相关  ]---
	'include_separator' => ':',

	// 专题系统在本虚拟主机下的目录，问题:如果是alias的目录怎么办？
	'basedir'  => '/topicsys',   
	// 发布的专题所在的目录
	'topicdir' => '/home/content/33/5762633/html/', 
	// 系统的根URL
	'baseurl'  => 'http://www.pyapp.com/topicsys', 
	// 专题发布的根URL
	'topicurl' => 'http://www.pyapp.com',  
    //  专题资源包上传路径
	'uploaddir' => '/home/content/33/5762633/html/Data/upload',

	// 数据库
    'dbserver' => 'topicsys.db.5762633.hostedresource.com',
	'database' => 'topicsys',
	'dbuser'   => 'topicsys', 
	'dbpass'   => 'MyCmsDb2',

	// ----[ smarty  ]---
	// 主题样式
	'theme'    => 'default',     
	'compile_dir'=>'templates_c',   

	// 一些默认值
	'defaultdynamicdata' => 'vote.dump',
	'defaultstaticdata' =>  'data.dump',
);



// 本地开发环境需要的配置
$config['topicsys.localhost'] = array(
	'include_separator' => ';',
	'basedir'  => '/topicsys', # 如果虚拟主机不是域名的根目录，则需要配置
	'baseurl'  => 'http://topicsys.localhost/',
	'topicdir' => 'e:/web',
	'topicurl' => 'http://topicsys.localhost/',
     //  专题资源包上传路径
	'uploaddir' => 'e:/web/upload',

  
     //数据库
	'dbserver' => 'localhost',
	'database' => 'topicsys',
	'dbuser'   => 'root',
	'dbpass'   => '1234',

	'compile_dir'=>'templates_c',   
	'theme'    => 'default',


	'defaultdynamicdata' => 'vote.dump',
	'defaultstaticdata' =>  'data.dump',

	'SVN' => array(
		'reposurl' => 'http://svn.lvren.cn/active.lvren.cn/trunk',
		'svncommand' => 'svn',
		'svnuser' => '',
		'svnpass' => '',
	),
);

// 本地开发环境需要的配置
$config['topic.ubuntu.lvren.cn'] = array(
	'include_separator' => ':',
	'basedir'  => '',
	'baseurl'  => 'http://topic.ubuntu.lvren.cn',
	'topicdir' => '/var/www/active.local.lvren.cn',
	'topicurl' => 'http://active.local.lvren.cn',

	'dbserver' => 'localhost',
	'database' => 'topicsys',
	'dbuser'   => 'root',
	'dbpass'   => '1234',

	'smarty'   => 'themes',
	'theme'    => 'default',
	'compile_dir'=>'templates_c',   

	'defaultdynamicdata' => 'vote.dump',
	'defaultstaticdata' =>  'data.dump',

	'SVN' => array(
		'reposurl' => 'http://svn.lvren.cn/active.lvren.cn/trunk',
		'svncommand' => 'svn',
		'svnuser' => '',
		'svnpass' => '',
	),
);


// 配置参数说明
$config['host'] = array(
	'dbserver' => 'localhost', #数据库服务器地址
	'database' => 'users',     #数据库名
	'dbuser' => 'root',        #数据库用户名
	'dbpass' => '',            #数据库口令
		
	'smarty' => 'themes',      #模板目录
	'theme' => 'default',      #模板主题
	'baseurl' => 'http://x.x', #专题系统运行的URL
	'topicdir' => '/var/',     #保存专题的目录,要/结尾
	'topicurl' => 'www.com/',  #专题的访问URL
	'compile_dir'=>'./templates_c', # smarty编译目录，需要加入到include_path中  

	'SVN' => array(            #svn仓库相关配置
		'reposurl' => 'http://svn.lvren.cn/active.lvren.cn/trunk',
		'svncommand' => 'svn',
		'svnuser' => '',
		'svnpass' => '',
	),
);

//---------[ 本段为服务器安全配置 ]---------------------------------------------
$allowips = array('58.30.38.94','127.0.0.1');


//---------[ 本段为模板条件配置 ]-----------------------------------------------

// 用来解析smarty模板文件的相关正则表达式, 现在的算法不支持嵌套,
// 也无法追踪{include}
$template_tags = array();

$template_tags['attr']['showname'] = "/\s*showname\s*=\s*\'([^\']+)\'/i";
$template_tags['attr']['alt']      = "/\s*alt\s*=\s*\'([^\']+)\'/i";

$template_tags['variables'] = "/\{\\\$(\w+)/i";

$template_tags['inloop_start'][0] = "/\{foreach /i";
$template_tags['inloop_start'][1] = "/\{section /i";

$template_tags['inloop_var'][0] = "/ from\s*=\s*\\\$(\w+)/i";
$template_tags['inloop_var'][1] = "/ loop\s*=\s*\\\$(\w+)/i";

$template_tags['inloop_end'][0] = "/\{\/foreach\}/i";
$template_tags['inloop_end'][1] = "/\{\/section\}/i";


//--------[ 也许还有其他配置选项 ]----------------------------------------------
// 可用全局变量
// $HOME         根目录
// $DB_Mailsys   数据库对象

