<?php

	function editfaculty(){
		
		include("../connect.php");
		
			if(isset($_POST['save'])){
				if(!empty($_FILES['image']['tmp_name'])){
					if(move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"])){
						echo "<script language='JavaScript'>";
						echo "alert('Upload gambar berjaya')";
						echo "</script>";
					}
					else{
						echo "<script language='javascript>";
						echo "alert(Upload gambar gagal)";	
					}
					$ftname = mysql_real_escape_string($_POST['ft_name']);
					$ftdescribe = mysql_real_escape_string($_POST['ft_describtion']);
					$ftcode = mysql_real_escape_string($_POST['ft_code']);
					$id = $_POST['id'];
			
					$sql = "UPDATE fakultys SET  ft_name='".$ftname."',ft_describtion='".$ftdescribe."',ft_code='".$ftcode."',image='".$_FILES["image"]["name"]."' where ft_id='$id' ";
			
					if (mysql_query($sql)){
						echo "<script language='JavaScript'>";
						echo "alert('Perubahan berjaya')";
						echo "</script>";
						echo "<meta http-equiv='refresh' content='0;url=edit_faculty.php?id=$id' />";
					} 
					else{
						echo "Error: " . $sql . "<br>" . mysql_error($connect);
					}
				}
				else{
					$ftname = mysql_real_escape_string($_POST['ft_name']);
					$ftdescribe = mysql_real_escape_string($_POST['ft_describtion']);
					$ftcode = mysql_real_escape_string($_POST['ft_code']);
					$id = $_POST['id'];
					
					$sql = "UPDATE fakultys SET  ft_name='".$ftname."',ft_describtion='".$ftdescribe."',ft_code='".$ftcode."' where ft_id='$id' ";
					
					if (mysql_query($sql)){
						echo "<script language='JavaScript'>";
						echo "alert('Perubahan berjaya')";
						echo "</script>";
						echo "<meta http-equiv='refresh' content='0;url=edit_faculty.php?id=$id' />";
					} 
					else{
						echo "Error: " . $sql . "<br>" . mysql_error($connect);
					}
					
				}
			}	
	}
	
	function editdepartment(){
		
		include("../connect.php");
		
			if(isset($_POST['save'])){
				if(!empty($_FILES['image']['tmp_name'])){
					if(move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"])){
						echo "<script language='JavaScript'>";
						echo "alert('Upload gambar berjaya')";
						echo "</script>";
					}
					else{
						echo "<script language='javascript>";
						echo "alert(Upload gambar gagal)";	
					}
					$dp_code = mysql_real_escape_string($_POST['dp_code']);
					$dp_name = mysql_real_escape_string($_POST['dp_name']);
					$ft_id = mysql_real_escape_string($_POST['ft_id']);
					$dp_describtion = mysql_real_escape_string($_POST['dp_describtion']);
					$id = $_POST['id'];
			
					$sql = "UPDATE departments SET  dp_code='".$dp_code."',dp_name='".$dp_name."',ft_id='".$ft_id."',dp_describtion='".$dp_describtion."',image='".$_FILES["image"]["name"]."' where dp_id='$id' ";
			
					if (mysql_query($sql)){
						echo "<script language='JavaScript'>";
						echo "alert('Perubahan berjaya')";
						echo "</script>";
						echo "<meta http-equiv='refresh' content='0;url=edit_department.php?id=$id' />";
					} 
					else{
						echo "Error: " . $sql . "<br>" . mysql_error($connect);
					}
				}
				else{
					$dp_code = mysql_real_escape_string($_POST['dp_code']);
					$dp_name = mysql_real_escape_string($_POST['dp_name']);
					$ft_id = mysql_real_escape_string($_POST['ft_id']);
					$dp_describtion = mysql_real_escape_string($_POST['dp_describtion']);
					$id = $_POST['id'];
					
					$sql = "UPDATE departments SET  dp_code='".$dp_code."',dp_name='".$dp_name."',ft_id='".$ft_id."',dp_describtion='".$dp_describtion."' where dp_id='$id' ";
					
					if (mysql_query($sql)){
						echo "<script language='JavaScript'>";
						echo "alert('Perubahan berjaya')";
						echo "</script>";
						echo "<meta http-equiv='refresh' content='0;url=edit_department.php?id=$id' />";
					} 
					else{
						echo "Error: " . $sql . "<br>" . mysql_error($connect);
					}
					
				}
			}	
	}
	
	function saveaddstudent(){
		include("../connect.php");
		$student_id1  = $_POST['student_id'];
		
		$sql_d = "select count(*) from students where (student_id = '$student_id1')";
		$result_d = mysql_query($sql_d);
		$row_d = mysql_fetch_array($result_d);
		
		if( $row_d[0] > 0){
				echo "<script type='text/javascript'>";
				echo "alert('Kod atau data sudah ada , sila hubungi adminisrator')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=add_student.php' />";
		}else{
		
				if(isset($_POST['save'])){
					if(move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"])){
						$student_id = mysql_real_escape_string($_POST['student_id']);
						$income_year = mysql_real_escape_string($_POST['income_year']);
						$ft_id = $_POST['ft_id'];
						$dp_id = $_POST['dp_id'];
						$class = mysql_real_escape_string($_POST['class']);
						$firstname_rumi = mysql_real_escape_string($_POST['firstname_rumi']);
						$lastname_rumi = mysql_real_escape_string($_POST['lastname_rumi']);
						$firstname_jawi = mysql_real_escape_string($_POST['firstname_jawi']);
						$lastname_jawi =  mysql_real_escape_string($_POST['lastname_jawi']);
						$firstname_eng =  mysql_real_escape_string($_POST['firstname_eng']);
						$lastname_eng =  mysql_real_escape_string($_POST['lastname_eng']);
						$cityzen_id =  mysql_real_escape_string($_POST['cityzen_id']);
						$birdth_date =  mysql_real_escape_string($_POST['birdth_date']);
						$born_place =  mysql_real_escape_string($_POST['born_place']);
						$disease =  mysql_real_escape_string($_POST['disease']);	
						$father_name =  mysql_real_escape_string($_POST['father_name']);	
						$father_job =  mysql_real_escape_string($_POST['father_job']);	
						$mother_name =  mysql_real_escape_string($_POST['mother_name']);
						$mother_job =  mysql_real_escape_string($_POST['mother_job']);
						$house_number =  mysql_real_escape_string($_POST['house_number']);
						$village_name =  mysql_real_escape_string($_POST['village_name']);
						$place =  mysql_real_escape_string($_POST['place']);   
						$subdistrict =  mysql_real_escape_string($_POST['subdistrict']);  
						$districk =  mysql_real_escape_string($_POST['districk']);
						$province =  mysql_real_escape_string($_POST['province']);
						$post =  mysql_real_escape_string($_POST['post']);
						$telephone =  mysql_real_escape_string($_POST['telephone']);
						$email =  mysql_real_escape_string($_POST['email']);
						$ibtidai_graduate =  mysql_real_escape_string($_POST['ibtidai_graduate']);
						$ibtidai_graduate_year =  mysql_real_escape_string($_POST['ibtidai_graduate_year']);
						$mutawasit_graduate =  mysql_real_escape_string($_POST['mutawasit_graduate']);
						$mutawasit_graduate_year =  mysql_real_escape_string($_POST['mutawasit_graduate_year']);
						$sanawi_graduate =  mysql_real_escape_string($_POST['sanawi_graduate']);
						$sanawi_graduate_year =  mysql_real_escape_string($_POST['sanawi_graduate_year']);
						$down_graduate =  mysql_real_escape_string($_POST['down_graduate']);
						$down_graduate_year =  mysql_real_escape_string($_POST['down_graduate_year']);
						$first_highschool_graduate =  mysql_real_escape_string($_POST['first_highschool_graduate']);
						$first_highschool_graduate_year =  mysql_real_escape_string($_POST['first_highschool_graduate_year']);
						$second_highschool_graduate =  mysql_real_escape_string($_POST['second_highschool_graduate']);
						$second_highschool_graduate_year =  mysql_real_escape_string($_POST['second_highschool_graduate_year']);
						$other =  mysql_real_escape_string($_POST['other']);
						$melayu_lang_skill =  mysql_real_escape_string($_POST['melayu_lang_skill']);
						$arab_lang_skill =  mysql_real_escape_string($_POST['arab_lang_skill']);
						$ingris_lang_skill =  mysql_real_escape_string($_POST['ingris_lang_skill']);
						$thai_lang_skill =  mysql_real_escape_string($_POST['thai_lang_skill']);
						$date = date('Y-m-d H:i:s');
						$password = mysql_real_escape_string($_POST['password']);
						$status = "student";
						$certificate = mysql_real_escape_string($_POST['certificate']);
						$citizen_book = mysql_real_escape_string($_POST['citizen_book']);
						$id_book = mysql_real_escape_string($_POST['id_book']);
						$photo = mysql_real_escape_string($_POST['photo']);
						
					
					$sql = " insert into students (student_id,income_year,ft_id,dp_id,class,firstname_rumi,lastname_rumi,firstname_jawi,lastname_jawi,firstname_eng,lastname_eng,cityzen_id,birdth_date,born_place,disease,father_name,father_job,mother_name,mother_job,house_number,village_name,place,subdistrict,districk,province,post,telephone,email,ibtidai_graduate,ibtidai_graduate_year,mutawasit_graduate,mutawasit_graduate_year,sanawi_graduate,sanawi_graduate_year,down_graduate,down_graduate_year,first_highschool_graduate,first_highschool_graduate_year,second_highschool_graduate,second_highschool_graduate_year,other,melayu_lang_skill,arab_lang_skill,ingris_lang_skill,thai_lang_skill,register_date,password,image,status,certificate,citizen_book,id_book,photo)
								values ('$student_id','$income_year','$ft_id','$dp_id','$class','$firstname_rumi','$lastname_rumi','$firstname_jawi','$lastname_jawi','$firstname_eng','$lastname_eng','$cityzen_id','$birdth_date','$born_place','$disease','$father_name','$father_job','$mother_name','$mother_job','$house_number','$village_name','$place','$subdistrict','$districk','$province','$post','$telephone','$email','$ibtidai_graduate','$ibtidai_graduate_year','$mutawasit_graduate','$mutawasit_graduate_year','$sanawi_graduate','$sanawi_graduate_year','$down_graduate','$down_graduate_year','$first_highschool_graduate','$first_highschool_graduate_year','$second_highschool_graduate','$second_highschool_graduate_year','$other','$melayu_lang_skill','$arab_lang_skill','$ingris_lang_skill','$thai_lang_skill','$date','$password','".$_FILES['image']['name']."','$status' ,'$certificate','$citizen_book','$id_book','$photo')";
					
						if (mysql_query($sql)){
							echo "<script type='text/javascript'>";
							echo "alert('Tambah data pelajar berjaya')";
							echo "</script>";

							$student_id = $_POST['student_id'];
							$sql_t = "select * from students where (student_id = '$student_id')";
							$query_t = mysql_query($sql_t);
							$result_t = mysql_fetch_array($query_t);
							$id = $result_t['st_id'];
							
							echo "<meta http-equiv='refresh' content='0;url=add_student2.php?id=$id' />";
						} else{
								echo "Error: " . $sql . "<br>" . mysql_error($connect);
						}
					}else{
						$student_id = mysql_real_escape_string($_POST['student_id']);
						$income_year = mysql_real_escape_string($_POST['income_year']);
						$ft_id = $_POST['ft_id'];
						$dp_id = $_POST['dp_id'];
						$class = mysql_real_escape_string($_POST['class']);
						$firstname_rumi = mysql_real_escape_string($_POST['firstname_rumi']);
						$lastname_rumi = mysql_real_escape_string($_POST['lastname_rumi']);
						$firstname_jawi = mysql_real_escape_string($_POST['firstname_jawi']);
						$lastname_jawi =  mysql_real_escape_string($_POST['lastname_jawi']);
						$firstname_eng =  mysql_real_escape_string($_POST['firstname_eng']);
						$lastname_eng =  mysql_real_escape_string($_POST['lastname_eng']);
						$cityzen_id =  mysql_real_escape_string($_POST['cityzen_id']);
						$birdth_date =  mysql_real_escape_string($_POST['birdth_date']);
						$born_place =  mysql_real_escape_string($_POST['born_place']);
						$disease =  mysql_real_escape_string($_POST['disease']);	
						$father_name =  mysql_real_escape_string($_POST['father_name']);	
						$father_job =  mysql_real_escape_string($_POST['father_job']);	
						$mother_name =  mysql_real_escape_string($_POST['mother_name']);
						$mother_job =  mysql_real_escape_string($_POST['mother_job']);
						$house_number =  mysql_real_escape_string($_POST['house_number']);
						$village_name =  mysql_real_escape_string($_POST['village_name']);
						$place =  mysql_real_escape_string($_POST['place']);   
						$subdistrict =  mysql_real_escape_string($_POST['subdistrict']);  
						$districk =  mysql_real_escape_string($_POST['districk']);
						$province =  mysql_real_escape_string($_POST['province']);
						$post =  mysql_real_escape_string($_POST['post']);
						$telephone =  mysql_real_escape_string($_POST['telephone']);
						$email =  mysql_real_escape_string($_POST['email']);
						$ibtidai_graduate =  mysql_real_escape_string($_POST['ibtidai_graduate']);
						$ibtidai_graduate_year =  mysql_real_escape_string($_POST['ibtidai_graduate_year']);
						$mutawasit_graduate =  mysql_real_escape_string($_POST['mutawasit_graduate']);
						$mutawasit_graduate_year =  mysql_real_escape_string($_POST['mutawasit_graduate_year']);
						$sanawi_graduate =  mysql_real_escape_string($_POST['sanawi_graduate']);
						$sanawi_graduate_year =  mysql_real_escape_string($_POST['sanawi_graduate_year']);
						$down_graduate =  mysql_real_escape_string($_POST['down_graduate']);
						$down_graduate_year =  mysql_real_escape_string($_POST['down_graduate_year']);
						$first_highschool_graduate =  mysql_real_escape_string($_POST['first_highschool_graduate']);
						$first_highschool_graduate_year =  mysql_real_escape_string($_POST['first_highschool_graduate_year']);
						$second_highschool_graduate =  mysql_real_escape_string($_POST['second_highschool_graduate']);
						$second_highschool_graduate_year =  mysql_real_escape_string($_POST['second_highschool_graduate_year']);
						$other =  mysql_real_escape_string($_POST['other']);
						$melayu_lang_skill =  mysql_real_escape_string($_POST['melayu_lang_skill']);
						$arab_lang_skill =  mysql_real_escape_string($_POST['arab_lang_skill']);
						$ingris_lang_skill =  mysql_real_escape_string($_POST['ingris_lang_skill']);
						$thai_lang_skill =  mysql_real_escape_string($_POST['thai_lang_skill']);
						$date = date('Y-m-d H:i:s');
						$username = mysql_real_escape_string($_POST['username']);
						$password = mysql_real_escape_string($_POST['password']);
						$status = "student";
						$certificate = mysql_real_escape_string($_POST['certificate']);
						$citizen_book = mysql_real_escape_string($_POST['citizen_book']);
						$id_book = mysql_real_escape_string($_POST['id_book']);
						$photo = mysql_real_escape_string($_POST['photo']);
						
						$sql = " insert into students (student_id,income_year,ft_id,dp_id,class,firstname_rumi,lastname_rumi,firstname_jawi,lastname_jawi,firstname_eng,lastname_eng,cityzen_id,birdth_date,born_place,disease,father_name,father_job,mother_name,mother_job,house_number,village_name,place,subdistrict,districk,province,post,telephone,email,ibtidai_graduate,ibtidai_graduate_year,mutawasit_graduate,mutawasit_graduate_year,sanawi_graduate,sanawi_graduate_year,down_graduate,down_graduate_year,first_highschool_graduate,first_highschool_graduate_year,second_highschool_graduate,second_highschool_graduate_year,other,melayu_lang_skill,arab_lang_skill,ingris_lang_skill,thai_lang_skill,register_date,username,password,status,certificate,citizen_book,id_book,photo)
								values ('$student_id','$income_year','$ft_id','$dp_id','$class','$firstname_rumi','$lastname_rumi','$firstname_jawi','$lastname_jawi','$firstname_eng','$lastname_eng','$cityzen_id','$birdth_date','$born_place','$disease','$father_name','$father_job','$mother_name','$mother_job','$house_number','$village_name','$place','$subdistrict','$districk','$province','$post','$telephone','$email','$ibtidai_graduate','$ibtidai_graduate_year','$mutawasit_graduate','$mutawasit_graduate_year','$sanawi_graduate','$sanawi_graduate_year','$down_graduate','$down_graduate_year','$first_highschool_graduate','$first_highschool_graduate_year','$second_highschool_graduate','$second_highschool_graduate_year','$other','$melayu_lang_skill','$arab_lang_skill','$ingris_lang_skill','$thai_lang_skill','$date','$username','$password','$status','$certificate','$citizen_book','$id_book','$photo')";
						if (mysql_query($sql)){
							echo "<script type='text/javascript'>";
							echo "alert('Tambah data pelajar berjaya')";
							echo "</script>";

							$student_id = $_POST['student_id'];
							$sql_t = "select * from students where (student_id = '$student_id')";
							$query_t = mysql_query($sql_t);
							$result_t = mysql_fetch_array($query_t);
							$id = $result_t['st_id'];
							
							echo "<meta http-equiv='refresh' content='0;url=add_student2.php?id=$id' />";
						} else{
								echo "Error: " . $sql . "<br>" . mysql_error($connect);
						}
					}
				}
			}
	}
	
	function saveaddstudentt(){
		include("../connect.php");
		
		if(isset($_POST['save'])){
			$id = $_POST['id'];
			$t_studentname = mysql_real_escape_string($_POST['t_studentname']);
			$t_studentlastname = mysql_real_escape_string($_POST['t_studentlastname']);
			$t_province =  mysql_real_escape_string($_POST['t_province']);
			$t_fathername = mysql_real_escape_string($_POST['t_fathername']);
			$t_fatherlastname	 = mysql_real_escape_string($_POST['t_fatherlastname']); 
			$t_mothername =  mysql_real_escape_string($_POST['t_mothername']); 
			$t_motherlastname = mysql_real_escape_string($_POST['t_motherlastname']);
			$t_village_name =  mysql_real_escape_string($_POST['t_village_name']);
			$t_road = mysql_real_escape_string($_POST['t_road']);
			$t_subdistrict = mysql_real_escape_string($_POST['t_subdistrict']); 
			$t_district =  mysql_real_escape_string($_POST['t_district']); 
			$t_province_sec = mysql_real_escape_string($_POST['t_province_sec']);  
			$t_higschool =   mysql_real_escape_string($_POST['t_higschool']);  
			$t_relegion = mysql_real_escape_string($_POST['t_relegion']);  
			
			$sql = " UPDATE students SET t_studentname = '".$t_studentname."' ,t_studentlastname = '".$t_studentlastname."', t_province = '".$t_province."',t_fathername = '".$t_fathername."',t_fatherlastname = '".$t_fatherlastname."' , t_mothername = '".$t_mothername."', t_motherlastname = '".$t_motherlastname."',t_village_name = '".$t_village_name."', t_road = '".$t_road."', t_subdistrict = '".$t_subdistrict."', t_district = '".$t_district."',t_province_sec = '".$t_province_sec."',t_higschool = '".$t_higschool."',t_relegion = '".$t_relegion."' where st_id ='$id' ";

			if (mysql_query($sql)){
				echo "<script type='text/javascript'>";
				echo "alert('Tambah data pelajar berjaya')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=student_list.php' />";
			}else{
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
			}
		}
	}
	
	function editstudentm(){
		include("../connect.php");
		if(isset($_POST['save'])){
					if(move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"])){
						$student_id = mysql_real_escape_string($_POST['student_id']);
						$income_year = mysql_real_escape_string($_POST['income_year']);
						$ft_id = $_POST['ft_id'];
						$dp_id = $_POST['dp_id'];
						$class = mysql_real_escape_string($_POST['class']);
						$firstname_rumi = mysql_real_escape_string($_POST['firstname_rumi']);
						$lastname_rumi = mysql_real_escape_string($_POST['lastname_rumi']);
						$firstname_jawi = mysql_real_escape_string($_POST['firstname_jawi']);
						$lastname_jawi =  mysql_real_escape_string($_POST['lastname_jawi']);
						$firstname_eng =  mysql_real_escape_string($_POST['firstname_eng']);
						$lastname_eng =  mysql_real_escape_string($_POST['lastname_eng']);
						$cityzen_id =  mysql_real_escape_string($_POST['cityzen_id']);
						$birdth_date =  mysql_real_escape_string($_POST['birdth_date']);
						$born_place =  mysql_real_escape_string($_POST['born_place']);
						$disease =  mysql_real_escape_string($_POST['disease']);	
						$father_name =  mysql_real_escape_string($_POST['father_name']);	
						$father_job =  mysql_real_escape_string($_POST['father_job']);	
						$mother_name =  mysql_real_escape_string($_POST['mother_name']);
						$mother_job =  mysql_real_escape_string($_POST['mother_job']);
						$house_number =  mysql_real_escape_string($_POST['house_number']);
						$village_name =  mysql_real_escape_string($_POST['village_name']);
						$place =  mysql_real_escape_string($_POST['place']);   
						$subdistrict =  mysql_real_escape_string($_POST['subdistrict']);  
						$districk =  mysql_real_escape_string($_POST['districk']);
						$province =  mysql_real_escape_string($_POST['province']);
						$post =  mysql_real_escape_string($_POST['post']);
						$telephone =  mysql_real_escape_string($_POST['telephone']);
						$email =  mysql_real_escape_string($_POST['email']);
						$ibtidai_graduate =  mysql_real_escape_string($_POST['ibtidai_graduate']);
						$ibtidai_graduate_year =  mysql_real_escape_string($_POST['ibtidai_graduate_year']);
						$mutawasit_graduate =  mysql_real_escape_string($_POST['mutawasit_graduate']);
						$mutawasit_graduate_year =  mysql_real_escape_string($_POST['mutawasit_graduate_year']);
						$sanawi_graduate =  mysql_real_escape_string($_POST['sanawi_graduate']);
						$sanawi_graduate_year =  mysql_real_escape_string($_POST['sanawi_graduate_year']);
						$down_graduate =  mysql_real_escape_string($_POST['down_graduate']);
						$down_graduate_year =  mysql_real_escape_string($_POST['down_graduate_year']);
						$first_highschool_graduate =  mysql_real_escape_string($_POST['first_highschool_graduate']);
						$first_highschool_graduate_year =  mysql_real_escape_string($_POST['first_highschool_graduate_year']);
						$second_highschool_graduate =  mysql_real_escape_string($_POST['second_highschool_graduate']);
						$second_highschool_graduate_year =  mysql_real_escape_string($_POST['second_highschool_graduate_year']);
						$other =  mysql_real_escape_string($_POST['other']);
						$melayu_lang_skill =  mysql_real_escape_string($_POST['melayu_lang_skill']);
						$arab_lang_skill =  mysql_real_escape_string($_POST['arab_lang_skill']);
						$ingris_lang_skill =  mysql_real_escape_string($_POST['ingris_lang_skill']);
						$thai_lang_skill =  mysql_real_escape_string($_POST['thai_lang_skill']);
						$date = date('Y-m-d H:i:s');
						$password = mysql_real_escape_string($_POST['password']);
						$st_id = $_POST['st_id'];
						$certificate = mysql_real_escape_string($_POST['certificate']);
						$citizen_book = mysql_real_escape_string($_POST['citizen_book']);
						$id_book = mysql_real_escape_string($_POST['id_book']);
						$photo = mysql_real_escape_string($_POST['photo']);
					
					$sql = " UPDATE students SET student_id='".$student_id."', income_year = '".$income_year."',ft_id = '".$ft_id."',dp_id = '".$dp_id."',class = '".$class."',firstname_rumi = '".$firstname_rumi."',lastname_rumi = '".$lastname_rumi."',firstname_jawi = '".$firstname_jawi."',lastname_jawi = '".$lastname_jawi."',firstname_eng = '".$firstname_eng."' ,lastname_eng = '".$lastname_eng."',cityzen_id = '".$cityzen_id."',birdth_date = '".$birdth_date."',born_place = '".$born_place."',disease = '".$disease."',father_name = '".$father_name."',father_job = '".$father_job."',mother_name = '".$mother_name."',mother_job = '".$mother_job."',house_number = '".$house_number."',village_name =  '".$village_name."',place = '".$place."',subdistrict = '".$subdistrict."',districk = '".$districk."',province = '".$province."',post = '".$post."',telephone = '".$telephone."',email = '".$email."',ibtidai_graduate = '".$ibtidai_graduate."',ibtidai_graduate_year = '".$ibtidai_graduate_year."',mutawasit_graduate = '".$mutawasit_graduate."',mutawasit_graduate_year = '".$mutawasit_graduate_year."',sanawi_graduate = '".$sanawi_graduate."',sanawi_graduate_year = '".$sanawi_graduate_year."',down_graduate = '".$down_graduate."',down_graduate_year = '".$down_graduate_year."',first_highschool_graduate = '".$first_highschool_graduate."',first_highschool_graduate_year = '".$first_highschool_graduate_year."',second_highschool_graduate = '".$second_highschool_graduate."',second_highschool_graduate_year = '".$second_highschool_graduate_year."',other = '".$other."',melayu_lang_skill = '".$melayu_lang_skill."',arab_lang_skill = '".$arab_lang_skill."',ingris_lang_skill = '".$ingris_lang_skill."',thai_lang_skill = '".$thai_lang_skill."',last_update = '".$date."',password = '".$password."',image = '".$_FILES['image']['name']."',certificate = '".$certificate."',citizen_book = '".$citizen_book."',id_book = '".$id_book."',photo = '".$photo."' where st_id = '$st_id' ";

						if (mysql_query($sql)){
							echo "<script type='text/javascript'>";
							echo "alert('Data pelajar berhasil di perbaharui')";
							echo "</script>";
							echo "<meta http-equiv='refresh' content='0;url=student_data.php?id=$st_id' />";
						} else{
								echo "Error: " . $sql . "<br>" . mysql_error($connect);
						}
					}else{
						$student_id = mysql_real_escape_string($_POST['student_id']);
						$income_year = mysql_real_escape_string($_POST['income_year']);
						$ft_id = $_POST['ft_id'];
						$dp_id = $_POST['dp_id'];
						$class = mysql_real_escape_string($_POST['class']);
						$firstname_rumi = mysql_real_escape_string($_POST['firstname_rumi']);
						$lastname_rumi = mysql_real_escape_string($_POST['lastname_rumi']);
						$firstname_jawi = mysql_real_escape_string($_POST['firstname_jawi']);
						$lastname_jawi =  mysql_real_escape_string($_POST['lastname_jawi']);
						$firstname_eng =  mysql_real_escape_string($_POST['firstname_eng']);
						$lastname_eng =  mysql_real_escape_string($_POST['lastname_eng']);
						$cityzen_id =  mysql_real_escape_string($_POST['cityzen_id']);
						$birdth_date =  mysql_real_escape_string($_POST['birdth_date']);
						$born_place =  mysql_real_escape_string($_POST['born_place']);
						$disease =  mysql_real_escape_string($_POST['disease']);	
						$father_name =  mysql_real_escape_string($_POST['father_name']);	
						$father_job =  mysql_real_escape_string($_POST['father_job']);	
						$mother_name =  mysql_real_escape_string($_POST['mother_name']);
						$mother_job =  mysql_real_escape_string($_POST['mother_job']);
						$house_number =  mysql_real_escape_string($_POST['house_number']);
						$village_name =  mysql_real_escape_string($_POST['village_name']);
						$place =  mysql_real_escape_string($_POST['place']);   
						$subdistrict =  mysql_real_escape_string($_POST['subdistrict']);  
						$districk =  mysql_real_escape_string($_POST['districk']);
						$province =  mysql_real_escape_string($_POST['province']);
						$post =  mysql_real_escape_string($_POST['post']);
						$telephone =  mysql_real_escape_string($_POST['telephone']);
						$email =  mysql_real_escape_string($_POST['email']);
						$ibtidai_graduate =  mysql_real_escape_string($_POST['ibtidai_graduate']);
						$ibtidai_graduate_year =  mysql_real_escape_string($_POST['ibtidai_graduate_year']);
						$mutawasit_graduate =  mysql_real_escape_string($_POST['mutawasit_graduate']);
						$mutawasit_graduate_year =  mysql_real_escape_string($_POST['mutawasit_graduate_year']);
						$sanawi_graduate =  mysql_real_escape_string($_POST['sanawi_graduate']);
						$sanawi_graduate_year =  mysql_real_escape_string($_POST['sanawi_graduate_year']);
						$down_graduate =  mysql_real_escape_string($_POST['down_graduate']);
						$down_graduate_year =  mysql_real_escape_string($_POST['down_graduate_year']);
						$first_highschool_graduate =  mysql_real_escape_string($_POST['first_highschool_graduate']);
						$first_highschool_graduate_year =  mysql_real_escape_string($_POST['first_highschool_graduate_year']);
						$second_highschool_graduate =  mysql_real_escape_string($_POST['second_highschool_graduate']);
						$second_highschool_graduate_year =  mysql_real_escape_string($_POST['second_highschool_graduate_year']);
						$other =  mysql_real_escape_string($_POST['other']);
						$melayu_lang_skill =  mysql_real_escape_string($_POST['melayu_lang_skill']);
						$arab_lang_skill =  mysql_real_escape_string($_POST['arab_lang_skill']);
						$ingris_lang_skill =  mysql_real_escape_string($_POST['ingris_lang_skill']);
						$thai_lang_skill =  mysql_real_escape_string($_POST['thai_lang_skill']);
						$date = date('Y-m-d H:i:s');
						$username = mysql_real_escape_string($_POST['username']);
						$password = mysql_real_escape_string($_POST['password']);
						$st_id = $_POST['st_id'];
						$certificate = mysql_real_escape_string($_POST['certificate']);
						$citizen_book = mysql_real_escape_string($_POST['citizen_book']);
						$id_book = mysql_real_escape_string($_POST['id_book']);
						$photo = mysql_real_escape_string($_POST['photo']);
						
						$sql = " UPDATE students SET student_id='".$student_id."', income_year = '".$income_year."',ft_id = '".$ft_id."',dp_id = '".$dp_id."',class = '".$class."',firstname_rumi = '".$firstname_rumi."',lastname_rumi = '".$lastname_rumi."',firstname_jawi = '".$firstname_jawi."',lastname_jawi = '".$lastname_jawi."',firstname_eng = '".$firstname_eng."' ,lastname_eng = '".$lastname_eng."',cityzen_id = '".$cityzen_id."',birdth_date = '".$birdth_date."',born_place = '".$born_place."',disease = '".$disease."',father_name = '".$father_name."',father_job = '".$father_job."',mother_name = '".$mother_name."',mother_job = '".$mother_job."',house_number = '".$house_number."',village_name =  '".$village_name."',place = '".$place."',subdistrict = '".$subdistrict."',districk = '".$districk."',province = '".$province."',post = '".$post."',telephone = '".$telephone."',email = '".$email."',ibtidai_graduate = '".$ibtidai_graduate."',ibtidai_graduate_year = '".$ibtidai_graduate_year."',mutawasit_graduate = '".$mutawasit_graduate."',mutawasit_graduate_year = '".$mutawasit_graduate_year."',sanawi_graduate = '".$sanawi_graduate."',sanawi_graduate_year = '".$sanawi_graduate_year."',down_graduate = '".$down_graduate."',down_graduate_year = '".$down_graduate_year."',first_highschool_graduate = '".$first_highschool_graduate."',first_highschool_graduate_year = '".$first_highschool_graduate_year."',second_highschool_graduate = '".$second_highschool_graduate."',second_highschool_graduate_year = '".$second_highschool_graduate_year."',other = '".$other."',melayu_lang_skill = '".$melayu_lang_skill."',arab_lang_skill = '".$arab_lang_skill."',ingris_lang_skill = '".$ingris_lang_skill."',thai_lang_skill = '".$thai_lang_skill."',last_update = '$date',username = '".$username."',password = '".$password."',certificate = '".$certificate."',citizen_book = '".$citizen_book."',id_book = '".$id_book."',photo = '".$photo."'  where st_id = '$st_id' ";
						
						if (mysql_query($sql)){
							echo "<script type='text/javascript'>";
							echo "alert('Data pelajar berhasil di perbarui')";
							echo "</script>";
							echo "<meta http-equiv='refresh' content='0;url=student_data.php?id=$st_id' />";
						} else{
								echo "Error: " . $sql . "<br>" . mysql_error($connect);
						}
					}
				}
	}
	
	function editstudentt(){
		include("../connect.php");
		
		if(isset($_POST['save2'])){
			
			$t_studentname = mysql_real_escape_string($_POST['t_studentname']);
			$t_studentlastname = mysql_real_escape_string($_POST['t_studentlastname']);
			$t_province =  mysql_real_escape_string($_POST['t_province']);
			$t_fathername = mysql_real_escape_string($_POST['t_fathername']);
			$t_fatherlastname	 = mysql_real_escape_string($_POST['t_fatherlastname']); 
			$t_mothername =  mysql_real_escape_string($_POST['t_mothername']); 
			$t_motherlastname = mysql_real_escape_string($_POST['t_motherlastname']);
			$t_village_name =  mysql_real_escape_string($_POST['t_village_name']);
			$t_road = mysql_real_escape_string($_POST['t_road']);
			$t_subdistrict = mysql_real_escape_string($_POST['t_subdistrict']); 
			$t_district =  mysql_real_escape_string($_POST['t_district']); 
			$t_province_sec = mysql_real_escape_string($_POST['t_province_sec']);  
			$t_higschool =   mysql_real_escape_string($_POST['t_higschool']);  
			$t_relegion = mysql_real_escape_string($_POST['t_relegion']);  
			$st_id = $_POST['st_id'];
			$house_number =  mysql_real_escape_string($_POST['house_number']);  
			$place =  mysql_real_escape_string($_POST['place']); 
			$cityzen_id =  mysql_real_escape_string($_POST['cityzen_id']); 
			$telephone = mysql_real_escape_string($_POST['telephone']); 
			$post =  mysql_real_escape_string($_POST['post']); 
			$birdth_date = mysql_real_escape_string($_POST['birdth_date']); 
			
			$sql = " UPDATE students SET post= '".$post."', birdth_date = '".$birdth_date."',telephone = '".$telephone."', house_number = '".$house_number."', place = '".$place."', cityzen_id = '".$cityzen_id."',t_studentname = '".$t_studentname."' ,t_studentlastname = '".$t_studentlastname."', t_province = '".$t_province."',t_fathername = '".$t_fathername."',t_fatherlastname = '".$t_fatherlastname."' , t_mothername = '".$t_mothername."', t_motherlastname = '".$t_motherlastname."',t_village_name = '".$t_village_name."', t_road = '".$t_road."', t_subdistrict = '".$t_subdistrict."', t_district = '".$t_district."',t_province_sec = '".$t_province_sec."',t_higschool = '".$t_higschool."',t_relegion = '".$t_relegion."' where st_id ='$st_id' ";

			if (mysql_query($sql)){
				echo "<script type='text/javascript'>";
				echo "alert('Data pelajar berhasil di perbaharui')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=student_data.php?id=$st_id' />";
			}else{
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
			}
		}
	}
	
	function savetuition(){
		include("connect.php");
		$y_id  = $_POST['academic_year'];
		$t_id =  $_POST['term'];
		
		$sql_yt = "select count(*) from register where (y_id = '$y_id' and term_id = '$t_id')";
		$qeury_yt = mysql_query($sql_yt);
		$row_yt = mysql_fetch_array($qeury_yt);
		
		if($row_yt[0] > 0){
				echo "<script type='text/javascript'>";
				echo "alert('Tahun atau penngal pembukaan pendaftaran sudah ada')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=tuition.php' />";
		}else{
			if(isset($_POST['save'])){
				$y_id = mysql_real_escape_string($_POST['academic_year']);
				$t_id = mysql_real_escape_string($_POST['term']);
				$start_date = mysql_real_escape_string($_POST['start_date']);
				$end_date = mysql_real_escape_string($_POST['end_date']);
				$common_prize = mysql_real_escape_string($_POST['common_prize']);
				//$common_prize_text = mysql_real_escape_string($_POST['common_prize_text']);
				$special_prize = mysql_real_escape_string($_POST['special_prize']);
				//$special_prize_text = mysql_real_escape_string($_POST['special_prize_text']);
				$tu_id = mysql_real_escape_string($_POST['status']);
				
				$sql_i = "insert into register (y_id,term_id,start_date,end_date,common_prize,special_prize,tu_id) values ('$y_id','$t_id','$start_date','$end_date','$common_prize','$special_prize','$tu_id')";
				
				if (mysql_query($sql_i)){
							echo "<script type='text/javascript'>";
							echo "alert('Tambah pembukaan pendaftaran baru  berjaya')";
							echo "</script>";
							echo "<meta http-equiv='refresh' content='0;url=tuition_list.php' />";
				}
			}
		}	
	}
	
	function edittuition(){
		include("connect.php");
		if(isset($_POST['save'])){
			//$y_id = mysql_real_escape_string($_POST['academic_year']);
			//$t_id = mysql_real_escape_string($_POST['term']);
			$start_date = mysql_real_escape_string($_POST['start_date']);
			$end_date = mysql_real_escape_string($_POST['end_date']);
			$common_prize = mysql_real_escape_string($_POST['common_prize']);
			//$common_prize_text = mysql_real_escape_string($_POST['common_prize_text']);
			$special_prize = mysql_real_escape_string($_POST['special_prize']);
			//$special_prize_text = mysql_real_escape_string($_POST['special_prize_text']);
			$tu_id = mysql_real_escape_string($_POST['status']);	
			$id = $_GET[id];
			
			$sql = "UPDATE register SET  start_date = '".$start_date."' , end_date = '".$end_date."' , common_prize = '".$common_prize."', special_prize = '".$special_prize."', tu_id = '".$tu_id."' where re_id = '$id' ";
		
			if(mysql_query($sql)){
				echo "<script type='text/javascript'>";
				echo "alert('Data pembukaan pendaftaran  berhasil di perbaharui')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=edit_tuition.php?id=$id' />";
			}else{
				echo "Error: " . $sql. "<br>" . mysql_error($connect);
			}
		}
	}
	
	function savepayment(){
			include("connect.php");
		
			$sr_id = mysql_real_escape_string($_POST['sr_id']);
			$st_id = mysql_real_escape_string($_POST['st_id']);
			$pay_date = mysql_real_escape_string($_POST['pay_date']);
			$money = mysql_real_escape_string($_POST['money']);
			$penalty = mysql_real_escape_string($_POST['penalty']);
			$reciet_code = mysql_real_escape_string($_POST['reciet_code']);
			$pay_status = "Sudah bayar";
		
			if(isset($_POST['save'])){
			$sql = mysql_query("insert into payments (sr_id ,st_id,pay_date,money,penalty,reciet_code) values ('$sr_id','$st_id','$pay_date','$money','$penalty','$reciet_code')");
			
			$sql2 = "update student_register set pay_status = '$pay_status' where sr_id = '$sr_id' ";
			
			if(mysql_query($sql2)){
				echo "<script type='text/javascript'>";
				echo "alert('Pembayaran berhasil di rakam')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=../pay_tuition.php?id=$sr_id' />";
			}else{
				echo "Error: " . $sql. "<br>" . mysql_error($connect);
			}
		}
	}
function saveexam(){
		include("../connect.php");
		$y_id  = $_POST['y_id'];
		$t_id =  $_POST['t_id'];
		
		$sql_yt = "select count(*) from register_exam where (y_id = '$y_id' and t_id = '$t_id')";
		$qeury_yt = mysql_query($sql_yt);
		$row_yt = mysql_fetch_array($qeury_yt);
		
		if($row_yt[0] > 0){
				echo "<script type='text/javascript'>";
				echo "alert('Tahun atau penngal pembukaan daftar ujian sudah ada !!!')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=exam.php' />";
		}else{
			if(isset($_POST['save'])){
				$y_id = mysql_real_escape_string($_POST['y_id']);
				$t_id = mysql_real_escape_string($_POST['t_id']);
				$start_date = mysql_real_escape_string($_POST['start_date']);
				$end_date = mysql_real_escape_string($_POST['end_date']);
				$prize = mysql_real_escape_string($_POST['prize']);
				$tu_id = mysql_real_escape_string($_POST['status']);
				
				$sql_i = "insert into register_exam (y_id,t_id,start_date,end_date,prize,tu_id) values ('$y_id','$t_id','$start_date','$end_date','$prize','$tu_id')";
				
				if (mysql_query($sql_i)){
							echo "<script type='text/javascript'>";
							echo "alert('Tambah pembukaan daftar ujian berjaya')";
							echo "</script>";
							echo "<meta http-equiv='refresh' content='0;url=exam_list.php' />";
				}
			}
		}
}
function editexam(){
	include("connect.php");
		if(isset($_POST['save'])){
			$start_date = mysql_real_escape_string($_POST['start_date']);
			$end_date = mysql_real_escape_string($_POST['end_date']);
			$prize = mysql_real_escape_string($_POST['prize']);
			$tu_id = mysql_real_escape_string($_POST['status']);	
			$id = $_GET[id];
			
			$sql = "UPDATE register_exam SET  start_date = '".$start_date."' , end_date = '".$end_date."' , prize = '".$prize."', tu_id = '".$tu_id."' where rx_id = '$id' ";
		
			if(mysql_query($sql)){
				echo "<script type='text/javascript'>";
				echo "alert('Data pembukaan daftar ujian  berhasil di perbaharui')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=edit_exam.php?id=$id' />";
			}else{
				echo "Error: " . $sql. "<br>" . mysql_error($connect);
			}
		}
	}
function savepayexam(){
			include("connect.php");
		
			$srx_id = mysql_real_escape_string($_POST['srx_id']);
			$st_id = mysql_real_escape_string($_POST['st_id']);
			$pay_date = mysql_real_escape_string($_POST['pay_date']);
			$money = mysql_real_escape_string($_POST['money']);
			$penalty = mysql_real_escape_string($_POST['penalty']);
			$reciet_code = mysql_real_escape_string($_POST['reciet_code']);
			$pay_status = "Sudah bayar";
			$mc = mysql_real_escape_string($_POST['mc']);
			
		
			if(isset($_POST['save'])){
					
				
						$sql_ch = "select count(*) from exam_pay where (srx_id = '$srx_id')";
						$result_ch = mysql_query($sql_ch);
						$row_ch = mysql_fetch_array($result_ch);
		
						if( $row_ch[0] > 0){
								echo "<script type='text/javascript'>";
								echo "alert('Sudah di bayar sebelumnya')";
								echo "</script>";
								echo "<meta http-equiv='refresh' content='0;url=exam_pay.php?id=$srx_id' />";
						}else{
							if($money < $mc){
								echo "<script type='text/javascript'>";
								echo "alert('Jumlah duit belum cukup')";
								echo "</script>";
								echo "<meta http-equiv='refresh' content='0;url=exam_pay.php?id=$srx_id' />";
						}else{
							$sql = mysql_query("insert into exam_pay (srx_id,st_id,pay_date,money,penalty,reciet_code) values ('$srx_id','$st_id','$pay_date','$money','$penalty','$reciet_code')");
							$sql2 = "update student_register_exam set pay_status = '$pay_status' where srx_id = '$srx_id' ";
							if(mysql_query($sql2)){
								echo "<script type='text/javascript'>";
								echo "alert('Pembayaran berhasil di rakam')";
								echo "</script>";
								echo "<meta http-equiv='refresh' content='0;url=exam_pay.php?id=$srx_id' />";
							}else{
								echo "Error: " . $sql. "<br>" . mysql_error($connect);
							}
						}
				}
		}
}
function edtpost(){
	include("../connect.php");
	if(isset($_POST['save'])){
			if(move_uploaded_file($_FILES["image"]["tmp_name"],"images/".$_FILES["image"]["name"])){
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
				echo "alert('Post berjaya di perbaharui')";
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
				
			$sql = " UPDATE post SET p_title='$title' , p_post='$post' , p_other='$other' , publish='$publish' where p_id='$id'";
				
			if (mysql_query($sql)){
				echo "<script language='JavaScript'>";
				echo "alert('Post berjaya di perbaharui')";
				echo "</script>";
				echo "<meta http-equiv='refresh' content='0;url=edtpost.php?p_id=$id' />";
			}else {
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
			}
		}
	}
}
function addteachers(){
include("connect.php");
		$tc_code = mysql_real_escape_string($_POST['tc_code']);
		$tc_name = mysql_real_escape_string($_POST['tc_name']);
		$tc_lastname = mysql_real_escape_string($_POST['tc_lastname']);
		$tc_gender  = mysql_real_escape_string($_POST['tc_gender']);
		$tc_cityzenid = mysql_real_escape_string($_POST['tc_cityzenid']);
		$tc_housenumber = mysql_real_escape_string($_POST['tc_housenumber']);
		$tc_village = mysql_real_escape_string($_POST['tc_village']);
		$tc_placenumber = mysql_real_escape_string($_POST['tc_placenumber']);
		$tc_subdistrict = mysql_real_escape_string($_POST['tc_subdistrict']);
		$tc_district = mysql_real_escape_string($_POST['tc_district']);
		$tc_province = mysql_real_escape_string($_POST['tc_province']);
		$tc_postcode = mysql_real_escape_string($_POST['tc_postcode']);
		$tc_telephone = mysql_real_escape_string($_POST['tc_telephone']);
		$tc_email = mysql_real_escape_string($_POST['tc_email']);
		if(isset($_POST['save'])){
		$sql = " insert into teachers (tc_code,tc_name,tc_lastname,tc_gender,tc_cityzenid,tc_housenumber,tc_village,tc_placenumber,tc_subdistrict,tc_district,tc_province,tc_postcode,tc_telephone,tc_email) values ('$tc_code','$tc_name','$tc_lastname','$tc_gender','$tc_cityzenid','$tc_housenumber','$tc_village','$tc_placenumber','$tc_subdistrict','$tc_district','$tc_province','$tc_postcode','$tc_telephone','$tc_email')";
		if (mysql_query($sql)){
			echo "<script language='JavaScript'>";
			echo "alert('Tambah data guru berjaya')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0;url=index_teacher.php' />";
			}else {
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
			}
		}
}

function edtteachers(){
		include("../connect.php");
		$p_id = $_POST['p_id'];
		$tc_code = mysql_real_escape_string($_POST['tc_code']);
		$tc_name = mysql_real_escape_string($_POST['tc_name']);
		$tc_lastname = mysql_real_escape_string($_POST['tc_lastname']);
		$tc_gender  = mysql_real_escape_string($_POST['tc_gender']);
		$tc_cityzenid = mysql_real_escape_string($_POST['tc_cityzenid']);
		$tc_housenumber = mysql_real_escape_string($_POST['tc_housenumber']);
		$tc_village = mysql_real_escape_string($_POST['tc_village']);
		$tc_placenumber = mysql_real_escape_string($_POST['tc_placenumber']);
		$tc_subdistrict = mysql_real_escape_string($_POST['tc_subdistrict']);
		$tc_district = mysql_real_escape_string($_POST['tc_district']);
		$tc_province = mysql_real_escape_string($_POST['tc_province']);
		$tc_postcode = mysql_real_escape_string($_POST['tc_postcode']);
		$tc_telephone = mysql_real_escape_string($_POST['tc_telephone']);
		$tc_email = mysql_real_escape_string($_POST['tc_email']);
	
		if(isset($_POST['save'])){
		$sql = "UPDATE teachers SET tc_code='$tc_code' , tc_name='$tc_name' , tc_lastname='$tc_lastname' , tc_gender='$tc_gender' , tc_cityzenid='$tc_cityzenid' , tc_housenumber='$tc_housenumber' , tc_village='$tc_village' , tc_placenumber='$tc_placenumber' , tc_subdistrict='$tc_subdistrict' , tc_district='$tc_district' , tc_province='$tc_province' , tc_postcode='$tc_postcode' , tc_telephone='$tc_telephone' , tc_email='$tc_email' where tc_id='$p_id'";
		if(mysql_query($sql)){
			echo "<script language='JavaScript'>";
			echo "alert('Ubah data guru berjaya')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0;url=edt_teacher.php?id=$p_id' />";
			}else {
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
			}
	}
}

function addsubjects(){
include("../connect.php");
	$sj_code = mysql_real_escape_string($_POST['sj_code']);
	$sj_name = mysql_real_escape_string($_POST['sj_name']);
	$sj_unit = mysql_real_escape_string($_POST['sj_unit']);
	$sj_describtion = mysql_real_escape_string($_POST['sj_describtion']);
	$tc_id = mysql_real_escape_string($_POST['tc_id']);
	if(isset($_POST['save'])){
	$sql = "insert into subjeck (sj_code,sj_name,sj_unit,sj_describtion,tc_id) values ('$sj_code','$sj_name','$sj_unit','$sj_describtion','$tc_id')";
	if(mysql_query($sql)){
			echo "<script language='JavaScript'>";
			echo "alert('Tambah data mata kuliah baru berjaya')";
			echo "</script>";
			echo "<meta http-equiv='refresh' content='0;url=idxsubject.php' />";
			}else {
				echo "Error: " . $sql . "<br>" . mysql_error($connect);
			}
	}
}
?>