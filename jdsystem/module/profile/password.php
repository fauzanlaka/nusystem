<blockquote>
    <form class="form-horizontal" method='post' action='?page=profile&&profilepage=editpasswd' onsubmit="return chkpssw();" name="checkpassword">
      <fieldset>
        <legend><span class="glyphicon glyphicon-edit"></span> Ubah password</legend>
        <div class="form-group">
          <label class="col-lg-3 control-label">Password :</label>
          <div class="col-lg-3">
            <input type="password" class="form-control input-sm" name="password" id="chkpssw_password" required>
          </div>
        </div>
        <div class="form-group">
          <label class="col-lg-3 control-label">Memastikan password :</label>
          <div class="col-lg-3">
            <input type="password" class="form-control input-sm" id="chkpssw_confirmpassword" required>
          </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2">
              <button type="submit" class="btn btn-default">Simpan</button>
            </div>
        </div>
      </fieldset>
    </form>
</blockquote>