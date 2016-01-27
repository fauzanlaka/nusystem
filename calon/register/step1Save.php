<?php
    $fnameRumi = mysqli_real_escape_string($con, $_POST['fnameRumi']);
    $lnameRumi = mysqli_real_escape_string($con, $_POST['lnameRumi']);
    $t_studentname = mysqli_real_escape_string($con, $_POST['t_studentname']);
    $t_studentlastname = mysqli_real_escape_string($con, $_POST['t_studentlastname']);
    $fnameJawi = mysqli_real_escape_string($con, $_POST['fnameJawi']);
    $lnameJawi = mysqli_real_escape_string($con, $_POST['lnameJawi']);
    $gender = $_POST['gender'];
    $idCard = $_POST['idCard'];
    $birdthDate = mysqli_real_escape_string($con, $_POST['birdthDate']);
    $infection = mysqli_real_escape_string($con, $_POST['infection']);
    $fatherName = mysqli_real_escape_string($con, $_POST['fatherName']);
    $fatherLastname = mysqli_real_escape_string($con, $_POST['fatherLastname']);
    $fatherJob = mysqli_real_escape_string($con, $_POST['fatherJob']);
    $motherName = mysqli_real_escape_string($con, $_POST['motherName']);
    $motherLastname = mysqli_real_escape_string($con, $_POST['motherLastname']);
    $motherJob = mysqli_real_escape_string($con, $_POST['motherJob']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $telephone = mysqli_real_escape_string($con, $_POST['telephone']);
    $t_village_name = mysqli_real_escape_string($con, $_POST['t_village_name']);
    $house_number = mysqli_real_escape_string($con, $_POST['house_number']);
    $place = mysqli_real_escape_string($con, $_POST['place']);
    $t_road = mysqli_real_escape_string($con, $_POST['t_road']);
    $t_subdistrict = mysqli_real_escape_string($con, $_POST['t_subdistrict']);
    $t_district = mysqli_real_escape_string($con, $_POST['t_district']);
    $t_province_sec = mysqli_real_escape_string($con, $_POST['t_province_sec']);
    $post = mysqli_real_escape_string($con, $_POST['post']);
    $ibtidai = mysqli_real_escape_string($con, $_POST['ibtidai']);
    $ibtidaiYear = mysqli_real_escape_string($con, $_POST['ibtidaiYear']);
    $mutawassit = mysqli_real_escape_string($con, $_POST['mutawassit']);
    $mutawassitYear = mysqli_real_escape_string($con, $_POST['mutawassitYear']);
    $sanawi = mysqli_real_escape_string($con, $_POST['sanawi']);
    $sanawiYear = mysqli_real_escape_string($con, $_POST['sanawiYear']);
    $primaryschool = mysqli_real_escape_string($con, $_POST['primaryschool']);
    $primaryschoolYear = mysqli_real_escape_string($con, $_POST['primaryschoolYear']);
    $firsthightschool = mysqli_real_escape_string($con, $_POST['firsthightschool']);
    $firsthightschoolYear = mysqli_real_escape_string($con, $_POST['firsthightschoolYear']);
    $lastthightschool = mysqli_real_escape_string($con, $_POST['lastthightschool']);
    $lastthightschoolYear = mysqli_real_escape_string($con, $_POST['lastthightschoolYear']);
    $melayu_lang_skill = mysqli_real_escape_string($con, $_POST['melayu_lang_skill']);
    $arab_lang_skill = mysqli_real_escape_string($con, $_POST['arab_lang_skill']);
    $ingris_lang_skill = mysqli_real_escape_string($con, $_POST['ingris_lang_skill']);
    $thai_lang_skill = mysqli_real_escape_string($con, $_POST['thai_lang_skill']);
    $certificate = mysqli_real_escape_string($con, $_POST['certificate']);
    $citizen_book = mysqli_real_escape_string($con, $_POST['citizen_book']);
    $id_book = mysqli_real_escape_string($con, $_POST['id_book']);
    $photo = mysqli_real_escape_string($con, $_POST['photo']);
    $idCard = mysqli_real_escape_string($con, $_POST['idCard']);
    $pre_username = "calon2016";
    $pre_password = substr($idCard, 8,13);
    $ibtidaiVillage = mysqli_real_escape_string($con, $_POST['ibtidaiVillage']);
    $mutawassitVillage = mysqli_real_escape_string($con, $_POST['mutawassitVillage']);
    $sanawiVillage = mysqli_real_escape_string($con, $_POST['sanawiVillage']);
    
    //Set faculty and department select
    $first_sid = $_POST['first_sid'];
    $second_sid = $_POST['second_sid'];
    
    if($first_sid == '22' OR $first_sid == '23'){
        $first_ftId = '121';
        $first_dpId = $first_sid;
    }elseif($first_sid == '0'){
        $first_ftId = '121';
        $first_dpId = '22';
    }else{
        $first_ftId = $first_sid;
    }
    
    if($second_sid == '22' OR $second_sid == '23'){
        $second_ftId = '121';
        $second_dpId = $second_sid;
    }elseif($second_sid == '0'){
        $second_ftId = '121';
        $second_dpId = '22';
    }else{
        $second_ftId = $second_sid;
    }
    
    /*
    $first_ftId = $_POST['first_ftId'];
    $first_dpId = $_POST['first_dpId'];
    $second_ftId = $_POST['second_ftId'];
    $second_dpId = $_POST['second_dpId'];
     * 
     */

    
    $insert = mysqli_query($con, "INSERT INTO students
                          (firstname_rumi,lastname_rumi,cityzen_id,
                           firstname_jawi,lastname_jawi,t_studentname,t_studentlastname,gender,birdth_date,disease,father_name,
                           father_lastname,father_job,mother_name,mother_lastname,mother_job,
                           email,t_village_name,house_number,place,t_road,t_subdistrict,t_district,t_province_sec,post,
                           telephone,ibtidai_graduate,ibtidai_graduate_year,mutawasit_graduate,
                           mutawasit_graduate_year,sanawi_graduate,sanawi_graduate_year,down_graduate,
                           down_graduate_year,first_highschool_graduate,first_highschool_graduate_year,
                           second_highschool_graduate,second_highschool_graduate_year,melayu_lang_skill,
                           arab_lang_skill,ingris_lang_skill,thai_lang_skill,certificate,citizen_book,
                           id_book,photo,ibtidaiVillage,mutawassitVillage,sanawiVillage) VALUES
                          ('$fnameRumi','$lnameRumi','$idCard',
                           '$fnameJawi','$lnameJawi','$t_studentname','$t_studentlastname','$gender','$birdthDate','$infection','$fatherName',
                           '$fatherLastname', '$fatherJob','$motherName','$motherName','$motherJob',
                           '$email','$t_village_name ','$house_number ','$place ','$t_road ','$t_subdistrict ',
                           '$t_district ','$t_province_sec ','$post ','$telephone','$ibtidai','$ibtidaiYear',
                           '$mutawassit','$mutawassitYear','$sanawi','$sanawiYear','$primaryschool','$primaryschoolYear',
                           '$firsthightschool','$firsthightschoolYear','$lastthightschool','$lastthightschoolYear',
                           '$melayu_lang_skill','$arab_lang_skill','$ingris_lang_skill','$thai_lang_skill','$certificate',
                           '$citizen_book','$id_book','$photo','$ibtidaiVillage','$mutawassitVillage','$sanawiVillage')
                          ");
    
    $queryMax = mysqli_query($con, "SELECT MAX(st_id) AS stId FROM students");
    $rsQueryMax = mysqli_fetch_array($queryMax);
    
    $presMax = mysqli_query($con, "SELECT MAX(regNumber) AS regNumber FROM pretest");
    $rsReg = mysqli_fetch_array($presMax);
    $maxReg = $rsReg['regNumber'];
    $regNumber = $maxReg+1;
    
    //This data for insert into pretest table
    $st_id = $rsQueryMax['stId'];
    $regisDate = date("Y/m/d");
    
    $insertPretest = mysqli_query($con, "INSERT INTO pretest 
                                 (st_id,regisDate,testClass,testNumber,regNumber,first_ftId,first_dpId,second_ftId,second_dpId,pre_username,pre_password) VALUES 
                                 ('$st_id','$regisDate','0','0','$regNumber','$first_ftId','$first_dpId','$second_ftId','$second_dpId','$pre_username','$pre_password')
                                 ");
?>
<meta http-equiv="refresh" content="0; url=?page=success&&id=<?= $st_id ?>">                                                                   