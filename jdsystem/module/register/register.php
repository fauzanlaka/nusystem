<div class="btn-group btn-group-justified">
  <a href="?page=register&&registerpage=study" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> DAFTAR BELAJAR</a>
  <a href="?page=register&&registerpage=exam" class="btn btn-default"><span class="glyphicon glyphicon-plus-sign"></span> DAFTAR UJIAN</a>
</div>
<?php

//$page = $_GET['page']; // To get the page

$registerpage = $_GET['registerpage']; // To get the page

if($registerpage == NULL){
    $registerpage = 'register';
}
    switch ($registerpage) {
        case 'study':
            include 'module/register/study.php';
            break;
        case 'list':
            include 'module/register/list.php';
            break;
        case 'exam':
            include 'module/register/exam.php';
            break;
        case 'stdsave':
            include 'module/register/stdsave.php';
            break;
        case 'exmsave':
            include 'module/register/exmsave.php';
            break;
    }				
?>