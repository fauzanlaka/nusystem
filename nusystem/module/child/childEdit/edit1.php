<?php
    $id = $_GET['id'];
    
    //Nav tab setting
    $tab = $_GET['tab'];
    if($tab == ""){
        $tab = 1;
    }else{
        $tab = $tab;
    }
    
    //Get ข้อมูล 1 data
    $child1 = mysqli_query($con, "SELECT c.*,ct.*,cp.* FROM childs c
                              INNER JOIN childType ct ON c.ct_id=ct.ct_id
                              INNER JOIN childProject cp ON c.cp_id=cp.cp_id WHERE c_id='$id'");
    $rowChild1 = mysqli_fetch_array($child1);
    $fname = str_replace("\'", "&#39;", $rowChild1["c_fName"]);
    $lname = str_replace("\'", "&#39;", $rowChild1["c_lName"]);
    $c_idCard = str_replace("\'", "&#39;", $rowChild1["c_idCard"]);
    $c_regisDate = str_replace("\'", "&#39;", $rowChild1["c_regisDate"]);
    $c_gender = $rowChild1['c_gender'];
    //$c_gender = $rowChild1['c_regisDate'];
    //$year = date("Y", strtotime($rowChild1['c_regisDate']));
    
    //Get ข้อมูล 2 data
    $c_generalSchool = str_replace("\'", "&#39;", $rowChild1["c_generalSchool"]);
    $c_generalEucationLevel = str_replace("\'", "&#39;", $rowChild1["c_generalEucationLevel"]);
    $c_generalSchoolSubdistrict = str_replace("\'", "&#39;", $rowChild1["c_generalSchoolSubdistrict"]);
    $c_generalSchoolDistrict = str_replace("\'", "&#39;", $rowChild1["c_generalSchoolDistrict"]);
    $c_generalSchoolprovince = str_replace("\'", "&#39;", $rowChild1["c_generalSchoolprovince"]);
    $c_generalSchoolPost = str_replace("\'", "&#39;", $rowChild1["c_generalSchoolPost"]);
    $c_relegionSchool = str_replace("\'", "&#39;", $rowChild1["c_relegionSchool"]);
    $c_relegionEucationLevel = str_replace("\'", "&#39;", $rowChild1["c_relegionEucationLevel"]);
    $c_relegionSchoolSubdistrict = str_replace("\'", "&#39;", $rowChild1["c_relegionSchoolSubdistrict"]);
    $c_relegionSchoolDistrict = str_replace("\'", "&#39;", $rowChild1["c_relegionSchoolDistrict"]);
    $c_relegionSchoolprovince = str_replace("\'", "&#39;", $rowChild1["c_relegionSchoolprovince"]);
    $c_relegionSchoolPost = str_replace("\'", "&#39;", $rowChild1["c_relegionSchoolPost"]);
    $c_copoiesHouseNumber = str_replace("\'", "&#39;", $rowChild1["c_copoiesHouseNumber"]);
    $c_copiesPlaceNumber = str_replace("\'", "&#39;", $rowChild1["c_copiesPlaceNumber"]);
    $c_copiesVillage = str_replace("\'", "&#39;", $rowChild1["c_copiesVillage"]);
    $c_copiesSubdistrict = str_replace("\'", "&#39;", $rowChild1["c_copiesSubdistrict"]);
    $c_copiesDistrict = str_replace("\'", "&#39;", $rowChild1["c_copiesDistrict"]);
    $c_copiesProvince = str_replace("\'", "&#39;", $rowChild1["c_copiesProvince"]);
    $c_copiesPost = str_replace("\'", "&#39;", $rowChild1["c_copiesPost"]);
    $c_houseNumber = str_replace("\'", "&#39;", $rowChild1["c_houseNumber"]);
    $c_placeNumber = str_replace("\'", "&#39;", $rowChild1["c_placeNumber"]);
    $c_village = str_replace("\'", "&#39;", $rowChild1["c_village"]);
    $c_subdistrict = str_replace("\'", "&#39;", $rowChild1["c_subdistrict"]);
    $c_district = str_replace("\'", "&#39;", $rowChild1["c_district"]);
    $c_province = str_replace("\'", "&#39;", $rowChild1["c_province"]);
    $c_post = str_replace("\'", "&#39;", $rowChild1["c_post"]);
    $c_status = str_replace("\'", "&#39;", $rowChild1["c_status"]);
    $c_generalSchoolClass = str_replace("\'", "&#39;", $rowChild1["c_generalSchoolClass"]);
    $c_generalSchoolTel = str_replace("\'", "&#39;", $rowChild1["c_generalSchoolTel"]);
    $c_relegionSchoolClass = str_replace("\'", "&#39;", $rowChild1["c_relegionSchoolClass"]);
    $c_relegionSchoolTel = str_replace("\'", "&#39;", $rowChild1["c_relegionSchoolTel"]);
    $c_copiesTel = str_replace("\'", "&#39;", $rowChild1["c_copiesTel"]);
    $c_copiesTel = str_replace("\'", "&#39;", $rowChild1["c_copiesTel"]);
    $c_tel = str_replace("\'", "&#39;", $rowChild1["c_tel"]);
    $c_familyStatus = str_replace("\'", "&#39;", $rowChild1["c_familyStatus"]);
    
    //Get ข้อมูล 3 data
    $c_fatherName = str_replace("\'", "&#39;", $rowChild1["c_fatherName"]);
    $c_fatherLname =  str_replace("\'", "&#39;", $rowChild1['c_fatherLname']);
    $c_fDeathDate =  str_replace("\'", "&#39;", $rowChild1['c_fDeathDate']);
    $c_fOld = str_replace("\'", "&#39;", $rowChild1['c_fOld']);
    $c_fCauseDeath = str_replace("\'", "&#39;", $rowChild1['c_fCauseDeath']);
    $c_motherName = str_replace("\'", "&#39;", $rowChild1['c_motherName']);
    $c_motherLname = str_replace("\'", "&#39;", $rowChild1['c_motherLname']);
    $c_mDeathDate = str_replace("\'", "&#39;", $rowChild1['c_mDeathDate']);
    $c_mOld = str_replace("\'", "&#39;", $rowChild1['c_mOld']);
    $c_mCauseDeath = str_replace("\'", "&#39;", $rowChild1['c_mCauseDeath']);
    $c_pFname = str_replace("\'", "&#39;", $rowChild1['c_pFname']);
    $c_pLname = str_replace("\'", "&#39;", $rowChild1['c_pLname']);
    $c_pBirthDate = str_replace("\'", "&#39;", $rowChild1['c_pBirthDate']);
    $c_pJob = str_replace("\'", "&#39;", $rowChild1['c_pJob']);
    $c_pRevenue = str_replace("\'", "&#39;", $rowChild1['c_pRevenue']);
    $c_pRelation = str_replace("\'", "&#39;", $rowChild1['c_pRelation']);
    $c_pTelephone = str_replace("\'", "&#39;", $rowChild1['c_pTelephone']);
    $c_pStatus = str_replace("\'", "&#39;", $rowChild1['c_pStatus']);
    $c_pOtherStatus = str_replace("\'", "&#39;", $rowChild1['c_pOtherStatus']);
    $ct_id = str_replace("\'", "&#39;", $rowChild1['ct_id']);
    $cp_id = str_replace("\'", "&#39;", $rowChild1['cp_id']);
    
?>
<h5><span class="glyphicon glyphicon-edit"></span> <b>เเก้ไขข้อมูลเด็ก</b></h5>

<ul class="nav nav-tabs">
  <li class="<?php if($tab == 1){ echo 'active'; } ?>"><a href="#1" data-toggle="tab" aria-expanded="<?php if($tab == 1){ echo 'true'; } ?>">ข้อมูล 1</a></li>
  <li class="<?php if($tab == 2){ echo 'active'; } ?>"><a href="#2" data-toggle="tab" aria-expanded="<?php if($tab == 2){ echo 'true'; } ?>">ข้อมูล 2</a></li>
  <li class="<?php if($tab == 3){ echo 'active'; } ?>"><a href="#3" data-toggle="tab" aria-expanded="<?php if($tab == 3){ echo 'true'; } ?>">ข้อมูล 3</a></li>
  <li class="<?php if($tab == 4){ echo 'active'; } ?>"><a href="#4" data-toggle="tab" aria-expanded="<?php if($tab == 4){ echo 'true'; } ?>">ข้อมูล 4</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  
  <div class="tab-pane fade <?php if($tab == 1){ echo 'active in'; } ?>" id="1"><!-- ข้อมูล 1 -->
      <br>
            <div class="pull-left"><font color="gray"><b>1.ข้อมูลส่วนตัว</b></font></div><br><br>
            
                <form class="form-horizontal" action="?page=child&&cpage=edit1" enctype="multipart/form-data" method="post">
                
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">ชื่อ</label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="fName" value="<?= $fname ?>">
                      </div>
                      <label for="inputEmail" class="col-lg-2 control-label">นามสกุล</label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="lName" value="<?= $lname ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">ลงทะเบียนเมื่อ </label>
                      <div class="col-lg-3">
                        <input type="date" class="form-control input-sm"  name="regisDate" value='<?= $c_regisDate ?>'>
                      </div>
                      <label for="inputEmail" class="col-lg-2 control-label">เพศ </label>
                      <div class="col-lg-2">
                          <select class='form-control input-sm' name='gender'>
                              <option value='1' <?php if($c_gender == 1){echo "selected";} ?>>ชาย</option>
                              <option value='2' <?php if($c_gender == 2){echo "selected";} ?>>หญิง</option>
                          </select>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">เลขบัตรประชาชน </label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" maxlength="13" name="idCard" value="<?= $c_idCard ?>" id="idCard">
                        <span class="idCard_avail_result" id="idCard_avail_result"></span>
                      </div>
                      <label for="inputEmail" class="col-lg-2 control-label">วดป เกิด </label>
                      <div class="col-lg-3">
                        <input type="date" class="form-control input-sm" name="bDate" value="<?= $rowChild1['c_birdthDate'] ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">นำ้หนัก </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="wieght" value="<?= $rowChild1['c_wieght'] ?>">
                      </div>
                      <label for="inputEmail" class="col-lg-3 control-label">ส่วนสูง </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="hieght" value="<?= $rowChild1['c_hieght'] ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">เบอร์รองเท้า </label>
                      <div class="col-lg-2">
                        <input type="text" class="form-control input-sm"  name="shoeSize" value="<?= $rowChild1['c_shoeSize'] ?>">
                      </div>
                      <label for="inputEmail" class="col-lg-3 control-label">ขนาดเสือ้ </label>
                      <div class="col-lg-2">
                        <input type="text" class="form-control input-sm"  name="shirtSize" value="<?= $rowChild1['c_shirtSize'] ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">หมู่โลหิต </label>
                      <div class="col-lg-2">
                        <input type="text" class="form-control input-sm"  name="bloodType" value="<?= $rowChild1['c_bloodType'] ?>">
                      </div>
                      <label for="inputEmail" class="col-lg-3 control-label">โรคประจำตัว </label>
                      <div class="col-lg-2">
                        <input type="text" class="form-control input-sm"  name="diseases" value="<?= $rowChild1['c_disease'] ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">จำนวนพี่น้อง </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="brethren" value="<?= $rowChild1['c_brethren'] ?>">
                      </div>
                      <label for="inputEmail" class="col-lg-3 control-label">เป็นบุตรคนที่ </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="sonNumber" value="<?= $rowChild1['c_sonNumber'] ?>">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">จำนวนพี่น้องชาย </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="menBrethren" value="<?= $rowChild1['menBrethren'] ?>">
                      </div>
                      <div class="col-lg-1">
                        คน
                      </div>
                      <label for="inputEmail" class="col-lg-2 control-label">จำนวนพี่น้องหญิง </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="womenBrethren" value="<?= $rowChild1['womenBrethren'] ?>">
                      </div>
                      <div class="col-lg-1">
                        คน
                      </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">ประเภทเด็กกำพร้า</label>
                        <div class="col-lg-2">
                            <select class="form-control input-sm" name="ct_id">
                                <?php
                                    $cType = mysqli_query($con, "SELECT * FROM childType WHERE ct_category='1'");
                                    while($rowCType = mysqli_fetch_array($cType)){
                                ?>
                                <option value="<?= $rowCType['ct_id'] ?>" <?php if($ct_id == $rowCType['ct_id']){ echo 'selected'; } ?>><?= $rowCType['ct_name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                        
                        <label for="inputEmail" class="col-lg-3 control-label">ประเภทโครงการ</label>
                        <div class="col-lg-2">
                            <select class="form-control input-sm" name="cp_id">
                                <?php
                                    $cProject = mysqli_query($con, "SELECT * FROM childProject");
                                    while($rowCProject = mysqli_fetch_array($cProject)){
                                ?>
                                <option value="<?= $rowCProject['cp_id'] ?>" <?php if($cp_id == $rowCProject['cp_id']){ echo 'selected'; } ?>><?= $rowCProject['cp_name'] ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="inputEmail" class="col-lg-2 control-label">ลงทะเบียนเมื่อ </label>
                        <div class="col-lg-2">
                            <input type="date" class="form-control input-sm"  name="regisDate" value="<?= $c_regisDate ?>">
                        </div>
                   </div>
                    
                    <br>
                    <font color="gray"><b>2.สมาชิกในครอบครัว:-</b></font><br><br>
                    <div class="form-group">
                        <div class='col-lg-2'>
                        <p class="text-center"><font color="orange"><b>ชื่อ-นามสกุล</b></font></p>
                        </div>
                        <div class='col-lg-2'>
                            <p class="text-center"><font color="orange"><b>วดป เกิด</b></font></p>
                        </div>
                        <div class='col-lg-2'>
                            <p class="text-center"><font color="orange"><b>ระดับการศึกษา</b></font></p>
                        </div>
                        <div class='col-lg-2'>
                            <p class="text-center"><font color="orange"><b>อาชีพ</b></font></p>
                        </div>
                        <div class='col-lg-2'>
                            <p class="text-center"><font color="orange"><b>เบอร์โทรศัพท์</b></font></p>
                        </div>
                    </div>
                    
                    <?php
                        $brethen = mysqli_query($con, "SELECT * FROM brethen WHERE c_id='$id'"); 
                    ?>
                            <?php
                                $i = 0 ;
                                while($rowBrethen = mysqli_fetch_array($brethen)){
                                    $b_id = $rowBrethen['b_id'];
                                    $b_fullName = str_replace("\'", "&#39;", $rowBrethen["b_fullName"]);
                            ?>
                            <div class="form-group">
                                    <input type='hidden' name='id[<?= $i ?>]' value='<?= $b_id ?>'>
                                    <div class='col-lg-2'>
                                        <input type='text' name="fullName[<?= $i ?>]" class='form-control input-sm' value="<?= $b_fullName ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='date' name="birdthDate[<?= $i ?>]" class='form-control input-sm' value="<?= $rowBrethen['b_birdthDate'] ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' name="education[<?= $i ?>]" class='form-control input-sm' value="<?= $rowBrethen['b_education'] ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' name="job[<?= $i ?>]" class='form-control input-sm' value="<?= $rowBrethen['b_job'] ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' maxlength="10" name="telephone[<?= $i ?>]" class='form-control input-sm' value="<?= $rowBrethen['b_telephone'] ?>">
                                    </div>
     
                            </div>
                                    <?php
                                        ++$i;
                                        }
                                    ?>
                    <input type="hidden" name="c_id" value="<?= $id ?>">
                    <p class="text-center">
                        <button type="submit" class="btn btn-success btn-sm">บันทึก</button>
                    </p>
                    
                </form>
  </div><!-- /ข้อมูล 1 -->
  <br>
  
  <div class="tab-pane fade <?php if($tab == 2){ echo 'active in'; } ?>" id="2"><!-- ข้อมูล 2 -->
    <div class="pull-left"><font color="gray"><b>3.สถานที่ศึกษา</b></font></div><br><br>
        
            <form class="form-horizontal" action="?page=child&&cpage=edit2" enctype="multipart/form-data" method="post">
                <p class="text-warning"><b>สามัญ</b></p>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">โรงเรียน </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchool" value="<?= $c_generalSchool ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">ระดับชั้น </label>
                    <div class="col-lg-2">
                        <select name="generalEucationLevel" class="form-control input-sm">
                            <option value='ประถม' <?= $c_generalEucationLevel == 'ประถม' ? ' selected="selected"' : ''?>>ประถม</option>
                            <option value='มัธยมต้น' <?= $c_generalEucationLevel == 'มัธยมต้น' ? ' selected="selected"' : ''?>>มัธยมต้น</option>
                            <option value='มัธยมปลาย' <?= $c_generalEucationLevel == 'มัธยมปลาย' ? ' selected="selected"' : ''?>>มัธยมปลาย</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">ปีที่</label>
                    <div class="col-lg-1">
                        <input class="form-control input-sm" name="generalSchoolClass" value="<?= $c_generalSchoolClass ?>">
                    </div>
                    <div class="col-lg-2"></div>
                    <label for="inputEmail" class="col-lg-2 control-label">ตำบล </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchoolSubdistrict" value="<?= $c_generalSchoolSubdistrict ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">อำเภอ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchoolDistrict" value="<?= $c_generalSchoolDistrict ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">จังหวัด </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchoolprovince" value="<?= $c_generalSchoolprovince ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">รหัสไปรษณีย์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchoolPost" value="<?= $c_generalSchoolPost ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">เบอร์โทรศัพท์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchoolTel" value="<?= $c_generalSchoolTel ?>">
                    </div>
                </div>

                <p class="text-warning"><b>ศาสนา</b></p>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">โรงเรียน </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchool" value="<?= $c_relegionSchool ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">ระดับชั้น </label>
                    <div class="col-lg-2">
                        <select name="relegionEucationLevel" class="form-control input-sm">
                            <option value='อิบตีดา' <?= $c_relegionEucationLevel == 'อิบตีดา' ? ' selected="selected"' : ''?>>อิบตีดา</option>
                            <option value='มูตาวาซิต' <?= $c_relegionEucationLevel == 'มูตาวาซิต' ? ' selected="selected"' : ''?>>มูตาวาซิต</option>
                            <option value='ซานาวี' <?= $c_relegionEucationLevel == 'ซานาวี' ? ' selected="selected"' : ''?>>ซานาวี</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">ปีที่ </label>
                    <div class="col-lg-1">
                        <input class="form-control input-sm" name="relegionSchoolClass" value="<?= $c_relegionSchoolClass ?>">
                    </div>
                    <div class="col-lg-2"></div>
                    <label for="inputEmail" class="col-lg-2 control-label">ตำบล </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchoolSubdistrict" value="<?= $c_relegionSchoolSubdistrict ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">อำเภอ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchoolDistrict" value="<?= $c_relegionSchoolDistrict ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">จังหวัด </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchoolprovince" value="<?= $c_relegionSchoolprovince ?>">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">รหัสไปรษณีย์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchoolPost" value="<?= $c_relegionSchoolPost ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">โทรศัพท์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchoolTel" value="<?= $c_relegionSchoolTel ?>">
                    </div>
                </div>
                <br>

            <font color="gray"><b>4.ที่อยู่ตามสำเนาทะเบียนบ้าน</b></font><br><br> 
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">บ้านเลขที่ </label>
                    <div class="col-lg-2">
                        <input class="form-control input-sm" name="copoiesHouseNumber" value="<?= $c_copoiesHouseNumber ?>">
                    </div>
                    <div class="col-lg-1"></div>
                    <label for="inputEmail" class="col-lg-2 control-label">หมู่ที่ </label>
                    <div class="col-lg-2">
                        <input class="form-control input-sm" name="copiesPlaceNumber" value="<?= $c_copiesPlaceNumber ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">หมู่บ้าน </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesVillage" value="<?= $c_copiesVillage ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">ตำบล </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesSubdistrict" value="<?= $c_copiesSubdistrict ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">อำเภอ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesDistrict" value="<?= $c_copiesDistrict ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">จังหวัด </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesProvince" value="<?= $c_copiesProvince ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">รหัสไปรษณีย์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesPost" value="<?= $c_copiesPost ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">โทรศัพท์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesTel" value="<?= $c_copiesTel ?>">
                    </div>
                </div>
                <br>

            <font color="gray"><b>5.ที่อยู่ปัจจุบัน</b></font>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">บ้านเลขที่ </label>
                    <div class="col-lg-2">
                        <input class="form-control input-sm" name="houseNumber" value="<?= $c_houseNumber ?>">
                    </div>
                    <div class="col-lg-1"></div>
                    <label for="inputEmail" class="col-lg-2 control-label">หมู่ที่ </label>
                    <div class="col-lg-2">
                        <input class="form-control input-sm" name="placeNumber" value="<?= $c_placeNumber ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">หมู่บ้าน </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="village" value="<?= $c_village ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">ตำบล </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="subdistrict" value="<?= $c_subdistrict ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">อำเภอ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="district" value="<?= $c_district ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">จังหวัด </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="province" value="<?= $c_province ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">รหัสไปรษณีย์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="post" value="<?= $c_post ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">โทรศัพท์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="tel" value="<?= $c_tel ?>">
                    </div>
                </div>
                <br>
                
            <?php
            
            ?>
            <font color="gray"><b>6.สถานภาพ</b></font>
                    <div class="radio">
                        <label>
                        <input type="radio" name="status" id="optionsRadios1" value="กำพร้าบิดา" <?php if($c_status == 'กำพร้าบิดา'){ echo "checked";} ?>>
                            <b>กำพร้าบิดา</b> 
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                        <input type="radio" name="status" id="optionsRadios1" value="กำพร้ามารดา" <?php if($c_status == 'กำพร้ามารดา'){ echo "checked";} ?>>
                            <b>กำพร้ามารดา</b> 
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                        <input type="radio" name="status" id="optionsRadios1" value="กำพร้าบิดาและมารดา" <?php if($c_status == 'กำพร้าบิดาและมารดา'){ echo "checked";} ?>>
                            <b>กำพร้าบิดาและมารดา</b>
                        </label>
                    </div>
                
                <br>
                <input type='hidden' name='id' value='<?= $id ?>'>
                <p class="text-center">
                    <button type="submit" class="btn btn-success btn-sm">บันทึก</button>
                </p>

            </form>
  </div><!-- /ข้อมูล 2 -->
  
  <div class="tab-pane fade <?php if($tab == 3){ echo 'active in'; } ?>" id="3"><!-- ข้อมูล 3 -->
      
      <div class="pull-left"><font color="gray"><b>7.ข้อมูลเกี่ยวกับบิดา และมารดา</b></font></div>
      <br><br>

            <form class="form-horizontal" action="?page=child&&cpage=edit3" enctype="multipart/form-data" method="post">
                <p class="text-warning"><b>บิดา</b></p>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">ชื่อ </label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="c_fatherName" value="<?= $c_fatherName ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">นามสกุล </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="c_fatherLname" value="<?= $c_fatherLname ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">วัน/เดือน/ปี (ที่เสียชีวิต) </label>
                    <div class="col-lg-3">
                        <input type="date" class="form-control input-sm" name="c_fDeathDate" value="<?= $c_fDeathDate ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">อายุ</label>
                    <div class="col-lg-2">
                        <input type="number" class="form-control input-sm" name="c_fOld" value="<?= $c_fOld ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">สาเหตุการเสียชีวิต</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="c_fCauseDeath" value="<?= $c_fCauseDeath ?>">
                    </div>
                </div>

                <p class="text-warning"><b>มารดา</b></p>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">ชื่อ </label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="c_motherName" value="<?= $c_motherName ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">นามสกุล </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="c_motherLname" value="<?= $c_motherLname ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">วัน/เดือน/ปี (ที่เสียชีวิต) </label>
                    <div class="col-lg-3">
                        <input type="date" class="form-control input-sm" name="c_mDeathDate" value="<?= $c_mDeathDate ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">อายุ</label>
                    <div class="col-lg-2">
                        <input type="number" class="form-control input-sm" name="c_mOld" value="<?= $c_mOld ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">สาเหตุการเสียชีวิต</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="c_mCauseDeath" value="<?= $c_mCauseDeath ?>">
                    </div>
                </div>
                <br>

                <div class="pull-left"><font color="gray"><b>8.ข้อมูลผู้ปกครอง</b></font></div>
                <br><br>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">ชื่อ</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="c_pFname" value="<?= $c_pFname ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">นามสกุล</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="c_pLname" value="<?= $c_pLname ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">วัน/เดือน/ปี(ที่เกิด)</label>
                    <div class="col-lg-3">
                        <input type="date" class="form-control input-sm" name="c_pBirthDate" value="<?= $c_pBirthDate ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">อาชีพ</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="c_pJob" value="<?= $c_pJob ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">รายได้</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="c_pRevenue" value="<?= $c_pRevenue ?>">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">เกี่ยวข้องเป็น</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="c_pRelation" value="<?= $c_pRelation ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">เบอร์โทรศัพท์</label>
                    <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="c_pTelephone" value="<?= $c_pTelephone ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">สถานภาพ</label>
                    <div class="col-lg-2">
                        <div class="radio">
                            <lablel>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="c_pStatus" id="optionsRadios1" value="โสด" <?php if ($c_pStatus == "โสด"){ echo 'checked'; } ?> >
                                <b>โสด</b> 
                            </lablel>   
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="radio">
                            <lablel>
                                <input type="radio" name="c_pStatus" id="optionsRadios1" value="เเต่งงาน" <?php if ($c_pStatus == "เเต่งงาน"){ echo 'checked'; } ?>>
                                <b>เเต่งงาน</b> 
                            </lablel>      
                        </div>  
                    </div>
                    <div class="col-lg-2">
                        <div class="radio">
                            <lablel>
                                <input type="radio" name="c_pStatus" id="optionsRadios1" value="หม้าย" <?php if ($c_pStatus == "หม้าย"){ echo 'checked'; } ?>>
                                <b>หม้าย</b> 
                            </lablel>     
                        </div> 
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3"></label>
                    <div class="col-lg-2">
                        <input type="radio" name="c_pStatus" id="optionsRadios1" value="อื่นๆ" <?php if ($c_pStatus == "อื่นๆ"){ echo 'checked'; } ?>>
                        &nbsp;&nbsp;<b>อื่นๆ ระบุ :</b> 
                    </div> 
                    <div class="col-lg-3">
                         <input type="text" class="form-control input-sm" name="c_pOtherStatus" value="<?= $c_pOtherStatus ?>">
                    </div> 
                </div>
                <br>

                <div class="pull-left"><font color="gray"><b>9.อื่นๆ</b></font></div>
                <br><br>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">เลือกรูปภาพ</label>
                    <div class="col-lg-3">
                        <input type="file" class="form-control input-sm" name="image" placeholder="สถานภาพ">
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-3 control-label">สถานภาพปัจจุบันของครอบครัว</label>
                    <div class="col-lg-9">
                        <textarea class="form-control input-sm" rows="10" name="familyStatus"><?= $c_familyStatus ?></textarea>
                    </div>
                </div>

                <br>

                <input type='hidden' name='id' value='<?= $id ?>'>
                <p class="text-center">
                    <button type="submit" class="btn btn-success btn-sm" name="save">บันทึก</button>
                </p>
            </form>

  </div><!-- /ข้อมูล 3 -->
  
  <div class="tab-pane fade <?php if($tab == 4){ echo 'active in'; } ?>" id="4"><!-- ข้อมูล 4 -->
      <div class="pull-left"><font color="gray"><b>สมาชิกในครอบครัว</b></font></div><br><br>
      
      <form class="form-horizontal" action="?page=child&&cpage=step1Save" enctype="multipart/form-data" method="post">
                   <div class="form-group">
                        <div class='col-lg-2'>
                        <p class="text-center"><font color="orange"><b>ชื่อ-นามสกุล</b></font></p>
                        </div>
                        <div class='col-lg-2'>
                            <p class="text-center"><font color="orange"><b>วดป เกิด</b></font></p>
                        </div>
                        <div class='col-lg-2'>
                            <p class="text-center"><font color="orange"><b>ระดับการศึกษา</b></font></p>
                        </div>
                        <div class='col-lg-2'>
                            <p class="text-center"><font color="orange"><b>อาชีพ</b></font></p>
                        </div>
                        <div class='col-lg-2'>
                            <p class="text-center"><font color="orange"><b>เบอร์โทรศัพท์</b></font></p>
                        </div>
                    </div>
                    
                    <?php
                        $brethen1 = mysqli_query($con, "SELECT * FROM brethen WHERE c_id='$id'"); 
                    ?>

                            <?php
                                $i1 = 0 ;
                                while($rowBrethen1 = mysqli_fetch_array($brethen1)){
                                    $b_id1 = $rowBrethen1['b_id'];
                                    $b_fullName1 = str_replace("\'", "&#39;", $rowBrethen1["b_fullName"]);
                            ?>
                            <div class="form-group">
                                    <input type='hidden' name='id[<?= $i ?>]' value='<?= $b_id1 ?>'>
                                    <div class='col-lg-2'>
                                        <input type='text' id="fullName" name="fullName[<?= $i1 ?>]" class='form-control input-sm' value="<?= $b_fullName1 ?>" disabled>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='date' id="birthDate" name="birdthDate[<?= $i1 ?>]" class='form-control input-sm' value="<?= $rowBrethen1['b_birdthDate'] ?>" disabled>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="education" name="education[<?= $i1 ?>]" class='form-control input-sm' value="<?= $rowBrethen1['b_education'] ?>" disabled>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="job" name="job[<?= $i1 ?>]" class='form-control input-sm' value="<?= $rowBrethen1['b_job'] ?>" disabled>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="telephone" maxlength="10" name="telephone[<?= $i1 ?>]" class='form-control input-sm' value="<?= $rowBrethen1['b_telephone'] ?>" disabled>
                                    </div>
                                    <div class='col-lg-2'>
                                        <a href="?page=child&&cpage=bdel&&id=<?= $id ?>&&bId=<?= $b_id1 ?>" onclick="return confirm('คุณเเน่ใจหรือไม่ว่าจะลบข้อมูลนี้ ?');"><span class="glyphicon glyphicon-trash"></span></a>                                    
                                    </div>
     
                            </div>
                                    <?php
                                        ++$i1;
                                        }
                                    ?>
      </form>
      <form class="form-horizontal" action="?page=child&&cpage=edit4&&id=<?= $id ?>" enctype="multipart/form-data" method="post">

                    <div id='TextBoxesGroup'>
                        <div id="TextBoxDiv1">
                            <div class="form-group">
                                   <input type="hidden" id='textbox1' id="part_id" name="part_id[]" class='form-control input-sm' placeholder='ชื่อ-นามสกุล'>
                                    <div class='col-lg-2'>
                                        <input type='text' id="fullName" name="fullName[]" class='form-control input-sm' placeholder='ชื่อ-นามสกุล' required>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='date' id="birthDate" name="birdthDate[]" class='form-control input-sm' placeholder='วดป เกิด'>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="education" name="education[]" class='form-control input-sm' placeholder='ระดับการศึกษา'>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="job" name="job[]" class='form-control input-sm' placeholder='อาชีพ'>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="telephone" name="telephone[]" class='form-control input-sm' placeholder='เบอร์โทรศัพท์'>
                                    </div>
                                    <div class='col-lg-2'>
                                        <button type='button' class="btn btn-success btn-sm" id='addButton'>+</button>
                                        <button type='button' class="btn btn-success btn-sm" id='removeButton'>-</button>                                      
                                    </div>
                            </div>
                        </div> 
                    </div>
                    
          <p class="text-center">
              <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่ม</button>
          </p>
                </form>


  </div><!-- ข้อมูล /4 -->
  
</div>