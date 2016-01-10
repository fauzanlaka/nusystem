<?php
	session_start();
	require_once("connect.php");
        
        $id = $_SESSION['UserID'];
        $getid = $_GET['id'];
        //Get st_id
        $getStid = mysqli_query($con, "SELECT * FROM pretest WHERE pre_id='$id' OR pre_id='$getid'");
        $rowId = mysqli_fetch_array($getStid);
        $id = $rowId['st_id'];

	if(!isset($_SESSION['UserID']))
	{
?>
        <meta http-equiv="refresh" content="0; url=?page=login">
<?php
	}
?>
<br>

<p align="center"><img src="image/jisda.png" class="img-responsive" alt="Responsive image" width="150px" height="1px"></p>

<div class="col-lg-1"></div>
<div class="col-lg-10">
    <div class="panel panel-primary">
        <div class="panel-body">
           <div class="pull-right">
               <a class="btn btn-danger btn-sm" href="?page=logout"> <span class="glyphicon glyphicon-log-out"></span> LOGOUT</a>
           </div> 
            <h3 align="left"><span class="glyphicon glyphicon-edit"></span> UBAH DATA</h3>
            <HR>
            
    <?php
    
    $studen = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE p.st_id='$id'");
    $result = mysqli_fetch_array($studen);
    
    $firstname_rumi = str_replace("\'", "&#39;", $result["firstname_rumi"]);
    $lastname_rumi = str_replace("\'", "&#39;", $result["lastname_rumi"]);
    $t_studentname = str_replace("\'", "&#39;", $result["t_studentname"]);
    $t_studentlastname = str_replace("\'", "&#39;", $result["t_studentlastname"]);
    $firstname_jawi = str_replace("\'", "&#39;", $result["firstname_jawi"]);
    $lastname_jawi = str_replace("\'", "&#39;", $result["lastname_jawi"]);
    $gender = $result['gender'];
    $payStatus = $result['payStatus'];
    $testClass = $result['testClass'];
    $testNumber = $result['testNumber'];
    $regNumber = $result['regNumber'];
    
    //ID for data updating 
    $st_id = $id;
    $pre_id = $result["pre_id"];
    
?>
            <form class="form-horizontal" action="?page=saveEdit" enctype="multipart/form-data" method="POST">

                        <p class="text-success"><b>BAHAGIAN 1 : BIODATA</b></p>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Nama - Nasab :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="Nama" name="fnameRumi" value="<?= $firstname_rumi ?>">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="Nasab" name="lnameRumi" value="<?= $lastname_rumi ?>">
                            </div>
                        </div>


                        <div class="form-group">
                              <label for="inputEmail" class="col-lg-3 control-label">ชื่อ - นามสกุล :</label>
                              <div class="col-lg-2">
                                  <input type="text" class="form-control input-sm" name="t_studentname" value="<?= $t_studentname ?>">
                              </div>
                              <div class="col-lg-2">
                                  <input type="text" class="form-control input-sm" name="t_studentlastname" value="<?= $t_studentlastname ?>">
                              </div>
                        </div>


                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">نام - نسب :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="نام" name="fnameJawi" value="<?= $firstname_jawi ?>">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="نسب" name="lnameJawi" value="<?= $lastname_jawi ?>">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-lg-3 control-label">Jenis kelamin :</label>
                            <div class="col-lg-2">
                                <select class="form-control input-sm" name="gender">
                                    <option value="Lelaki" <?php if($gender == 'Lelaki'){ echo 'selected'; } ?>>Lelaki</option>
                                    <option value="Perempuan" <?php if($gender == 'Perempuan'){ echo 'selected'; } ?>>Perempuan</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label"> No.Kad pengenalan :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="No.Kad pengenalan" name="idCard" value="<?= $result['cityzen_id'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label"> Tarikh lahir :</label>
                            <div class="col-lg-2">
                                <input type="date" class="form-control input-sm" name="birdthDate" value="<?= $result['birdth_date'] ?>">
                            </div>
                            <div class="col-lg-5">
                                <font color="orange"><b>**Tahun masihi  (Contoh : 01/31/1997)</b></font>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label"> Penyakit pembawaan :</label>
                            <div class="col-lg-4">
                                <input type="text" class="form-control input-sm" placeholder="Penyakit pembawaan" name="infection" value="<?= $result['disease'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Nama - Nasab bapa :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="Nama" name="fatherName" value="<?= $result['father_name'] ?>">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="Nasab" name="fatherLastname" value="<?= $result['father_lastname'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Pekerjaan bapa :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="Pekerjaan bapa" name="fatherJob" value="<?= $result['father_job'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Nama - Nasab ibu :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="Nama" name="motherName" value="<?= $result['mother_name'] ?>">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="Nasab" name="motherLastname" value="<?= $result['mother_lastname'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Pekerjaan ibu :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="Pekerjaan ibu" name="motherJob" value="<?= $result['mother_job'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Email :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" placeholder="Email" name="email" value="<?= $result['email'] ?>">
                            </div>
                        </div>

                        <p class="text-success"><b>BAHAGIAN 2 : Alamat (ที่อยู่)</b></p>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">หมู่บ้าน :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm"  name="t_village_name" value="<?= $t_village_name = str_replace("\'", "&#39;", $result["t_village_name"]) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">บ้านเลขที่ :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="house_number" value="<?= $result['house_number'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">หมู่ที่ :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="place" value="<?= $result['place'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">ถนน :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="t_road" value="<?= $result['t_road'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">ตำบล :</label>
                            <div class="col-lg-3">
                                <input type="text" class="form-control input-sm" name="t_subdistrict" value="<?= $t_subdistrict = str_replace("\'", "&#39;", $result["t_subdistrict"]) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">อำเภอ :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="t_district" value="<?= $t_district = str_replace("\'", "&#39;", $result["t_district"]) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">จังหวัด :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="t_province_sec" value="<?= $t_province_sec = str_replace("\'", "&#39;", $result["t_province_sec"]) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">รหัสไปรษณีย์ :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="post" value="<?= $post = str_replace("\'", "&#39;", $result["post"]) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">โทรศัพท์ :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="telephone" value="<?= $telephone = str_replace("\'", "&#39;", $result["telephone"]) ?>">
                            </div>
                        </div>

                        <p class="text-success"><b>BAHAGIAN 3 : Sejarah pendidikan</b></p>

                        <p class="text-info"><b>Pendidikan agama :-</b></p>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Ibtidai :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="ibtidai" value="<?= $ibtidai_graduate = str_replace("\'", "&#39;", $result["ibtidai_graduate"]) ?>">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="ibtidaiYear" value="<?= $ibtidai_graduate = str_replace("\'", "&#39;", $result["ibtidai_graduate_year"]) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Mutawassit :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="mutawassit" value="<?= $mutawasit_graduate = str_replace("\'", "&#39;", $result["mutawasit_graduate"]) ?>">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="mutawassitYear" value="<?= $mutawasit_graduate_year = str_replace("\'", "&#39;", $result["mutawasit_graduate_year"]) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">Sanawi :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="sanawi" value="<?= $sanawi_graduate = str_replace("\'", "&#39;", $result["sanawi_graduate"]) ?>">
                            </div>
                            <label class="col-lg-1 control-label">Tahun</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="sanawiYear" value="<?= $sanawi_graduate_year = str_replace("\'", "&#39;", $result["sanawi_graduate_year"]) ?>">
                            </div>
                        </div>

                        <p class="text-info"><b>Pendidikan akademik :-</b></p>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">โรงเรียนประถม :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="primaryschool" value="<?= $down_graduate = str_replace("\'", "&#39;", $result["down_graduate"]) ?>">
                            </div>
                            <label class="col-lg-1 control-label">ปีที่จบ</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="primaryschoolYear" value="<?= $down_graduate_year = str_replace("\'", "&#39;", $result["down_graduate_year"]) ?>"> 
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">โรงเรียนมัธยมต้น :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="firsthightschool" value="<?= $first_highschool_graduate = str_replace("\'", "&#39;", $result["first_highschool_graduate"]) ?>">
                            </div>
                            <label class="col-lg-1 control-label">ปีที่จบ</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="firsthightschoolYear" value="<?= $first_highschool_graduate_year = str_replace("\'", "&#39;", $result["first_highschool_graduate_year"]) ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail" class="col-lg-3 control-label">โรงเรียนมัธยมปลาย :</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="lastthightschool" value="<?= $second_highschool_graduate = str_replace("\'", "&#39;", $result["second_highschool_graduate"]) ?>">
                            </div>
                            <label class="col-lg-1 control-label">ปีที่จบ</label>
                            <div class="col-lg-2">
                                <input type="text" class="form-control input-sm" name="lastthightschoolYear" value="<?= $second_highschool_graduate_year = str_replace("\'", "&#39;", $result["second_highschool_graduate_year"]) ?>">
                            </div>
                        </div>

                        <p class="text-success"><b>BAHAGIAN 4 : Pengetahuan bahasa</b></p>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa melayu :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Kurang" <?php $mSkill = $result['melayu_lang_skill']; if($mSkill == 'Kurang'){ echo 'checked'; } ?>> Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Cukup"  <?php $mSkill = $result['melayu_lang_skill']; if($mSkill == 'Cukup'){ echo 'checked'; } ?>>  Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="melayu_lang_skill" value="Lancar" <?php $mSkill = $result['melayu_lang_skill']; if($mSkill == 'Lancar'){ echo 'checked'; } ?>> Lancar
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                        <label class="col-lg-3 control-label">Bahasa arab :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Kurang" <?php $aSkill = $result['arab_lang_skill']; if($aSkill == 'Kurang'){ echo 'checked'; } ?>> Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Cukup" <?php $aSkill = $result['arab_lang_skill']; if($aSkill == 'Cukup'){ echo 'checked'; } ?>> Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="arab_lang_skill" value="Lancar" <?php $aSkill = $result['arab_lang_skill']; if($aSkill == 'Lancar'){ echo 'checked'; } ?>> Lancar
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa engris :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Kurang" <?php $eSkill = $result['ingris_lang_skill']; if($eSkill == 'Kurang'){ echo 'checked'; } ?>> Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Cukup" <?php $eSkill = $result['ingris_lang_skill']; if($eSkill == 'Cukup'){ echo 'checked'; } ?>> Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="ingris_lang_skill" value="Lancar" <?php $eSkill = $result['ingris_lang_skill']; if($eSkill == 'Lancar'){ echo 'checked'; } ?>> Lancar
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Bahasa thai :</label>
                            <div class="radio">
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Kurang" <?php $tSkill = $result['thai_lang_skill']; if($tSkill == 'Kurang'){ echo 'checked'; } ?>> Kurang
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Cukup" <?php $tSkill = $result['thai_lang_skill']; if($tSkill == 'Cukup'){ echo 'checked'; } ?>> Cukup
                                </div>
                                <div class="col-lg-2">
                                    <input type="radio" id="lang_skill1" name="thai_lang_skill" value="Lancar" <?php $tSkill = $result['thai_lang_skill']; if($tSkill == 'Lancar'){ echo 'checked'; } ?>> Lancar
                                </div>
                            </div>
                        </div>

                        <p class="text-success"><b>BAHAGIAN 5 : Persyaratan</b></p>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Syahadah / Tasdik asli :</label>
                            <div class="col-lg-2">
                                    <div class="checkbox">
                                        <input type="checkbox" name="certificate" value="1" <?php $certificate = $result['certificate']; if($certificate == '1'){ echo 'checked'; } ?>>   
                                    </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Senarai dapur :</label>
                            <div class="col-lg-2"> 
                                <div class="checkbox">
                                    <input type="checkbox" name="citizen_book" value="1" <?php $citizen_book = $result['citizen_book']; if($citizen_book == '1'){ echo 'checked'; } ?>>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Kad pengenalan :</label>
                            <div class="col-lg-3">
                                <div class="checkbox">
                                    <input type="checkbox" name="id_book" value="1" <?php $id_book = $result['id_book']; if($id_book == '1'){ echo 'checked'; } ?>>
                                </div>
                            </div>        
                        </div>

                        <div class="form-group">
                            <label class="col-lg-3 control-label">Gambar 1 inci 4 keping :</label>	
                            <div class="col-lg-3">
                                <div class="checkbox">
                                    <input type="checkbox" value="1" name="photo" <?php $photo = $result['photo']; if($photo == '1'){ echo 'checked'; } ?>> 
                                </div>       
                            </div>
                        </div>	

                        <p class="text-success"><b>BAHAGIAN 6 : Pilihan kuliah</b></p>
                        
                        <?php
                            $first_ftId = $result['first_ftId'];
                            $first_dpId = $result['first_dpId'];
                            $second_ftId = $result['second_ftId'];
                            $second_dpId = $result['second_dpId'];
                            ?>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Pilihan pertama :</label>
                                <div class="col-lg-3">
                                    <select class="form-control input-sm" name="first_sid" required>
                                        <option></option>
                                        <option value="0">1.Tarbiah islamiah</option>
                                        <option value="22" <?php if($first_dpId == '22'){echo 'selected'; } ?> >-------> Pendidikan agama islam</option>
                                        <option value="23" <?php if($first_dpId == '23'){echo 'selected'; } ?> >-------> Pendidikan bahasa dan sastera melayu</option>
                                        <option value="122" <?php if($first_ftId == '122'){echo 'selected'; } ?> >2.Syariah islamiah</option>
                                        <option value="123" <?php if($first_ftId == '123'){echo 'selected'; } ?> >3.Usuluddin</option>
                                        <option value="124" <?php if($first_ftId == '124'){echo 'selected'; } ?> >4.Dirasat islamiah wa al-arabiah</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-lg-3 control-label">Pilihan kedua :</label>
                                <div class="col-lg-3">
                                    <select class="form-control input-sm" name="second_sid" required>
                                        <option></option>
                                        <option value="0">1.Tarbiah islamiah</option>
                                        <option value="0">1.Tarbiah islamiah</option>
                                        <option value="22" <?php if($second_dpId == '22'){echo 'selected'; } ?> >-------> Pendidikan agama islam</option>
                                        <option value="23" <?php if($second_dpId == '23'){echo 'selected'; } ?> >-------> Pendidikan bahasa dan sastera melayu</option>
                                        <option value="122" <?php if($second_ftId == '122'){echo 'selected'; } ?> >2.Syariah islamiah</option>
                                        <option value="123" <?php if($second_ftId == '123'){echo 'selected'; } ?> >3.Usuluddin</option>
                                        <option value="124" <?php if($second_ftId == '124'){echo 'selected'; } ?> >4.Dirasat islamiah wa al-arabiah</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    <input type="hidden" name="st_id" value="<?= $st_id ?>">
                    <input type="hidden" name="pre_id" value="<?= $pre_id ?>">


                    <p class="text-center">
                            <button type="submit" class="btn btn-success btn-sm"> SIMPAN</button>
                    </p>

            </form>
        </div>
    </div>
</div>