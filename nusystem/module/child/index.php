<div class="pull-right">
    <div class="btn-group">
        <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มใหม่</button>
      <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="?page=child&&cpage=step1">เด็กกำพร้า</a></li>
            <li><a href="?page=child&&cpage=step1_1">เด็กยากจน</a></li>
        </ul>
    </div>
      <div class="btn-group">
          <a href="?page=child&&cpage=index" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> รายชื่อ</button></a>
      <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="?page=child&&cpage=orphanList">เด็กกำพร้า</a></li>
          <li><a href="?page=child&&cpage=poorList">เด็กยากจน</a></li>
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
        case 'edit_1':
            include 'module/child/childEdit/edit1.php';
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
        case 'step1_1':
            include 'module/child/childAdd/step1_1.php';
            break;
        case 'step1_1Save':
            include 'module/child/childAdd/function/step1_1Save.php';
            break;
        case 'step2_2':
            include 'module/child/childAdd/step2_2.php';
            break;
        case 'step2_2Save':
            include 'module/child/childAdd/function/step2_2Save.php';
            break;
        case 'step3_3':
            include 'module/child/childAdd/step3_3.php';
            break;
        case 'step3_3Save':
            include 'module/child/childAdd/function/step3_3Save.php';
            break;
        case 'edit_2':
            include 'module/child/childEdit/edit2.php';
            break;
        case 'edit1_1':
            include 'module/child/childEdit/function/edit1_1.php';
            break;
        case 'edit2_2':
            include 'module/child/childEdit/function/edit2_2.php';
            break;
        case 'edit3_3':
            include 'module/child/childEdit/function/edit3_3.php';
            break;
        case 'edit4_4':
            include 'module/child/childEdit/function/edit4_4.php';
            break;
        case 'search':
            include 'module/child/childSearch/search.php';
            break;
        case 'orphanList':
            include 'module/child/orphanList.php';
            break;
        case 'poorList':
            include 'module/child/poorList.php';
            break;
        case 'orphanSearch':
            include 'module/child/childSearch/orphanSearch.php';
            break;
        case 'poorSearch':
            include 'module/child/childSearch/poorSearch.php';
            break;
    }				
