<?php 

/*@type: XCORE PHP FRAMEWORK */
/*@author: MARIZ MELO */
/*@company: XCHEMA */
/*@release: 01-10-2011 */
/*@url: http://github.com/jmarizgit/XCORE */
/*@required: xcore/php/xcore.php */

//REQUIRED
include('xcore/php/xcore.php');

//load website/project basic configuration
$conf = new Configure();
//echo $conf; //try uncomment this line

$info = new Track(1,1);


?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?=$conf->lang?>" lang="<?=$conf->lang?>">
<head>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="Cache-Control" content="no-cache"/> 
	
	<meta name="description" content="description of your page/system">
	<meta name="keywords" content="keywords list">
	<meta name="author" content="page author name">
	<meta name="publisher" content="page publisher name">
	<meta name="copyright" content="copyright(c) 2011 Project name">
	<meta name="distribution" content="Global">
	<meta name="robots" content="index, follow">
	<meta name="audience" content="all">
	<meta name="revisit-after" content="1 days">
	<meta name="language" content="English">

	<title><?=$conf->title?></title>
	
	<!-- INSERT YOUR LOCAL IP/folder_to_your_root_project, ONLINE, insert your website address -->


	<!-- set your own image -->
	<link rel="shortcut icon" href="xcore/img/favicon.ico" type="image/x-icon" />
	
	<!-- insert your own style for the page here -->
	<link rel="stylesheet" type="text/css" href="xcore/css/styles.css" />

</head>

<body> 
	
	<?=$info->debugMESSAGE('S', 'See the <a href="README.txt">README.TXT</a> file for more information, visit the <a href="http://github.com/jmarizgit/XCORE"><i>gitHUB page for the project</i></a>. Thank you for using XCORE!')?>
	<!-- JUST DELETE THIS LINE -->

	<div id="content">
		<div id="version">
			<h2>V0.1b</h2>
		</div>
	</div>
	
	<div id="footer" class="align_center">Created by <a href="http://www.emoriz.com">Mariz Melo.</a></div>
	
</body>

</html>
