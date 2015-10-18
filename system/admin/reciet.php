<!DOCTYPE html>
<html lang="en">

	<head>
	
		 <meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>ADMIN | Resit</title>
		<style>
    body {
        height: 842px;
        width: 595px;
        /* to centre page on screen*/
        margin-left: auto;
        margin-right: auto;
    }
	table {
    border-collapse: collapse;
	}
	
    </style>
	
	<script language="javascript" type="text/javascript">
		function printDiv(printableArea) {
		 var printContents = document.getElementById(printableArea).innerHTML;
		 var originalContents = document.body.innerHTML;

		 document.body.innerHTML = printContents;

		 window.print();

		 document.body.innerHTML = originalContents;
		}
	</script>

	</head>

	<body>
							<?php
								include("connect.php");
								$id = $_GET['id'];
								$sql = "select sr.*,re.*,st.* from student_register sr INNER JOIN students st ON sr.st_id = st.st_id INNER JOIN register re ON sr.re_id = re.re_id WHERE sr_id = '$id'";
								$query = mysql_query($sql);
								$result = mysql_fetch_array($query);
								$sr_id = $result['sr_id'];
								$st_id = $result['st_id'];
								$pay_date = date('Y-m-d H:i:s');
								$year = date('Y')+543;
								$mont = date('m');
								$day = date('d');
								$year_e = date('Y');
								if($result['rs_type'] == "special_prize"){
									$prize_text = $result['special_prize_text'];
								}else{
									$prize_text = $result['common_prize_text'];
								}								
								$getstudent_id = $result['st_id'];
								$sql_fakulty = "select fakultys.*,students.* from fakultys join students on fakultys.ft_id = students.ft_id where st_id = '$getstudent_id'";
								$query_fakulty = mysql_query($sql_fakulty);
								$result_fakulty = mysql_fetch_array($query_fakulty);
								$ft_name = str_replace("\'", "&#39;", $result_fakulty['ft_name']);
								
								$sql_department = " select departments.*,students.* from departments join students on departments.dp_id = students.dp_id where st_id = '$getstudent_id'";
								$query_department = mysql_query($sql_department);
								$result_department = mysql_fetch_array($query_department);
								$dp_name = str_replace("\'", "&#39;", $result_department['dp_name']);
								
								$sql_payment = "select * from payments where sr_id ='$id' ";
								$query_payment = mysql_query($sql_payment);
								$result_payment = mysql_fetch_array($query_payment);
								$reciet_code = $result_payment['reciet_code'];
								$money = $result_payment['money'];
								$money = $result_payment['money'];
                                                                $date = $result_payment['pay_date'];
							?>
				<div id="printableArea">
					<table width="597" height="89" border="0px" align="center">
						<tr>
							<td width="127" rowspan="4" align="left" valign="top"><img src="../student/images/logo jisda  baru.jpg"width="66" height="77"></td>
							<td width="434" align="center">ใบเสร็จรับเงิน / RECEIPT</td>
							<td width="146"></td>
						</tr>
						<tr>
							<td align="center"><font size="2px">JAMIAH ISLAM SYEIKH DAUD AL-FATHANI(JISDA) -YALA</font></td>
							<td align="right"><font size="2px">เลขที่ : <?= $reciet_code ?></font></td>
						</tr>
						<tr>
							<td align="center"><font size="2px">สถาบันอิสลามศึกษาชั้นสูง เช็คดาวุดอัลฟาฎอนีอัลอิสลามียะห์</font></td>
							<td align="right"><font size="2px">วันที่ : <?= $date; ?></font></td>
						</tr>
						<tr>
							<td align="center"><font size="2px">762 Siroros Road, Yala, Tel : 073-212937</font></td>
							<td></td>
						</tr>
					</table>
					<table width="595" border="0px" align="center">
							<tr>
								<td width="100"><font size="2px"><b>ได้รับเงินจาก :</b></font></td>
								<td width="205" align="center"><?= $result['firstname_rumi']; ?> <?= $result['lastname_rumi'] ?></td>
								<td width="110"><font size="2px"><b>รหัสประจำตัว  :</b></font></td>
								<td width="162" align="center"><?= $result['student_id'] ?></td>
							</tr>
							<tr>
								<td width="100"><font size="2px"><b>Received From </b></font></td>
								<td width="205" align="center"></td>
								<td width="110"><font size="2px"><b>Student ID</b></font></td>
								<td width="162" align="center"></td>
							</tr>
							<tr>
								<td width="100"><font size="2px"><b>คณะ :</b></font></td>
								<td width="205" align="center"><?= $ft_name ?></td>
								<td width="110"><font size="2px"><b>สาขาวิชา  :</b></font></td>
								<td width="162" align="center"><?= $dp_name ?></td>
							</tr>
							<tr>
								<td width="100"><font size="2px"><b>Faculty </b></font></td>
								<td width="205" align="center"></td>
								<td width="110"><font size="2px"><b>Department</b></font></td>
								<td width="162" align="center"></td>
							</tr>
					</table>
					<table width="597" height="197" border="1px"  align="center">
						<tr>
							<td height="37" colspan="2" align="center"><b>รายการ / Description</b></td>
							<td width="154" align="center"><b>จำนวนเงิน / Amount</b></td>
						</tr>
						<tr>
							<?php $year_t = ($result['academic_year'])+543; ?>
							<td colspan="2" align="left">	ค่าเทอมนักศึกษาภาคเรียนที่  : <?= $result['term'] ?>  ปีการศึกษา : <?= $year_t ?></td>
							<td align="right"><?= $money ?>.00</td>
						</tr>
						<tr>
							<td colspan="2" align="left">	ค่าธรรมเนียม </td>
							<td align="right"></td>
						</tr>
						<tr>
							<td colspan="2" align="left">	ค่าลงทะเบียน </td>
							<td align="right"></td>
						</tr>
						<tr>
							<td colspan="2" align="left">	ค่าประกาศนียบัตร </td>
							<td align="right"></td>
						</tr>
						<tr>
							<td colspan="2" align="left">	อื่นๆ </td>
							<td align="right"></td>
						</tr>
						<tr>
							<td width="82" height="24" align="left"><b>รวม (บาท)</b></td>
							<td width="339" align="center">&nbsp;</td>
							<td align="right"><?= $money ?>.00</td>
						</tr>
					</table>
                  <table width="594" height="69">
                  		<tr>
                        	<td height="70" align="right">ผู้รับเงิน/Cashier
                            </td>
                          
                        </tr>
                    	<tr>
                        	<td width="432">
                            </td>
        
                        </tr>
                    </table>
			</div>
					<div align="center">
					  <button type="button" class="btn btn-success" onclick="printDiv('printableArea')">Print <span class="glyphicon glyphicon-print"></span></button>
					</div>
	</body>
</html>
