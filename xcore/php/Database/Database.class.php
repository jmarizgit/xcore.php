<?php

class Database extends Debug{
	
	//attributes
	private $url 		= 'localhost';
	private $user 		= 'root';
	private $pass		= 'root';
	private $database 	= 'dbname';
	private $sgdb 		= 'mysql';
	private $dbconnection;		


	//help about how to use the class
	function __toString(){

		/*HELP instructions*/
		$HELP  = '	<br />';
		$HELP .= '	<b>type:</b>		DATABASE Class <br />';
		$HELP .= '	<b>author:</b>		Mariz Melo <br />';
		$HELP .= '	<b>released:</b>	08-25-2008 <br />';
		$HELP .= '	<b>description:</b>	<i>"Provide methods to connect applications with databases"</i> <br />';
		$HELP .= '	<br />';
		$HELP .= '	<b>instructions:</b><br />';
		$HELP .= '		VARIABLES:<br />';
		$HELP .= '			<b>localhost:</b> Hold the localization for the database (local computer usually \'localhost\', online \'database.domain.com\');<br />';
		$HELP .= '			<b>user:</b> Username with access to the database<br />';
		$HELP .= '			<b>pass:</b> The user password to access the database;<br />';
		$HELP .= '			<b>database:</b> The name of the database that you want to access;<br />';
		$HELP .= '			<b>sgdb:</b> Database system manager that you want to use (default is mysql);<br /><br />';
		$HELP .= '		METHOD: <b>databaseSELECT</b>( (string) SQL select query ) <br />';
		$HELP .= '			//return an array with results from a SELECT query or 0 (if did not found anything)<br />';
		$HELP .= '			ex: $myselect = $database->databaseSELECT("SELECT * FROM tablename");<br />';
		$HELP .= '<br />';
		$HELP .= '		METHOD: <b>databaseMODIFY</b>() <br />';
		$HELP .= '			//used for INSERT, UPDATE, or DELETE queries. Just return the value 0 if the request fail, otherwise return an \'ARRAY\' with the results.<br />';
		$HELP .= '			ex : $myinsert = $database->databaseMODIFY("INSERT INTO tablename (column) VALUES (value) WHERE column = some_value");<br />';
		$HELP .= '			ex2: $myupdate = $database->databaseMODIFY("UPDATE tablename SET column = value WHERE column = value2");<br />';
		$HELP .= '			ex3: $mydelete = $database->databaseMODIFY("DELETE FROM tablename WHERE column = value");<br />';
		
		//if the debug system is activated - see: ./xcore/php/Debug/Debug.class.php
		$this->debugMESSAGE('H', $HELP); //show help message
		
		return '';
	
	}
	
	
	//Stabilish connection with database server.
	function __construct($debug=0, $debugphp=0){		
		
		if($debug) $this->debugSTART($debugphp);	//fix the overwriting over the debug constructor method
		
		//creates an array with the values
		$db = array('url'=>$this->url, 'user'=>$this->user, 'pass'=>$this->pass, 'database'=>$this->database, 'interface'=>'INTERFACE', 'sgdb'=>$this->sgdb);
		
		//verify which database system will be used and includes the especific library for it
		switch($db['sgdb']){
			case 'mysql':	include_once('xcore/php/Database/db_mysql.php');
							break;
							
			case 'oracle':	include_once('xcore/php/Database/db_oracle.php');
							break;
							
			case 'interbase':	include_once('xcore/php/Database/db_interbase.php');
							break;
							
			case 'firebird':	include_once('xcore/php/Database/db_firebird.php');
							break;
							
			case 'sqlserver':	include_once('xcore/php/Database/db_sqlserver.php');
							break;
							
			case 'sqllite':	include_once('xcore/php/Database/db_sqllite.php');
							break;
		}


		$this->dbconnection = db_connect($db);	//assign the connection object to the class attribute (can be used in other methods)
		

		
		//DEBUG		
		if($this->dbconnection)
			$this->debugMESSAGE('S', 'Database successfuly <b>connected</b>!');
		
	}
	
	

	//Free query used in query.
	function databaseFREE($query){
		
		db_free($query);	//free the database
		
	}



	//destroy object and close the database connection
	function __destruct(){
	
		//if exist a connection on the attribute variable see "connectDB" method
		if($this->dbconnection){
			
			//db_disconnect($this->dbconnection);	//disconnect from the database	//no longer necessary (but kept the disconnect message)
			
			$this->debugMESSAGE('S', 'Database successfuly <b>disconnected</b>!<br />'); //show debug message
				
		}else{
			
			$this->debugMESSAGE('E', 'Database connection has not been initialized!<br />');	//show debug message
			
		}
		
		
	} //end: method
	
	
	
	

	//used for select request to the database
	public function databaseSELECT($sql){		
		
		if($this->dbconnection){	
			
			//start: if sql
			if(isset($sql)){
	
			
				$myquery = db_query($sql, $this->dbconnection);	//select data from the database
				
				
				//start: if return data
				if( isset($myquery) ){
						
					//debug system
					$this->debugMESSAGE('S', "Database request <b>executed</b>!<br /><i>\"{$sql}\"</i>");  //show debug message
		
					
					//start: if did found any record
					if($myquery != 0){
						
						$numrows = db_rowRows($myquery);	//get number of rows returned
						
						//if the number was NOT equal 0
						if($numrows != 0){
							
							$counter = 0;
							
							while($row = db_fetch($myquery)){
								
								$resultarray[$counter] = $row;
								
								$counter++;
							
							}
						}
						
						$this->databaseFREE($myquery); //free the query request
						
					}//end: if did found any record
						
					//if we have an array with record lines
					if(isset($resultarray)){			
						return $resultarray;	//return the array
						$this->debugMESSAGE('S', "Your request DID NOT returned the follow values:<br />".print_r($resultarray));
					}else{
						$this->debugMESSAGE('E', "Your request DID NOT returned any value"); //otherwise return 0
						return 0;
					}
		
				}
				else
				{
					//if did NOT found any data
					//check debug system	
					$this->debugMESSAGE('E', "Your request did <b>not</b> returned any value<br /><i>\"{$sql}\"</i>"); //show debug message
					
					return 0; //return 0
					
				} //start: if return data
				
				
			}else{
				//check debug system
				$this->debugMESSAGE('E', 'Missing argument SQL query required for this method'); //show debug message			
			}
			
		}else{ return 0; }//end: check connection
	
	
	}//end: method
	




	//use for insert, update, or delete (necessary because this don't need count the number of return records)
	public function databaseMODIFY($sql){	
		
		if($this->dbconnection){
			
			//check if the argument was informed
			if(isset($sql)){
				
				//try process the sql query
				$myquery = db_query($sql, $this->dbconnection);
			
				//if could do it
				if($myquery){
					//check debug system
					$this->debugMESSAGE('S', "Database request <b>executed</b>!<br /><i>\"{$sql}\"</i>");	//show debug message
					return 1;
		
				}
				else
				{
					//check debug system
					$this->debugMESSAGE('E', "Your request COULD NOT be completed!<br /><i>\"{$sql}\"</i>"); //show debug message
					
					return 0; //return 0
				}
			
			}else{
			
				//check debug system
				$this->debugMESSAGE('E', 'Missing argument SQL query required for this method'); //show debug message	
				
			}
		
		}else{ return 0; }//end: check connection
		
	}//end: method
	
	
	//CREATE METHOD TO DEAL WITH PERSISTENT CONNECTION (EX: mysql_pconnect)<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	
	
	//CREATE METHOD TO DEAL WITH SQL INJECTION <<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<
	
	
		
}//end CLASS



?>