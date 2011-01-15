<?php 

// For paging the thumbnails, get the page we are on
// if there isn't one - we are on page 1
$page = isset($_GET['page']) ? $_GET['page'] : 1;

//include the core file
require_once('phpFlickr.php');

// include the config file
require_once('config.php');

// Fire up the phpFlickr class
$f = new phpFlickr($key);

// phpFlickr needs a cache folder
// in this case we have a writable folder on the root of our site, with permissions set to 777
$f->enableCache("fs", "cache");

//returns an array
$result = $f->people_findByUsername($username);

// grab our unique user id from the $result array
$nsid = $result["id"];

// Get the user's public photos and show 21 per page
//$page at the end specifies which page to start on, that's the page number ($page) that we got at the start
$photos = $f->people_getPublicPhotos($nsid, NULL, NULL, 21, $page);

// Some bits for paging
$pages = $photos[photos][pages]; // returns total number of pages
$total = $photos[photos][total]; // returns how many photos there are in total
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>phpFlickr Gallery Demo</title>
<link href="styles.css" rel="stylesheet" type="text/css">

</head>

<body>
<div id="header">
<h1><a href="/">phpFlickr Gallery Demo</a></h1>
</div>
<div id="thumbs">
<?php
	foreach ($photos['photos']['photo'] as $photo) {
   
         echo "<a href=\"photo.php?id=$photo[id]\" title=\"View $photo[title]\">";
	 // this next line uses buildPhotoURL to construct the location of our image 
	   echo "<img alt=\"$photo[title]\" ".
            "src=\"" . $f->buildPhotoURL($photo, "Square") . "\" width=\"75\" height=\"75\" />";
        echo "</a>\n";

} // end loop

?>
</div><!-- end thumbs -->

<!-- Paging -->
<p id="nav">
<?php
// Some simple paging code to add Prev/Next to scroll through the thumbnails
$back = $page - 1; 
$next = $page + 1; 

if($page > 1) { 
echo "<a href='?page=$back'>&laquo; <strong>Prev</strong></a>"; 
} 
// if not last page
if($page != $pages) { 
echo "<a href='?page=$next'><strong>Next</strong> &raquo;</a>";} 
?>
</p>

<?php
// a quick bit of info about where we are in the gallery
echo"<p>Page $page of $pages</p>";
echo"<p class=\"note\">$total photos in the gallery</p>";

?>

<div id="footer">

<p class="note">This product uses the Flickr API but is not endorsed or certified by Flickr.</p>

</div>

</body>
</html>
