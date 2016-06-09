<?php
// 公共模板的模型类
class mtemplates
{
	private $db;
	private $config;
	private $home;

	public function __construct($db, $config, $home)
	{
		$this->db = &$db;
		$this->config = &$config;
		$this->home = $home;
	}

	public function getAllTemplates()
	{
		$sql = "select templateid, name, filename,preview from templates";
		$rows = $this->db->get_results($sql,'O');

		return $rows;
	}

	public function getTemplateInfo($templateid)
	{
		$sql = "select * from templates where templateid=$templateid";
		$rows = $this->db->get_results($sql, "O");

		return $rows[0];
	}

	public function getContent($templateid)
	{
		$sql = "select content from templates where templateid=$templateid";
		$c   = $this->db->get_var($sql,'O');

		if($c)
			return $c;
		else
			return false;
	}
	
	public function getTemplatesNames()
	{
	    $sql = "select templateid,name from templates";
	    $ret = $this->db->query($sql);

	    $rows = array();
	    while($row = mysql_fetch_array($this->db->query_id()))
	    {
	        $rows[$row['templateid']] = $row['name'];
	    }

	    return $rows;
	}

	public function getTempatesPath($templateid)
	{
		$sql = "select filename from templates where templateid=$templateid";
		$ret = $this->db->get_var($sql, 'O');

		$endstr = strstr($ret, '/');
		$pos = strpos($ret, $endstr);
		return substr($ret, 0, $pos);
	}

	public function updateTemplateInfo($templateid, $name, $content)
	{
		$sql = "update templates 
				set
					name='$name',
					content='$content'
				where
					templateid=$templateid";
		$ret = $this->db->get_var($sql, 'O');

		return $ret;
	}
}
