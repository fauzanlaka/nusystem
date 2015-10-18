<?php if(!isset($RUN)) { exit(); } ?>
<?php

xyz94zyx::xyz95zyx("1");

    require "grid.php";
    require "db/users_db.php";

    $b2 = array("Login",  "Name","Surname","Added date","User type", "Email","&nbsp;","&nbsp;");
    $b3 = array("UserName"=>"text", "Name"=>"text","Surname"=>"Surname","added_date"=>"short date","type_name"=>"text","email"=>"text");

    $z2 = new grid($b2,$b3, "index.php?module=local_users");
    $z2->edit_link="index.php?module=add_edit_user";
    $z2->id_column="UserID";

    if($z2->IsClickedBtnDelete())
    {
       xyz62zyx::xyz68zyx("users", array("UserID"=>$z2->process_id));
    }

    $y1 = xyz91zyx::xyz92zyx();
    $z2->DrowTable($y1);
    $grid_html = $z2->table;

    if(isset($_POST["ajax"]))
    {
         echo $grid_html;
    }

    function desc_func()
    {
        return "Local users";
    }

?>