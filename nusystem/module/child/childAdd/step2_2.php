<?php
    $id = $_GET['id'];
?>
<h4>
    <div class="pull-left">
        <span class="glyphicon glyphicon-plus-sign"></span> <b>เพิ่มข้อมูลเด็กยากจน</b>
    </div>
</h4>
<br><br>
            
<div class="pull-right"><font color="red">ขั้นตอนที่ 2 จาก 3</font></div> 
<div class="pull-left"><font color="gray"><b>3.สถานที่ศึกษา</b></font></div>
<hr>   
<form class="form-horizontal" action="?page=child&&cpage=step2_2Save" enctype="multipart/form-data" method="post">
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
        <label for="inputEmail" class="col-lg-2 control-label">ปีที่</label>
        <div class="col-lg-1">
            <input class="form-control input-sm" name="generalSchoolClass" placeholder="ปีที่">
        </div>
        <div class="col-lg-2"></div>
        <label for="inputEmail" class="col-lg-2 control-label">ตำบล </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="generalSchoolSubdistrict" placeholder="ตำบล">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">อำเภอ </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="generalSchoolDistrict" placeholder="อำเภอ">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">จังหวัด </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="generalSchoolprovince" placeholder="จังหวัด">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">รหัสไปรษณีย์ </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="generalSchoolPost" placeholder="รหัสไปรษณีย์">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">เบอร์โทรศัพท์ </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="generalSchoolTel" placeholder="เบอร์โทรศัพท์">
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
        <label for="inputEmail" class="col-lg-2 control-label">ปีที่ </label>
        <div class="col-lg-1">
            <input class="form-control input-sm" name="relegionSchoolClass" placeholder="ปีที่">
        </div>
        <div class="col-lg-2"></div>
        <label for="inputEmail" class="col-lg-2 control-label">ตำบล </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="relegionSchoolSubdistrict" placeholder="ตำบล">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">อำเภอ </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="relegionSchoolDistrict" placeholder="อำเภอ">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">จังหวัด </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="relegionSchoolprovince" placeholder="จังหวัด">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-2 control-label">รหัสไปรษณีย์ </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="relegionSchoolPost" placeholder="รหัสไปรษณีย์">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">โทรศัพท์ </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="relegionSchoolTel" placeholder="โทรศัพท์">
        </div>
    </div>
    <br>

<font color="gray"><b>4.ที่อยู่ตามสำเนาทะเบียนบ้าน</b></font><hr> 
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
        <label for="inputEmail" class="col-lg-2 control-label">โทรศัพท์ </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="copiesTel" placeholder="โทรศัพท์">
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
        <label for="inputEmail" class="col-lg-2 control-label">โทรศัพท์ </label>
        <div class="col-lg-3">
            <input class="form-control input-sm" name="tel" placeholder="โทรศัพท์">
        </div>
    </div>
    <br>

    <br>
    
    <input type='hidden' name='id' value='<?= $id ?>'>
    <p class="text-center">
        <button type="reset" class="btn btn-success btn-sm">ยกเลิก</button>
        <button type="submit" class="btn btn-success btn-sm">ถัดไป <span class='glyphicon glyphicon-chevron-right'></span></button>
    </p>

</form>
