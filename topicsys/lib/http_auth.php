<?php

function doHttpAuth()
{
    # patch for factcgi/cgi
    list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', base64_decode(substr($_SERVER['HTTP_AUTHORIZATION'], 6)));

    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
    {
        $usr = $_SERVER['PHP_AUTH_USER'];
        $pwd = $_SERVER['PHP_AUTH_PW'];
		
		//$ret = "PASSWD_OK";
        if($usr=='liu.ce'&&$pwd=='mylvrenmail')
            $ret = "PASSWD_OK";
        else
            $ret = false;
        //$ret = file_get_contents("http://mail.lvren.cn/chkpwd.php?u=$usr&p=$pwd");

        if($ret!='PASSWD_OK')
        {
            header('WWW-Authenticate: Basic realm="Top-secret area"');
            header('HTTP/1.0 401 Unauthorized');
    
            // Error message
            print "Sorry, login failed!\n";
            print "<br/>";
            die();
        }
    }
    else
    {
        header('WWW-Authenticate: Basic realm="Top-secret area"');
        header('HTTP/1.0 401 Unauthorized');
    
        // Error message
        print "Sorry, login failed!\n";
        print "<br/>";
        die();
    }
}
