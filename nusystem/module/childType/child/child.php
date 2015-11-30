
    <span class="glyphicon glyphicon-plus-sign"></span> <b>เพิ่มประเภทเด็ก</b>
    <hr>
    
    <form class="form-horizontal" action="?page=childType&&ctpage=saveChild" enctype="multipart/form-data" method="POST">
            
            <div class="form-group">
                <label class="col-lg-2 control-label">ชื่อประเภท :</label>
                <div class="col-lg-9">
                  <input type="text" name="ct_name" class="form-control input-sm" required>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-lg-2 control-label">รายละเอียด :</label>
                <div class="col-lg-9">
                    <textarea class="form-control" class="form-control" rows="10" name="ct_detail"></textarea>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-lg-2 control-label">หมวดหมู่ :</label>
                <div class="col-lg-3">
                    <select name="ct_category" class="form-control input-sm">
                        <option value="1">เด็กกำพร้า</option>
                        <option value="2">เด็กยากจน</option>
                    </select>
                </div>
            </div>
        
            <div class="form-group">
                <p class="text-center">
                  <button type="reset" class="btn btn-success btn-sm">ยกเลิก</button>
                  <button type="submit" class="btn btn-success btn-sm" name="save" >บันทึก</button>
                </p>
            </div>
            
    </form>

