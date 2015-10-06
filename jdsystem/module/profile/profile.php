<div class="btn-group btn-group-justified">
  <a href="?page=profile&&profilepage=show" class="btn btn-default"><span class="glyphicon glyphicon-book"></span> Profil anda</a>
  <a href="?page=profile&&profilepage=edit" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Ubah profil</a>
  <a href="?page=profile&&profilepage=password" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span> Ubah password</a>
</div>
<?php

//$page = $_GET['page']; // To get the page

$profilepage = $_GET['profilepage']; // To get the page

if($profilepage == NULL){
    $profilepage = 'profile';
}
    switch ($profilepage) {
        case 'profile':
            include 'module/profile/show.php';
            break;
        case 'show':
            include 'module/profile/show.php';
            break;
        case 'edit':
            include 'module/profile/edit.php';
            break;
        case 'saveedit':
            include 'module/profile/saveedit.php';
            break;
        case 'password':
            include 'module/profile/password.php';
            break;
        case 'editpasswd':
            include 'module/profile/saveeditpassword.php';
            break;
    }				
?>
