<?php

//inherited class localization
include_once("./xcore/php/Debug/Debug.class.php");


//CLASS TO DEAL WITH STRINGS
class String extends Debug{
	
	
	//CHECK IF THE VARIABLE IS NULL IN THE SAME FORMAT USED FOR DATABASES
	function stringDBNULL($value){
		if(!$value){
			$new_value = 'NULL';
		}
	else
	{
		$new_value = "'".$value."'";
	}
		return $new_value;
	}


//REMOVE ALL WHITE SPACES IN A STRING
	function stringREMOVESPACES($string){
		
		return preg_replace('/\s+/', '', $string);
		
		$this->debugMESSAGE('S', "White spaces removed from '{$string}'!");
		
	}
	
	
//REMOVE SPACE AND REPLACE WITH '-' (NAME OF PAGES)
	function stringRETURNSPACES($string){
		
		return preg_replace('/\-+/', ' ', $string);
		
		$this->debugMESSAGE('S', "White spaces was restored to '{$string}'!");	
	}
	
	
//REMOVE SPACE AND REPLACE WITH '-' (NAME OF PAGES)
	function stringINCLUDESEPARATOR($string){
		
		return preg_replace('/\s+/', '-', $string);
		
		$this->debugMESSAGE('S', "Separator include on the '{$string}'!");	
	}	

	
//CHECK IF CERTAIN VARIABLE IS SET, IF TRUE WRITE VALUE, NOT DON'T DO ANYTHING
	function stringCHECKWRITE($variable, $value){

		$funcreturn = 0;

		isset($variable) ? $funcreturn = $value : $funcreturn = false;	

		echo $funcreturn;

	}
	
//	REMOVE SPECIAL CHARACTERS FROM STRING
	function stringREMOVESPECIAL($string, $enc = "UTF-8"){

		$special = array(
		'A' => '/&Agrave;|&Aacute;|&Acirc;|&Atilde;|&Auml;|&Aring;/',
		'a' => '/&agrave;|&aacute;|&acirc;|&atilde;|&auml;|&aring;/',
		'C' => '/&Ccedil;/',
		'c' => '/&ccedil;/',
		'E' => '/&Egrave;|&Eacute;|&Ecirc;|&Euml;/',
		'e' => '/&egrave;|&eacute;|&ecirc;|&euml;/',
		'I' => '/&Igrave;|&Iacute;|&Icirc;|&Iuml;/',
		'i' => '/&igrave;|&iacute;|&icirc;|&iuml;/',
		'N' => '/&Ntilde;/',
		'n' => '/&ntilde;/',
		'O' => '/&Ograve;|&Oacute;|&Ocirc;|&Otilde;|&Ouml;/',
		'o' => '/&ograve;|&oacute;|&ocirc;|&otilde;|&ouml;/',
		'U' => '/&Ugrave;|&Uacute;|&Ucirc;|&Uuml;/',
		'u' => '/&ugrave;|&uacute;|&ucirc;|&uuml;/',
		'Y' => '/&Yacute;/',
		'y' => '/&yacute;|&yuml;/',
		'a.' => '/&ordf;/',
		'o.' => '/&ordm;/');

   		return preg_replace($special,
                       array_keys($special),
                       htmlentities($string,ENT_NOQUOTES, $enc));
	}
	
	
//	SHOW ONLY FIRST NAME
	function stringFIRSTNAME($name){
		
		$first = explode(' ', $name);
		
		return $first[0];
	}
	
	
}

?>