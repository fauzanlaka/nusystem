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
    //---------------------Subject registration system---------------------------------
    $id = $_SESSION['UserID'];
    $sql1 = "select s.*,f.* from students s inner join fakultys f on s.ft_id=f.ft_id where st_id = '$id' ";
    $query1 = mysqli_query($con,$sql1);
    $result1 = mysqli_fetch_array($query1);
    
    //Set class system
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_register = mysqli_fetch_array($register);
    $year_register = $rs_register['year'];

    $studentClass = $result1['class'];
            
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

    //Get comparing data
    $rs_class = $cnow ;
    $rs_term = $result_reg['term_id'];
    $ft_id = $result1['ft_id'];
    $dp_id = $result1['dp_id'];

    //Get all subject to insert into
    $subject = mysqli_query($con, "SELECT * FROM registerSubject
                            WHERE rs_class='$rs_class' and rs_term='$rs_term' and ft_id='$ft_id' and dp_id='$dp_id'
                            ");
    ?>
    
    <table class="table table-striped table-hover table-bordered ">
        <thead>
          <tr>
            <td align="center"><b>KOD</b></td>
            <td align="center"><b>MATA KULIAH</b></td>
            <td align="center"><b>PENSYARAH</b></td>
          </tr>
        </thead>
        <tbody>
          <?php
            while($rowSubject = mysqli_fetch_array($subject)){
                $tc_id = $rowSubject['tc_id'];
                $rs_id = $rowSubject['rs_id'];
                
                $teaching = mysqli_query($con, "SELECT tc.*,s.*,t.* FROM teaching tc
                            INNER JOIN subject s ON tc.s_id=s.s_id
                            INNER JOIN teachers t ON tc.t_id=t.t_id
                            WHERE tc_id='$tc_id'");
                $sqlTeaching = mysqli_fetch_array($teaching);
                
                $sCode = $sqlTeaching['s_code'];
                $sName = $sqlTeaching['s_rumiName'];
                $fname = $sqlTeaching['t_fnameRumi'];
                $lname = $sqlTeaching['t_lnameRumi'];
          ?>
          <tr>
            <td><?= $sCode ?></td>
            <td><?= $sName ?></td>
            <td><?= $fname ?> - <?= $lname ?></td>
          </tr>
          <?php
            }
          ?>
        </tbody>
    </table>
      
      
      
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
              <div class="col-lg-9">
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
          <div class="col-lg-10 col-lg-offset-">
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
