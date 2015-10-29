<br>
<?php
    $id = $_POST['id'];
    $u_fname = mysqli_real_escape_string($con,$_POST['u_fname']);
    $u_lname = mysqli_real_escape_string($con,$_POST['u_lname']);
    $u_email = mysqli_real_escape_string($con,$_POST['u_email']);
    $u_telephone = mysqli_real_escape_string($con,$_POST['u_telephone']);
    $u_utype = mysqli_real_escape_string($con,$_POST['u_utype']);
    $u_username = mysqli_real_escape_string($con,$_POST['u_username']);
    $u_password = mysqli_real_escape_string($con,$_POST['u_password']);
    
    if(isset($_POST['save'])){
        if(!empty($_FILES['image']['tmp_name'])){
            if(move_uploaded_file($_FILES["image"]["tmp_name"],"module/user/image/".$_FILES["image"]["name"])){
                $update = "UPDATE users SET 
                           u_fname='".$u_fname."',
                           u_lname='".$u_lname."',
                           u_email='".$u_email."',
                           u_telephone='".$u_telephone."',
                           u_utype='".$u_utype."',
                           u_image='".$_FILES["image"]["name"]."',
                           u_username='".$u_username."',
                           u_password='".$u_password."'
                           WHERE u_id='$id'"; 
                if(mysqli_query($con, $update)){ ?>
                       <div class="alert alert-dismissible alert-success">
                           <button type="button" class="close" data-dismiss="alert">×</button>
                           <strong>สำเร็จ !</strong> แก้ไขข้อมูลเรียบร้อยเเล้ว <a href="?page=user&&userpage=list" class="alert-link">คลิกเพื่อตรวจสอบ</a>.
                       </div>
               <?php
               }else{
                     echo "อัพโหลดรูปภาพไม่สำเร็จ กรุณาใช้ไฟล์ jpeg เเละขนาดเล็กที่สุด";
               }
            }       
     }else{
            $update = "UPDATE users SET 
                           u_fname='".$u_fname."',
                           u_lname='".$u_lname."',
                           u_email='".$u_email."',
                           u_telephone='".$u_telephone."',
                           u_utype='".$u_utype."',
                           u_username='".$u_username."',
                           u_password='".$u_password."'
                           WHERE u_id='$id'"; 
             if(mysqli_query($con, $update)){ ?>
                    <div class="alert alert-dismissible alert-success">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>สำเร็จ !</strong> แก้ไขข้อมูลเรียบร้อยเเล้ว <a href="?page=user&&userpage=edit&&id=<?= $id ?>" class="alert-link">คลิกเพื่อตรวจสอบ</a>.
                    </div>
     <?php
             }
     }
   }
?>
