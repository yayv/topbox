<?php
// 公共模板的模型类
class mtemplates extends model
{
	public function getAllTemplates()
	{
		$sql = "select templateid, name, filename,preview from portal_templates";
		$rows = $this->_db->fetch_all_object($sql);

		return $rows;
	}

	public function getTemplateInfo($templateid)
	{
		$sql = "select * from portal_templates where templateid=$templateid";
		$rows = $this->_db->fetch_all_object($sql);

		return $rows[0];
	}

	public function getContent($templateid)
	{
		$sql = "select content from portal_templates where templateid=$templateid";
		$c   = $this->_db->fetch_all_object($sql);

		if($c)
			return $c[0]->content;
		else
			return false;
	}
	
	public function getTemplatesNames()
	{
	    $sql = "select templateid,name from portal_templates";
	    $res  = $this->_db->fetch_all_assoc($sql);

	    return $res;
	}

	public function getTempatesPath($templateid)
	{
		$sql = "select filename from portal_templates where templateid=$templateid";
		$res = $this->_db->fetch_all_object($sql);
		$ret = $res[0]->filename;
		$endstr = strstr($ret, '/');
		$pos = strpos($ret, $endstr);
		return substr($ret, 0, $pos);
	}

	public function updateTemplateInfo($templateid, $name, $content)
	{
		$sql = "update portal_templates 
				set
					name='$name',
					content='$content'
				where
					templateid=$templateid";
		$ret = $this->_db->query($sql);

		return $ret;
	}
}
