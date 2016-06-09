<?php
/**
 * @Author: yayv.cn@gmail.com
 * @Description: 本类实现在页面内提供帮助信息
 *               
 */
class macl
{
	function __construct() {
	   print "In BaseClass constructor\n";
	}

	function getTheRole($user){
		// get the users' roles

		// 
		return array('rolea', 'roleb', 'rolec');
	}

	function isAllow($class, $method, $roles){
		// get access control link value
		return false;
	}

}



