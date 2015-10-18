<?php
	//FT_name check
	function ftname2check(){
	if(isset($_POST["ftname2check"]) && $_POST["ftname2check"] != ""){
		include_once 'connect.php';
		$ft_name = preg_replace('#[^a-z0-9]#i', '',$_POST['ftname2check']);
		$sql_uname_check = mysql_query("select ft_id from fakultys where ft_name='$ft_name' LIMIT 1");
		$uname_check = mysql_num_rows($sql_uname_check);
		if (strlen($ft_name) < 4 ){
			echo '<font color="#FF0000">Harap sesuaikan nama fakulti</font>';
			exit();
			}
		if (is_numeric($ft_name[0])) {
			echo '<font color="#FF0000">character pertama harus dari A-Z</font>';
			exit();
			}
		if ($uname_check < 1 ) {
			echo '<font color="green">Fakulti </font><strong><font color="green">"' . $ft_name . '"</strong> Bisa di tambah</font>';
			exit();
			}else{
				echo '<font color="red">Fakulti </font><strong><font color="red">"' . $ft_name . '"</strong> Sudah ada</font>';
				exit;
				}
		}
	}
	function ftcode2check(){ 
	//FT_Code checking
	if(isset($_POST["ftcode2check"]) && $_POST["ftcode2check"] != ""){
		include_once 'connect.php';
		$ft_code = preg_replace('#[^a-z0-9]#i', '',$_POST['ftcode2check']);
		$sql_uname_check = mysql_query("select ft_id from fakultys where ft_code='$ft_code' LIMIT 1");
		$uname_check = mysql_num_rows($sql_uname_check);
		if (strlen($ft_code) < 2 ){
			echo '<font color="#FF0000">Kod fakulti tak kurang dari 2 character</font>';
			exit();
			}
			if (strlen($ft_code) > 2 ) {
			echo '<font color="red">Kod fakulti tak bisa lebih dari 2 character.</font>';
			exit();
			}	
		if ($uname_check < 1 ) {
			echo '<font color="green">Kod </font><strong><font color="green">"' . $ft_code . '"</strong> Bisa di guna</font>';
			exit();
			}else{
				echo '<font color="red">Kod </font><strong><font color="red">"' . $ft_code . '"</strong> Sudah di guna</font>';
				exit;
				}
		}
	}
	
	function dpcode_check(){ 
	//dp_Code checking
	if(isset($_POST["dpcode2check"]) && $_POST["dpcode2check"] != ""){
		include_once 'connect.php';
		$dp_code = preg_replace('#[^a-z0-9]#i', '',$_POST['dpcode2check']);
		$sql_uname_check = mysql_query("select dp_id from departments where dp_code='$dp_code' LIMIT 1");
		$uname_check = mysql_num_rows($sql_uname_check);
		if (strlen($dp_code) < 2 ){
			echo '<font color="#FF0000">Kod fakulti tak kurang dari 2 character</font>';
			exit();
			}
			if (strlen($dp_code) > 2 ) {
			echo '<font color="red">Kod fakulti tak bisa lebih dari 4 character.</font>';
			exit();
			}	
		if ($uname_check < 1 ) {
			echo '<font color="green">Kode </font><strong><font color="green">"' . $dp_code . '"</strong> Bisa di tambah</font>';
			exit();
			}else{
				echo '<font color="red">Kode </font><strong><font color="red">"' . $dp_code . '"</strong> Sudah di guna</font>';
				exit;
				}
		}
	}
	
	//Student code check
	function stcode2check(){
	if(isset($_POST["stcode2check"]) && $_POST["stcode2check"] != ""){
		include_once 'connect.php';
		$student_id = preg_replace('#[^a-z0-9]#i', '',$_POST['stcode2check']);
		$sql_uname_check = mysql_query("select st_id from students where student_id='$student_id' LIMIT 1");
		$uname_check = mysql_num_rows($sql_uname_check);
		if (strlen($student_id) < 7 ){
			echo '<font color="#FF0000">Harap sempernakan kod</font>';
			exit();
		}
		if ($uname_check < 1 ) {
			echo '<font color="green">Kod </font><strong><font color="green">"' . $student_id . '"</strong> Bisa di tambah</font>';
			exit();
			}else{
				echo '<font color="red">Kod </font><strong><font color="red">"' . $student_id . '"</strong> Sudah ada</font>';
				exit;
				}
		}
	}