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
$result=mysql_query("select * from login where username='".$_POST["username"]."' and password='".$_POST["password"]."'");
$row=mysql_fetch_array($result);

if(!$row){
	echo"Username and Password ERROR !!!";
	echo"<meta http-equiv=refresh content=2;url=form_login.php>";
}
else{
	$_SESSION["id"] = $row["id"];
	echo"Welcom $row[username]";
	echo"<meta http-equiv=refresh content=2;url=admin.php>";
	
}
mysql_close($con);
?>
</body>
</html>