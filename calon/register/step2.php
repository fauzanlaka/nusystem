<?php
	$id = $_GET['id'];
?>

<br>
<div class="pull-left"><b><font color="green">Langkah 2</font></b></div>
<p align="center"><img src="image/jisda.png" class="img-responsive" alt="Responsive image" width="150px" height="1px"></p>
<h4 align="center">جامعة الشيخ داود الفطاني اﻹسلامية - جالا </h4>
<h5 align="center"><b>PENERIMAAN MAHASISWA BARU TAHUN AKADEMIK 2016</b></h5>
<fieldset>
    <form class="form-horizontal" action="?page=saveStep1" enctype="multipart/form-data" method="POST">
        <div class="col-lg-10 col-lg-offset-2">
            <p class="text-success"><b>ส่วนที่ 1 : ข้อมูลทั่วไป</b></p>
        </div>
    
        <div class="col-lg-12 col-lg-offset-2">
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">ชื่อ - นามสกุล :</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control input-sm" placeholder="ชื่อ" name="fnameThai" required>
                </div>
                <div class="col-lg-2">
                    <input type="text" class="form-control input-sm" placeholder="นามสกุล" name="lnameThai" required>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-lg-offset-2">
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label"> เลขประจำตัวประชาชน :</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control input-sm" name="idCard">
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-lg-offset-3">
            <div class="form-group">
                <label class="col-lg-2 control-label">สถานที่เกิด(จังหวัด) :</label>
                <div class="col-lg-3">
                    <select name="province" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="กรุณาเลือก...">
                        <?php
                            $province = mysqli_query($con, "SELECT * FROM province");
                            while($rs_p = mysqli_fetch_array($province)){ 
                        ?>
                        <option><?= $rs_p['PROVINCE_NAME'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    
        <div class="col-lg-12 col-lg-offset-2">
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label"> ชื่อ-สกุล บิดา :</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control input-sm" placeholder="ชื่อ" name="fatherName">
                </div>
                <div class="col-lg-2">
                    <input type="text" class="form-control input-sm" placeholder="นามสกุล" name="fatherLasname">
                </div>
            </div>
        </div>
        
        <div class="col-lg-12 col-lg-offset-2">
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label"> ชื่อ-สกุล มารดา :</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control input-sm" name="motherName" placeholder="ชื่อ">
                </div>
                <div class="col-lg-2">
                    <input type="text" class="form-control input-sm" name="motherLastname" placeholder="สกุล">
                </div>
            </div>
        </div>
        
        <div class="col-lg-10 col-lg-offset-2">
            <p class="text-success"><b>ส่วนที่ 2 : ที่อยู่</b></p>
        </div>
        
        <div class="col-lg-12 col-lg-offset-2">
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label"> หมู่บ้าน :</label>
                <div class="col-lg-2">
                    <input type="text" class="form-control input-sm" name="villageName">
                </div>
            </div>
        </div>
        
        <div class="col-lg-12 col-lg-offset-2">
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label"> บ้านเลขที่ :</label>
                <div class="col-lg-1">
                    <input type="text" class="form-control input-sm" name="houseNumber">
                </div>
            </div>
        </div>
        
        <div class="col-lg-12 col-lg-offset-2">
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label"> บ้านเลขที่ :</label>
                <div class="col-lg-1">
                    <input type="text" class="form-control input-sm" name="houseNumber">
                </div>
            </div>
        </div>
        
        <div class="col-lg-12 col-lg-offset-2">
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label"> หมู่ที่ :</label>
                <div class="col-lg-1">
                    <input type="text" class="form-control input-sm" name="placeNumber">
                </div>
            </div>
        </div>
   
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-5">
                <button type="reset" class="btn btn-default">MEMBATAL</button>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> SIMPAN</button>
            </div>
        </div>
	</form>	
</fieldset>

