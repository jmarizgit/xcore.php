<?php

//inherited class localization
include_once("./xcore/php/Debug/Debug.class.php");

class Languages extends Debug{

	private static $instance; 	//instance of the class
	private $lang;				//selected language	
	
	function __construct($lang=0)
	{			
		//$lang='en-US'
		/*if(file_exists("./xcore/php/Debug/{$lang}.php"))
			include_once("./xcore/php/Debug/{$lang}.php");	*/
		$this->messages['en-US'][] = 'keep login';
		$this->messages['en-US'][] = 'forgot login?';
		$this->messages['en-US'][] = 'your e-mail';
		$this->messages['en-US'][] = 'your password';
		$this->messages['en-US'][] = 'ENTER';

		$this->messages['pt-BR'][] = 'Manter Login';
		$this->messages['pt-BR'][] = 'esqueceu?';
		$this->messages['pt-BR'][] = 'seu e-mail';
		$this->messages['pt-BR'][] = 'sua senha';
		$this->messages['pt-BR'][] = 'ENTRAR';
	}
	
	
	//makes sure we only will have one instance of this object in the all system
	public static function getInstance()
	{
		//if the instance doesn't exist yet
		if(empty(self::$instance))
		{
			//start the object
			self::$instance = new Languages();
		}
		//return instance
		return self::$instance;
	}		
	
	public static function languagesSETLANG($lang)
	{
		$intance = self::getInstance($lang);
		$intance->lang = $lang;
	}
	
	public static function languagesGETLANG()
	{
		$instance = self::getInstance();
		return $instance->lang;
	}
	
	//translate to the language selected
	public function languagesTRANSLATE($word)
	{
		//get the actual instance
		$instance = self::getInstance();
		$key = array_search($word, $instance->messages['en-US']);
		
		//get language
		$language = self::languagesGETLANG();
		//return word translated
		//vector indexed per language and key
		return $instance->messages[$language][$key];
	}
	
	
}

?>