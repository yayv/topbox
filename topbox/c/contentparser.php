<?php

include_once("../libraries/simple_html_dom.php");
include_once("commoncontroller.php")

class ContentParser extends CommonController
{

	//将爬虫爬回来的内容解析并存入数据库
	public $html;
	

	public function __construct(){	
	}


	

	public function getContentByUrl($url){

		$this->html = file_get_html($url);
		return $this->html;

	}

	public function getTitle(){
		return $this->html->find('title');
	}

	public function getContent(){
		$body = $this->html->find('body');
		return $body;
	}

	public function isAttributeExist($tag, $attrName,$targetStr){
		if(isset($tag)){

			$regex = <<<EOD
			|$attrName=".*abc"|
EOD;
			preg_match_all($regex, $tag, $targetStr);

			return isset($targetStr);

		}else{
			return false;
		}

	}

	public function getContentType($tag, $attrName){
		if(isAttributeExist($tag, $attrName,$targetStr)){

		}
	}

	public function getAuthor(){

	}


	public function insertData($title, $contentType, $content){

        $sql = "insert into `cake_content` values(".$title.",0,'short name','substract', ".$content.", ".$contentType.",'',0,0,0,0,0,'','source','author','editor');"
        $ret = $this->db->mysql_query($sql);  //??$this->db 能拿到父类的数据库引用么
        return $ret;

	}

}

?>

<html>

<pre>
<?php
	$instance = new ContentParser();
	$content = $instance->getContentByUrl("http://v.youku.com/v_show/id_XNzM1MDk2ODQw.html");
	$title = $instance->getTitle();
	$body = $instance->getContent();
	// $type = $instance->getContentType();

	foreach ($body as $key => $value) {
		$isAttrExist = $instance->isAttributeExist($value,"type");
	}

	echo "Title : ".strip_tags($title[0]);
	// echo "Title : ".strip_tags($body[0]);
	// echo "Content type :".$type;
	echo "Type attr:".$isAttrExist;
?>

</html>

