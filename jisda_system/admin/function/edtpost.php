<?php
include("../connect.php");
if(isset($_POST['save'])){
			if(move_uploaded_file($_FILES["image"]["tmp_name"],"../images/".$_FILES["image"]["name"])){
				echo "<script language='JavaScript'>";
				echo "alert('Upload file berjaya')";
				echo "</script>";
				
				$id = $_POST['p_id'];
				$title = mysql_real_escape_string($_POST['p_title']);
				$post = mysql_real_escape_string($_POST['p_post']);	
				$other = mysql_real_escape_string($_POST['p_other']);
				$publish = mysql_real_escape_string($_POST['publish']);
				
				$sql = "UPDATE post SET p_title='$title' , p_post='$post' , p_other='$other' , publish='$publish' , file='".$_FILES['image']['name']."' where p_id='$id'";
				
				if (mysql_query($sql)){
				echo "<script language='JavaScript'>";
				echo "alert('Post berjaya , Post anda akan di publishkan1')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=edtpost.php?p_id=$id' />";
				} else {
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
				}
		}else{
			$id = $_POST['p_id'];
			$title = mysql_real_escape_string($_POST['p_title']);
			$post = mysql_real_escape_string($_POST['p_post']);	
			$other = mysql_real_escape_string($_POST['p_other']);
			$publish = mysql_real_escape_string($_POST['publish']);
				
			$sql = " UPDATE post SET p_title='$title' , p_post='$post' , p_other='$other' , publish='$publish' ,file='fauzan111' where p_id='$id'";
				
			if (mysql_query($sql)){
				echo "<script language='JavaScript'>";
				echo "alert('Post berjaya , Post anda akan di publishkan2')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=edtpost.php?p_id=$id' />";
			}else {
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
			}
		}
	}
?>