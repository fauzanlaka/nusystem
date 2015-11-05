<div class="btn-group btn-group-justified">
  <a href="?page=child&&cpage=index" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> หน้าหลัก</a>
  <a href="?page=child&&cpage=childAdd" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> ข้อมูลเด็ก</a>
  <a href="?page=child&&cpage=childList" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> ข้อมูลเด็ก</a>
</div>
<?php

$cpage = $_GET['cpage']; // To get the page

if($cpage == NULL){
    $cpage = 'index';
}
    switch ($cpage) {
        case 'index':
            include 'module/child/main.php';
            break;
        case 'childAdd':
            include 'module/child/childAdd/add.php';
            break;
        case 'step1':
            include 'module/child/childAdd/step1.php';
            break;
        case 'childList':
            include 'module/child/childList/childList.php';
            break;
    }				
?>
