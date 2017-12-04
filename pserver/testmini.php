<?php

//if($_GET["action"]=="testmini") {
	exec('xwininfo -name "mypDesktop"', $B);	
	$info = implode("\n", $B);
	var_dump($B);
	if(stristr($info, "isUnMapped")) {
		exec('wmctrl -a "mypDesktop" ');
	}	
//}
echo "ok";
?>