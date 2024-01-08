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
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="nama">Nama Prodi</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="ruangan">Ruangan</label>
                                <input type="text" name="ruangan" class="form-control" id="ruangan" placeholder="Ruangan">
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Jurusan">
                            </div>
                            <div class="form-group">
                                <label for="akreditasi">Akreditasi</label>
                                <select name="akreditasi" id="akreditasi" class="form-control">
                                    <option value="">Pilih Akreditasi</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="kaprodi">Nama Kaprodi</label>
                                <input type="text" name="kaprodi" class="form-control" id="kaprodi" placeholder="Nama Kaprodi">
                            </div>
                            <div class="form-group">
                                <label for="tahun_berdiri">Tahun Berdiri</label>
                                <input type="text" name="tahun_berdiri" class="form-control" id="tahun_berdiri"
                                    placeholder="Tahun Berdiri">
                            </div>
                            <div class="form-group">
                                <label for="output">Output Lulusan</label>
                                <input type="text" name="output" class="form-control" id="output" placeholder="Output Lulusan">
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