<?php
include_once('commoncontroller.php');

class post extends CommonController
{
	public function __construct()
	{
		$this->httpauth();
		
	}
	
	public function index()
	{
		parent::init();
		
		$shortname = $_GET['action'] ;

		$article   = false;
		if($shortname && ($article = $this->getModel('marticle')->getArticleByShortname($shortname)))
		{
			$this->tpl->assign('article',$article);
			$this->tpl->display('article/simple_page.tpl.html');
			return ;
		}
		else
		{
			header('HTTP/1.1 404 Not Found');
			$this->tpl->display('error_pages/404.html');

			return ;
		}
	}

	public function id()
	{
		parent::init();

		$id = $_GET['params3'] ;
		$article   = false;

		if($id && ($article = $this->getModel('mcontent')->getContentById($id)))
		{
			$this->tpl->assign('article',$article);
			$this->tpl->display('article/simple_page.tpl.html');
			return ;
		}
		else
		{
			header('HTTP/1.1 404 Not Found');
			$this->tpl->display('error_pages/404.html');

			return ;					
		}
	}	

	public function testfor()
	{
		$this->getModel('mpost')->test();
	}
}
