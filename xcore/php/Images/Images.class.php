<?php

/*@type: CLASS */
/*@author: JOSE MARIZ MELO */
/*@company: XCHEMA */
/*@release: 18/07/2010 */
/*@updated: 18/07/2010 */
/*@description: Initialize the custom variable values for the website/project */
/*@example: 
**$database = new Configure('title for the website/project', 'lang (default en-US)'); */


//inherited class localization
include_once("./xcore/php/Debug/Debug.class.php");


class Images extends Debug{
	

	function __toString(){
		
		$this->debugMESSAGE('S', 'Help for IMAGES class');
		return '';
		
	}
	
	function __construct($debug=0, $debugphp=0){
		
		if($debug){
			$this->debugSTART($debugphp);
			$this->debugMESSAGE('S', 'IMAGES object created!');
		}
		return '';
	}


	function imagesDOWNLOADCURL($img, $fullpath){
		$ch = curl_init ($img);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	    $rawdata=curl_exec($ch);
	    curl_close ($ch);
	    if(file_exists($fullpath)){
	        unlink($fullpath);
	    }
		$fp = fopen($fullpath,'x');
	    fwrite($fp, $rawdata);
	    fclose($fp);	
	}
	


	//RETURN OBJECTS FROM URL
	function imagesGETIMAGE($img){
	    $ch = curl_init ($img);
	    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
	    curl_setopt($ch, CURLOPT_HEADER, 0);
	    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
	    $rawdata=curl_exec($ch);
	    curl_close ($ch);
	 	return $rawdata;
	}
	
	
	//SAVE FILES ON SPECIFIC LOCATION ON THE CURRENT SERVER
	function imagesSAVEIMAGE($rawdata, $fullpath){
		if(file_exists($fullpath)){
	        unlink($fullpath);
	    }
		$fp = fopen($fullpath,'x');
	    fwrite($fp, $rawdata);
	    fclose($fp);
	}
	
	//GET IMAGE NAMES FROM DOMAIN ADDRESS
	function imagesGETNAME($file, $newname=0){
		
		//separe the path for the image
		$separePATH = explode("/", $file);
		
		//get image name
		$imgPOSITION = count($separePATH);
		
		$imgCURRENT_NAME = $separePATH[$imgPOSITION-1];
		
		//get extension
		$getEXTENSION = explode(".", $imgCURRENT_NAME);
		
		$biggerEXTENSION = explode ("?", $getEXTENSION[1]);
		
		if(!empty($biggerEXTENSION[1]))
			$getEXTENSION[1] = $biggerEXTENSION[0];
		
		
		//check if want replace original name for the image
		if($newname)
			$imgNAME = $newname.'.'.$getEXTENSION[1];
		else
			$imgNAME = $getEXTENSION[0].'.'.$getEXTENSION[1];
			
		
		return $imgNAME;		
		
	}
	
	
	//set the maximum memory available for upload
	function imagesMEMORY($memory = '10')
	{
		ini_set('memory_limit', $memory.'M');	//initialize memory available (default 10mb)
	}
	

}

?>