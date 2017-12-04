<html>
<head>
<title>mypDesktop</title>
<script src='jquery-1.12.4.min.js'></script>

<style>
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
}
</style>

</head>
<body>
<div id="clock" style="float:right;color: white;font-size: 3em;"></div>

<div style='' onclick="openApp('lxterminal');" class="app">Terminal</div>
<div style='' onclick="openApp('~/bin/jango');" class="app">Radio</div>

<script>
$(function() {
	setTimeout(function() {
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
			"data": {"app": app},
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