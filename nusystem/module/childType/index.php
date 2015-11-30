<!-- 
<div class="btn-group btn-group-justified">
  <a href="?page=childType&&ctpage=index" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> หน้าหลัก</a>
  <a href="?page=childType&&ctpage=child" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> ประเภทเด็ก</a>
  <a href="?page=childType&&ctpage=project" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> ประเภทโครงการ</a>
  <a href="?page=childType&&ctpage=childList" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> ประเภทเด็ก</a>
  <a href="?page=childType&&ctpage=projectList" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> ประเภทโครงการ</a>
</div>
-->
<div class="pull-right">
    <div class="btn-group">
        <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มใหม่</button>
      <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="?page=childType&&ctpage=child">ประเภทเด็ก</a></li>
          <li><a href="?page=childType&&ctpage=project">ประเภทโครงการ</a></li>
          <!-- Other items -->
        </ul>
    </div>
        <div class="btn-group">
            <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> รายละเอียด</button>
      <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="?page=childType&&ctpage=childList">ประเภทเด็ก</a></li>
          <li><a href="?page=childType&&ctpage=projectList">ประเภทโครงการ</a></li>
          <!-- Other items -->
        </ul>
    </div>
</div><br>
<?php

$ctpage = $_GET['ctpage']; // To get the page

if($ctpage == NULL){
    $ctpage = 'index';
}
    switch ($ctpage) {
        case 'index':
            include 'module/childType/main.php';
            break;
        case 'child':
            include 'module/childType/child/child.php';
            break;
        case 'saveChild':
            include 'module/childType/child/saveChild.php';
            break;
        case 'saveEditChild':
            include 'module/childType/child/saveEditChild.php';
            break;
        case 'childList':
            include 'module/childType/child/childList.php';
            break;
        case 'editChildType':
            include 'module/childType/child/editChildType.php';
            break;
        case 'deleteChildType':
            include 'module/childType/child/deleteChildType.php';
            break;
        case 'project':
            include 'module/childType/project/project.php';
            break; 
        case 'saveProject':
            include 'module/childType/project/saveProject.php';
            break;
        case 'saveEditProject':
            include 'module/childType/project/saveEditProject.php';
            break;
        case 'projectList':
            include 'module/childType/project/projectList.php';
            break;
        case 'deleteProjectType':
            include 'module/childType/project/deleteProjectType.php';
            break;
        case 'editProjectType':
            include 'module/childType/project/editProjectType.php';
            break;
    }				
?>
