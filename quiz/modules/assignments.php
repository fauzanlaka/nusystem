<?php if(!isset($RUN)) { exit(); } ?>
<?php

xyz94zyx::xyz95zyx("1");

    require "grid.php";
    require "db/asg_db.php";

    $b2 = array("Quiz name", "Added date", "&nbsp;","&nbsp;","&nbsp;","&nbsp;");
    $b3 = array("quiz_name"=>"text", "added_date"=>"short date");

    $z2 = new grid($b2,$b3, "index.php?module=assignments");
    $z2->edit_link="index.php?module=add_assignment";

    $z2->commands=array("Start"=>"start");
    $z2->process_command_override="grd_process_command_override";
    //$z2->edit_attr_override = "grd_ovverride_edit_attr";
    $z2->edit_link_override = "grd_ovverride_edit_link";

    //$z2->id_links=(array("Information"=>"?module=view_assignment", "Reports"=>"?module=reports"));
    $z2->id_links=(array("Information"=>"?module=view_assignment"));
    $z2->id_link_key="asg_id";    

    if($z2->IsClickedBtnDelete())
    {
        xyz3zyx::xyz6zyx($z2->process_id);        
    }

    if($z2->IsClickedBtn("start"))
    {
        xyz3zyx::xyz7zyx("1", $z2->process_id);
    }

    if($z2->IsClickedBtn("stop"))
    {
        xyz3zyx::xyz7zyx("2", $z2->process_id);

        $a1_uq = xyz39zyx::xyz49zyx(xyz62zyx::xyz63zyx("user_quizzes", array(), array("assignment_id"=>$z2->process_id, "status"=>"1"), ""));

        while($a3_uq=xyz39zyx::xyz57zyx($a1_uq))
        {
            xyz3zyx::xyz13zyx($a3_uq['id'], "4");
        }

    }

    function grd_ovverride_edit_link($a3)
    {
        global $z2;
        if(intval($a3['status'])>0)
        {
            return "&nbsp;";
        }
        else
        {
            return grid::EditCommandTemplate($a3, $z2);
        }
    }

  //  function grd_ovverride_edit_attr($a3)
  //  {
   //     if(intval($a3['status'])>0)
  //      {
  //          return "onclick='return alert(\"Cannot edit assignment , because quiz/survey already started\")';return false;";
  //      }
  //  }

    function grd_process_command_override($a3)
    {
        global $z2;
        if($a3['status']==0)
        {
            return grid::ProcessCommandTemplate($a3, "start", "Start",$z2);
        }
        else if($a3['status']==1)
        {
            return grid::ProcessCommandTemplate($a3, "stop", "Stop",$z2);
        }
        else 
        {
            return "<td>&nbsp;</td>";
        }
    }

    $y1 = xyz3zyx::xyz4zyx();    

    $z2->DrowTable($y1);
    $grid_html = $z2->table;

    if(isset($_POST["ajax"]))
    {
         echo $grid_html;
    }

    function desc_func()
    {
        return "Assignments";
    }

?>