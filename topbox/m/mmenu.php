<?php
/**
 * @Author: liu ce
 * @email: yayv.cn@gmail.com
 * @Description: menu module
 *               gen menu list by userinfo and $_GET['class'] and $_GET['method']
 */

class mmenu extends model
{
	
	private $home;
	
	private $usermenu;

	function setHome($home)
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
				'link' =>$this->home.'/portal/create',
			),
			array(
				'title'=>'项目列表',
				'link' =>$this->home.'/portal/listall',
			),
			array(
				'title'=>'使用说明',
				'link' =>$this->home.'/help/readme',
			),
		);

	    if($_GET['class']=='portal' and $_GET[id])
	    {
	        array_unshift($menu ,
	            array(
	                'title' => '项目:'.$this->projectname,
	                'link' =>$this->home.'/portal/edit/id-'.$_GET['id']
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
						'url'=>$this->home.'/portal/create'),
					array(
						'title'=>'列表',
						'url'=>$this->home.'/portal/listall'),
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
						'url'=>$this->home.'/portal/publish/id-'.$projectid,
						'target'=>'publish'),
					array(
						'title'=>'编辑',
						'url'=>$this->home.'/portal/edit/id-'.$projectid),
					array(
						'title'=>'参数',
						'url'=>$this->home.'/portal/config/id-'.$projectid),
					array(
					    'title'=>'<br/>备份互动数据',
					    'url'=>$this->home.'/portal/backDynamic/id-'.$projectid),
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

