<?php
    include_once('connect.php');
    
    $username = mysqli_real_escape_string($con, $_POST['txtUsername']);
    $password = mysqli_real_escape_string($con, $_POST['txtPassword']);
    
    $sql = "SELECT count(*) FROM users WHERE (u_username='$username' AND u_password='$password')";
    $res = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($res);
    
    if($row[0] > 0){
        $strSQL = "SELECT * FROM users WHERE u_username = '".$username."' and u_password = '".$password."'";
	$objQuery = mysqli_query($con,$strSQL);
	$objResult = mysqli_fetch_array($objQuery);
        //*** Session
	$_SESSION["UserID"] = $objResult["u_id"];
        $_SESSION["UserType"] = $objResult["u_utype"];
        echo "<font color='green'>".$_SESSION["UserID"]."</font>";
    }else{
        echo "<font color='orange'>"."ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง"."</font>";
    }
?>
