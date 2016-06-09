<?php

class roachbaby
{
	private $_header = array(
		"Accept" => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
		"Accept-Encoding" => "gzip, deflate",
		"Accept-Language" => "en-US,en;q=0.5",
		"Contection" => "keep-alive",
		"Host" => "106.38.249.134",
		"Refer" => "http://static.youku.com/v1.0.0428/v/swf/loader.swf",
		"User-Agent" => "Mozilla/5.0 (Macintosh; Intel Mac OS X 10.9; rv:28.0) Gecko/20100101 Firefox/28.0",
		);

	public function setHeader()
	{

	}	

	public function getHeaderString()
	{
		$headerstring = "";
		foreach($this->_header as $k=>$v)
		{
			$headerstring .= $k.": ".$v."\r\n";
		}

		return $headerstring;
	}

	public function get($url)
	{
		$opts = array(
			'http' => array(
				'method' => 'GET',
				'header' => $this->getHeaderString()
				)
			);
		$context = stream_context_create($opts);
		#$c = ;

		file_put_contents("t.flv", file_get_contents($url, false, $context));
	}
}

$a = new roachbaby();
$a->get('http://106.38.249.134/youku/6577802A449447BC0B37B2925/030002120552CE8AA16EC7055EEB3E05C181C8-7063-B50E-CA65-E2DB3C64A427.flv');

