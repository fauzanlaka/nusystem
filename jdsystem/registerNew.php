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
  </head>
    <body > 
        
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                                include 'register/saveStep1.php';
                                break;
                            case 'step2':
                                include 'register/step2.php';
                                break;
                        }
                ?>
                </div>
            </div>
        </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="select/dist/js/bootstrap-select.js"></script>
    </body>
</html>
