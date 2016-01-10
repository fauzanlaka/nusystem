<?php
    //Student ID
    $id = $_SESSION["UserID"];
    $register = mysqli_query($con, "SELECT * FROM student_register WHERE st_id='$id'");
    $fecId = mysqli_fetch_array($register);
    $idSend = $fecId['st_id']; 
?>
<h4><b>HASIL PERKULIAHAN PER SEMESTER</b></h4>
<div class="pull-right">
    <a href="module/score/print.php?id=<?= $idSend ?>" target="_blank" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-print"></span> PRINT</a>
</div><br>
<?php
    //Student ID
    $id = $_SESSION["UserID"];
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
                <td align="center"><b>KOD</b></td>
                <td align="center"><b>MATA KULIAH</b></td>
                <td align="center"><b>PENSYARAH</b></td>
                <td align="center"><b>NATIJAH</b></td>
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
    <hr>
    <?php
        }
    ?>
