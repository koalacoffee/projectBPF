
<main id="main" class="main">
    <div class="container-fluid">
    <div class="pagetitle">
      <h1><?php echo $judul;?></h1>
    </div><!-- End Page Title -->
      <div class="row">
        <div class="col-md-6">
          <a href="<?=base_url('Pinjaman/tambah')?>" class="btn btn-info mb-2">Tambah Pinjaman</a>
        </div>
        <div class="col-md-12">
          <table class="table">
            <thead>
              <tr>
                <td>No</td>
                <td>NIK</td>
                <td>Nama Lengkap</td>
                <td>Alamat</td>
                <td>Nomor Telepon</td>
                <td>Email</td>
                <td>Besar pinjaman</td>
                <td>Durasi</td>
                <td>Aksi</td>
              </tr>
            </thead>
            <tbody>
              <?php $i=1;?>
              <?php foreach($pinjaman as $us): ?>
              <tr>
                <td><?= $i;?></td>
                <td><?= $us['nik'];?></td>
                <td><?= $us['nama_lengkap'];?></td>
                <td><?= $us['alamat'];?></td>
                <td><?= $us['no_hp'];?></td>
                <td><?= $us['email'];?></td>
                <td><?= $us['besar_pinjaman'];?></td>
                <td><?= $us['durasi'];?></td>
                <td><a href="<?=base_url('Pinjaman/hapus/') . $us['nik'];?>" class="badge badge-danger">Hapus</a>
                <a href="<?=base_url('Pinjaman/edit/') . $us['nik'];?>" class="badge badge-warning">Edit</a>
              </tr>
              <?php $i++;?>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main><!-- End #main -->

  