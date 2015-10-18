<?php 
session_start();
if(!isset($_SESSION["id_lec"])){
	header("location:login_form.php");//ย้ายไปยังหน้าหลัก
}
    ?>
    <?
include"connect.php";
	
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<form name="form1" method="post" action="">
  <table width="100%" border="1" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="5"><table width="100%" border="1" cellspacing="0" cellpadding="0">
        <tr>
          <td width="19%" rowspan="2"><img src="imag/Untitled-7.jpg" alt="" width="200" height="700" border="0" usemap="#Map2Map"></td>
          <td width="69%" height="49">&nbsp;</td>
          <td width="4%">&nbsp;</td>
          <td width="4%">&nbsp;</td>
          <td width="4%">&nbsp;</td>
        </tr>
        <tr>
          <td colspan="4">&nbsp;</td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </table>
        <p>&nbsp;</p>
        <p>&nbsp;</p></td>
    </tr>
  </table>
  <map name="Map2Map">
    <area shape="rect" coords="7,142,168,187" href="form_login.php">
    <area shape="rect" coords="10,365,164,408" href="logout.php">
    <area shape="rect" coords="8,315,163,352" href="record.php">
  </map>
  <map name="Map">
    <area shape="rect" coords="7,143,168,187" href="form_login.php">
    <area shape="rect" coords="11,368,164,408" href="logout.php">
  </map>
</form>

<map name="Map2">
  <area shape="rect" coords="7,142,168,187" href="form_login.php">
  <area shape="rect" coords="10,365,164,408" href="logout.php">
</map>
</body>
</html>