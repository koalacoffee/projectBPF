<main id="main" class="main">
    <div class="row">
        <h1 class="h3 mb-4 text-gray-800"><?= $judul;?></h1>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                    <img src="<?= base_url("assets/img/profile/").$user['gambar'];?>" alt="Profile"
                        class="rounded-circle" width=200px height=200px>
                    <h2><?= $user['nama'];?></h2>
                    
                    <h5><?=$user['email'];?></h3>
                    <?php
      if ($user['role'] == 'admin'){ ?>
                    <h6>Admin</h6>
                    </li>
                    <?php } else { ?>
                    <h6>Pengguna</h6>
                    <?php } ?>
                        <p class="card-text"><small class="text-muted">Anggota Sejak
                                <?= date('d F Y', $user['date_created'])?></small></p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body pt-3">
                    <!-- Bordered Tabs -->
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link <?= ($active_tab !== 'change-password') ? 'show active' : ''; ?>"
                                data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                Profile</button>
                        </li>
                        <li class="nav-item">
                            <button class="nav-link <?= ($active_tab === 'change-password') ? 'show active' : ''; ?>"
                                data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>
                    </ul>
                    <div class="tab-content pt-2">
                        <p></p>
                        <?=$this->session->flashdata('message');?>
                        <div class="tab-pane <?= ($active_tab !== 'change-password') ? 'show active' : ''; ?> profile-edit pt-3"
                            id="profile-edit">
                            <!-- Profile Edit Form -->
                            <form action="<?=base_url('Profil/edit');?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $user['id'];?>">
                                <div class="row mb-3">
                                    <label for="gambar" class="col-md-4 col-lg-3 col-form-label">Gambar Profil</label>
                                    <div class="col-md-8 col-lg-9">
                                        <img src="<?= base_url("assets/img/profile/").$user['gambar'];?>" alt="Profile" id="selectedImage"
                                            width=80px height=80px>
                                        <div class="pt-2">
                                            <div class="custom-file">
                                                <input type="file" name="gambar" class="custom-file-input" id="gambar" onchange="displaySelectedImage(event, 'selectedImage')">
                                                <label for="gambar" class="custom-file-label">Pilih Gambar</label>
                                                <?= form_error('gambar','<small class="text-danger p1-3">','</small>');?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nama" class="col-md-4 col-lg-3 col-form-label">Nama Lengkap</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="nama" type="text" class="form-control" id="nama"
                                            value="<?=$user['nama'];?>">
                                        <?= form_error('nama','<small class="text-danger p1-3">','</small>');?>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="email" type="text" class="form-control" id="email"
                                            value="<?=$user['email'];?>">
                                        <?= form_error('email','<small class="text-danger p1-3">','</small>');?>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="edit">Simpan Perubahan</button>
                                </div>
                            </form><!-- End Profile Edit Form -->

                        </div>
                        <div class="tab-pane <?= ($active_tab === 'change-password') ? 'show active' : ''; ?> pt-3"
                            id="profile-change-password">
                            <!-- Change Password Form -->
                            <form action="<?=base_url('Profil/editpw');?>" method="POST">
                                <input type="hidden" name="id" value="<?= $user['id'];?>">

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-lg-3 col-form-label">Current
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password" type="password" class="form-control" id="password1">
                                        <?= form_error('password','<small class="text-danger pl-3">','</small>');?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password1" class="col-md-4 col-lg-3 col-form-label">New
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password1" type="password" class="form-control" id="password1">
                                        <?= form_error('password1','<small class="text-danger pl-3">','</small>');?>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password2" class="col-md-4 col-lg-3 col-form-label">Re-enter New
                                        Password</label>
                                    <div class="col-md-8 col-lg-9">
                                        <input name="password2" type="password" class="form-control" id="password2">
                                        <?= form_error('password2','<small class="text-danger pl-3">','</small>');?>
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary" name="editpw">Ganti Password</button>
                                </div>
                            </form><!-- End Change Password Form -->

                        </div>

                    </div><!-- End Bordered Tabs -->

                </div>
            </div>
        </div>
</main>
<script>
    function displaySelectedImage(event, elementId) {
    const selectedImage = document.getElementById(elementId);
    const fileInput = event.target;

    if (fileInput.files && fileInput.files[0]) {
        const reader = new FileReader();

        reader.onload = function(e) {
            selectedImage.src = e.target.result;
        };

        reader.readAsDataURL(fileInput.files[0]);
    }
}
</script>