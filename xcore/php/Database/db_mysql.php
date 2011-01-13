<?php

	function db_connect($db) {
	
		global $xdebug;
		
		$oCon = mysql_connect($db['url'], $db['user'], $db['pass']);
		if(!$oCon){
			return 0;
		}else{

			if(db_select_db($db['database']))
				return $oCon;
			else	
				return 0;
		}
	}

	function db_select_db($sDatabase) {
		if(mysql_select_db($sDatabase))
			return 1;
	}

	function db_query($sSQL) {
		$oStmt = mysql_query($sSQL);
		return $oStmt;
	}

	function db_colnum($oStmt) {
		return mysql_num_fields($oStmt);
	}
	
	//add jan 2011, count number of rows
	function db_numrows($oStmt) {
		return mysql_num_rows($oStmt);
	}

	function db_columnName($oStmt,$iPos) {
		return mysql_field_name($oStmt,$iPos-1);
	}
	
	function db_columnType($oStmt,$iPos) {
		return mysql_field_type($oStmt,$iPos-1);
	}

	function db_fetch($oStmt) {
		//return mysql_fetch_array($oStmt);		//modified in Oct 31 2010 - MARIZ MELO	
		return mysql_fetch_assoc($oStmt);
	}

	function db_free($oStmt) {
		return mysql_free_result($oStmt);
	}

	function db_disconnect($oCon) {
		return mysql_close($oCon);
	}
	
?>
