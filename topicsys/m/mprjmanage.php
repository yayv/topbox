<?php

class mprjmanage
{
	private $db;
	private $config;
	private $home;

	public function __construct($db, $config, $home)
	{
		$this->db = &$db;
		$this->config = &$config;
		$this->home = &$home;
	}
/*
	public function getProjectList()
    { 
		
		
        $sql = "SELECT * FROM `projects`";
	   
        $rows = $this->db->get_results($sql,'O');

        $c = ''; 
        if($rows)
          foreach($rows as $k=>$v)
          {
              $c .= '<li>';
              $c .= '<span>'.$v->id.'</span>';
              $c .= '<span><a href="'.$v->url.'" title="'.$v->description.'">'.$v->title.'</a></span>';
              $c .= '<span>[<a href="'.$this->home.'/project/edit/id-'.$v->id.'">编辑参数</a>] [<a href="'.$this->home.'/project/manage/id-'.$v->id.'">进入</a>] </span>';
              $c .= '<span class="fr">'.$v->author.'</span>';
			  $c .= '</li>';
          }
          
        return '<div style="margin:0;padding:1px 1px 10px 10px;"><ul>'.$c.'</ul></div>';
    }

*/
		public function getProjectList()
    { 
		
		$username=$_SERVER['PHP_AUTH_USER'];
		$password=$_SERVER['PHP_AUTH_PW'];
      
		$sql='select * from projects';
		$rows=$this->db->get_results($sql,'O');
		
		$author=array();
		$writer=array();
		$c = '';
		if($username=='webmaster' && $password=='lvrenmail')
		{
             if($rows)
          foreach($rows as $k=>$v)
          {
				$v->dateline=date('Y-m-d h:i:s',$v->dateline);
				$c .= '<li>';
				$c .= '<span>'.$v->id.'</span>';
				$c .= '<span><a href="'.$v->url.'" title="'.$v->description.'">'.$v->title.'</a></span>';
				$c .= '<span>[<a href="'.$this->home.'/project/edit/id-'.$v->id.'">编辑参数</a>] [<a href="'.$this->home.'/project/manage/id-'.$v->id.'">进入</a>] </span>';
				$c .= '<span style="width:200px; float:right; margin-right:10px;">'.$v->dateline.'</span>';
				$c .= '<span class="fr" style="width:130px;">'.$v->author.'</span>';
				$c .= '</li>';
          }
          
        return '<div style="margin:0;padding:1px 1px 10px 10px;"><ul>'.$c.'</ul></div>';
		}
		else if($rows)
			{
			
				foreach($rows as $k=>$v)
				{    
					$v->dateline=date('Y-m-d h:i:s',$v->dateline);
								
					$author=explode(',',$v->author);
					$writer=explode(',',$v->writer);
					foreach($author as $kk=>$vv)
					{
						if($vv==$username)
						{

							$c .= '<li>';
						    $c .= '<span>'.$v->id.'</span>';
						    $c .= '<span><a href="'.$v->url.'" title="'.$v->description.'">'.$v->title.'</a></span>';
							$c .= '<span>[<a href="'.$this->home.'/project/edit/id-'.$v->id.'">编辑参数</a>] [<a href="'.$this->home.'/project/manage/id-'.$v->id.'">进入</a>] </span>';
							$c .= '<span style="width:200px; float:right; margin-right:10px;">'.$v->dateline.'</span>';
							$c .= '<span class="fr" style="width:130px;">'.$v->author.'</span>';
							$c .= '</li>';
							 
				  
						  
						}
					}
					foreach($writer as $k1=>$v1)
					{ 
						if($v1==$username)
						{

							$c .= '<li>';
						    $c .= '<span>'.$v->id.'</span>';
						    $c .= '<span><a href="'.$v->url.'" title="'.$v->description.'">'.$v->title.'</a></span>';
							$c .= '<span>[<a href="'.$this->home.'/project/edit/id-'.$v->id.'">编辑参数</a>] [<a href="'.$this->home.'/project/manage/id-'.$v->id.'">进入</a>] </span>';
							$c .= '<span style="width:200px; float:right; margin-right:10px;">'.$v->dateline.'</span>';
							$c .= '<span class="fr" style="width:130px;">'.$v->author.'</span>';
							$c .= '</li>';
							 
				  
						 
						}
					}


				}
		
			}
			 return '<div style="margin:0;padding:1px 1px 10px 10px;"><ul>'.$c.'</ul></div>';
    }
	
}
