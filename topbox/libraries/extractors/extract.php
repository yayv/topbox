<?php 
interface morelistpage
{
	public function getMoreListPages();
}

interface contentlist
{
	public function getContentAddresses();
}

interface content
{
	public function getContentAttributes();
}

abstract class extract
{
	public function getHost()
	{
		return $this->host;
	}

	public function getURLPattern()
	{
		return $this->urlpattern;
	}

	public function getExampleURL()
	{
		return $this->urlexample;
	}

	public function getStatus()
	{
		return $this->status;
	}

	public function getNote()
	{
		return $this->note;
	}

	public function getExtractorInfo()
	{
		return array(
				'host'=>$this->host,
				'urlpattern'=>$this->urlpattern,
				'urlexample'=>$this->urlexample,
				'status'=>$this->status,
				'note'=>$this->note,
			);
	}

	public function isRuleMatchedURL($url)
	{
		$ret = preg_match($this->urlpattern, $url, $matches); 

		return $ret;
	}

	public function parse($url, $content, $attributes)
	{
		$this->url = $url;
		$this->content = $content;
		$this->attributes = $attributes;
	}

	// -----------[ 以上方法不需要做修改，只需要子类继承使用就好 ]--------------
	/*
	// 需要子类实现的内容，如
	function __construct()
	{
		$this->host = 'game.youku.com';
		$this->urlpattern = '/http\:\/\/game\.youku\.com\/index\/lol/';
		$this->urlexample = 'http://game.youku.com/index/lol/';
		$this->status = 'DEVELOPING';
		$this->note   = '';
	}
	*/

	// 为开发中准备的状态, 开发完成则需要覆盖本方法，返回true
	public function getExtractorStatus(){ return 'DEVELOPING'; }

	abstract public function parse($url, $content='', $attributes=array());

}

