<?php
    $id = $_GET['id'];
    //Get ข้อมูล 1 data
    $child1 = mysqli_query($con, "SELECT c.*,ct.*,cp.* FROM childs c
                              INNER JOIN childType ct ON c.ct_id=ct.ct_id
                              INNER JOIN childProject cp ON c.cp_id=cp.cp_id WHERE c_id='$id'");
    $rowChild1 = mysqli_fetch_array($child1);
    $fname = str_replace("\'", "&#39;", $rowChild1["c_fName"]);
    $lname = str_replace("\'", "&#39;", $rowChild1["c_lName"]);
    $c_idCard = str_replace("\'", "&#39;", $rowChild1["c_idCard"]);
    
    //Get ข้อมูล 2 data
    $childs2 = mysqli_query($con, "SELECT c.*,ct.*,cp.* FROM childs c
                              INNER JOIN childType ct ON c.ct_id=ct.ct_id
                              INNER JOIN childProject cp ON c.cp_id=cp.cp_id WHERE c_id='$id'");
<h5><span class="glyphicon glyphicon-edit"></span> <b>เเก้ไขข้อมูลเด็ก</b></h5>
<hr>
<ul class="nav nav-tabs">
  <li class="active"><a href="#1" data-toggle="tab" aria-expanded="true">ข้อมูล 1</a></li>
  <li class=""><a href="#2" data-toggle="tab" aria-expanded="false">ข้อมูล 2</a></li>
  <li class=""><a href="#3" data-toggle="tab" aria-expanded="false">ข้อมูล 3</a></li>
  <li class=""><a href="#4" data-toggle="tab" aria-expanded="false">ข้อมูล 4</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="1">
      <br>
            <div class="pull-left"><font color="gray"><b>1.ข้อมูลส่วนตัว</b></font></div><br><br>
            
                <form class="form-horizontal" action="?page=child&&cpage=edit1" enctype="multipart/form-data" method="post">
                
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">ชื่อ</label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="fName" placeholder="ชื่อ" value="<?= $fname ?>">
                      </div>
                      <label for="inputEmail" class="col-lg-2 control-label">นามสกุล</label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="lName" value="<?= $lname ?>">
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
                    <div id='TextBoxesGroup'>
                        <div id="TextBoxDiv1">
                            <?php
                                $i = 0 ;
                                while($rowBrethen = mysqli_fetch_array($brethen)){
                                    $b_id = $rowBrethen['b_id'];
                                    $b_fullName = str_replace("\'", "&#39;", $rowBrethen["b_fullName"]);
                            ?>
                            <div class="form-group">
                                    <input type='hidden' name='id[<?= $i ?>]' value='<?= $b_id ?>'>
                                    <div class='col-lg-2'>
                                        <input type='text' id="fullName" name="fullName[<?= $i ?>]" class='form-control input-sm' value="<?= $b_fullName ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='date' id="birthDate" name="birdthDate[<?= $i ?>]" class='form-control input-sm' value="<?= $rowBrethen['b_birdthDate'] ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="education" name="education[<?= $i ?>]" class='form-control input-sm' value="<?= $rowBrethen['b_education'] ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="job" name="job[<?= $i ?>]" class='form-control input-sm' value="<?= $rowBrethen['b_job'] ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="telephone" maxlength="10" name="telephone[<?= $i ?>]" class='form-control input-sm' value="<?= $rowBrethen['b_telephone'] ?>">
                                    </div>
     
                            </div>
                                    <?php
                                        ++$i;
                                        }
                                    ?>
                        </div> 
                    </div>
                    <input type="hidden" name="c_id" value="<?= $id ?>">
                    <p class="text-center">
                        <button type="submit" class="btn btn-success btn-sm">บันทึก</button>
                    </p>
                    
                </form>
  </div>
    <br>
  <div class="tab-pane fade" id="2">
    <div class="pull-left"><font color="gray"><b>3.สถานที่ศึกษา</b></font></div><br><br>
        
            <form class="form-horizontal" action="?page=child&&cpage=edit2" enctype="multipart/form-data" method="post">
                <p class="text-warning"><b>สามัญ</b></p>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">โรงเรียน </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchool" placeholder="โรงเรียน">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">ระดับชั้น </label>
                    <div class="col-lg-2">
                        <select name="generalEucationLevel" class="form-control input-sm">
                            <option value='ประถม'>ประถม</option>
                            <option value='มัธยมต้น'>มัธยมต้น</option>
                            <option value='มัธยมปลาย'>มัธยมปลาย</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">ตำบล </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchoolSubdistrict" placeholder="ตำบล">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">อำเภอ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchoolDistrict" placeholder="อำเภอ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">จังหวัด </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchoolprovince" placeholder="จังหวัด">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">รหัสไปรษณีย์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="generalSchoolPost" placeholder="รหัสไปรษณีย์">
                    </div>
                </div>

                <p class="text-warning"><b>ศาสนา</b></p>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">โรงเรียน </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchool" placeholder="โรงเรียน">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">ระดับชั้น </label>
                    <div class="col-lg-2">
                        <select name="relegionEucationLevel" class="form-control input-sm">
                            <option value='อิบตีดา'>อิบตีดา</option>
                            <option value='มูตาวาซิต'>มูตาวาซิต</option>
                            <option value='ซานาวี'>ซานาวี</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">ตำบล </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchoolSubdistrict" placeholder="ตำบล">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">อำเภอ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchoolDistrict" placeholder="อำเภอ">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">จังหวัด </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchoolprovince" placeholder="จังหวัด">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">รหัสไปรษณีย์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="relegionSchoolPost" placeholder="รหัสไปรษณีย์">
                    </div>
                </div>
                <br>

            <font color="gray"><b>4.ที่อยู่ตามสำเนาทะเบียนบ้าน</b></font><br><br> 
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">บ้านเลขที่ </label>
                    <div class="col-lg-2">
                        <input class="form-control input-sm" name="copoiesHouseNumber" placeholder="บ้านเลขที่">
                    </div>
                    <div class="col-lg-1"></div>
                    <label for="inputEmail" class="col-lg-2 control-label">หมู่ที่ </label>
                    <div class="col-lg-2">
                        <input class="form-control input-sm" name="copiesPlaceNumber" placeholder="หมู่ที่">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">หมู่บ้าน </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesVillage" placeholder="หมู่บ้าน">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">ตำบล </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesSubdistrict" placeholder="คำบล">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">อำเภอ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesDistrict" placeholder="อำเภอ">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">จังหวัด </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesProvince" placeholder="จังหวัด">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">รหัสไปรษณีย์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="copiesPost" placeholder="รหัสไปรษณีย์">
                    </div>
                </div>
                <br>

            <font color="gray"><b>5.ที่อยู่ปัจจุบัน</b></font><hr> 
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">บ้านเลขที่ </label>
                    <div class="col-lg-2">
                        <input class="form-control input-sm" name="houseNumber" placeholder="บ้านเลขที่">
                    </div>
                    <div class="col-lg-1"></div>
                    <label for="inputEmail" class="col-lg-2 control-label">หมู่ที่ </label>
                    <div class="col-lg-2">
                        <input class="form-control input-sm" name="placeNumber" placeholder="หมู่ที่">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">หมู่บ้าน </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="village" placeholder="หมู่บ้าน">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">ตำบล </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="subdistrict" placeholder="ตำบล">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">อำเภอ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="district" placeholder="อำเภอ">
                    </div>
                    <label for="inputEmail" class="col-lg-2 control-label">จังหวัด </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="province" placeholder="จังหวัด">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">รหัสไปรษณีย์ </label>
                    <div class="col-lg-3">
                        <input class="form-control input-sm" name="post" placeholder="รหัสไปรษณีย์">
                    </div>
                </div>
                <br>
            <font color="gray"><b>6.สถานภาพ</b></font>
                    <div class="radio">
                        <label>
                        <input type="radio" name="status" id="optionsRadios1" value="กำพร้าบิดา" checked>
                            <b>กำพร้าบิดา</b> 
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                        <input type="radio" name="status" id="optionsRadios1" value="กำพร้ามารดา" >
                            <b>กำพร้ามารดา</b> 
                        </label>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label>
                        <input type="radio" name="status" id="optionsRadios1" value="กำพร้าบิดาและมารดา" >
                            <b>กำพร้าบิดาและมารดา</b>
                        </label>
                    </div>
                
                <br>
                <input type='hidden' name='id' value='<?= $id ?>'>
                <p class="text-center">
                    <button type="reset" class="btn btn-success btn-sm">ยกเลิก</button>
                    <button type="submit" class="btn btn-success btn-sm">ถัดไป <span class='glyphicon glyphicon-chevron-right'></span></button>
                </p>

            </form>
  </div>
  <div class="tab-pane fade" id="3">
    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
  </div>
  <div class="tab-pane fade" id="4">
    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
  </div>
</div>