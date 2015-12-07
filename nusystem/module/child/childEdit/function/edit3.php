<?php
    echo "<b>"."กำลังบันทึกการแก้ไขข้อมูล กรุณารอสักครู่..."."</b>";

    $id = $_POST['id'];
    
    $c_fatherName = mysqli_real_escape_string($con, $_POST['c_fatherName']);
    $c_fatherLname = mysqli_real_escape_string($con, $_POST['c_fatherLname']);
    $c_fDeathDate = mysqli_real_escape_string($con, $_POST['c_fDeathDate']);
    $c_fOld = mysqli_real_escape_string($con, $_POST['c_fOld']);
    $c_fCauseDeath = mysqli_real_escape_string($con, $_POST['c_fCauseDeath']);
    $c_motherName = mysqli_real_escape_string($con, $_POST['c_motherName']);
    $c_motherLname = mysqli_real_escape_string($con, $_POST['c_motherLname']);
    $c_mDeathDate = mysqli_real_escape_string($con, $_POST['c_mDeathDate']);
    $c_mOld = mysqli_real_escape_string($con, $_POST['c_mOld']);
    $c_mCauseDeath = mysqli_real_escape_string($con, $_POST['c_mCauseDeath']);
    $c_pFname = mysqli_real_escape_string($con, $_POST['c_pFname']);
    $c_pLname = mysqli_real_escape_string($con, $_POST['c_pLname']);
    $c_pBirthDate = mysqli_real_escape_string($con, $_POST['c_pBirthDate']);
    $c_pJob = mysqli_real_escape_string($con, $_POST['c_pJob']);
    $c_pRevenue = mysqli_real_escape_string($con, $_POST['c_pRevenue']);
    $c_pRelation = mysqli_real_escape_string($con, $_POST['c_pRelation']);
    $c_pTelephone = mysqli_real_escape_string($con, $_POST['c_pTelephone']);
    $c_pStatus = mysqli_real_escape_string($con, $_POST['c_pStatus']);
    $c_pOtherStatus = mysqli_real_escape_string($con, $_POST['c_pOtherStatus']);
    $ct_id = mysqli_real_escape_string($con, $_POST['ct_id']);
    $cp_id = mysqli_real_escape_string($con, $_POST['cp_id']);
    
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
                                       c_fDeathDate='$c_fDeathDate',
                                       c_fOld='$c_fOld',
                                       c_fCauseDeath='$c_fCauseDeath',
                                       c_motherName='$c_motherName',
                                       c_motherLname='$c_motherLname',
                                       c_mDeathDate='$c_mDeathDate',
                                       c_mOld='$c_mOld',
                                       c_mCauseDeath='$c_mCauseDeath',
                                       c_pFname='$c_pFname',
                                       c_pLname='$c_pLname',
                                       c_pBirthDate='$c_pBirthDate',
                                       c_pJob='$c_pJob',
                                       c_pRevenue='$c_pRevenue',
                                       c_pRelation='$c_pRelation',
                                       c_pTelephone='$c_pTelephone',
                                       c_pStatus='$c_pStatus',
                                       c_pOtherStatus='$c_pOtherStatus',
                                       c_image='$newfilename',
                                       ct_id='$ct_id',
                                       cp_id='$cp_id'    
                                       WHERE c_id='$id'
                                       ");
                ?>
                <meta http-equiv="refresh" content="0; url=?page=child&&cpage=edit&&tab=3&&id=<?= $id ?>">
                <?php
                }else{
                    echo "<b>"."เกิดข้อมผิดพลาดระหว่างอัพโหลดรูปภาพ กรุณาลองอีกครั้ง"."</b>";
                }
            }else{
                $insert = mysqli_query($con, "UPDATE childs SET
                                       c_fatherName='$c_fatherName',
                                       c_fatherLname='$c_fatherLname',
                                       c_fDeathDate='$c_fDeathDate',
                                       c_fOld='$c_fOld',
                                       c_fCauseDeath='$c_fCauseDeath',
                                       c_motherName='$c_motherName',
                                       c_motherLname='$c_motherLname',
                                       c_mDeathDate='$c_mDeathDate',
                                       c_mOld='$c_mOld',
                                       c_mCauseDeath='$c_mCauseDeath',
                                       c_pFname='$c_pFname',
                                       c_pLname='$c_pLname',
                                       c_pBirthDate='$c_pBirthDate',
                                       c_pJob='$c_pJob',
                                       c_pRevenue='$c_pRevenue',
                                       c_pRelation='$c_pRelation',
                                       c_pTelephone='$c_pTelephone',
                                       c_pStatus='$c_pStatus',
                                       c_pOtherStatus='$c_pOtherStatus',
                                       ct_id='$ct_id',
                                       cp_id='$cp_id'    
                                       WHERE c_id='$id'
                                       ");
            
            ?>
                <meta http-equiv="refresh" content="0; url=?page=child&&cpage=edit&&tab=3&&id=<?= $id ?>">
<?php
            }
    }
?>
