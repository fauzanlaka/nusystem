<?php
    echo "<b>"."กำลังบันทึกการแก้ไขข้อมูล กรุณารอสักครู่..."."</b>";

    $id = $_POST['id'];
    
    $generalSchool = mysqli_real_escape_string($con, $_POST['generalSchool']);
    $generalEucationLevel = mysqli_real_escape_string($con, $_POST['generalEucationLevel']);
    $generalSchoolSubdistrict = mysqli_real_escape_string($con, $_POST['generalSchoolSubdistrict']);
    $generalSchoolDistrict = mysqli_real_escape_string($con, $_POST['generalSchoolDistrict']);
    $generalSchoolprovince = mysqli_real_escape_string($con, $_POST['generalSchoolprovince']);
    $generalSchoolPost = mysqli_real_escape_string($con, $_POST['generalSchoolPost']);
    $relegionSchool = mysqli_real_escape_string($con, $_POST['relegionSchool']);
    $relegionEucationLevel = mysqli_real_escape_string($con, $_POST['relegionEucationLevel']);
    $relegionSchoolSubdistrict = mysqli_real_escape_string($con, $_POST['relegionSchoolSubdistrict']);
    $relegionSchoolprovince = mysqli_real_escape_string($con, $_POST['relegionSchoolprovince']);
    $relegionSchoolPost = mysqli_real_escape_string($con, $_POST['relegionSchoolPost']);
    $copoiesHouseNumber = mysqli_real_escape_string($con, $_POST['copoiesHouseNumber']);
    $copiesPlaceNumber = mysqli_real_escape_string($con, $_POST['copiesPlaceNumber']);
    $copiesVillage = mysqli_real_escape_string($con, $_POST['copiesVillage']);
    $copiesSubdistrict = mysqli_real_escape_string($con, $_POST['copiesSubdistrict']);
    $copiesDistrict = mysqli_real_escape_string($con, $_POST['copiesDistrict']);
    $copiesProvince = mysqli_real_escape_string($con, $_POST['copiesProvince']);
    $copiesPost = mysqli_real_escape_string($con, $_POST['copiesPost']);
    $houseNumber = mysqli_real_escape_string($con, $_POST['houseNumber']);
    $placeNumber = mysqli_real_escape_string($con, $_POST['placeNumber']);
    $village = mysqli_real_escape_string($con, $_POST['village']);
    $subdistrict = mysqli_real_escape_string($con, $_POST['subdistrict']);
    $district = mysqli_real_escape_string($con, $_POST['district']);
    $province = mysqli_real_escape_string($con, $_POST['province']);
    $post = mysqli_real_escape_string($con, $_POST['post']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
    
    $UPDATE = mysqli_query($con, "UPDATE childs SET
                            c_generalSchool = '$generalSchool',
                            c_generalEucationLevel = '$generalEucationLevel', 
                            c_generalSchoolSubdistrict = '$generalSchoolSubdistrict',
                            c_generalSchoolDistrict = '$generalSchoolDistrict',
                            c_generalSchoolprovince = '$generalSchoolprovince',
                            c_generalSchoolPost = '$generalSchoolPost',
                            c_relegionSchool = '$relegionSchool',
                            c_relegionEucationLevel = '$relegionEucationLevel',
                            c_relegionSchoolSubdistrict = '$relegionSchoolSubdistrict',
                            c_relegionSchoolprovince = '$relegionSchoolSubdistrict',
                            c_relegionSchoolPost = '$relegionSchoolPost',
                            c_copoiesHouseNumber = '$copoiesHouseNumber',
                            c_copiesPlaceNumber = '$copiesPlaceNumber',
                            c_copiesVillage = '$copiesVillage',
                            c_copiesSubdistrict = '$copiesSubdistrict',
                            c_copiesDistrict = '$copiesDistrict',
                            c_copiesProvince = '$copiesProvince',
                            c_copiesPost = '$copiesPost',
                            c_houseNumber = '$houseNumber',
                            c_placeNumber = '$placeNumber',
                            c_village = '$village',
                            c_subdistrict = '$subdistrict',
                            c_district = '$district',
                            c_province = '$province',
                            c_post = '$post',
                            c_status = '$status'
                            WHERE c_id = '$id'
                            ");
echo $generalEucationLevel;
?>
<meta http-equiv="refresh" content="0; url=?page=child&&cpage=edit&&tab=2&&id=<?= $id ?>">