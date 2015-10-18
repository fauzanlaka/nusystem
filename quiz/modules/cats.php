<?php if(!isset($RUN)) { exit(); } ?>
<?php

xyz94zyx::xyz95zyx("1");

    require "grid.php";
    require "db/cats_db.php";

    $b2 = array("Category name", "&nbsp;", "&nbsp;");
    $b3 = array("cat_name"=>"test");
    
    $z2 = new grid($b2,$b3, "index.php?module=cats");

    $z2->process_html_command="process_quiz_status";
    $z2->edit=false;

    function process_quiz_status($a3)
    {
        $editjs="EditCat('".$a3['cat_name']."','".$a3['id']."')";
        $b1="<td><a href='#' onclick=\"".$editjs."\">Edit</a></td>";
        return $b1;
    }

    if(isset($_POST["add"]))
    {
        if($_POST["add"]=="adding")
        {
            xyz14zyx::xyz17zyx($_POST["name"]);
        }
        else
        {            
            xyz14zyx::xyz18zyx($_POST["name"],$_POST["hdnT"]);
        }
    }

    if($z2->IsClickedBtnDelete())
    {        
       xyz14zyx::xyz16zyx($z2->process_id);
    }    
  
    //$z2->links =array("Az"=>"az.php" , "En"=>"english.php");
    $y1 = xyz14zyx::xyz15zyx();
    $z2->DrowTable($y1);
    $grid_html = $z2->table;    

    if(isset($_POST["ajax"]))
    {
         echo $grid_html;
    }

    function desc_func()
    {
        return "Categories";
    }
    
?>
