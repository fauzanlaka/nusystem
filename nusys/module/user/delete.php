<br>
<?php 
    $id = $_GET['id'];
    $delete = "DELETE FROM users WHERE u_id='$id'";
    if(mysqli_query($con,$delete)){?>
        <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>สำเร็จ!</strong> ลบข้อมูลเรียบร้อยเเล้ว.
        </div>
    <?php
    
    }else{
        echo "NO";
    }
?>
