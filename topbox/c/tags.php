<?php
include_once('commoncontroller.php');

class tags extends CommonController
{
	public function __construct()
	{
	}
	
	public function index()
	{
		parent::init();

		if(!$this->isLogined())
		{
			// TODO:
			return ;
		}

		if(!$this->isManager())
		{
			return ;
		}

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
		
		// echo 'Tags model';
		$tags = $this->getModel('mtags')->getAllTags();


		$this->tpl->assign("tags", $tags);
		$body = $this->tpl->fetch("tags.tpl.html");
		$this->tpl->assign("body", $body);

		$this->tpl->display("index.tpl.html");
	}

	public function removeTag(){
		//TODO
		print_r("Tag is removed!");
	}

	public function saveTag(){
		//TODO
		print_r("Tag is saved!");
	}

	public function saveAll(){
		//TODO
		print_r("All tags saved!");
	}

	public function addTag(){
		//TODO
		print_r("Add a new tag!");
	}
}
