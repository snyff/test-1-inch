<?php
	$HOST = "localhost";
	$USER = "root";
	$PASS = "";
	$NAME = "diets";
	mysql_connect($HOST, $USER, $PASS) or die(mysql_error());
	mysql_select_db($NAME) or die(mysql_error());
?>