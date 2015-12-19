    <span class="glyphicon glyphicon-plus-sign"></span> <b>เพิ่มประเภทโครงการ</b>
    <hr>
    
    <form class="form-horizontal" action="?page=childType&&ctpage=saveProject" enctype="multipart/form-data" method="POST">
            
    <div class="form-group">
        <label class="col-lg-2 control-label">ชื่อประเภท :</label>
        <div class="col-lg-7">
            <input type="text" name="cp_name" class="form-control input-sm" required>
        </div>
    </div>
        
    <div class="form-group">
        <label class="col-lg-2 control-label">รายละเอียด :</label>
        <div class="col-lg-7">
            <textarea class="form-control" class="form-control" rows="10" name="cp_detail"></textarea>
        </div>
    </div>
        
    <p class="text-center">
        <button type="reset" class="btn btn-success btn-sm">ยกเลิก</button>
        <button type="submit" class="btn btn-success btn-success btn-sm" name="save" >บันทึก</button>
    </p>
              
    </form>
