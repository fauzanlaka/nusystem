<?php if(!isset($RUN)) { exit(); } ?>
<?php

xyz94zyx::xyz95zyx("1");

    require "db/questions_db.php";

    $quiz_id = xyz96zyx::xyz99zyx("quiz_id", "?module=questions");

    $txtQsts="";
    $answers_count=4;
    $z1 = "-1";    
    if(isset($_GET["id"]))
    {
        $id = xyz96zyx::xyz98zyx("?module=questions");
        $rs_qsts=xyz62zyx::xyz64zyx("questions", array(), array("id"=>$id), "");

        if(xyz39zyx::xyz59zyx($rs_qsts) == 0 ) header("location:?module=questions");

        $a3_qsts=xyz39zyx::xyz57zyx($rs_qsts);
        $txtQsts = $a3_qsts["question_text"];
        $txtPoint = $a3_qsts["point"];        
        $txtHeader = $a3_qsts["header_text"];
        $txtFooter = $a3_qsts["footer_text"];
        $z1 = $a3_qsts["question_type_id"];

        $rs_grp=xyz62zyx::xyz64zyx("question_groups", array(), array("question_id"=>$id), "added_date");
        $a3_grp = xyz39zyx::xyz57zyx($rs_grp);

        $txtGroupName=$a3_grp["group_name"];

        $rs_ans = xyz62zyx::xyz64zyx("answers", array(), array("group_id"=>$a3_grp["id"]), "priority");

        $answers_count = xyz39zyx::xyz59zyx($rs_ans);

        $i = 0;
        while($a3_ans=xyz39zyx::xyz57zyx($rs_ans))
        {
            $i++;
            ${"txtChoise".$i} = $a3_ans["answer_text"];
            ${"txtCrctAnswer".$i} = $a3_ans["correct_answer_text"];
            ${"ans_selected".$i} = $a3_ans["correct_answer"]=="1" ? "checked" : "";
        }

    }

    $a1ults = xyz62zyx::xyz64zyx("question_types", array(), array() , "id");
    $temp_options = xyz110zyx::xyz111zyx($a1ults, "id", "question_type",$z1);


  //  $c3 = new xyz103zyx("btnSave");
  //  $c3->xyz105zyx("txtName", "empty", "Name cannot be empty","");




    if(isset($_POST["btnSave"]))
    {
        $z3 = new xyz39zyx();
        $z3->xyz40zyx();
        $z3->xyz41zyx();        
        try
        {
            $question_type=$_POST["drpTemplate"];
            if(!isset($_GET["id"]))
            {
                $y1 = xyz62zyx::xyz65zyx("questions", array("question_text"=>trim($_POST["txtQstsEd"]),
                                                   "question_type_id"=>$_POST["drpTemplate"],
                                                   "priority"=>"(select ifnull(max(priority)+1,1) from questions where quiz_id=$quiz_id)",
                                                   "quiz_id"=>$quiz_id,
                                                   "point"=>$_POST["txtPoint"],
                                                   "parent_id"=>"0",
                                                   "footer_text"=>$_POST["txtFooter"],
                                                   "header_text"=>$_POST["txtHeader"]
                                                   ));
                $z3->xyz42zyx($y1);
                $question_id = $z3->xyz48zyx();
                $z3->xyz42zyx(xyz71zyx::xyz82zyx($quiz_id, $question_id));
            }
            else
            {
                 $y1 = xyz62zyx::xyz69zyx("questions", array("question_text"=>trim($_POST["txtQstsEd"]),
                                                   "question_type_id"=>$_POST["drpTemplate"],
                                                   "point"=>$_POST["txtPoint"],
                                                   "footer_text"=>$_POST["txtFooter"],
                                                   "header_text"=>$_POST["txtHeader"]
                                                   ),
                                                   array("id"=>$id)
                                            );
                $z3->xyz42zyx($y1);
                $question_id = $id;
                $z3->xyz42zyx(xyz71zyx::xyz76zyx($question_id));
                $z3->xyz42zyx(xyz71zyx::xyz80zyx($question_id));
            }
            
            

            if($question_type==0)
            {
                $group_name= trim($_POST["txtMultiGroupName"]);
            }
            else if($question_type==1)
            {
                $group_name= trim($_POST["txtOneGroupName"]);
            }
            else if($question_type==3)
            {
                $group_name= trim($_POST["txtAreaGroupName"]);
            }
            else 
            {
                $group_name= trim($_POST["txtMultiTextGroupName"]);
            }
            
            $y1= xyz62zyx::xyz65zyx("question_groups", array("group_name"=>$group_name,
                                                                 "show_header"=>$group_name =="" ? 0 : 1,
                                                                 "question_id"=>$question_id,
                                                                 "parent_id"=>"0"
                                                            ));

            $z3->xyz42zyx($y1);
            $group_id = $z3->xyz48zyx();

            for($i=1;;$i++)
            {                

                if($question_type==0)
                {
                    if(!isset($_POST["txtMulti".$i])) break;

                    $answer_text = trim($_POST["txtMulti".$i]);
                    $correct_answer = isset($_POST["chkMulti".$i]) ==true ? 1 : 0;
                    $correct_answer_text="";
                }
                else if($question_type==1)
                {
                    if(!isset($_POST["txtOne".$i])) break;

                    $answer_text = trim($_POST["txtOne".$i]);
                    $correct_answer = isset($_POST["rdOne"]) ==true && $_POST["rdOne"]==$i? 1 : 0;
                    $correct_answer_text="";
                }
                else if($question_type==3)
                {
                    if(!isset($_POST["txtArea".$i])) break;

                    $answer_text = "";
                    $correct_answer = 0;
                    $correct_answer_text=trim($_POST["txtArea".$i]);
                }
                else 
                {
                    if(!isset($_POST["txtMultiText".$i])) break;

                    $answer_text = trim($_POST["txtMultiText".$i]);
                    $correct_answer = 0;
                    $correct_answer_text=trim($_POST["txtMultiCrctAnswer".$i]);
                }
                

                $y1=xyz62zyx::xyz65zyx("answers", array("group_id"=>$group_id,
                                                            "answer_text"=>$answer_text,
                                                            "correct_answer"=>$correct_answer ,
                                                            "correct_answer_text"=>$correct_answer_text ,
                                                            "priority"=>"(select isnull(max(priority)+1,1) from answers where group_id=$group_id)",
                                                            "answer_pos"=>"1",
                                                            "parent_id"=>"0",
                                                            "control_type"=>"1",
                                                            "answer_parent_id"=>"0"));
                
                $z3->xyz42zyx($y1);
            }

            $z3->xyz47zyx();
            header("location:?module=questions&quiz_id=$quiz_id");
        }
        catch(Exception $e)
        {
            //echo $e->getMessage();
            $z3->xyz46zyx();
        }

        $z3->xyz61zyx();

    }
    
    include_once "ckeditor/ckeditor.php";
    $CKEditor = new CKEditor();
    $CKEditor->basePath = 'ckeditor/';

   function desc_func()
   {
        return "Add/Edit question";
   }

?>
