<?php
/**
 * 公共模板管理
 * 
 */
include('c/commoncontroller.php');

class templates extends CommonController
{
	public $smarty;
	public $theme;
	public $config;

	public $mmenu;

	function __construct()
	{
		parent::initConfig($this);

		// load db class
		require_once('lib/public_dbclass.php');
		$this->db = new DB_Sql(
			$this->config['dbserver'],
			$this->config['database'],
			$this->config['dbuser'],
			$this->config['dbpass'],
			'DB_MAILSYS'
		);

		// load menu module
		require_once('m/mmenu.php');
		$this->mmenu = new mmenu($this->home);

		// load menu module
		require_once('m/mtemplates.php');
		$this->mtemplates = new mtemplates($this->db, $this->config, $this->home);
	}

	public function showFrame($c)
	{
		// get Menu View
		parent::initSmartyAssign($this);
		$this->smarty->assign('menulist', $this->mmenu->getMenu());
		$menulist = $this->smarty->fetch('menu.html');

		// show all
		parent::initSmartyAssign($this);
		$this->smarty->assign('menulist',$menulist);
		$this->smarty->assign('rightpad',$c);
		$this->smarty->display('main.html');
	}

	function index()
	{
		$this->listall();
	}

    function listall()
    {
		$templates = $this->mtemplates->getAllTemplates();

		// get Index main view
		parent::initSmartyAssign($this);

		$this->smarty->assign('home', $this->home);
		$this->smarty->assign('templates', $templates);
		$right = $this->smarty->fetch('right.templates_list.html');

		$this->showFrame($right);
    }

    function edit()
    {
    	$templateid   = $_GET['tid'];
		$templateinfo = $this->mtemplates->getTemplateInfo($templateid);

		// get Index main view
		parent::initSmartyAssign($this);
		$this->smarty->assign('home',$this->home);
		$this->smarty->assign('templateid',$templateinfo->templateid);
		$this->smarty->assign('name',$templateinfo->name);
		$this->smarty->assign('filename',$templateinfo->filename);
		$this->smarty->assign('content',$templateinfo->content);

		$right = $this->smarty->fetch('right.templates_edit.html');

		$this->showFrame($right);
    }
//--------------------------------------------------
	function copyfrom()
	{
		$templates = $this->mtemplates->getAllTemplates();

		if($templates)
		    $this->smarty->assign('templates', $templates);
        $this->smarty->assign('home', $this->home);
		$this->smarty->display('box.templates_copyfrom.html');
	}

	function jgetcontent()
	{
		$templateid = $_GET['id'];

		$c = $this->mtemplates->getContent($templateid);

		if($c)
			echo json_encode(array('ret'=>1, 'msg'=>'ok', 'content'=>$c,'id'=>$templateid));
		else
			echo '{"ret":0, "msg":"没有获得内容"}';
	}

	function pedit()
	{
		$templateid = $_GET['tid'];	

		$name = $_POST['name'];
		$content = $_POST['content'];

		
		$this->mtemplates->updateTemplateInfo($templateid, $name, $content);

        echo "<meta http-equiv='refresh' content='0;url=$this->home/templates/listall'>";
        die();
	}
//--------------------------------------------------
};

