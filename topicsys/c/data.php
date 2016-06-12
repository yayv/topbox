<?php
/**
 * 公共模板管理
 * 
 */
include('c/commoncontroller.php');

class data extends CommonController
{
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
		// require_once('m/mmenu.php');
		// $this->mmenu = new mmenu();
	}

	function main()
	{
		$this->listdata();
	}
	
	public function listdata(  )  
	{
	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	    
	    if(!$this->mdatagroup)
	    {
	        include_once('m/mdatagroup.php');
	        $this->mdatagroup = new mdatagroup($this->db, $this->conf, $this->home);
	    }
	    $dginfo = $this->mdatagroup->getDatagroupInfo($projectid, $dgname);
	    
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
	
	function inputbox()
	{
	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	    $type      = $_GET['dst'];
		$date      = date("Y-m-d H:i:s",time()); 
	    
		$this->tpl->assign('edittime',$date);
	    $this->tpl->assign('dgname',$dgname);
	    $this->tpl->assign('id', $projectid);
	    $this->tpl->assign('type', $type);
	    $this->tpl->assign('home',$this->home);
	    $this->tpl->display('box.data_input.html');
	}
	
	function editbox()
	{
	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	    $dataid    = $_GET['dataid'];
	    
	

	    if(!$this->mdatalist)
	    {
	        include_once('m/mdatalist.php');
	        $this->mdatalist = new mdatalist($this->db, $this->config, $this->config['baseurl']);
	    }
		$row = $this->mdatalist->getDataDetail($projectid, $dgname, $dataid);

        $selectone=array();
		$selectone=$this->mdatalist->selectone($dataid,$projectid,$dgname);
		$edittime=$selectone[0]->dateline;

        $edittime=date("Y-m-d H:i:s",$edittime);
        $this->tpl->assign('edittime',$edittime);
	    $this->tpl->assign('dgname',$dgname);
	    $this->tpl->assign('id', $projectid);
	    $this->tpl->assign('dataid', $dataid);
		$this->tpl->assign('data', $row);
	    $this->tpl->assign('home',$this->home);
	    $this->tpl->display('box.data_edit.html');
	}
	
	function deletebox()
	{
	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	    $dataid    = $_GET['dataid'];
	    
	    if(!$this->mdatalist)
	    {
	        include_once('m/mdatalist.php');
	        $this->mdatalist = new mdatalist($this->db, $this->config, $this->config['baseurl']);
	    }
		$row = $this->mdatalist->getDataDetail($projectid, $dgname, $dataid);

	    $this->tpl->assign('dgname',$dgname);
	    $this->tpl->assign('id', $projectid);
	    $this->tpl->assign('dataid', $dataid);
		$this->tpl->assign('data', $row);
		$this->tpl->assign('url',$this->config['topicurl']);
	    $this->tpl->assign('home',$this->home);
	    $this->tpl->display('box.data_delete.html');
	}
     //删除数据对话框
	 	function deletedgbox()
	{
	    $projectid = $_GET['id'];
	    $dgname    = $_GET['name'];
	   
	    
	     if(!$this->mdatagroup)
	    {
	        include_once('m/mdatagroup.php');
	        $this->mdatagroup = new mdatagroup($this->db, $this->conf, $this->home);
	    }
		 if(!$this->mdatalist)
	    {
	        include_once('m/mdatalist.php');
	        $this->mdatalist = new mdatalist($this->db, $this->config, $this->config['baseurl']);
	    }
	    $dginfo = $this->mdatagroup->getDatagroupInfo($projectid, $dgname);
		$count=$this->mdatalist->getDatalist_count($projectid,$dgname);
        
	    $this->tpl->assign('dgname',$dgname);
	    $this->tpl->assign('id', $projectid);
	    $this->tpl->assign('count',$count[0]);
		$this->tpl->assign('data', $dginfo);
	    $this->tpl->assign('home',$this->home);
	    $this->tpl->display('box.datagroup_delete.html');
	}

    //多项数据删除对话框
	 	function deletedgboxmore()
	{
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
	   
	   

	    if(!$this->mdatalist)
	    {
	        include_once('m/mdatalist.php');
	        $this->mdatalist = new mdatalist($this->db, $this->config, $this->config['baseurl']);
	    }

		if($dgtype=='list')
		{
			// TODO:这里会有并发问题，应该插入一条假数据，然后update
			$dgid = $this->mdatalist->getMaxId($projectid, $dgname);
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
              $ret = move_uploaded_file($_FILES['imagedata']['tmp_name'], $this->config['uploaddir'].'/images/'.$uploadfile);
			 
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
	        $ret = $this->mdatalist->appendone($projectid, $dgname, $dgid,
	                                    $title, $url, $imageurl, $abstract, $alt,$time,$writer);
	    else // dgtype=sinle
		
	        $ret = $this->mdatalist->updateone($projectid, $dgname, $dgtype, 1,
	                                    $title, $url, $imageurl, $abstract, $alt,1,$time,$writer);
	    
	    echo '<script>if(window.parent){window.parent.location.reload()};</script>';
	   die();
	}

	function showimg()
	{
		$projectid = $_GET['id'];
        $dgname    = $_GET['name'];
		$dataid    = $_GET['dataid'];
		include_once('m/mdatalist.php');
		$this->mdatalist  = new mdatalist($this->db, $this->conf, $this->home);
		$datalist = $this->mdatalist->getDataDetail($projectid, $dgname,$dataid);

		header("Content-type:image/jpeg");
		
        echo(file_get_contents($this->config['uploaddir']."/".$datalist->image));
         //echo($this->config['uploaddir']."/".$datalist->image);
	}

	function pedit()
	{
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
	    
		  
				
	    if(!$this->mdatalist)
	    {
	        include_once('m/mdatalist.php');
	        $this->mdatalist = new mdatalist($this->db, $this->config, $this->config['baseurl']);
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
					$this->config['uploaddir'].'/images/'.$uploadfile);
           
			$imageurl = 'images/'.$uploadfile;
		}
		else
			$imageurl = $_POST['imageurl'];

		if($pubtime=='keep')
		{
			$selectone=array();
			$selectone=$this->mdatalist->selectone($dataid,$projectid,$dgname);
			$time=$selectone[0]->dateline;
		
		}
	

		// TODO: 传递给数据库的一定是连接
	    $this->mdatalist->updateone($projectid, $dgname, $dgtype, $dataid,
	                                    $title, $url, $imageurl, $abstract, $alt, $order,$time,$writer);
	    
	    echo '<script>if(window.parent){window.parent.location.reload()};</script>';
	    die();
	}

    public function jgetdgshowname()
    {
        $projectid = $_GET['id'];
        $dgname    = $_GET['name'];
        
        if(!$this->mdatagroup)
        {
            include_once('m/mdatagroup.php');
            $this->mdatagroup = new mdatagroup($this->db, $this->config, $this->home);
            $ret = $this->mdatagroup->getDatagroupInfo($projectid, $dgname, 'userdefinedname', $dguname);
            echo "{'ret':1, 'msg':'ok', 'value':'$ret'}";
        }
        else
            echo '{"ret":0, "msg":"failed"}';
    }

	public function jrenamedg()
	{
		$projectid = $_GET['id'];
		$dgname    = $_GET['name'];
		$dguname   = urldecode ( $_GET['uname'] );
        
        if(!$this->mdatagroup)
        {
            include_once('m/mdatagroup.php');
            $this->mdatagroup = new mdatagroup($this->db, $this->config, $this->home);
            $ret = $this->mdatagroup->updateDatagroupInfo($projectid, $dgname, 'userdefinedname', $dguname);
        }

		if($ret)
			echo json_encode(array('ret'=>1, 'msg'=>'ok', 'value'=>$dguname));
		else
			echo '{"ret":0, "msg":"没有获得内容"}';
	}

    function renamebox()
    {
		$projectid = $_GET['id'];
		$dgname    = $_GET['name'];
		$showname  = urldecode($_GET['showname']);
		$udfname   = urldecode($_GET['uname']);

        $this->tpl->assign('home', $this->home);
        $this->tpl->assign('id', $projectid);
        $this->tpl->assign('dgname', $dgname);
        $this->tpl->assign('showname', $showname);
        $this->tpl->assign('userdefinedname', $udfname);
        $this->tpl->display('box.datagroup_rename.html');
    }

	function jupdatedg()
	{
		$projectid = $_GET['id'];
		$dgname    = $_GET['name'];
        
        $key   = $_POST['key'];
        $value = $_POST['value'];
        if(!$this->mdatagroup)
        {
            include_once('m/mdatagroup.php');
            $this->mdatagroup = new mdatagroup($this->db, $this->config, $this->home);
            $ret = $this->mdatagroup->updateDatagroupInfo($projectid, $dgname, $key, $value);
        }

		if($ret)
			echo json_encode(array('ret'=>1, 'msg'=>'ok', 'value'=>$value));
		else
			echo '{"ret":0, "msg":"没有获得内容"}';
	}

    public function jdeldata()
    {
        $projectid = $_GET['id'];
        $dgname    = $_GET['name'];
        $id        = $_GET['dataid'];
        
        // TODO: get image file
	    if(!$this->mdatalist)
	    {
	        include_once('m/mdatalist.php');
	        $this->mdatalist = new mdatalist($this->db, $this->config, $this->config['baseurl']);
	    }
	    $detail = $this->mdatalist->getDataDetail($projectid, $dgname, $id);
        
        if(!$this->mdatagroup)
        {
            include_once('m/mdatagroup.php');
            $this->mdatagroup = new mdatagroup($this->db, $this->config, $this->home);
            $ret = $this->mdatagroup->deleteData($projectid, $dgname, $id);
            /*  
			if(is_file(ROOT_DIR.'/upload/'.$detail->image)){
			    unlink(ROOT_DIR.'/upload/'.$detail->image);
				*/
				if(is_file($this->config['uploaddir'].$detail->image)){
			    unlink($this->config['uploaddir'].$detail->image);
			}
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
		$projectid=$_GET['id'];
		$dgname=$_GET['name'];

		include_once('m/mdatagroup.php');
        include_once('m/mdatalist.php');
        
        $this->mdatagroup = new mdatagroup($this->db, $this->conf, $this->home);
        $this->mdatalist  = new mdatalist($this->db, $this->conf, $this->home);
        
        $dgresult=$this->mdatagroup->delDatagroup($projectid, $dgname);
        $dglist=$this->mdatalist->delDatagrouplist($projectid,$dgname);

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
		$projectid = $_GET['pid'];
		$dgname    = $_GET['name'];
		$id        = $_GET['id'];

		include_once('m/mdatagroup.php');
        include_once('m/mdatalist.php');
        
        $this->mdatagroup = new mdatagroup($this->db, $this->conf, $this->home);
        $this->mdatalist  = new mdatalist($this->db, $this->conf, $this->home);
        
        $dgresult=$this->mdatagroup->delDatagroupmore($id);
        $dglist=$this->mdatalist->delDatagrouplistmore($projectid,$dgname);

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
         $typeid = $_GET['typeid'];
		 $projectid = $_GET['id'];
		 $dgname = $_GET['name'];
		 $dgtype = $_GET['dst'];
        
       
		if($typeid=='guide')
		{
			$url = "http://www.10jing.com/api/guide_list/&list=500&page=1";
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
			$url = 'http://www.10jing.com/api/guide_list/&list=500&page=1';
		}

        $datalist = json_decode(file_get_contents($url));


        include_once('m/mdatalist.php');
		$this->mdatalist  = new mdatalist($this->db, $this->conf, $this->home);
       
		foreach($ids as $k=>$v)
		{
			$datalist[$v]->cover_pubtime = date('Y年m月d日');
			if($dgtype == 'list')
			{
			 $dgid = $this->mdatalist->getMaxId($pid, $dgname);
		     $dgid += 1;
			 $ret = $this->mdatalist->appendone($pid, $dgname, $dgid, $datalist[$v]->cover_title, $datalist[$v]->cover_url, $datalist[$v]->cover_image, $datalist[$v]->cover_keywords, $datalist[$v]->cover_pubtime,$date,$usr);
			}
			else
			{
				$dgid = 1;
				$ret = $this->mdatalist->updateone($pid, $dgname, $dgtype, 1, $datalist[$v]->cover_title, $datalist[$v]->cover_url, $datalist[$v]->cover_image, $datalist[$v]->cover_keywords, $datalist[$v]->cover_pubtime,1,$date,$usr);
			}
            
		}
		
       echo '<script>if(window.parent){window.parent.location.reload()};</script>';
	   die();

	}
    public function sortDatalist()
    {
        $projectid = $_GET['id'];
        $dgname    = $_GET['name'];
    
        // sort datalist
        echo $_SERVER['REDIRECT_URL'],"<br/>", $_SERVER['QUERY_STRING'],'<br/>';
        //echo max($_POST['o']),':',min($_POST['o']);
        echo '<hr><pre>';

	    if(!$this->mdatalist)
	    {
	        include_once('m/mdatalist.php');
	        $this->mdatalist = new mdatalist($this->db, $this->config, $this->config['baseurl']);
	    }

        $rows = $this->mdatalist->getDatalistByIdList($projectid, $dgname, $_POST['o']);

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
                $this->mdatalist->updateTime($projectid, $dgname, $k, $v);
            else if($v==$lastdateline)
                $this->mdatalist->updateTime($projectid, $dgname, $k, $v-1);
                
            $lastdateline = $v;
        }

        // TODO: 应该在web加入 时间编辑 的功能，还应该在时间编辑时校对服务器时间，以免编辑成一个历史时间
        // TODO: 是不是有编辑为一个历史时间的需求呢？需要确认一下，貌似没有。        
        // TODO: 需要返回json结果，并更新用户端数据
        // TODO: 这样的查询次数稍多，不过没关系，这属于后台，同时操作人数会很有限
    }
//--------------------------------------------------
};

