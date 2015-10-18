<?php
    $ct_name = mysqli_real_escape_string($con, $_POST['ct_name']);
    $ct_detail = mysqli_real_escape_string($con, $_POST['ct_detail']);
    $ct_adder = $_SESSION["UserID"];
    $ct_id = $_GET['id'];
    
    $query = mysqli_query($con, "SELECT * FROM childType WHERE ct_id = '$ct_id'");
    $result = mysqli_fetch_array($query);
    $ct_name1 = $result['ct_name'];
    $ct_detail1 = $result['ct_detail'];
    $ct_id = $result['ct_id'];
?>

<br>
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
                    <textarea class="form-control" data-provide="markdown" rows="10" class="form-control" name="ct_detail"><?= $ct_detail1 ?></textarea>
                </div>
            </div>
        
            <input type='hidden' name='ct_id' value='<?= $ct_id ?>'>
        
            <div class="form-group">
                <div class="col-lg-10 col-lg-offset-2">
                    <a href="?page=childType&&ctpage=childList"><button type="button" class="btn btn-default">ยกเลิก</button></a>
                  <button type="submit" class="btn btn-primary" name="save" >บันทึก</button>
                </div>
            </div>
            
    </form>
    
</div>
