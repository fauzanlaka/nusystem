<?php if(!isset($RUN)) { exit(); } ?>
<?php

 xyz94zyx::xyz95zyx("2");

 require "grid.php";
 require "db/users_db.php";
 require "db/asg_db.php";

    $b2 = array("Name","&nbsp;");
    $b3 = array("quiz_name"=>"text");

    $z2 = new grid($b2,$b3, "index.php?module=active_assignments");

    $z2->process_html_command="process_quiz_status";

    function process_quiz_status($a3)
    {
        $b1 ="";        
        if(intval($a3['user_quiz_status'])<2)
        {
            $b1.="<td><a href='?module=show_intro&id=".$a3['asg_id']."'>Start</a></td>";
        }
        else
        {
            $b1.="<td>You have already finished this quiz/survey</td>";
        }
        return $b1;
    }

    //$z2->edit_link="index.php?module=add_edit_quiz";

    //$z2->id_links=(array("Start"=>"?module=show_intro"));
    //$z2->id_link_checks = array("");
    $z2->id_column="asg_id";

    $z2->edit=false;
    $z2->delete=false;
    $z2->empty_data_text="No active assginments found";

    $user_id = $_SESSION['user_id'];
    $y1 = xyz3zyx::xyz8zyx($user_id);
    
    $z2->DrowTable($y1);
    $grid_html = $z2->table;

    if(isset($_POST["ajax"]))
    {
         echo $grid_html;
    }

    function desc_func()
    {
        return "Active assignments";
    }

?>
