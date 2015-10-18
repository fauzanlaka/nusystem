<?php
$host="localhost";
$user="pusdaorg_system";
$pass="jisda123";
$dbname="pusdaorg_system";
$connect=mysql_connect($host,$user,$pass) or die('Connect error');
$dbselect=mysql_select_db($dbname,$connect);
mysql_query("SET NAMES utf8",$connect);
?>

