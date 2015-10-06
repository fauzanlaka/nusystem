<?php 
    $q = $_POST['q'];
    $sql =  mysqli_query($con, "select s.*,sr.*,f.* from students s inner join student_register sr on s.st_id=sr.st_id inner join fakultys f on s.ft_id=f.ft_id where s.student_id LIKE '$q%'");
?>
<blockquote>
  <p><span class="glyphicon glyphicon-tags"></span>  Mahasiswa yang sudah daftar</p>
  <div class="pull-left">
        <form class="navbar-form" role="search" action="?page=register&&registerpage=search" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nama atau nomor pokok" name="q" required>
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
  </div>
    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <td align="center"><b>No Pokok</b></td>
          <td align="center"><b>Nama-Bako</b></td>
          <td align="center"><b>Fakulti</b></td>
          <td align="center"><b>Daftar pada</b></td>
          <td align="center"><b>Status<b></td>
        </tr>
      </thead
      <tbody>
        <?php  while($result = mysqli_fetch_array($sql)){ 
            $pay = $result['pay_status'];
            if($pay == 'Belum bayar'){
        ?>
        <tr class="danger">
          <td align="center"><?= $result['student_id']; ?></td>
          <td><?= $result['firstname_rumi'] ?>-<?= $result['lastname_rumi'] ?></td>
          <td align="center"><?= $result['ft_name']; ?></td>
          <td align="center"><?= $result['rs_date']; ?></td>
          <?php 
            $pay = $result['pay_status'];
            if($pay == 'Belum bayar'){
          ?>
          <td align="center"><font color="red"><?= $pay ?></font></td>
          <?php  
            }else{
          ?>
          <td align="center"><font color="green"><?= $pay ?></font></td>
          <?php } ?>
        </tr>
        <?php }else{?> 
          <tr class="active">
          <td align="center"><?= $result['student_id']; ?></td>
          <td><?= $result['firstname_rumi'] ?>-<?= $result['lastname_rumi'] ?></td>
          <td align="center"><?= $result['ft_name']; ?></td>
          <td align="center"><?= $result['rs_date']; ?></td>
          <?php 
            $pay = $result['pay_status'];
            if($pay == 'Belum bayar'){
          ?>
          <td align="center"><font color="red"><?= $pay ?></font></td>
          <?php  
            }else{
          ?>
          <td align="center"><font color="green"><?= $pay ?></font></td>
          <?php } ?>
        </tr>
        <?php } ?>
        <?php } ?>
      </tbody>
    </table> 

</blockquote>