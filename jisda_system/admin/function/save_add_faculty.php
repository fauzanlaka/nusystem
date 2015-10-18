<?php 
 	include("../connect.php");
	$ftname = $_POST['ft_name'];
	$ftcode =$_POST['ft_code'];
	
	$sql = "select count(*) from fakultys where (ft_name='$ftname' or ft_code='$ftcode')";
	$res = mysql_query($sql);
	$row = mysql_fetch_array($res);
	
	
		
	if( $row[0] > 0){
			echo '<script type="text/javascript">';
			echo 'alert("Fakulti atau kode sudah ada")';
			echo '</script>';
			echo "<meta http-equiv='refresh' content='0;url=../add_faculty_form.php' />";
		}
			else
			{	
				if(isset($_POST['save'])){
						
				if(move_uploaded_file($_FILES["image"]["tmp_name"],"../images/".$_FILES["image"]["name"])){
				$name = mysql_real_escape_string($_POST['ft_name']);
				$ft_describtion = mysql_real_escape_string($_POST['ft_describtion']);
				$ft_code = mysql_real_escape_string($_POST['ft_code']);
				
				
				$sql = "insert into fakultys (ft_name,ft_describtion,image,ft_code) values ('$name','$ft_describtion','".$_FILES['image']['name']."','$ft_code')";
				
				if (mysql_query($sql)){
				echo '<script type="text/javascript">';
				echo 'alert("Tambah falkulty baru berjaya")';
				echo '</script>';
				echo "<meta http-equiv='refresh' content='0;url=../add_faculty_form.php' />";
				} 
					else {
						echo "Error: " . $sql . "<br>" . mysql_error($connect);
					}
				}
				
				else{
		  
				$name = mysql_real_escape_string($_POST['ft_name']);
				$ft_describtion = mysql_real_escape_string($_POST['ft_describtion']);
				$ft_code = mysql_real_escape_string($_POST['ft_code']);
				
				$sql = "insert into fakultys (ft_name,ft_describtion,ft_code) values ('$name','$ft_describtion','$ft_code')";
				
				if (mysql_query($sql)){
				echo '<script type="text/javascript">';
				echo 'alert("Tambah beerjaya")';
				echo '</script>';
				echo "<meta http-equiv='refresh' content='0;url=../faculty_list.php' />";
				} 
					else {
						echo "Error: " . $sql . "<br>" . mysql_error($connect);
					}
				}
			}	
		}
?>


