<html>
<head>
<title>mypDesktop</title>
<script src='jquery-1.12.4.min.js'></script>

<style>
* {
	font-family: verdana,sans-serif;
}
body {
    background: url(bg.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}
.app {
	padding: 5px;
	background-color: rgba(255,255,255,0.5);
	color: black;
	border-radius: 5px;
	cursor: pointer;
	float:left;
	margin: 0px 5px 5px 0;
	text-align: center;
}
.htmlbox {
	float:left;
	margin: 0px 5px 5px 0;
}
.whitelink {
	color: white;
	text-decoration: none;
}
</style>

</head>
<body>
<div id="clock" style="float:right;color: white;font-size: 3em;"></div>

<div>
	<form method="post" onsubmit="openApp($('#command').val());return false;">
		<input type="text" id="command" value="" placeholder="command" style="width:250px;"> <input type="submit" value="exec">
	</form>
</div>

<?php
$config = array();
if(file_exists(__DIR__.'/../config.json')) {
	$config = json_decode(file_get_contents(__DIR__.'/../config.json'), true);
}
foreach($config as $nr => $line) { ?>
	
	<?php if($line["type"]=="clear") { ?>
		<div style="clear:both;"></div>
	<?php } ?>
	
	<?php if($line["type"]=="app") { ?>
		<div style='' onclick="openApp(apps[<?= $nr;?>].command);" class="app">
			<?php if($line["icon"]!="") { ?>
				<img src='<?= $line["icon"];?>'><br>
			<?php } ?>
			<?= $line["title"];?>
		</div>
	<?php } ?>
	
	<?php if($line["type"]=="html") { ?>
		<div class='htmlbox' style='width:<?= $line["width"];?>px;height:<?= $line["height"];?>px;overflow:hidden;'>
		<?php if(file_exists(__DIR__."/../".$line["src"])){  include __DIR__."/../".$line["src"]; } ?>
		</div>
	<?php } ?>
<?php } 
?>

<!--
<div style='' onclick="openApp('lxterminal');" class="app">Terminal</div>
<div style='' onclick="openApp('~/bin/jango');" class="app">Radio</div>
-->

<script>

var apps = <?= json_encode($config); ?>;

$(function() {
	setTimeout(function() {
		//return;
		$.ajax({
			"url": "setback.php?dat=<?= time();?>",
			"dataType": "html"
			});
		
	}, 1000);
	
	setInterval(function() {
		$.ajax({
			"url": "testmini.php?dat="+(new Date()).getTime(),
			"dataType": "html"
		});
	}, 1000);
	
	setInterval(function() { zeit();}, 1000);
});

function openApp(app) {
		$.ajax({
			"url": "openapp.php?dat="+(new Date()).getTime(),
			"type": "post", 
			"data": {"command": app},
			"dataType": "html"
		});
}

function zeit() {
	var html = "";
	var d  = new Date();
	html = d.getHours()+":"+add0(d.getMinutes())+":"+add0(d.getSeconds());
	$('#clock').html(html);
}

function add0(x) {
		if(x<10) return "0"+x;
		return x;
	}

</script> 