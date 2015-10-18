<?php if(!isset($RUN)) { exit(); } ?>
<?php

xyz94zyx::xyz95zyx("2");

    require "grid.php";
    require "db/asg_db.php";

    $b3_quiz = array("quiz_name"=>"text", "added_date"=>"text","finish_date"=>"text","is_success"=>"text","pass_score"=>"text","total_point"=>"text");
    $headers_quiz = array("Quiz/Survey name","Start date","Finish date","Success","Pass score","Total point");

    $y1 = xyz3zyx::xyz10zyx($_SESSION['user_id'],1);
    $z2_quiz = new grid($headers_quiz,$b3_quiz, "index.php?module=old_assignments");
    $z2_quiz->edit=false;
    $z2_quiz->delete=false;
    $z2_quiz->DrowTable($y1);
    $grid_quiz_html = $z2_quiz->table;


    $b3_surv = array("quiz_name"=>"text", "added_date"=>"text","finish_date"=>"text");
    $headers_surv = array("Quiz/Survey name","Start date","Finish date");

    $y1 = xyz3zyx::xyz10zyx($_SESSION['user_id'],2);
    $z2_surv = new grid($headers_surv,$b3_surv, "index.php?module=old_assignments");
    $z2_surv->edit=false;
    $z2_surv->delete=false;
    $z2_surv->DrowTable($y1);
    $grid_surv_html = $z2_surv->table;

    function desc_func()
    {
        return "Old assignments";
    }
?>
