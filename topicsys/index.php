<?php
define('HOST', $_SERVER['HTTP_HOST']);
include_once('config.php');
$CONFIG =$config[HOST];
$_      = $CONFIG['include_separator'];

// 设置全局包含路径
#set_include_path('./'.$_.
#                 $_SERVER['DOCUMENT_ROOT'].$CONFIG['basedir'].$_.
#                 $_SERVER['DOCUMENT_ROOT'].$CONFIG['basedir'].'/lib/'.$_.get_include_path());
$DS = PATH_SEPARATOR;
set_include_path("./${DS}libraries/$DS../cake/develop$DS../cake/libraries");


include_once('lib/http_auth.php');
include_once('lib/public_dbclass.php');
include_once('lib/rebuild_url.php');
include_once('smarty3/Smarty.class.php');

// TODO: 恢复身份认证部分
// doHttpAuth();

$usr    ='';//$_SERVER['PHP_AUTH_USER'];
$HOME   =$CONFIG['baseurl'];
$THEME  =$CONFIG['theme'];

define('ROOT_DIR',$_SERVER['DOCUMENT_ROOT'].$CONFIG['basedir']);
define('CTL_DIR', ROOT_DIR.'/c/');

//---------[ 调整php配置 ]--------------------
// 调整报警级别
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE ); 

header('Content-Type: text/html;charset=UTF-8');

session_start();

// 排除URL的目录问题
$pos  = strpos('http://'.HOST.$_SERVER['REQUEST_URI'], $HOME);
if($pos===0)
    $rurl = substr('http://'.HOST.$_SERVER['REQUEST_URI'], strlen($CONFIG['baseurl']));
else
	die('配置文件错误');

rebuildURL($rurl);

$DB_Mailsys = new DB_Sql(
    $CONFIG['dbserver'],
    $CONFIG['database'],
    $CONFIG['dbuser'],
    $CONFIG['dbpass'],    
    'DB_MAILSYS');

$themepath = $CONFIG['smarty'].'/'.$CONFIG['theme'];

$topicdir  = $CONFIG['topicdir'];
$topicurl  = $CONFIG['topicurl'];
$uploaddir = $CONFIG['uploaddir'];
define('UPLOAD_DIR',$uploaddir);

$strClassFileName = CTL_DIR.$_GET['class'].".php";

if(is_file($strClassFileName))
{
    require_once($strClassFileName);

    $objMain = new $_GET['class'];
    if(method_exists($objMain,$_GET['method']))
    {
        $objMain->$_GET['method']();
    }
	else
	{
		echo 'The Controller ',$_GET['class'],' need the method:', $_GET['method'];
		die();
	}
}
else
{
  	//echo 'Class Not Found:'.$_SERVER['QUERY_STRING'];
	header('Status: 404 Not found');
    
	if(is_file("/v/$THEME/error.html"))
	{
		header("Location:/v/$THEME/error.html");
	}
	else
		echo 'error 404<br/>and theme file: error.html not exists';

	// TODO: this line for debug, remove this line before release
	echo '<pre>';
	print_r($_GET);
	die();
}
