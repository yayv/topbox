<?php
/**
 * the basic class
 * 
 */
include('c/commoncontroller.php');

class project extends CommonController
{
	public $theme;
	public $config;
	public $db;

	public $mmenu;

	function __construct()
	{
		parent::init();

		// load db class
		require_once('lib/public_dbclass.php');
		$this->db = new DB_Sql(
			$this->config['dbserver'],
			$this->config['database'],
			$this->config['dbuser'],
			$this->config['dbpass'],
			'DB_MAILSYS'
		);

		// load project manage module
		/*
		require_once('m/mproject.php');
		$this->mproject = new mproject($this->db, $this->config, $this->home);
		*/

		// load menu module
		$name = $this->getModel('mproject')->getProjectInfo($_GET['id'],'title');
        $this->getModel('mmenu')->setProjectName($name);

	   // $this->mmenu->appendUserMenu($this->mproject->getChannelList());
         
		 if(!$this->mdatagroup)
        {
            include_once('m/mdatagroup.php');
            $this->mdatagroup = new mdatagroup($this->db, $this->config, $this->home);
            
        }
	   $datagroup = $this->mdatagroup->getDatagroups($_GET['id']);

	   foreach($datagroup as $k=>$v)
		{
          $data[$k]['title']=$v->userdefinedname.'<br>';
		  $data[$k]['url']  =$this->home.'/project/editdatagroup/id-'.$_GET['id'].'/name-'.$v->name;
    	}
	    $arrdata=array('title'=>'数据管理','name'=>'','list'=>$data);
		$this->mmenu->appendUserMenu('数据管理',$arrdata);

		//追加多个时：
		/*
		$arrdata2=array('title'=>'数据管理2','name'=>'','list'=>$data);
        $totle=array($arrdata,$arrdata2);
		foreach($totle as $k=>$v)
		{
          $this->mmenu->appendUserMenu($k,$v);
		}
	   */
	
		

	}

	function showFrame($c)
	{		
		$projectid   = $_GET['id'];
        $projectname = $this->mproject->getProjectInfo($projectid,'title');

		// get Menu View
		parent::initSmartyAssign($this);
		$this->tpl->assign('menulist', $this->mmenu->getMenu($projectid, $projectname));
		$menulist = $this->tpl->fetch('menu.html');

		
		// show all
		parent::initSmartyAssign($this);
		
		$this->tpl->assign('home',$this->home);
		$this->tpl->assign('title','专题项目管理');
		$this->tpl->assign('menulist',$menulist);
		$this->tpl->assign('rightpad',$c);
		$this->tpl->display('main.html');	
	}	

	function create($msg='')
	{
		parent::initAssign($this);
		$dynamicdata = isset($_POST['dynamicdata'])?$_POST['dynamicdata']:$this->config['defaultdynamicdata'];
		$staticdata  = isset($_POST['staticdata'])?$_POST['staticdata']:$this->config['defaultdynamicdata'];
        
		
        $this->tpl->assign('author',$_SERVER['PHP_AUTH_USER']);
		$this->tpl->assign('home', $this->home);
		$this->tpl->assign('message', $msg);
		$this->tpl->assign('projectname', $_POST['projectname']);
		$this->tpl->assign('description', $_POST['description']);
		//$this->tpl->assign('author', $_POST['author']);
		$this->tpl->assign('directory', $_POST['directory']);
		$this->tpl->assign('url', $_POST['url']);
		$this->tpl->assign('staticdata', $_POST['staticdata']?$_POST['staticdata']:'s.dump');
		$this->tpl->assign('dynamicdata', $_POST['dynamicdata']?$_POST['dynamicdata']:'d.dump');
		$c = $this->tpl->fetch('right.project_create.html');
		
		$this->showFrame($c);
	}

	function edit()
	{
		// get Project info
		$info = $this->getModel('mproject')->getAllProjectInfo($_GET['id']);
		$this->tpl->assign('writer',$info->writer);
		$this->tpl->assign('home', $this->home);
		$this->tpl->assign('id', $_GET['id']);
		$this->tpl->assign('title',$info->title);
		$this->tpl->assign('description',$info->description);
		$this->tpl->assign('author',$info->author);
		$this->tpl->assign('directory',$info->directory);
		$this->tpl->assign('url',$info->url);
		$this->tpl->assign('staticdata',$info->staticdata);
		$this->tpl->assign('dynamicdata',$info->dynamicdata);
		$c = $this->tpl->fetch('right.project_edit.html');

		$this->showFrame($c);
	}

    public function manage()
    {
		$projectid = $_GET['id'];

		/*
		$this->getModel('mtemplates') = new mtemplates($this->db, $this->config, $this->config['baseurl']);
		*/
		
		// 获得基础模板的名称
		$templatesname = $this->$this->getModel('mtemplates')->getTemplatesNames();
		
		// 获得项目模板列表
		$templates = $this->getModel('mproject')->getTemplates($projectid);
		if($templates)
		foreach($templates as $k=>$v)
		{
		    if( isset ($templatesname[$v->from_templateid]) )
		    {
		        $templates[$k]->name = $templatesname[$v->from_templateid];
		    }
		    else
		        $templates[$k]->name = '';
		}

		// 获得项目页面列表
		$pages = $this->getModel('mproject')->getPages($projectid);
      
        // 获得项目数据组列表
        /*
        if(!$this->mdatagroup)
        {

            $this->getModel('mdatagroup') = new mdatagroup($this->db, $this->conf, $this->home);
            
        }
        */
        $datagroup = $this->getModel('mdatagroup')->getDatagroups($projectid);
    
        $project = $this->getModel('mproject')->getAllProjectInfo($projectid);

		parent::initAssign($this);

        $checkname=$this->getModel('mproject')->checkfile($project->zipname);
	
		if($checkname)
		{
			
		$this->tpl->assign('dir', $project->zipname); 
		}
		else
		{
			$this->tpl->assign('dir', '还没有上传资源');
		}
		if($project->zipname=='')
		{
          $this->tpl->assign('dir', '还没有上传资源');
		}
      
		$this->tpl->assign('home',$this->home);		
		$this->tpl->assign('id',$projectid);		
		if($templates)
		    $this->tpl->assign('templates',$templates);		
		$this->tpl->assign('project', $project);
		$this->tpl->assign('pages',$pages);		
		$this->tpl->assign('datagroup', $datagroup);
		$this->tpl->assign('datasource',$datasource);		
		$c = $this->tpl->fetch('right.project_manage.html');

		$this->showFrame($c);
    }

    function index()
    {
		if($_GET['id'])
			$this->manage();
		else
		{
			header("Location:$this->home/prjmanage");
			die();
		}
    }

	public function datamanage()
	{
		// TODO: 数据管理方法
	}

    /**
     * @Description: 填写一个模板
     */         
    public function addtemplate($message='')
    {
        $content = stripslashes($_POST['content']);
        $from_tmplid = isset($_POST['from_tmplid'])?$_POST['from_tmplid']:-1;
        $filename = $_POST['filename'];
        $id       = $_POST['id'];
        $name     = $_POST['name'];
        $type     = $_POST['type'];
    
        $projectid   = $_GET['id'];
        $projectname = $this->mproject->getProjectInfo($projectid,'title');

        $this->tpl->assign('home', $this->home);
        $this->tpl->assign('projectid', $projectid);
        $this->tpl->assign('projectname', $projectname);
        $this->tpl->assign('id', -1);
		$this->tpl->assign('from_tmplid', $from_tmplid);
		$this->tpl->assign('name', $name);
        $this->tpl->assign('filename', $filename);
        $this->tpl->assign('content', $content);
        $this->tpl->assign('type', $type);
        $this->tpl->assign('message', $message);

        $c = $this->tpl->fetch('right.project_addtemplate.html');
        
		$this->showFrame($c);
    }

    public function edittemplate($message='')
    {    
        $projectid   = $_GET['id'];
        $templateid  = $_GET['templateid'];
        $projectinfo = $this->mproject->getAllProjectInfo($projectid, 'name');
        $templateinfo= $this->mproject->getTemplate($templateid);

        $this->tpl->assign('home', $this->home);
        $this->tpl->assign('projectid', $projectid);
        $this->tpl->assign('projectname', $projectinfo->title);
        $this->tpl->assign('id', $templateinfo->id);
		$this->tpl->assign('from_tmplid', $templateinfo->from_templateid);
		$this->tpl->assign('name', $templateinfo->templatename);
        $this->tpl->assign('filename', $templateinfo->templatefile);
        $this->tpl->assign('content', $templateinfo->content);
        $this->tpl->assign('type', $templateinfo->type);
        $this->tpl->assign('message', $message);

        $c = $this->tpl->fetch('right.project_addtemplate.html');
        
		$this->showFrame($c);        
    }

	public function addpage($msg='')
	{
	    $projectid = $_GET['id'];
	    $projectname = $this->mproject->getProjectInfo($projectid, 'title');

	    $templates   = $this->mproject->getTemplates($projectid);  
        $pageid = -1;
        
		$this->tpl->assign('home', $this->home);
        $this->tpl->assign('pageid', $pageid);
	    $this->tpl->assign('projectid', $projectid);
	    $this->tpl->assign('projectname', $projectname);
	    $this->tpl->assign('publishtype', $publishtype);
	    $this->tpl->assign('pagename', $publishtype);
	    $this->tpl->assign('filename', $publishtype);
	    $this->tpl->assign('publishtype', $publishtype);
	    $this->tpl->assign('templates', $templates);
	    $this->tpl->assign('message', $msg);
		$c = $this->tpl->fetch('right.project_addpage.html');
		
		$this->showFrame($c);
	}

	public function adddata()
	{
		$projectid = $_GET['id'];
		
		$c = $this->mdatalist->getDatalist($projectid);
		
		$this->showFrame($c);
	}


//-----------------------------------------------------------
	function jsetvalue()
	{
		unset($this->smarty);
		unset($this->mmenu);

		$ret = $this->mproject->updateProjectInfo($_GET['id'], $_REQUEST['k'], $_REQUEST['v']);
		if($ret===false)
			echo '{"ret":0, "msg":"更新失败"}';
		else
			echo '{"ret":1, "msg":"ok","val":"',$ret,'"}';
	}




//-=---------------------------------------------------------
    public function padd()
    {
        $projectname = $_POST['projectname'];
        $description = $_POST['description'];
        $author      = $_POST['author'];
        $directory   = $_POST['directory'];
        $url         = $_POST['url'];
        $staticdata  = $_POST['staticdata'];
        $dynamicdata = $_POST['dynamicdata'];
        $writer      = $_POST['writer'];
        
		if($this->mproject->addProject($projectname, $author, $directory,
										$url, $staticdata,$dynamicdata,
										$descriptoin,
                                        $this->config['topicdir'],$writer))            
		{
			header("Location:$this->home/prjmanage/");
			die();
		}
        else
        {
			$msg = array_pop($this->mproject->error_stack);
            $this->create($msg['message'].':'.$msg['data']);
        }
	}

	public function paddtemplate()
	{
        // TODO: get post params
        $content = $_POST['content'];
        $from_tmplid = $_POST['from_tmplid'];
        $filename = $_POST['filename'];
        $id       = $_POST['id'];
        $name     = $_POST['name'];
        $type     = $_POST['type'];

        $projectid= $_GET['id'];
        
        if($id!=-1)
        {
            $ret = $this->mproject->editTemplate(
                        $projectid, $id, $name, $type, 
                        $filename, $from_tmplid, $content, 
                        ROOT_DIR.$this->config['template_upload']);
        }
        else
        {
            $ret = $this->mproject->addTemplate(
                        $projectid, $id, $name, $type, 
                        $filename, $from_tmplid, $content, 
                        ROOT_DIR.$this->config['template_upload']);
        }

		// 重新发布文件？ 留到发布时再做吧
        
		if($ret)
		{
            //header("location:/project/manage/id-$projectid");
            echo "<meta http-equiv='refresh' content='0;url=$this->home/project/manage/id-$projectid'>";
            $this->refreshData();
            die();
		}
        else
        {
            $msg = array_pop($this->mproject->error_stack);
            $this->addtemplate($msg['message']);
        }
	}
	
	public function editpage($msg='')
	{
	    $projectid = $_GET['id'];
	    $pageid    = $_GET['pageid'];
	    
        $projectname=$this->mproject->getProjectInfo($projectid, 'title');
	    $templates = $this->mproject->getTemplates($projectid);
        $page      = $this->mproject->getPage($pageid);

        $this->tpl->assign('home',  $this->home);
        $this->tpl->assign('templates',  $templates);
        $this->tpl->assign('projectid',  $projectid);
        $this->tpl->assign('projectname',$projectname);
        $this->tpl->assign('pageid',     $pageid);
        $this->tpl->assign('templateid', $page->templateid);
        $this->tpl->assign('pagename',   $page->pagename);
        $this->tpl->assign('filename',   $page->filename);
        $this->tpl->assign('publishtype',$page->publishtype);
        $this->tpl->assign('hookfile',   $page->user_hook_filename);
        $this->tpl->assign('default_hookfile', 'hook_'.$page->filename);
        $c = $this->tpl->fetch('right.project_addpage.html');
        
        $this->showFrame($c);
	}
	
	public function editpagehook()
	{
	    $projectid = $_GET['id'];
	    $pageid    = $_GET['pageid'];
	    
        $projectname=$this->mproject->getProjectInfo($projectid, 'title');
        $page =$this->mproject->getPage( $pageid);

        $this->tpl->assign('home',  $this->home);

        $this->tpl->assign('projectid',  $page->projectid);        
        $this->tpl->assign('projectname',$projectname);
        $this->tpl->assign('pageid',     $page->id);
        $this->tpl->assign('pagename',   $page->pagename);

        $this->tpl->assign('publishtype',   $page->publishtype);        
        $this->tpl->assign('user_hook_filename',   $page->user_hook_filename);
        $this->tpl->assign('hookfilecontent', $page->hookfile_content);

        $c = $this->tpl->fetch('right.project_editpageextend.html');
        
        $this->showFrame($c);
	}
	
	public function peditpagehook()
	{
	    $id = $_GET['id'];
	    $pageid = $_GET['pageid'];
	    
        $content = $_POST['hookfile_content'];
		
	    $this->mproject->updatePageExtInfo($id, $pageid, $_POST['user_hook_filename'], $content );

        echo "<meta http-equiv='refresh' content='0;url=$this->home/project/manage/id-$id'>";
	}
	
	public function backDynamic()
	{
	    $id = $_GET['id'];
	    
	    $directory = $this->getModule('mproject')->getProjectInfo($id, 'directory');
	    $basedir = $this->config['topicdir'].'/'.$directory;
	    
	    $filename = $this->getModule('mproject')->getProjectInfo($id, 'dynamicdata');

	    $dynamic_content = $this->getModule('mpublish')->getDynamicDataFromDest($basedir, $filename);

        $result=$this->getModule('mproject')->updateProjectInfo($id, 'dynamic_content', $dynamic_content);

        #echo "<meta http-equiv='refresh' content='0;url=$this->home/project/manage/id-$id'>";
	}
	
	public function delpage()
	{
	    $projectid = $_GET['id'];
	    $pageid    = $_GET['pageid'];
        
	    $ret = $this->mproject->delPage($projectid, $pageid);   
		
		if($ret)
		{
			
               echo json_encode(array('ret'=>1, 'msg'=>'删除成功'));
		
		}
		else
		{
			echo json_encode(array('ret'=>0, 'msg'=>'删除失败'));
		}
		
	/*
		if($ret)
	    {
	        echo "<meta http-equiv='refresh' content='0;url=$this->home/project/manage/id-$projectid'>";
	       die();
	    }
	
		*/
	}
   public function page_s()
   {
        $projectid = $_GET['id'];
	    $pageid    = $_GET['pageid'];
		
		$page      = $this->mproject->getPage($pageid);
		$this->tpl->assign('filename',   $page->filename);
		$this->tpl->assign('home',  $this->home);
		$this->tpl->assign('id',$projectid);
		$this->tpl->assign('pageid',$pageid);
		$this->tpl->display('page_del.html');
   }
   public function editdatagroup()
    {
		
		
        $projectid = $_GET['id'];
        $dgname    = $_GET['name'];
		
		 $date=date("y-m-d");
         $date=strtotime($date);
         $t_date=$date;
		 $y_date=$date-3600*24;
		 $p_date=$date-3600*24*2;

        $_SESSION['dgname']=$dgname;
        include_once('m/mdatagroup.php');
        include_once('m/mdatalist.php');
        
        $this->mdatagroup = new mdatagroup($this->db, $this->conf, $this->home);
        $this->mdatalist  = new mdatalist($this->db, $this->conf, $this->home);
        

        $dginfo = $this->mdatagroup->getDatagroupInfo($projectid, $dgname);
        $datalist = $this->mdatalist->getDatalist($projectid, $dgname);
        $datacount = $this->mdatalist->getDatalist_count($projectid, $dgname);
        $data_first=$this->mdatalist->getDatalist_first($projectid,$dgname);
		

		
		$dateline_first=$data_first[0]->dateline;
		$date_first=date("Y-m-d",$dateline_first);
		
		$nums=$datacount[0]->nums;
		$pages=ceil($nums/20);
	     for($i=1; $i<=$pages; $i++)
		{
			 $pp[]=$i;
		}
        foreach($datalist as $k=>$v)
        {
            $datalist[$k]->date = date('md H:i', $datalist[$k]->dateline);
        }
		foreach($datalist as $k=>$v)
		{
               $datalist[$k]->d=$datalist[$k]->dateline-time(); 
        }
		//header("Content-type:image/jpg");
		$this->tpl->assign('pp',$pp);
        $this->tpl->assign('dg', $dginfo);
        $this->tpl->assign('datalist', $datalist);
        $this->tpl->assign('home', $this->home);
        $this->tpl->assign('id', $projectid);
        $this->tpl->assign('nums', $nums);
		$this->tpl->assign('date_first',$date_first);
       
		$this->tpl->assign('url',$this->config['uploaddir']);

        //$this->tpl->assign('url',file_get_contents("c:/upload/images/31_test_1.jpg"));
        $this->tpl->assign('t_date', $t_date);
		$this->tpl->assign('y_date',$y_date);
		$this->tpl->assign('p_date',$p_date);

		if($nums>20)
		{
		$this->tpl->assign('today','今天');
		$this->tpl->assign('yes','昨天');
		$this->tpl->assign('pre','前天');
        }
        $c = $this->tpl->fetch('right.project_editdatagroup.html');

        $this->showFrame($c);
    }	



          //分页
	 public function page()
{
        //print_r(date("y-m-d h:i:s"));
		$d=$_GET['d'];
		$projectid = $_GET['id'];
		$dgname    = $_SESSION['dgname'];
        $p=$_GET['p'];
	     $date=date("y-m-d");
         $date=strtotime($date);

		 include_once('m/mdatagroup.php');
        include_once('m/mdatalist.php');

		$this->mdatagroup = new mdatagroup($this->db, $this->conf, $this->home);
        $this->mdatalist  = new mdatalist($this->db, $this->conf, $this->home);

	     $t_date=$date;
		 $y_date=$date-3600*24;
		 $p_date=$date-3600*24*2;


          
		
		$dginfo = $this->mdatagroup->getDatagroupInfo($projectid, $dgname);
		$data_first=$this->mdatalist->getDatalist_first($projectid,$dgname);
		$datacount = $this->mdatalist->getDatalist_count($projectid, $dgname);
       	$dateline_first=$data_first[0]->dateline;
		$date_first=date("Y-m-d",$dateline_first);
		$nums=$datacount[0]->nums;
        $pages=ceil($nums/20);
	     for($i=1; $i<=$pages; $i++)
		{
			 $pp[]=$i;
		}

	   		if($p!='')
		{
			$d=$_POST['text_date'];
			$d=strtotime($d);
			
		}

		//$pre_date=$d-3600*12;
		$next_date=$d+3600*24;
		$key_word=$_POST['key_word'];
		$writer_name=$_POST['writer_name'];
		if($writer_name==''&&$key_word=='')
	    {
			$datalist = $this->mdatalist->getDatalist_page($projectid, $dgname,$d,$next_date);
	    }
	   else
	    {
		  if($key_word!='')
			{
				$datalist = $this->mdatalist->getDatalist_key($projectid,$dgname,$key_word);
				
			}
		else if($writer_name!='')
			{
               $datalist = $this->mdatalist->getDatalist_writer($projectid,$dgname,$writer_name);
			}
	    }

        foreach($datalist as $k=>$v)
        {
            $datalist[$k]->date = date('md H:i', $datalist[$k]->dateline);
        }

		$this->tpl->assign('pp',$pp);
        $this->tpl->assign('dg', $dginfo);
        $this->tpl->assign('datalist', $datalist);
        $this->tpl->assign('home', $this->home);
        $this->tpl->assign('id', $projectid);
		$this->tpl->assign('dgname',$dgname);
		$this->tpl->assign('dateline_first',$dateline_first);
		$this->tpl->assign('date_first',$date_first);

		  $this->tpl->assign('t_date', $t_date);
		$this->tpl->assign('y_date',$y_date);
		$this->tpl->assign('p_date',$p_date);
		
         
		 	if($nums>20)
		{
		$this->tpl->assign('today','今天');
		$this->tpl->assign('yes','昨天');
		$this->tpl->assign('pre','前天');
        }

        $c = $this->tpl->fetch('right.project_editdatagroup.html');

        $this->showFrame($c);
}
//传统分页
         
	 public function page_t()
{
        
		$pt=$_GET['pt'];
		$projectid = $_GET['id'];
		$dgname    = $_SESSION['dgname'];

         $date=date("y-m-d");
         $date=strtotime($date);

         $t_date=$date;
		 $y_date=$date-3600*24;
		 $p_date=$date-3600*24*2;

		 include_once('m/mdatagroup.php');
        include_once('m/mdatalist.php');

		$this->mdatagroup = new mdatagroup($this->db, $this->conf, $this->home);
        $this->mdatalist  = new mdatalist($this->db, $this->conf, $this->home);


		$dginfo = $this->mdatagroup->getDatagroupInfo($projectid, $dgname);
		$data_first=$this->mdatalist->getDatalist_first($projectid,$dgname);
		$datacount = $this->mdatalist->getDatalist_count($projectid, $dgname);
       	$dateline_first=$data_first[0]->dateline;
		$date_first=date("Y-m-d",$dateline_first);
		$nums=$datacount[0]->nums;

        $pages=ceil($nums/20);
	     for($i=1; $i<=$pages; $i++)
		{
			 $pp[]=$i;
		}

	   		if($p!='')
		{
			$d=$_POST['text_date'];
			$d=strtotime($d);
			
		}

		
		$next_date=$d+3600*24;
		
		$datalist=$this->mdatalist->getDatalist_Tpage($projectid,$dgname,$pt);
		//$datalist = $this->mdatalist->getDatalist_page($projectid, $dgname,$d,$next_date);

        foreach($datalist as $k=>$v)
        {
            $datalist[$k]->date = date('md H:i', $datalist[$k]->dateline);
        }
		$this->tpl->assign('pp',$pp);
        $this->tpl->assign('dg', $dginfo);
        $this->tpl->assign('datalist', $datalist);
        $this->tpl->assign('home', $this->home);
        $this->tpl->assign('id', $projectid);
		$this->tpl->assign('dgname',$dgname);
		$this->tpl->assign('dateline_first',$dateline_first);
		$this->tpl->assign('date_first',$date_first);

		  $this->tpl->assign('t_date', $t_date);
		$this->tpl->assign('y_date',$y_date);
		$this->tpl->assign('p_date',$p_date);
		
         
		 	if($nums>20)
		{
		$this->tpl->assign('today','今天');
		$this->tpl->assign('yes','昨天');
		$this->tpl->assign('pre','前天');
        }

        $c = $this->tpl->fetch('right.project_editdatagroup.html');

        $this->showFrame($c);
}
    
	public function refreshdata()
	{
        echo '<pre>';
        
	    $projectid = $_GET['id'];
        $varlist = $this->mproject->refreshDatalist($projectid);

        // 这个是什么？ 上面是重新解些了模板的变量列表，这个是更新数据库的记录
        include_once('m/mdatagroup.php');
        $this->mdatagroup = new mdatagroup($this->db, $this->config, $this->home);
        $this->mdatagroup->updateDatagroup($projectid, $varlist);

        //$this->mdata
	}
	
    /**
     * 添加页面, 这个有必要说明一下
     * 1. 页面种类: 
     *          静态发布: 使用 smarty 合并参数，生成静态页面，并写入目标文件夹
     *          动态发布: copy固定的动态模板到目标文件夹。
     *          自定义: 把用户录入/上传的文件内容，以目标文件名保存到目标文件夹                    
     */
    public function paddpage()
    {
        $projectid  = $_GET['id'];
        $pageid     = $_POST['pageid'];
        $templateid = $_POST['templateid'];
        $pagename   = $_POST['pagename'];
        $filename   = $_POST['filename'];
        $publishtype= $_POST['publishtype'];

        if($publishtype=='dynamic')
            $hookfile = $_POST['filename'];
        else if($publishtype=='manual')
            $hookfile = $_POST['hookfile'];
		else if($publishtype=='auto')
            $hookfile = $_POST['hookfile'];
        else
            $hookfile = '';
        
        if($pageid==-1)
            $ret = $this->mproject->addPage(
            $projectid, $templateid, $pagename, $filename, $publishtype, $hookfile);
        else
            $ret = $this->mproject->editPage(
            $projectid, $pageid, $templateid, $pagename, $filename, $publishtype,$hookfile);

        if($ret)
        {
            // 模板添加或更新完成， 刷新模板相关的变量
             echo "<meta http-equiv='refresh' content='0;url=$this->home/project/manage/id-$projectid'>";
            $this->refreshData();
            die();
        }
        else
        {
            $msg = array_shift($this->mproject->error_stack);
            $this->addpage($msg['data']);
        }
    }

          //添加资源
    public function addimg()
	{        
	   			//上传路径
		$projectid = $_GET['id'];	
		$name=$_FILES['filename']['name'];
		$tmp_name=$_FILES["filename"]["tmp_name"];
		
		$project = $this->mproject->getAllProjectInfo($projectid);	
		$this->mproject->addResources($projectid,$name,$tmp_name);

		$this->manage();
	
	}

 	public function republish()
	{
	    // TODO: 需要强提示，是否删除目录 xxx 下的全部文件及全部子目录中的文件
	    $projectid = $_GET['id'];

		
        // 准备专题信息	    
        $project = $this->mproject->getAllProjectInfo($projectid);

        // 配置发布模块
        if(!$this->mpublish)
        {
            include_once('m/mpublish.php');
            $basedir = $this->config['topicdir'].'/'.$project->directory;
            $this->mpublish = new mpublish($this->smarty, $basedir, $project->url);
        }

		// 删除已经拷贝和发布的文件
        $this->mpublish->cleanTargetPath($this->config['topicdir'].'/'.$project->directory);

		if(!$this->mtemplates)
		{
			include_once('m/mtemplates.php');
			$this->mtemplates = new mtemplates($this->db, $this->config, $this->config['baseurl']);
		}

        // 拷贝资源文件
        // 遍历所有页面，进行内容发布
		// 获得项目页面列表
		$templates = $this->mproject->getTemplates($projectid);
		if($templates)
        foreach($templates as $k=>$v)
        {
        	// 发布模板文件
        	if($v->from_templateid>0)
        	{
		    	$v->content = '';
				$path = $this->mtemplates->getTempatesPath($v->from_templateid);
				$this->mpublish->copyTemplateResource(
							ROOT_DIR.'/common_templates/'.$path,
							$this->config['topicdir'].'/'.$project->directory);
			}
        }
		else
		{
			echo '连个模板都没有选，发布什么呢？';
			die();
		}

		// 调用正常的发布流程
		$this->publish();
	}

	
	public function publish()
	{
	    $projectid = $_GET['id'];

        echo '<pre>';

        // 准备专题信息	    
        $project = $this->mproject->getAllProjectInfo($projectid);

		//解压资源
        $this->mproject->publishZippedResource($this->config['topicdir'], $project->zipname);

        // 配置发布模块
        if(!$this->mpublish)
        {
            include_once('m/mpublish.php');
            $basedir = $this->config['topicdir'].'/'.$project->directory;
            $this->mpublish = new mpublish($this->smarty, $basedir, $project->url);
        }

        // 导出数据为数组，作序列化发布用
        if(!$this->mdatalist)
        {
            include_once('m/mdatalist.php');
            $this->mdatalist = new mdatalist($this->db, $this->config, $this->home);
            $dump = $this->mdatalist->dumpToArray($projectid);
			
        }
         
		// 发布静态数据
		$this->mpublish->publishFileContent('templates_c', $project->staticdata, serialize($dump));
		
		//发布动态数据
		$dynamic_content = $this->mproject->getProjectInfo($project->id, 'dynamic_content');
        $this->mpublish->publishFileContent('templates_c', $project->dynamicdata, $dynamic_content);
		

        // 遍历所有页面，进行内容发布
		// 获得项目页面列表
		$pages = $this->mproject->getPages($projectid);
		if($pages)
			
        foreach($pages as $k=>$v)
        {
			
        	// 发布模板文件
        	$templatecontent = $this->mproject->getTemplate($v->templateid);
        	$this->mpublish->publishFileContent('templates', $templatecontent->templatefile, $templatecontent->content);

            if($v->publishtype=='static')
            {
            	echo $v->filename,'<br/>';
                $templatefilename = $this->mproject->getTemplateFilename($v->templateid);
                $this->mpublish->publishStatic($v->filename, $templatefilename, $dump);
            }
            elseif($v->publishtype=='dynamic')
            {
				echo(123);
                $templatefilename = $this->mproject->getTemplateFilename($v->templateid);
                //$template = $this->mproject->getTemplate($v->templateid);
                echo $v->filename,' from ', $templatefilename,'<br/>';
                $this->mpublish->publishDynamic($v->filename, $templatefilename, $project);
              
                if($v->hookfile_content)
                    $this->mpublish->publishManual($v->user_hook_filename, $v->hookfile_content);
            }
            elseif($v->publishtype=='manual') 
            {
                // publish manual content
                echo $v->filename, ' Manual <br/>';

                $this->mpublish->publishManual($v->user_hook_filename, $v->hookfile_content);
            }
			
		    
        }
		else
		{
			echo '连个页面都没有，发布个什么呢？';
			die();
		}

		// 遍历数据，拷贝数据图片
		$dataids = $this->mdatalist->dumpImageNames($projectid);
		$this->mpublish->publishImages($dataids);

        $project = $this->mproject->getAllProjectInfo($projectid);
		/*$auto_result=$this->mproject->auto_file($projectid);
	  
	if($auto_result)
		{
			foreach($auto_result as $k=>$v)
				{
				
				$this->mproject->url_exists($project->url."/".$v->filename);
				}
		}
*/
       echo "<meta http-equiv='refresh' content='1;url=$project->url'>";
		
       die('发布成功,1秒后跳转到专题页面');
	}

};



