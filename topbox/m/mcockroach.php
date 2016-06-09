<?php

class mcockroach extends model
{
	
	public function getNextToCreep()
	{
		$now = date('Y-m-d H:i:s');

		$sql = "select * from roach_todo where status like 'toget%' and questdate<'$now' order by questdate limit 1";

		$ret = $this->_db->fetch_one_assoc($sql);

		return $ret;
	}

	public function getNextToParse()
	{
		$sql = "select * from roach_todo where status like 'toparse' order by id limit 1";

		$ret = $this->_db->fetch_one_assoc($sql);

		return $ret;
	}

    /**
     *          __ toget1 -> toget2 -> failed
     * toget --|         ____________
     *         |        |           |
     *         |        V           |
     *         |__ toparse ----> wait4rule 
     *                       |                                (yes)
     *                        `-> parsed ---> <is Content> --------> wait4edit ----> done
     *                                             |
     *                                             |     (no)
     *                                             `---------------> willupdate ---> toget
     *                                                                          |
     *								                                            ---> done
     *
     * 对 willupdate 类型，设置为6小时后检查更新
     */
	public function updateId($url, $fromstatus, $tostatus)
	{
		$onehourlater = date('Y-m-d H:i:s', time()+3600*6);
		switch($fromstatus)
		{
			case 'toget':
				if($tostatus=='toparse')
				{
				$sql = "update roach_todo set status='toparse' where id={$url['id']}";
				}
				else if($tostatus=='failed')
				{
				$sql = "update roach_todo set status='toget1' where id={$url['id']}";
				}
				$this->_db->query($sql);
				break;
			case 'toget1':
				if($tostatus=='toparse')
				{
				$sql = "update roach_todo set status='toparse' where id={$url['id']}";
				}
				else if($tostatus=='failed')
				{
				$sql = "update roach_todo set status='toget2' where id={$url['id']}";
				}
				$this->_db->query($sql);
				break;
			case 'toget2':
				if($tostatus=='toparse')
				{
				$sql = "update roach_todo set status='toparse' where id={$url['id']}";
				}
				else if($tostatus=='failed')
				{
				$sql = "update roach_todo set status='failed' where id={$url['id']}";
				}
				$this->_db->query($sql);
				break;
			case 'toparse':
				// 这里有问题  TODO 该处逻辑赢移到controller里。 这里增加对其他几种状态的判断分支。
				if($tostatus=='wait4rule')
				{
					$newdate = date('Y-m-d');
					$sql = "update roach_todo set questdate='$newdate', status='wait4rule' where id={$url['id']}" ;
					$this->_db->query($sql);
				}
				else if($tostatus=='parsed')
				{
					if($url['type']=='content')
					{
						$newdate = date('Y-m-d');
						$sql = "update roach_todo set questdate='$newdate', status='done' where id={$url['id']}" ;
						$this->_db->query($sql);
					}
 					else{
						if($url['willupdate']==1)
						{
							$newdate = date('Y-m-d', time()+3600*24*3);
							$sql = "update roach_todo set questdate='$newdate', status='toget' where id={$url['id']}" ;
							$this->_db->query($sql);
						}
						else 
						{
							$newdate = date('Y-m-d');
							$sql = "update roach_todo set questdate='$newdate', status='done' where id={$url['id']}" ;
							$this->_db->query($sql);
						}
					}
				}
				break;
			case 'wait4rule':
			// 	break；
			case 'wait4edit':
			// 	break;
			// case 'parsed':

			// 	break;
			// default:
				break;
		}

		return ;
	}

	public function updateExtractors($basepath)
	{
		// TODO: list all files in basepath, and get all classes into table roach_rules
		$d = dir($basepath);
		#echo "Handle: " . $d->handle . "\n";
		#echo "Path: " . $d->path . "\n";
		while (false !== ($entry = $d->read())) 
		{
			if($entry=='.' || $entry=='..' || $entry=='extract.php')
				break;

			echo $entry."\n";
		}
		$d->close();		
	}

	public function getAllExtractors()
	{
		// TODO: 
		$sql = "select * from roach_rules";
		$ret = $this->_db->fetch_all_assoc($sql);

		return $ret;
	}

	public function addNewListUrl()
	{

	}

	public function addNewContentUrl()
	{

	}

	public function saveContentPageUrl($rec, $content, $matches)
	{
		// call addTodoUrl
		foreach($matches[1] as $k=>$v)
		{
			$this->addTodoUrl(0, 'machine', $v, $rec['gamename'], $matches[2][$k], 'content', '',$rec['sourcesite'],$rec['sourceauthor'], 0,$rec['tags']);	
		}
	}

	public function saveListUrl($rec, $content, $matches)
	{
		#http://game.youku.com/index/lol/_page93117_5.html
		// call addTodoUrl
		foreach($matches[1] as $k=>$v)
		{
			$this->addTodoUrl(0, 'machine', $v, $rec['gamename'], '', 'list', '',$rec['sourcesite'],$rec['sourceauthor'], 0,$rec['tags']);	
		}
	}

	public function addTodoUrl($userid, $username, $url, $gamename, $title, $type,$lazyload,$sourcesite, $sourceauthor, $willupdate, $tags)
	{
		$sql = "select id from roach_todo where url like '$url'";
		$ret = $this->_db->fetch_one_assoc($sql);
		if($ret)
			return true;

		$sql = "insert into roach_todo
						(`url`,`userid`,`username`,`gamename`,`title`,`sourcesite`,`sourceauthor`,
							`type`,`lazyload`,`tags`,`status`) 
					values
						('$url','$userid','$username','$gamename','$title','$sourcesite','$sourceauthor',
							'$type','$lazyload','$tags','toget')";

		$ret = $this->_db->query($sql);

		return $ret;
	}

	public function getAllTodo($start=0,$count=20)
	{
		$sql = "select * from roach_todo limit $start,$count";

		$ret = $this->_db->fetch_all_assoc($sql);

		return $ret;
	}

	public function countTodo()
	{
		$sql = "select count(*) cc from roach_todo ";		

		$ret = $this->_db->fetch_one_assoc($sql);

		return $ret['cc'];
	}

	public function getTodoByStatus($stat_param, $start=0, $count=20)
	{
		$sql = "select * from roach_todo where status='".$stat_param."' limit $start,$count";

		$ret = $this->_db->fetch_all_assoc($sql);

		return $ret;
	}

	public function countByStatus($stat_param){
		$sql = "select count(*) cn from roach_todo where status='".$stat_param."'";

		$ret = $this->_db->fetch_all_assoc($sql);
		
		return $ret[0]['cn'];
	}

	public function pushDone()
	{

	}

	public function getAllRules()
	{

	}

	public function getTitleByDate($gamename, $num){
		$sql = "SELECT title ".$alias." from roach_todo where `gamename`='".$gamename."' order by `questdate` desc limit 0,".$num;
		$ret = $this->_db->fetch_all_assoc($sql);
		return $ret;
	}

}

