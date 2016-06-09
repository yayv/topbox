<?php
/**
 * @Author: liu ce
 * @email: yayv.cn@gmail.com
 * @Description: menu module
 *               gen menu list by userinfo and $_GET['class'] and $_GET['method']
 */

class mmenu
{
	
	private $home;
	private $usermenu;

	function __construct($home)
	{
	 
		$this->home = $home;
		$this->usermenu = array();	
	}

	function setProjectName($name)
	{
		$this->projectname = $name;
	}


	function getMenu2()
	{
		$menu = array(
			array(
				'title'=>'--[基本功能]--',
			),
			array(
				'title'=>'新建项目',
				'link' =>$this->home.'/project/create',
			),
			array(
				'title'=>'项目列表',
				'link' =>$this->home.'/prjmanage/listall',
			),
			array(
				'title'=>'--[扩展功能]--',
			),
			array(
				'title'=>'模板管理',
				'link' =>$this->home.'/templates/listall',
			),
			array(
				'title'=>'使用说明',
				'link' =>$this->home.'/help/readme',
			),
		);

	    if($_GET['class']=='project' and $_GET[id])
	    {
	        array_unshift($menu ,
	            array(
	                'title' => '项目:'.$this->projectname,
	                'link' =>$this->home.'/project/manage/id-'.$_GET['id']
	            )
            );
	    }
		
	}

	function appendUserMenu($key,$arrUserMenu)
	{
		$this->usermenu[$key] = $arrUserMenu;
		
	}

	function getMenu($projectid=0, $projectname='')
	{
		$menu = array(
			array(
				'title' => '项目',
				'name'=>'',
				'list'=>array(				
					array(
						'title'=>'新增',
						'url'=>$this->home.'/project/create'),
					array(
						'title'=>'列表',
						'url'=>$this->home.'/prjmanage/listall'),
				),
			),		
			array(
				'title' => '模板',
				'name'=>'',
				'list'=>array(				
					array(
						'title'=>'新增',
						'url'=>$this->home.'/templates/add'),
					array(
						'title'=>'列表',
						'url'=>$this->home.'/templates/listall'),
				),
			),
			array(
				'title' => '用户',
				'name'=>'项目名',
				'list'=>array(				
					array(
						'title'=>'增加',
						'url'=>'#'),
					array(
						'title'=>'列表',
						'url'=>'#'),
				),
			),
		);

		if($projectid)
		{
			array_unshift($menu,	array(
				'title' => $projectname,
				'name'=>'',
				'list'=>array(				
					array(
						'title'=>'发布',
						'url'=>$this->home.'/project/publish/id-'.$projectid,
						'target'=>'publish'),
					array(
						'title'=>'编辑',
						'url'=>$this->home.'/project/manage/id-'.$projectid),
					array(
						'title'=>'参数',
						'url'=>$this->home.'/project/edit/id-'.$projectid),
					array(
					    'title'=>'<br/>备份互动数据',
					    'url'=>$this->home.'/project/backDynamic/id-'.$projectid),
				))
			);
          
			foreach($this->usermenu as $k=>$v)
		{
			array_push($menu, $v);
		}
		}

		
		return $menu;
	}
}

