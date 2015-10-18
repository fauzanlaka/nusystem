<?php
$host="localhost";
$user="jisdaorg_system";
$pass="fauzan7063253";
$dbname="่jisdaorg_system";
$connect=mysql_connect($host,$user,$pass) or die('Connect error');
$dbselect=mysql_select_db($dbname,$connect);
mysql_query("SET NAMES utf8",$connect);
?>

