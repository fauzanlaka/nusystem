<?php 
session_start();
if(!isset($_SESSION["id"])){
	header("location:form_login.php");//ย้ายไปยังหน้าหลัก
}
    ?>
    <?
include"connection.php";
	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="">
</form>
</body>
</html>