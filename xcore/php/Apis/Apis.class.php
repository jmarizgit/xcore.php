<?php

//inherited class localization
include_once("./xcore/php/Debug/Debug.class.php");

class Apis extends Debug{
	
	function __toString(){
	
		//copyrights, don't change the credits
		$HELP  = '	<br /><div>';
		$HELP .= '	<b>type:</b>		API Class <br />';
		$HELP .= '	<b>author:</b>		Mariz Melo <br />';
		$HELP .= '	<b>released:</b>	10-23-2010 <br />';
		$HELP .= '	<b>description:</b>	<i>"give access to third-part systems APIS"</i> <br />';
		$HELP .= '	<br />';
		$HELP .= '		REQUIREMENTS<br />';
		$HELP .= '		//create a instance of the class Apis<br />';
		$HELP .= '			ex: $instance_var = new Apis(); <br />';
		$HELP .= '	<br />';
		$HELP .= '		METHOD: <b>securitySETSESSION</b>( (string) session name/id, (bool) 1 - close session, (int) minutes before close session ) <br />';
		$HELP .= '			//initialize or destroy the session passed as argument<br />';
		$HELP .= '			ex1: $instance_var->securitySETSESSION("sessionName"); //starting the session<br />';
		$HELP .= '			ex2: $instance_var->securitySETSESSION("sessionName", 1); //finishing the session<br />';
		$HELP .= '	</div>';
		
		
		//if the debug system is activated - see: ./xcore/php/Debug/Debug.class.php
		$this->debugMessage('H', $HELP); //show help message
		 
		return '';
		
	}
	
	
	function __construct($debug=0,$debugphp=0){
		
		if($debug){
			$this->debugSTART($debugphp);
			$this->debugMESSAGE('S', 'API object created!');
		}
		return '';
		
	}

	//LOAD THE REQUIRED API
	function apisLOAD($api=0)
	{	
		if($api)
			switch ($api){
				case 'facebook':
								include_once './xcore/php/Apis/facebook/facebook.php';	
								$this->debugMessage('S', 'FACEBOOK API included!'); //show help message
								break;
				case 'flickr':
								include_once './xcore/php/Apis/flickr/phpFlickr.php';
								$this->debugMessage('S', 'FLICKR API included!'); //show help message
								break;
				case 'amazon':
								include_once './xcore/php/Apis/amazon/S3.php'; //change this for subclass, amazon.php calling S3.php (from amazon)
								$this->debugMessage('S', 'AMAZON API included!'); //show help message
								break;
			}
		else
			return 0;
		
	}

}

?>