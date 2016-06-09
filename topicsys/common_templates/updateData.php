<?php
function getGroupThreads($groupid,$start,$num){
	$url = "http://www.lvren.cn/plugins/group/data_thread.php?g=$groupid&s=$start&m=$num";
	$content = file_get_contents($url);
	$objs = json_decode($content);
	return $objs;
}

$now = time();
$fileinfo = stat('templates_c/data.dump');
$data = @unserialize(file_get_contents('templates_c/data.dump'));

if($now-$fileinfo['ctime']>60*5 || !isset($data['qun'])) 
{
	$group = getGroupThreads(105, 0, 100);
	$str1 = serialize($group);
	$str2 = serialize($data['qun']);

	if($str1!=$str2)
	{
		$data['qun'] = $group;
		file_put_contents('templates_c/data.dump', serialize($data));
		echo '{"ret":1, "msg":"ok", "reload":true}';
	}
	else
		echo '{"ret":0, "msg":"ok", "reload":false}';
}
else
	echo '{"ret":0, "msg":"ok", "reload":false}';

/*
	<script type='text/javascript' src='/js/jquery-1.3.2.js'></script>
	<script type='text/javascript'>
	$(document).ready(function(){
		$.getJSON('updateData.php',function(ajax){
			if(ajax.reload)
				window.location.reload();
		});
	});
	</script>
*/