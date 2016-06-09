<?php

    if(isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW']))
    {
        $usr = $_SERVER['PHP_AUTH_USER'];
        $pwd = $_SERVER['PHP_AUTH_PW'];
        echo "$usr & $pwd <br/>";		die();
		//$ret = "PASSWD_OK";
        if($usr=='liu.ce'&&$pwd=='mylvrenmail')
            {$ret = 'PASSWORD_OK';echo 'ok';die();}
        else
            {$ret = false;echo $usr,'+',$pwd;die();}
        //$ret = md5();//file_get_contents("http://mail.lvren.cn/chkpwd.php?u=$usr&p=$pwd");
        
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
        #header('WWW-Authenticate: Basic realm="Top-secret area"');
        #header('HTTP/1.0 401 Unauthorized');
    
        phpinfo();
        // Error message
        print "Sorry, login failed! You need input username/password!\n";
        print "<br/>";
        die();
    }

echo 'OK PASSWORD OK';
