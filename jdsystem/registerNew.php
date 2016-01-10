<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>JISDA || Jamiah islam syaikh daut al-fathani</title>
    <link rel="icon" href="icon/favicon.png" sizes="16x16" type="image/png">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="select/dist/css/bootstrap-select.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    
    <style> 
        @font-face {
            font-family: "jawi";
            src: url(register/font/jawi.ttf);
        }

        f.main{
            font:35px "jawi";
        }
        f.subText{
            font: 18px "jawi";
        }
        f.thai{
            font: 12px "jawi";
        }
    </style>
  </head>
    <body style='background-image: url("image/Clouds.gif"); opacity:0.8;'> 
        
        <div class="container">
                <?php 
                        include("connect.php");
                        $page = $_GET['page']; // To get the page
                        if($page == NULL){
                            $page = 'main';
                        }
                        switch ($page) {
                            case 'main':
                                include 'register/index.php';
                                break;
                            case 'add':
                                include 'register/add.php';
                                break;
                            case 'step1':
                                include 'register/step1.php';
                                break;
                            case 'saveStep1':
                                include 'register/step1Save.php';
                                break;
                            case 'success':
                                include 'register/success.php';
                                break;
                            case 'login':
                                include 'register/login.php';
                                break;
                            case 'checkLogin':
                                include 'register/checkLogin.php';
                                break;
                            case 'edit':
                                include 'register/edit.php';
                                break;
                            case 'logout':
                                include 'register/logout.php';
                                break;
                            case 'saveEdit':
                                include 'register/saveEdit.php';
                                break;
                        }
                ?>
        </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="select/dist/js/bootstrap-select.js"></script>
    </body>
</html>
