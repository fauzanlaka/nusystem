<?php

    $money = $_POST['money'];
    $reciet_code = $_POST['reciet_code'];
    $pay_date = $_POST['pay_date'];
    $m_id = $_POST['m_id'];
    
    $update = mysqli_query($con, "UPDATE muqaddimah_pay SET
            m_money='".$money."',
            m_reciet='".$reciet_code."',
            m_paydate='".$pay_date."'
            WHERE m_id='$m_id'
            ");
?>
<br>
<div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Berhasil!</strong> Data berhasil di perbaharui.
</div>
<?php
    include 'module/payment/em.php';
?>