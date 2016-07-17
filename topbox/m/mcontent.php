<?php 
class mcontent extends model
{
	// TODO: 当完成5个模型类之后再考虑如何对模型进行安装

	// TODO: 这里是CMS系统的资源管理模型部分,个人观点，一个CMS，资源是最终最细分的结果细胞，而所有的分类,包括文章的正文，视频，音频，图片等

	// TODO: 不同的资源还代表着不同分类方式，而这种分类方式往往就会因为资源类型的不同而产生完全不同分类目录树
	// TODO: 不知道之前的CMS系统支持多种不同的分类混合编排不，还是说，在顶级之下就分成不同的资源分类？

	public function getContentById($id)
	{
		$sql = "select * from cake_contents where id=$id";
		$ret = $this->_db->query($sql);
		if($ret)
		{
			$rec = $this->_db->fetch_one_assoc($sql);	
			return $rec;
		}
		else
			return false;
	}

	public function getContentByShortname()
	{

	}

	public function getContentTypeByShortname()
	{

	}

	public function saveContentType4Shortname()
	{

	}

	public function updateContent($content)
	{
		// no url? must be wrong
		if(!isset($content->url))
			return false;

		// select by content->url
		$sql = "select * from cake_contents where $content->url";
		$rec = $this->_db->fetch_one_assoc($sql);
		if($rec)
		{
		// update object by record
		// update record by object
		}
		else
		{
			$sql = "insert into cake_contents() values()";
			$ret = $this->_db->query($sql);
			return $ret;
		}
	}

	public function saveProperties($conds){
		$sql = "update cake_contents set ";

		foreach ($conds as $key => $value) {
			if($key == "id"){
				$id = $value;
				continue;
			}
			$sql .= $key."='".$value."', ";
		}

		if(preg_match("|, $|", $sql)){
			$sql = substr($sql, 0, -2);
		}

		$sql .= " where id=".$id;
		$ret = $this->_db->fetch_all_assoc($sql);
		print_r($ret);die();
		return $ret;
	}


	public function getDataById($id){
		$sql = "select * from cake_contents where id='".$id."'";
		$ret = $this->_db->fetch_all_assoc($sql);
		return $ret;
	}


	public function getTagNameByContentId($content_id){
		$sql = "select tag_name from content_tag_rel where content_id='".$content_id."'";

		$ret = $this->_db->fetch_all_assoc($sql);
		return $ret;
	}


	public function queryByCondition($condArr, $start=0,$count=20){
		$sql = "select * from cake_contents where ";

		foreach ($condArr as $key => $value) {
			$sql .= $key."='".$value."' and ";
		}

		if(preg_match("|and $|", $sql)){
			$sql = substr($sql, 0, -4)." limit $start,$count";
		}


		$ret = $this->_db->fetch_all_assoc($sql);

		return $ret;
	}

	public function getColumn($columnName){
		$sql = "select ".$columnName." from cake_contents";
		$ret = $this->_db->fetch_all_assoc($sql);

		return $ret;
	}

	public function getTableHeader(){
		$sql = "select COLUMN_NAME from information_schema.columns where table_name='cake_contents'";
		$ret = $this->_db->fetch_all_assoc($sql);

		return $ret;
	}

	public function getAllData($start=0,$count=20)
	{
		$sql = "select * from cake_contents limit $start,$count";

		$ret = $this->_db->fetch_all_assoc($sql);

		return $ret;
	}

	public function countAllData()
	{
		$sql = "select count(*) cc from cake_contents ";		

		$ret = $this->_db->fetch_one_assoc($sql);

		return $ret['cc'];
	}




}






