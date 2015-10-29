<br>
<?php
$u_fname = mysqli_real_escape_string($con, $_POST['u_fname']);
$u_lname = mysqli_real_escape_string($con, $_POST['u_lname']);
$u_email = mysqli_real_escape_string($con, $_POST['u_email']);
$u_telephone = mysqli_real_escape_string($con,$_POST['u_telephone']);
$u_utype = mysqli_real_escape_string($con, $_POST['u_utype']);
$u_username = mysqli_real_escape_string($con, $_POST['u_username']);
$u_password = mysqli_real_escape_string($con, $_POST['u_password']);
$u_adder = mysqli_real_escape_string($con, $_POST['u_adder']);
$u_regisdate = date('Y-m-d');

//-----------------------------------------------------------------------------
//สร้างเลขประจำตัวผู้ใช้
$q_identitynumber = "SELECT max(u_identitynumber) AS mx FROM users";

$record = mysqli_query($con, $q_identitynumber) or die(mysqli_error());

$row = mysqli_fetch_assoc($record);

$mem_old = $row['mx'];// gives the highest id

//echo $mem_old;
$tmp1=substr($mem_old,0,1);//จะได้เฉพาะตัวแรกที่เป็นตัวอักษร
$tmp2=substr($mem_old,1);//ตัวเลขที่เหลือ
$tmp3=$tmp2+1;//จริงๆ เอาไปรวมกับตัว $tmp2 เลยก็ได้ค่ะ แต่ว่ากลัวงง ก็เลยแยกไว้ให้

//อันนี้ใช้ BP(buffalo power) ไปนิดนึง ปรับไปใช้ loop มาช่วยก็ได้นะคะ
if($tmp3 <= 9){$tmp4='E000'.$tmp3;}
if($tmp3 > 9 && $tmp3 <= 99){$tmp4='E00'.$tmp3;}
if($tmp3 > 99 && $tmp3 <= 999){$tmp4='E0'.$tmp3;}
if($tmp3 > 999 && $tmp3 <= 9999){$tmp4='E'.$tmp3;}
//ตัว id ต่อไปก็คือ
//echo $tmp4;

//-----------------------------------------------------------------------------
//ตรวจสอบชื่อผู้ใช้ซำ้
$check = mysqli_query($con , "SELECT * FROM users WHERE u_username='$u_username'");
$result = mysqli_fetch_array($check);

if($result[0] > 0){
?>
    <div class="alert alert-dismissible alert-danger">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>ผิดพลาด !</strong> <a href="#" class="alert-link">ชื่อผู้ใช้นี้ถูกใช้เเล้ว </a> กรุณาเลือกชื่อผู้ใช้อื่น
    </div>
<?php   
    }else{

        if(isset($_POST['save'])){
            if(!empty($_FILES['image']['tmp_name'])){
                if(move_uploaded_file($_FILES["image"]["tmp_name"],"module/user/image/".$_FILES["image"]["name"])){
                    $sql = mysqli_query($con, "INSERT INTO users 
                           (u_fname,u_lname,u_email,u_telephone,u_utype,u_username,u_password,u_image,u_adder,u_regisdate,u_identitynumber) VALUES 
                           ('$u_fname','$u_lname','$u_email','$u_telephone','$u_utype','$u_username','$u_password','".$_FILES["image"]["name"]."','$u_adder','$u_regisdate','$tmp4')
                           ");
                ?>
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>สำเร็จ !</strong> เพิ่มผู้ใช้ใหม่เรียบร้อยเเล้ว <a href="?page=user&&userpage=list" class="alert-link">คลิกเพื่อตรวจสอบ</a>.
                    </div>
                <?php
                }else{
                    echo "อัพโหลดรูปภาพไม่สำเร็จ กรุณาใช้ไฟล์ jpeg เเละขนาดเล็กที่สุด";
                }
            }else{
                $sql = "INSERT INTO users 
                           (u_fname,u_lname,u_email,u_telephone,u_utype,u_username,u_password,u_adder,u_regisdate,u_identitynumber) VALUES 
                           ('$u_fname','$u_lname','$u_email','$u_telephone','$u_utype','$u_username','$u_password','$u_adder','$u_regisdate','$tmp4')
                           ";
                if(mysqli_query($con, $sql)){
            ?>
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>สำเร็จ !</strong> เพิ่มผู้ใช้ใหม่เรียบร้อยเเล้ว <a href="?page=user&&userpage=list" class="alert-link">คลิกเพื่อตรวจสอบ</a>.
                    </div>
            <?php
                }
            }
        }
    }
?> 

