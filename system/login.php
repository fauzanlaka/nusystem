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
			if($num<=0){
			}else{
				while($data=mysql_fetch_array($check_log)){
					if($data[u_status]=="admin"){
						$_SESSION[ses_userid] = $data[u_id];            
						$_SESSION[ses_username] = $username;
						$_SESSION[ses_password] = $password;      
						$_SESSION[ses_status] = "admin";                      
							echo "<meta http-equiv='refresh' content='1;URL=admin/index_admin.php'>";
							echo "Please wait...";		
					}elseif($data[u_status]=="user"){                              
						$_SESSION[ses_userid] = $data[u_id];                      
						$_SESSION[ses_username] = $username;
						$_SESSION[ses_password] = $password;
						$_SESSION[ses_status] = "user";
							echo "<meta http-equiv='refresh' content='1;URL=admin/index_admin.php'>";
							echo "Please wait...";
					}
	
				}	
			}
		}
?>