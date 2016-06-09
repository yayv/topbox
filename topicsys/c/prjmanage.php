<?php
/**
 * the basic class
 * 
 */
include('c/common.php');

class prjmanage extends common
{
	public $smarty;
	public $theme;
	public $config;
	public $db;

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

		// load project manage module
		require_once('m/mprjmanage.php');
		$this->mprjmanage = new mprjmanage($this->db, $this->config, $this->home);
	}

	function main()
	{
		$this->listall();
	}

    function listall()
    {
		// get Menu View
		parent::initSmartyAssign($this);
		$this->smarty->assign('menulist', $this->mmenu->getMenu());
		$menulist = $this->smarty->fetch('menu.html');

		// get Index main view
		parent::initSmartyAssign($this);
		$this->smarty->assign('msg', 
			$this->mprjmanage->getProjectList());
		$right = $this->smarty->fetch('right.prjmanage_list.html');

		// show all
		parent::initSmartyAssign($this);
		$this->smarty->assign('title','专题项目管理');
		$this->smarty->assign('menulist',$menulist);
		$this->smarty->assign('rightpad',$right);
		$this->smarty->display('main.html');
    }
};

