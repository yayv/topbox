<?php
class netRequest
{
  /**
  * 回调函数 getheader, 每一个Header行都会调用 getHeader一次
  */ 
  function getHeader($ch, $header)
  {
    global $gHeader;

    $headline = explode(':', $header);
    if(count($headline)>0)
      $gHeader[$headline[0]] = trim($headline[1]);
    else if(strlen($header)>3)
      $gHeader['HTTP'] = trim($header);

    return strlen($header);
  }


  // TODO: 计划加入缓存方案
  function netGet($url, $cookie, $header=false, $usersession=false, $vars=false)
  {
    if($usersession)
    {
      $ch = $usersession;
      curl_setopt($ch, CURLOPT_URL, $url);
    }
    else
      $ch = curl_init($url);

    if($header)
    {
      curl_setopt($ch, CURLOPT_HEADERFUNCTION, 'getHeader');
    }

    if($usersession)
      curl_setopt($ch,CURLOPT_HTTPHEADER, array('Keep-Alive: 300','Connection: keey-alive'));
    else
      curl_setopt($ch,CURLOPT_HTTPHEADER, array('Connection: close'));

    curl_setopt($ch,CURLOPT_HTTPGET, TRUE);      
    curl_setopt($ch,CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_POST, 1 );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
    curl_setopt($ch,CURLOPT_COOKIE, $cookie);

    if(array_key_exists('HTTP_REFERER', $_SERVER))
      curl_setopt($ch,CURLOPT_REFERER, $_SERVER['HTTP_REFERER']);

    ob_start();
    curl_exec($ch);
    $retrievedhtml = ob_get_contents();
    ob_end_clean();

    if(!$usersession)
      curl_close($ch);

    return $retrievedhtml; 
  }


  function netGetWithHeader($url, $cookie, $usersession=false, $vars=false)
  {
    if($usersession)
    {
      $ch = $usersession;
      curl_setopt($ch, CURLOPT_URL, $url);
    }
    else
      $ch = curl_init($url);

    if($usersession)
      curl_setopt($ch,CURLOPT_HTTPHEADER, array('Keep-Alive: 300','Connection: keey-alive'));
    else
      curl_setopt($ch,CURLOPT_HTTPHEADER, array('Connection: close'));

    curl_setopt($ch,CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch,CURLOPT_COOKIE, $cookie);

    if(array_key_exists('HTTP_REFERER', $_SERVER))
      curl_setopt($ch,CURLOPT_REFERER, $_SERVER['HTTP_REFERER']);

    if($vars)    
    {
      curl_setopt($ch, CURLOPT_POST, 1 );
      curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
    }

    ob_start();
    curl_exec($ch);
    $all = ob_get_contents();
    ob_end_clean();

    // 处理返回的HEADER 的 DEMO
    /*
    $arr_header = explode("\r\n",$header);
    foreach($arr_header as $v){
    header($v);
    }
    */

    return  explode("\r\n\r\n", $all, 2);
  }

  function stripArraySlashes($post, &$newval=false)
  {
    if(!is_array($newval))
      $newval = array();

    foreach($post as $k=>$v)
    {
      if(is_array($v))
        $newval[$k] = stripArraySlashes($v);
      else
        $newval[$k] = stripslashes($v);
    }

    return $newval;
  }

  /**
  * 这个接口不能加入缓存方法
  * 转发post. 
  * 转发的结果，要求使用location跳转到呈现页。 
  */ 
  function netPost($url, $vars, $cookie, $header=false)
  {
    $ch = curl_init();

    if(defined('DEBUG'))
    {
      curl_setopt($ch, CURLOPT_HTTPPROXYTUNNEL, false);

      curl_setopt($ch, CURLOPT_PROXY, '127.0.0.1');      
      curl_setopt($ch, CURLOPT_PROXYPORT, 8888);
    }

    #if($header && is_array())
    #{
    #  curl_setopt(CURLOPT_HTTPHEADER,$header);
    #}

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_URL,$url);
    curl_setopt($ch, CURLOPT_POST, 1 );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $vars);
    curl_setopt($ch, CURLOPT_COOKIE, $cookie);

    $result = curl_exec($ch);
    curl_close($ch);

    return $result;
  }

  function encodePost($post)
  {
    $vars = "";

    foreach($post as $k=>$v)
    {
      $vars .= urlencode($k)."=".urlencode($v)."&";
    }

    return $vars;
  }

  public function getAccessToken()
  {

  }

  public function dumpToFile()
  {

  }

}



