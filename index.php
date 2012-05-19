<?php 
/*
	@title: XCORE PHP FRAMEWORK
	@author: MARIZ MELO
	@company: XCHEMA
	@release: 01/10/2011
	@url: http://github.com/jmarizgit/xcore.php 
	@required: xcore/php/xcore.php
*/
//REQUIRED
include('./xcore/php/xcore.php');


//you can set your own messages
$info = new Track();


//load website/project basic configuration
$conf = new Configure();


$data = new Database();


?><!DOCTYPE html>
<html lang="<?=$conf->lang?>">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Cache-Control" content="no-cache"/> 
	
	<!-- MOBILE -->
	<meta name="viewport" content="width=320; initial-scale=1.0; maximum-scale=1.0; user-scalable=0; target-densitydpi=device-dpi"/>
	
	<!-- CHROME FRAME for IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	
	<meta name="description" content="description of your page/system">
	<meta name="keywords" content="keywords list">
	<meta name="author" content="page author name">
	<meta name="publisher" content="page publisher name">
	<meta name="copyright" content="copyright(c) <?=date('Y')?> Project name">
	<meta name="distribution" content="Global">
	<meta name="robots" content="index, follow">
	<meta name="audience" content="all">
	<meta name="revisit-after" content="1 days">
	<meta name="language" content="English">

	<title><?=$conf->title?></title>

	<!-- set your own image -->
	<link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
	
	<!-- insert your own style for the page here -->
	<link rel="stylesheet" type="text/css" href="xcore/css/magritte.css" />
	<link rel="stylesheet" type="text/css" href="xcore/css/blog.css" />

</head>

<body>

	
	<?=$info->debugMESSAGE('S', 'See the <a href="README.txt">README.TXT</a> file for more information, visit the <a href="http://github.com/jmarizgit/xcore.php">gitHUB page for the project</a>. Thank you for using XCORE!')?>
	
	
	<?php include("./xcore/system/blog/index.html"); ?>
	
	
	<!-- SCRIPTS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	<script src="./xcore/js/xcore.js"></script>
	
	
	<!-- DELETE -->
	<script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
	
</body>
</html>
