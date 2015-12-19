<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <title>ประวัติส่วนตัว</title>
    
    <style>
        body {
            height: 1000px;
            width: 690px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
        table{
            border-collapse: collapse;
        }
    </style>
    
    <script language="javascript" type="text/javascript">
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    </head>
	<body>
            
            <?php
                include '../../../../connect.php';
                $id = $_GET['id'];
                $child = mysqli_query($con, "SELECT * FROM childs WHERE c_id='$id'");
                $rChild = mysqli_fetch_array($child);
                //Childs 's data
                $c_fName = str_replace("\'", "&#39;", $rChild["c_fName"]);
                $c_lName = str_replace("\'", "&#39;", $rChild["c_lName"]);
                $c_regisDate = $rChild['c_regisDate'];
                $c_code = $rChild['c_code'];
                //Age
                $c= date('Y');
                $y= substr($rChild['c_birdthDate'],0,4);
                $age = $c-$y;

                $c_gender = $rChild['c_gender'];
                $c_birdthDate = $rChild['c_birdthDate'];
                $c_idCard = $rChild['c_idCard'];
                $c_wieght = $rChild['c_wieght'];
                $c_hieght = $rChild['c_hieght'];
                $c_shoeSize = $rChild['c_shoeSize'];
                $c_shirtSize = $rChild['c_shirtSize'];
                $c_bloodType = $rChild['c_bloodType'];
                $c_disease = $rChild['c_disease'];
                $c_brethren = $rChild['c_brethren'];
                $c_sonNumber = $rChild['c_sonNumber'];
                $menBrethren = $rChild['menBrethren'];
                $womenBrethren = $rChild['womenBrethren'];
                
                $c_generalSchool = str_replace("\'", "&#39;", $rChild["c_generalSchool"]);
                $c_generalEucationLevel = str_replace("\'", "&#39;", $rChild["c_generalEucationLevel"]);
                $c_generalSchoolSubdistrict = str_replace("\'", "&#39;", $rChild["c_generalSchoolSubdistrict"]);
                $c_generalSchoolDistrict = str_replace("\'", "&#39;", $rChild["c_generalSchoolDistrict"]);
                $c_generalSchoolprovince = str_replace("\'", "&#39;", $rChild["c_generalSchoolprovince"]);
                $c_generalSchoolPost = str_replace("\'", "&#39;", $rChild["c_generalSchoolPost"]);
                $c_generalSchoolTel = str_replace("\'", "&#39;", $rChild["c_generalSchoolTel"]);
                
                $c_relegionSchool = str_replace("\'", "&#39;", $rChild["c_relegionSchool"]);
                $c_relegionEucationLevel = str_replace("\'", "&#39;", $rChild["c_relegionEucationLevel"]);
                $c_relegionSchoolSubdistrict = str_replace("\'", "&#39;", $rChild["c_relegionSchoolSubdistrict"]);
                $c_relegionSchoolDistrict = str_replace("\'", "&#39;", $rChild["c_relegionSchoolDistrict"]);
                $c_relegionSchoolprovince = str_replace("\'", "&#39;", $rChild["c_relegionSchoolprovince"]);
                $c_relegionSchoolPost = str_replace("\'", "&#39;", $rChild["c_relegionSchoolPost"]);
                $c_relegionSchoolTel = str_replace("\'", "&#39;", $rChild["c_relegionSchoolTel"]);
                
                $c_copoiesHouseNumber = str_replace("\'", "&#39;", $rChild["c_copoiesHouseNumber"]);
                $c_copiesPlaceNumber = str_replace("\'", "&#39;", $rChild["c_copiesPlaceNumber"]);
                $c_copiesVillage = str_replace("\'", "&#39;", $rChild["c_copiesVillage"]);
                $c_copiesSubdistrict = str_replace("\'", "&#39;", $rChild["c_copiesSubdistrict"]);
                $c_copiesDistrict = str_replace("\'", "&#39;", $rChild["c_copiesDistrict"]);
                $c_copiesProvince = str_replace("\'", "&#39;", $rChild["c_copiesProvince"]);
                $c_copiesPost = str_replace("\'", "&#39;", $rChild["c_copiesPost"]);
                $c_copiesTel = str_replace("\'", "&#39;", $rChild["c_copiesTel"]);
                
                $c_houseNumber = str_replace("\'", "&#39;", $rChild["c_houseNumber"]);
                $c_placeNumber = str_replace("\'", "&#39;", $rChild["c_placeNumber"]);
                $c_village = str_replace("\'", "&#39;", $rChild["c_village"]);
                $c_subdistrict = str_replace("\'", "&#39;", $rChild["c_subdistrict"]);
                $c_district = str_replace("\'", "&#39;", $rChild["c_district"]);
                $c_province = str_replace("\'", "&#39;", $rChild["c_province"]);
                $c_post = str_replace("\'", "&#39;", $rChild["c_post"]);
                $c_status = str_replace("\'", "&#39;", $rChild["c_status"]);
                $c_tel = str_replace("\'", "&#39;", $rChild["c_tel"]);
                
                $c_fatherName = str_replace("\'", "&#39;", $rChild["c_fatherName"]);
                $c_fatherLname = str_replace("\'", "&#39;", $rChild["c_fatherLname"]);
                $c_fDeathDate = str_replace("\'", "&#39;", $rChild["c_fDeathDate"]);
                $c_fOld = str_replace("\'", "&#39;", $rChild["c_fOld"]);
                $c_fCauseDeath = str_replace("\'", "&#39;", $rChild["c_fCauseDeath"]);
                
                $c_motherName = str_replace("\'", "&#39;", $rChild["c_motherName"]); 
                $c_motherLname = str_replace("\'", "&#39;", $rChild["c_motherLname"]);
                $c_mDeathDate = str_replace("\'", "&#39;", $rChild["c_mDeathDate"]);
                $c_mOld = str_replace("\'", "&#39;", $rChild["c_mOld"]);
                $c_mCauseDeath = str_replace("\'", "&#39;", $rChild["c_mOld"]);
                
                $c_pFname = str_replace("\'", "&#39;", $rChild["c_pFname"]);
                $c_pLname = str_replace("\'", "&#39;", $rChild["c_pLname"]);
                $c_pBirthDate = str_replace("\'", "&#39;", $rChild["c_pBirthDate"]);
                $c_pJob = str_replace("\'", "&#39;", $rChild["c_pJob"]);
                $c_pRevenue = str_replace("\'", "&#39;", $rChild["c_pRevenue"]);
                $c_pRelation = str_replace("\'", "&#39;", $rChild["c_pRelation"]);
                $c_pTelephone = str_replace("\'", "&#39;", $rChild["c_pTelephone"]);
                $c_pStatus = str_replace("\'", "&#39;", $rChild["c_pStatus"]);
                $c_pOtherStatus = str_replace("\'", "&#39;", $rChild["c_pOtherStatus"]);
                $y= substr($rChild['c_pBirthDate'],0,4);
                $pAge = $c-$y;
                
                $c_familyStatus = str_replace("\'", "&#39;", $rChild["c_familyStatus"]);
            ?>
            
            <div id="printableArea">
                     <h4 align="center">ทะเบียนประวัติ</h4>
                     <div class="pull-right">
                         <p><img align="right" src="../image/<?= $rChild["c_image"] ?>" style="width:130px;height:130px;"></p>
                         <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><?= $c_code ?></b></p>
                     </div>
                         <p><b>1.ประวัติส่วนตัว</b></p>
                         <p>รหัสประจำตัว : <i><u><?= $c_code ?></u></i> ลงทะเบียนเมื่อ : <i><u><?= $c_regisDate ?></u></i></p>
                         <p>ชื่อ-นามสกุล : <font color="grey"><i><u><?= $c_fName ?></u> <u><?= $c_lName ?></u></i></font></p>
                         <p>อายุ : <font color="grey"><i><u><?= $age ?></u></i></font> ปี เพศ : <i><u><?php if($c_gender == 1){ echo "ชาย"; }else{ echo "หญิง"; } ?></u> </i></p>
                         <p>วันที่/เดือน/ปีที่เกิด : <i><u><?= $c_birdthDate ?></u></i></p>
                         <p>เลขบัตรประชาชน : <i><u><?= $c_idCard ?></u></i></p>
                         <p>น้ำหนัก : <i><u><?= $c_wieght ?></u></i> กก. ส่วนสูง : <i><u><?= $c_hieght ?></u></i> ซม. เบอร์รองเท้า : <i><u><?= $c_shoeSize ?></u></i></p>
                         <p>ขนาดเสื้อ : <i><u><?= $c_shirtSize ?></u></i> กก. หมู่โลหิต : <i><?= $c_bloodType ?></i> โรคประจำตัว : <?= $c_disease ?> </p>
                         <p>จำนวนพี่น้องในครอบครัวของเด็ก : <i><u><?= $c_brethren ?></u></i> คน ชาย : <i><u><?= $menBrethren ?></u></i> คน หญิง : <i><u><?= $womenBrethren ?></u></i> คน เป็นบุตรคนที่ : <i><u><?= $c_sonNumber ?></u></i></p>
                         <p><b>สมาชิกในครอบครัว</b></p>
                         <table class="table table-bordered">
                             <tr>
                                 <td align="center"><b>ที่</b></td>
                                 <td align="center"><b>ชื่อ-สกุล</b></td>
                                 <td align="center"><b>วัน/เดือน/ปี (เกิด)</b></td>
                                 <td align="center"><b>อายุ</b></td>
                                 <td align="center"><b>ระดับการศึกษา</b></td>
                                 <td align="center"><b>อาชีพ</b></td>
                                 <td align="center"><b>เบอร์โทรศัพท์</b></td>
                             </tr>
                             <?php
                                $i = 1 ;
                                $brethen = mysqli_query($con, "SELECT * FROM brethen WHERE c_id='$id'");
                                while($rBrethen = mysqli_fetch_array($brethen)){
                                    $b_fullName = str_replace("\'", "&#39;", $rBrethen["b_fullName"]);
                                    $b_birdthDate = $rBrethen['b_birdthDate'];
                                    //Age
                                    $c= date('Y');
                                    $y= substr($rBrethen['b_birdthDate'],0,4);
                                    $bAge = $c-$y;
                                    
                                    $b_education = str_replace("\'", "&#39;", $rBrethen["b_education"]);
                                    $b_job = str_replace("\'", "&#39;", $rBrethen["b_job"]);
                                    $b_telephone = $rBrethen['b_telephone'];
                             ?>    
                             <tr>
                                 <td align="center"><?= $i ?></td>
                                 <td align="left"><?= $b_fullName ?></td>
                                 <td align="center"><?= $b_birdthDate ?></td>
                                 <td align="center"><?= $bAge ?></td>
                                 <td align="center"><?= $b_education ?></td>
                                 <td align="center"><?= $b_job ?></td>
                                 <td align="center"><?= $b_telephone ?></td>
                             </tr>
                             <?php
                                 ++$i;
                               }
                             ?>
                         </table>
                         <p><b>2. สถานที่ศึกษา</b></p>
                         <p><i>สามัญ</i></p>
                         <p>โรงเรียน : <i><u><?= $c_generalSchool ?></u></i> ระดับชั้น : <i><u><?= $c_generalEucationLevel ?></u></i> ปีที่ : ตำบล : <i><u><?= $c_generalSchoolSubdistrict ?></u></i> อำเภอ : <i><u><?= $c_generalSchoolDistrict ?></u></i> จังหวัด : <i><u><?= $c_generalSchoolprovince ?></u></i></p>
                         <p>รหัสไปรษณีย์ : <i><u><?= $c_generalSchoolPost ?></u></i> เบอร์โทรศัพท์ : <i><u><?= $c_generalSchoolTel ?></u></i></p>
                         
                         <p><i>ศาสนา</i></p>
                         <p>โรงเรียน : <i><?= $c_relegionSchool ?></i> ระดับชั้น : <i><?= $c_relegionEucationLevel ?></i> ปีที่ : ตำบล : <i><?= $c_relegionSchoolSubdistrict ?></i> อำเภอ : <i><?= $c_relegionSchoolDistrict ?></i> จังหวัด : <i><?= $c_relegionSchoolprovince ?></i></p>
                         <p>รหัสไปรษณีย์ : <i><?= $c_relegionSchoolPost ?></i> เบอร์โทรศัพท์ : <i><u><?= $c_relegionSchoolTel ?></u></i></p>
                         
                         <p><b>3. ที่อยู่ตามสำเนาทะเบียนบ้าน</b></p>
                         <p>บ้านเลขที่ : <i><?= $c_copoiesHouseNumber  ?></i> หมู่บ้าน : <i><?= $c_copiesVillage ?></i> หมู่ที่ : <i><?= $c_copiesPlaceNumber  ?></i> ตำบล : <i><?= $c_copiesSubdistrict ?></i> อำเภอ : <i><?= $c_copiesDistrict  ?></i> จังหวัด : <i><?= $c_copiesProvince  ?></i></p>
                         <p>รหัสไปรษณีย์ : <i><?= $c_copiesPost  ?></i> เบอร์โทรศัพท์ : <i><u><?= $c_copiesTel ?></u></i></p>
                         
                         <p><b>4. ที่อยู่ปัจจุบัน</b></p>
                         <p>บ้านเลขที่ : <i><?= $c_houseNumber  ?></i> หมู่บ้าน : <i><?= $c_village ?></i> หมู่ที่ : <i><?= $c_placeNumber  ?></i> ตำบล : <i><?= $c_subdistrict ?></i> อำเภอ : <i><?= $c_district  ?></i> จังหวัด : <i><?= $c_province  ?></i></p>
                         <p>รหัสไปรษณีย์ : <i><?= $c_post  ?></i> เบอร์โทรศัพท์ : <i><u><?= $c_tel ?></u></i></p>
                         
                         <p><b>5. สถานภาพ</b></p>
                         <p><i><u><?= $c_status ?></u></i></p>
                         
                         <p><b>6. ข้อมูลเกี่ยวกับบิดา และมารดา</b></p>
                         <p><i>บิดา</i></p>
                         <p>ชื่อ-นามสกุล : <i><u><?= $c_fatherName  ?></u></i> <i><u><?= $c_fatherLname  ?></u></i> วัน/เดือน/ปี (ที่เสียชีวิต) : <i><u><?= $c_fDeathDate  ?></u></i> อายุ : <i><u><?= $c_fOld   ?></u></i> ปี </p>
                         <p>สาเหตุการเสียชีวิต : <i><u><?= $c_fCauseDeath  ?></u></i> </p>

                         <p><i>มารดา</i></p>
                         <p>ชื่อ-นามสกุล : <i><u><?= $c_motherName  ?></u></i> <i><u><?= $c_motherLname   ?></u></i> วัน/เดือน/ปี (ที่เสียชีวิต) : <i><u><?= $c_mDeathDate  ?></u></i> อายุ : <i><u><?= $c_mOld  ?></u></i> ปี </p>
                         <p>สาเหตุการเสียชีวิต : <i><u><?= $c_mCauseDeath  ?></u></i> </p>
                         
                         <p><b>8. ข้อมูลผู้ปกครอง</b></p>
                         <p>ชื่อ-นามสกุล : <i><u><?= $c_pFname  ?></u></i> <i><u><?= $c_pLname   ?></u></i> วัน/เดือน/ปี(ที่เกิด) : <i><u><?= $c_pBirthDate  ?></u></i> อายุ : <i><u><?= $pAge ?></u></i> ปี อาชีพ : <i><u><?= $c_pJob  ?></u></i> รายได้ : <i><u><?= $c_pRevenue  ?></u></i> บาท/เดือน</p>
                         <p>เกี่ยวข้องเป็น : <i><u><?= $c_pRelation  ?></u></i> เบอร์โทรศัพท์ : <i><u><?= $c_pTelephone  ?></u></i> สถานภาพ : <i><u><?= $c_pStatus  ?></u></i> <i><u><?= $c_pOtherStatus  ?></u></i> </p>
                         
                         <p><b>9. สถานภาพปัจจุบันของครอบครัว</b></p>
                         <p><i><?= $c_familyStatus ?></i></p>
            </div>     

            <p class="text-center">
                <button type="button" class="btn btn-success btn-sm" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
            </p>
            <br>
    </body>
</html>
