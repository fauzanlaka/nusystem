<?php if(!isset($RUN)) { exit(); } ?>
<?php

xyz94zyx::xyz95zyx("1");

 require "grid.php";
 require "db/asg_db.php";
 require "db/questions_db.php";
 require "qst_viewer.php";

 $id=xyz96zyx::xyz99zyx("user_quiz_id", "?module=assignments");

 $asg_res = xyz71zyx::xyz74zyx($id);

 $uq  = 0;
 function get_question($a3)
 {
     global $id,$uq;

     $qst_viewer = new qst_viewer("#");
     $qst_viewer->user_quiz_id=$id;

     $qst_viewer->show_prev=false;

     $qst_viewer->show_next=false;
     $qst_viewer->show_finish=false;
     $qst_viewer->SetReadOnly();
     $qst_viewer->show_correct_answers=true;
     $qst_viewer->control_unq=$uq;
     $qst_viewer->BuildQuestionWithResultset($a3);
     $qst_html = $qst_viewer->html;
     $uq++;
     return $qst_html;
 }

function desc_func()
{
        return "View details";
}

?>
