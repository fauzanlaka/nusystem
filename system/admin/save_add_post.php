<?php
	include("connect.php");
	$u_id = $_POST['u_id'];
	
	$sql1 = "select * from user where u_id='$u_id'";
	$query1 = mysql_query($sql1);
	$result1 = mysql_fetch_array($query1);
	
	if(isset($_POST['save'])){
			if(move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"])){
				echo "<script language='JavaScript'>";
				echo "alert('Upload file berjaya')";
				echo "</script>";
				
				$title = mysql_real_escape_string($_POST['p_title']);
				$post = mysql_real_escape_string($_POST['p_post']);	
				$other = mysql_real_escape_string($_POST['p_other']);
				$author = mysql_real_escape_string($_POST['publish']);
				$date = date('Y-m-d H:i:s');
				$publish = mysql_real_escape_string($_POST['publish']);
				
				$sql = "insert into post (p_title,p_post,p_other,p_date,file,p_author,publish) values ('$title','$post','$other','$date','".$_FILES['image']['name']."','$author','$publish')";
				
				if (mysql_query($sql)){
				echo "<script language='JavaScript'>";
				echo "alert('Post berjaya , Post anda akan di publishkan')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=add_post.php' />";
				} else {
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
				}
		}else{
			$title = mysql_real_escape_string($_POST['p_title']);
			$post = mysql_real_escape_string($_POST['p_post']);	
			$other = mysql_real_escape_string($_POST['p_other']);
			$author = mysql_real_escape_string($result1['u_fname']);
			$date = date('Y-m-d H:i:s');
			$publish = mysql_real_escape_string($_POST['publish']);
				
			$sql = "insert into post (p_title,p_post,p_other,p_date,p_author,publish) values ('$title','$post','$other','$date','$author','$publish')";
				
			if (mysql_query($sql)){
				echo "<script language='JavaScript'>";
				echo "alert('Post berjaya , Post anda akan di publishkan')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=add_post.php' />";
			}else {
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
			}
		}
	}
 ?>