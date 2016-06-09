<?php

class mrules extends model
{
	public function loadRulesForHost($host)
	{
		$sql = "select * from roach_rules where hosts like '$host'";
		$ret = $this->_db->fetch_all_assoc($sql);

		return $ret;
	}

	public function getAllRules()
	{
		$sql = "select * from roach_rules order by host";

		$ret = $this->_db->fetch_all_assoc($sql);
#echo '<pre>';print_r($ret);die();
		return $ret;
	}
	public function loadAllRules()
	{
		$sql = "select * from roach_rules order by host";

		$ret = $this->_db->fetch_all_assoc($sql);

		$hosts = array();
		foreach($ret as $k=>$v)
		{
			if(!isset($hosts[$v['host']]))
				$hosts[$v['host']] = array();

			$hosts[$v['host']][] = $v;
		}

		// echo 'ret - '.'<pre>';print_r($ret);
		// echo 'v - '.'<pre>';print_r($v);
		// echo 'hosts - '.'<pre>';print_r($hosts);die();

		return $hosts;
	}

	public function countAllRules()
	{
		$sql = "select count(*) cc from roach_rules order by host";

		$ret = $this->_db->fetch_one_assoc($sql);

		return $ret['cc'];
	}

	public function addRuleForHost($host, $urlrule, $rule)
	{
		$sql = "insert into roach_rules
					(`host`,`url_rule`,`callfunction`,`parse_rule`,`interval`)
				values
					('$host','$url','howto call function','content rules','whats interval')
		";

		$ret = $this->_db->query();
		return $ret;
	}
}
