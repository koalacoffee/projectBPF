<main>
  <div class="container">
    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
      <div class="card-body p-0">
        <!-- nested row di dalam card body -->
        <div class="row">
          <div class="col-lg">
            <div class="p-5">
              <div class="text-center">
                <h5 class="card-title text-center pb-0 fs-4">Buat Akun</h5>
              </div><br>
              <form class="user" method="POST" action="<?=base_url('Auth/registrasi');?>">
                <div class="form-group">
                  <input type="text" name="nama" value="<?=set_value('nama');?>" class="form-control form-control-user" id="nama" placeholder="Nama Lengkap">
                  <?= form_error('nama','<small class="text-danger pl-3">','</small>');?>
                </div><br>
                <div class="form-group">
                  <input type="text" name="email" value="<?=set_value('email');?>" class="form-control form-control-user" id="email" placeholder="Alamat Email">
                  <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
                </div><br>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password1" value="<?=set_value('password1');?>" class="form-control form-control-user" id="password1" placeholder="Password">
                    <?= form_error('password1','<small class="text-danger pl-3">','</small>');?>
                  </div>
                  <div class="col-sm-6">
                    <input type="password" name="password2" value="<?=set_value('password2');?>" class="form-control form-control-user" id="password2" placeholder="Ulangi Password">
                    <?= form_error('password2','<small class="text-danger pl-3">','</small>');?>
                  </div>
                </div><br>
                <button  type="submit" class="btn btn-primary w-100">
                  Daftar Akun
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a href="<?=base_url('Auth');?>" class="small">Sudah Punya akun? Login!</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main><!-- End #main -->