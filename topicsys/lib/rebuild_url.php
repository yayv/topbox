<?php

function rebuildURL($requesturl)
{
    /*
      /index.html index.htm => index.php?index.main
      #RewriteRule ^\/?(index.html|index.htm)?$ index.php?act=index.main
      
      /addresslist|mail|content/[a-z]* / => index.php?act=$1&method=$2&params
      
      RewriteRule ^(addresslist|mail|content)\/([a-z]*)\/?\?(.*)$ index.php?act=$1.$2&$3
      RewriteRule ^(addresslist|mail|content)\/?([a-z]*)?\/([0-9a-z=&]*)?$ index.php?act=$1.$2&p=$3
      RewriteRule ^(addresslist|mail|content)\/?$ index.php?act=$1.main
      
      RewriteRule ^([^.]*)$ index.php?act=index.show&key=$1    
    */
    // url 规范: /class/method/param1-value1/param2-value2/param3-value3?exparams

    
    #$exparams = explode('?', $_SERVER['REQUEST_URI']);
    $exparams = explode('?', $requesturl);
    $params = explode("/",$exparams[0]);
    foreach( $params as $p => $v )
    {
        switch($p)
        {
            case 0: continue;break;
            case 1:$_GET['class']=$v;break;
            case 2:$_GET['method']=$v;break;
            default:
                $kv = explode('-', $v);
                if(count($kv)>1)
                {
                    $_GET[$kv[0]] = $kv[1];
                }
                else
                {
                    $_GET['params'.$p] = $kv[0];
                }
                break;
        }
    }
    
    if($_GET['class']=='') $_GET['class'] = 'index';
    if($_GET['method']=='') $_GET['method'] = 'main';
}
