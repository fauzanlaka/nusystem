<?php
    echo "<b>"."กำลังลบข้อมูล กรุณารอสักครู่..."."</b>";

    $id = $_GET['id'];
    $bId = $_GET['bId'];
    
    $delete = mysqli_query($con, "DELETE FROM brethen WHERE b_id='$bId'");
?>
<meta http-equiv="refresh" content="0; url=?page=child&&cpage=edit_1&&tab=4&&id=<?= $id ?>">
