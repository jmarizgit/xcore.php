<?php

/*@type: CONFIGURATION FILE */
/*@author: JOSE MARIZ MELO */
/*@company: XCHEMA */
/*@release: 01/11/2011 */
/*@updated: 01/12/2011 */


//LIBRARY VERSION
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
}

?>