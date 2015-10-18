<?php if(!isset($RUN)) { exit(); } ?>
<?php

xyz94zyx::xyz95zyx("1");

 require "grid.php";
 require "db/users_db.php";
 require "db/asg_db.php";
 require "db/quiz_db.php";


 $c3 = new xyz103zyx("btnSave");
 $c3->xyz105zyx("drpCats", "notequal", "Please, select category", "-1");
 $c3->xyz105zyx("drpTests", "notequal", "Please, select test", "-1");
 $c3->xyz105zyx("txtSuccessP", "empty", "Please, enter success point","");
 $c3->xyz105zyx("txtTestTime", "empty", "Please, enter test time","");
 $c3->xyz105zyx("txtSuccessP", "numeric", "Please, enter success point in numeric format","");
 $c3->xyz105zyx("txtTestTime", "numeric", "Please, enter test time in numeric format","");


$z1 = "-1";
$z1_test = "-1";
$z1_type = "-1";
$z1_showres = "-1";
$z1_results = "-1";
$local_user_ids = array();
$imp_user_ids= array();

if(isset($_GET["id"]))
{
        $id = xyz96zyx::xyz98zyx("?module=assignments");
        $rs_asg=xyz3zyx::xyz4zyxById($id);

        if(xyz39zyx::xyz59zyx($rs_asg) == 0 ) header("location:?module=assignments");

        $a3_asg=xyz39zyx::xyz57zyx($rs_asg);

        $z1 = $a3_asg["cat_id"];
        $z1_test= $a3_asg["org_quiz_id"];
        $copied_quiz_id= $a3_asg["quiz_id"];
        $z1_type = $a3_asg["quiz_type"];
        $z1_showres= $a3_asg["show_results"];
        $z1_results =$a3_asg["results_mode"];
        $txtSuccessP = $a3_asg["pass_score"];
        $txtTestTime = $a3_asg["quiz_time"];
       
        $local_user_ids=xyz39zyx::xyz51zyxByColumn(xyz62zyx::xyz63zyx("assignment_users", array(), array("assignment_id"=>$id, "user_type"=>"1"), ""), "user_id");
        $imp_user_ids=xyz39zyx::xyz51zyxByColumn(xyz62zyx::xyz63zyx("assignment_users", array(), array("assignment_id"=>$id, "user_type"=>"2"), ""), "user_id");

   //     for($i=0;$i<sizeof($local_user_ids);$i++)
   //     {
   //         echo $local_user_ids[$i]["user_id"];
 //       }

}

$type_options = xyz110zyx::xyz112zyx(array("1"=>"Quiz", "2"=>"Survey"), $z1_type);
$showres_options = xyz110zyx::xyz112zyx(array("1"=>"Yes", "2"=>"No"), $z1_showres);
$a1ult_options = xyz110zyx::xyz112zyx(array("1"=>"Point", "2"=>"Percent"), $z1_results);

$a1ults = xyz62zyx::xyz64zyx("cats", array(), array(),"");
$cat_options = xyz110zyx::xyz111zyx($a1ults, "id", "cat_name", $z1);


$b2 = array("&nbsp;","Login",  "Name","Surname", "Email");
$b3 = array("UserName"=>"text", "Name"=>"text","Surname"=>"Surname","email"=>"text");

$z2 = new grid($b2,$b3, "index.php?module=add_assignment");
$z2->delete=false;
$z2->edit=false;
$z2->checkbox=true;
$z2->id_column="UserID";
$z2->selected_ids=$local_user_ids;

$y1 = xyz91zyx::xyz92zyx();
$z2->DrowTable($y1);
$grid_html = $z2->table;

$b2_imp = array("&nbsp;","Login",  "Name","Surname");
$b3_imp = array("UserName"=>"text", "Name"=>"text","Surname"=>"Surname");

$z2_imp = new grid($b2_imp,$b3_imp, "index.php?module=add_assignment");
$z2_imp->delete=false;
$z2_imp->edit=false;
$z2_imp->checkbox=true;
$z2_imp->id_column="UserID";
$z2_imp->identity="imp";
$z2_imp->selected_ids=$imp_user_ids;

$y1_imp = xyz91zyx::xyz93zyx();
$z2_imp->DrowTable($y1_imp);
$imported_grid_html = $z2_imp->table;


if(isset($_POST["btnSave"]) && $c3->xyz107zyx())
{
    $z3 = new xyz39zyx();
    $z3->xyz40zyx();
    $z3->xyz41zyx();

    $z1_quiz_type=$_POST["drpType"];
    $z1_show_res = $_POST["drpShowRes"];
    if($z1_quiz_type=="2") $z1_show_res="2";
    try
    {
        $org_quiz_id=$_POST["drpTests"];
        if(!isset($_GET["id"]))
        {
            $quiz_id = CopyQuiz($org_quiz_id);
            $y1 = xyz62zyx::xyz65zyx("assignments", array("quiz_id"=>$quiz_id,
                                                   "results_mode"=>$_POST["drpResultsBy"],
                                                   "added_date"=>xyz96zyx::xyz97zyx(),
                                                   "quiz_time"=>trim($_POST["txtTestTime"]),
                                                   "show_results"=>$z1_show_res,
                                                   "org_quiz_id"=>$org_quiz_id,
                                                   "pass_score"=>$_POST["txtSuccessP"],
                                                   "quiz_type"=>$z1_quiz_type,
                                                    "quiz_type"=>$_POST["drpType"],
                                                    "status"=>"0"
                                                   ));
            $z3->xyz42zyx($y1);
            $asg_id = $z3->xyz48zyx();
        }
        else
        {
             global $copied_quiz_id;             
             $z3->xyz42zyx(xyz83zyx::xyz85zyxQuery($copied_quiz_id));
             //echo xyz83zyx::xyz85zyxQuery($z1_test);
             $quiz_id = CopyQuiz($org_quiz_id);
             $y1 = xyz62zyx::xyz69zyx("assignments", array("quiz_id"=>$quiz_id,
                                                   "results_mode"=>$_POST["drpResultsBy"],
                                                   //"added_date"=>xyz96zyx::xyz97zyx(),
                                                   "quiz_time"=>trim($_POST["txtTestTime"]),
                                                    "org_quiz_id"=>$org_quiz_id,
                                                   "show_results"=>$z1_show_res,
                                                   "pass_score"=>$_POST["txtSuccessP"],
                                                   "quiz_type"=>$z1_quiz_type,
                                                    "quiz_type"=>$_POST["drpType"]
                                                   // "status"=>"1" ,
                                                   ) ,
                                                   array("id"=>$id)
                                         );
            $z3->xyz42zyx($y1);
            $asg_id = $id;
            
            $z3->xyz42zyx(xyz62zyx::xyz67zyx("assignment_users", array("assignment_id"=>$asg_id)));
            //$z3->xyz42zyx(xyz71zyx::xyz80zyx($question_id));
        }

        $chkgrd=$_POST['chkgrd'];
        while (list ($key,$c3) = @each ($chkgrd))
        {
            $y1_lcl = xyz62zyx::xyz65zyx("assignment_users", array("assignment_id"=>$asg_id,
                                                                       "user_type"=>"1",
                                                                       "user_id"=>$c3
                                            ));
            $z3->xyz42zyx($y1_lcl);
        }

        $chkgrdimp=$_POST['chkgrdimp'];
        while (list ($key,$c3) = @each ($chkgrdimp))
        {
            $y1_imp = xyz62zyx::xyz65zyx("assignment_users", array("assignment_id"=>$asg_id,
                                                                       "user_type"=>"2",
                                                                       "user_id"=>$c3
                                            ));
            $z3->xyz42zyx($y1_imp);
        }

        $z3->xyz47zyx();
        header("location:?module=assignments&asg_id=$asg_id");

    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        $z3->xyz46zyx();
    }
    $z3->xyz61zyx();
}



if(isset($_POST["ajax"]))
{
         if(isset($_POST["fill_tests"]))
         {             
            $cat_id=$_POST["cat_id"];            
            $a1ults_test = xyz62zyx::xyz64zyx("quizzes", array(), array("cat_id"=>$cat_id,"parent_id"=>"0"),"");
            $tests_drop = xyz110zyx::xyz113zyx("drpTests",$a1ults_test, "id", "quiz_name", $z1_test);
            echo $tests_drop;
         }
}

function CopyQuiz($quiz_id)
{
      global $z3;
      $last_quiz_id=$z3->xyz43zyx("insert into quizzes (cat_id,quiz_name,quiz_desc,added_date,parent_id,show_intro,intro_text) select cat_id,quiz_name,quiz_desc,added_date,id,show_intro,intro_text from quizzes where parent_id=0 and id=$quiz_id");

      $a1_qst = $z3->xyz42zyx(xyz62zyx::xyz63zyx("questions", array(), array("quiz_id"=>$quiz_id,"parent_id"=>"0"), ""));

      $q = 0;
      while($a3_qst=$z3->xyz57zyx($a1_qst))
      {
          $q++;
          $y1 = xyz62zyx::xyz65zyx("questions", array("question_text"=>$a3_qst['question_text'],
                                                          "question_type_id"=>$a3_qst['question_type_id'],
                                                          "priority"=>$q,
                                                          "quiz_id"=>$last_quiz_id,
                                                          "point"=>$a3_qst['point'],
                                                          "parent_id"=>$a3_qst['id'],
                                                          "added_date"=>xyz96zyx::xyz97zyx(),
                                                          "header_text"=>$a3_qst['header_text'],
                                                          "footer_text"=>$a3_qst['footer_text'],
                                                          "help_image"=>$a3_qst['help_image'],
                                    ));
          
          $last_qst_id=$z3->xyz43zyx($y1);

          $a1_grp = $z3->xyz42zyx(xyz62zyx::xyz63zyx("question_groups", array(), array("question_id"=>$a3_qst['id'],"parent_id"=>"0"), ""));

          while($a3_grp=$z3->xyz57zyx($a1_grp))
          {
              $y1 = xyz62zyx::xyz65zyx("question_groups", array("group_name"=>$a3_grp['group_name'],
                                                                    "show_header"=>$a3_grp['show_header'],
                                                                    "question_id"=>$last_qst_id,
                                                                    "parent_id"=>$a3_grp['id'],
                                                                    "added_date"=>xyz96zyx::xyz97zyx()

              ));
              $last_grp_id=$z3->xyz43zyx($y1);

              $a1_ans = $z3->xyz42zyx(xyz62zyx::xyz63zyx("answers", array(), array("group_id"=>$a3_grp['id'],"parent_id"=>"0"), ""));

              while($a3_ans=$z3->xyz57zyx($a1_ans))
              {
                  $y1 = xyz62zyx::xyz65zyx("answers", array("group_id"=>$last_grp_id,
                                                                    "answer_text"=>$a3_ans['answer_text'],
                                                                      "correct_answer"=>$a3_ans['correct_answer'],
                                                                      "priority"=>$a3_ans['priority'],
                                                                      "correct_answer_text"=>$a3_ans['correct_answer_text'],
                                                                      "answer_pos"=>$a3_ans['answer_pos'],
                                                                      "parent_id"=>$a3_ans['id'],
                                                                      "control_type"=>$a3_ans['control_type'],
                                                                      "answer_parent_id"=>$a3_ans['answer_parent_id'],
                                                                      "text_unit"=>$a3_ans['text_unit']
                  ));
                  $last_ans_id=$z3->xyz43zyx($y1);
              }

          }

      }

      return $last_quiz_id;

}

function desc_func()
{
        return "Add assignment";
}



?>
