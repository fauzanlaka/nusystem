<?php
session_start();
?>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?
include"connection.php";
$result=mysql_query("select * from login_lec where username_lec='".$_POST["username"]."' and password_lec='".$_POST["password"]."'");
$row=mysql_fetch_array($result);

if(!$row){
	echo"Username and Password ERROR !!!";
	echo"<meta http-equiv=refresh content=2;url=form_login_lec.php>";
}
else{
	$_SESSION["id_lec"] = $row["id_lec"];
	echo"Welcom $row[username_lec]";
	echo"<meta http-equiv=refresh content=2;url=teacher.php>";
	
}
mysql_close($con);
?>
</body>
</html>