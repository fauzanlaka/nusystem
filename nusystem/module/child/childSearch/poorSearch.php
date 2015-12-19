<div class='pull-left'>
    <h5><span class='glyphicon glyphicon-list'></span> <b>รายชื่อเด็กกำพร้า</b></h5>
</div><br><hr>

<div class="pull-right">
        <form class="navbar-form" role="search" action="?page=child&&cpage=poorSearch" method="post">
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
    $q = $_POST['q'];
    $sql = "SELECT c.*,ct.*,cp.* FROM childs c
                              INNER JOIN childType ct ON c.ct_id=ct.ct_id
                              INNER JOIN childProject cp ON c.cp_id=cp.cp_id
                              WHERE (c.c_fname LIKE '%".$q."%' and ct.ct_category = '2' ) OR (c.c_fatherName LIKE '%".$q."%' and ct.ct_category = '2' ) OR (c.c_motherName LIKE '%".$q."%' and ct.ct_category = '2' ) OR (c.c_pFname LIKE '%".$q."%' and ct.ct_category = '2' )
                              ORDER BY c_id DESC $limit";
    $query = mysqli_query($con, $sql);
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
            $ct_id = $rowChilds['ct_category'];
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

