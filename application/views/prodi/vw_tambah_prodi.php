<main id="main" class="main">
    <div class="container-fluid">
        <div class="pagetitle">
            <h1 align="center"><?php echo $judul;?></h1>
        </div><!-- End Page Title -->
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header justify-content-center">
                        Form Tambah Prodi
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama">Nama Prodi</label>
                                <input type="text" name="nama" value="<?= set_value('nama')?>" class="form-control" id="nama" placeholder="Nama">
                                <?= form_error('nama','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="ruangan">Ruangan</label>
                                <input type="text" name="ruangan" value="<?= set_value('ruangan')?>" class="form-control" id="ruangan" placeholder="Ruangan">
                                <?= form_error('ruangan','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" name="jurusan" value="<?= set_value('jurusan')?>" class="form-control" id="jurusan" placeholder="Jurusan">
                                <?= form_error('jurusan','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="akreditasi">Akreditasi</label>
                                <select name="akreditasi" id="akreditasi" value="<?= set_value('akreditasi')?>" class="form-control">
                                    <option value="">Pilih Akreditasi</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                                <?= form_error('akreditasi','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="kaprodi">Nama Kaprodi</label>
                                <input type="text" name="kaprodi" value="<?= set_value('kaprodi')?>" class="form-control" id="kaprodi" placeholder="Nama Kaprodi">
                                <?= form_error('kaprodi','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="tahun_berdiri">Tahun Berdiri</label>
                                <input type="text" name="tahun_berdiri" value="<?= set_value('tahun_berdiri')?>" class="form-control" id="tahun_berdiri"
                                    placeholder="Tahun Berdiri">
                                    <?= form_error('tahun_berdiri','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="output">Output Lulusan</label>
                                <input type="text" name="output" value="<?= set_value('output')?>" class="form-control" id="output" placeholder="Output Lulusan">
                                <?= form_error('output','<small class="text-danger p1-3">','</small>');?>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <div class="custom-file">
                                    <input type="file" name="gambar" value="<?= set_value('gambar')?>" class="custom-file-input" id="gambar">
                                    <label for="gambar" class="custom-file-label">Chooose File</label>
                                    <?= form_error('gambar','<small class="text-danger p1-3">','</small>');?>
                                </div>
                            </div>
                            <a href="<?=base_url('Prodi')?>" class="btn btn-danger">Tutup</a>
                            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah
                                Prodi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</main><!-- End #main -->