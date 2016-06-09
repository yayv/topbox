<?php

class mproject
{
	private $db;
	private $config;
	private $home;

    public  $error_stack;

	public function __construct($db, $config, $home)
	{
		$this->db = &$db;
		$this->config = &$config;
		$this->home = $home;

        $this->error_stack = array();
	}

	public function getAllProjectInfo($projectid)
    {        
        $ret = $this->db->get_results("select * from projects where id=$projectid",'O');
        
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
			$sql = "select $key from   projects where id=$projectid";
			$ret = $this->db->get_results($sql,'O');

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
			'title', 'description', 'author', 'directory','url',
			'staticdata', 'dynamicdata','writer','dynamic_content'
		);
         
		if(in_array($key, $keys))
		{
			$sql = "update  projects set $key='$value' where id=$projectid";
			$ret = $this->db->query($sql,'O');
           
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
                    templates_inproject
                where 
                    templates_inproject.projectid=$projectid ";
        $rows = $this->db->get_results($sql,'O');
		return $rows;
	}

	public function getPages($projectid)
	{
		$sql = "
		    select 
		        pages_inproject.*,templates_inproject.templatename 
		    from 
		        pages_inproject, templates_inproject
		    where
		        pages_inproject.projectid=$projectid and 
		        templates_inproject.projectid=$projectid and
		        templates_inproject.id=pages_inproject.templateid";

        $rows = $this->db->get_results($sql,'O');
		
		return $rows;
	}

    public function updatePageExtInfo($projectid, $pageid, $user_hook_filename, $hookfile_content)
    {
	
		$sql = "update pages_inproject 
                    set user_hook_filename='$user_hook_filename', 
                         hookfile_content='$hookfile_content'
                    where id=$pageid and projectid=$projectid";
        $ret = $this->db->query($sql);
         
        return true;
    }

    public function refreshDatalist($projectid)
    {
        global $template_tags;
        include_once('lib/template_parser.php');
        
        // get all templates
        $templates = $this->getTemplates($projectid);

        $varlist   = array();
        foreach($templates as $k=>$v)
        {
            // parse content
            $names = parse_template($v->content, $template_tags);
            
            $varlist = array_merge($varlist, $names);
        }
        
        // TODO: parse all template file
        
        // TODO: update datalist
        return $varlist;
    }

	public function getDatasource($projectid)
	{
		$sql = "select * from datasource_inproject where projectid=$projectid";
		$rows = $this->db->get_results($sql,'O');

		return $rows;
	}

	public function addProject($projectname,	$author, 
								$directory,		$url, 
								$staticdata,	$dynamicdata,
								$description,
                                $homedir,$writer)
	{
		$dateline=time();
        // 表单检查
        if($projectname && $author && $directory && $url)
        {
            $sql = "
                insert into 
                    projects(
                        title,
                        description,
                        author,
                        directory,
                        url,
						staticdata,
						dynamicdata,
						writer,
						dateline
                    )
                values(
                    '$projectname',
                    '$description',
                    '$author',
                    '$directory',
                    '$url',
					'$staticdata',
					'$dynamicdata',
					'$writer',
					'$dateline'
                )
            ";

            // insert db data
            $ret = $this->db->query($sql);
            if(!$ret)
            {
                $this->error_stack[] = array(
                    'message'=>'SQL Insert failed',
                    'data' =>"SQL:$sql",
                );
                return false;
            }
            
            $projectid = $this->db->last_insert_id();

			// create directory
			$ret = mkdir($homedir.'/'.$directory, 0777);
            $ret = $ret && mkdir($homedir.'/'.$directory.'/templates', 0777, true);
            $ret = $ret && mkdir($homedir.'/'.$directory.'/templates_c', 0777, true);
            $ret = $ret && mkdir($homedir.'/'.$directory.'/images', 0777, true);
            $ret = $ret && mkdir($homedir.'/'.$directory.'/style', 0777, true);
            if(!$ret)
            {
                $sql = "delete from projects where id=$projectid";
                $this->db->query($sql);
                $this->error_stack[] = array(
                    'message' => 'mkdir failed',
                    'data' => $homedir.'/'.$directory,
                );
                return false;
            }

			return true;
        }
        else
        {
            // 重填表单
			return false;
        }
	}

	public function addTemplate($projectid, $id, $name, $type, $filename, $from_tmplid, $content, $common_templatedir)
	{
	    $sql = "insert into 
	                templates_inproject(projectid, templatename, from_templateid, templatefile,
	                content) 
	            values($projectid, '$name', $from_tmplid, '$filename', '$content')";
	    $ret = $this->db->query($sql);
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

	public function editTemplate($projectid, $id, $name, $type, $filename, $from_tmplid, $content, $common_templatedir)
	{
	    $oldtemplate = $this->getTemplate($id);
	    $sql = "update
	                templates_inproject
	            set 
	            	templatename='$name', 
	            	templatefile='$filename', 
	            	from_templateid=$from_tmplid,
	            	content='$content'
	            where id=$id";

	    $ret = $this->db->query($sql);
	    if(!$ret)
	    {
	        $this->error_stack[] = array(
	            'message'=>'SQL insert failed',
	            'data'=>"sql:$sql",
	        );
	        return false;
	    }

	    return true;
	}
		
	public function getTemplate($templateid)
	{
	    $sql = "select * from templates_inproject
	            where id=$templateid";
	    $rows = $this->db->get_results($sql,'O');
	    return $rows[0];
	}
	
	public function getTemplateFilename($templateid)
	{
	    $sql = "select templatefile from templates_inproject
	            where id=$templateid";
	    return $this->db->get_var($sql);
	}
	
	public function addPage($projectid, $templateid, $pagename, $filename, $publishtype, $hookfile)
	{
	    $sql = "insert into 
	                pages_inproject(projectid, templateid, pagename, filename, publishtype, user_hook_filename) 
	            values ($projectid, $templateid, '$pagename', '$filename', '$publishtype', '$hookfile')";
	    $ret = $this->db->query($sql);
	    
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
                    from pages_inproject
                    where projectid=$projectid and id=$pageid";
        $ret = $this->db->get_results($sql, 'O');

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
	    $sql = "update pages_inproject
	            set templateid=$templateid, pagename='$pagename',
	                filename='$filename',publishtype='$publishtype', user_hook_filename='$hookfile'
	            where projectid=$projectid and id=$pageid";
	    $ret = $this->db->query($sql);
	    
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
        $sql = "select * from pages_inproject where id=$pageid";
        $row = $this->db->get_results($sql, 'O');       

        return $row[0];
    }
    
    public function delPage($projectid, $pageid)
    {
        $sql = "delete from pages_inproject where id=$pageid";
        $ret = $this->db->query($sql);

        return $ret;
    }

		public function updateProjectzipname($name,$projectid)
	{
	   
	   $sql="update projects set `zipname`='$name' where `id`=$projectid";
	   $ret=$this->db->query($sql);
	   return $ret;
	}
	public function publishZippedResource($dir,$zipname)
	{
	
	    $filepath=$this->config['uploaddir'].'/'.$zipname;  
		$zip = new ZipArchive();  
        $rs = $zip->open($filepath);  
        if($rs){  
                //$fd=explode(".",basename($filepath));  
                $zip->extractTo($dir); 
	            $zip->close();  
             } 
	}
	public function addResources($projectid,$name,$tmp_name)
	{
	  $zipname=$projectid.'_'.$name;
	  $dir=$this->config['uploaddir'].'/'.$zipname;
	
	  $ext_name=explode('.',$name);
		if($ext_name[1]=='zip')
		{
	         $result=move_uploaded_file($tmp_name,$dir);
			  $upresult=$this->updateProjectzipname($zipname,$projectid);
		
		
		}
		else
		{
		   echo("上传的压缩包扩展名不是zip");
		}
		
	}
	public function checkfile($name)
	{
	
	   if(file_exists($this->config['uploaddir']."/".$name))
	   {
		   
	   return true;
	   }
	   else
	   {
		   
	   return false;
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
		$row = $this->db->get_results($sql, 'O');    
		
		return $row;
	}
	*/
}

