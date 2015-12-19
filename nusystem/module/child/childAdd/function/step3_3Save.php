<?php
    echo "<b>"."กำลังบันทึกข้อมูล กรุณารอสักครู่"."</b>";
    echo "<br>";
    
    $id = $_POST['id'];
    $c_fatherName = mysqli_real_escape_string($con, $_POST['c_fatherName']);
    $c_fatherLname = mysqli_real_escape_string($con, $_POST['c_fatherLname']);
    $c_fBirdthDate = mysqli_real_escape_string($con, $_POST['c_fBirdthDate']);
    $c_fJob = mysqli_real_escape_string($con, $_POST['c_fJob']);
    $c_fRevenue = mysqli_real_escape_string($con, $_POST['c_fRevenue']);
    $c_motherName = mysqli_real_escape_string($con, $_POST['c_motherName']);
    $c_motherLname = mysqli_real_escape_string($con, $_POST['c_motherLname']);
    $c_mBirdthDate = mysqli_real_escape_string($con, $_POST['c_mBirdthDate']);
    $c_mJob = mysqli_real_escape_string($con, $_POST['c_mJob']);
    $c_mRevenue = mysqli_real_escape_string($con, $_POST['c_mRevenue']);
    $c_familyStatus = mysqli_real_escape_string($con, $_POST['familyStatus']);
    
    //Making image rename
    $temp = explode(".", $_FILES["file"]["name"]);
    $newfilename = round(microtime(true)).end($temp);
    
    //Insert data
    if(isset($_POST['save'])){
            if(!empty($_FILES['image']['tmp_name'])){
                if(move_uploaded_file($_FILES["image"]["tmp_name"], "module/child/childAdd/image/" . $newfilename)){
                $insert = mysqli_query($con, "UPDATE childs SET
                                       c_fatherName='$c_fatherName',
                                       c_fatherLname='$c_fatherLname',
                                       c_fBirdthDate='$c_fBirdthDate',
                                       c_fJob='$c_fJob',
                                       c_fRevenue='$c_fRevenue',
                                       c_motherName='$c_motherName',
                                       c_motherLname='$c_motherLname',
                                       c_mBirdthDate='$c_mBirdthDate',
                                       c_mJob='$c_mJob',
                                       c_mRevenue='$c_mRevenue',
                                       c_image='$newfilename',
                                       c_familyStatus='$c_familyStatus'
                                       WHERE c_id='$id'
                                       ");
                echo "<b>"."บันทึกข้อมูลเรียบร้อยเเล้ว"."</b>";
?>
                <meta http-equiv="refresh" content="0; url=?page=child&&cpage=index">
<?php
                }else{
                    echo "<b>"."เกิดข้อมผิดพลาดระหว่างอัพโหลดรูปภาพ กรุณาลองอีกครั้ง"."</b>";
                }
            }else{
                $insert = mysqli_query($con, "UPDATE childs SET
                                       c_fatherName='$c_fatherName',
                                       c_fatherLname='$c_fatherLname',
                                       c_fBirdthDate='$c_fBirdthDate',
                                       c_fJob='$c_fJob',
                                       c_fRevenue='$c_fRevenue',
                                       c_motherName='$c_motherName',
                                       c_motherLname='$c_motherLname',
                                       c_mBirdthDate='$c_mBirdthDate',
                                       c_mJob='$c_mJob',
                                       c_mRevenue='$c_mRevenue'
                                       WHERE c_id='$id'
                                       ");
                echo "<b>"."บันทึกข้อมูลเรียบร้อบเเล้ว"."</b>";
?>
                <meta http-equiv="refresh" content="0; url=?page=child&&cpage=index">      
<?php
            }
    }

?>