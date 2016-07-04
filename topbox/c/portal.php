<?php
include_once('commoncontroller.php');

class portal extends CommonController
{
	private function createMenu()
	{
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

		$projectid   = isset($_GET['id'])?$_GET['id']:false;
		if($projectid)
        	$projectname = $this->getModel('mtopic')->getProjectInfo($projectid,'title');
        else
        	$projectname = '';

		// get Menu View
		$this->tpl->assign('menulist', $this->getModel('mmenu')->getMenu($projectid, $projectname));
		$menulist = $this->tpl->fetch('menu.html');

		$this->tpl->assign('home',$this->home);
		$this->tpl->assign('title','专题项目管理');
		$this->tpl->assign('menu',$menulist);
	}

	public function index()
	{
		parent::init();

		header('Content-Type:text/html;charset=UTF8');

		$c = 'Hello, World!';

		$this->createMenu();
		$this->tpl->assign('body',$c);
		$this->tpl->display('index.tpl.html');
		return ;
	}

	function createTopic()
	{
		parent::init();

		header('Content-Type:text/html;charset=UTF8');
		$dynamicdata = isset($_POST['dynamicdata'])?$_POST['dynamicdata']:core::getInstance()->getConfig('defaultdynamicdata');
		$staticdata  = isset($_POST['staticdata'])?$_POST['staticdata']:core::getInstance()->getConfig('defaultdynamicdata');
        
        $this->tpl->assign('author',$_SERVER['PHP_AUTH_USER']);
		$this->tpl->assign('home', $this->home);
		$this->tpl->assign('message', $msg);
		$this->tpl->assign('projectname', $_POST['projectname']);
		$this->tpl->assign('description', $_POST['description']);
		//$this->tpl->assign('author', $_POST['author']);
		$this->tpl->assign('topicdir',core::getInstance()->getConfig('topicdir'));
		$this->tpl->assign('directory', $_POST['directory']);
		$this->tpl->assign('url', $_POST['url']);
		$this->tpl->assign('staticdata', $_POST['staticdata']?$_POST['staticdata']:'s.dump');
		$this->tpl->assign('dynamicdata', $_POST['dynamicdata']?$_POST['dynamicdata']:'d.dump');

		#$this->createMenu();
		
		$c = $this->tpl->fetch('portal_boxcreatetopic.tpl.html');
		#$this->tpl->assign('body',$c);
		#$this->tpl->display('index.tpl.html');
        echo $c;
		return ;
	}

    public function doCreateTopic()
    {
    	parent::init();

        $topicname   = $_POST['topicname'];
        $description = $_POST['description'];
        $url         = $_POST['url'];
        $directory   = $_POST['directory'];
        $programmer  = $_POST['programmer']?$_POST['programmer']:'admin';
        $editor      = $_POST['editor'];
        $staticdata  = $_POST['staticdata'];
        $dynamicdata = $_POST['dynamicdata'];

		$homedir     = core::getInstance()->getConfig('topicdir');

		if($ret=$this->getModel('mtopic')->addProject($topicname, $programmer, $directory,
										$url, $staticdata,$dynamicdata,
										$description,
                                        $homedir,$editor))            
		{
			header("Location:/portal/manage/id-$ret");
			return ;
		}
        else
        {
			$msg = array_pop($this->getModel('mtopic')->error_stack);
            $this->create($msg['message'].':'.$msg['data']);
        }
	}

    public function listall()
    {
    	parent::init();

		$this->createMenu();
		
		// get Index main view
		$c = $this->getModel('mtopic')->getProjectList();

		$this->tpl->assign('topics', $c);
		#$right = $this->tpl->fetch('portal_sitelist.tpl.html');

        $c = $this->tpl->fetch('portal.tpl.html');
        $this->tpl->assign('body', $c);

		// show all
		#$this->tpl->assign('title','专题项目管理');
		#$this->tpl->assign('menulist',$menulist);
		#$this->tpl->assign('body',$right);
		$this->tpl->display('index.tpl.html');
    }

    public function manage()
    {
    	parent::init();

		$projectid = $_GET['id'];

		// TODO: 获得公共模板的名称， 这个功能需要重新考虑，或许叫做内置模板什么的
		// $templatesname = $this->getModel('mtemplates')->getTemplatesNames();

		// 获得项目模板列表
		$templates = $this->getModel('mtopic')->getTemplates($projectid);

		if($templates)
		foreach($templates as $k=>$v)
		{
		    if( isset ($templatesname[$v->from_templateid]) )
		    {
		        $templates[$k]->name = $templatesname[$v->from_templateid];
		    }
		    else
		    {
		    	$templates[$k]->name = '';
		    }
		}

		// 获得项目页面列表
		$pages = $this->getModel('mtopic')->getPages($projectid);

        // 获得项目数据组列表
        $datagroup = $this->getModel('mdatagroup')->getDatagroups($projectid);

        $project = $this->getModel('mtopic')->getAllProjectInfo($projectid);

        $checkname=$this->getModel('mtopic')->checkfile($project->zipname);

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

		$this->createMenu();
      
		$this->tpl->assign('home',$this->home);		
		$this->tpl->assign('id',$projectid);		
		if($templates)
		    $this->tpl->assign('templates',$templates);		
		$this->tpl->assign('project', $project);
		$this->tpl->assign('pages',$pages);		
		$this->tpl->assign('datagroup', $datagroup);
		$this->tpl->assign('datasource',$datasource);		
		$c = $this->tpl->fetch('portal_topicmanage.tpl.html');
		$this->tpl->assign('body',$c);
		$this->tpl->display('index.tpl.html');
    }

    /**
     * @Description: 填写一个模板
     */         
    public function addSiteTemplate()
    {
    	parent::init();

        $content = stripslashes($_POST['content']);
        $from_tmplid = isset($_POST['from_tmplid'])?$_POST['from_tmplid']:-1;
        $filename = $_POST['filename'];
        $id       = $_POST['id'];
        $name     = $_POST['name'];
        $type     = $_POST['type'];
    
        $projectid   = $_GET['id'];
        $projectinfo = $this->getModel('mtopic')->getAllProjectInfo($projectid);
		$templateinfo= $this->getModel('mtopic')->getTemplateById(-1);

		$templateinfo->from_tmplid = $from_tmplid;
		$templateinfo->name = $name;
		$templateinfo->filename = $filename;
		$templateinfo->content = $content;

		$this->createMenu();
        $this->tpl->assign('title', '增加专题模板');
        $this->tpl->assign('home', $this->home);
        $this->tpl->assign('project', $projectinfo);
        $this->tpl->assign('template', $templateinfo);

        $this->tpl->assign('type', $type);
        $this->tpl->assign('message', $message);

        $this->tpl->display('portal_addsitetemplate.tpl.html');
        #$this->tpl->assign('body',$c);
		#$this->tpl->display('index.tpl.html');
    }

    // 增加一个页面
	public function addpage()
	{
		parent::init();

	    $projectid 	= $_GET['id'];
	    $projectname= $this->getModel('mtopic')->getProjectInfo($projectid, 'title');

	    $templates  = $this->getModel('mtopic')->getTemplates($projectid);  
        $pageid 	= -1;
        
        $this->createMenu();
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

	    $this->tpl->assign('type', "add");

		$c = $this->tpl->fetch('portal_addsitepage.tpl.html');
		
		$this->tpl->assign('body',$c);
		$this->tpl->display('index.tpl.html');
	}

    public function editpage()
    {
    	parent::init();

        $projectid = $_GET['id'];
        $pageid    = $_GET['pageid'];

        $projectname=$this->getModel('mtopic')->getProjectInfo($projectid, 'title');
        $templates = $this->getModel('mtopic')->getTemplates($projectid);
        $page      = $this->getModel('mtopic')->getPage($pageid);

        #$this->smarty->assign('home',  $this->home);
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

        $this->tpl->assign('type', "edit");
        $c = $this->tpl->fetch('portal_addsitepage.tpl.html');

        $this->createMenu();
        $this->tpl->assign('body',$c);
        $this->tpl->display('index.tpl.html');
    }

	public function delpage()
	{
		parent::init();

        $projectid = $_GET['id'];
        $pageid    = $_GET['pageid'];

	    $page      = $this->getModel('mtopic')->getPage($pageid);
	    $this->tpl->assign('filename',   $page->filename);
	    $this->tpl->assign('home',  $this->home);
	    $this->tpl->assign('id',$projectid);
	    $this->tpl->assign('pageid',$pageid);
	    $this->tpl->display('portal_delpage.tpl.html');
	}

    public function doDelPage(){
        parent::init();

        $projectid = $_GET['id'];
        $pageid    = $_GET['pageid'];
        
        $this->getModel('mtopic')-> delPage($projectid, $pageid);

        header("location:/portal/manage/id-$projectid");
    }

    public function cancelDelPage(){
        parent::init();

        $projectid = $_GET['id'];
        
        header("location:/portal/manage/id-$projectid");
    }


    public function delProject(){
        parent::init();

        $projectid = $_GET['id'];
        $project      = $this->getModel('mtopic')->getProject($projectid);

        $this->tpl->assign('filename', $project['0']['title']);
        $this->tpl->assign('home',  $this->home);
        $this->tpl->assign('id',$projectid);
        $this->tpl->display('portal_delproject.tpl.html');
    }

    public function doDelProject(){
        parent::init();

        $projectid = $_GET['id'];
        
        $this->getModel('mtopic')->delProject($projectid);
        header("location:/portal/listall");
    }

    public function cancelDelProject(){

        header("location:/portal/listall");
    }



	public function editdatagroup()
    {
    	parent::init();

        $projectid 	= $_GET['id'];
        $dgname    	= $_GET['name'];

		$date 		=date("y-m-d");
		$date 		=strtotime($date);
		$t_date		=$date;
		$y_date		=$date-3600*24;
		$p_date 	=$date-3600*24*2;

        $_SESSION['dgname']=$dgname;

        $dginfo 	= $this->getModel('mdatagroup')->getDatagroupInfo($projectid, $dgname);
        $datalist 	= $this->getModel('mdatalist')->getDatalist($projectid, $dgname);
        $datacount 	= $this->getModel('mdatalist')->getDatalist_count($projectid, $dgname);
        $data_first = $this->getModel('mdatalist')->getDatalist_first($projectid,$dgname);

        $dateline_first=$data_first[0]->dateline;
        $date_first=date("Y-m-d",$dateline_first);

        $nums=$datacount[0]->nums;
        $pages=ceil($nums/20);

		for($i=1; $i<=$pages; $i++)
		{
		     $pp[]=$i;
		}

		if($datalist)
        foreach($datalist as $k=>$v)
        {
            $datalist[$k]->date = date('md H:i', $datalist[$k]->dateline);
        }

        if($datalist)
        foreach($datalist as $k=>$v)
        {
               $datalist[$k]->d=$datalist[$k]->dateline-time();
        }

		$this->createMenu();
        $this->tpl->assign('pp',$pp);
        $this->tpl->assign('dg', $dginfo);
        $this->tpl->assign('datalist', $datalist);
        $this->tpl->assign('home', $this->home);
        $this->tpl->assign('id', $projectid);
        $this->tpl->assign('nums', $nums);
        $this->tpl->assign('date_first',$date_first);

        $this->tpl->assign('url',$this->config['uploaddir']);

        //$this->smarty->assign('url',file_get_contents("c:/upload/images/31_test_1.jpg"));
        $this->tpl->assign('t_date', $t_date);
	    $this->tpl->assign('y_date',$y_date);
	    $this->tpl->assign('p_date',$p_date);

        if($nums>20)
        {
	        $this->tpl->assign('today','今天');
	        $this->tpl->assign('yes','昨天');
	        $this->tpl->assign('pre','前天');
        }
        $c = $this->tpl->fetch('portal_editdatagroup.tpl.html');

        $this->tpl->assign('body',$c);
		$this->tpl->display('index.tpl.html');        
    }  

    public function editpagehook()
    {
        parent::init();
        $projectid = $_GET['id'];
        $pageid    = $_GET['pageid'];


        $projectname=$this->getModel('mtopic')->getProjectInfo($projectid, 'title');
        $page =$this->getModel('mtopic')->getPage($pageid);
        // print_r($page->projectid); echo "--";
        // print_r($page->id); die();

        $this->tpl->assign('home',  $this->home);

        $this->tpl->assign('projectid',  $page->projectid);
        $this->tpl->assign('projectname',$projectname);
        $this->tpl->assign('pageid',     $page->id);
        $this->tpl->assign('pagename',   $page->pagename);

        $this->tpl->assign('publishtype',   $page->publishtype);
        $this->tpl->assign('user_hook_filename',   $page->user_hook_filename);
        $this->tpl->assign('hookfilecontent', $page->hookfile_content);

        $c = $this->tpl->fetch('portal_editpageextend.tpl.html');

        $this->createMenu();
        $this->tpl->assign('body',$c);
        $this->tpl->display('index.tpl.html');
    }

    public function peditpagehook()
    {
        parent::init();
        $id = $_GET['id'];
        $pageid = $_GET['pageid'];

        // print_r($projectid);
        // print_r($pageid);
        // print_r("here");

        $content = $_POST['hookfile_content'];

        // print_r("dingdong".$id);
        // print_r($pageid."dingdong");
        // return;

        $this->getModel('mtopic')->updatePageExtInfo($id, $pageid, $_POST['user_hook_filename'], $content );

        #echo "<meta http-equiv='refresh' content='0;url=/portal/manage/id-$id'>";
        header("location:/portal/manage/id-$id");
    }

    //分页
    public function page()
    {
        parent::init();

        //print_r(date("y-m-d h:i:s"));
        $d=$_GET['d'];
        $projectid = $_GET['id'];
        $dgname    = $_SESSION['dgname'];
        $p=$_GET['p'];
        $date=date("y-m-d");
        $date=strtotime($date);

        $t_date=$date;
        $y_date=$date-3600*24;
        $p_date=$date-3600*24*2;

        $dginfo = $this->getModel('mdatagroup')->getDatagroupInfo($projectid, $dgname);
        $data_first=$this->getModel('mdatalist')->getDatalist_first($projectid,$dgname);
        $datacount = $this->getModel('mdatalist')->getDatalist_count($projectid, $dgname);
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
            $datalist = $this->getModel('mdatalist')->getDatalist_page($projectid, $dgname,$d,$next_date);
        }
        else
        {
            if($key_word!='')
            {
                $datalist = $this->getModel('mdatalist')->getDatalist_key($projectid,$dgname,$key_word);
            }
            else if($writer_name!='')
            {
                $datalist = $this->getModel('mdatalist')->getDatalist_writer($projectid,$dgname,$writer_name);
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

        $this->createMenu();
        $this->tpl->assign('body', $c);
        $this->tpl->display('index.tpl.html');
    }

    /**
     * 添加页面, 这个有必要说明一下
     * 1. 页面种类: 
     *          静态发布: 使用 smarty 合并参数，生成静态页面，并写入目标文件夹
     *          动态发布: copy固定的动态模板到目标文件夹。
     *          自定义: 把用户录入/上传的文件内容，以目标文件名保存到目标文件夹                    
     */
    public function doAddSitePage()
    {
    	parent::init();

        $projectid  = $_GET['id'];
        $pageid     = $_POST['pageid'];
        $templateid = $_POST['templateid'];
        $pagename   = $_POST['pagename'];
        $filename   = $_POST['filename'];
        $publishtype= $_POST['publishtype'];


        if($publishtype=='dynamic')
            $hookfile = "hook_".$_POST['filename'];
        else if($publishtype=='manual')
            $hookfile = $_POST['hookfile'];
        else if($publishtype=='auto')
            $hookfile = $_POST['hookfile'];
        else
            $hookfile = '';


        if($pageid==-1)
            $ret = $this->getModel('mtopic')->addPage(
            		$projectid, $templateid, $pagename, $filename, $publishtype, $hookfile);
        else
            $ret = $this->getModel('mtopic')->editPage(
            		$projectid, $pageid, $templateid, $pagename, $filename, $publishtype,$hookfile);

        if($ret)
        {
            // 模板添加或更新完成， 刷新模板相关的变量
            header('Content-Type:text/html;charset=UTF8');
            echo "<meta http-equiv='refresh' content='3;url=/portal/manage/id-$projectid'>";
            $this->refreshData();
            return ;
        }
        else
        {
            $msg = array_shift($this->getModel('mtopic')->error_stack);
            $this->addpage($msg['data']);
        }
    }

// ------- 以上函数已经没有问题了 -------
    //添加资源
    public function addimg()
	{        
		parent::init();

	   	//上传路径
		$projectid = $_GET['id'];
		$name=$_FILES['filename']['name'];
		$tmp_name=$_FILES["filename"]["tmp_name"];

		$project = $this->getModel('mtopic')->getAllProjectInfo($projectid);	


		$ret = $this->getModel('mtopic')->addResources($projectid,$name,$tmp_name);

        header('Content-Type:text/html;charset=UTF8');
        if($ret===true)
		  $this->manage();
        else
            echo $ret;
	}

	public function publish()
	{
		parent::init();

	    $projectid = $_GET['id'];

        // 准备专题信息	    
        $project = $this->getModel('mtopic')->getAllProjectInfo($projectid);

        $basedir = $project->directory;
        $this->getModel('mpublish')->setBasedir($basedir);

        if($project->zipname)
        {
            //解压资源
            $this->getModel('mtopic')->publishZippedResource($project->directory, $project->zipname);
        }


        // 配置发布模块

        // 导出数据为数组，作序列化发布用
        $dump = $this->getModel('mdatalist')->dumpToArray($projectid);

        // 发布静态数据
        $staticFilePath = $basedir."/templates_c/".$project->staticdata;
        $this->getModel('mpublish')->publishFileContent($staticFilePath, serialize($dump));

        //发布动态数据
        $dynamic_content = $this->getModel('mtopic')->getProjectInfo($project->id, 'dynamic_content');
        $staticFilePath = $basedir."/templates_c/".$project->dynamicdata;
        $this->getModel('mpublish')->publishFileContent($staticFilePath, $dynamic_content);


        // 遍历所有页面，进行内容发布
		// 获得项目页面列表
		$pages = $this->getModel('mtopic')->getPages($projectid);

		if($pages)
        foreach($pages as $k=>$v)
        {
			
        	// 发布模板文件
        	$templatecontent = $this->getModel('mtopic')->getTemplateById($v->templateid);
            // $basedir = $this->getModel('mtopic')->getProjectInfo($projectid, 'directory');

            $templateFileName = $targetdir = $basedir."/templates/".$templatecontent->templatefile;
        	$this->getModel('mpublish')->publishFileContent($templateFileName , $templatecontent->content);

            if($v->publishtype=='static')
            {
            	// echo $v->filename,'<br/>';
                $templatefilename = $this->getModel('mtopic')->getTemplateFilename($v->templateid);
                $mpublish = $this->getModel('mpublish');
                
                $this->tpl->template_dir = $basedir."/templates";
                $this->tpl->fetch($templatefilename);
                if($dump){
                    foreach($dump as $k1=>$v1)
                    {
                        $this->tpl->assign($k1,$v1);
                    }
                }

                
                $targetfilename = $v->filename;
                $targetFilePath = $basedir.'/'.$targetfilename;
                
                $mpublish->publishStatic($targetFilePath, $templatecontent->content);
            }
            elseif($v->publishtype=='dynamic')
            {
                $templatefilename = $this->getModel('mtopic')->getTemplateFilename($v->templateid);

                echo $v->filename,' from ', $templatefilename,'<br/>';
                $this->getModel('mpublish')->publishDynamic($this->tpl,$v->filename, $templatefilename, $project);

                if($v->hookfile_content){

                    // print_r($v->user_hook_filename);die();
                    $this->getModel('mpublish')->publishManual($v->user_hook_filename, $v->hookfile_content);
                }
            }
            elseif($v->publishtype=='manual') 
            {
                // publish manual content
                echo $v->filename, ' Manual <br/>';

                $this->getModel('mpublish')->publishManual($v->user_hook_filename, $v->hookfile_content);
            }
        }
		else
		{
			echo '连个页面都没有，发布个什么呢？';
			return ;
		}

		// 遍历数据，拷贝数据图片
		$dataids = $this->getModel('mdatalist')->dumpImageNames($projectid);
		$this->getModel('mpublish')->publishImages($dataids);

        $project = $this->getModel('mtopic')->getAllProjectInfo($projectid);

		echo "<meta http-equiv='refresh' content='1;url=$project->url'>";

		echo '发布成功,1秒后跳转到专题页面';
        return ;
	}

    public function republish()
    {
        parent::init();

        // TODO: 需要强提示，是否删除目录 xxx 下的全部文件及全部子目录中的文件
        $projectid = $_GET['id'];


        // 准备专题信息
        $project = $this->getModel('mtopic')->getAllProjectInfo($projectid);

        // 删除已经拷贝和发布的文件
        $this->getModel('mpublish')->cleanTargetPath($project->directory);


        // 公共模板功能现未启用
        
        // 拷贝资源文件
        // 遍历所有页面，进行内容发布
        // 获得项目页面列表
        // $templates = $this->getModel('mtopic')->getTemplates($projectid);
        // if($templates)
        //     foreach($templates as $k=>$v)
        //     {
        //         // 发布模板文件
        //         if($v->from_templateid>0)
        //         {
        //                 $v->content = '';
        //                         $path = $this->getModel('mtemplates')->getTempatesPath($v->from_templateid);
        //                         $this->getModel('mpublish')->copyTemplateResource(
        //                                                 ROOT_DIR.'/common_templates/'.$path,
        //                                                 core::getInstance()->getConfig('topicdir').'/'.$project->directory);
        //         }
        //     }
        //     else
        //     {
        //         echo '连个模板都没有选，发布什么呢？';
        //         return;
        //     }

        // 调用正常的发布流程
        $this->publish();
    }

    public function editSiteTemplate()
    {
    	parent::init();

        $projectid   = $_GET['id'];
        $templateid  = $_GET['templateid'];
        $projectinfo = $this->getModel('mtopic')->getAllProjectInfo($projectid, 'name');
        $templateinfo= $this->getModel('mtopic')->getTemplateById($templateid);

        $this->tpl->assign('home', $this->home);
        $this->tpl->assign('title', '编辑专题模板');
        $this->tpl->assign('project',$projectinfo);
        $this->tpl->assign('template',$templateinfo);

        $c = $this->tpl->fetch('portal_addsitetemplate.tpl.html');
        echo $c;
		#$this->createMenu();
		#$this->tpl->assign('body',$c);
		#$this->tpl->display('index.tpl.html');
    }

    public function doAddSiteTemplate()
    {
    	parent::init();

        // TODO: get post params
        $content  = addslashes($_POST['content']);
        $filename = $_POST['filename'];
        $id       = $_POST['id'];
        $name     = $_POST['name'];
        $type     = $_POST['type'];
        $from_tmplid = intval($_POST['from_tmplid']);

        $projectid= $_GET['id'];
        if($id!=-1)
        {
            $ret = $this->getModel('mtopic')->editTemplate(
                        $projectid, $id, $name, $type, 
                        $filename, $from_tmplid, $content);
                        // ,ROOT_DIR.$this->config['template_upload']);

        }
        else
        {
            $ret = $this->getModel('mtopic')->addTemplate(
                        $projectid, $id, $name, $type, 
                        $filename, $from_tmplid, $content);
            // ,ROOT_DIR.$this->config['template_upload']);
        }

		// 重新发布文件？ 留到发布时再做吧
		if($ret)
		{
            header("location:/portal/manage/id-$projectid");
            echo "<meta http-equiv='refresh' content='0;url=/portal/manage/id-$projectid'>";
            $this->refreshData();
            return ;
		}
        else
        {
            if($this->getModel('mtopic')->error_stack){
                $msg = array_pop($this->getModel('mtopic')->error_stack);
            }else{
                echo "Add template failed! Check doAddSiteTemplate method in portal.php";
            }
                
            $this->addtemplate($msg['message']);
        }
    }

	public function listdata()
	{
		die('listdata');
		parent::init();

	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	    
	    $dginfo = $this->getModel('mdatagroup')->getDatagroupInfo($projectid, $dgname);

	    // TODO: 判断URL,调用合适的解析工具
	    $content = file_get_contents($dginfo->datasource);
	    if($dginfo->sourcetype=='json') 
	    {
	        $data = json_decode($content);
	    }
	    else if($dginfo->sourcetype=='xml')
	    {
	        #$data = xml_parser($content);
	    }
	    echo $content;
	}	

	public function refreshdata()
	{
        parent::init();

	    $projectid = $_GET['id'];
        $varlist = $this->getModel('mtopic')->refreshDatalist($projectid);

        // 这个是什么？ 上面是重新解些了模板的变量列表，这个是更新数据库的记录
        $ret = $this->getModel('mdatagroup')->updateDatagroup($projectid, $varlist);

		echo $ret;
	}	

	function inputbox()
	{
        parent::init();

	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	    $type      = $_GET['dst'];
		$date      = date("Y-m-d H:i:s",time()); 
	    
        header('Content-Type:text/html;charset=UTF8;');
		$this->tpl->assign('edittime',$date);
	    $this->tpl->assign('dgname',$dgname);
	    $this->tpl->assign('id', $projectid);
	    $this->tpl->assign('type', $type);
	    $this->tpl->assign('home',$this->home);
	    $this->tpl->display('portal_datainput.tpl.html');
	}
	
	function editbox()
	{
		parent::init();

	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	    $dataid    = $_GET['dataid'];
	    
		$row = $this->getModel('mdatalist')->getDataDetail($projectid, $dgname, $dataid);

        $selectone=array();
		$selectone=$this->getModel('mdatalist')->selectone($dataid,$projectid,$dgname);
		$edittime=$selectone[0]->dateline;

        $edittime=date("Y-m-d H:i:s",$edittime);
        $this->tpl->assign('edittime',$edittime);
	    $this->tpl->assign('dgname',$dgname);
	    $this->tpl->assign('id', $projectid);
	    $this->tpl->assign('dataid', $dataid);
		$this->tpl->assign('data', $row);
	    $this->tpl->assign('home',$this->home);
	    $this->tpl->display('portal_dataedit.tpl.html');
	}
	
	function deletebox()
	{
		parent::init();

	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	    $dataid    = $_GET['dataid'];

		$row = $this->getModel('mdatalist')->getDataDetail($projectid, $dgname, $dataid);

	    $this->tpl->assign('dgname',$dgname);
	    $this->tpl->assign('id', $projectid);
	    $this->tpl->assign('dataid', $dataid);
		$this->tpl->assign('data', $row);
		$this->tpl->assign('url', core::getInstance()->getConfig('topicurl'));
	    $this->tpl->assign('home',$this->home);
	    $this->tpl->display('portal_datadelete.tpl.html');
	}
    
    //删除数据对话框
	function deletedgbox()
	{
		parent::init();

	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	   
	    $dginfo = $this->getModel('mdatagroup')->getDatagroupInfo($projectid, $dgname);
		$count=$this->getModel('mdatalist')->getDatalist_count($projectid,$dgname);
        
	    $this->tpl->assign('dgname',$dgname);
	    $this->tpl->assign('id', $projectid);
	    $this->tpl->assign('count',$count[0]);
		$this->tpl->assign('data', $dginfo);
	    $this->tpl->assign('home',$this->home);
	    $this->tpl->display('portal_deletedatagroup.tpl.html');
	}

    //多项数据删除对话框
	function deletedgboxmore()
	{
		parent::init();
	    $projectid = $_GET['pid'];
	    $dgname    = $_GET['dname'];
	    $id        = $_GET['id'];
        $length    = $_GET['l'];
     
		
	    $this->tpl->assign('dgname',$dgname);
	    $this->tpl->assign('pid', $projectid);
	    $this->tpl->assign('count',$length);
		$this->tpl->assign('id', $id);
	    $this->tpl->assign('home',$this->home);
	    $this->tpl->display('box.datagroupmore_delete.html');
		
	}


	function pinput()
	{
        parent::init();

		$writer    = $_SERVER['PHP_AUTH_USER'];
	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	    
	    $dgtype    = $_POST['dgtype'];
	    $title     = $_POST['title'];
	    $url       = $_POST['url'];
	    $alt       = $_POST['alt'];
	    $abstract  = $_POST['abstract'];
	    $imageurl  = $_POST['imageurl'];
		$pubtime   = $_POST['pubtime'];

		if($pubtime=='last')
		{
			 $time=time();
		}
		if($pubtime=='edit')
		{
			$time=strtotime($_POST['edittime']);
		} 
	   
		if($dgtype=='list')
		{
			// TODO:这里会有并发问题，应该插入一条假数据，然后update
			$dgid = $this->getModel('mdatalist')->getMaxId($projectid, $dgname);
			$dgid += 1;
		}
		else
			$dgid = 1;
	    
	    // TODO: 检查上传的文件
		if(is_uploaded_file($_FILES['imagedata']['tmp_name']))
		{
			// 处理上传文件
			// 1. 检查对应记录的上传
			// move_uploaded_file()
			$pp = pathinfo($_FILES['imagedata']['name']);
			$uploadfile = $projectid.'_'.$dgname.'_'.$dgid.'.'.$pp['extension'];
			
			//$ret = move_uploaded_file($_FILES['imagedata']['tmp_name'], ROOT_DIR.'/upload/images/'.$uploadfile);
            $ret = move_uploaded_file($_FILES['imagedata']['tmp_name'], core::getInstance()->getConfig('uploaddir').'/images/'.$uploadfile);
			 
            if($ret==true)
			{
                $imageurl = 'images/'.$uploadfile;
			}
			else
			{
				echo("上传失败");
			}
		}
		else
			$imageurl = $_POST['imageurl'];

	    // TODO: 传递给数据库的一定是连接
	    if($dgtype=='list')
        {
            $ret = $this->getModel('mdatalist')->appendone($projectid, $dgname, $dgid,
                                        $title, $url, $imageurl, $abstract, $alt,$time,$writer);
        }
	    else // dgtype=sinle
        {
            $ret = $this->getModel('mdatalist')->updateone($projectid, $dgname, $dgtype, 1,
                                        $title, $url, $imageurl, $abstract, $alt,1,$time,$writer);
        }
        header("location:/portal/editdatagroup/id-$projectid/name-$dgname");
	    #echo '<script>if(window.parent){window.parent.location.reload()};</script>';
	    return ;
	}

	function showimg()
	{
		die('showimg');
		$projectid = $_GET['id'];
        $dgname    = $_GET['name'];
		$dataid    = $_GET['dataid'];

		$datalist = $this->getModel('mdatalist')->getDataDetail($projectid, $dgname,$dataid);

		header("Content-type:image/jpeg");
		
        echo(file_get_contents(core::getInstance()->getConfig('uploaddir')."/".$datalist->image));
         //echo($this->config['uploaddir']."/".$datalist->image);
	}

	function peditData()
	{
        parent::init();
		$writer    = $_SERVER['PHP_AUTH_USER'];
	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	    
		$dataid    = $_POST['dataid'];
	    $dgtype    = $_POST['dgtype'];
	    $title     = $_POST['title'];
	    $url       = $_POST['url'];
	    $alt       = $_POST['alt'];
	    $abstract  = $_POST['abstract'];
	    $imageurl  = $_POST['imageurl'];
		$order     = $_POST['orderingroup'];
		$pubtime   = $_POST['pubtime'];

		if($pubtime=='last')
		{
			 $time=time();
		}
		if($pubtime=='edit')
		{
			$time=strtotime($_POST['edittime']);
			
		}
				
	    // 检查上传的文件
	    // TODO: 没有针对上传文件的module
		if(is_uploaded_file($_FILES['imagedata']['tmp_name']))
		{
			// 处理上传文件
			// 1. 检查对应记录的上传
			// move_uploaded_file()
			$pp = pathinfo($_FILES['imagedata']['name']);
			$uploadfile = $projectid.'_'.$dgname.'_'.$dataid.'.'.$pp['extension'];
			$ret = move_uploaded_file(
					$_FILES['imagedata']['tmp_name'], 
					core::getInstance()->getConfig('uploaddir').'/images/'.$uploadfile);
           
			$imageurl = 'images/'.$uploadfile;
		}
		else
			$imageurl = $_POST['imageurl'];

		if($pubtime=='keep')
		{
			$selectone=array();
			$selectone=$this->getModel('mdatalist')->selectone($dataid,$projectid,$dgname);
			$time=$selectone[0]->dateline;
		
		}
	
		// TODO: 传递给数据库的一定是连接
	    $this->getModel('mdatalist')->updateone($projectid, $dgname, $dgtype, $dataid,
	                                    $title, $url, $imageurl, $abstract, $alt, $order,$time,$writer);
	    
        header("location:/portal/editdatagroup/id-$projectid/name-$dgname");
	    return ;
	}

    public function jgetdgshowname()
    {
    	die('jgetdgshowname');
        $projectid = $_GET['id'];
        $dgname    = $_GET['name'];
        
        $ret = $this->getModel('mdatagroup')->getDatagroupInfo($projectid, $dgname, 'userdefinedname', $dguname);
        echo "{'ret':1, 'msg':'ok', 'value':'$ret'}";
    }

	public function jrenamedg()
	{
		die('jrenamedg');
		$projectid = $_GET['id'];
		$dgname    = $_GET['name'];
		$dguname   = urldecode ( $_GET['uname'] );
        
        $ret = $this->getModel('mdatagroup')->updateDatagroupInfo($projectid, $dgname, 'userdefinedname', $dguname);

		if($ret)
			echo json_encode(array('ret'=>1, 'msg'=>'ok', 'value'=>$dguname));
		else
			echo '{"ret":0, "msg":"没有获得内容"}';
	}

    function renamebox()
    {
        parent::init();

		$projectid = $_GET['id'];
		$dgname    = $_GET['name'];
		$showname  = urldecode($_GET['showname']);
		$udfname   = urldecode($_GET['uname']);

        $this->tpl->assign('home', $this->home);
        $this->tpl->assign('id', $projectid);
        $this->tpl->assign('dgname', $dgname);
        $this->tpl->assign('showname', $showname);
        $this->tpl->assign('userdefinedname', $udfname);
        #$this->tpl->display('box.datagroup_rename.html');
        $this->tpl->display('portal_renamedatagroup.tpl.html');
    }

	function jupdatedg()
	{
		parent::init();
		$projectid = $_GET['id'];
		$dgname    = $_GET['name'];
        
        $key   = $_POST['key'];
        $value = $_POST['value'];

        $ret = $this->getModel('mdatagroup')->updateDatagroupInfo($projectid, $dgname, $key, $value);

		if($ret)
			echo json_encode(array('ret'=>1, 'msg'=>'ok', 'value'=>$value));
		else
			echo '{"ret":0, "msg":"没有获得内容"}';
	}

    public function jdeldata()
    {
        parent::init();

        $projectid = $_GET['id'];
        $dgname    = $_GET['name'];
        $id        = $_GET['dataid'];
        
        // TODO: get image file
	    $detail = $this->getModel('mdatalist')->getDataDetail($projectid, $dgname, $id);
        
        $ret = $this->getModel('mdatagroup')->deleteData($projectid, $dgname, $id);
		if(is_file($this->config['uploaddir'].$detail->image)){
			unlink($this->config['uploaddir'].$detail->image);
		}
        
        // TODO: delete image file
        if($ret)
            echo json_encode(array('ret'=>1, 'msg'=>'删除成功'));
        else
            echo json_encode(array('ret'=>0, 'msg'=>'删除失败'));
        
    }
    
         //删除数据
	public function deletedatagroup()
	{
		parent::init();
		$projectid=$_GET['id'];
		$dgname=$_GET['name'];
        
        $dgresult=$this->getModel('mdatagroup')->delDatagroup($projectid, $dgname);
        $dglist=$this->getModel('mdatalist')->delDatagrouplist($projectid,$dgname);

		if($dgresult)
		{
			if($dglist)
			{
               echo json_encode(array('ret'=>1, 'msg'=>'删除成功'));
			}
			else
			{
                echo json_encode(array('ret'=>0, 'msg'=>'删除失败'));
			}
		}
		else
		{
			echo json_encode(array('ret'=>0, 'msg'=>'删除失败'));
		}
		
	
	}

    //多项删除数据
	public function deletedatagroupmore()
	{
		die('deletedatagroupmore');
		$projectid = $_GET['pid'];
		$dgname    = $_GET['name'];
		$id        = $_GET['id'];

        $dgresult=$this->getModel('mdatagroup')->delDatagroupmore($id);
        $dglist=$this->getModel('mdatalist')->delDatagrouplistmore($projectid,$dgname);

		if($dgresult)
		{
			if($dglist)
			{
               echo json_encode(array('ret'=>1, 'msg'=>'删除成功'));
			}
			else
			{
                echo json_encode(array('ret'=>0, 'msg'=>'删除失败'));
			}
		}
		else
		{
			echo json_encode(array('ret'=>0, 'msg'=>'删除失败'));
		}
		
	
	}

    //获取json接口
	function get_json()
	{ 
		die('get_json');
         $typeid = $_GET['typeid'];
		 $projectid = $_GET['id'];
		 $dgname = $_GET['name'];
		 $dgtype = $_GET['dst'];
        
       
		if($typeid=='guide')
		{
			$url = "http://www.10jing.com/api/guide_list/&page=1";
		}
        $datalist = json_decode(file_get_contents($url));

		$this->tpl->assign('dgtype',$dgtype);
		$this->tpl->assign('typeid',$typeid);
		$this->tpl->assign('projcetid',$projectid);
		$this->tpl->assign('name',$dgname);
	    $this->tpl->assign('home',$this->home);
		$this->tpl->assign('datalist', $datalist);
	    $this->tpl->display('box.data_plugins.html');

	}

    function input_json()
	{
		die('input_json');
		$usr = $_SERVER['PHP_AUTH_USER'];
		$id     = $_GET['id'];
		$pid    = $_GET['pid'];
		$dgname = $_GET['dname'];
        $typeid = $_GET['typeid'];
        $dgtype = $_GET['dgtype'];
        $date   = time();

        $ids = split(',',$id);
        
		
		if($typeid=='guide')
		{
			$url = 'http://www.10jing.com/api/guide_list/&page=1';
		}

        $datalist = json_decode(file_get_contents($url));
       
		foreach($ids as $k=>$v)
		{
			$datalist[$v]->cover_pubtime = date('Y年m月d日');
			if($dgtype == 'list')
			{
			 $dgid = $this->getModel('mdatalist')->getMaxId($pid, $dgname);
		     $dgid += 1;
			 $ret = $this->getModel('mdatalist')->appendone($pid, $dgname, $dgid, $datalist[$v]->cover_title, $datalist[$v]->cover_url, $datalist[$v]->cover_image, $datalist[$v]->cover_keywords, $datalist[$v]->cover_pubtime,$date,$usr);
			}
			else
			{
				$dgid = 1;
				$ret = $this->getModel('mdatalist')->updateone($pid, $dgname, $dgtype, 1, $datalist[$v]->cover_title, $datalist[$v]->cover_url, $datalist[$v]->cover_image, $datalist[$v]->cover_keywords, $datalist[$v]->cover_pubtime,1,$date,$usr);
			}
            
		}
		
       echo '<script>if(window.parent){window.parent.location.reload()};</script>';
	   return ;

	}
    public function sortDatalist()
    {
    	die('sortDatalist');
        $projectid = $_GET['id'];
        $dgname    = $_GET['name'];
    
        // sort datalist
        echo $_SERVER['REDIRECT_URL'],"<br/>", $_SERVER['QUERY_STRING'],'<br/>';
        //echo max($_POST['o']),':',min($_POST['o']);
        echo '<hr><pre>';

        $rows = $this->getModel('mdatalist')->getDatalistByIdList($projectid, $dgname, $_POST['o']);

        $i = 0;
        $arrRows   = array();
        foreach($rows as $v)
            $arrRows[$v->id] = $v->dateline;
        
        $arrResult = array();
        foreach($_POST['o'] as $v)
        {
            $hasid = false;
            foreach($rows as $kk=>$vv)
            {
                if($vv->id==$v)
                {
                    $hasid = true;
                }
            }
            if(!$hasid)
                $arrResult[$v] = -1;
            else
            {
                $arrResult[$v] = $rows[$i]->dateline; 
                $i++;
            }
        }

        // FIXME: 这里有一个 """巧合编程""", 假定提交上来的列表和数据库取出的列表可以一一对应。
        //         单人编辑时貌似没什么问题，但如果多人同时编辑，只要有删除，编辑等操作出现，就一定会出问题
        $lastdateline = 0;
        foreach($arrResult as $k=>$v)
        {
            echo $k,'=>', $v,"\n";
            if($arrRows[$k] != $v) 
                $this->getModel('mdatalist')->updateTime($projectid, $dgname, $k, $v);
            else if($v==$lastdateline)
                $this->getModel('mdatalist')->updateTime($projectid, $dgname, $k, $v-1);
                
            $lastdateline = $v;
        }

        // TODO: 应该在web加入 时间编辑 的功能，还应该在时间编辑时校对服务器时间，以免编辑成一个历史时间
        // TODO: 是不是有编辑为一个历史时间的需求呢？需要确认一下，貌似没有。        
        // TODO: 需要返回json结果，并更新用户端数据
        // TODO: 这样的查询次数稍多，不过没关系，这属于后台，同时操作人数会很有限
    }


//--------------------------------------------------
	function copyfrom()
	{
		die('copyfrom');
		$templates = $this->getModel('mtemplates')->getAllTemplates();

		if($templates)
		    $this->tpl->assign('templates', $templates);
        $this->tpl->assign('home', $this->home);
		$this->tpl->display('box.templates_copyfrom.html');
	}

	function jgetcontent()
	{
		die('jgetcontent');
		$templateid = $_GET['id'];

		$c = $this->getModel('mtemplates')->getContent($templateid);

		if($c)
			echo json_encode(array('ret'=>1, 'msg'=>'ok', 'content'=>$c,'id'=>$templateid));
		else
			echo '{"ret":0, "msg":"没有获得内容"}';
	}

// --------------------------------------------------------
	// 编辑通用模板的数据，暂时也不用了吧
	function peditDataTemplate()
	{
		die('peditDataTemplate');
		$templateid = $_GET['tid'];	

		$name = $_POST['name'];
		$content = $_POST['content'];

		$this->getModel('mtemplates')->updateTemplateInfo($templateid, $name, $content);

        echo "<meta http-equiv='refresh' content='0;url=$this->home/templates/listall'>";
        return ;
	}

	// 列出通用模板, 这个函数暂时也不用了吧
    function listallTemplates()
    {
    	die('listallTemplates');
    	parent::init();

		$templates = $this->getModel('mtemplates')->getAllTemplates();

		$this->createMenu();
		// get Index main view
		$this->tpl->assign('home', $this->home);
		$this->tpl->assign('templates', $templates);
		$right = $this->tpl->fetch('portal_templateslist.tpl.html');
		$this->tpl->assign('menulist', $this->getModel('mmenu')->getMenu());
		$menulist = $this->tpl->fetch('menu.html');

		// show all
		$this->tpl->assign('menulist',$menulist);
		$this->tpl->assign('body',$right);
		$this->tpl->display('index.tpl.html');
    }

    // 编辑通用模板，这个函数暂时不用了吧
    function editTemplate()
    {
    	die('editTemplate');
		parent::init();

    	$templateid   = $_GET['tid'];
		$templateinfo = $this->getModel('mtemplates')->getTemplateInfo($templateid);

		// get Index main view

		$this->tpl->assign('home',$this->home);
		$this->tpl->assign('templateid',$templateinfo->templateid);
		$this->tpl->assign('name',$templateinfo->name);
		$this->tpl->assign('filename',$templateinfo->filename);
		$this->tpl->assign('content',$templateinfo->content);

		$right = $this->tpl->fetch('right.templates_edit.html');

		$this->tpl->assign('menulist', $this->getModel('mmenu')->getMenu());
		$menulist = $this->tpl->fetch('menu.html');

		// show all
		$this->tpl->assign('menulist',$menulist);
		$this->tpl->assign('rightpad',$right);
		$this->tpl->display('main.html');
	}	    	
}
