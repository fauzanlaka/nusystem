<?php
    $id = $_GET['id'];
?>
<h4>
    <div class="pull-left">
        <span class="glyphicon glyphicon-plus-sign"></span> <b>เพิ่มข้อมูลเด็กยากจน</b>
    </div>
</h4>
<br><br>

<div class="pull-right"><font color="red">ขั้นตอนที่ 3 จาก 3</font></div> 
<div class="pull-left"><font color="gray"><b>6.ข้อมูลเกี่ยวกับบิดา และมารดา</b></font></div>
<hr>

<form class="form-horizontal" action="?page=child&&cpage=step3_3Save" enctype="multipart/form-data" method="post">
    <p class="text-warning"><b>บิดา</b></p>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">ชื่อ </label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_fatherName" placeholder="ชื่อ">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">นามสกุล </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="c_fatherLname" placeholder="นามสกุล">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">วัน/เดือน/ปี (เกิด) </label>
        <div class="col-lg-3">
            <input type="date" class="form-control input-sm" name="c_fBirdthDate">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">อายุ</label>
        <div class="col-lg-2">
            <input type="number" class="form-control input-sm" name="c_fOld" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">อาชีพ</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_fJob" placeholder="อาชีพ">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">รายได้</label>
        <div class="col-lg-2">
            <input type="text" class="form-control input-sm" name="c_fRevenue" placeholder="รายได้">
        </div>
        <div class="col-lg-2">บาท/เดือน</div>
    </div>
    
    <p class="text-warning"><b>มารดา</b></p>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">ชื่อ </label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_motherName" placeholder="ชื่อ">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">นามสกุล </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="c_motherLname" placeholder="นามสกุล">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">วัน/เดือน/ปี (เกิด) </label>
        <div class="col-lg-3">
            <input type="date" class="form-control input-sm" name="c_mBirdthDate">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">อายุ</label>
        <div class="col-lg-2">
            <input type="number" class="form-control input-sm" name="c_mOld" disabled>
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">อาชีพ</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_mJob" placeholder="สาเหตุการเสียชีวิต">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">รายได้</label>
        <div class="col-lg-2">
            <input type="text" class="form-control input-sm" name="c_mRevenue" placeholder="รายได้">
        </div>
        <div class="col-lg-2">บาท/เดือน</div>
    </div>
    <br>
    
    <div class="pull-left"><font color="gray"><b>7.อื่นๆ</b></font></div>
    <br>
    <hr>
    
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">เลือกรูปภาพ</label>
        <div class="col-lg-3">
            <input type="file" class="form-control input-sm" name="image" placeholder="สถานภาพ">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">สถานภาพปัจจุบันของครอบครัว</label>
        <div class="col-lg-3">
            <textarea class="form-control input-sm" rows="10" name="familyStatus"></textarea>
        </div>
    </div>

    
    <br>
    
    <input type='hidden' name='id' value='<?= $id ?>'>
    <p class="text-center">
        <button type="reset" class="btn btn-success btn-sm">ยกเลิก</button>
        <button type="submit" class="btn btn-success btn-sm" name="save">บันทึก</button>
    </p>
</form>