<?php
	session_start();
	echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
	$username = $_POST['username'];
	$password = $_POST['password'];
                    include("connect.php");
                    $check_log = mysql_query("select * from students where student_id='$username' and passwod='$password'");
                        while($data=mysql_fetch_array($check_log)){
                            $_SESSION[ses_usename] = $username;
                            $_SESSION[ses_password] = $password;
                            echo "<meta http-equiv='refresh' content='1;URL=student/index.php'>";
                            echo "Please wait...";
                        }                       
                   
?>            