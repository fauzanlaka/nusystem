<?php
    $st_id = $_SESSION['UserID'];
    $sql = mysqli_query($con,"SELECT s.*,m.* FROM students s 
        INNER JOIN muqaddimah_pay m  on s.st_id=m.st_id 
        where s.st_id='$st_id'");
?>  
<blockquote>
    <p><span class="glyphicon glyphicon-tags"></span>  Sejarah pembayaran muqaddimah</p>
    <table class="table table-bordered table-hover ">
        <thead>
          <tr>
            <td align="center"><b>Tahun akademik</b></td>
            <td align="center"><b>Jumlah duit</b></td>
          </tr>
        </thead>
        <tbody>
          <?php  
            while($result = mysqli_fetch_array($sql))
            {   
          ?>
            <tr class="info">
                <td align="center"><?= $result['m_academicyear'] ?></td>
                <td align="center">700</td>
            </tr>    
          <?php 
                } 
          ?> 
        </tbody>
    </table> 
</blockquote>