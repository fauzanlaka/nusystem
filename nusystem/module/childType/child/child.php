<br>
<div class="well">
    <span class="glyphicon glyphicon-pencil"></span> <b>เพิ่มประเภทเด็ก</b>
    <hr>
    
    <form class="form-horizontal" action="?page=childType&&ctpage=saveChild" enctype="multipart/form-data" method="POST">
            
            <div class="form-group">
                <label class="col-lg-2 control-label">ชื่อประเภท :</label>
                <div class="col-lg-3">
                  <input type="text" name="ct_name" class="form-control input-sm" required>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-lg-2 control-label">รายละเอียด :</label>
                <div class="col-lg-7">
                    <textarea class="form-control" class="form-control" rows="10" name="ct_detail"></textarea>
                </div>
            </div>
        
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">ยกเลิก</button>
                  <button type="submit" class="btn btn-primary" name="save" >บันทึก</button>
                </div>
            </div>
            
    </form>
</div>    
