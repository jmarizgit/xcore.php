<?php

/*@type: CLASS */
/*@author: JOSE MARIZ MELO */
/*@company: XCHEMA */
/*@release: 18/07/2010 */
/*@updated: 18/07/2010 */
/*@description: Deal with server and cross server requests */
/*@example: 
**$database = new Server(); */


//inherited class localization
include_once("./xcore/php/Debug/Debug.class.php");


class Server extends Debug{

	function __toString(){
		
		$this->debugMESSAGE('S', 'SERVER class load successfuly!');
		return '';
		
	}	
	
	function serverREQUEST($url)
	{
	
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		$data = curl_exec($ch);
		curl_close($ch);
		
		return $data;	
		
	}	

}

?>