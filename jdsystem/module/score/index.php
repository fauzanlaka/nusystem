<div class="btn-group btn-group-justified">
  <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-book"></span> HASIL PERKULIAHAN</a>
</div>
<?php

//$page = $_GET['page']; // To get the page

$scorepage = $_GET['scorepage']; // To get the page

if($scorepage == NULL){
    $scorepage = 'index';
}
    switch ($scorepage) {
        case 'index':
            include 'module/score/score.php';
            break;
    }				
?>