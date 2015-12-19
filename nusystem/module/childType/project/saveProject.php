<?php
    echo "<b>"."กำลังบันทึกข้อมูล กรุณารอสักครู่..."."</b>";

    $cp_name = mysqli_real_escape_string($con, $_POST['cp_name']);
    $cp_detail = mysqli_real_escape_string($con, $_POST['cp_detail']);
    $cp_adder = $_SESSION["UserID"];
    
    $insert = mysqli_query($con, "INSERT INTO childProject 
            (cp_name,cp_detail,cp_adder) values
            ('$cp_name','$cp_detail','$cp_adder')
            ");
    
    $query = mysqli_query($con, "SELECT * FROM childProject WHERE cp_id = (SELECT MAX(cp_id) FROM childProject)");
    $result = mysqli_fetch_array($query);
    $cp_name1 = $result['cp_name'];
    $cp_detail1 = $result['cp_detail'];
    $cp_id = $result['cp_id'];
?>
<meta http-equiv="refresh" content="0; url=?page=childType&&ctpage=projectList">  