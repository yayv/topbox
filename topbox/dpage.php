<?php
@include_once('../include/public_config.php');  
require_once('../include/smarty/Smarty.class.php');

// TODO: load data from file
$static = @unserialize(file_get_contents('templates_c/s.dump'));
$dynamic= @unserialize(file_get_contents('templates_c/d.dump'));

$smarty  = new Smarty();


// hook user's data 调不通
// include_once('hook_dpage.php');

// if(function_exists('processData')) {
    // $alldata = processData($static, $dynamic);

    //$projectid 应定义在hook page中
    $projectid = "1";

    $json = file_get_contents("json_proid_".$projectid);
    $alldata = json_decode($json);

// }
// else{
// 	$alldata = $static;
    // echo"<pre>";
    // print_r($alldata); return;
// }

header('Cache-control: no-cache');
header('max-age: 5');

//print_r($alldata);
//print_r("<pre>");
// 对数据组进行处理
$now = time();
if($alldata)
    foreach($alldata as $k=>$v)
    {
        if(is_array($v))
        {
            foreach($v as $kk=>$vv)
                if(intval($vv->dateline)>$now)
                    unset($alldata[$k][$kk]);
                else
                    break;
            $v = array_values($alldata[$k]);
        }

        $smarty->assign($k,$v);
    }

$smarty->display('tpl.html');


