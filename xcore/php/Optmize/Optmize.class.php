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


class Optmize extends Debug{

	function __construct($debug){
		
		if($debug){
			$this->debugSTART();
			$this->debugMESSAGE('S', 'OPTMIZE class loaded successfuly!');
		}
		return '';
		
	}	
	
	
	
	//START THE MINIFY SYSTEM (put before all HTML file that you want minify)
	function optmizeHTML_START(){
		
		function minifyHTML($buffer)
		{
		    $search = array(
		        '/\>[^\S ]+/s', //strip whitespaces after tags, except space
		        '/[^\S ]+\</s', //strip whitespaces before tags, except space
		        '/(\s)+/s',  // shorten multiple whitespace sequences
		        '/<!--(.|\s)*?-->/'
		        );
		    $replace = array(
		        '>',
		        '<',
		        '\\1',
		        ''
		        );
		        
		  $buffer = preg_replace($search, $replace, $buffer);
		  return $buffer;
		}
		
		
		ob_start("minifyHTML");
	}
	
	//FINISH MINIFICATION OF THE PAGE (put after </html> tag)
	function optmizeHTML_END(){
		ob_end_flush();
	}
	
	

}

?>