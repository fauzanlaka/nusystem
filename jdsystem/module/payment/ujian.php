<?php
    $st_id = $_SESSION['UserID'];
    $sql = mysqli_query($con,"SELECT s.*,srx.* FROM student_register_exam srx INNER JOIN students s on s.st_id=srx.st_id where srx.st_id='$st_id'");
?>  
<blockquote>
    <p><span class="glyphicon glyphicon-tags"></span>  Sejarah pembayaran ujian</p>
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
                $rx_id = $result['rx_id'];
                $sql_rx = mysqli_query($con, "SELECT * FROM register_exam WHERE rx_id='$rx_id'");
                $result_rx = mysqli_fetch_array($sql_rx);
                
                if($result['pay_status'] == "Belum bayar"){
          ?>
            <tr class="danger">
                <td align="center"><?= $result['term'] ?>/<?= $result['year'] ?></td>
                <td align="center"><?= number_format($result_rx['prize']) ?></td>
                <td align="center"><font color="red"><?= $result['pay_status'] ?></font></td>
            </tr>
          <?php 
                }else{  
          ?>
                    <tr class="info">
                        <td align="center"><?= $result['term'] ?>/<?= $result['year'] ?></td>
                        <td align="center"><?= number_format($result_rx['prize']) ?></td>
                        <td align="center"><font color="green"><?= $result['pay_status'] ?></font></td>
                    </tr>    
          <?php
                }
          ?>
                
          <?php 
                } 
          ?> 
        </tbody>
    </table> 
</blockquote>