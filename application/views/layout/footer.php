<!-- ======= Footer ======= -->
<footer id="footer" class="footer">
   
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="<?=base_url('assets/') ?>vendor/apexcharts/apexcharts.min.js"></script>
  <script src="<?=base_url('assets/') ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?=base_url('assets/') ?>vendor/chart.js/chart.umd.js"></script>
  <script src="<?=base_url('assets/') ?>vendor/echarts/echarts.min.js"></script>
  <script src="<?=base_url('assets/') ?>vendor/quill/quill.min.js"></script>
  <script src="<?=base_url('assets/') ?>vendor/simple-datatables/simple-datatables.js"></script>
  <script src="<?=base_url('assets/') ?>vendor/tinymce/tinymce.min.js"></script>
  <script src="<?=base_url('assets/') ?>vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- Bootstrap JS Bundle (Bootstrap + Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="<?=base_url('assets/') ?>js/main.js"></script>
  <script>
    $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
    })
</script>   
</body>
</html>