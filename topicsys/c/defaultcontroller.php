<?php
/**
 * the basic class
 * 
 */
include('c/commoncontroller.php');

class defaultcontroller extends commoncontroller
{
	public $smarty;
	public $theme;
	public $config;

	public $mmenu;

	function __construct()
	{
		parent::init($this);
 
		// load menu module
		require_once('m/mmenu.php');
		$this->mmenu = new mmenu($this->config['baseurl']);
	}

    function index()
    {
		// get Menu View
		// NOTE:如果此 action 不需要用到数据库或者模板引擎，请注释掉相应的代码，以提高速度
		parent::initDb(Core::getInstance()->getConfig('database'));
		parent::initTemplateEngine(
                    Core::getInstance()->getConfig('theme'),
                    Core::getInstance()->getConfig('compiled_template')
        );

		$this->tpl->assign('menulist', $this->getModel('mmenu')->getMenu());
		$menulist = $this->tpl->fetch('menu.html');

		// get Index main view
		parent::initAssign();
		$this->tpl->assign('msg', 
			'<h1 style="margin:0;height:300px;"><br/>欢迎来到绿人专题管理系统</h1>');
		$right = $this->tpl->fetch('right.prjmanage_list.html');

		// show all
		parent::initAssign();
		$this->tpl->assign('menulist',$menulist);
		$this->tpl->assign('rightpad',$right);
		$this->tpl->display('main.html');
    }
};

