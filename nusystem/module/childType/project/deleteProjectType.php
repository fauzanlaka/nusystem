<?php
    $id = $_GET['id'];
    
    $delete = mysqli_query($con, "DELETE FROM childProject WHERE cp_id='$id'");
?>
<meta http-equiv="refresh" content="0; url=?page=childType&&ctpage=projectList">