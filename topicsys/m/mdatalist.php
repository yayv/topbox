<?php
/**
 * 数据管理模块
 */
class mdatalist
{
   public function __construct($db, $config, $home)        
   {    
		$this->db = &$db;
		$this->config = &$config;
		$this->home = $home;

        $this->error_stack = array();
   } 
   //获取全部
     public function getDatalist_All($projectid, $dgname) 
   {
       $sql = "select * from data_inproject where projectid=$projectid and datagroupname='$dgname' order by dateline desc";
	    //$sql = "select * from data_inproject where projectid=$projectid and datagroupname='$dgname' order by dateline desc limit 0,20";
       $rows = $this->db->get_results($sql,'O');

       return $rows;
   }


    public function getDatalist($projectid, $dgname) 
   {
      // $sql = "select * from data_inproject where projectid=$projectid and datagroupname='$dgname' order by dateline desc";
	    $sql = "select * from data_inproject where projectid=$projectid and datagroupname='$dgname' order by dateline desc limit 0,20";
       $rows = $this->db->get_results($sql,'O');

       return $rows;
   }
  
    //前天，昨天，今天
    public function getDatalist_page($projectid, $dgname,$pre_date,$next_date) 
   {
  
	    $sql = "select * from data_inproject where projectid=$projectid and datagroupname='$dgname' and dateline between '$pre_date' and '$next_date'";
       $rows = $this->db->get_results($sql,'O');
       
       return $rows;
   }
   //按关键字查询
     public function getDatalist_key($projectid, $dgname,$key_word) 
   {
  
	    $sql = "select * from data_inproject where projectid=$projectid and datagroupname='$dgname' and title like '%$key_word%'";
       $rows = $this->db->get_results($sql,'O');
       
       return $rows;
   }
   //按编辑人员查询
   public function getDatalist_writer($projectid, $dgname,$writer_name) 
   {
  
	    $sql = "select * from data_inproject where projectid=$projectid and datagroupname='$dgname' and writer='$writer_name'";
       $rows = $this->db->get_results($sql,'O');
       
       return $rows;
   }
    //传统分页
      public function getDatalist_Tpage($projectid, $dgname,$pt) 
   {
        $start=$pt*20-20;
	    $sql = "select * from data_inproject where projectid=$projectid and datagroupname='$dgname' order by id desc limit $start,20";
       $rows = $this->db->get_results($sql,'O');
       
       return $rows;
   }


   //最早一天
	  public function getDatalist_first($projectid, $dgname) 
   {
		
 
	    $sql = "select * from data_inproject where projectid=$projectid and datagroupname='$dgname' limit 0,1";
       $rows = $this->db->get_results($sql,'O');
       return $rows;
   }
   //总的数据
    public function getDatalist_count($projectid, $dgname) 
   {
       $sql = "select count(*) as nums from data_inproject where projectid=$projectid and datagroupname='$dgname'";
       $rows = $this->db->get_results($sql,'O');

       return $rows;
   }
     

   //    
   public function getDatalistByIdList($projectid, $dgname, $arrId) 
   {
       $ids = implode(',', $arrId);
       $sql = "select id,dateline from data_inproject where projectid=$projectid and datagroupname='$dgname' and id in ($ids) order by dateline desc";
       $rows = $this->db->get_results($sql,'O');

       return $rows;
   }

	public function getDataDetail($projectid, $dgname, $id)
	{
		$sql = "select * from data_inproject where projectid=$projectid and datagroupname='$dgname' and id=$id";
		$rows = $this->db->get_results($sql, 'O');

		return $rows[0];
	}

   public function dumpToArray($projectid)
   {
        $dump = array();
        $sql = "select * from data_inproject where projectid=$projectid order by datagroupname asc, dateline desc";
        $rows = $this->db->get_results($sql, 'O');

        if($rows)
		    foreach($rows as $k=>$v)
		    {
		        $obj = '';
		        $obj->title = $v->title;
		        $obj->url   = $v->url;
		        $obj->image = $v->image;
		        $obj->abstract=$v->abstract;
		        $obj->alt   = $v->alt;
		        $obj->dateline = $v->dateline;

		        
		        if($v->datagrouptype=='single')
		        {
		            $dump[$v->datagroupname] = $obj;
		        }
		        else
		        {
		        	if(!isset($dump[$v->datagroupname]))
		        		$dump[$v->datagroupname] = array();
		            $dump[$v->datagroupname][] = $obj;
		        }
		    }
        else
        	$dump = array();
        
        return $dump;
   }

   public function dumpImageNames($projectid)
   {
	   $dump = array();
	   $sql  = "select projectid,datagroupname,id from data_inproject where projectid=$projectid ";
	   $rows = $this->db->get_results($sql, 'O');

	   return $rows;
   }

   public function getMaxId($projectid, $dgname)
   {
        $sql = "select max(id) as maxid from data_inproject where projectid=$projectid and datagroupname='$dgname'";
        $maxid = $this->db->get_var($sql);

        return $maxid;
   }
   
   public function appendone($projectid, $dgname, $id, $title, $url, $imageurl, $abstract, $alt, $now,$writer)
   {
        //$now = time();
       
        $sql = "insert into data_inproject(
                        projectid, datagroupname, datagrouptype, 
                        id, title, url, image, abstract, alt, 
                        orderingroup, dateline,writer)
                values(
                        '$projectid','$dgname', 'list', 
                        $id, '$title', '$url', '$imageurl', '$abstract', '$alt', 
                        $now, $now, '$writer'
                )";
        $ret = $this->db->query($sql);

        return $ret;
   }
   
   public function updateone($projectid, $dgname, $dgtype, $dataid, $title, $url, $imageurl, $abstract, $alt, $order,$time,$writer)
   {
      
		
   	   $sql="replace into data_inproject(`projectid`,`datagroupname`,`datagrouptype`,`id`,`title`,`url`,`image`,`abstract`,`alt`,`orderingroup`,`dateline`,`writer`) values ('$projectid','$dgname','$dgtype','1','$title','$url','$imageurl','$abstract','$alt','$time','$time','$writer')";
        $ret = $this->db->query($sql);

        return $ret;
   }   

   public function selectone($id,$projectid,$dgname)
   {
	  
	   $sql="select dateline from data_inproject where id=$id and projectid=$projectid and datagroupname='$dgname'";

	   $rows = $this->db->get_results($sql,'O');

       return $rows;
   }
   
   public function updateTime($projectid, $dgname, $id, $dateline)
   {
        $sql = "update 
                    data_inproject 
                set 
                    dateline=$dateline 
                where 
                    projectid=$projectid 
                        and 
                    datagroupname='$dgname' 
                        and 
                    id=$id";
        $ret = $this->db->query($sql);

        return $ret;
   }

   public function delDatagrouplist($projectid,$dgname)
   {
         $sql="delete from data_inproject where projectid=$projectid and datagroupname='$dgname'";
		 $ret=$this->db->query($sql);
		 return $ret;
   }

     public function delDatagrouplistmore($projectid,$dgname)
   {
		 
		 $dgnames=split(',',$dgname);
		 foreach($dgnames as $k=>$v)
	   {
         $sql="delete from data_inproject where projectid=$projectid and datagroupname='$v'";
		 $ret=$this->db->query($sql);
	   }
		 return $ret;
   }
}



