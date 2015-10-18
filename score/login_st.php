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
$result=mysql_query("select * from login_st where username_st='".$_POST["username"]."' and password_st='".$_POST["password"]."'");
$row=mysql_fetch_array($result);

if(!$row){
	echo"Username and Password ERROR !!!";
	echo"<meta http-equiv=refresh content=2;url=form_login_st.php>";
}
else{
	$_SESSION["id_st"] = $row["id_st"];
	echo"Welcom $row[username_st]";
	echo"<meta http-equiv=refresh content=2;url=student.php>";
	
}
mysql_close($con);
?>
</body>
</html>