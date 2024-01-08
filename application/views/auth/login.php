<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <!-- <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center"> ganti jadi -->
                    <div class="col-lg-5">
                        <div class="d-flex justify-content-center py-4">
                        <img src="<?= base_url('assets/') ?>/img/logo_game.png" alt="" width="100px" height="100px" >
                        </div><!-- End Logo -->
                        <div class="card mb-3">
                            <div class="card-body">
                            
                                <div class="pt-4 pb-2">
                                <p class="small mb-0 text-center">Langsung ke <a href="<?= base_url('GameQuiz/') ?>">Gamequiz!</a></p>
                                    <h5 class="card-title text-center pb-0 fs-4">Halaman Login</h5>
                                </div>
                                <?= $this->session->flashdata('message');?>
                                <form action="<?= base_url('auth'); ?>" method="post" class="row g-3">
                                    <div class="col-12">
                                        <div class="input-group has-validation">
                                            <span class="input-group-text" id="inputGroupPrepend">@</span>
                                            <input type="text" name="email" class="form-control form-control-user" id="email"
                                                placeholder="Masukkan Alamat Email" value="<?= set_value('email');?>">
                                        </div>
                                        <?= form_error('email','<small class="text-danger pl-3">','</small>');?>
                                    </div>
                                    <div class="col-12">
                                        <input type="password" name="password" class="form-control form-control-user" id="password"
                                            placeholder="Masukkan Password" value="<?= set_value('password');?>">
                                            <?= form_error('password','<small class="text-danger pl-3">','</small>');?>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                </form>
                                <hr>
                                <div class="col-12 text-center">
                                    <p class="small mb-0"><a href="forgot-password.html">Lupa Password?</a></p>
                                    <p class="small mb-0"><a href="<?= base_url('Auth/registrasi'); ?>">Buat Akun!</a></p>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
</main><!-- End #main -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>