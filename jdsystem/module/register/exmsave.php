<?php
    //Chek data kata dia baya dokgi
    $st_id = $_POST['st_id'];
    $rx_id = $_POST['rx_id'];
    $year = $_POST['year'];
    $term = $_POST['term'];
    
    //Exam bubble register checking 
    $sql_chk = mysqli_query($con, "SELECT * FROM student_register_exam WHERE (st_id ='$st_id' and rx_id='$rx_id')");
    $row = mysqli_fetch_array($sql_chk);

    //study pay checking
    $sql_yuranpay = mysqli_query($con, "SELECT st_id,pay_status FROM student_register WHERE (st_id='$st_id' and pay_status='Belum bayar')");
    $row1 = mysqli_fetch_array($sql_yuranpay);
    
    //Get the now register 
    $sql_registerNow = mysqli_query($con, "SELECT re.*,ye.* FROM register re 
                       INNER JOIN year ye ON re.y_id=ye.y_id
                       WHERE re_id = (SELECT MAX(re_id) FROM register)");
    $row2 = mysqli_fetch_array($sql_registerNow);
    //$term = $row2['term_id'];
    //$year = $row2['year'];

    //study registering checking
    $sql_register = mysqli_query($con, "SELECT * FROM student_register WHERE (term='$term' and academic_year='$year' and st_id='$st_id')");
    $row3 = mysqli_fetch_array($sql_register);

    if($row[0] > 0){ 
?>
    <br>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Warning!</h4>
      <p>Anda sudah daftar , sila periksa di menu <a href="?page=payment&&paymentpage=ujian" class="alert-link">SEJARAH BAYARAN</a>.</p>
    </div>  
<?php
    }elseif($row1[0] > 0){
?>
     <br>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Warning!</h4>
      <p>Anda belum bayar yuran , sila periksa di menu <a href="?page=payment&&paymentpage=yuran" class="alert-link">SEJARAH BAYARAN</a>.</p>
    </div>
     <?php
    }elseif($row3[0] < 1){
?>
     <br>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <h4>Warning!</h4>
      <p>Anda belum daftar belajar , sila daftar.</p>
    </div>
<?php
    }else{
    $rx_date = date("Y/m/d");
    $year = $_POST['year'];
    $term = $_POST['term'];
    $pay_status = "Belum bayar";
    $stu_id = $_POST['stu_id'];

    /*Test data
    echo $rx_id. "<br>";
    echo $rx_date. "<br>";
    echo $year. "<br>";
    echo $term. "<br>";
    echo $stu_id. "<br>";
     * 
     */
    
    $sql = "INSERT INTO student_register_exam 
            (st_id,rx_date,rx_id,year,term,pay_status,stu_id) values
            ('$st_id','$rx_date','$rx_id','$year','$term','$pay_status','$stu_id')
            ";
        if(mysqli_query($con, $sql)){ 
?>
            <br>
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Berhasil!</strong> Pendaftaran berhasil di rakam ,<a href="?page=payment&&paymentpage=ujian" class="alert-link">Klik untuk lihat</a>.
            </div>
            
<?php   }else{
            echo "ERROR: Could not able to execute $sql_stdsave. " . mysqli_error($con);
        }
    
   }      
?>
			