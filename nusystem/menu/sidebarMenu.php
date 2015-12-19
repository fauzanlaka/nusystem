<?php
    $fname = str_replace("\'", "&#39;", $objResult['u_fname']);
    $lname = str_replace("\'", "&#39;", $objResult['u_lname']);
    $idnumber = str_replace("\'", "&#39;", $objResult['u_identitynumber']);
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">ผู้ใช้งานระบบ</h3>
  </div>
  <div class="panel-body">
      <p><b>ล็อคอินในชื่อ :</b> <?= $fname ?> - <?= $lname ?></p> 
      <p><b>ประเภทผู้ใช้ : </b> <?= $_SESSION["UserType"] ?></b> </p> 
      <p><b>รหัสประจำตัว :</b> <?= $idnumber ?></p> 
  </div>
</div>

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">เมนู</h3>
  </div>
  <div class="panel-body">
      <ul class="nav nav-pills nav-stacked">
            <li role="presentation"><a href="?page=childType&&ctpage=index"><span class='glyphicon glyphicon-triangle-right'></span> <span class='glyphicon glyphicon-barcode'></span> ข้อมูลประเภทเด็ก</a></li>
            <li role="presentation"><a href="?page=child&&cpage=index"><span class='glyphicon glyphicon-triangle-right'></span> <span class='glyphicon glyphicon-user'></span> ข้อมูลเด็ก</a></li>
            <li role="presentation"><a href="?page=report&&rpage=index"><span class='glyphicon glyphicon-triangle-right'></span> <span class='glyphicon glyphicon-list'></span> รายงาน</a></li>
            <li role="presentation"><a href="#"><span class='glyphicon glyphicon-triangle-right'></span> <span class='glyphicon glyphicon-stats'></span> สถิติ</a></li>
            <li role="presentation"><a href="#"><span class='glyphicon glyphicon-triangle-right'></span> <span class='glyphicon glyphicon-list-alt'></span> ดาวน์โลหดแบบฟอร์ม</a></li>
            <li role="presentation"><a href="#"><span class='glyphicon glyphicon-triangle-right'></span> <span class='glyphicon glyphicon-eye-open'></span> อาสาสมัคร</a></li>
            <li role="presentation"><a href="#"><span class='glyphicon glyphicon-triangle-right'></span> <span class='glyphicon glyphicon-th'></span> คณะกรรมการ</a></li>
            
      </ul>
  </div>
</div>

