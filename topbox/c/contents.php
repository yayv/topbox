<?php
include_once("commoncontroller.php");

// 这里是爬虫类，用来做抓取功能
class contents extends CommonController 
{
	public function __construct()
	{

		// $objMain 的几个属性需要用 core 初始化，并赋值给 $objMain
  //  		$this->initDb();
  //  		$this->initTemplateEngine(THEMES_DIR.$core->getConfig('site')['theme'],
  //  									COMPILE_DIR.$core->getConfig('site')['theme']);
		//将从cake_content表中查询到的数据展现出来
		//提供按字段筛选功能
	}

	public function index()
	{


  //       //点击"解析内容"
		// $id = $_GET['action'] ;

		// $content   = false;
		// if($id && ($content = $this->getModel('mcontent')->parseAndStoreDataIntoDB($id)))
		// {
		// 	return ;
		// }
		// else
		// {
		// 	header('HTTP/1.0 404 Not Found');
		// 	$this->tpl->display('error_pages/404.html');

		// 	return ;
		// }



		$this->beforeShowContent();

		$start= isset($_GET['start'])?$_GET['start']:0;
        $ths = $this->getModel('mcontent')->getTableHeader();

        $recs  = $this->getModel('mcontent')->getAllData($start,20);
        $count= $this->getModel('mcontent')->countAllData();


        #$start
        $a    = $start>100?$start-100:1;
        $b    = (($a + 200) > $count)?$count:($a+200);

		$this->tpl->assign('ths', $ths);
        $this->tpl->assign('recs', $recs);

        //当记录数小于20条时无需显示分页栏
	    if($b>20){
	       	$pages = range($a, $b, 20);
	    }


        $this->tpl->assign('pages', $pages);

		$body = $this->tpl->fetch('contents.tpl.html');
		$this->tpl->assign('body', $body);
		$this->tpl->display('index.tpl.html');


		//点击条件查询按钮，访问另一个url（content.php中增加editCondition方法，载入另一个tpl文件， 在该页submit后触发DB query操作，在content.php中增加conditionalQuery方法，查询数据库，并在该方法中调用contents.tpl模板显示新数据）
	}

	public function beforeShowContent(){
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

	}


	public function editCondition(){
		parent::init();
		$mcontent = $this->getModel('mcontent');
		
		//TODO 查询出各字段的值, 不应该多次查询数据库，待字段确定以后改成一条sql语句查询出全部需要的值
		$url = $mcontent->getColumn('url'); 
		$title = $mcontent->getColumn('title');  //传入字段名
		$cover = $mcontent->getColumn('cover'); 
		$shortname = $mcontent->getColumn('shortname'); 
		$substract = $mcontent->getColumn('substract'); 


		// 增加条件查询模板页面
		$this->tpl->assign('url', $url);
		$this->tpl->assign('title', $title);
		$this->tpl->assign('cover', $cover);
		$this->tpl->assign('shortname', $shortname);
		$this->tpl->assign('substract', $substract);
		$this->tpl->display('condquery.tpl.html');
	}

	public function conditionalQuery(){
		parent::init();
		$nav  = $this->tpl->fetch('navigatebar.tpl.html');
        $this->tpl->assign('navigatebar',$nav);


		$start= isset($_GET['start'])?$_GET['start']:0;
        $ths = $this->getModel('mcontent')->getTableHeader();

		$mcontent = $this->getModel('mcontent');
        $condArr = $this->getConditionValues();

		$recs = $mcontent->queryByCondition($condArr,$start,20); 
        $count= count($recs);

        #$start
        $a    = $start>100?$start-100:1;
        $b    = (($a + 200) > $count)?$count:($a+200);


		$this->tpl->assign('ths', $ths);
        $this->tpl->assign('recs', $recs);

        //TODO 20改成1或2都有问题
        $this->tpl->assign('pages', range($a, 20>$b?$b-1:20, 20));

		$body = $this->tpl->fetch('contents.tpl.html');
		$this->tpl->assign('body', $body);
		$this->tpl->display('index.tpl.html');

	}


	public function getConditionValues(){
        
		// TODO 查询数据库，拿到所有字段值，并assign进模板, 稍后可能增加
        $url			= $_POST['url'];
		$title			= $_POST['title'];
		$cover 			= $_POST['cover'];
		$shortname 		= $_POST['shortname'];
		$substract		= $_POST['substract'];

		$condArr = array('url'=>$url, 'title'=>$title, 'cover'=>$cover, 'shortname'=>$shortname, 'substract'=>$substract);
		//用户没有指定的查询列，在查询时应该忽略，而不是设为空值，否则查询不到正确数据
		foreach ($condArr as $key => $value) {
			if(strlen($value) == 0){
				unset($condArr[$key]);
			}
			
		}

		return $condArr;
	}

	public function editTags(){
		parent::init();

		$content_id = $_GET['content_id'];
		$mcontent = $this->getModel('mcontent');

		$tagName = $mcontent->getTagNameByContentId($content_id);
		
		$this->tpl->assign('tagName', $tagName);
		$this->tpl->assign('content_id', $content_id);
		$this->tpl->display('showTags.tpl.html');
	}

	public function showEditContentView(){
		parent::init();

		$content_id = $_GET['content_id'];
		$mcontent = $this->getModel('mcontent');
		$columns = $mcontent->getTableHeader();
		$records = $mcontent->getDataById($content_id);

		$this->tpl->assign('columns', $columns[0]);
		$this->tpl->assign('records', $records[0]);
		$this->tpl->display('contentEdit.tpl.html');
	}

	public function saveContent(){
		parent::init();
		$mcontent = $this->getModel('mcontent');

		// TODO: 如果这里可以用脚本或者插件自动生成,就太棒了
		$id             = $_POST['id'];
		#$title			= $_POST['title'];		// 这个应该在内容编辑页进行更改
		#$subtitle		= $_POST['subtitle'];   // 这个应该在内容编辑页进行更改
		$cover 			= $_POST['cover'];
		$uri 			= $_POST['uri'];
		$keywords 		= $_POST['keywords'];
		$shortname 		= $_POST['shortname'];
		$substract		= $_POST['substract'];
		#$content        = $_POST['content'];    // 这个应该在内容编辑页进行更改
		$contenttype	= $_POST['contenttype'];
		$length			= $_POST['length'];
		$source			= $_POST['source'];
		$sourcetype 	= $_POST['sourcetype'];
		$author 		= $_POST['author'];
		$editor		    = $_POST['editor'];
		$posttime		= $_POST['posttime'];
		$verifytime		= $_POST['verifytime'];
		$publishtime	= $_POST['publishtime'];


		$conds = array('id'=>$id, 'cover'=>$cover, 'uri'=>$uri, 'keywords'=>$keywords, 'shortname'=>$shortname, 'substract'=>$substract,
			'contenttype'=>$contenttype, 'length'=>$length, 'source'=>$source, 'sourcetype'=>$sourcetype, 
			'author'=>$author, 'editor'=>$editor, 'posttime'=>$posttime, 'verifytime'=>$verifytime, 'publishtime'=>$publishtime );
		

		$success = $mcontent->saveContent($conds);
		if($success){
			header("location:contents");
		}

	}


}

