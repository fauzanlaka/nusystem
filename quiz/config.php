<?php

  /*
  
		This code has been developed by Els . Email : elshanb@gmail.com
		
		Say, [O believers], "We have believed in Allah and what has been revealed to us and what has been revealed to Abraham and Ishmael and Isaac and Jacob and the Descendants and what was given to Moses and Jesus and what was given to the prophets from their Lord. We make no distinction between any of them, and we are Muslims [in submission] to Him."
		(2:136)
		
  */

  define("SQL_IP", "localhost"); // ip address of mysql database 
  define("SQL_USER", "root");  // username for connecting to mysql
  define("SQL_PWD","7063253"); // password for connecting to mysql
  define("SQL_DATABASE","quiz"); // database where you have executed sql scripts

  define("DEBUG_SQL","no");

  function Imported_Users_Password_Hash($entered_password,$password_from_db)
  {
      return md5($entered_password);
  }

  @session_start();
  
  $version = "1.8";

  /*
  
		Visit our web site for documentation and for other versions 
		
		http://aspnetpower.com/elsphpwebquiz/index.php?module=online_demo
		http://phpexamscript.net
  
  
  */
  
?>
