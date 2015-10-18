<?php
	session_start();
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username=="") {                   
			echo "Anda belum memasukkan Username";
		} 
		else if($password=="") {       
			echo "Anda belum memasukkan Password";
		} 
		else {
	include("connect.php");
	$check_log = mysql_query("select * from user where u_user='$username' and u_passwod='$password'");
	$num = mysql_num_rows($check_log);
	//$result = mysql_fetch_array($check_log);
	if($num<=0){
		echo "Username atau Password munkin salah";
	}else{
		while($data=mysql_fetch_array($check_log)){
			if($data[u_status]==admin){
				
				$_SESSION[ses_userid] = session_id();
				$_SESSION[ses_username] = $username;
				$_SESSION[ses_password] = $password;
				$_SESSION[ses_status] = "admin";                
				print_r($_POST);      
					//echo "<meta http-equiv='refresh' content='1;URL=index_admin.php'>";
					//echo "Anda adalah <b>ADMIN</b><br>";
					//echo "Tunggu sekejap…………";	
			}elseif($data[u_status]==user){                              
				$_SESSION[ses_userid] = session_id();     
				$_SESSION[ses_username] = $username;
				$_SESSION[ses_password] = $password;
				$_SESSION[ses_status] = "user";
					//echo "<meta http-equiv='refresh' content='1;URL=index_admin.php'>";
					//echo "<br /> Waiting User…………";
			}
		}
	}
	}	
?>