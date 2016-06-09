<?php 
require_once('./extract.php');

class game_youku_com  extends extract implements morelistpage, contentlist 
{ 
	function __construct()
	{
		$this->host = 'game.youku.com';
		$this->urlpattern = '/http\:\/\/game\.youku\.com\/index\/lol/';
		$this->urlexample = 'http://game.youku.com/index/lol/';
		$this->status = 'DEVELOPING';
		$this->note   = '';
	}

	public function getMoreListPages()
	{
		// TODO: 获得列表页的翻页信息
		$pattern = "/<a href=\"(http\:\/\/game\.youku\.com\/index\/lol\/_page[0-9]*_[0-9]*\.html)\"/";

	}

	public function getContentAddresses()
	{
		// TODO: 获得列表页内所有资源页面的地址及相关信息
		$pattern = "/\"(http\:\/\/v\.youku\.com\/v_show\/id_[a-zA-Z0-9]*\.html)\"\starget=\"video\"\stitle=\"(.*)\"/";
	}

	/*
	public function getContentAttributes()
	{

	}
	*/

}
