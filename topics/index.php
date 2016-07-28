<?php
$d = dir(".");
while (false !== ($entry = $d->read())) {
   if($entry=='.' || $entry=='..' || is_file($entry))
	continue;
   echo '<a href="http://'.$_SERVER['HTTP_HOST'].'/'.$entry.'">'.$entry."</a><br/>\n";
}
$d->close();
