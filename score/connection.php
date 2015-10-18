<?php
$con=mysql_connect("localhost","root","1234")or die ("Not connect");
$db=mysql_select_db("school",$con) or die("Not connectDatabase");
mysql_query("SET character_set_results=utf8");
mysql_query("SET character_set_client=utf8");
mysql_query("SET character_set_connection=utf8");
?>
