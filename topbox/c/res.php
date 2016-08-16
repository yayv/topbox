<?php
include_once('commoncontroller.php');

class res extends CommonController
{
	public function __construct()
	{
		$this->httpauth();
		
	}
	
	public function index()
	{
		parent::init();
		
		$shortname = $_GET['action'] ;

		$picture   = false;
		if($shortname && ($picture = $this->getModel('mpicture')->getPictureByShortname($shortname)))
		{
			header('Content-Type:image/'.$picture['picturetype']);
			readfile('upload/'.$picture['file']);
			return ;
		}
		else
		{
			header('HTTP/1.0 404 Not Found');
			header('Content-Type:image/jpg');
			readfile('v/default/image/404.jpg');

			return ;
		}
	}

	public function id()
	{
		parent::init();
		
		$id = $_GET['params3'] ;
		$picture   = false;
		if($id && ($picture = $this->getModel('mpicture')->getPictureById($id)))
		{
			header('Content-Type:image/'.$picture['picturetype']);
			readfile('upload/'.$picture['file']);
			return ;
		}
		else
		{
			header('HTTP/1.0 404 Not Found');
			$this->tpl->display('error_pages/404.html');

			return ;					
		}
	}

	public function jinfo()
	{
		parent::init();
		
		$shortname = $_GET['params3'] ;

		$picture   = false;
		if($shortname && ($picture = $this->getModel('mpicture')->getPictureByShortname($shortname)))
		{
			#header('Content-Type:text/javascript');
			echo json_encode($picture);
			return ;
		}
		else
		{
			header('HTTP/1.0 404 Not Found');
			$this->tpl->display('error_pages/404.html');

			return ;
		}		
	}
}
