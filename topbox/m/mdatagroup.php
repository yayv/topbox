<?php
/**
 * 数据管理模块
 */
class mdatagroup extends model
{
    /*
   public function Oldinit($db, $config, $home)        
   {    
		$this->_db = &$db;
		$this->config = &$config;
		$this->home = $home;

        $this->error_stack = array();
   } 
   */
      
   public function getDatagroups($projectid)
   {
        $sql = "select * from portal_datagroup_inproject where projectid=$projectid order by  type desc, name  asc";
        $ret = $this->_db->fetch_all_object($sql);

        return $ret;
   }
   
   public function getDatagroupInfo($projectid, $dgname)
   {
        $sql = "select * from portal_datagroup_inproject where name='$dgname' and projectid=$projectid";
        $ret = $this->_db->fetch_all_object($sql,'O');
       
        return $ret[0];
   }
   
    public function updateDatagroupInfo($projectid, $dgname, $key, $value)
    {
        if(in_array($key, array('datasource', 'sourcetype', 'updatetype','userdefinedname')))
        {
            $sql = "update portal_datagroup_inproject 
                    set $key='$value'
                    where projectid=$projectid and name='$dgname'";
            $ret = $this->_db->query($sql);
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
        $sql = "select * from portal_datagroup_inproject where projectid=$projectid";
        $ret = $this->_db->query($sql);
        $rows = array();
        $rowsupdate = array();
        $countold = 0;

        $resultstring = "";
        $resultstring .= count($datagroup) ." 个待处理数据组<br/>";
		$resultstring .= $ret->num_rows." 个原有数据组<br/>";
        if($ret)
            for($i=0;$i<$ret->num_rows;$i++)
            {
                #$row = mysql_fetch_object($this->_db->Query_ID);
                $row = $this->_db->fetch_object($ret);
                
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
        	$resultstring .= '更新数据组信息:';
        	$i = 0;
            foreach($rowsupdate as $k=>$v)
            {
                $sql = "update portal_datagroup_inproject 
                        set
                            type='".$v['type']."',
                            showname='".$v['showname']."',
                            alt='".$v['alt']."',
                            reference=1                        
                        where
                            projectid=$projectid and name='$k'";
                $this->_db->query($sql);
                $i ++;
            }
            $resultstring .= "$i 条已更新<br/>";
        }


        if(count($datagroup)>0)
        {
            // '有新的数据组';
            $i =0;
            $resultstring .= "检测到新的数据组:";
            foreach($datagroup as $k=>$v)
            {
                $sql = "insert into portal_datagroup_inproject 
                        (projectid, name, type, showname, userdefinedname, alt)
                        values($projectid, '$k', '".$v['type']."', 
                               '".$v['showname']."','".$v['showname']."', '".$v['alt']."')";
                $v['reference'] = 2;
                $ret = $this->_db->query($sql);
                $i ++;
            }
            $resultstring .= "$i 条已增加<br/>";
        }

        if(count($rows)>$countold)
        {
            // '有放弃不用的数据组';
            $i=0;
            $resultstring .= "检测到有放弃不用的数据组:";
            foreach($rows as $k=>$v)
            {
                if($v->reference<2)
                {
                    $sql = "update portal_datagroup_inproject
                            set reference=0
                            where projectid=$projectid and name='$k'";

                    $this->_db->query($sql);
		            $i++;
                }
            }
            $resultstring =  "$i 条已标记为'未使用'<br/>";
        }

        return $resultstring;
    }

    public function getDatagroupStatus($projectid)
    {
        $sql = "select * from portal_datagroup_inproject 
                where projectid=$projectid and ( reference=0 or datasource='')";
        $rows = $this->_db->get_results($sql, 'O');

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
        $sql = "delete from portal_data_inproject where projectid=$projectid and datagroupname='$dgname' and id=$did";
        $ret  = $this->_db->query($sql);
        
        return $ret;
    }
	public function delDatagroup($projectid, $dgname)
	{
       $sql="delete from portal_datagroup_inproject where projectid=$projectid and name='$dgname'";
	   $ret=$this->_db->query($sql);
	   return $ret;
	}
	public function delDatagroupmore($id)
	{
	 
	   $ids=split(',',$id);
       foreach($ids as $k=>$v)
		{
		   $sql="delete from portal_datagroup_inproject where id='$v'";
		   $ret=$this->_db->query($sql);
		}
	   return $ret;
	}
}



