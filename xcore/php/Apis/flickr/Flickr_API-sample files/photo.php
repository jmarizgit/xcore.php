<?php 

// get photo id from the url
$id = isset($_GET['id']) ? $_GET['id'] : NULL; 

//include the core file
require_once('phpFlickr.php');

// include the config file
require_once('config.php');

// Fire up the phpFlickr class
$f = new phpFlickr($key);

$f->enableCache("fs", "cache");

$photo = $f->photos_getInfo("$id", $secret = NULL);
$photosize = $f->photos_getSizes("$id", $secret = NULL);
$size = $photosize[3];
//$allcontexts = $f->photos_getAllContexts("$id");
$context = $f->photos_getContext("$id");
$photoUrl = $f->buildPhotoURL($photo, "Medium");

//owner of photo
$owner = $photo["owner"]["username"];

if($username == $owner){ ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $photo[title] ?></title>
<link href="styles.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="header">
<h1>phpFlickr Gallery Demo</h1>
</div><!-- end header -->



<div id="photo">
<?php
// The photo's title
echo"<h2>$photo[title]</h2>";

// The photo itself and link to it on Flickr for good measure
echo"<a href=\"http://flickr.com/photos/$username/$photo[id]/\" title=\"View $photo[title] on Flickr \"><img src=\"$photoUrl\" width=\"$size[width]\" height=\"$size[height]\" alt=\"$photo[title]\" /></a>";

// The photo's description
echo"<p>$photo[description]</p>";
?>

</div><!-- end photo -->


<div id="context">
<?php 
if($context['prevphoto']['id']){echo"<a href=\"?id=".$context['prevphoto']['id']."\" title=\"Prev: ".$context['prevphoto']['title']."\"><img src=\"".$context['prevphoto']['thumb']."\" width=\"75\" height=\"75\" /></a>";

} else {

echo"<img src=\"/noimg.png\" width=\"75\" height=\"75\" alt=\"No photo\" class=\"noimg\" />";
};


if($context['nextphoto']['id']){echo "<a href=\"?id=".$context['nextphoto']['id']."\" title=\"Next: ".$context['nextphoto']['title']."\"><img src=\"".$context['nextphoto']['thumb']."\" width=\"75\" height=\"75\" /></a>";
} else {
echo"<img src=\"/noimg.png\" width=\"75\" height=\"75\" alt=\"No photo\" class=\"noimg\" />";
};

//////////// CONTEXT

echo"<p>";
if($context['prevphoto']['id']){echo"<a href=\"?id=".$context['prevphoto']['id']."\" title=\"Prev: ".$context['prevphoto']['title']."\">&laquo; Prev</a>";} else {echo"&laquo; Prev";};
echo" | ";
if($context['nextphoto']['id']){echo"<a href=\"?id=".$context['nextphoto']['id']."\" title=\"Next: ".$context['nextphoto']['title']."\">Next &raquo;</a>";}else {echo"Next &raquo;";};
echo"</p>";
?>
</div><!-- end context -->



<div id="footer">

<p>&laquo; <a href="/">Main gallery</a> | <a href="http://flickr.com/photos/<?php echo $username ?>/<?php echo $photo[id] ?>/">View '<?php echo $photo[title] ?>' on Flickr</a> &raquo;</p>

<p class="note">This product uses the Flickr API but is not endorsed or certified by Flickr.</p>

</div><!-- end footer -->

</body>
</html>

<?php } // end if for if user = owner ?>
