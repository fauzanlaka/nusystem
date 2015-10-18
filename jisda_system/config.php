<?php
$host="localhost";
$user="root";
$pass="7063253";
$dbname="jisda_system";
$connect=mysql_connect($host,$user,$pass) or die('Connect error');
$dbselect=mysql_select_db($dbname,$connect);
mysql_query("SET NAMES utf8",$connect);
?>