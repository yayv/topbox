<?php
include_once('commoncontroller.php');

class datagroup extends CommonController
{
	public function __construct()
	{
		$this->httpauth();
		
	}


	public function index()
	{
		
	}

	public function saveDataInJSON($projectid, $content){
		parent::init();

		$jsonStr = json_encode($content);

		file_put_contents("v/_run/json_proid_".$projectid, $jsonStr);

		// print_r($jsonStr);return;

	}

	//最新视频
	public function getNewestVideos(){
		parent::init();
		$projectid = $_GET['projectid'];
		$gamename=$_GET['gamename'];
		$num=$_GET['num'];

		//查询条件应该不止这些，还有url类型，status等
		$videoTitle = $this->getModel('mcockroach')->getTitleByDate($gamename,$num, "NewestVideos");
		$this->saveDataInJSON($projectid, $videoTitle);
	}

	//视频排行
	public function getHotestVideos(){
		//数据库中加入“浏览量”列，并记录页面的浏览次数
	}

	//赛事视频推荐
	public function getMatchesByType(){
		//数据库要提供赛事及赛事类型列
	}

	//英雄索引
	public function getHeroList(){
		//数据库提供英雄列，每个英雄可带有多个属性
	}

	//每日推荐
	public function recommend(){
		//提供每日推荐表，限定个数获取
	}


}

?>