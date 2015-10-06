<div class="btn-group btn-group-justified">
  <a href="?page=payment&&paymentpage=yuran" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Yuran</a>
  <a href="?page=payment&&paymentpage=ujian" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Ujian</a>
  <a href="?page=payment&&paymentpage=muqaddimah" class="btn btn-default"><span class="glyphicon glyphicon-list-alt"></span> Muqaddimah</a>
</div>
<?php

//$page = $_GET['page']; // To get the page

$paymentpage = $_GET['paymentpage']; // To get the page

if($paymentpage == NULL){
    $paymentpage = 'yuran';
}
    switch ($paymentpage) {
        case 'yuran':
            include 'module/payment/yuran.php';
            break;
        case 'ujian':
            include 'module/payment/ujian.php';
            break;
        case 'muqaddimah':
            include 'module/payment/muqaddimah.php';
            break;
    }				
?>