<?php
include '../phpQuery/phpQuery/phpQuery/phpQuery.php';  


phpQuery::newDocumentFile('1645');  

//url对应上面名为1645的文件内容,以下为适用优酷的规则
$url = "http://v.youku.com/v_show/id_XNjA0ODAwNzky.html";

$data = array();

//直接获取某类标签的文本，如title
$data['title'] = pq('title')->text();

//获取某标签的属性值，如height，width。手册上说可以，但好像取不到
$data['height'] = pq('div.playArea')->attr("height"); //? height()
$data['width'] = pq('div.playArea')->attr("width");  //?  width()

//获取某标签对象整体，如代表swf视频的标签，现在见到的可能为<video>,可能为<object>
$data['video'] = pq("video#movie_player")->html();  //?
// $data['video'] = pq("object")->html();

//作者简介
$data['text_short'] = pq("div#text_short")->text();

//下面的例子，尝试解析swf文件头，获取flash的原始尺寸，时长及文件大小。文件头格式详情见下面的链接。
//  http://www.cppblog.com/flyinghare/archive/2012/02/23/166312.aspx
// $section = file_get_contents('http://static.youku.com/v1.0.0457/v/swf/loader.swf', NULL, NULL, 0, 29);
// $hanle = fopen("http://static.youku.com/v1.0.0457/v/swf/loader.swf","rb");
// $section = fread($handle, 29);
// print_r($section);
// fclose($handle);

//作者名字
$data['author_name'] = pq(".yk-userinfo div.user-name a")->text();

//作者头像
$data['author_photo'] = pq(".yk-userinfo div.user-photo img")->attr("src");

//视频“顶”的数量
	$up_raw = pq("div#fn_updown div#fn_up *")->attr("title");
	preg_match_all("|\d|", $up_raw, $matches);
$data['up'] = implode($matches['0']);


//视频“踩”的数量
	$up_raw = pq("div#fn_updown div#fn_down *")->attr("title");
	preg_match_all("|\d|", $up_raw, $matches);
$data['down'] = implode($matches['0']);


//视频总播放量： 拼url，发送请求去获取. http://v.youku.com/QVideo/~ajax/getVideoPlayInfo?__rt=1&__ro=&id=151200198&sid=0&type=vv&catid=99
	//从js脚本中可看出参数分别来自哪些变量，/QVideo/~ajax/getVideoPlayInfo",{id:videoId,sid:showid,type:a,catid:catId});
	$urlArr = parse_url($url);
	$domain = $urlArr['host'];
	$script = pq("script")->text();

	//videoID
	$patternV = '/var\svideoId[\s\|=]+[\'|\"]\d+[\'|\"]/';
	preg_match_all($patternV, $script, $mat);
	//从var videoId = '151200198'中解析id出来
	$videoIdStr = $mat['0']['0'];
	preg_match_all("/\d/", $videoIdStr, $videoIdArr);
	$videoId = implode($videoIdArr['0']);

	//showID
	$patternS = '/var\sshowid[\s\|=]+[\'|\"]\d+[\'|\"]/';
	preg_match_all($patternS, $script, $mat);
	$showIdStr = $mat['0']['0'];
	preg_match_all("/\d/", $showIdStr, $showIdArr);
	$showId = implode($showIdArr['0']);

	//catID
	$patternC = '/var\scatId[\s\|=]+[\'|\"]\d+[\'|\"]/';
	preg_match_all($patternC, $script, $mat);
	$catIdStr = $mat['0']['0'];
	preg_match_all("/\d/", $catIdStr, $catIdArr);
	$catId = implode($catIdArr['0']);


	
	$totalPVurl = "http://".$domain."/QVideo/~ajax/getVideoPlayInfo?__rt=1&__ro=&id=".$videoId."&sid=".$showid."&type=vv&catid=".$catId;

	$ret = file_get_contents($totalPVurl);
	preg_match_all("/\d/", substr($ret, 0, strpos($ret, ",")), $vvStr);
	$vv = implode($vvStr['0']);

$data['total_PV'] = $vv;


	echo "<pre>";
	print_r($data);









