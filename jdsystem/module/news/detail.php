<?php
    $id = $_GET['id'];
    $sql = mysqli_query($con, "SELECT * FROM post where p_id='$id'");
    $result = mysqli_fetch_array($sql);
    
    $detail = str_replace("\'", "&#39;", $result['p_post']);
    $title = str_replace("\'", "&#39;", $result['p_title']);
    $file = str_replace("\'", "&#39;", $result['file']);
    $other = str_replace("\'", "&#39;", $result['p_other']); 
?>
<blockquote>
  <p><span class="glyphicon glyphicon-tags"></span>  Maklumat</p>
  <small>Maklumat  <cite title="Source Title">JAMIAH DAN IDARAH</cite></small>
  <br>
  <p class="text-center"><b><?= $title ?></b></p>
  <p><?= $detail ?></p><br>
  <div class="alert alert-dismissible alert-warning">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <h4>Catatan !</h4>
    <p><?= $other ?></p>
  </div>
</blockquote>
