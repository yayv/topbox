<?php

/**
 * 注意，类的方法，如果需要用 http://xx.xxx.xx/content/xxx/ 的形式调用，则方法名中不能含有 _ 也不能用大写
 */ 
class mpublish extends model
{ 
    public $smarty;
    
    public function oldindex($smarty, $basedir, $baseurl)
    {
        $this->basedir = $basedir;
        $this->baseurl = $baseurl;
    }
    public function setBasedir($basedir)
    {
    	$this->basedir = $basedir ;
    }
    
    public function getDynamicDataFromDest($targetdir, $targetfile)
    {
        $file = $targetdir.'/templates_c/'.$targetfile;
        
        echo "$file<br/>";
        echo file_get_contents($file); echo "<pre>";
        return  file_get_contents($file);
    }
    
    public function publishStatic($targetFilePath, $content)
    {
		
        file_put_contents($targetFilePath, $content);

    }

    public function publishManual($targetfilename, $filecontent)
    {
		// 动态自定义页面
        file_put_contents($this->basedir.'/'.$targetfilename, $filecontent);
    }

    public function publishFileContent($targetFilePath, $content)
    {

    	//将模板内容保存至文件
    	file_put_contents($targetFilePath, $content);
    }
    
    public function publishDynamic($tpl,$targetfilename, $templatefile, $projectinfo)
    {
		// 动态发布的步骤:
		// 1. 拷贝模板
		// 2. 拷贝资源
		// 3. 拷贝图片
		// 4. 发布静态数据
		// 5. 拷贝动态模板
		// 6. 发布空的动态数据文件，还是不用？
		// 7. 删除静态发布
		$template_dir = $tpl->template_dir;
        $tpl->template_dir = 'data/';
      
		$tpl->assign('staticdata', $projectinfo->staticdata);
		$tpl->assign('dynamicdata',$projectinfo->dynamicdata);
		$tpl->assign('templatefile', $templatefile);
		$tpl->assign('hookfilename', 'hook_'.$targetfilename);
		$content = $tpl->fetch('index.tpl.php');
     	$tpl->template_dir = $template_dir;

        $ret = file_put_contents($this->basedir.'/'.$targetfilename, $content);
    }
    
	public function publishImages($dump)
	{
		$upload = UPLOAD_DIR.'/images/';

		$targetpath = $this->basedir.'/images/';
		$exts = array('.JPG', '.jpg', '.GIF', '.gif');

		if($dump)
		foreach($dump as $k=>$v)
		{
			$filename = $v->projectid.'_'.$v->datagroupname.'_'.$v->id;
			foreach($exts as $ext)
			{
				if(is_file($upload.'/'.$filename.$ext))
				{
					copy($upload.'/'.$filename.$ext, $targetpath.$filename.$ext);
				}
			}
		}
	}

	public function cleanTargetPath($pubdir)
	{

		$d = dir($pubdir);
		while (false !== ($entry = $d->read())) {
		   // echo $entry."\n";
		   if($entry=='.' || $entry=='..')
		   {
		   		continue;
		   }
		   		
		   if(is_file($pubdir.'/'.$entry ))
		   {
		   		unlink($pubdir.'/'.$entry);
		   }
		   else
		   {
		   		$this->cleanTargetPath($pubdir.'/'.$entry);
		   }
		}
		$d->close();
	}

	public function copyTemplateResource($templatedir, $targetdir)
	{
		$subdirs = array('/images/', '/css/');
		foreach($subdirs as $k=>$v)
		{
			// $templatedir.$v,'|<br/>',$targetdir,$v,'|<br/>';

            echo $templatedir.$v,'<br/>';
			$d = dir($templatedir.$v);
			while(false!=($entry=$d->read()))
			{
				if($entry=='.' || $entry=='..')
					continue;

				copy($templatedir.$v.$entry, $targetdir.$v.$entry);
			}
			$d->close();
		}
	}  
}


