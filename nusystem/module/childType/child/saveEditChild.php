<?php
    $ct_name = mysqli_real_escape_string($con, $_POST['ct_name']);
    $ct_detail = mysqli_real_escape_string($con, $_POST['ct_detail']);
    $ct_adder = $_SESSION["UserID"];
    $ct_id = $_POST['ct_id'];
    $ct_category = $_POST['ct_category'];
    
    $update = mysqli_query($con, "UPDATE childType SET
            ct_name = '".$ct_name."',
            ct_detail = '".$ct_detail."',
            ct_category = '".$ct_category."'
            WHERE ct_id='$ct_id'
            ");
?>
<meta http-equiv="refresh" content="0; url=?page=childType&&ctpage=editChildType&&id=<?= $ct_id ?>">
