<br>
<div class="well">
    <form class="form-horizontal" action="?page=user&&userpage=saveadd" enctype="multipart/form-data" method="POST">
        <fieldset>
            <legend><span class="glyphicon glyphicon-user"></span> เพิ่มผู้ใช้</legend>
            <div class="form-group">
              <label class="col-lg-2 control-label">ชื่อ-นามสกุล</label>
              <div class="col-lg-3">
                <input type="text" name="u_fname" class="form-control input-sm" placeholder="ชื่อ" required>
              </div>
              <div class="col-lg-3">
                <input type="text" name="u_lname" class="form-control input-sm" placeholder="นามสกุล" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">อีเมล</label>
              <div class="col-lg-3">
                <input type="email" name="u_email"class="form-control input-sm" placeholder="Email">
              </div>
              <div class="col-lg-7">
                  <p class="text text-warning"<label class="col-lg-3 control-label">*สามารถละเว้นได้</label></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">เบอร์โทรศัพท์</label>
              <div class="col-lg-3">
                <input type="text" name="u_telephone"class="form-control input-sm" placeholder="เบอร์โทรศัพท์" required>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">ประเภทผู้ใช้</label>
              <div class="col-lg-3">
                    <select required name="u_utype" class="form-control input-sm">
                        <option>---------กรุณาเลือก---------</option>
                        <option value="ผู้ดูเเลระบบ">ผู้ดูเเลระบบ</option>
                        <option value="ฝ่ายข้อมูล">ฝ่ายข้อมูล</option>
                        <option value="คณะกรรมการ">คณะกรรมการ</option>
                        <option value="อาสาสมัคร">อาสาสมัคร</option>
                        <option value="สมาชิก">สมาชิก</option>
                    </select>
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-lg-2 control-label">รูปโปรไฟล์</label>
              <div class="col-lg-3">
                <input type="file" name="image" class="form-control input-sm">  
              </div>
              <div class="col-lg-7">
                  <p class="text text-warning"<label class="col-lg-3 control-label">*สามารถละเว้นได้</label></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">ชื่อผู้ใช้</label>
              <div class="col-lg-3">
                <input type="text" class="form-control input-sm" name="u_username" id="username" placeholder="Username" required>  
              </div>
              <div class="col-lg-7">
                  <span class="username_avail_result" id="username_avail_result"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">รหัสผ่าน</label>
              <div class="col-lg-3">
                <input type="password" class="form-control input-sm" name="u_password" id="password" placeholder="Password" required>              
              </div>
              <div class="col-lg-6">
                <span class="password_strength" id="password_strength"></span>
              </div>
              
            </div>
            <input type="hidden" name="u_adder" value="<?= $objResult['u_id'] ?>">
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">ยกเลิก</button>
                  <button type="submit" class="btn btn-primary" name="save">ตกลง</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>