<?php

class mproject extends model
{
	private $db;
	private $config;
	private $home;
	private $template_tags;

    public  $error_stack;

    public function __construct()
    {
		$this->template_tags = array();

		$this->template_tags['attr']['showname'] = "/\s*showname\s*=\s*\'([^\']+)\'/i";
		$this->template_tags['attr']['alt']      = "/\s*alt\s*=\s*\'([^\']+)\'/i";

		$this->template_tags['variables'] = "/\{\\\$(\w+)/i";

		$this->template_tags['inloop_start'][0] = "/\{foreach /i";
		$this->template_tags['inloop_start'][1] = "/\{section /i";

		$this->template_tags['inloop_var'][0] = "/ from\s*=\s*\\\$(\w+)/i";
		$this->template_tags['inloop_var'][1] = "/ loop\s*=\s*\\\$(\w+)/i";

		$this->template_tags['inloop_end'][0] = "/\{\/foreach\}/i";
		$this->template_tags['inloop_end'][1] = "/\{\/section\}/i";

    }

	public function getProjectList()
    {       
		$sql='select * from portal_projects';
		$rows=$this->_db->fetch_all_assoc($sql);

		return $rows;
    }

	public function getAllProjectInfo($projectid)
    {        
        $ret = $this->_db->fetch_all_object("select * from portal_projects where id=$projectid");

        $row=$ret[0];
        
        return $row;
    }
    
    public function getProjectInfo($projectid, $key)
    {
		$keys = array(
			'title', 'description', 'author', 'directory','url',
			'staticdata', 'dynamicdata', 'dynamic_content'
		);
		
		if(in_array($key, $keys))
		{
			$sql = "select $key from  portal_projects where id=$projectid";
			$ret = $this->_db->fetch_all_object($sql);

			if($ret)
			{
			    $value = $ret[0]->$key;
				return $value;
			}
			else
			{
			    $this->error_stack[] = array(
			        'message'=>'SQL select failed',
			        'data'=>"SQL: $sql",
			    );
				return false;
			}
        }
		else
		{
			return false;
		}		    
    }

	public function updateProjectInfo($projectid, $key, $value)
	{
		$keys = array(
			'title', 'description', 'programmer', 'directory','url',
			'staticdata', 'dynamicdata','editor','dynamic_content'
		);
         
		if(in_array($key, $keys))
		{
			$sql = "update  portal_projects set $key='$value' where id=$projectid";
			$ret = $this->_db->query($sql);
           
			if($ret)
				return $value;
			else
				return false;
        }
		else
		{
			return false;
		}
	}

	public function getTemplates($projectid)
	{
        // 获得当前项目的模板列表
        $sql = "select 
                    id,from_templateid,templatename,templatefile,content
                from 
                    portal_templates_inproject
                where 
                    portal_templates_inproject.projectid=$projectid ";
        $rows = $this->_db->fetch_all_object($sql);

		return $rows;
	}

	public function getPages($projectid)
	{
		$sql = "
		    select 
		        portal_pages_inproject.*,portal_templates_inproject.templatename 
		    from 
		        portal_pages_inproject, portal_templates_inproject
		    where
		        portal_pages_inproject.projectid=$projectid and 
		        portal_templates_inproject.projectid=$projectid and
		        portal_templates_inproject.id=portal_pages_inproject.templateid";

        $rows = $this->_db->fetch_all_object($sql);

		return $rows;
	}

    public function updatePageExtInfo($projectid, $pageid, $user_hook_filename, $hookfile_content)
    {
		$sql = "update portal_pages_inproject 
                    set user_hook_filename='$user_hook_filename', 
                         hookfile_content='$hookfile_content'
                    where id=$pageid and projectid=$projectid";
        $ret = $this->_db->query($sql);

        return $ret;
    }

    public function refreshDatalist($projectid)
    {
        include_once('template_parser.php');
        
        // get all templates
        $templates = $this->getTemplates($projectid);

        $varlist   = array();
        foreach($templates as $k=>$v)
        {
            // parse content
            $names = parse_template($v->content, $this->template_tags);

            $varlist = array_merge($varlist, $names);
        }
        
        // TODO: parse all template file
        
        // TODO: update datalist
        return $varlist;
    }

	public function getDatasource($projectid)
	{
		$sql = "select * from portal_datasource_inproject where projectid=$projectid";
		$rows = $this->_db->fetch_all_assoc($sql);

		return $rows;
	}

	public function createDirectory($homedir, $directory)
	{
		mkdir($homedir.'/'.$directory, 0777);
        mkdir($homedir.'/'.$directory.'/templates', 0777, true);
        mkdir($homedir.'/'.$directory.'/templates_c', 0777, true);
        mkdir($homedir.'/'.$directory.'/images', 0777, true);
        mkdir($homedir.'/'.$directory.'/css', 0777, true);
        mkdir($homedir.'/'.$directory.'/js', 0777, true);

        $ret = true;
        $ret = $ret & is_dir($homedir.'/'.$directory);
        $ret = $ret & is_dir($homedir.'/'.$directory.'/templates');
        $ret = $ret & is_dir($homedir.'/'.$directory.'/templates_c');
        $ret = $ret & is_dir($homedir.'/'.$directory.'/images');
        $ret = $ret & is_dir($homedir.'/'.$directory.'/css');
        $ret = $ret & is_dir($homedir.'/'.$directory.'/js');

        return $ret;
	}

	public function addProject($projectname,	$author, 
								$directory,		$url, 
								$staticdata,	$dynamicdata,
								$description,
                                $homedir,		$writer)
	{
		$dateline=date('Y-m-d H:i:s');

        // 表单检查
        if($projectname && $author && $directory && $url)
        {
        	$dir = $homedir .$directory;
            $sql = "
                insert into 
                    portal_projects(
                        title,
                        description,
                        programmer,
                        directory,
                        url,
                        `group`,
						zipname,
                        staticdata,
						dynamicdata,
						dynamic_content,
						editor,
						dateline
                    )
                values(
                    '$projectname',
                    '$description',
                    '$author',
                    '$dir',
                    '$url',
                    '$group',
					'$zipname',
                    '$staticdata',
					'$dynamicdata',
					'$dynamic_content',
					'$writer',
					'$dateline'
                )
            ";

            // insert db data
            $ret = $this->_db->query($sql);
            if(!$ret)
            {
                $this->error_stack[] = array(
                    'message'=>'SQL Insert failed',
                    'data' =>"SQL:$sql",
                );
                return false;
            }

            $projectid = $this->_db->insert_id();

			// create directory
			$ret = $this->createDirectory($homedir, $directory);
            if(!$ret)
            {
                $sql = "delete from portal_projects where id=$projectid";
                $this->_db->query($sql);
                $this->error_stack[] = array(
                    'message' => 'mkdir failed',
                    'data' => $homedir.'/'.$directory,
                );
                return false;
            }

			return $projectid;
        }
        else
        {
            $this->error_stack[] = array(
                'message'=>'all must inside',
                'data' =>"SQL:$sql",
            );
            // 重填表单
			return false;
        }
	}

	public function addTemplate($projectid, $id, $name, $type, $filename, $from_tmplid, $content)
	{
	    $sql = "insert into 
	                portal_templates_inproject(`projectid`, `templatename`, `from_templateid`, `templatefile`,
	                `hookfile_content`,`content`) 
	            values('$projectid', '$name', $from_tmplid, '$filename','$hookfile_content', '$content')";
	    $ret = $this->_db->query($sql);
	    if(!$ret)
	    {
	        $this->error_stack[] = array(
	            'message'=>'SQL insert failed',
	            'data'=>"sql:$sql",
	        );
	        return false;
	    }
	    
        // if from_tmplid != -1 then do copy
        if($from_tmplid!=-1)
        {
            // get filepath
            $dir = $this->getProjectInfo($projectid, 'directory');
            file_put_contents($this->config['topicdir'].'/'.$dir.'/templates/'.$filename,$content);
        }

	    return true;
	}

	public function editTemplate($projectid, $id, $name, $type, $filename, $from_tmplid, $content)
	{
	    $oldtemplate = $this->getTemplateById($id);
	    $sql = "update
	                portal_templates_inproject
	            set 
	            	templatename='$name', 
	            	templatefile='$filename', 
	            	from_templateid=$from_tmplid,
	            	content='$content'
	            where id=$id";

	    $ret = $this->_db->query($sql);
	    if(!$ret)
	    {
	        $this->error_stack[] = array(
	            'message'=>$this->_db->mi->error,
	            'data'=>"sql:$sql",
	        );
	        echo $sql;
	        echo '<pre>';print_r($this->error_stack);
	        return false;
	    }

	    return true;
	}
		
	public function getTemplateById($templateid)
	{
		if($templateid==-1)
		{
			$defobj = new stdClass();
			$defobj->id = -1;
			$defobj->projectid = -1;
			$defobj->from_tmplid = -1;
			$defobj->templatename = "";
			$defobj->templatefile = "";
			$defobj->templateid = -1;
			$defobj->hookfile_content = "";
			$defobj->content = "";
			return $defobj;
		}
		else
		{
		    $sql = "select * from portal_templates_inproject
		            where id=$templateid";
		    $rows = $this->_db->fetch_all_object($sql);
		    return $rows[0];
		}
	}
	
	public function getTemplateFilename($templateid)
	{
	    $sql = "select templatefile from portal_templates_inproject
	            where id=$templateid";
	    $ret = $this->_db->fetch_all_object($sql);
	    return $ret[0]->templatefile;
	}
	
	public function addPage($projectid, $templateid, $pagename, $filename, $publishtype, $hookfile)
	{
		$hookfile_content = '<?php

		//processData() is the main function, do NOT change the function name

		function processData($static, $dynamic){
			# code ....	
		}
			';

	    $sql = "insert into 
	                portal_pages_inproject(projectid, templateid, pagename, filename, publishtype, user_hook_filename,hookfile_content) 
	            values ($projectid, $templateid, '$pagename', '$filename', '$publishtype', '$hookfile','$hookfile_content')";
	    $ret = $this->_db->query($sql);
	    
	    if(!$ret)
	    {
	        $this->error_stack[] = array(
	            'message' => 'SQL insert failed',
	            'data'    => "sql: $sql",
	        );
	    }

	    return $ret;
	}
	
    public function getHookfile($projectid, $pageid)
    {
        $sql = "select user_hook_filename, hookfile_content
                    from portal_pages_inproject
                    where projectid=$projectid and id=$pageid";
        $ret = $this->_db->fetch_all_object($sql);

        if(!$ret)
        {
            $this->error_stack[] = 
                    array(
                        'message'=>'SQL select failed',
                        'data'=>"sql:$sql");
            
            return array(false, false);
        }

        return array($ret[0]->user_hook_filename, $ret[0]->hookfile_content);        
    }
	
	public function editPage($projectid, $pageid, $templateid, $pagename, $filename, $publishtype, $hookfile)
	{
	    $sql = "update portal_pages_inproject
	            set templateid=$templateid, pagename='$pagename',
	                filename='$filename',publishtype='$publishtype', user_hook_filename='$hookfile'
	            where projectid=$projectid and id=$pageid";

	    $ret = $this->_db->query($sql);
	    
	    if(!$ret)
	    {
	        $this->error_stack[] = array(
	            'message' => 'SQL update failed',
	            'data' => "sql: $sql",
	        );
	        return false;
	    }
	    
	    return $ret;
	}

    public function getPage($pageid)
    {
        $sql = "select * from portal_pages_inproject where id=$pageid";
        $row = $this->_db->fetch_all_object($sql);

        return $row[0];
    }
    
    public function delPage($projectid, $pageid)
    {
        $sql = "delete from portal_pages_inproject where id=$pageid";
        $ret = $this->_db->query($sql);

        return $ret;
    }

	public function updateProjectzipname($name,$projectid)
	{
	   
	   $sql="update portal_projects set `zipname`='$name' where `id`=$projectid";
	   $ret=$this->_db->query($sql);
	   return $ret;
	}

	public function publishZippedResource($dir,$zipname)
	{
	    $filepath=core::getInstance()->getConfig('uploaddir').'/'.$zipname;  
		$zip = new ZipArchive();  

        $rs = $zip->open($filepath);
        if($rs)
        {  
                //$fd=explode(".",basename($filepath));  
                $r = $zip->extractTo($dir); 
	            $zip->close();
        } 
	}
	public function addResources($projectid,$name,$tmp_name)
	{
	  $zipname=$projectid.'_'.$name;
	  $dir=core::getInstance()->getConfig('uploaddir').'/'.$zipname;

	  $ext_name=explode('.',$name);

		if($ext_name[1]=='zip')
		{
			if(is_uploaded_file($tmp_name))
			{
			$result=move_uploaded_file($tmp_name,$dir);
			$upresult=$this->updateProjectzipname($zipname,$projectid);
			}
		}
		else
		{
		   return "上传的压缩包扩展名不是zip";
		}

		if($result)
			return true;
		else
			return "上传文件发生错误";
		
	}
	public function checkfile($name)
	{
	
	   if(file_exists(core::getInstance()->getConfig('uploaddir')."/".$name))
	   {
		   
	   return true;
	   }
	   else
	   {
		   
	   return false;
	   }
	}

	public function getProject($projectid){
		$sql = "select * from `portal_projects` WHERE id=".$projectid;
		$ret = $this->_db->fetch_all_assoc($sql);
		return $ret;
	}

	public function delProject($projectid){
		$sql = array(
			"DELETE FROM `portal_projects` WHERE id=".$projectid, 
			"DELETE FROM `portal_datagroup_inproject` WHERE `projectid`=".$projectid,
			"DELETE FROM `portal_data_inproject` WHERE `projectid`=".$projectid, 
			"DELETE FROM `portal_imageupload_inproject` WHERE `projectid`=".$projectid,
			"DELETE FROM `portal_pages_inproject` WHERE `projectid`=".$projectid,
			"DELETE FROM `portal_templates_inproject` WHERE `projectid`=".$projectid );

		foreach ($sql as $key => $value) {
			$ret = $this->_db->query($value);
		}

	}
/*
	function url_exists($url)
	{
	  $head=@get_headers($url);
		if(is_array($head))
		{
			$t=explode(" ",$head[0]);
			if($t[count($t)-1]=="OK")
		       {
			        print_r(file_get_contents($url));

		       }
		}
	}

	//选取自动调取文件
	function auto_file($id)
	{
		$sql="select filename from pages_inproject where projectid=$id and publishtype='auto'";
		$row = $this->_db->get_results($sql, 'O');    
		
		return $row;
	}
	*/
}

