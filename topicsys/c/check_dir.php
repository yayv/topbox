<?php
define('HOST', $_SERVER['HTTP_HOST']);

include_once('../config.php');

$CONFIG = $config[HOST];
class check_dir
{
	function check($filename)
	{
		
	  
       foreach($filename as $k=>$v)
	  {
		  if(is_readable($v))
			  {
				 echo($v.'可读');
			
			  }
		  else
			  {
				 echo($v.'不可读');
				
			  }
		 if(is_writable($v))
			 {
			   echo('可写');
			    echo("<br>");
			 }
		 else
			 {
			   echo('不可写');
			    echo("<br>");
			 }
	
	  }
	
   }

}
$filename=array($CONFIG['topicdir'],$CONFIG['uploaddir'],$CONFIG['uploaddir'].'/images');
$ch=new check_dir();
$ch->check($filename);

?>