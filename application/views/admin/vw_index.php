</script>
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item">GameQuiz</a></li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-12 col-md-6">
                        <div class="card info-card sales-card">

                            <div class="card-body">
                                <h5 class="card-title">Total Quiz</span></h5>

                                <div class="d-flex align-items-center">
                                    <div
                                        class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-controller"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6><?= $quiz_count; ?></h6>
                                        <span class="text-muted small pt-2 ps-1">Jumlah Quiz yang Dibuat</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Recent Sales -->
                    <div class="col-12">
                        <?=$this->session->flashdata('message');?>
                        <div class="card recent-sales overflow-auto">

                            <div class="card-body">

                                <h5 class="card-title">Daftar Quiz Tersedia</h5>
                                <a href="#" data-bs-toggle="modal" data-bs-target="#tambahQuiz" data-bs-tooltip="tooltip" title="Tambah" class="btn btn-info mb-2 tambah-btn">Tambah Quiz</a>
                                <table class="table table-borderless datatable">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Nama Quiz</th>
                                            <th scope="col">Jumlah Soal</th>
                                            <th scope="col">Tanggal Ditambahkan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($quiz as $us): ?>
                                        <tr>
                                            <td><?= $i; ?></td>
                                            <td><?= $us['nama']; ?></td>
                                            <td><?= $us['soal']; ?></td>
                                            <td><?= $us['date_created']; ?></td>
                                            <td>
                                                <a href="#" data-id="<?= $us['id']; ?>" data-bs-toggle="modal"
                                                    data-bs-target="#editQuiz" data-bs-tooltip="tooltip" title="Edit"
                                                    class="btn btn-warning edit-btn">
                                                    <i class="bi bi-pen-fill"></i>
                                                </a>
                                                <a href="<?=base_url('Admin/soal/') . $us['id'];?>"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Soal"
                                                    class="btn btn-info"><i class="bi bi-file-image"></i></a>
                                                <a href="<?=base_url('Admin/hapus/') . $us['id'];?>"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus quiz ini?');"
                                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Hapus Quiz"
                                                    class="btn btn-danger">
                                                    <i class="bi bi-trash-fill"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                    </div><!-- End Recent Sales -->
                </div>
            </div><!-- End Left side columns -->
            <!-- Modal Edit Quiz -->
            <div class="modal fade" id="editQuiz" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Nama Quiz</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url('Admin/editQuiz');?>" method="POST">
                                <input type="hidden" name="id" value="<?= $us['id'];?>">
                                <div class="form-group">
                                    <label for="nama">Nama Quiz</label>
                                    <input type="text" name="nama" value="<?= $us['nama'];?>" class="form-control"
                                        id="nama" placeholder="Nama">
                                    <?= form_error('nama','<small class="text-danger p1-3">','</small>');?>
                                </div>
                                <a href="<?=base_url('Admin')?>" class="btn btn-danger">Tutup</a>
                                <button type="submit" name="edit" class="btn btn-primary float-right">Edit
                                    Quiz</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- End Basic Modal-->
            <?php if($error=="edit"): ?>
            <script>
            $(document).ready(function() {
                $('#editQuiz').modal('show'); // Show the modal
            });
            </script>
            <?php endif; ?>
            <div class="modal fade" id="tambahQuiz" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Quiz</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?=base_url('Admin/tambahQuiz');?>" method="POST">
                                <div class="form-group">
                                    <label for="nama">Nama Quiz</label>
                                    <input type="text" name="nama" class="form-control"
                                        id="nama" placeholder="Nama">
                                    <?= form_error('nama','<small class="text-danger p1-3">','</small>');?>
                                </div>
                                <a href="<?=base_url('Admin')?>" class="btn btn-danger">Tutup</a>
                                <button type="submit" name="edit" class="btn btn-primary float-right">Buat
                                    Quiz</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- End Basic Modal-->
            <?php if($error==="tambah"): ?>
            <script>
            $(document).ready(function() {
                $('#tambahQuiz').modal('show'); // Show the modal
            });
            </script>
            <?php endif; ?>
            <?php
        usort($player, function($a, $b) {
          return $b['total_streak'] <=> $a['total_streak']; // Mengurutkan dari yang tertinggi ke terendah
        });
              ?>

            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body pb-0">
                        <h5 class="card-title">Leaderboard</h5>
                        <table class="table table-borderless ">
                            <thead>
                                <tr>
                                    <th scope="col">Rank</th>
                                    <th scope="col">Player</th>
                                    <th scope="col">Streak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($player as $us): ?>
                                <tr>
                                    <td><?= $i; ?></td>
                                    <td><?= $us['nama']; ?></td>
                                    <td><?= $us['total_streak']; ?></td>
                                </tr>
                                <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
    </section>
</main><!-- End #main -->
<script>
$(document).ready(function() {
    $('.edit-btn').click(function(e) {
        e.preventDefault();

        var quizId = $(this).data('id');
        $('#editQuiz input[name="id"]').val(quizId);
    });
    $('.tambah-btn').click(function(e) {
        e.preventDefault();

        $('#tambahQuiz');
    });
});
</script>