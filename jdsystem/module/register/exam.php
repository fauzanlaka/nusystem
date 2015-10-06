<?php
    $sql = mysqli_query($con, "SELECT rx.*,y.* FROM register_exam rx 
           INNER JOIN year y on rx.y_id=y.y_id
           where tu_id='1'");
    $result = mysqli_fetch_array($sql);
    
    $tu_id = $result['tu_id'];
    $year = $result['year'];
    $term = $result['t_id'];
    $rx_id = $result['rx_id'];
    
    //Data yang akan insert ke table student_register_exam
    $st_id = $_SESSION['UserID'];
    $sql_st = mysqli_query($con, "SELECT * FROM students WHERE st_id='$st_id'");
    $result_st = mysqli_fetch_array($sql_st);
    $stu_id = $result_st['student_id'];
?>
<blockquote>
    <?php
        if($tu_id == '1'){
    ?>
        <p><span class="glyphicon glyphicon-tags"></span>  DAFTAR UJIAN</p>
        <small>Pendaftaran panggal : <?= $term ?> Tahun : <?= $year ?> </small>
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Sistem pendaftaran</h3>
            </div>
            <div class="panel-body">
                <form class="form-horizontal" method='post' action='?page=register&&registerpage=exmsave'>
                    <label class="col-lg-1"></label>
                          <div class="col-lg-8">
                            <div class="radio">
                              <label>
                                <input type="radio" name="register" required>
                                Klik untuk daftar
                              </label>
                            </div>
                          </div><br><br>
                          <input type="hidden" name="st_id" value="<?= $st_id ?>">
                          <input type="hidden" name="rx_id" value="<?= $rx_id ?>">
                          <input type="hidden" name="year" value="<?= $year ?>">
                          <input type="hidden" name="term" value="<?= $term ?>">
                          <input type="hidden" name="stu_id" value="<?= $stu_id ?>">
                    <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                              <button type="reset" class="btn btn-default">MEMBATAL</button>
                              <button type="submit" class="btn btn-default">DAFTAR</button>
                          </div>
                    </div>
                </form>
            </div>
          </div>
    <?php        
        }else{ 
    ?>
       <div class="alert alert-dismissible alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Maaf !</strong> <a href="#" class="alert-link">Masa untuk daftar sudah habis</a> Sila hubungi idarah.
       </div>
    <?php
        }
    ?>
    
</blockquote>    