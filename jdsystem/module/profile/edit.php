<?php
    $id = $_SESSION['UserID'];
    $sql = mysqli_query($con, "SELECT * FROM students where st_id='$id'");
    $result = mysqli_fetch_array($sql);
    //Query data 
    $j_name = str_replace("\'", "&#39;", $result['firstname_jawi']);
    $j_lastname = str_replace("\'", "&#39;", $result['lastname_jawi']);
    $e_name = str_replace("\'", "&#39;", $result['firstname_rumi']);
    $e_lastname = str_replace("\'", "&#39;", $result['lastname_rumi']);
    $t_name = str_replace("\'", "&#39;", $result['t_studentname']);
    $t_lastname = str_replace("\'", "&#39;", $result['t_studentlastname']);
    $gender = $result['gender'];
    $cityzenid = $result['cityzen_id'];
    $telephone = $result['telephone'];
    $house_number = $result['house_number'];
    $place = $result['place'];
    $t_village_name = str_replace("\'", "&#39;", $result['t_village_name']);
    $t_road = str_replace("\'", "&#39;", $result['t_road']);
    $post = $result['post'];
?>
<blockquote>
    <form class="form-horizontal" method='post' action='?page=profile&&profilepage=saveedit'>
      <fieldset>
        <legend><span class="glyphicon glyphicon-edit"></span> Ubah biodata</legend>
        <div class="form-group">
          <label for="inputEmail" class="col-lg-3 control-label">Nama-Bako :</label>
          <div class="col-lg-3">
            <input type="text" class="form-control input-sm" value="<?= $j_name ?>" name="j_name">
          </div>
          <div class="col-lg-3">
            <input type="text" class="form-control input-sm" value="<?= $j_lastname ?>" name="j_lastname">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="col-lg-3 control-label">Nama-bako :</label>
          <div class="col-lg-3">
            <input type="text" class="form-control input-sm" value="<?= $e_name ?>" name="e_name">
          </div>
          <div class="col-lg-3">
            <input type="text" class="form-control input-sm" value="<?= $e_lastname ?>" name="e_lastname">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="col-lg-3 control-label">ชื่อ-นามสกุล :</label>
          <div class="col-lg-3">
            <input type="text" class="form-control input-sm" value="<?= $t_name ?>" name="t_name">
          </div>
          <div class="col-lg-3">
            <input type="text" class="form-control input-sm" value="<?= $t_lastname ?>" name="t_lastname">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="col-lg-3 control-label">Jenis kelamin :</label>
          <div class="col-lg-3">
            <select name="gender" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="Pilih...">
                <option value="Lelaki"<?=$gender == 'Lelaki' ? ' selected="selected"' : ''?>>Lelaki</option>
                <option value="Perempuan"<?=$gender == 'Perempuan' ? ' selected="selected"' : ''?>>Perempuan</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">No.Kad pengenalan :</label>
          <div class="col-lg-3">
            <input type="text" class="form-control input-sm" value="<?= $cityzenid ?>" name="cityzenid">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword" class="col-lg-3 control-label">No.Telepon :</label>
          <div class="col-lg-3">
            <input type="text" class="form-control input-sm" value="<?= $telephone ?>" name="telephone">
          </div>
        </div>
        <div class="form-group">
            <label class="col-lg-3 control-label">หมู่บ้าน :</label>
            <div class="col-lg-3">
                <input type="text" class="form-control input-sm" name="t_village_name" value="<?= $t_village_name ?>">
            </div>
        </div>
                        
        <div class="form-group">
            <label class="col-lg-3 control-label">บ้านเลขที่ :</label>
            <div class="col-lg-3">
                <input type="text" class="form-control input-sm" name="house_number" value="<?= $house_number ?>">
            </div>
        </div>
       <div class="form-group">
       <label class="col-lg-3 control-label">หมู่ที่ :</label>
            <div class="col-lg-3">
                <input type="text" class="form-control input-sm" name="place" value="<?= $place ?>">
            </div>
       </div>
       <div class="form-group">
       <label class="col-lg-3 control-label">ถนน :</label>
            <div class="col-lg-3">
                <input type="text" class="form-control input-sm" name="t_road" value="<?= $t_road ?>">
            </div>
       </div>
                        
       <?php
            $sql_dis = mysqli_query($con, "SELECT DISTRICT_ID,DISTRICT_NAME FROM district");
            $sql_diss = mysqli_query($con, "SELECT t_subdistrict FROM students WHERE st_id='$id'");
            $rs_diss = mysqli_fetch_array($sql_diss);
            $data_diss = $rs_diss['t_subdistrict'];
       ?>                     
                        
       <div class="form-group">
            <label class="col-lg-3 control-label">ตำบล :</label>
            <div class="col-lg-3">
                <select name="subdistrict" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="กรุณาเลือก...">
                        <?php
                            while($rs_dis = mysqli_fetch_array($sql_dis)){
                                $data_dis = $rs_dis['DISTRICT_ID'];

                        ?>
                    <option value="<?= $data_dis ?>" <?php if($data_dis==$data_diss){echo 'selected="selected"';} ?>><?= $rs_dis['DISTRICT_NAME'] ?></option>
                        <?php
                            }
                        ?>
                </select>
       </div>
       </div>
                        
       <?php
            $sql_amp = mysqli_query($con, "SELECT * FROM amphur");
            $sql_amps = mysqli_query($con, "SELECT t_district FROM students WHERE st_id='$id'");
            $rs_amps = mysqli_fetch_array($sql_amps);
            $data_amps = $rs_amps['t_district'];
       ?>
                        
       <div class="form-group">
            <label class="col-lg-3 control-label">อำเภอ :</label>
            <div class="col-lg-3">
                <select name="district" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="กรุณาเลือก...">
                    <?php
                    while($rs_amp = mysqli_fetch_array($sql_amp)){
                        $data_amp = $rs_amp['AMPHUR_ID'];                                           
                    ?>
                    <option value="<?= $data_amp ?>" <?php if($data_amp==$data_amps){echo 'selected="selected"';} ?>><?= $rs_amp['AMPHUR_NAME'] ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
       </div>
        <?php
            $sql_pr = mysqli_query($con, "SELECT * FROM province");
            $sql_prs = mysqli_query($con, "SELECT t_province FROM students WHERE st_id='$id'");
            $rs_prs = mysqli_fetch_array($sql_prs);
            $data_prs = $rs_prs['t_province'];
        ?>
                        
        <div class="form-group">
            <label class="col-lg-3 control-label">จังหวัด :</label>
            <div class="col-lg-2">
                <select name="province" id="lunchBegins" class="selectpicker" data-live-search="true" data-live-search-style="begins" title="กรุณาเลือก...">
                    <?php
                    while($rs_pr = mysqli_fetch_array($sql_pr)){
                        $data_pr = $rs_pr['PROVINCE_ID'];
                    ?>
                    <option value="<?= $data_pr ?>" <?php if($data_pr==$data_prs){echo 'selected="selected"';} ?>><?= $rs_pr['PROVINCE_NAME'] ?></option>
                    <?php
                    }
                    ?>
                </select>
           </div>
       </div>
        
       <div class="form-group">
            <label class="col-lg-3 control-label">รหัสไปรษณีย์ :</label>
            <div class="col-lg-3">
                <input type="text" class="form-control input-sm" name="post" value="<?= $post ?>">
            </div>
       </div>
        
       <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
                <button type="submit" class="btn btn-default">Simpan</button>
            </div>
       </div>
      </fieldset>
    </form>
</blockquote>