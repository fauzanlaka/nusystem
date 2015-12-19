<div class="pull-left">
    <h4><span class="glyphicon glyphicon-book"></span> รายงาน</h4>
</div>
<div class="pull-right">
    <div class="btn-group">
        <button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-plus-sign"></span> เพิ่มใหม่</button>
      <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
            <li><a href="#">เด็กกำพร้า</a></li>
            <li><a href="#">เด็กยากจน</a></li>
        </ul>
    </div>
      <div class="btn-group">
          <a href="#" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-list"></span> รายชื่อ</button></a>
      <button data-toggle="dropdown" class="btn btn-success btn-sm dropdown-toggle" data-placeholder="false"><span class="caret"></span></button>
        <ul class="dropdown-menu">
          <li><a href="#">เด็กกำพร้า</a></li>
          <li><a href="#">เด็กยากจน</a></li>
        </ul>
    </div>
</div><br><hr>

<?php

    $rpage = $_GET['rpage']; // To get the page

    switch ($cpage) {
        case 'index':
            include 'module/report/main.php';
            break;
    }				
