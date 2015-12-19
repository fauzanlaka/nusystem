<?php
    $id = $_GET['id'];
    $delete = mysqli_query($con, "DELETE FROM childType WHERE ct_id='$id'");
?>
<meta http-equiv="refresh" content="0; url=?page=childType&&ctpage=childList">