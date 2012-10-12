<?php
///////////////////////////////////////////////////////////////////////////////////////
// PHPizabi 0.848b C1 [ALICIA]                               http://www.phpizabi.net //
///////////////////////////////////////////////////////////////////////////////////////
// Please read the license.txt file before using / modifying this software           //
// Original author:         Claude Desjardins, R - feedback@realitymedias.com        //
// Last modification date:  August 13th 2006                                         //
// Version:                 PHPizabi 0.848b C1                                       //
//                                                                                   //
// (C) 2005, 2006 Real!ty Medias / PHPizabi - All rights reserved                    //
///////////////////////////////////////////////////////////////////////////////////////

	/* Check Structure Availability */
	if (!defined("CORE_STRAP")) die("Out of structure call");

	function myConnect() { // MYSQL Database connection //
		global $CONF;

		$GLOBALS["MYSQL_CONNECTION"] = @mysql_connect(
			$CONF["MYSQL_DATABASE_HOSTNAME"], 
			$CONF["MYSQL_DATABASE_USERNAME"], 
			$CONF["MYSQL_DATABASE_PASSWORD"]
		);
		
		if (@!mysql_select_db($CONF["MYSQL_DATABASE_DATABASENAME"]));// die(mysql_error());
mysql_query("SET NAMES 'utf8'");

	}
	
	function myQ($content) {
		global $CONF;
		
		//echo $content;
		
		if (!isset($GLOBALS["MYSQL_CONNECTION"]) or !$GLOBALS["MYSQL_CONNECTION"]) myConnect();
		return mysql_query(str_replace("[x]", $CONF["MYSQL_DATABASE_TABLES_PREFIX"], $content)); 
	}
	
	function myF($content) {
		if (!isset($GLOBALS["MYSQL_CONNECTION"]) or !$GLOBALS["MYSQL_CONNECTION"]) myConnect();
		
		return mysql_fetch_array($content);
	}
	
	function myNum($content) {
		if (!isset($GLOBALS["MYSQL_CONNECTION"]) or !$GLOBALS["MYSQL_CONNECTION"]) myConnect();
		return mysql_num_rows($content);
	}
	
	function myClose() {
		return @mysql_close();
	}
?>