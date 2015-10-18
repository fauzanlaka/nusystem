
<!-- faculty name check -->
	function ftnamecheck(){
		var status = document.getElementById("ftnamestatus");
		var u = document.getElementById("ft_name").value;
			if(u !== ""){
				status.innerHTML = 'Ckecking...';
				var hr = new XMLHttpRequest();
				hr.open("POST", "add_faculty_form.php", true);
				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				hr.onreadystatechange = function() {
					if(hr.readyState == 4 && hr.status == 200 ){
						status.innerHTML = hr.responseText;
					}
				}
				var v = "ftname2check="+u;
				hr.send(v);
			}
	}

<!-- faculty code check -->
function checkftcode(){
	var status = document.getElementById("ftcodestatus");
	var u = document.getElementById("ft_code").value;
		if(u !== ""){
			status.innerHTML = 'Ckecking...';
			var hr = new XMLHttpRequest();
			hr.open("POST", "add_faculty_form.php", true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200 ){
					status.innerHTML = hr.responseText;
					}
				}
			var v = "ftcode2check="+u;
			hr.send(v);
					}
				}
				
<!-- department name check -->
function dpnamecheck(){
	var status = document.getElementById("dpnamestatus");
	var u = document.getElementById("dp_name").value;
		if(u !== ""){
			status.innerHTML = 'Ckecking...';
			var hr = new XMLHttpRequest();
			hr.open("POST", "add_jurusan_form.php", true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200 ){
					status.innerHTML = hr.responseText;
				}
			}
				var v = "dpname2check="+u;
				hr.send(v);
		}
}

<!-- department code check -->
function dpcodecheck(){
	var status = document.getElementById("dpcodestatus");
	var u = document.getElementById("dp_code").value;
		if(u !== ""){
			status.innerHTML = 'Ckecking...';
			var hr = new XMLHttpRequest();
			hr.open("POST", "add_jurusan_form.php", true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200 ){
					status.innerHTML = hr.responseText;
				}
			}
				var v = "dpcode2check="+u;
				hr.send(v);
		}
}
												
<!-- ตรวจสอบชื่อเเละรหัสที่เหมือนก่อนบันทึก -->
    //function to check username availability  
$("button#submit").click(function(){
		if($("#ft_name").val() == "" )
			$("div#ack").html("Sempurnakan form");
		else
			var ftname = $('#image').val();
	
			$.post( $("#myform").attr("action"),
			$post('save_add_faculty2.php',{postimage:image},
					$("#myform :input").serializeArray(),
					function (data){
						
						if(data == 1)
						{
							alert("Suda ada");
							return false;
							
						}
						if(data == 2)
						{
							alert("Tambah fakulti baru berkaya");
							alert("Upload gambar berjaya");
							window.location.reload();
						}
					}));
						
			$("#myform").submit(function(){
					return false;
				});
	});
	
<!-- student_id check -->	
function checkstcode(){
	var status = document.getElementById("stcodestatus");
	var u = document.getElementById("student_id").value;
		if(u !== ""){
			status.innerHTML = 'Ckecking...';
			var hr = new XMLHttpRequest();
			hr.open("POST", "add_student.php", true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200 ){
					status.innerHTML = hr.responseText;
				}
			}
				var v = "stcode2check="+u;
				hr.send(v);
		}
}

