</script>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Halaman Edit Soal</h1>
    </div><!-- End Page Title -->
    <section class="section dashboard">
    <?=$this->session->flashdata('message');?>
        <form action="<?=base_url('Admin/editSoal/').$soal['id'].'/'.$quiz_id;?>" method="POST" enctype="multipart/form-data">
            <!-- Three columns with input and image input -->
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-4 vertical-line">
                    <div class="form-group">
                        <label for="kartuinduk">Kartu Induk</label>
                        <input type="text" name="kartuinduk" class="form-control" id="kartuinduk" value="<?= $soal['nama'];?>"
                            placeholder="Nama Objek">
                        <?= form_error('kartuinduk','<small class="text-danger p1-3">','</small>');?>
                    </div>
                    <div class="form-group ">
                        <label for="kartuIndukImg">Gambar Kartu Induk</label><br>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="<?= base_url('assets/img/kartu/induk/').$soal['gambar'];?>" alt="Gambar" id="selectedImage"
                                class="d-flex justify-content-center" width="200px" height="260px">
                        </div><br>
                        <div class="custom-file">
                            <input type="file" name="gambar" class="custom-file-input" id="kartuIndukImg"
                                onchange="displaySelectedImage(event, 'selectedImage')">
                            <label for="gambar" class="custom-file-label">Pilih Gambar</label>
                        </div>
                        <?= form_error('gambar1','<small class="text-danger p1-3">','</small>');?>
                    </div>
                </div>
                <!-- Column 2 -->
                <div class="col-md-4 vertical-line">
                    <div class="form-group">
                        <label for="kartufisika">Kartu Perubahan Fisika</label>
                        <input type="text" name="kartufisika" class="form-control" id="kartufisika" value="<?= $soal['nama_fisika'];?>"
                            placeholder="Keterangan Perubahan">
                        <?= form_error('kartufisika','<small class="text-danger p1-3">','</small>');?>
                    </div>
                    <div class="form-group">
                        <label for="kartuFisikaImg">Gambar Kartu Fisika</label><br>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="<?= base_url('assets/img/kartu/induk/').$soal['fisika'];?>" alt="Gambar" id="selectedImage1"
                                class="d-flex justify-content-center" width="200px" height="260px">
                        </div><br>
                        <div class="custom-file">
                            <input type="file" name="fisika" class="custom-file-input" id="kartuFisikaImg" 
                                onchange="displaySelectedImage(event, 'selectedImage1')">
                            <label for="gambar" class="custom-file-label">Pilih Gambar</label>
                        </div>
                        <?= form_error('gambar2','<small class="text-danger p1-3">','</small>');?>
                    </div>
                </div>
                <!-- Column 3 -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="kartukimia">Kartu Perubahan Kimia</label>
                        <input type="text" name="kartukimia" class="form-control" id="kartukimia" value="<?= $soal['nama_kimia'];?>"
                            placeholder="Keterangan Perubahan">
                        <?= form_error('kartukimia','<small class="text-danger p1-3">','</small>');?>
                    </div>
                    <div class="form-group ">
                        <label for="kartuKimiaImg">Gambar Kartu Kimia</label><br>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="<?= base_url('assets/img/kartu/induk/').$soal['kimia'];?>" alt="Gambar" id="selectedImage2"
                                class="d-flex justify-content-center" width="200px" height="260px">
                        </div><br>
                        <div class="custom-file">
                            <input type="file" name="kimia" class="custom-file-input" id="kartuKimiaImg" 
                                onchange="displaySelectedImage(event, 'selectedImage2')">
                            <label for="gambar" class="custom-file-label">Pilih Gambar</label>
                        </div>
                        <?= form_error('gambar2','<small class="text-danger p1-3">','</small>');?>
                    </div>
                </div>
                <button type="submit" name="edit" class="btn btn-primary">Edit Soal</button>
        </form>
    </section>
</main><!-- End #main -->
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