<div class="pull-left">
    <h4><span class="glyphicon glyphicon-tags"></span> Hasil perkuliahan</h4>
</div>

<div class="pull-right">
    <a href="?page=score&&scorepage=index">
        <button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> HASIL PERKULIAHAN</button>
    </a>
    <a href="?page=score&&scorepage=dul">
        <button type="button" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> DAFTAR DUL</button>
    </a>
</div>
<br>
<hr>

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
        case 'dul':
            include 'module/score/dul.php';
            break;
    }				
?>