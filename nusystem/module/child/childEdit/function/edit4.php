<?php
         $c_id = $_GET['id'];
         
        //Brethen saving
        if(isset($_POST['fullName'])){
            foreach($_POST['fullName'] as $row=>$Name) 
                { 
                    $name = mysql_real_escape_string($Name); 
                    $b_fullName = mysqli_real_escape_string($con, $_POST['fullName'][$row]);
                    $b_birdthDate = mysqli_real_escape_string($con, $_POST['birdthDate'][$row]);
                    $b_education = mysqli_real_escape_string($con, $_POST['education'][$row]);
                    $b_job = mysqli_real_escape_string($con, $_POST['job'][$row]);
                    $b_telephone = mysqli_real_escape_string($con, $_POST['telephone'][$row]);

                    $brethen = mysqli_query($con, "INSERT INTO brethen 
                                           (c_id,b_fullName,b_birdthDate,b_education,b_job,b_telephone) 
                                           VALUES
                                           ('$c_id','$b_fullName','$b_birdthDate','$b_education','$b_job','$b_telephone')    
                                           ");

                }
        }
?>
<meta http-equiv="refresh" content="0; url=?page=child&&cpage=edit&&tab=4&&id=<?= $c_id ?>">