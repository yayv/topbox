
<?php
class hook{

public function processData($static, $dynamic){
	$json = file_get_contents("v/_run/json_proid".$projectid);

	$arr = json_decode($json);
	echo "<pre>";
	print_r($arr);
	
}
}

?>
