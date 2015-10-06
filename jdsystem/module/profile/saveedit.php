<?php 
$id = $_SESSION['UserID'];

$j_name = mysqli_real_escape_string($con,$_POST['j_name']);
$j_lastname = mysqli_real_escape_string($con,$_POST['j_lastname']);
$e_name = mysqli_real_escape_string($con,$_POST['e_name']);
$e_lastname = mysqli_real_escape_string($con,$_POST['e_lastname']);     
$t_name = mysqli_real_escape_string($con,$_POST['t_name']);
$t_lastname  = mysqli_real_escape_string($con,$_POST['t_lastname']);     
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$cityzenid = mysqli_real_escape_string($con,$_POST['cityzenid']);
$telephone = mysqli_real_escape_string($con,$_POST['telephone']);
$t_village_name = mysqli_real_escape_string($con,$_POST['t_village_name']);
$house_number = mysqli_real_escape_string($con,$_POST['house_number']);
$place = mysqli_real_escape_string($con,$_POST['place']);
$t_road = mysqli_real_escape_string($con,$_POST['t_road']);
$subdistrict = mysqli_real_escape_string($con,$_POST['subdistrict']);
$district = mysqli_real_escape_string($con,$_POST['district']);
$province = mysqli_real_escape_string($con,$_POST['province']);
$post = mysqli_real_escape_string($con,$_POST['post']);
       
$sql = "UPDATE students SET 
        firstname_jawi='".$j_name."',
        lastname_jawi='".$j_lastname."',
        firstname_rumi='".$e_name."',
        lastname_rumi='".$e_lastname."',
        firstname_eng='".$e_name."',
        lastname_eng='".$e_lastname."',
        t_studentname='".$t_name."',
        t_studentlastname='".$t_lastname."',
        gender='".$gender."',
        cityzen_id='".$cityzenid."',
        telephone='".$telephone."',
        t_village_name='".$t_village_name."',
        house_number='".$house_number."',
        place='".$place."',
        t_road='".$t_road."',
        t_subdistrict='".$subdistrict."',
        t_district='".$district."',
        t_province='".$province."',
        post='".$post."'
        where st_id='$id'
        ";
if(mysqli_query($con, $sql)){
  ?>
<br>
<div class="alert alert-dismissible alert-success">
  <button type="button" class="close" data-dismiss="alert">×</button>
  <strong>Berhasil!</strong> Data anda berhasil di perbaharui. 
</div>
<?php 
  include 'module/profile/edit.php';
    } 
?>