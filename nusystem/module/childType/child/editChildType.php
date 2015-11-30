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
    $ct_category = $result['ct_category'];
?>

    <span class="glyphicon glyphicon-pencil"></span> <b>ข้อมูลประเภทเด็ก</b>
    <hr>
    
    <form class="form-horizontal" action="?page=childType&&ctpage=saveEditChild" enctype="multipart/form-data" method="POST">
            
            <div class="form-group">
                <label class="col-lg-2 control-label">ชื่อประเภท :</label>
                <div class="col-lg-9">
                  <input type="text" name="ct_name" class="form-control input-sm" value="<?= $ct_name1 ?>">
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-lg-2 control-label">รายละเอียด :</label>
                <div class="col-lg-9">
                    <textarea class="form-control" data-provide="markdown" rows="10" class="form-control" name="ct_detail"><?= $ct_detail1 ?></textarea>
                </div>
            </div>
        
            <div class="form-group">
                <label class="col-lg-2 control-label">หมวดหมู่ :</label>
                <div class="col-lg-3">
                    <select name="ct_category" class="form-control input-sm">
                        <option value="1" <?=$ct_category == '1' ? ' selected="selected"' : ''?>>เด็กกำพร้า</option>
                        <option value="2" <?=$ct_category == '2' ? ' selected="selected"' : ''?>>เด็กยากจน</option>
                    </select>
                </div>
            </div>
        
            <input type='hidden' name='ct_id' value='<?= $ct_id ?>'>
        
            <div class="form-group">
                <p class="text-center">
                    <a href="?page=childType&&ctpage=childList"><button type="button" class="btn btn-success btn-sm">ยกเลิก</button></a>
                  <button type="submit" class="btn btn-success btn-sm" name="save" >บันทึก</button>
                </p>
            </div>
            
    </form>

