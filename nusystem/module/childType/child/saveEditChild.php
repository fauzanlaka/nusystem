<?php
    $ct_name = mysqli_real_escape_string($con, $_POST['ct_name']);
    $ct_detail = mysqli_real_escape_string($con, $_POST['ct_detail']);
    $ct_adder = $_SESSION["UserID"];
    $ct_id = $_POST['ct_id'];
    
    $update = mysqli_query($con, "UPDATE childType SET
            ct_name = '".$ct_name."',
            ct_detail = '".$ct_detail."'
            WHERE ct_id='$ct_id'
            ");
    
    $query = mysqli_query($con, "SELECT * FROM childType WHERE ct_id = '$ct_id'");
    $result = mysqli_fetch_array($query);
    $ct_name1 = $result['ct_name'];
    $ct_detail1 = $result['ct_detail'];
    $ct_id = $result['ct_id'];
?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>สำเร็จ!</strong> แก้ไขข้อมูลเรียบร้อบเเล้ว.
</div>

<div class="well">
    <span class="glyphicon glyphicon-pencil"></span> <b>ข้อมูลประเภทเด็ก</b>
    <hr>
    
    <form class="form-horizontal" action="?page=childType&&ctpage=saveEditChild" enctype="multipart/form-data" method="POST">
            
            <div class="form-group">
                <label class="col-lg-2 control-label">ชื่อประเภท :</label>
                <div class="col-lg-3">
                  <input type="text" name="ct_name" class="form-control input-sm" value="<?= $ct_name1 ?>">
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-lg-2 control-label">รายละเอียด :</label>
                <div class="col-lg-7">
                    <textarea class="form-control" class="form-control" rows="10" name="ct_detail"><?= $ct_detail1 ?></textarea>
                </div>
            </div>
        
            <input type='hidden' name='ct_id' value='<?= $ct_id ?>'>
        
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                  <button type="reset" class="btn btn-default">ยกเลิก</button>
                  <button type="submit" class="btn btn-primary" name="save" >บันทึก</button>
                </div>
            </div>
            
    </form>
    
</div>