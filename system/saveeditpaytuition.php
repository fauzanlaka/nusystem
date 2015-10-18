<?php			
    include("../connect.php");
        $sr_id = $_POST['sr_id'];
        $pay_date = mysql_real_escape_string($_POST['pay_date']);
        $reciet_code = $_POST['receipt'];
        $sql_edt = "UPDATE payments SET pay_date='$pay_date' , reciet_code='$reciet_code' where sr_id='$sr_id'";
        if(mysql_query($sql_edt)){
            echo "<script type='text/javascript'>";
            echo "alert('Pembayaran berhasil di rakam')";
            echo "</script>";
            echo "<meta http-equiv='refresh' content='0;url=../edit_pay_tuition.php?id=$sr_id' />";
        }
         
?>