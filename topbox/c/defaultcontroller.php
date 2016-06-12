<?php
include_once('commoncontroller.php');

class defaultcontroller extends CommonController
{
	public function __construct()
	{
	}
	
	public function index()
	{
		// NOTE:如果此 action 不需要用到数据库或者模板引擎，请注释掉相应的代码，以提高速度
		parent::initDb(Core::getInstance()->getConfig('database'));
		parent::initTemplateEngine(
                    Core::getInstance()->getConfig('theme'),
                    Core::getInstance()->getConfig('compiled_template')
        );

		$idx = Core::getInstance()->getConfig('indexpage');
		if($idx)
		{
			header("location:$idx");
			return ;
		}

		// TODO: 请在下面实现您的默认action
		$body = file_get_contents('data/todo.txt');
		$body .= file_get_contents('data/history.txt');
		$body = strtr($body,array("\n"=>'<br/>',' '=>'&nbsp;'));
		
		$nav  = $this->tpl->fetch('navigatebar.tpl.html');
        $this->tpl->assign('navigatebar',$nav);
        $this->tpl->assign('body',"<br/><br/><br/>");
		$this->tpl->display('index.tpl.html');
		return ;		
	}
}
