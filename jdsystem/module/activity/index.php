<div class="btn-group btn-group-justified">
  <a href="?page=activity&&activitypage=home" class="btn btn-default"><span class="glyphicon glyphicon-home"></span> HOME</a>
  <a href="?page=activity&&activitypage=main" class="btn btn-default"><span class="glyphicon glyphicon-list"></span> SEJARAH KEGIATAN</a>
</div>
<?php

$activitypage = $_GET['activitypage']; // To get the page

if($activitypage == NULL){
    $activitypage = 'profile';
}
    switch ($activitypage) {
        case 'main':
            include 'module/activity/main.php';
            break;
        case 'home':
            include 'module/activity/home.php';
            break;
    }
?>
