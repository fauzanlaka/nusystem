<?php
    $cp_id = $_GET['id'];
    
    $query = mysqli_query($con, "SELECT * FROM childProject WHERE cp_id = '$cp_id'");
    $result = mysqli_fetch_array($query);
    $cp_name1 = $result['cp_name'];
    $cp_detail1 = $result['cp_detail'];
    $cp_id = $result['cp_id'];
?>
<br>

<div class="well">
    <span class="glyphicon glyphicon-pencil"></span> <b>เพิ่มประเภทโครงการ</b>
    <hr>
    
    <form class="form-horizontal" action="?page=childType&&ctpage=saveEditProject" enctype="multipart/form-data" method="POST">
            
            <div class="form-group">
                <label class="col-lg-2 control-label">ชื่อประเภท :</label>
                <div class="col-lg-7">
                  <input type="text" name="cp_name" class="form-control input-sm" value="<?= $cp_name1 ?>">
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-lg-2 control-label">รายละเอียด :</label>
                <div class="col-lg-7">
                    <textarea class="form-control" class="form-control" rows="10" name="cp_detail"><?= $cp_detail1 ?></textarea>
                </div>
            </div>
        
        <input type="hidden" name="cp_id" value="<?= $cp_id ?>">
        
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">ยกเลิก</button>
                  <button type="submit" class="btn btn-primary" name="save" >บันทึก</button>
                </div>
            </div>
            
    </form>
</div>    