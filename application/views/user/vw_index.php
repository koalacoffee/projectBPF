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
                     <div class="col-xxl-6 col-md-6">
                         <div class="card info-card sales-card">

                             <div class="card-body">
                                 <h5 class="card-title">Total Quiz</span></h5>

                                 <div class="d-flex align-items-center">
                                     <div
                                         class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                         <i class="bi bi-controller"></i>
                                     </div>
                                     <div class="ps-3">
                                         <?php if ($user!==null){?>
                                        <h6><?= $user['total_quiz'];?></h6>
                                         <span class="text-muted small pt-2 ps-1">Jumlah Quiz Dimainkan</span>
                                         <?php } else {?>
                                         <h6>0</h6>
                                         <span class="text-muted small pt-2 ps-1">Login untuk lihat</span>
                                         <?php } ?>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div><!-- End Sales Card -->

                     <!-- Sales Card -->
                     <div class="col-xxl-6 col-md-6">
                         <div class="card info-card sales-card">

                             <div class="card-body">
                                 <h5 class="card-title">Total Quiz</span></h5>

                                 <div class="d-flex align-items-center">
                                     <div
                                         class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                         <i class="bi bi-fire"></i>
                                     </div>
                                     <div class="ps-3">
                                         <?php if ($user!==null){?>
                                        <h6><?= $user['total_streak'];?></h6>
                                         <span class="text-muted small pt-2 ps-1">Mendapat 100% Berturut-turut dalam Quiz</span>
                                         <?php } else {?>
                                         <h6>0</h6>
                                         <span class="text-muted small pt-2 ps-1">Login untuk lihat</span>
                                         <?php } ?>
                                     </div>
                                 </div>
                             </div>

                         </div>
                     </div><!-- End Sales Card -->

                     <!-- Recent Sales -->
                     <div class="col-12">
                         <div class="card recent-sales overflow-auto">
                             <div class="card-body">
                                 <h5 class="card-title">Daftar Quiz Tersedia</h5>

                                 <table class="table table-borderless datatable">
                                     <thead>
                                         <tr>
                                             <th scope="col">No</th>
                                             <th scope="col">Nama Quiz</th>
                                             <th scope="col">Jumlah Soal</th>
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
                                             <td><a class="btn btn-outline-primary btn-sm"
                                                     href="<?=base_url('PlayQuiz/') . $us['id'];?>">Mainkan</a></td>
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

             <!-- Right side columns -->
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
                 <!-- News & Updates Traffic -->
                 <div class="card">
                     <div class="card-body pb-0">
                         <h5 class="card-title">Website Belajar</span></h5>
                         <div class="news">
                             <div class="post-item clearfix">
                                 <img src="<?= base_url('assets/') ?>img/ruangguru.png" alt="">
                                 <h4><a href="https://www.ruangguru.com/">Ruang Guru</a></h4>
                                 <p>Platform belajar online</p>
                             </div>

                             <div class="post-item clearfix">
                                 <img src="<?= base_url('assets/') ?>img/pahamify.png" alt="">
                                 <h4><a href="https://pahamify.com/">Pahamify</a></h4>
                                 <p>Platform belajar mata pelajaran online</p>
                             </div>

                             <div class="post-item clearfix">
                                 <img src="<?= base_url('assets/') ?>img/duolingo.png" alt="">
                                 <h4><a href="https://www.duolingo.com/">Duolingo</a></h4>
                                 <p>Platform belajar bahasa</p>
                             </div>
                             <p></p>
                         </div><!-- End sidebar recent posts-->
                     </div>
                 </div>
     </section>
 </main><!-- End #main -->