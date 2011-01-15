<?php

//inherited class localization
include_once("./xcore/php/Debug/Debug.class.php");

class Forms extends Debug{
	
	function __toString(){
	
		//copyrights, don't change the credits
		$HELP  = '	<br /><div>';
		$HELP .= '	<b>type:</b>		FORMS Class <br />';
		$HELP .= '	<b>author:</b>		Mariz Melo <br />';
		$HELP .= '	<b>released:</b>	10-03-2010 <br />';
		$HELP .= '	<b>description:</b>	<i>"Provide methods to control SESSIONS and security on the application/site"</i> <br />';
		$HELP .= '	<br />';
		$HELP .= '		REQUIREMENTS<br />';
		$HELP .= '		//crate a instance of the class Security<br />';
		$HELP .= '			ex: $instance_var = new Security(); <br />';
		$HELP .= '	<br />';
		$HELP .= '		METHOD: <b>securitySETSESSION</b>( (string) session name/id, (bool) 1 - close session, (int) minutes before close session ) <br />';
		$HELP .= '			//initialize or destroy the session passed as argument<br />';
		$HELP .= '			ex1: $instance_var->securitySETSESSION("sessionName"); //starting the session<br />';
		$HELP .= '			ex2: $instance_var->securitySETSESSION("sessionName", 1); //finishing the session<br />';
		$HELP .= '	</div>';
		
		
		//if the debug system is activated - see: ./xcore/php/Debug/Debug.class.php
		$this->debugMESSAGE('H', $HELP); //show help message
		 
		return '';
		
	}

//	VALIDADE FIELDS (ISSET)
	function formsVALIDATEPOST($array=0, $type='gt'){		//receive an array with the name for the fields, type (gt = get, pt = post)

		if(is_array($array)):
			$validated = '';
			foreach($array as $key){
				!isset($_POST[$key]) ? $_POST[$key] = false : false;
				$validated .= $key.'<br />';
			}
				
			$this->debugMESSAGE('S', 'Fields validated:<br />'.$validated);
		else:
			
			$this->debugMESSAGE('E', 'Your must inform an array!');
			return 0;
		
		endif;
	}
	

//	VALIDADE FIELDS (ISSET)
	function formsVALIDATEBOTH($array=0, $type='gt'){		//receive an array with the name for the fields, type (gt = get, pt = post)

		if(is_array($array)):
			$validated = '';
			foreach($array as $key){
				!isset($_REQUEST[$key]) ? $_REQUEST[$key] = false : false;
				$validated .= $key.'<br />';
			}
				
			$this->debugMESSAGE('S', 'Fields validated:<br />'.$validated);
		else:
			
			$this->debugMESSAGE('E', 'Your must inform an array!');
			return 0;
		
		endif;
	}	
	
	
	
//	VERIFY IF THE FIELD IS NULL OR NOT	
	function formsNOTNULL($field){
		//if the field is equal to null or ''
	}
	
//	COMPARE THE CONTENT OF TWO FIELDS	
	function formsCOMPARE($field, $value){
		if($field == $value):
			$this->debugMESSAGE('S', 'Fields {$field} and {$value} validated!');
			return true;
		else:
			$this->debugMESSAGE('E', "Fields {$field} and {$value} are not equal!");
			return false;
		endif;
	}

	
//	VALIDATE EMAIL ADDRESSES
	function formsVALIDEMAIL($email)
	{
		//problem verifying this: mm@kjdldasd9989.com WHY?
		
	   $isValid = true;
	   $atIndex = strrpos($email, "@");
	   if (is_bool($atIndex) && !$atIndex)
	   {
	      $isValid = false;
	   }
	   else
	   {
	      $domain = substr($email, $atIndex+1);
	      $local = substr($email, 0, $atIndex);
	      $localLen = strlen($local);
	      $domainLen = strlen($domain);
	      if ($localLen < 1 || $localLen > 64)
	      {
	         // local part length exceeded
	         $isValid = false;
	      }
	      else if ($domainLen < 1 || $domainLen > 255)
	      {
	         // domain part length exceeded
	         $isValid = false;
	      }
	      else if ($local[0] == '.' || $local[$localLen-1] == '.')
	      {
	         // local part starts or ends with '.'
	         $isValid = false;
	      }
	      else if (preg_match('/\\.\\./', $local))
	      {
	         // local part has two consecutive dots
	         $isValid = false;
	      }
	      else if (!preg_match('/^[A-Za-z0-9\\-\\.]+$/', $domain))
	      {
	         // character not valid in domain part
	         $isValid = false;
	      }
	      else if (preg_match('/\\.\\./', $domain))
	      {
	         // domain part has two consecutive dots
	         $isValid = false;
	      }
	      else if(!preg_match('/^(\\\\.|[A-Za-z0-9!#%&`_=\\/$\'*+?^{}|~.-])+$/', str_replace("\\\\","",$local)))
	      {
	         // character not valid in local part unless 
	         // local part is quoted
	         if (!preg_match('/^"(\\\\"|[^"])+"$/',
	             str_replace("\\\\","",$local)))
	         {
	            $isValid = false;
	         }
	      }
	      
	      /* SOMETHING WRONG HERE
	      if ($isValid && !(checkdnsrr($domain,"MX") || checkdnsrr($domain,"A")))
	      {
	         // domain not found in DNS
	         $isValid = false;
	      }*/
	   }
	   return $isValid;
	   
	}
	
	
	
	/*
	//DEAL WITH THE REMEMBER LOGIN SYSTEM (COOKIES)
	//expire here is in DAYS not in minutes
	function securityREMEMBERLOGIN($rememberlogin, $rememberpassword, $expire=30){
		
		if( !isset($_SESSION[$xsession]) && !isset($_COOKIE[$xsession]) ){
			
			$cookie_user = ;
			$cookie_password = ;
			
			$cookie_time = (3600 * 24 * $expire);
			
		}//end: if
			
		
	}//end: securityREMEMBERLOGIN()
	*/
	

}

?>