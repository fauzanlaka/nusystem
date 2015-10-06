<?php
    $st_id = $_SESSION['UserID'];
    $sql = mysqli_query($con,"SELECT s.*,sr.* FROM student_register sr INNER JOIN students s on s.st_id=sr.st_id where sr.st_id='$st_id'");
?>  
<blockquote>
    <p><span class="glyphicon glyphicon-tags"></span>  Sejarah pembayaran yuran</p>
    <table class="table table-bordered table-hover ">
        <thead>
          <tr>
            <td align="center"><b>Panngal/Tahun</b></td>
            <td align="center"><b>Jumlah duit</b></td>
            <td align="center"><b>Status</b></td>
          </tr>
        </thead>
        <tbody>
          <?php  
            while($result = mysqli_fetch_array($sql))
            { 
          ?>  
          <?php
            $pay = $result['pay_status'];
            if($pay == 'Belum bayar'){
          ?> 
        <tr class="danger">
          <td align="center"><?= $result['term']; ?>/<?= $result['academic_year']; ?></td>
          <?php
            $rs_type = $result['rs_type'];
            $re_id = $result['re_id'];
            $sql_m = mysqli_query($con, "select * from register where re_id='$re_id'");
            $result_m = mysqli_fetch_array($sql_m);
            if($rs_type == 'common_prize'){
                $money = $result_m['common_prize'];
            }else{
                $money = $result_m['special_prize'];
            }
          ?>
          <td align="center"><?= number_format($money) ?></td>
          <?php 
            $pay = $result['pay_status'];
            if($pay == 'Sudah bayar'){
          ?>
          <td align="center"><font color="green"><?= $pay ?></font></td>
          <?php  
            }else{
          ?>
          <td align="center"><font color="red"><?= $pay ?></font></td>
          <?php } ?>
        </tr>
          <?php }else{ ?>
        <tr class="info">
          <td align="center"><?= $result['term']; ?>/<?= $result['academic_year']; ?></td>
          <?php
            $rs_type = $result['rs_type'];
            $re_id = $result['re_id'];
            $sql_m = mysqli_query($con, "select * from register where re_id='$re_id'");
            $result_m = mysqli_fetch_array($sql_m);
            if($rs_type == 'common_prize'){
                $money = $result_m['common_prize'];
            }else{
                $money = $result_m['special_prize'];
            }
          ?>
          <td align="center"><?= number_format($money) ?></td>
          <?php 
            $pay = $result['pay_status'];
            if($pay == 'Sudah bayar'){
          ?>
          <td align="center"><font color="green"><?= $pay ?></font></td>
          <?php  
            }else{
          ?>
          <td align="center"><font color="red"><?= $pay ?></font></td>
          <?php } ?>
        </tr>         
          <?php } ?>
        <?php } ?>
        </tbody>
    </table> 
</blockquote>