<?php if(!isset($RUN)) { exit(); } ?>
<?php

xyz94zyx::xyz95zyx("2");

 require "grid.php";
 require "db/questions_db.php";
 require "db/asg_db.php";
 require "qst_viewer.php";

 $app_display = "";
 $msg_display = "none";
 $timer_display ="";
 $msg_text = "";
 $qst_html ="";
 $timer_script = "";
 $timer_display = "none";
 $pager_html="";
 $pager_display="";

 $emulate_goto=true;
 while($emulate_goto==true) { // emulating goto operator 

 $user_id = $_SESSION['user_id'];
 $asg_id = xyz96zyx::xyz98zyx("?module=active_assignments");
 $_SESSION['asg_id']=$asg_id;

 $active_asg = xyz3zyx::xyz9zyx($user_id, $asg_id);
 $asg_num = xyz39zyx::xyz59zyx($active_asg);
 if($asg_num==0)
 {
     DisplayMsg("error","You don't have access to this quiz/survey",false);
     break;
 }

 $asg_row = xyz39zyx::xyz57zyx($active_asg);
 $status = intval($asg_row['user_quiz_status']);
 $user_quiz_id = $asg_row['user_quiz_id'];
 $_SESSION['user_quiz_id']=$user_quiz_id;
 $quiz_type = $asg_row['quiz_type'];

 if($status==0)
 {
     $date = xyz96zyx::xyz97zyx();
     $user_quiz_id=xyz39zyx::xyz50zyx(xyz62zyx::xyz65zyx("user_quizzes", array("assignment_id"=>$asg_id,
                                                            "user_id"=>$user_id,
                                                            "status"=>"1",
                                                            "added_date"=>$date,
                                                            "success"=>"0"
                                                       )));     
 }
 else if($status>=2)
 {     
    DisplayMsg("error"," You have already finished this quiz/survey",false);
    break;
 }

 if($quiz_type=="1") // if survey
 {
    $timer_display= "";
    $ended=ShowTimer($status,$asg_row);
    if($ended==true) break;
 }

 $page = "?module=start_quiz&id=".$asg_id ;
 $qst_viewer = new qst_viewer($page);
 $qst_viewer->user_quiz_id=$user_quiz_id;
 $priority = $qst_viewer->GetPriority(); 

 if(isset($_POST['btnNext']))
 {
     UpdateValues();
     if($_POST['finish_quiz']=="1") break;
     $priority =$qst_viewer->GetNextPriority();     
 }
 if(isset($_POST['btnPrev']))
 {
    $priority =$qst_viewer->GetPrevPriority();
 }

 if(isset($_POST['load_question']))
 {
    $priority = $_POST['load_priority'];    
 }

 $qst_query = xyz71zyx::xyz73zyx($priority, $asg_id, $user_id);
 $a3_qst = xyz39zyx::xyz57zyx(xyz39zyx::xyz49zyx($qst_query));

 //echo $qst_query;

 if($priority==1)
 {
     $qst_viewer->show_prev=false;
 }
 else if($a3_qst['next_priority']==-1)
 {
     $qst_viewer->show_next=false;
     $qst_viewer->show_finish=true;
 }
 //echo $qst_query; 
 $qst_viewer->BuildQuestionWithResultset($a3_qst);
 $qst_html = $qst_viewer->html;
 

// $a3_num = xyz39zyx::xyz59zyx($qst_results);

// if($a3_num==0)
 //{
//    DisplayError("You don't have access to this quiz/survey");
 //}
 
 $pager_html = GetPager();

 if(isset($_POST['data_post']))
 {
    echo $qst_html."[{sep}]".$pager_html;
 }

 $emulate_goto =false;

 }


 function UpdateValues()
 {
    global $user_quiz_id;
    
    $z3 = new xyz39zyx();
    $z3->xyz40zyx();
    $z3->xyz41zyx();

    try
    {
     $z3->xyz42zyx(xyz62zyx::xyz67zyx("user_answers", array("user_quiz_id"=>$user_quiz_id , "question_id"=>intval($_POST['qstID']))));
     $date = date('Y-m-d H:i:s');
     switch ($_POST['qst_type']) {

         case 0 : // if checkbox
             $chks = explode(";|",$_POST['post_data']);
             for($i=0;$i<sizeof($chks);$i++)
             {
                 $chk_value=trim($chks[$i]);
                 if($chk_value=="") continue;

                 $chk_value = intval($chk_value);
                 $y1 = xyz62zyx::xyz65zyx("user_answers", array("user_quiz_id"=>$user_quiz_id,
                                                                    "question_id"=>intval($_POST["qstID"]),
                                                                    "answer_id"=>$chk_value,
                                                                    "user_answer_id"=>$chk_value,
                                                                    "added_date"=>$date
                                                              ));
                 $z3->xyz42zyx($y1);
             }
         break;
         case 1 : //if radio button
                 $chk_value=trim($_POST['post_data']);
                 if($chk_value!="")
                 {
                    $chk_value = intval($chk_value);
                    $y1 = xyz62zyx::xyz65zyx("user_answers", array("user_quiz_id"=>$user_quiz_id,
                                                                    "question_id"=>intval($_POST["qstID"]),
                                                                    "answer_id"=>$chk_value,
                                                                    "user_answer_id"=>$chk_value,
                                                                    "added_date"=>$date
                                                             ));
                    $z3->xyz42zyx($y1);
                 }
         break ;
         case 3 : // if free text area
                 $free_vals = explode(";|",$_POST['post_data']);
                 $answer_id=$free_vals[0];
                 $answer_text=$free_vals[1];
                 //if($chk_value!="")
                 //{                    
                    $y1 = xyz62zyx::xyz65zyx("user_answers", array("user_quiz_id"=>$user_quiz_id,
                                                                    "question_id"=>intval($_POST["qstID"]),
                                                                    "answer_id"=>$answer_id,
                                                                    "user_answer_text"=>$answer_text,
                                                                    "added_date"=>$date
                                                             ));
                    $z3->xyz42zyx($y1);
                // }
        break ;
        case 4 : // if muti text
             $txts = explode(";|",$_POST['post_data']);
             for($i=0;$i<sizeof($txts);$i++)
             {
                 $txt_key_value=trim($txts[$i]);                 
                 if($txt_key_value=="") continue;

                 $txt_exp=explode(":|",$txt_key_value);
                 $txt_key = intval($txt_exp[0]);
                 $txt_value = $txt_exp[1];
                 
                 if(trim($txt_key)=="" || trim($txt_value)=="") continue ;

                 $y1 = xyz62zyx::xyz65zyx("user_answers", array("user_quiz_id"=>$user_quiz_id,
                                                                    "question_id"=>intval($_POST["qstID"]),
                                                                    "answer_id"=>$txt_key,
                                                                    "user_answer_text"=>$txt_value,
                                                                    "added_date"=>$date
                                                              ));
                 $z3->xyz42zyx($y1);
             }
         
         break;

     }

     $z3->xyz47zyx();

     if($_POST['finish_quiz']=="1")
     {                  
          $a3=xyz3zyx::xyz13zyx($user_quiz_id,2);
          $msg = GetQuizResults($a3);
          DisplayMsg("warning",$msg,true);
     }     

     $z3->xyz47zyx();

    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        $z3->xyz46zyx();
    }
    $z3->xyz61zyx();
    
 }



 function GetQuizResults($a3)
 {
    global $quiz_type;
    
    $msg = "Finished . Thank you . <br>";    
    if($a3['show_results']=="1" && $quiz_type=="1")
    {
        $total = $a3['total_point'];
        if($a3['results_mode']=="2") $total = $a3['total_perc']." %";        

        $msg.="Your total point: $total . Success point: ".$a3['pass_score']." .";
        $msg.="<br>";           

        if($a3['quiz_success']=="1")
        {
            $msg.="You passed exam successfully!";
        }
        else
        {
            $msg.="Sorry, you didn't pass exam successfully";
        }
    }    
    return $msg;
 }

 function DisplayMsg($type,$msg,$isajax)
 {
     if(isset($_POST['ajax'])) $isajax=true;
     
     if($isajax==true)
     {
        if($type=="error")
        {
            echo "error:".$msg;
        }
        else if($type=="warning")
        {
             echo "warni:".$msg;
        }
        else
        {
             echo $msg;
        }
     }
     else
     {
        global $app_display,$msg_display,$msg_text,$timer_display,$pager_display;
        $app_display="none";
        $msg_display = "";
        $msg_text=$msg;
        $timer_display="none";
        $pager_display="none";
     }

    // echo $msg;

 }

 function ShowTimer($status,$a3)
 {
     $ended = false;
     $start_date =$a3['uq_added_date'];
     if($status=="0") $start_date = xyz96zyx::xyz97zyx();

     $diff = abs(strtotime(xyz96zyx::xyz97zyx()) - strtotime($start_date));

     $total_minutes = intval($diff/60);

     $minuets = intval($a3['quiz_time']) - $total_minutes -1;
     $seconds = 60-($diff%60);

     if($total_minutes>=intval($a3['quiz_time']))
     {
        global $user_quiz_id;
        $a3_results=xyz3zyx::xyz13zyx($user_quiz_id,3);
        $msg="Time ended <br>";
        $msg.=GetQuizResults($a3_results);        
        DisplayMsg("message",$msg,false);
        $ended=true;
     }
     else
     {      
         global $timer_script;
         $timer_script="<script language=javascript>Init_Timer($minuets,$seconds)</script>";
     }
     return $ended;

 }

 function GetPager()
 {
      global $priority,$asg_id,$page;
      $a1_qst=xyz39zyx::xyz49zyx(xyz71zyx::xyz79zyx($asg_id));
      if(xyz39zyx::xyz59zyx($a1_qst)==0) return "";
      $i=0;
      $pager_html = "";
      $finish = 0;
      while($a3=xyz39zyx::xyz57zyx($a1_qst))
      {
                  $i++;
                  $bgcolor="white";
                  if($priority==$a3['priority'])
                  {
                     $bgcolor = "green";
                  }
                 $pager_html.= "<u><a style='cursor:pointer;background-color:$bgcolor' onmouseout='HideObject(\"tblTip\")' ".
                               " onmouseover='ShowQst(event.pageX, event.pageY ,".$a3['priority'].")' onclick='LoadQst(\"$page\",$a3[question_type_id],$a3[priority],$a3[id],$finish)'>".$i."</a></u>&nbsp;";
      }

      return $pager_html."&nbsp;&nbsp;";
 }

 function desc_func()
 {
        return "Quiz / Survey";
 }

?>
