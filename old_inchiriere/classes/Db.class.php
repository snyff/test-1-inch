<?php
	@include_once '../../conf/constants.inc.php';
	@include_once '../conf/constants.inc.php';
	class Db {
		private $res;
		private $link;
		
		public function __construct(){
			$this->link = mysql_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS) or die(mysql_error());
			mysql_select_db(DATABASE_NAME) or die(mysql_error());
//			mysql_query("SET NAMES 'utf8'");
		}
		
		public function query($value) {
//			mysql_query("set character_set_client='utf8'"); 
//			mysql_query("set character_set_results='utf8'"); 
//			mysql_query("set collation_connection='utf8_unicode_ci'");
			$this->res = mysql_query($value) or die(mysql_error().'<br/>'.$value);
			$GLOBALS['backtrace']->sql[] = $value;
			return $this->res;
		}
		
		public function getNextRow(){
			return mysql_fetch_array($this->res);
		}
		
		public function lastId(){
			return mysql_insert_id($this->link);
		}
		
		public function getNumRows() {
			return mysql_num_rows($this->res);
		}
		
		
	}
?>