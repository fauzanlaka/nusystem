<?php

xyz94zyx::xyz95zyx("1");

    require "grid.php";    
    require "db/quiz_db.php";    

    $c3 = new xyz103zyx("btnSubmit");
    $c3->xyz105zyx("txtName", "empty", "Name cannot be empty","");
    $c3->xyz105zyx("txtDesc", "empty", "Description cannot be empty","");
    $c3->xyz105zyx("drpCats", "notequal", "Please, select category", "-1");

    $txtIntroText="";
    $z1 = "-1";
    if(isset($_GET["id"]))
    {
        $id = xyz96zyx::xyz98zyx("?module=quizzes");
        $rs_quiz=xyz62zyx::xyz64zyx("quizzes", array(), array("id"=>$id), "");
        
        if(xyz39zyx::xyz59zyx($rs_quiz) == 0 ) header("location:?module=quizzes");

        $a3_quiz=xyz39zyx::xyz57zyx($rs_quiz);
        $txtName = $a3_quiz["quiz_name"];
        $txtDesc = $a3_quiz["quiz_desc"];
        $chkShowIntro = $a3_quiz["show_intro"] == "1" ? "checked" : "";
        $txtIntroText = $a3_quiz["intro_text"];
        $z1 = $a3_quiz["cat_id"];        
    }

    $a1ults = xyz62zyx::xyz64zyx("cats", array(), array(),"");
    $cat_options = xyz110zyx::xyz111zyx($a1ults, "id", "cat_name", $z1);

    if(isset($_POST["btnSubmit"]) && $c3->xyz107zyx())
    {        
     
        $date = date('Y-m-d H:i:s');
        if(!isset($_GET["id"]))
        {
            xyz62zyx::xyz66zyx("quizzes", array(
                                "cat_id"=>$_POST["drpCats"],
                                "quiz_name"=>$_POST["txtName"] ,
                               "quiz_desc"=>$_POST["txtDesc"],
                               "added_date"=>$date,
                                "show_intro"=>isset($_POST["chkShowIntro"]) ? 1:0,
                                "intro_text"=>$_POST["editor1"]
                                ));
        }
        else
        {
            xyz62zyx::xyz70zyx("quizzes", array(
                                "cat_id"=>$_POST["drpCats"],
                                "quiz_name"=>$_POST["txtName"] ,
                               "quiz_desc"=>$_POST["txtDesc"],
                                "show_intro"=>isset($_POST["chkShowIntro"]) ? 1:0,
                                "intro_text"=>$_POST["editor1"]
                                ) ,
                                array("id"=>$id)
                        );
        }
        header("location:?module=quizzes");
    }


    include_once "ckeditor/ckeditor.php";     
    $CKEditor = new CKEditor();
    $CKEditor->basePath = 'ckeditor/';


    function desc_func()
    {
        return "Add/Edit quiz";
    }

/*
    if(isset($_POST["ajax"]))
    {
         
    }
 */
?>
