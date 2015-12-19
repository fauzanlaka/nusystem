<?php
    $ct_name = mysqli_real_escape_string($con, $_POST['ct_name']);
    $ct_detail = mysqli_real_escape_string($con, $_POST['ct_detail']);
    $ct_category = mysqli_real_escape_string($con, $_POST['ct_category']);
    $ct_adder = $_SESSION["UserID"];
    
    $insert = mysqli_query($con, "INSERT INTO childType 
            (ct_name,ct_detail,ct_adder,ct_category) values
            ('$ct_name','$ct_detail','$ct_adder','$ct_category')
            ");
    
    $query = mysqli_query($con, "SELECT * FROM childType WHERE ct_id = (SELECT MAX(ct_id) FROM childType)");
    $result = mysqli_fetch_array($query);
    $ct_name1 = $result['ct_name'];
    $ct_detail1 = $result['ct_detail'];
    $ct_id = $result['ct_id'];
?>
<meta http-equiv="refresh" content="0; url=?page=childType&&ctpage=childList">