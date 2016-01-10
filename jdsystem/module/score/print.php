<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <title>ADMIN | Resit</title>
    
    <style>
        body {
            height: 842px;
            width: 595px;
            /* to centre page on screen*/
            margin-left: auto;
            margin-right: auto;
        }
            table {
        border-collapse: collapse;
            }
    </style>
    
    <script language="javascript" type="text/javascript">
        function printDiv(printableArea) {
            var printContents = document.getElementById(printableArea).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>

    </head>
    <?php
        include '../../connect.php';
        $id = $_GET['id'];        
    ?>
	<body>			
            <div id="printableArea">
            <?php
                //Student ID
                $register = mysqli_query($con, "SELECT * FROM student_register WHERE st_id='$id'");
                $fecId = mysqli_fetch_array($register);
                $idSend = $fecId['st_id']; 
                
                //Get student data
                $student = mysqli_query($con, "SELECT * FROM students WHERE st_id='$id'");
                $rs = mysqli_fetch_array($student);
                $stu_id = $rs['student_id'];
                $fname = $rs['firstname_rumi'];
                $lname = $rs['lastname_rumi'];
            ?>
                <h4 class="text-center"><b>ผลการเรียน</b></h4>
                <div class="pull-left">
                    <p>รหัสนักศึกษา : <?= $stu_id ?></p>
                    <p>ชื่อ นามสกุล : <?= $fname ?>-<?= $lname ?></p> 
                </div><br><br><br>
                <?php
                    //Student ID
                    $id = $_GET["id"];
                    $register = mysqli_query($con, "SELECT * FROM student_register WHERE st_id='$id'");

                        //Get all registeration , order by year
                        while($rowRegister = mysqli_fetch_array($register)){
                            $term = $rowRegister['term'];
                            $year = $rowRegister['academic_year'];

                        echo "<b>".$term."</b>";
                        echo "/";
                        echo "<b>".$year."</b>";
                    ?>
                    <table class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <td align="center"><b>รหัสวิชา</b></td>
                                <td align="center"><b>วิชา</b></td>
                                <td align="center"><b>ผู้สอน</b></td>
                                <td align="center"><b>เกรด</b></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $subject = mysqli_query($con, "SELECT ss.*,s.*,t.* FROM studentSubject ss
                                                        INNER JOIN subject s ON ss.s_id=s.s_id
                                                        INNER JOIN teachers t ON ss.t_id=t.t_id
                                                        WHERE ss.ss_term='$term' AND ss.ss_year='$year' and ss.st_id='$id'");
                                while($rowSubject = mysqli_fetch_array($subject)){
                            ?>    
                            <tr>
                                <td align="center"><?= $rowSubject['s_code'] ?></td>
                                <td><?= $rowSubject['s_rumiName'] ?></td>
                                <td><?= $rowSubject['t_fnameRumi'] ?> - <?= $rowSubject['t_lnameRumi'] ?></td>
                                <td align="center">
                                    <?php
                                        $score = $rowSubject['ss_score'];
                                        if ($score <= 49){
                                            $score = "F";
                                        }elseif ($score <= 54) {
                                            $score = "D";
                                        }elseif ($score <= 59) {
                                            $score = "D+";
                                        }elseif ($score <= 64) {
                                            $score = "C";
                                        }elseif ($score <= 69) {
                                            $score = "C+";
                                        }elseif ($score <= 74) {
                                            $score = "B";
                                        }elseif ($score <= 79) {
                                            $score = "B+";    
                                        }elseif ($score <= 84) {
                                                $score = "A";
                                        }elseif ($score <= 89) {
                                                $score = "A+";
                                        }  else {
                                            $score = "A+";
                                        }
                                    ?>
                                    <?= $score ?>
                                </td>
                            </tr>
                            <?php
                                }
                            ?>
                        </tbody>
                    </table>
                    <?php
                        }
                    ?>
 
            </div>
	<div align="center">
            <button type="button" class="btn btn-success btn-sm" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
	</div>
    </body>
</html>
