<?php
    echo "<b>"."กำลังบันทึกข้อมูล กรุณารอสักครู่..."."</b>";
    //Childs's data
    $fName = mysqli_real_escape_string($con, $_POST['fName']);
    $lName = mysqli_real_escape_string($con, $_POST['lName']);
    $idCard = mysqli_real_escape_string($con, $_POST['idCard']);
    $bDate = mysqli_real_escape_string($con, $_POST['bDate']);
    $wieght = mysqli_real_escape_string($con, $_POST['wieght']);
    $hieght = mysqli_real_escape_string($con, $_POST['hieght']);
    $shoeSize = mysqli_real_escape_string($con, $_POST['shoeSize']);
    $shirtSize = mysqli_real_escape_string($con, $_POST['shirtSize']);
    $bloodType = mysqli_real_escape_string($con, $_POST['bloodType']);
    $diseases = mysqli_real_escape_string($con, $_POST['diseases']);
    $brethren = mysqli_real_escape_string($con, $_POST['brethren']);
    $sonNumber = mysqli_real_escape_string($con, $_POST['sonNumber']);
    $menBrethren = mysqli_real_escape_string($con, $_POST['menBrethren']);
    $womenBrethren = mysqli_real_escape_string($con, $_POST['womenBrethren']);
    
    //--------------------------------------------------------------------------
    //Code creat system
    $code = "SELECT max(c_code) AS mx FROM childs";

    $record = mysqli_query($con, $code) or die(mysqli_error());

    $row = mysqli_fetch_assoc($record);

    $mem_old = $row['mx'];// gives the highest id
    
    //Get current year
    $y = date('Y');
    $tmpy=substr($y,2);
    //echo $mem_old;
    $tmp1=substr($mem_old,0,3);//จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
    $tmp2=substr($mem_old,3,10);//ตัวเลขที่เหลือ
    $tmp3=$tmp2+1;//จริงๆ เอาไปรวมกับตัว $tmp2 เลยก็ได้ค่ะ แต่ว่ากลัวงง ก็เลยแยกไว้ให้
    
    echo "<br>";
    echo $tmp3;

    //อันนี้ใช้ BP(buffalo power) ไปนิดนึง ปรับไปใช้ loop มาช่วยก็ได้นะคะ
    if($tmp3 <= 9){$tmp4 = 'O'.$tmpy.'000000'.$tmp3;}
    if($tmp3 > 9 && $tmp3 <= 99){$tmp4 = 'O'.$tmpy.'00000'.$tmp3;}
    echo "<br>";
    echo $tmp4;
    //--------------------------------------------------------------------------
    
    //Existing data checking
    $exist = mysqli_query($con, "SELECT * FROM childs WHERE c_idCard='$idCard'");
    $rowIdCard = mysqli_fetch_array($exist);
    
    if($rowIdCard[0] > 0){
?>  
<script>
    alert("ข้อมูลบุคคลนี้มีอยู่ในระบบเเล้ว");
</script>
<meta http-equiv="refresh" content="0; url=?page=child&&cpage=step1">
<?php
    }else{
    
    $insert = mysqli_query($con, "INSERT INTO childs
                           (c_fName,c_lName,c_idCard,c_birdthDate,c_wieght,c_hieght,c_shoeSize,c_shirtSize,c_bloodType,c_disease,c_brethren,c_sonNumber,menBrethren,womenBrethren,c_code)
                           VALUES
                           ('$fName','$lName','$idCard','$bDate','$wieght','$hieght','$shoeSize','$shirtSize','$bloodType','$diseases','$brethren','$sonNumber','$menBrethren','$womenBrethren','$tmp4')
                          ");
    $child = mysqli_query($con, "SELECT * FROM childs WHERE c_id = (SELECT MAX(c_id) FROM childs)");
    $rowChild = mysqli_fetch_array($child);
    $c_id = $rowChild['c_id'];
    //----------------------------------------------------------------------------------------------
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
        
        <meta http-equiv="refresh" content="0; url=?page=child&&cpage=step2&&id=<?= $c_id ?>">
<?php
    }
?>