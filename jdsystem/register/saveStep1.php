<?php
    $fnameRumi = mysqli_real_escape_string($con, $_POST['fnameRumi']);
    $lnameRumi = mysqli_real_escape_string($con, $_POST['lnameRumi']);
    $fnameEng = mysqli_real_escape_string($con, $_POST['fnameEng']);
    $lnameEng = mysqli_real_escape_string($con, $_POST['lnameEng']);
    $fnameJawi = mysqli_real_escape_string($con, $_POST['fnameJawi']);
    $lnameJawi = mysqli_real_escape_string($con, $_POST['lnameJawi']);
    $gender = $_POST['gender'];
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
    $gender = $_POST['gender'];
    
    $search = mysqli_query($con, "SELECT * FROM students WHERE cityzen_id='$idCard'");
    $rsSearch = mysqli_fetch_array($search);

    //$idCardSearch = $rsSearch['cityzen_id'];
    
    if($rsSearch[0] > 0){
?>
<br>
<div class="col-lg-8 col-lg-offset-2">
    <div class="alert alert-dismissible alert-warning">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Maaf!</h4>
      <p>Anda sudah daftar sebelumnya , Sila hubungi idarah untuk mengurus langkah seterusnya.</p>
    </div>
    </div>
<?php        
    }else{
        
        $insertStudents = mysqli_query($con, "INSERT INTO students 
                              (firstname_rumi,lastname_rumi,cityzen_id,firstname_eng,lastname_eng,
                              firstname_jawi,lastname_jawi,gender,birdth_date,disease,father_name,
                              father_lastname,father_job,mother_name,mother_lastname,mother_job,
                              email,telephone,ibtidai_graduate,ibtidai_graduate_year,mutawasit_graduate,
                              mutawasit_graduate_year,sanawi_graduate,sanawi_graduate_year,down_graduate,
                              down_graduate_year,first_highschool_graduate,first_highschool_graduate_year,
                              second_highschool_graduate,second_highschool_graduate_year,melayu_lang_skill,
                              arab_lang_skill,ingris_lang_skill,thai_lang_skill,certificate,citizen_book,
                              id_book,photo) VALUES 
                              ('$fnameRumi','$lnameRumi','$idCard','$fnameEng','$lnameEng',
                              '$fnameJawi','$lnameJawi','$gender','$birdthDate','$infection','$fatherName',
                              '$fatherLastname', '$fatherJob','$motherName','$motherName','$motherJob',
                              '$email','$telephone','$ibtidai','$ibtidaiYear','$mutawassit',
                              '$mutawassitYear','$sanawi','$sanawiYear','$primaryschool',
                              '$primaryschoolYear','$firsthightschool','$firsthightschoolYear',
                              '$lastthightschool','$lastthightschoolYear','$melayu_lang_skill',
                              '$arab_lang_skill','$ingris_lang_skill','$thai_lang_skill','$certificate','$citizen_book',
                              '$id_book','$photo') 
                              ");
        
        $queryMax = mysqli_query($con, "SELECT MAX(st_id) AS stId FROM students");
        $rsQueryMax = mysqli_fetch_array($queryMax);
        
        //Class process
        //If gender is male
        if($gender == 'Lelaki'){
            $sqlMaleA = mysqli_query($con, "SELECT MAX(testNumber) AS max FROM pretest WHERE testClass='A'");
            $rsSqlMaleA = mysqli_fetch_array($sqlMaleA);
            $maleA = $rsSqlMaleA['max'];
            
            if($maleA == ''){
                $testClassSet = 'A';
                $testNumberSet = 1;
            }elseif($maleA <= 39){
                $testClassSet = 'A';
                $testNumberSet = $maleA+1;
            }else{
                $sqlMaleB = mysqli_query($con, "SELECT MAX(testNumber) as max FROM pretest WHERE testClass='B'");
                $rsSqlMaleB = mysqli_fetch_array($sqlMaleB);
                $maleB = $rsSqlMaleB['max'];
                if($maleB == ''){
                    $testClassSet = 'B';
                    $testNumberSet = 1;
                }elseif($maleB <= 39){
                    $testClassSet = 'B';
                    $testNumberSet = $maleB+1;
                }else{
                    $sqlMaleC = mysqli_query($con, "SELECT MAX(testNumber) as max FROM pretest WHERE testClass='C'");
                    $rsSqlMaleC = mysqli_fetch_array($sqlMaleC);
                    $maleC = $rsSqlMaleC['max'];
                        if($maleC == ''){
                            $testClassSet = 'C';
                            $testNumberSet = 1;
                        }elseif($maleC <= 39){
                            $testClassSet = 'C';
                            $testNumberSet = $maleC+1;
                        }elseif($maleC == 40){
?>
                <br><br><br><br>
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="alert alert-dismissible alert-warning">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <h4>Maaf!</h4>
                      <p>Penuh quata.</p>
                    </div>
                </div>
<?php
                    break;
                        }
                }
            }
        //If gender is female    
        }else{
            $sqlFemaleD = mysqli_query($con, "SELECT MAX(testNumber) AS max FROM pretest WHERE testClass='D'");
            $rsSqlFemaleD = mysqli_fetch_array($sqlFemaleD);
            $femaleD = $rsSqlFemaleD['max'];
            
            if($femaleD == ''){
                $testClassSet = 'D';
                $testNumberSet = 1;
            }elseif($femaleD <= '39'){
                $testClassSet = 'D';
                $testNumberSet = $femaleD+1;
            }else{
                $sqlFemaleE = mysqli_query($con, "SELECT MAX(testNumber) AS max FROM pretest WHERE testClass='E'");
                $rsSqlFemaleE = mysqli_fetch_array($sqlFemaleE);
                $femaleE = $rsSqlFemaleE['max'];
                
                if($femaleE == ''){
                    $testClassSet = 'E';
                    $testNumberSet = 1;
                }elseif($femaleE <= '39'){
                    $testClassSet = 'E';
                    $testNumberSet = $femaleE+1;
                }else{
                    $sqlFemaleF = mysqli_query($con, "SELECT MAX(testNumber) AS max FROM pretest WHERE testClass='F'");
                    $rsSqlFemaleF = mysqli_fetch_array($sqlFemaleF);
                    $femaleF = $rsSqlFemaleF['max'];

                    if($femaleF == ''){
                        $testClassSet = 'F';
                        $testNumberSet = 1;
                    }elseif($femaleF <= '39'){
                        $testClassSet = 'F';
                        $testNumberSet = $femaleF+1;
                    }else{
                        $sqlFemaleG = mysqli_query($con, "SELECT MAX(testNumber) AS max FROM pretest WHERE testClass='G'");
                        $rsSqlFemaleG = mysqli_fetch_array($sqlFemaleG);
                        $femaleG = $rsSqlFemaleG['max'];

                        if($femaleG == ''){
                            $testClassSet = 'G';
                            $testNumberSet = 1;
                        }elseif($femaleG <= '39'){
                            $testClassSet = 'G';
                            $testNumberSet = $femaleG+1;
                        }else{
                            $sqlFemaleH = mysqli_query($con, "SELECT MAX(testNumber) AS max FROM pretest WHERE testClass='H'");
                            $rsSqlFemaleH = mysqli_fetch_array($sqlFemaleH);
                            $femaleH = $rsSqlFemaleH['max'];

                            if($femaleH == ''){
                                $testClassSet = 'H';
                                $testNumberSet = 1;
                            }elseif($femaleH <= '39'){
                                $testClassSet = 'H';
                                $testNumberSet = $femaleH+1;
                            }else{
?>
                                <br><br><br><br>
                                <div class="col-lg-8 col-lg-offset-2">
                                    <div class="alert alert-dismissible alert-warning">
                                      <button type="button" class="close" data-dismiss="alert">×</button>
                                      <h4>Maaf!</h4>
                                      <p>Penuh quata.</p>
                                    </div>
                                </div>
<?php
                                break;
                            }
                        }
                    }
                }
            }
        }
        //This data for insert into pretest table
        $st_id = $rsQueryMax['stId'];
        $regisDate = date("Y/m/d");
        $testClass = $testClassSet;
        $testNumber = $testNumberSet;
        

        $insertPretest = mysqli_query($con, "INSERT INTO pretest 
                        (st_id,regisDate,testClass,testNumber) VALUES 
                        ('$st_id','$regisDate','$testClass','$testNumber')
                        ");
?>
    <br><br><br><br>
    <div class="col-lg-8 col-lg-offset-2">
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Berhasil!</h4>
      <p>Data berhasil di rakam , Sila hubungi idarah untuk mengurus langkah seterusnya.</p>
    </div>
    </div>
<meta http-equiv="refresh" content="0;url=registerNew.php?page=step2&&id=<?= $st_id ?>">
<?php
    }
?>
