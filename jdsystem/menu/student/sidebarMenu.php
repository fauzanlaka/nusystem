<?php
    $id = $_SESSION['UserID'];
    $sql1 = "select s.*,f.* from students s inner join fakultys f on s.ft_id=f.ft_id where st_id = '$id' ";
    $query1 = mysqli_query($con,$sql1);
    $result1 = mysqli_fetch_array($query1);
    
    //Set class system
    $register = mysqli_query($con, "SELECT r.*,y.* FROM register r INNER JOIN year y ON r.y_id=y.y_id WHERE r.re_id=(SELECT MAX(re_id) FROM register)");
    $rs_register = mysqli_fetch_array($register);
    $year_register = $rs_register['year'];

    $studentClass = $result1['class'];
            
    $first = $year_register; 
    $second = $year_register-1;
    $third  = $year_register-2;
    $fordth = $year_register-3;
    //Kelas sekarang
    $kelas = $studentClass;
    if($kelas == $first){ $cnow = '1'; }
    if($kelas == $second){ $cnow = '2'; }
    if($kelas == $third){ $cnow = '3'; }
    if($kelas == $fordth){ $cnow = '4'; }
    
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><table width="100%">
            <tr><td align="left">(<?= $cnow ?>)</td><td align="right"> <?php echo $result1['firstname_jawi']; ?> - <?php echo $result1['lastname_jawi']; ?></p></td></tr>
      </table></h3>
  </div>
  <div class="panel-body">
      <p><b>No.Pokok :</b> <?php echo $result1['student_id']; ?></p> 
      <p><b>Nama-Baka :</b> <?php echo $result1['firstname_rumi']; ?> - <?php echo $result1['lastname_rumi']; ?></p> 
      <p><b>Fakulti :</b> <?php echo $result1['ft_name']; ?></p> 
  </div>
</div>
<ul class="nav nav-pills nav-stacked">
    <li role="presentation" class="active"><a href="#">MENU</a></li>
    <li role="presentation"><a href="?page=register&&registerpage=study"><span class='glyphicon glyphicon-plus-sign'></span> Daftar / دفتر</a></li>
    <li role="presentation"><a href="?page=payment&&paymentpage=yuran"><span class='glyphicon glyphicon-list-alt'></span> Sejarah bayaran / سجاره بياران</a></li>
    <li role="presentation"><a href="?page=activity&&activitypage=home"><span class='glyphicon glyphicon-pencil'></span> Sejarah Activitas / سجاره اكتيويتس </a></li>
    <li role="presentation"><a href="?page=score&&scorepage=index"><span class='glyphicon glyphicon-pencil'></span> Darajah  / درجة </a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-briefcase'></span> Jadual guru</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-tasks'></span> Borang / Form</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-comment'></span> Peraturan</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-compressed'></span> Struktur</a></li>
    <li role="presentation"><a href="#"><span class='glyphicon glyphicon-stats'></span> Statistik mahasiswa</a></li>
</ul>
