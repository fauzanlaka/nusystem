<br>
<?php
$id = $_SESSION["UserID"];
$pagic = "?page=user&&userpage=test";
$sql = "SELECT COUNT(u_id) FROM users WHERE u_id!='$id'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_row($query);
// Here we have the total row count
$rows = $row[0];
// This is the number of results we want displayed per page
$page_rows = 3;
// This tells us the page number of our last page
$last = ceil($rows/$page_rows);
// This makes sure $last cannot be less than 1
if($last < 1){
	$last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
// Get pagenum from URL vars if it is present, else it is = 1
if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $page_rows .',' .$page_rows;
// This is your query again, it is for grabbing just one page worth of rows by applying $limit
$sql = "SELECT * FROM users WHERE u_id!='$id' ORDER BY u_id DESC $limit";
$query = mysqli_query($con, $sql);
// This shows the user what page they are on, and the total number of pages
$textline1 = "จำนวน(<b>$rows</b>)";
$textline2 = "หน้า <b>$pagenum</b> จากทั้ังหมด <b>$last</b>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
if($last != 1){
	/* First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. */
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
        
		$paginationCtrls .= '<a href="'.$pagic.'&&pn='.$previous.'">ก่อนหน้า</a> &nbsp; &nbsp; ';
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$pagic.'&&pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	// Render the target page number, but without it being a link
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	// Render clickable number links that should appear on the right of the target page number
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$pagic.'&&pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; &nbsp; <a href="'.$pagic.'&&pn='.$next.'">ถัดไป</a> ';
    }
}
$list = '';
?>
  <p><?php echo $textline2; ?></p>
    <table class="table table-bordered table-hover">
        <thead>
            <tr>
              <td align="center"><b>รหัสประจำตัว</b></td>
              <td align="center"><b>ชื่อ-นามสกุล</b></td>
              <td align="center"><b>เบอร์โทรศัพท์</b></td>
              <td align="center"><b>ลงทะเบียนเมื่อ</b></td>
              <td align="center"><b>ผู้เพิ่ม</b></td>
              <td align="center"><b>เเก้ไข | ลบ</b></td>
            </tr>
        </thead>
        <tbody>
        <?php
        while($row = mysqli_fetch_array($query)){
                $id = $row['u_adder'];
                $u_id = str_replace("\'", "&#39;", $row["u_identitynumber"]);
                $firstname = str_replace("\'", "&#39;", $row["u_fname"]);
                $lastname = str_replace("\'", "&#39;", $row["u_lname"]);
                $telephone = str_replace("\'", "&#39;", $row["u_telephone"]);
                $regisdate = str_replace("\'", "&#39;", $row["u_regisdate"]);
        ?>
            <tr>
                <td align="center"><?= $u_id ?></td>
                <td align="center"><?= $firstname ?> - <?= $lastname ?></td>
                <td align="center"><?= $telephone ?></td>
                <td align="center"><?= $regisdate ?></td>
        <?php
            $adder = mysqli_query($con , "SELECT * FROM users WHERE u_id='$id'");
            $rsc = mysqli_fetch_array($adder);
            
            $firstnameadder = str_replace("\'", "&#39;", $rsc["u_fname"]);
            $lasttnameadder = str_replace("\'", "&#39;", $rsc["u_lname"]);
        ?>
                <td align="center"><?= $firstnameadder ?> - <?= $lasttnameadder ?></td>
                <td align="center"><a href="?page=user&&userpage=edit&&id=<?= $row['u_id'] ?>"><span class="glyphicon glyphicon-edit"></span></a> | <a href="?page=user&&userpage=delete&&id=<?= $rs['u_id'] ?>" onclick="return confirm('คุณเเน่ใจว่าลบผู้ใช้นี้หรือไม่ ?');"><span class="glyphicon glyphicon-remove"></span></a></td>
            </tr>
        <?php        
        }
        mysqli_close($con);
        ?>
        <tbody>
    </table>
    <div class="pagination"><?= $paginationCtrls ?></div>

