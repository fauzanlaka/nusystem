<?php
	session_start();
	require_once("connect.php");
	session_destroy();
?>
        <meta http-equiv="refresh" content="0; url=?page=login">