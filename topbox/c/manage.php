<?php
include_once('commoncontroller.php');

class manage extends CommonController
{
	private $_access_token;
	
	public function __construct()
	{
		// load Access Token
		$datafile = "data/oakey.ps";
		$reget_token = true;
		if(is_file($datafile))
		{
			$this->_access_token = unserialize(file_get_contents($datafile));

			if(is_array($this->_access_token) && 
				in_array('expires_time', $this->_access_token) &&
				$this->_access_token['expires_time']>time()
			  )
			{
				$reget_token = false;
			}
		}
	}

	public function index()
	{
		parent::init();

        $this->tpl->assign('currentItems',
        		array(
        			array('href'=>'###','title'=>'|'),
        			array('href'=>'/project/info/name-'.$name,'title'=>"【".$proj['showname']."】"),
        			array('href'=>'/project/checkdir/name-'.$name, 'title'=>'项目目录检查'),
        			array('href'=>'/project/logmanage/name-'.$name, 'title'=>'日志管理'),
        			array('href'=>'/project/codeanalyse/name-'.$name, 'title'=>'代码分析'),
        			array('href'=>'/project/config/name-'.$name, 'title'=>'配置管理'),
					array('href'=>'/project/todo/name-'.$name, 'title'=>'重新扫描')
        	));

        $nav  = $this->tpl->fetch('navigatebar.tpl.html');
        $this->tpl->assign('navigatebar',$nav);
        $this->tpl->assign('body',"<br/><br/><br/>");
		$this->tpl->display('index.tpl.html');
		return ;
	}

	public function login()
	{
		parent::init();

		$oakey = Core::getInstance()->getConfig('oakey');

		$this->tpl->display('login.tpl.html');
	}

	public function dologin()
	{
		parent::init();

		$_SESSION['userid'] = 1;
		$_SESSION['username'] = 'testuser';
		$_SESSION['user'] = array($_SESSSION['userid'],$_SESSION['username']);
		setcookie('userid',1);

		header("location:/manage/");
	}
}
