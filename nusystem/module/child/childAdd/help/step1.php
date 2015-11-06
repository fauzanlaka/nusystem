    <div class="panel panel-primary">
        <div class="panel-body">
            <div class="scrollbar" id="style-3">
                <font color="gray"><b>1.ข้อมูลส่วนตัว</b></font><hr>
                <form class="form-horizontal" action="?page=child&&cpage=step1Save" enctype="multipart/form-data" method="post">
                
                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">ชื่อ</label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="fName" placeholder="ชื่อ" required>
                      </div>
                      <label for="inputEmail" class="col-lg-2 control-label">นามสกุล</label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" name="lName" placeholder="สกุล" required>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="inputEmail" class="col-lg-2 control-label">เลขบัตรประชาชน </label>
                      <div class="col-lg-3">
                        <input type="text" class="form-control input-sm" maxlength="13" name="idCard" placeholder="เลขบัตรประชาชน" required>
                      </div>
                      <label for="inputEmail" class="col-lg-2 control-label">วดป เกิด </label>
                      <div class="col-lg-3">
                        <input type="date" class="form-control input-sm" maxlength="14" name="birdthDate" required>
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
                        <input type="number" class="form-control input-sm"  name="shoeSize" placeholder="เบอร์รองเท้า">
                      </div>
                      <label for="inputEmail" class="col-lg-3 control-label">ขนาดเสือ้ </label>
                      <div class="col-lg-2">
                        <input type="number" class="form-control input-sm"  name="shirtSize" placeholder="ขนาดเสือ้">
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
                    
                  
                    <div id='TextBoxesGroup'>
                        <div id="TextBoxDiv1">
                            <div class="form-group">    
                                    <div class='col-lg-2'>
                                        <input type='text' id='textbox1' name="fullName" class='form-control input-sm' placeholder='ชื่อ-นามสกุล'>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='date' id='textbox1' name="birthDate" class='form-control input-sm' placeholder='วดป เกิด'>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id='textbox1' name="education" class='form-control input-sm' placeholder='ระดับการศึกษา'>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id='textbox1' name="job" class='form-control input-sm' placeholder='อาชีพ'>
                                    </div>
                                    <div class='col-lg-2'>
                                        <input type='text' id='textbox1' name="telephone" class='form-control input-sm' placeholder='เบอร์โทรศัพท์'>
                                    </div>
                                    <div class='col-lg-2'>
                                        <button type='button' class="btn btn-success btn-sm" id='addButton'>+</button>
                                        <button type='button' class="btn btn-success btn-sm" id='removeButton'>-</button>                                      
                                    </div>
                            </div>
                        </div> 
                    </div>
    
                    <p class="text-center">
                        <button type="reset" class="btn btn-success btn-sm">ยกเลิก</button>
                        <button type="submit" class="btn btn-success btn-sm">ถัดไป <span class='glyphicon glyphicon-chevron-right'></span></button>
                    </p>
                    
                </form>
                
            </div>
    </div>  
</div>
