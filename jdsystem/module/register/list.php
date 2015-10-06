<?php  
    $sql =  mysqli_query($con, "select s.*,sr.*,f.* from students s inner join student_register sr on s.st_id=sr.st_id inner join fakultys f on s.ft_id=f.ft_id ORDER BY sr_id DESC LIMIT 0,9");
?>
<blockquote>
  <p><span class="glyphicon glyphicon-tags"></span>  Mahasiswa yang sudah daftar</p>
  <div class="pull-left">
        <form class="navbar-form" role="search" action="?page=register&&registerpage=search" method="post">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Nama atau nomor pokok" name="q" required>
                <div class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                </div>
            </div>
        </form>
  </div>
</blockquote>