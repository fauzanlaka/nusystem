<?php
    echo "<b>"."กำลังลบข้อมมูล กรุณารอสักครู่"."</b>";

    $id = $_GET['id'];
    
    $childDel = mysqli_query($con, "DELETE FROM childs WHERE c_id='$id'");
    
    $brethenDel = mysqli_query($con, "DELETE FROM brethen WHERE c_id='$id'");
?>
<meta http-equiv="refresh" content="0; url=?page=child&&cpage=index">