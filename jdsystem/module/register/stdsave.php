<?php 
    $st_id = $_POST['st_id'];
    $re_id = $_POST['re_id'];
    
    //Check daftar berulang
    $sql_d = "select count(*) from student_register where (st_id = '$st_id' and re_id = '$re_id')";
    $result_d = mysqli_query($con,$sql_d);
    $row_d = mysqli_fetch_array($result_d);
		
    if( $row_d[0] > 0){
?>
<br>
<div class="alert alert-dismissible alert-danger">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <h4>Warning!</h4>
  <p>Anda sudah daftar , sila periksa di menu <a href="?page=payment&&paymentpage=yuran" class="alert-link">SEJARAH BAYARAN</a>.</p>
</div>
<?php
    }else{
        $st_id = $_POST['st_id'];
        $re_id = $_POST['re_id'];
        $term = $_POST['term'];
        $year = $_POST['year'];
        $date = $_POST['date'];
        $rs_type = $_POST['rs_type'];
        $stu_id = $_POST['stu_id'];
        $pay_status = "Belum bayar";
        $sql_stdsave = "INSERT INTO student_register (st_id,rs_date,re_id,rs_type,pay_status,academic_year,term,stu_id) values ('$st_id','$date','$re_id','$rs_type','$pay_status','$year','$term','$stu_id')";
        if(mysqli_query($con, $sql_stdsave)){ ?>
        
            <br>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Berhasil!</strong> Pendaftaran berhasil di rakam , Sila bayar yuran di Idarah Jamiah , Terimakasih <a href="?page=payment&&paymentpage=yuran" class="alert-link">Klik untuk lihat</a>.
            </div>
        <?php
        }else{
            echo "ERROR: Could not able to execute $sql_stdsave. " . mysqli_error($con);
        }
    }
?>