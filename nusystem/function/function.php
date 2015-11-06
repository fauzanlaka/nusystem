<?php
include '../connect.php'; // include the library for database connection
//ตรวจข้อมูลเด็กว่ามีหรือยัง
if(isset($_POST['action']) && $_POST['action'] == 'idCard_availability'){ // Check for the username posted
    $idCard = htmlentities($_POST['idCard']); // Get the username values
    $check_query = mysqli_query($con,'SELECT c_id FROM childs WHERE c_idCard = "'.$idCard.'" '); // Check the database
    echo mysqli_num_rows($check_query); // echo the num or rows 0 or greater than 0
}
?> 
