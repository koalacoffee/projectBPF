
  <main id="main" class="main">
    <div class="container-fluid">
    <div class="pagetitle">
      <h1><?php echo $judul;?></h1>
    </div><!-- End Page Title -->
      <div class="row">
        <div class="col-md-6">
          <a href="<?=base_url('Mahasiswa/tambah')?>" class="btn btn-info mb-2">Tambah Quiz</a>
        </div>
        <div class="col-md-12">
          <?=$this->session->flashdata('message');?>
          <table class="table">
            <thead>
              <tr>
                <td>No</td>
                <td>Nama Quiz</td>
                <td>Soal</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;?>
              <?php foreach($mahasiswa as $us): ?>
              <tr>
                <td><?= $i;?></td>
                <td><?= $us['nama'];?></td>
                <td><?= $us['nim'];?></td>
                <td><a href="<?=base_url('Mahasiswa/hapus/') . $us['id'];?>" class="badge badge-danger">Hapus</a>
                <a href="<?=base_url('Mahasiswa/edit/') . $us['id'];?>" class="badge badge-warning">Edit</a>
                <a href="<?=base_url('Mahasiswa/detail/') . $us['id'];?>" class="badge badge-info">Detail</a></td>
              </tr>
              <?php $i++;?>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main><!-- End #main -->

  