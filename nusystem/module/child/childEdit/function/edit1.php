<?php
    $c_id = $_POST['c_id'];
    echo "<b>"."กำลังบันทึกข้อมูล กรุณารอสักครู่..."."</b>";
    //Childs's data
    $fName = mysqli_real_escape_string($con, $_POST['fName']);
    $lName = mysqli_real_escape_string($con, $_POST['lName']);
    $idCard = mysqli_real_escape_string($con, $_POST['idCard']);
    $bDate = mysqli_real_escape_string($con, $_POST['bDate']);
    $wieght = mysqli_real_escape_string($con, $_POST['wieght']);
    $hieght = mysqli_real_escape_string($con, $_POST['hieght']);
    $shoeSize = mysqli_real_escape_string($con, $_POST['shoeSize']);
    $shirtSize = mysqli_real_escape_string($con, $_POST['shirtSize']);
    $bloodType = mysqli_real_escape_string($con, $_POST['bloodType']);
    $diseases = mysqli_real_escape_string($con, $_POST['diseases']);
    $brethren = mysqli_real_escape_string($con, $_POST['brethren']);
    $sonNumber = mysqli_real_escape_string($con, $_POST['sonNumber']);
    $menBrethren = mysqli_real_escape_string($con, $_POST['menBrethren']);
    $womenBrethren = mysqli_real_escape_string($con, $_POST['womenBrethren']);
    
    $UPDATE = mysqli_query($con, "UPDATE childs SET
                           c_fName = '$fName',
                           c_lName = '$lname',
                           c_idCard = '$idCard',
                           c_birdthDate = '$bDate',
                           c_wieght = '$wieght',
                           c_hieght = '$hieght',
                           c_shoeSize = '$shoeSize',
                           c_shirtSize = '$shirtSize',
                           c_bloodType = '$bloodType',
                           c_disease = '$diseases',
                           c_brethren = '$brethren',
                           c_sonNumber = '$sonNumber',
                           menBrethren = '$menBrethren',
                           womenBrethren = '$womenBrethren'
                           WHERE c_id='$c_id'
                          ");
    
    $size = count($_POST['id']);

    $i = 0;
    while($i < $size) {
            $fullName = mysqli_real_escape_string($con, $_POST['fullName'][$i]);
            $birdthDate = $_POST['birdthDate'][$i];
            $education = mysqli_real_escape_string($con, $_POST['education'][$i]);
            $job = mysqli_real_escape_string($con, $_POST['job'][$i]);
            $telephone = $_POST['telephone'][$i];
            $id = $_POST['id'][$i];

            $query = mysqli_query($con, "UPDATE brethen SET 
                                 b_fullName = '$fullName', 
                                 b_birdthDate = '$birdthDate',
                                 b_education = '$education',
                                 b_job = '$job',
                                 b_telephone = '$telephone'
                                 WHERE b_id = '$id' LIMIT 1") ;
            ++$i;
    }
?>
<meta http-equiv="refresh" content="0; url=?page=child&&cpage=edit&&id=<?= $c_id ?>">