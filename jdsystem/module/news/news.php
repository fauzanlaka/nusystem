<div class="btn-group btn-group-justified">
  <a href="?page=news&&newspage=news" class="btn btn-default"><span class="glyphicon glyphicon-text-size"></span> Berita && Maklumat</a>
</div>
<?php

//$page = $_GET['page']; // To get the page

$newspage = $_GET['newspage']; // To get the page

if($newspage == NULL){
    $newspage = 'news';
}
    switch ( $newspage) {
        case 'news':
            include 'module/news/hotnews.php';
            break;
        case 'detail':
            include 'module/news/detail.php';
            break;
        case 'download':
            include 'module/news/download.php';
            break;
    }				
?>