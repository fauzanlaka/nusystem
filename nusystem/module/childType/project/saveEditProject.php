<?php
    $cp_name = mysqli_real_escape_string($con, $_POST['cp_name']);
    $cp_detail = mysqli_real_escape_string($con, $_POST['cp_detail']);
    $cp_adder = $_SESSION["UserID"];
    $cp_id = $_POST['cp_id'];
    
    $update = mysqli_query($con, "UPDATE childProject SET
            cp_name = '".$cp_name."',
            cp_detail = '".$cp_detail."'
            WHERE cp_id='$cp_id'
            ");
?>
<meta http-equiv="refresh" content="0; url=?page=childType&&ctpage=editProjectType&&id=<?= $cp_id ?>">