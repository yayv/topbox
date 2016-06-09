<?php

$CONFIG = array();
$CONFIG['theme']	= 'v/manage';
$CONFIG['compiled_template'] = 'v/_run';

$CONFIG['baseurl']	= 'http://www.topcms.topbox.localhost';
$CONFIG['indexpage']= 'http://www.topcms.topbox.localhost/manage/';
$CONFIG['sitename']	= '塔普播客';

$CONFIG['exmailkey']	= '652fc190a09123d34e0c877f50b748d3';
$CONFIG['exmailacc']	= 'mail1';

$CONFIG['QQAPPID']		= '101119090';
$CONFIG['QQAPPKEY']		= '48f5eef826f688780920b7346591d4cd';

$CONFIG['database'] = array(
	'host' 		=> '127.0.0.1',
	'port' 		=> '3306',
	'username' 	=> 'root',
	'password' 	=> 'root',
	'database' 	=> 'topbox',
	);


	// ---[  系统相关  ]---
$CONFIG['include_separator'] = ':';

	// 专题系统在本虚拟主机下的目录，问题:如果是alias的目录怎么办？
$CONFIG['basedir']  = '/';  
	// 发布的专题所在的目录
$CONFIG['topicdir'] = '/Data/webapps/minisites/';

	// 专题发布的根URL
$CONFIG['topicurl'] = 'http://www.topbox.localhost/minisite';
    //  专题资源包上传路径
$CONFIG['uploaddir']= '/Data/webapps/minisites/data/upload';

	// ----[ smarty  ]---
	// 主题样式
$CONFIG['compile_dir']		='templates_c';   

	// 一些默认值
$CONFIG['defaultdynamicdata']= 'vote.dump';
$CONFIG['defaultstaticdata'] =  'data.dump';


// 配置参数说明
$CONFIG['host'] = array(
	'dbserver' => 'localhost', #数据库服务器地址
	'database' => 'users',     #数据库名
	'dbuser'   => 'root',        #数据库用户名
	'dbpass'   => '',            #数据库口令
		
	'smarty'   => 'themes',      #模板目录
	'theme'    => 'default',      #模板主题
	'baseurl'  => 'http://x.x', #专题系统运行的URL
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