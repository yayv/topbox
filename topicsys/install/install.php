<?php
/**
 * the syscheck tool
 * 
 *
 * TODO: check directory for write
 * TODO: create .htaccess file
 * TODO:  
 */
define('HOST', $_SERVER['HTTP_HOST']);

include_once('../config.php');
include_once('Smarty.class.php');

function rebuildHtaccess($smarty, $config)
{
   $smarty->assign('basedir', $config['basedir']);
    $content = $smarty->fetch('htaccess.tpl');

    file_put_contents('../.htaccess', $content);
}

$CONFIG = $config[HOST];
$THEME  = $CONFIG['theme'];

$smarty = new Smarty();
$smarty->template_dir = "../v/$THEME/";
$smarty->compile_dir = "../templates_c/";

rebuildHtaccess($smarty, $CONFIG);
echo 'ok';

