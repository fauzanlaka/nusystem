<?php
    $id = $_GET['id'];
    $edit = mysqli_query($con, "SELECT * FROM users WHERE u_id='$id'");
    $rsedit = mysqli_fetch_array($edit);
    
    $u_fname = str_replace("\'", "&#39;", $rsedit['u_fname']);
    $u_lname = str_replace("\'", "&#39;", $rsedit['u_lname']);
    $u_email = str_replace("\'", "&#39;", $rsedit['u_email']);
    $u_telephone = str_replace("\'", "&#39;", $rsedit['u_telephone']);
    $u_utype = str_replace("\'", "&#39;", $rsedit['u_utype']);
    $u_username = str_replace("\'", "&#39;", $rsedit['u_username']);
    $u_password = str_replace("\'", "&#39;", $rsedit['u_password']);
?>
<br>
<div class="well">
    <form class="form-horizontal" action="?page=user&&userpage=saveedit" enctype="multipart/form-data" method="POST">
        <fieldset>
            <legend><span class="glyphicon glyphicon-edit"></span> แก้ไขข้อมูล</legend>
            <div class="form-group">
              <label class="col-lg-2 control-label">ชื่อ-นามสกุล</label>
              <div class="col-lg-3">
                <input type="text" name="u_fname" class="form-control input-sm" placeholder="ชื่อ" value="<?= $u_fname ?>">
              </div>
              <div class="col-lg-3">
                <input type="text" name="u_lname" class="form-control input-sm" placeholder="นามสกุล" value="<?= $u_lname ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">อีเมล</label>
              <div class="col-lg-3">
                <input type="email" name="u_email"class="form-control input-sm" value="<?= $u_email ?>">
              </div>
              <div class="col-lg-7">
                  <p class="text text-warning"<label class="col-lg-3 control-label">*สามารถละเว้นได้</label></p>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">เบอร์โทรศัพท์</label>
              <div class="col-lg-3">
                <input type="text" name="u_telephone"class="form-control input-sm" value="<?= $u_telephone ?>">
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">ประเภทผู้ใช้</label>
              <div class="col-lg-3">
                    <select required name="u_utype" class="form-control input-sm">
                        <option value=" "<?=$gender == '' ? ' selected="selected"' : ''?>>---------กรุณาเลือก---------</option>
                        <option value="ผู้ดูเเลระบบ" <?=$u_utype == 'ผู้ดูเเลระบบ' ? ' selected="selected"' : ''?>>ผู้ดูเเลระบบ</option>
                        <option value="ฝ่ายข้อมูล" <?=$u_utype == 'ฝ่ายข้อมูล' ? ' selected="selected"' : ''?>>ฝ่ายข้อมูล</option>
                        <option value="คณะกรรมการ" <?=$u_utype == 'คณะกรรมการ' ? ' selected="selected"' : ''?>>คณะกรรมการ</option>
                        <option value="อาสาสมัคร" <?=$u_utype == 'อาสาสมัคร' ? ' selected="selected"' : ''?>>อาสาสมัคร</option>
                        <option value="สมาชิก" <?=$u_utype == 'สมาชิก' ? ' selected="selected"' : ''?>>สมาชิก</option>
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
                <input type="text" class="form-control input-sm" name="u_username" id="username" value="<?= $u_username ?>">  
              </div>
              <div class="col-lg-7">
                  <span class="username_avail_result" id="username_avail_result"></span>
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">รหัสผ่าน</label>
              <div class="col-lg-3">
                <input type="password" class="form-control input-sm" name="u_password" id="password" value="<?= $u_password ?>">              
              </div>
              <div class="col-lg-6">
                <span class="password_strength" id="password_strength"></span>
              </div>
              
            </div>
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">ยกเลิก</button>
                  <button type="submit" class="btn btn-primary" name="save">ตกลง</button>
                </div>
            </div>
        </fieldset>
    </form>
</div>