<?php
$pagic = "?page=child&&cpage=index";
$sql = "SELECT COUNT(c_id) FROM childs";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_row($query);
// Here we have the total row count
$rows = $row[0];
// This is the number of results we want displayed per page
$page_rows = 10;
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
$sql = "SELECT c.*,ct.*,cp.* FROM childs c
                              INNER JOIN childType ct ON c.ct_id=ct.ct_id
                              INNER JOIN childProject cp ON c.cp_id=cp.cp_id ORDER BY c_id DESC $limit";
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
<div class='pull-left'>
    <h5><span class='glyphicon glyphicon-list'></span> <b>รายชื่อเด็กกำพร้าและยากจน</b></h5>
</div><br><hr>
<div class="pull-left">
    <?php echo $textline2; ?>
</div>
<div class="pull-right">
        <form class="navbar-form" role="search" action="?page=student&&studentpage=search" method="post">
            <div class="input-group">
                <input type="text" class="form-control input-sm" name="q" placeholder="ค้นหา" required>
            <div class="input-group-btn">
                <button class="btn btn-success btn-sm" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            </div>
        </form>
</div>
<table class="table">
  <tbody>
    <?php
        while($rowChilds = mysqli_fetch_array($query)){
    ?>
    <tr>
      <td width='10%'><img src="module/child/childAdd/image/<?= $rowChilds['c_image'] ?>" class="img-thumbnail" width="100" hiegth="100"> </td>
      <td align='left'>
            รหัส : <i><?= $rowChilds['c_code'] ?></i><br>
            ชื่อ  : <?= $rowChilds['c_fName'] ?> - <?= $rowChilds['c_lName'] ?><br>
            อายุ : <?php
                    $c= date('Y');
                    $y= substr($rowChilds['c_birdthDate'],0,4);
                    echo $c-$y;
                  ?>
            <br>
            ที่อยู่  : <?= $rowChilds['c_houseNumber'] ?> ม.<?= $rowChilds['c_placeNumber'] ?> หมู่บ้าน <?= $rowChilds['c_village'] ?> ต.<?= $rowChilds['c_subdistrict'] ?> อ.<?= $rowChilds['c_district'] ?> จ.<?= $rowChilds['c_province'] ?> ไปรษณีย์ <?= $rowChilds['c_post'] ?>   <br>
            ประเภท : <?= $rowChilds['ct_name'] ?><br>
            โครงการ : <?= $rowChilds['cp_name'] ?><br>
      </td>
      <td align="right">
          <h4><a href="?page=child&&cpage=edit&&id=<?= $rowChilds['c_id'] ?>"><span class="glyphicon glyphicon-edit"></span></a> | <a href="?page=child&&cpage=delete&&id=<?= $rowChilds['c_id'] ?>" onclick="return confirm('คุณเเน่ใจหรือไม่ว่าจะลบข้อมูลนี้ ?');"><span class="glyphicon glyphicon-trash"></span></a></h4>
      </td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table> 
<div>
    <div class="pagination"><?php echo $paginationCtrls; ?></div>
</div>
