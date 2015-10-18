<?php
	session_start();
	session_destroy();
	
	echo "Pleas wait...";
	echo "<meta http-equiv='refresh' content='1;URL=../index.php'>";
?>