<?php
    $id = $_GET['id'];
?>
<h4>
    <div class="pull-left">
        <span class="glyphicon glyphicon-plus-sign"></span> เพิ่มข้อมูลเด็กกำพร้า
    </div>
</h4>
<br><br>

<div class="pull-right"><font color="red">ขั้นตอนที่ 3 จาก 3</font></div> 
<div class="pull-left"><font color="gray"><b>7.ข้อมูลเกี่ยวกับบิดา และมารดา</b></font></div>
<hr>

<form class="form-horizontal" action="?page=child&&cpage=step3Save" enctype="multipart/form-data" method="post">
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
        <label for="inputEmail" class="col-lg-3 control-label">วัน/เดือน/ปี (ที่เสียชีวิต) </label>
        <div class="col-lg-3">
            <input type="date" class="form-control input-sm" name="c_fDeathDate">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">อายุ</label>
        <div class="col-lg-2">
            <input type="number" class="form-control input-sm" name="c_fOld" placeholder="อายุ">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">สาเหตุการเสียชีวิต</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_fCauseDeath" placeholder="สาเหตุการเสียชีวิต">
        </div>
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
        <label for="inputEmail" class="col-lg-3 control-label">วัน/เดือน/ปี (ที่เสียชีวิต) </label>
        <div class="col-lg-3">
            <input type="date" class="form-control input-sm" name="c_mDeathDate" placeholder="ชื่อ">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">อายุ</label>
        <div class="col-lg-2">
            <input type="number" class="form-control input-sm" name="c_mOld" placeholder="อายุ">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">สาเหตุการเสียชีวิต</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_mCauseDeath" placeholder="สาเหตุการเสียชีวิต">
        </div>
    </div>
    <br>
    
    <div class="pull-left"><font color="gray"><b>8.ข้อมูลผู้ปกครอง</b></font></div>
    <br>
    <hr>
    
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">ชื่อ</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_pFname" placeholder="ชื่อ">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">นามสกุล</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_pLname" placeholder="นามสกุล">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">วัน/เดือน/ปี(ที่เกิด)</label>
        <div class="col-lg-3">
            <input type="date" class="form-control input-sm" name="c_pBirthDate">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">อาชีพ</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_pJob" placeholder="อาชีพ">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">รายได้</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_pRevenue" placeholder="สาเหตุการเสียชีวิต">
        </div>
        <label for="inputEmail" class="col-lg-2 control-label">เกี่ยวข้องเป็น</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_pRelation" placeholder="เกี่ยวข้องเป็น">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">เบอร์โทรศัพท์</label>
        <div class="col-lg-3">
            <input type="text" class="form-control input-sm" name="c_pTelephone" placeholder="สาเหตุการเสียชีวิต">
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">สถานภาพ</label>&nbsp;&nbsp;&nbsp;
        <div class="col-lg-2">
            <div class="radio">
                <lablel>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="radio" name="c_pStatus" id="optionsRadios1" value="โสด" checked>
                    <b>โสด</b> 
                </lablel>   
            </div>
        </div>
        <div class="col-lg-2">
            <div class="radio">
                <lablel>
                    <input type="radio" name="c_pStatus" id="optionsRadios1" value="เเต่งงาน">
                    <b>เเต่งงาน</b> 
                </lablel>      
            </div>  
        </div>
        <div class="col-lg-2">
            <div class="radio">
                <lablel>
                    <input type="radio" name="c_pStatus" id="optionsRadios1" value="หม้าย">
                    <b>หม้าย</b> 
                </lablel>     
            </div> 
        </div>
    </div>
    <div class="form-group">
        <label for="inputEmail" class="col-lg-4 control-label">อื่นๆ ระบุ</label>
        <div class="col-lg-5">
            <input type="type" class="form-control input-sm" name="c_pOtherStatus" placeholder="สถานภาพ">
        </div>
    </div>
    <br>
    
    <div class="pull-left"><font color="gray"><b>9.อื่นๆ</b></font></div>
    <br>
    <hr>
    
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">เลือกรูปภาพ</label>
        <div class="col-lg-3">
            <input type="file" class="form-control input-sm" name="image" placeholder="สถานภาพ">
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">ประเภทเด็กกำพร้า</label>
        <div class="col-lg-3">
            <select class="form-control input-sm" name="ct_id">
                <?php
                    $cType = mysqli_query($con, "SELECT * FROM childType WHERE ct_category='1'");
                    while($rowCType = mysqli_fetch_array($cType)){
                ?>
                <option value="<?= $rowCType['ct_id'] ?>"><?= $rowCType['ct_name'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
    </div>
    
    <div class="form-group">
        <label for="inputEmail" class="col-lg-3 control-label">ประเภทโครงการ</label>
        <div class="col-lg-3">
            <select class="form-control input-sm" name="cp_id">
                <?php
                    $cProject = mysqli_query($con, "SELECT * FROM childProject");
                    while($rowCProject = mysqli_fetch_array($cProject)){
                ?>
                <option value="<?= $rowCProject['cp_id'] ?>"><?= $rowCProject['cp_name'] ?></option>
                <?php
                    }
                ?>
            </select>
        </div>
    </div>
    
    <br>
    
    <input type='hidden' name='id' value='<?= $id ?>'>
    <p class="text-center">
        <button type="reset" class="btn btn-success btn-sm">ยกเลิก</button>
        <button type="submit" class="btn btn-success btn-sm" name="save">บันทึก</button>
    </p>
</form>