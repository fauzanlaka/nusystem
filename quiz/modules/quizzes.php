<?php if(!isset($RUN)) { exit(); } ?>
<?php

xyz94zyx::xyz95zyx("1");

    require "grid.php";
    require "db/quiz_db.php";

    $b2 = array("Name", "Description", "Date","Questions","&nbsp;","&nbsp;");
    $b3 = array("quiz_name"=>"text", "quiz_desc"=>"text","added_date"=>"short date");

    $z2 = new grid($b2,$b3, "index.php?module=quizzes");
    $z2->edit_link="index.php?module=add_edit_quiz";
    
    $z2->id_links=(array("Questions"=>"?module=questions"));
    $z2->id_link_key="quiz_id";

    if($z2->IsClickedBtnDelete())
    {
       xyz83zyx::xyz85zyx($z2->process_id);
    }
      
    $y1 = xyz83zyx::xyz84zyx();
    $z2->DrowTable($y1);
    $grid_html = $z2->table;

    if(isset($_POST["ajax"]))
    {
         echo $grid_html;
    }

    function desc_func()
    {
        return "Quizzes";
    }

?>