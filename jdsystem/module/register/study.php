<?php
    //query data panggal dan tahun pengajian
    $sql_reg = "select r.*,y.* from register r inner join year y on r.y_id=y.y_id where tu_id = 1 ";
    $query_reg = mysqli_query($con, $sql_reg);
    $result_reg = mysqli_fetch_array($query_reg);
    $reg_status = $result_reg['tu_id']; //Status pembukaan belajar

    //query data mereka yang sudah daftar
    $st_id = $_SESSION['UserID'];
    $re_id = $result_reg['re_id'];
    $term = $result_reg['term_id'];
    $year = $result_reg['year'];
    $date = date("Y/m/d");
    
    //Select student id where st_id = $st_id
    $sql_stuid = "select * from students where st_id = '$st_id'"; 
    $query_stuid = mysqli_query($con,$sql_stuid);
    $result_stuid = mysqli_fetch_array($query_stuid);
    
    $stu_id = $result_stuid['student_id'];
?>
<blockquote>
    <p><span class="glyphicon glyphicon-tags"></span>  DAFTAR BELAJAR</p>
    <small>Pendaftaran panggal : <?= $result_reg['term_id']; ?> Tahun : <?= $result_reg['year']; ?> </small>
    <div class="well">
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Sistem pendaftaran</h3>
  </div>
  <div class="panel-body">
   <?php
       if($reg_status == 1){
           
           //Set class system
            $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
            $rs_register = mysqli_fetch_array($register);
            $year_register = $rs_register['year'];

            $studentClass = $result_stuid['class'];

            $first = $year_register; 
            $second = $year_register-1;
            $third  = $year_register-2;
            $fordth = $year_register-3;
            //Kelas sekarang
            $kelas = $studentClass;
            if($kelas == $first){ $cnow = '1'; }
            if($kelas == $second){ $cnow = '2'; }
            if($kelas == $third){ $cnow = '3'; }
            if($kelas == $fordth){ $cnow = '4'; }
            
            //Set type of yuran payment
            if($cnow == '1' or $cnow == '4'){
                $yuranType = "special_prize";
            }else{
                $yuranType = "common_prize";
            }
           
   ?>
<form class="form-horizontal" method='post' action='?page=register&&registerpage=stdsave'>
    <div class="form-group">
      <label class="col-lg-1"></label>
      <div class="col-lg-8">
        <div class="radio">
          <label>
            <input type="radio" id="lang_skill1" name="rs_type" value="<?= $yuranType ?>" required>
            Klik untuk daftar
          </label>
        </div>
      </div>
    </div>
    <div align="center">
        <input type="hidden" name="st_id" value="<?= $st_id ?>">
        <input type="hidden" name="re_id" value="<?= $re_id ?>">
        <input type="hidden" name="term" value="<?= $term ?>">
        <input type="hidden" name="year" value="<?= $year ?>">
        <input type="hidden" name="date" value="<?= $date ?>">
        <input type="hidden" name="stu_id" value="<?= $stu_id ?>">
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button type="reset" class="btn btn-default">MEMBATAL</button>
        <button type="submit" class="btn btn-default">DAFTAR</button>
      </div>
    </div>
</form>
            <?php 
            }else{
            ?>
                <p class='text-danger'>Masa untuk daftar sudah habis , Sila hubungi idarah dengan segera !
            <?php
            }
            ?>
    </div>
  </div>
    <div class="alert alert-dismissible alert-warning">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <h4>Peringatan !</h4>
        <p>Sistem pendaftaran masih di peringkat pembangunan , Jika anda jumpa masalah sila hubungi bahagian IT di idarah jamiah, <a href="#" class="alert-link">(Fauzan Hj.Asyari).</a>.</p>
    </div>
</div>
   
</blockquote>
