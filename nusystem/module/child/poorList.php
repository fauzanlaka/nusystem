<?php
$pagic = "?page=child&&cpage=poorList";
$sql = "SELECT COUNT(c.c_id),c.*,ct.* FROM childs c INNER JOIN childType ct ON c.ct_id=ct.ct_id WHERE ct.ct_category='2'";
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
                              INNER JOIN childProject cp ON c.cp_id=cp.cp_id
                              WHERE ct.ct_category = '2' 
                              ORDER BY c_id DESC $limit";
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
    <h5><span class='glyphicon glyphicon-list'></span> <b>รายชื่อเด็กยากจน</b></h5>
</div><br><hr>
<div class="pull-left">
    <?php echo $textline2; ?>
</div>
<div class="pull-right">
        <form class="navbar-form" role="search" action="?page=child&&cpage=search" method="post">
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
      <td width='10%'>
          <a href="#" data-toggle="modal" data-target="#myModal<?php echo $rowChilds['c_id'] ?>">
            <img src="module/child/childAdd/image/<?= $rowChilds['c_image'] ?>" class="img-thumbnail" width="100" hiegth="100"> 
          </a>
          <!-- Modal -->
                        <div class="modal fade bs-example-modal-lg" id="myModal<?php echo $rowChilds['c_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel<?php echo $rowChilds['c_id'] ?>">
                          <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel<?php echo $rowChilds['c_id'] ?>"><?= $rowChilds['c_fName'] ?> - <?= $rowChilds['c_lName'] ?></h4>
                              </div>
                              <div class="modal-body">
                                    

                                        <!-- Child data -->
                                        <table class="table table-hover table-striped">
                                            <tr>
                                                <td align="right"><b>รูป :</b></td>
                                                <td><img src="module/child/childAdd/image/<?= $rowChilds['c_image'] ?>" class="img-thumbnail" width="100" hiegth="100"></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>รหัสประจำตัว :</b></td>
                                                <td><?= $rowChilds['c_code'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>ชื่อ - นามสกุล :</b></td>
                                                <td><?= $rowChilds['c_fName'] ?> - <?= $rowChilds['c_lName'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>อายุ :</b></td>
                                                <td><?php
                                                        $c= date('Y');
                                                        $y= substr($rowChilds['c_birdthDate'],0,4);
                                                        echo $c-$y;
                                                      ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>ที่อยู่ :</b></td>
                                                <td><?= $rowChilds['c_houseNumber'] ?> ม.<?= $rowChilds['c_placeNumber'] ?> หมู่บ้าน <?= $rowChilds['c_village'] ?> ต.<?= $rowChilds['c_subdistrict'] ?> อ.<?= $rowChilds['c_district'] ?> จ.<?= $rowChilds['c_province'] ?> ไปรษณีย์ <?= $rowChilds['c_post'] ?>   <br></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>ประเภท :</b></td>
                                                <td><?= $rowChilds['ct_name'] ?> <i><?= $rowChilds['c_status'] ?></i></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>โครงการ :</b></td>
                                                <td><?= $rowChilds['cp_name'] ?></td>
                                            </tr>
                                            <?php
                                                if($rowChilds['ct_category'] == 1){
                                            ?>
                                            <tr>
                                                <td align="right"><b>ผู้ปกครอง :</b></td>
                                                <td><?= $rowChilds['c_pFname'] ?> - <?= $rowChilds['c_pLname'] ?> <b>เบอร์ติดต่อ </b> : <?= $rowChilds['c_pTelephone'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>บิดา :</b></td>
                                                <td><?= $rowChilds['c_fatherName'] ?> - <?= $rowChilds['c_fatherLname'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>มารดา :</b></td>
                                                <td><?= $rowChilds['c_motherName'] ?> - <?= $rowChilds['c_motherLname'] ?></td>
                                            </tr>
                                            <?php
                                            }else{
                                            ?>
                                            <tr>
                                                <td align="right"><b>บิดา :</b></td>
                                                <td><?= $rowChilds['c_fatherName'] ?> - <?= $rowChilds['c_fatherLname'] ?></td>
                                            </tr>
                                            <tr>
                                                <td align="right"><b>มารดา :</b></td>
                                                <td><?= $rowChilds['c_motherName'] ?> - <?= $rowChilds['c_motherLname'] ?> </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>   
                                        </table>

                                   
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">ปิด</button>
                              </div>
                            </div>
                          </div>
                        </div><!-- /Modal -->       
          
      </td>
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
          <?php
            $ct_id = $rowChilds['ct_id'];
            if($ct_id == 1){
                $ctId = "edit_1";
            }else{
                $ctId = "edit_2";
            }
          ?>
          <h6><b>พิมพ์ &nbsp  &nbsp; แก้ไข &nbsp  &nbsp; ลบ </b></h6>
          <h4><a href="#"><span class="glyphicon glyphicon-print"></span></a> | <a href="?page=child&&cpage=<?= $ctId ?>&&id=<?= $rowChilds['c_id'] ?>"><span class="glyphicon glyphicon-edit"></span></a> | <a href="?page=child&&cpage=delete&&id=<?= $rowChilds['c_id'] ?>" onclick="return confirm('คุณเเน่ใจหรือไม่ว่าจะลบข้อมูลนี้ ?');"><span class="glyphicon glyphicon-trash"></span></a></h4>
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
