<?php 
class mtags extends model
{

	public function getAllTags(){
		$sql = "select * from cake_tag";

		$ret = $this->_db->fetch_all_assoc($sql);

		return $ret;
	}
}
