<?php


  require 'config.php';
  require 'db/debug.php';
  require 'db/mysql2.php';
  require "lib/util.php";
  require "db/orm.php";
  require "db/access_db.php";
  require "lib/validations.php";
  require "lib/webcontrols.php";

  $RUN = 1;

  if(!isset($version)) header("location:install/index.php");

  $msg = "";

  if(isset($_POST['btnSubmit']))
  {      
      $txtLogin = xyz39zyx::xyz60zyx(trim($_POST['txtLogin']));
      $txtPass = md5(trim($_POST['txtPass']));
      $password="";
      //$txtPassImp= Imported_Users_Password_Hash(trim($_POST['txtPass']));
      $a1ults = xyz1zyx::xyz2zyx($txtLogin, "", "", false);
      $has_result = xyz39zyx::xyz59zyx($a1ults);      
      if($has_result!=0)
      {
          $a3 = xyz39zyx::xyz57zyx($a1ults);

          if($a3['imported']=="0") $password = $txtPass ;
          else $password = Imported_Users_Password_Hash(trim($_POST['txtPass']), $a3['password']);

          if($password==$a3['password'])
          {
            $_SESSION['txtLogin'] = $txtLogin;
            $_SESSION['txtPass'] = $password;
            $_SESSION['txtPassImp'] = $password;
            $_SESSION['user_id'] = $a3['user_id'];
            $_SESSION['user_type'] = $a3['user_type'];
            if($a3['user_type']=="1")
            header("location:index.php?module=quizzes");
            else
            header("location:index.php?module=active_assignments");
          }
      }
      $msg = "Login or password is incorrect";
  }


  include "login_tmp.php";


?>
