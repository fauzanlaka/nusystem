<?php if(!isset($RUN)) { exit(); } ?>
<?php

 require "grid.php";
 //require "db/users_db.php";
 require "db/asg_db.php";

 $asg_id = xyz96zyx::xyz98zyx("?module=active_assignments");
 $a1ults=xyz3zyx::xyz4zyxById($asg_id);

 $a3_num = xyz39zyx::xyz59zyx($a1ults);
 if($a3_num==0)
 {
     header("location:?module=active_assignments");
     exit;
 }
 $a3 = xyz39zyx::xyz57zyx($a1ults);

 if($a3['show_intro']=="1")
 {
    $intro = $a3['intro_text'];
 }
 else
 {
     header("location:?module=start_quiz&id=".$asg_id);
 }

 if(isset($_POST['btnCont']))
 {
     header("location:?module=start_quiz&id=".$asg_id);     
 }

 function desc_func()
    {
        return "Intro";
    }
 
?>
