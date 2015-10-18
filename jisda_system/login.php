<?php
function login(){
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
				include("connect.php");
				$check_log2 = mysql_query("select * from students where student_id='$username' and password='$password'");
				$num2 = mysql_num_rows($check_log2);
				if($num2<=0){
				echo "Username atau Password munkin salah";
				echo "<meta http-equiv='refresh' content='1;URL=login_form.php'>";
				}else{
					while($data2=mysql_fetch_array($check_log2)){
						if($data2[status]==student){
							$_SESSION[ses_userid] = $data2[st_id];            
							$_SESSION[ses_username] = $username;
							$_SESSION[ses_password] = $password;      
							$_SESSION[ses_status] = "student";                      
								echo "<meta http-equiv='refresh' content='1;URL=student/index.php'>";
								echo "Please wait...";
						}
					}
				}
			}else{
				while($data=mysql_fetch_array($check_log)){
					if($data[u_status]==admin){
						$_SESSION[ses_userid] = $data[u_id];            
						$_SESSION[ses_username] = $username;
						$_SESSION[ses_password] = $password;      
						$_SESSION[ses_status] = "admin";                      
							echo "<meta http-equiv='refresh' content='1;URL=admin/index_admin.php'>";
							echo "Please wait...";
							
					}elseif($data[u_status]==user){                              
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
}
?>