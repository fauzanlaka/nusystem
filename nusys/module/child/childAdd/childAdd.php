<form class="form-horizontal">
    
    <h4><span class="glyphicon glyphicon-user"></span> เพิ่มข้อมูลเด็ก</h4>
    
    <hr>
    
    <div class="scrollbar" id="style-3">

        <fieldset class="scheduler-border">
            
            <legend class="scheduler-border">&nbsp;&nbsp;&nbsp;ข้อมูลทั่วไป</legend>
            
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">ชื่อ-นามสกุล :</label>
                <div class="col-lg-3">
                  <input type="text" class="form-control input-sm" placeholder="ชื่อ" name="name" required>
                </div>
                <div class="col-lg-3">
                  <input type="text" class="form-control input-sm" placeholder="นามสกุล" name="lastname" required>
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">วัน เดือน ปีเกิด :</label>
                <div class="col-lg-3">
                  <input type="date" class="form-control input-sm" name="birdthDate">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">เลขประจำตัวประชาชน :</label>
                <div class="col-lg-3">
                  <input type="text" class="form-control input-sm" name="birdthDate">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">เพศ :</label>
                <div class="col-lg-2">
                    <select class="form-control input-sm" name="gender">
                        <option>ชาย</option>
                        <option>หญิง</option>
                    </select>
                </div>
            </div>  
        
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">ชื่อ - สกุล บิดา :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" name="birdthDate" placeholder="ชื่อ">
                    </div>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" name="birdthDate" placeholder="นามสกุล">
                    </div>
            </div>
        
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">ชื่อ - สกุล มารดา :</label>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" name="birdthDate" placeholder="ชื่อ">
                    </div>
                    <div class="col-lg-3">
                      <input type="text" class="form-control input-sm" name="birdthDate" placeholder="นามสกุล">
                    </div>
            </div>
            
        </fieldset> 
        
        <fieldset class="scheduler-border">
            
            <legend class="scheduler-border">&nbsp;&nbsp;&nbsp;ข้อมูลที่อยู่</legend>
            
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">บ้านเลขที่ :</label>
                <div class="col-lg-1">
                    <input type="text" class="form-control input-sm" name="houseNumber">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">หมู่ :</label>
                <div class="col-lg-1">
                    <input type="text" class="form-control input-sm" name="villageNumber">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">หมู่บ้าน :</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control input-sm" name="villageNumber">
                </div>
            </div>

           <div class="form-group">
                <label class="col-lg-3 control-label">ตำบล :</label>
                <div class="col-lg-3">
                    <select name="subDistrict" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="กรุณาเลือก...">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
           </div>

           <div class="form-group">
                <label class="col-lg-3 control-label">อำเภอ :</label>
                <div class="col-lg-3">
                    <select name="district" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="กรุณาเลือก...">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
           </div>

           <div class="form-group">
                <label class="col-lg-3 control-label">จังหวัด :</label>
                <div class="col-lg-3">
                    <select name="province" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="กรุณาเลือก...">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
           </div>
            
           <div class="form-group">
                <label class="col-lg-3 control-label">รหัสไปษณีย์ :</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control input-sm" name="postcode">
                </div>
           </div>
            
           <div class="form-group">
                <label class="col-lg-3 control-label">โทรศัพท์ :</label>
                <div class="col-lg-3">
                    <input type="text" class="form-control input-sm" name="telephone">
                </div>
           </div>

        </fieldset>
        
        <fieldset class="scheduler-border">
            
            <legend class="scheduler-border">&nbsp;&nbsp;&nbsp;ข้อมูลจำเเนกประเภท</legend>
            
            <?php
                $childType = mysqli_query($con, "SELECT * FROM childType");
            ?>
            
            <div class="form-group">
                <label class="col-lg-3 control-label">ประเภทเด็กกำพร้า :</label>
                <div class="col-lg-3">
                    <select name="district" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="กรุณาเลือก...">
                        <?php
                            while($rs_childType = mysqli_fetch_array($childType)){
                        ?>
                        <option><?= $rs_childType['ct_name'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
           </div>
            
           <?php
                $childProject = mysqli_query($con, "SELECT * FROM childProject");
            ?>
            
            <div class="form-group">
                <label class="col-lg-3 control-label">ประเภทโครงการ :</label>
                <div class="col-lg-3">
                    <select name="district" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="กรุณาเลือก...">
                        <?php
                            while($rs_childProject = mysqli_fetch_array($childProject)){
                        ?>
                        <option><?= $rs_childProject['cp_name'] ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
           </div>
            
        </fieldset>
    
    </div>
        
</form>