<?php 
//	require '../defines/globals.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style>
body{
	font-family	:Verdana, Arial, Helvetica, sans-serif;
	font-size	:10px;
}
input{
	border	 :1px solid #666666;
	font-size:10px;
}
.input_text{
	width :100px;
}
table{
	border:1px solid #000000;
}
.error{
	margin		:0 auto;
	width		:164px;
	color		:#FF0033;
	text-align	:center;
}
</style>
</head>

<body>
<?php 
//	error_reporting(0);
//	require "stats.php";
?>
<form method="post" action="check.php">
	<div class="error"><?php 
							if(isset($error_mes))
								switch($error_mes){
									case 1: echo "Fill all fields.";break;
									case 2: echo "Wrong Id or Password";break;
								}
					    ?>
    </div>
    <table align="center" border="0">
        <tr>
            <td>Id:</td>
            <td><input type="text" name="nick" class="input_text"></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="pass" class="input_text"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Enter" style="background:#CCCCCC; border-color:#666666"></td>
        </tr>
    </table>
</form>
</body>
</html>
