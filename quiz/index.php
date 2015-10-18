<?php
 
  require 'config.php';
  require 'db/debug.php';
  require 'db/mysql2.php';
  require 'db/access_db.php';
  require "lib/util.php";
  require "lib/access.php";
  require "db/orm.php";
  require "lib/validations.php";
  require "lib/webcontrols.php";

  ini_set('session.bug_compat_42',0);
  ini_set('session.bug_compat_warn',0);

  $RUN = 1;
  
   if(!isset($version)) header("location:install/index.php");

   //@session_start();
   
  if(!isset($_SESSION['txtLogin']))   header("location:login.php");
  $modules = xyz1zyx::xyz2zyx($_SESSION['txtLogin'], $_SESSION['txtPass'],$_SESSION['txtPassImp'],true);
  $has_result = xyz39zyx::xyz59zyx($modules);
  if($has_result==0)
  {
        header("location:login.php");
        exit;
  }

  ShowModule();

  function ShowModule()
  {
        global $module_name,$module_t_name,$Util;

        $module_name= isset($_GET["module"]) ? $_GET["module"] : "default" ;

        if(!file_exists("modules/$module_name".".php") || $module_name=="" || strpos($module_name,"../")!=0)
            $module_name="default";

        $module_t_name=$module_name."_tmp";

  }

  include "modules/".$module_name.".php";
  
  if(!isset($_POST["ajax"]))
  {
        $queries = xyz19zyx::xyz21zyx();
        include "index_tmp.php";
  }  

?>