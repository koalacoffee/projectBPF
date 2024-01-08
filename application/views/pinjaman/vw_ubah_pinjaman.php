<main id="main" class="main">
    <div class="container-fluid">
        <div class="pagetitle">
            <h1 align="center"><?php echo $judul;?></h1>
        </div><!-- End Page Title -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header justify-content-center">
                        Form Ubah Data Pinjaman
                    </div>
                    <div class="card-body">
                    <form action="<?=base_url('Pinjaman/update');?>" method="POST">
                    <input type="hidden" name="nik" value="<?= $pinjaman['nik'];?>">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" name="nama_lengkap"  value="<?= $pinjaman['nama_lengkap'];?>"class="form-control" id="nama_lengkap" placeholder="Nama Lengkap">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat"  value="<?= $pinjaman['alamat'];?>" class="form-control" id="alamat" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email"  value="<?= $pinjaman['email'];?>"class="form-control" id="email" placeholder="email">
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Nomor HP</label>
                                <input type="text" name="no_hp"  value="<?= $pinjaman['no_hp'];?>"class="form-control" id="no_hp" placeholder="Nomor HP">
                            </div>
                            <div class="form-group">
                                <label for="besar_pinjaman">Besar Pinjaman</label>
                                <input type="text" name="besar_pinjaman"  value="<?= $pinjaman['besar_pinjaman'];?>"class="form-control" id="besar_pinjaman"
                                    placeholder="Besar Pinjaman">
                            </div>
                            <div class="form-group">
                                <label for="durasi">Durasi</label>
                                <input type="text" name="durasi" value="<?= $pinjaman['durasi'];?>" class="form-control" id="durasi"
                                    placeholder="Durasi">
                            </div>
                            
                            
                            <a href="<?=base_url('Pinjaman')?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">
                                Ubah Pinjaman</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main><!-- End #main -->