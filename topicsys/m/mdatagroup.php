<?php
/**
 * 数据管理模块
 */
class mdatagroup
{
   public function __construct($db, $config, $home)        
   {    
		$this->db = &$db;
		$this->config = &$config;
		$this->home = $home;

        $this->error_stack = array();
   } 
      
   public function getDatagroups($projectid)
   {
        $sql = "select * from datagroup_inproject where projectid=$projectid order by  type desc, name  asc";
        $ret = $this->db->get_results($sql,'O');

        return $ret;
   }
   
   public function getDatagroupInfo($projectid, $dgname)
   {
        $sql = "select * from datagroup_inproject where name='$dgname' and projectid=$projectid";
        $ret = $this->db->get_results($sql,'O');
       
        return $ret[0];
   }
   
    public function updateDatagroupInfo($projectid, $dgname, $key, $value)
    {
        if(in_array($key, array('datasource', 'sourcetype', 'updatetype','userdefinedname')))
        {
            $sql = "update datagroup_inproject 
                    set $key='$value'
                    where projectid=$projectid and name='$dgname'";
            $ret = $this->db->query($sql);
            return $ret;
        }
        else
            return false;
    }
   /**
    * 用从模板里解析出来的数组更新数据模板列表
    */
   public function updateDatagroup($projectid, $datagroup)
   {
        $sql = "select * from datagroup_inproject where projectid=$projectid";
        $ret = $this->db->query($sql);
        $rows = array();
        $rowsupdate = array();
        $countold = 0;

        echo count($datagroup),'个待处理数据组<br/>';
		echo count($rowsupdate),'个原有数据组<br/>';
        if($ret)
            for($i=0;$i<$this->db->RecordCount;$i++)
            {
                $row = mysql_fetch_object($this->db->Query_ID);
                
                if(array_key_exists($row->name, $datagroup))
                {
                    $rowsupdate[$row->name] = $datagroup[$row->name];
                    unset($datagroup[$row->name]);
                    $row->reference = 2;
                    $countold ++;
                }

                $rows[$row->name] = $row;
            }


        //  需要更新的数组
        if(count($rowsupdate))
        {   
        	echo '更新数据组信息:';
        	$i = 0;
            foreach($rowsupdate as $k=>$v)
            {
                $sql = "update datagroup_inproject 
                        set
                            type='".$v['type']."',
                            showname='".$v['showname']."',
                            alt='".$v['alt']."',
                            reference=1                        
                        where
                            projectid=$projectid and name='$k'";
                $this->db->query($sql);
                $i ++;
            }
            echo $i,"条已更新<br/>";
            
        }


        if(count($datagroup)>0)
        {
            // '有新的数据组';
            $i =0;
            echo '检测到新的数据组:';
            foreach($datagroup as $k=>$v)
            {
                $sql = "insert into datagroup_inproject 
                        (projectid, name, type, showname, userdefinedname, alt)
                        values($projectid, '$k', '".$v['type']."', 
                               '".$v['showname']."','".$v['showname']."', '".$v['alt']."')";
                $v['reference'] = 2;
                $ret = $this->db->query($sql);
                $i ++;
            }
            echo $i,'条已增加<br/>';
        }        

        if(count($rows)>$countold)
        {
            // '有放弃不用的数据组';
            $i=0;
            echo "检测到有放弃不用的数据组:";
            foreach($rows as $k=>$v)
            {
                if($v->reference<2)
                {
                    $sql = "update datagroup_inproject
                            set reference=0
                            where projectid=$projectid and name='$k'";

                    $this->db->query($sql);
		            $i++;
                }
            }
            echo $i,'条已标记为"未使用"<br/>';
        }                
    }

    public function getDatagroupStatus($projectid)
    {
        $sql = "select * from datagroup_inproject 
                where projectid=$projectid and ( reference=0 or datasource='')";
        $rows = $this->db->get_results($sql, 'O');

        $retinfo = array('newdg'=>false, 'unreferencedg'=>false);
        if($rows)
            foreach($rows as $k=>$v)
            {
                if($v->reference==0)
                {
                    $retinfo['unreferencedg'] = true;
                }
                
                if($v->datasource==null)
                {
                    $retinfo['newdg'] = true;
                }
            }
            
        return $retinfo;
    }

    public function deleteData($projectid, $dgname, $did)
    {
        $sql = "delete from data_inproject where projectid=$projectid and datagroupname='$dgname' and id=$did";
        $ret  = $this->db->query($sql);
        
        return $ret;
    }
	public function delDatagroup($projectid, $dgname)
	{
       $sql="delete from datagroup_inproject where projectid=$projectid and name='$dgname'";
	   $ret=$this->db->query($sql);
	   return $ret;
	}
	public function delDatagroupmore($id)
	{
	 
	   $ids=split(',',$id);
       foreach($ids as $k=>$v)
		{
		   $sql="delete from datagroup_inproject where id='$v'";
		   $ret=$this->db->query($sql);
		}
	   return $ret;
	}
}



