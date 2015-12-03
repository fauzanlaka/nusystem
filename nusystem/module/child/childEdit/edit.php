<?php
    $id = $_GET['id'];
    $child = mysqli_query($con, "SELECT c.*,ct.*,cp.* FROM childs c
                              INNER JOIN childType ct ON c.ct_id=ct.ct_id
                              INNER JOIN childProject cp ON c.cp_id=cp.cp_id WHERE c_id='$id'");
    $rowChild = mysqli_fetch_array($child);
    $fname = str_replace("\'", "&#39;", $rowChild["c_fName"]);
?>
<h5><span class="glyphicon glyphicon-edit"></span> เเก้ไขข้อมูลเด็ก</h5>
<hr>
<ul class="nav nav-tabs">
  <li class="active"><a href="#1" data-toggle="tab" aria-expanded="true">ข้อมูล 1</a></li>
  <li class=""><a href="#2" data-toggle="tab" aria-expanded="false">ข้อมูล 2</a></li>
  <li class=""><a href="#3" data-toggle="tab" aria-expanded="false">ข้อมูล 3</a></li>
  <li class=""><a href="#3" data-toggle="tab" aria-expanded="false">เพิ่มลบสมาชิกในครอบครัว</a></li>
</ul>
<div id="myTabContent" class="tab-content">
  <div class="tab-pane fade active in" id="1">
      <br>
  <div class="pull-right"><font color="red">ขั้นตอนที่ 1 จาก 3</font></div> 
            <div class="pull-left"><font color="gray"><b>1.ข้อมูลส่วนตัว</b></font></div>
            <hr>    
            
                <form class="form-horizontal" action="?page=child&&cpage=step1Save" enctype="multipart/form-data" method="post">
                
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">ชื่อ</label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="fName" placeholder="ชื่อ" value="<?= $fname ?>">
                      </div>
                      <label for="inputEmail" class="col-lg-2 control-label">นามสกุล</label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="lName" placeholder="สกุล" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">เลขบัตรประชาชน </label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" maxlength="13" name="idCard" placeholder="เลขบัตรประชาชน" id="idCard" required>
                        <span class="idCard_avail_result" id="idCard_avail_result"></span>
                      </div>
                      <label for="inputEmail" class="col-lg-2 control-label">วดป เกิด </label>
                      <div class="col-lg-3">
                        <input type="date" class="form-control input-sm" name="bDate" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">นำ้หนัก </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="wieght" placeholder="นำ้หนัก">
                      </div>
                      <label for="inputEmail" class="col-lg-3 control-label">ส่วนสูง </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="hieght" placeholder="ส่วนสูง">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">เบอร์รองเท้า </label>
                      <div class="col-lg-2">
                        <input type="text" class="form-control input-sm"  name="shoeSize" placeholder="เบอร์รองเท้า">
                      </div>
                      <label for="inputEmail" class="col-lg-3 control-label">ขนาดเสือ้ </label>
                      <div class="col-lg-2">
                        <input type="text" class="form-control input-sm"  name="shirtSize" placeholder="ขนาดเสือ้">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">หมู่โลหิต </label>
                      <div class="col-lg-2">
                        <input type="text" class="form-control input-sm"  name="bloodType" placeholder="หมู่โลหิต">
                      </div>
                      <label for="inputEmail" class="col-lg-3 control-label">โรคประจำตัว </label>
                      <div class="col-lg-2">
                        <input type="text" class="form-control input-sm"  name="diseases" placeholder="โรคประจำตัว">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">จำนวนพี่น้อง </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="brethren" placeholder="จำนวนพี่น้อง">
                      </div>
                      <label for="inputEmail" class="col-lg-3 control-label">เป็นบุตรคนที่ </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="sonNumber" placeholder="จำนวนพี่น้อง">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">จำนวนพี่น้องชาย </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="menBrethren" placeholder="จำนวนพี่น้อง">
                      </div>
                      <div class="col-lg-1">
                        คน
                      </div>
                      <label for="inputEmail" class="col-lg-2 control-label">จำนวนพี่น้องหญิง </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="womenBrethren" placeholder="จำนวนพี่น้อง">
                      </div>
                      <div class="col-lg-1">
                        คน
                      </div>
                    </div>
                    <br>
                    <font color="gray"><b>2.สมาชิกในครอบครัว:-</b></font><hr>
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
                                while($rowBrethen = mysqli_fetch_array($brethen)){
                                    $b_fullName = str_replace("\'", "&#39;", $rowBrethen["b_fullName"]);
                            ?>
                            <div class="form-group">
                                    <div class='col-lg-2'>
                                        <input type='text' id="fullName" name="fullName[]" class='form-control input-sm' value="<?= $b_fullName ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='date' id="birthDate" name="birdthDate[]" class='form-control input-sm' value="<?= $rowBrethen['b_birdthDate'] ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="education" name="education[]" class='form-control input-sm' value="<?= $rowBrethen['b_education'] ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="job" name="job[]" class='form-control input-sm' value="<?= $rowBrethen['b_job'] ?>">
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id="telephone" name="telephone[]" class='form-control input-sm' value="<?= $rowBrethen['b_telephone'] ?>">
                                    </div>
     
                            </div>
                                    <?php
                                        }
                                    ?>
                        </div> 
                    </div>
    
                    <p class="text-center">
                        <button type="submit" class="btn btn-success btn-sm">บันทึก</button>
                    </p>
                    
                </form>

  </div>
  <div class="tab-pane fade" id="2">
    <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork.</p>
  </div>
  <div class="tab-pane fade" id="3">
    <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater.</p>
  </div>
</div>