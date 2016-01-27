
<?php
    $st_id = $_GET['id'];
    $student = mysqli_query($con, "SELECT s.*,p.* FROM students s INNER JOIN pretest p ON s.st_id=p.st_id WHERE p.st_id='$st_id'");
    $rowStudent = mysqli_fetch_array($student);

    //Get data 
    $regNumber = $rowStudent['regNumber'];
    $fname = str_replace("\'", "&#39;", $rowStudent["firstname_jawi"]);
    $lname = str_replace("\'", "&#39;", $rowStudent["lastname_jawi"]);
    $regisDate = $rowStudent['regisDate'];
    
    $first_ftId = $rowStudent['first_ftId'];
    $first_dpId = $rowStudent['first_dpId'];
    $second_ftId = $rowStudent['second_ftId'];
    $second_dpId = $rowStudent['second_dpId'];
    
    $pre_username = $rowStudent['pre_username'];
    $pre_password = $rowStudent['pre_password'];
    
    
?>
<div class="col-lg-3"></div>
    
        <div class="col-lg-6">
            
            
                <br>
                <p align="center"><img src="image/jisda.png" class="img-responsive" alt="Responsive image" width="150px" height="1px"></p>
                <h4 align="center"><b><f class="main">جامعة  داود الفطاني اﻹسلامية - جالا </f></b></h4>
                <h5 align="center"><b><f class="main">فنريمأن مهاسيسوا بارو تاهون اکاديميک 2016</f></b></h5>
            
                <div class="alert alert-dismissible alert-danger">
                    <h4 class="text-right"><f class="subText">! چاتتن</f></h4>
                    <p class="text-right">
                        <f class="subText">
                        اونتوق سمفرناکن فندفتران اندا مستي سرهکن فرشرطن دان ڬوناکن نمبردفتر اندا (تردافت دالم کرتس لافوران دفتر) کإدارة جيسدا<br>
                              سبلوم تڠڬل <b>1/03/2016</b>
                        </f>
                    </p>
                </div>    
                
            <div id="printableArea">
                <div class="panel panel-primary">
                    <div class="panel-body">
                        <p class="text-center"><f class="main">كرتس لافوران فندفتران</p>
                        <p class="text-right"><f class="subText"><b> نمبر دفتر : </b><?= $regNumber ?></f></p>
                        <p class="text-right"><f class="subText"><b>تاريخ دفتر  : </b> <?= $regisDate ?></f></p>
                        <p class="text-right"><f class="subText"><b>نام - نسب  : </b><?= $fname ?> - <?= $lname ?></f></p>
                    <p class="text-right"><f class="subText"><b>-: فيليهن کلية  </b></f></p>
                        
                        <?php
                            $fakulty1 = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$first_ftId'");
                            $rowFakulty1 = mysqli_fetch_array($fakulty1);
                            $fakulty2 = mysqli_query($con, "SELECT * FROM fakultys WHERE ft_id='$second_ftId'");
                            $rowFakulty2 = mysqli_fetch_array($fakulty2);
                            
                            $department1 = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$first_dpId'");
                            $rowDepartment1 = mysqli_fetch_array($department1);
                            $department2 = mysqli_query($con, "SELECT * FROM departments WHERE dp_id='$second_dpId'");
                            $rowDepartment2 = mysqli_fetch_array($department2);
                            
                            $fakulty1Name = str_replace("\'", "&#39;", $rowFakulty1["ft_arab_name"]);
                            $fakulty2Name = str_replace("\'", "&#39;", $rowFakulty2["ft_arab_name"]);
                            
                            $department1Name = str_replace("\'", "&#39;", $rowDepartment1["dp_arab_name"]);
                            $department2Name = str_replace("\'", "&#39;", $rowDepartment2["dp_arab_name"]);
                        ?>
                        
                        
                        <p class="text-right"><f class="subText"> فيليهن فرتام : <?= $fakulty1Name ?> <?php if($first_dpId != 0){ echo "&nbsp;&nbsp;&nbsp;&nbsp;"."جوروسن"." ".$department1Name; } ?></f>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        <p class="text-right"><f class="subText"> فيليهن کدوا : <?= $fakulty2Name ?> <?php if($second_dpId != 0){ echo "&nbsp;&nbsp;&nbsp;&nbsp;"."جوروسن"." ".$department2Name; } ?></f>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        
                        <p class="text-right"><f class="subText"></f><?= $pre_username ?> : Username</p>
                        <p class="text-right"><f class="subText"></f><?= $pre_password ?> : Password</p>
                    </div>
                </div>
            </div>
            
            <div align="center">
                <button type="button" class="btn btn-success btn-sm" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
                <a href="index.php" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-ok"></span> SELESAIKAN</a> 
            </div>
            <br><br>
        </div>

<div class="col-lg-3"></div>

<script language="javascript" type="text/javascript">
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
        
</script>
