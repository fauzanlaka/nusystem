<?php
    $id = $_SESSION['UserID'];
    $sql = mysqli_query($con, "SELECT s.*,d.* FROM students s
           INNER JOIN departments d on s.dp_id=d.dp_id
           WHERE st_id='$id'");
    $result = mysqli_fetch_array($sql);
    //Query data 
    $j_name = str_replace("\'", "&#39;", $result['firstname_jawi']);
    $j_lastname = str_replace("\'", "&#39;", $result['lastname_jawi']);
    $e_name = str_replace("\'", "&#39;", $result['firstname_rumi']);
    $e_lastname = str_replace("\'", "&#39;", $result['lastname_rumi']);
    $t_name = str_replace("\'", "&#39;", $result['t_studentname']);
    $t_lastname = str_replace("\'", "&#39;", $result['t_studentlastname']);
    $gender = str_replace("\'", "&#39;", $result['gender']);
    $cityzenid = $result['cityzen_id'];
    $student_id = $result['student_id'];
    $department = $result['dp_name'];
    $telepon = $result['telephone'];
?>
<blockquote>
    <p><span class="glyphicon glyphicon-tags"></span>  Biodata</p>
    <fieldset>
        <legend>Bahagian 1</legend>
        <form class="form-horizontal" method='post' action='?page=profile&&profilepage=saveedit'>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">Nama-Bako :</label>
                <div class="col-lg-3">
                  <?= $j_name ?> - <?= $j_lastname ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">Nama-Bako :</label>
                <div class="col-lg-3">
                  <?= $e_name ?> - <?= $e_lastname ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">Jenis kelamin :</label>
                <div class="col-lg-3">
                  <?= $gender ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">No Kad pengenalan :</label>
                <div class="col-lg-3">
                  <?= $cityzenid ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">Jurusan :</label>
                <div class="col-lg-3">
                  <?= $department ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">Telepon :</label>
                <div class="col-lg-3">
                  <?= $telepon ?>
                </div>
            </div>
        </form>
    </fieldset>  
    <?php
        $id = $_SESSION['UserID'];
        $sql_t = mysqli_query($con, "SELECT s.*,d.*,a.*,p.* 
                 FROM students s 
                 JOIN district d ON s.t_subdistrict=d.DISTRICT_ID 
                 JOIN amphur a ON s.t_district=a.AMPHUR_ID
                 JOIN province p ON s.t_province=p.PROVINCE_ID
                 WHERE st_id='$id'");
        $result_t = mysqli_fetch_array($sql_t);
        
        $d_name = $result_t['DISTRICT_NAME'];
        $h_number = $result['house_number'];
        $a_name = $result_t['AMPHUR_NAME'];
        $p_name = $result_t['PROVINCE_NAME'];
        $post_code = $result_t['post'];
    ?>
    <fieldset>
        <legend>Bahagian 2</legend>
        <form class="form-horizontal" method='post' action='?page=profile&&profilepage=saveedit'>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">ชื่อ-นามสกุล :</label>
                <div class="col-lg-3">
                  <?= $t_name ?> - <?= $t_lastname ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">บ้านเลขที่ :</label>
                <div class="col-lg-3">
                  <?= $h_number ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">หมู่ที่ :</label>
                <div class="col-lg-3">
                  <?= $result_t['place'] ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">ตำบล :</label>
                <div class="col-lg-3">
                  <?= $d_name ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">อำเภอ :</label>
                <div class="col-lg-3">
                  <?= $a_name ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">จังหวัด :</label>
                <div class="col-lg-3">
                  <?= $p_name ?>
                </div>
            </div>
            <div class="form-group">
                <label for="inputEmail" class="col-lg-3 control-label">รหัสไปรษณีย์ :</label>
                <div class="col-lg-3">
                  <?= $post_code ?>
                </div>
            </div>
        </form>
    </fieldset>
</blockquote>