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
            include 'module/child/childList/step2Save.php';
            break;
        case 'step1':
            include 'module/child/childAdd/step1.php';
            break;
        case 'step2':
            include 'module/child/childAdd/step2.php';
            break;
        case 'childList':
            include 'module/child/childList/childList.php';
            break;
    }				
?>
