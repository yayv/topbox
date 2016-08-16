<?php
include_once("commoncontroller.php");
include_once('semaphore.php');
include_once('kitchen.php');

// 这里是爬虫类，用来做抓取功能
class cockroach extends CommonController 
{
	public function __construct()
	{
		$this->httpauth();
		
		$this->_kitchen = new kitchen();
	}

	public function index()
	{
		parent::init();

		if(!$this->isLogined())
		{
			// TODO:
			return ;
		}

		if(!$this->isManager())
		{
			return ;
		}

        $this->tpl->assign('currentItems',
        		array(
        			array('href'=>'###','title'=>'|'),
        			array('href'=>'/project/info/name-'.$name,'title'=>"【".$proj['showname']."】"),
        			array('href'=>'/project/checkdir/name-'.$name, 'title'=>'项目目录检查'),
        			array('href'=>'/project/logmanage/name-'.$name, 'title'=>'日志管理'),
        			array('href'=>'/project/codeanalyse/name-'.$name, 'title'=>'代码分析'),
        			array('href'=>'/project/config/name-'.$name, 'title'=>'配置管理'),
					array('href'=>'/project/todo/name-'.$name, 'title'=>'重新扫描')
        	));

        $nav  = $this->tpl->fetch('navigatebar.tpl.html');
        
        $this->tpl->assign('navigatebar',$nav);

        $mcockroach = $this->getModel('mcockroach');

        $start= isset($_GET['start'])?$_GET['start']:0;

        $stat_param= $_GET['s'];

        if(isset($stat_param)){

	        $ret=   $mcockroach->getTodoByStatus($stat_param, $start, 20);

	        $count= $mcockroach->countByStatus($stat_param);

        }else{

	        $ret  = $mcockroach->getAllTodo($start,20);

	        $count= $mcockroach->countTodo();

        }
        	
        // print_r($ret);
        // return;

        #$start
        $a    = $start>100?$start-100:1;
        $b    = (($a + 200) > $count)?$count:($a+200);

        $status = array(
        		array('key'=>'toget','name'=>'待抓取'),
        		array('key'=>'toparse','name'=>'待解析'),
        		array('key'=>'wait4rule', 'name'=>'等待可用规则'),
        		array('key'=>'wait4parse', 'name'=>'待解析'),
        		array('key'=>'failed', 'name'=>'抓取失败'),
        		array('key'=>'parsed', 'name'=>'解析完成'),
        		array('key'=>'wait4edit', 'name'=>'待编辑'),
        		array('key'=>'willupdate', 'name'=>'待更新'),
        		array('key'=>'done', 'name'=>'已完成')
        		);

        $this->tpl->assign('status',$status);
        $this->tpl->assign('urls', $ret);

        // return;

        //当记录数小于20条时无需显示分页栏
	    if($b>20){
	       	$pages = range($a, $b, 20);
	    }

        
        $this->tpl->assign('pages', $pages);


		$body = $this->tpl->fetch('cockroach.tpl.html');
		$this->tpl->assign('body', $body);

		$this->tpl->display('index.tpl.html');
	}

	public function filter()
	{
		parent::init();

		if(!$this->isLogined())
		{
			// TODO:
			return ;
		}

		if(!$this->isManager())
		{
			return ;
		}

        $this->tpl->assign('currentItems',
        		array(
        			array('href'=>'###','title'=>'|'),
        			array('href'=>'/project/info/name-'.$name,'title'=>"【".$proj['showname']."】"),
        			array('href'=>'/project/checkdir/name-'.$name, 'title'=>'项目目录检查'),
        			array('href'=>'/project/logmanage/name-'.$name, 'title'=>'日志管理'),
        			array('href'=>'/project/codeanalyse/name-'.$name, 'title'=>'代码分析'),
        			array('href'=>'/project/config/name-'.$name, 'title'=>'配置管理'),
					array('href'=>'/project/todo/name-'.$name, 'title'=>'重新扫描')
        	));

        $nav  = $this->tpl->fetch('navigatebar.tpl.html');
        $this->tpl->assign('navigatebar',$nav);

        $start= isset($_GET['start'])?$_GET['start']:0;
        $ret  = $this->getModel('mcockroach')->getAllTodo($start,20);
        $count= $this->getModel('mcockroach')->countTodo();

        #$start
        $a    = $start>100?$start-100:1;
        $b    = (($a + 200) > $count)?$count:($a+200);
        $status = array(
        		'toget'=>'待抓取',
        		'toparse'=>'待解析',
        		'wait4rule','wait4parse'
        		);
        $this->tpl->assign('status',$status);
        $this->tpl->assign('urls', $ret);
        $this->tpl->assign('pages', range($a, $b,20));

		$body = $this->tpl->fetch('cockroach.tpl.html');
		$this->tpl->assign('body', $body);

		$this->tpl->display('index.tpl.html');		
	}

	public function rules()
	{
		parent::init();

		if(!$this->isLogined())
		{
			// TODO:
			return ;
		}

		if(!$this->isManager())
		{
			return ;
		}

        $this->tpl->assign('currentItems',
        		array(
        			array('href'=>'###','title'=>'|'),
        			array('href'=>'/project/info/name-'.$name,'title'=>"【".$proj['showname']."】"),
        			array('href'=>'/project/checkdir/name-'.$name, 'title'=>'项目目录检查'),
        			array('href'=>'/project/logmanage/name-'.$name, 'title'=>'日志管理'),
        			array('href'=>'/project/codeanalyse/name-'.$name, 'title'=>'代码分析'),
        			array('href'=>'/project/config/name-'.$name, 'title'=>'配置管理'),
					array('href'=>'/project/todo/name-'.$name, 'title'=>'重新扫描')
        	));

        $nav  = $this->tpl->fetch('navigatebar.tpl.html');
        $this->tpl->assign('navigatebar',$nav);

        $start= isset($_GET['start'])?$_GET['start']:0;
        $rules  = $this->getModel('mrules')->getAllRules();
        $count= $this->getModel('mrules')->countAllRules();

        #$start
        $a    = $start>100?$start-100:1;
        $b    = (($a + 200) > $count)?$count:($a+200);
        $this->tpl->assign('rules', $rules);
        $this->tpl->assign('pages', range($a, $b,20));

		$body = $this->tpl->fetch('cockroach_rules.tpl.html');
		$this->tpl->assign('body', $body);

		$this->tpl->display('index.tpl.html');				
	}

	public function doAddTodo()
	{
		parent::init();

		if(!$this->isLogined())
		{
			// TODO:
			return ;
		}

		if(!$this->isManager())
		{
			return ;
		}

		$game			= $_POST['url'];
		$title			= $_POST['url'];
		$url 			= $_POST['url'];
		$type 			= $_POST['type'];
		$tags			= $_POST['tags'];
		$sourceauthor 	= $_POST['sourceauthor'];
		$lazyload		= $_POST['lazyload'];
		$willupdate		= $_POST['willupdate'];

		$userid 	= $_SESSION['userid'];
		$username 	= $_SESSION['username'];
		$arrUrl     = parse_url($url);
		$this->getModel('mcockroach')->addTodoUrl($userid, $username, $url, $game, $title, $type, $lazyload,$arrUrl['host'],$sourceauthor, $willupdate, $tags);

		header("location:/cockroach");
	}

	public function extractors()
	{
		parent::init();

		$ret = $this->getModel('mcockroach')->updateExtractors("./libraries/extractors/");

		$extractors = $this->getModel('mcockroach')->getAllExtractors();

		echo "<pre>";
		print_r($extractors);
		die();
        $nav  = $this->tpl->fetch('navigatebar.tpl.html');
        $this->tpl->assign('navigatebar',$nav);

		$body = $this->tpl->fetch('cockroach_rules.tpl.html');
		$this->tpl->assign('body', $body);

		$this->tpl->display('index.tpl.html');
	}

	public function intoTheCockroachNest()
	{
		// TODO: check client ip, must be 127.0.0.1
		if(!isset($_SERVER['TERM']))
		{
			header("HTTP/1.1 404 PAGE NOT FOUND");
			header("Content-Type:text/plain");
			echo "Page Not Found!";
			return false;
		}

		parent::init();
		set_time_limit(0);

		$this->_rules = $this->getModel('mrules')->loadAllRules();

		// TODO: load rules for Hosts
		$hasnew = false;
		do
		{
			// TODO: 抓取所有待抓取的内容
			$hasnew = $this->creep();

			// TODO: 解析全部可解析的内容
			$hasnew |= $this->parsePage();

			echo 'end intoTheCockroachNest',"\n";
			break;

		}while($hasnew);
	}

	// 爬取内容
	private function creep()
	{
		// $this->initDb(Core::getInstance()->getConfig('database'));

		// TODO: 考虑如何防止爬虫重入，或者如何协调多个爬虫协同工作
		$hasnew  = false;
		$echourl = true;//$_SERVER['echourl'];

		$count = 0;
		

		while($rec = $this->getModel('mcockroach')->getNextToCreep())
		{
			if($echourl)
				echo "collecting ... ", $rec['id'],"\t",$rec['url'],"\n";

			$page = file_get_contents($rec['url']);

			$count += 1;

			if($page)
				echo $rec['url'],"\t","OK\n";
			else
				echo $rec['url'],"\t","FAILED\n";

			if($page)
			{
				$hasnew = true;

				$ret  = $this->_kitchen->savePage($rec['id'],$page);

				if($ret)
					$this->getModel('mcockroach')->updateId($rec, $rec['status'],'toparse');
			}
			else
			{
				$this->getModel('mcockroach')->updateId($rec, $rec['status'],'failed');	
			}
		}
	
		return $hasnew;
	}

	public function parsePage()
	{
		// check for new contents
		while($rec = $this->getModel('mcockroach')->getNextToParse())
		{
			echo "Parsing:",$rec['url'],"\n";
			$urlinfo = parse_url($rec['url']);
			$host= $urlinfo['host'];

			#http://v.youku.com/v_show/id_XNzM0NjcxMDQ0.html
			if(isset($this->_rules[$host]))
			{
				$matched = false;
				foreach($this->_rules[$host] as $k=>$v)
				{
					if(preg_match($v['url_rule'],$rec['url'], $matches))
					{
						$obj = new $v['classname'];
						if(is_subclass_of($obj,'morelistpage'))
						{
							$list = $obj->getMoreListPages();
							// TODO: 添加url列表到todo表
							foreach($list as $k=>$v)
							{
								$this->getModel('mcockroach')->addNewListUrl();
							}
						}

						if(is_subclass_of($obj,'contentlist'))
						{
							$list = $obj->getContentAddresses();
							// TODO: 添加url列表到todo表
							foreach($list as $k=>$v)
							{
								$this->getModel('mcockroach')->addNewContentUrl();
							}
						}

						if(is_subclass_of($obj,'content'))
						{
							$attributes = $obj->getContentAttributes();
							// TODO: 添加页面内容及其他属性到内容表
							foreach($attributes as $k=>$v)
							{
								$this->getModel('mcontent')->updateContent($v);	
							}
							
						}
						unset($obj);
						// 这里是老逻辑，全部废除，准备用新的爬虫管理方法来进行管理
						/*
						$content = $this->_kitchen->loadPageContent($rec['id']);
						
						if($v['parse_rule']=='' && $v['functiontype']=='content')
						{
							// 处理内容页的内容提取
							$matched = true;
							$c = explode("::",$v['callfunction']);
							if(count($c)>1)
							{
								$cls = $c[0];
								$mthd = $c[1];
								include_once("$cls".'.php');
								$obj = new $cls;
								$content = $c->$mthd($rec,$content,$mathes);
								$ret = $this->getModel('mcontent')->saveContent($content);
							}
							else
							{
								$mthd = $this->getModel('mcockroach')->$c[1]($rec,$content,$mathes);
								$content = $mthd($rec,$content,$mathes);
								$ret = $this->getModel('mcontent')->saveContent($content);
							}
						}
						else if(preg_match_all($v['parse_rule'], $content, $matches))
						{
							// 处理各种页面的列表提取
							$matched = true;
							$this->getModel('mcockroach')->$v['callfunction']($rec, $content, $matches);
						}
						else 
						{
							// echo "error!';
							echo 'Error in '.__FILE__.':'.__LINE__.': wrong rule or wrong rule type';
						}
						*/

					}
				}

				if($matched){
					$this->getModel('mcockroach')->updateId($rec, $rec['status'],'parsed');
				}else{
					
					$this->getModel('mcockroach')->updateId($rec, $rec['status'],'wait4rule');
				}

			}
			else
				$this->getModel('mcockroach')->updateId($rec, $rec['status'],'wait4rule');
		}
		
		// page content
		// parsers
		// results
		// 
	}

	public function boxAddUrl()
	{
		parent::init();
		$this->tpl->display('cockroach_boxAddUrl.tpl.html');
	}

}

