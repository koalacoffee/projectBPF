<main id="main" class="main">
    <div class="container-fluid">
        <div class="pagetitle">
            <h1><?php echo $judul;?></h1>
        </div><!-- End Page Title -->
        <div class="row">
            <div class="col-md-6">
                <a href="#" data-bs-toggle="modal" data-bs-target="#tambahSoal" data-bs-tooltip="tooltip" title="Tambah"
                    class="btn btn-info mb-2">Tambah Soal</a>
            </div>
            <div class="col-md-12">
                <?=$this->session->flashdata('message');?>
                <h5 class="modal-title"><?=$quiz['nama']?></h5>
                <table class="table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Kartu Induk</td>
                            <td>Perubahan Fisika</td>
                            <td>Perubahan Kimia</td>
                            <td>Aksi</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;?>
                        <?php foreach($soal as $us): ?>
                        <?php if ($quiz['id']==$us['quiz']):?>
                        <tr>
                            <td><?= $i;?></td>
                            <td><?=$us['nama'];?><br><img src="<?= base_url('assets/img/kartu/induk/').$us['gambar'];?>"
                                    width="200px" height="260px" class="imgcard"></td>
                            <td><?=$us['nama_kimia'];?><br><img
                                    src="<?= base_url('assets/img/kartu/induk/').$us['kimia'];?>" width="200px"
                                    height="260px" class="imgcard">
                            </td>
                            <td><?=$us['nama_fisika'];?><br><img
                                    src="<?= base_url('assets/img/kartu/induk/').$us['fisika'];?>" width="200px"
                                    height="260px" class="imgcard">
                            </td>
                            <td><a href="<?=base_url('Admin/vwEdit/').$us['id'].'/'.$quiz['id'];?>"
                                     class="badge badge-warning" title="Edit">Edit</a>
                                <a href="<?=base_url('Admin/hapusSoal/').$quiz['id']. '/' .$us['id'];?>"
                                    class="badge badge-danger">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++;?>
                        <?php endif;?>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
            <!-- Modal Edit Quiz -->
            <div class="modal fade" id="tambahSoal" tabindex="-1">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Soal</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?php if($this->session->flashdata('error_message')): ?>
                            <div class="alert alert-danger">
                                <?php echo $this->session->flashdata('error_message'); ?>
                            </div>
                            <?php endif; ?>
                            <form action="<?=base_url('Admin/tambahSoal/'.$quiz['id']);?>" method="POST"
                                enctype="multipart/form-data">
                                <!-- Three columns with input and image input -->
                                <div class="row">
                                    <!-- Column 1 -->
                                    <div class="col-md-4 vertical-line">
                                        <div class="form-group">
                                            <label for="kartuinduk">Kartu Induk</label>
                                            <input type="text" name="kartuinduk" class="form-control" id="kartuinduk"
                                                placeholder="Nama Objek">
                                            <?= form_error('kartuinduk','<small class="text-danger p1-3">','</small>');?>
                                        </div>
                                        <div class="form-group ">
                                            <label for="kartuIndukImg">Gambar Kartu Induk</label><br>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="<?= base_url("assets/img/defaultcard.jpg");?>" alt="Gambar"
                                                    id="selectedImage" class="d-flex justify-content-center"
                                                    width="200px" height="260px">
                                            </div><br>
                                            <div class="custom-file">
                                                <input type="file" name="kartuIndukImg" class="custom-file-input"
                                                    id="kartuIndukImg"
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
                                            <input type="text" name="kartufisika" class="form-control" id="kartufisika"
                                                placeholder="Keterangan Perubahan">
                                            <?= form_error('kartufisika','<small class="text-danger p1-3">','</small>');?>
                                        </div>
                                        <div class="form-group">
                                            <label for="kartuFisikaImg">Gambar Kartu Fisika</label><br>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="<?= base_url("assets/img/defaultcard.jpg");?>" alt="Gambar"
                                                    id="selectedImage1" class="d-flex justify-content-center"
                                                    width="200px" height="260px">
                                            </div><br>
                                            <div class="custom-file">
                                                <input type="file" name="kartuFisikaImg" class="custom-file-input"
                                                    id="kartuFisikaImg"
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
                                            <input type="text" name="kartukimia" class="form-control" id="kartukimia"
                                                placeholder="Keterangan Perubahan">
                                            <?= form_error('kartukimia','<small class="text-danger p1-3">','</small>');?>
                                        </div>
                                        <div class="form-group ">
                                            <label for="kartuKimiaImg">Gambar Kartu Kimia</label><br>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <img src="<?= base_url("assets/img/defaultcard.jpg");?>" alt="Gambar"
                                                    id="selectedImage2" class="d-flex justify-content-center"
                                                    width="200px" height="260px">
                                            </div><br>
                                            <div class="custom-file">
                                                <input type="file" name="kartuKimiaImg" class="custom-file-input"
                                                    id="kartuKimiaImg"
                                                    onchange="displaySelectedImage(event, 'selectedImage2')">
                                                <label for="gambar" class="custom-file-label">Pilih Gambar</label>
                                            </div>
                                            <?= form_error('gambar2','<small class="text-danger p1-3">','</small>');?>
                                        </div>
                                    </div>

                                    <!-- Submit and Close Buttons -->
                                    <div class="modal-footer">
                                        <a href="#" class="btn btn-danger" data-bs-dismiss="modal">Tutup</a>
                                        <button type="submit" name="tambah" class="btn btn-primary">Tambah Soal</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main><!-- End #main -->
<script>
$(document).ready(function() {
    $('.tambah-btn').click(function(e) {
        e.preventDefault();
        $('#tambahSoal').modal('show'); // Show the modal when the button is clicked
    });

    <?php if($this->session->flashdata('tambah_error_message')): ?>
        $('#tambahSoal').modal('show'); // Show the modal if there's an error message
    <?php endif; ?>
});
</script>

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