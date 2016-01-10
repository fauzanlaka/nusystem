<?php
    $st_id = $_POST['st_id'];
    $pre_id = $_POST['pre_id'];
    
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
    
    $student = mysqli_query($con, "UPDATE students SET
                            firstname_rumi = '$fnameRumi',
                            lastname_rumi = '$lnameRumi',
                            t_studentname = '$t_studentname',
                            t_studentlastname = '$t_studentlastname',
                            firstname_jawi = '$fnameJawi',
                            lastname_jawi = '$lnameJawi',
                            gender = '$gender',
                            cityzen_id = '$idCard',
                            birdth_date = '$birdthDate',
                            disease = '$infection',
                            father_name = '$fatherName',
                            father_lastname = '$fatherLastname',
                            father_job = '$fatherJob',
                            mother_name = '$motherName',
                            mother_lastname = '$motherLastname',
                            mother_job = '$motherJob',
                            email = '$email',
                            telephone = '$telephone',
                            t_village_name = '$t_village_name',
                            house_number = '$house_number',
                            place = '$place',
                            t_road = '$t_road',
                            t_subdistrict = '$t_subdistrict',
                            t_district = '$t_district',
                            t_province_sec = '$t_province_sec',
                            post = '$post',
                            ibtidai_graduate = '$ibtidai',
                            ibtidai_graduate_year = '$ibtidaiYear',
                            mutawasit_graduate = '$mutawassit',
                            mutawasit_graduate_year = '$mutawassitYear',
                            sanawi_graduate = '$sanawi',
                            sanawi_graduate_year = '$sanawiYear',
                            down_graduate = '$primaryschool',
                            down_graduate_year = '$primaryschoolYear',
                            first_highschool_graduate = '$firsthightschool',
                            first_highschool_graduate_year = '$firsthightschoolYear',
                            second_highschool_graduate = '$lastthightschool',
                            second_highschool_graduate_year = '$lastthightschoolYear',
                            melayu_lang_skill = '$melayu_lang_skill',
                            arab_lang_skill = '$arab_lang_skill',
                            ingris_lang_skill = '$ingris_lang_skill',
                            thai_lang_skill = '$thai_lang_skill',
                            certificate  = '$certificate',
                            citizen_book = '$citizen_book',
                            id_book = '$id_book',
                            photo = '$photo'
                            WHERE st_id='$st_id'
                            "); 
    $pretest = mysqli_query($con, "UPDATE pretest SET
                            first_ftId = '$first_ftId',
                            first_dpId = '$first_dpId',
                            second_ftId = '$second_ftId',
                            second_dpId = '$second_dpId'
                            WHERE pre_id='$pre_id'
                            ");
?>

<script>
    alert("Data berhasil di perbaharui! Klik OK");
</script>
<meta http-equiv="refresh" content="0; url=?page=edit&&id=<?= $pre_id ?>">
