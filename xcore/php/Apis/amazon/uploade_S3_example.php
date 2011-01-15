<?php

require_once("S3.php");

/* AWS access info to MARIZ SERVER
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJ5BGHXSSTBKFHUBQ');  
if (!defined('awsSecretKey')) define('awsSecretKey', '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'); 
*/

//AWS access info to GARY SERVER
//access url: http(s)://s3-us-west-1.amazonaws.com/newschalk/user_images/
if (!defined('awsAccessKey')) define('awsAccessKey', 'AKIAJ6Z7QRMTXPMTV3TQ');  
if (!defined('awsSecretKey')) define('awsSecretKey', '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');

$s3 = new S3(awsAccessKey, awsSecretKey); 

$s3->putBucket("newschalktemp", S3::ACL_PUBLIC_READ); 

if ($s3->putObjectFile('newschalk_logo.gif', "newschalktemp", 'test.gif', S3::ACL_PUBLIC_READ)) {  
    echo "We successfully uploaded your file.";  
}else{  
    echo "Something went wrong while uploading your file... sorry.";  
}  

?>