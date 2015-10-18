<?php
    
    $id = $_GET['id'];
    $money = $_POST['money'];
    $reciet_code = $_POST['reciet_code'];
    $pay_date = $_POST['pay_date'];
    $year_register = $_POST['year_register'];
    $academic_year = $_POST['academic_year'];
    
    $sql_check = mysqli_query($con, "SELECT * FROM muqaddimah_pay WHERE st_id='$id' and m_academicyear='$academic_year'"); 
    $rs_sql_check = mysqli_fetch_array($sql_check);
    
    if($rs_sql_check[0] > 0 ){
?>
    <br>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Maaf !</strong> Sudah di bayar.
    </div>   
<?php
    include 'module/payment/mp.php';
    }else{
        //Insert data into muqaddimah_pay
        $insert = mysqli_query($con, "INSERT INTO muqaddimah_pay 
                (st_id,m_academicyear,m_paydate,m_money,m_reciet) VALUES
                ('$id','$academic_year','$pay_date','$money','$reciet_code')
                "); 
        $update = mysqli_query($con, "UPDATE students SET muqaddimah='1' WHERE st_id='$id'");
?>
    <br>
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Berhasil !</strong> Data berhasil di rakam.
    </div>
<?php
include 'module/payment/em.php';
    }
?>