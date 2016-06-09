<?php
@include_once('../include/public_config.php');  
require_once('smarty/Smarty.class.php');

// TODO: load data from file
$static = @unserialize(file_get_contents('templates_c/{$staticdata}'));
$dynamic= @unserialize(file_get_contents('templates_c/{$dynamicdata}'));

$smarty  = new Smarty();

// hook user's data
@include_once('{$hookfilename}');
if(function_exists('processData')) 
	$alldata = processData($static, $dynamic);
else
	$alldata = $static;

header('Cache-control: no-cache');
header('max-age: 5');

//print_r($alldata);
//print_r("<pre>");
// 对数据组进行处理
$now = time();
if($alldata)
    foreach($alldata as $k=>$v)
    {ldelim}
        if(is_array($v))
        {ldelim}
            foreach($v as $kk=>$vv)
                if(intval($vv->dateline)>$now)
                    unset($alldata[$k][$kk]);
                else
                    break;
            $v = array_values($alldata[$k]);
        {rdelim}

        $smarty->assign($k,$v);
    {rdelim}

$smarty->display('{$templatefile}');


