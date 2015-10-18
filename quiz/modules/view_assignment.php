<?php if(!isset($RUN)) { exit(); } ?>
<?php

xyz94zyx::xyz95zyx("1");

 require "grid.php";
 require "db/asg_db.php";

 $asg_id=xyz96zyx::xyz99zyx("asg_id", "?module=assignments");

 $asg_res = xyz3zyx::xyz11zyx($asg_id);

 if(xyz39zyx::xyz59zyx($asg_res)==0)
 {
     die("This assignment cannot be find ");
 }

 $a3=xyz39zyx::xyz57zyx($asg_res);

 $cat_name=$a3['cat_name'];
 $test_name=$a3['quiz_name'];
 $quiz_type=$a3['quiz_type']=="1" ? "Quiz" : "Survey";
 $show_results=$a3['show_results']=="1" ? "Yes" : "No";
 $a1ults_by=$a3['results_mode'] == "1" ? "By Point" : "By Percent";
 $pass_score=$a3['pass_score'];
 $test_time=$a3['quiz_time'];

 $b2 = array("User ID", "Name", "Surname","User name","Status","Success","Total point","&nbsp;");
 $b3 = array("user_id"=>"text", "Name"=>"text","Surname"=>"text","UserName"=>"text","status_name"=>"text","is_success"=>"text","total_point"=>"text");

 $z2 = new grid($b2,$b3, "index.php?module=view_assginments");
 $z2->edit=false;
 $z2->delete=false;

 $z2->id_links=(array("Details"=>"?module=view_details"));
 $z2->id_link_key="user_quiz_id";
 $z2->id_column="user_quiz_id";


 $y1 = xyz3zyx::xyz12zyx($asg_id, 1);
 $z2->DrowTable($y1);
 $grid_lu_html = $z2->table;

 
 $z2_iu = new grid($b2,$b3, "index.php?module=view_assginments");
 $z2_iu->edit=false;
 $z2_iu->delete=false;

 $z2_iu->id_links=(array("Details"=>"?module=view_details"));
 $z2_iu->id_link_key="user_quiz_id";
 $z2_iu->id_column="user_quiz_id";


 $y1 = xyz3zyx::xyz12zyx($asg_id, 2);
 $z2_iu->DrowTable($y1);
 $grid_iu_html = $z2_iu->table;

 function desc_func()
    {
        return "View assignment";
    }

?>
