<?php
/**
 * the basic class
 * 
 */
include('c/commoncontroller.php');

class prjmanage extends CommonController
{
	public $smarty;
	public $theme;
	public $config;
	public $db;

	public $mmenu;

	function __construct()
	{
		parent::init();

		// load db class
		require_once('lib/public_dbclass.php');
		$this->db = $this->_db;
		// load menu module
		require_once('m/mmenu.php');
		$this->mmenu = new mmenu($this->home);

		// load project manage module
		require_once('m/mprjmanage.php');
		$this->mprjmanage = new mprjmanage($this->db, $this->config, $this->home);
	}

	function index()
	{
		$this->listall();
	}

    function listall()
    {
		// get Menu View
		parent::initAssign($this);
		$this->tpl->assign('menulist', $this->mmenu->getMenu());
		$menulist = $this->tpl->fetch('menu.html');

		// get Index main view
		parent::initAssign($this);
		$this->tpl->assign('msg', 
			$this->mprjmanage->getProjectList());
		$right = $this->tpl->fetch('right.prjmanage_list.html');

		// show all
		parent::initSmartyAssign($this);
		$this->tpl->assign('title','专题项目管理');
		$this->tpl->assign('menulist',$menulist);
		$this->tpl->assign('rightpad',$right);
		$this->tpl->display('main.html');
    }
};

