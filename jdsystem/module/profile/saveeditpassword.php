<?php 
    $id = $_SESSION['UserID'];
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $sql = "UPDATE students SET password='".$password."' WHERE st_id='$id'";
    
    if(mysqli_query($con, $sql)){
?>
    <br>
    <div class="alert alert-dismissible alert-success">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <strong>Berhasil!</strong> Password anda berhasil di perbaharui. 
    </div>
<?php
    }
?>
