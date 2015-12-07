<div class="pull-right">
    <div class="btn-group">
        <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มใหม่</button>
      <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="?page=child&&cpage=step1">เด็กกำพร้า</a></li>
            <li><a href="?page=child&&cpage=index">เด็กยากจน</a></li>
        </ul>
    </div>
      <div class="btn-group">
          <a href="?page=child&&cpage=index" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> รายชื่อ</button></a>
      <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">เด็กกำพร้า</a></li>
          <li><a href="#">เด็กยากจน</a></li>
          <!-- Other items -->
        </ul>
    </div>
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
        case 'step1Save':
            include 'module/child/childAdd/function/step1Save.php';
            break;
        case 'step2Save':
            include 'module/child/childAdd/function/step2Save.php';
            break;
        case 'step3Save':
            include 'module/child/childAdd/function/step3Save.php';
            break;
        case 'step1':
            include 'module/child/childAdd/step1.php';
            break;
        case 'step2':
            include 'module/child/childAdd/step2.php';
            break;
        case 'step3':
            include 'module/child/childAdd/step3.php';
            break;
        case 'childList':
            include 'module/child/childList/childList.php';
            break;
        case 'edit':
            include 'module/child/childEdit/edit.php';
            break;
        case 'delete':
            include 'module/child/childEdit/function/delete.php';
            break;
        case 'edit1':
            include 'module/child/childEdit/function/edit1.php';
            break;
        case 'edit2':
            include 'module/child/childEdit/function/edit2.php';
            break;
        case 'edit3':
            include 'module/child/childEdit/function/edit3.php';
            break;
        case 'edit4':
            include 'module/child/childEdit/function/edit4.php';
            break;
        case 'bdel':
            include 'module/child/childEdit/function/bdel.php';
            break;
    }				
?>
