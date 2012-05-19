<?php
/*
	@type: CONFIGURATION FILE
	@author: MARIZ MELO
	@company: XCHEMA
	@release: 01/11/2011
	@update: 05/18/2012
	@todo:
		migrate documentation to /docs (load using ajax/jquery)
*/


//FRAMEWORK VERSION
$xcore_version = '0.1 beta';


//LOAD CLASSES METHOD
function __autoload($class)
{
	//hold default path for classes on the xcore system
	$classfile = "xcore/php/{$class}/{$class}.class.php";
	
	/*Just automatic loads the class where its exist on 
	  the system or was not loaded before, util to load
	  other classes then xcore classes*/
	if(file_exists($classfile) && !class_exists($class))
		include_once $classfile;	
		
}//__autoload()

?>