<?php $this->load->view('dashboard/partial/header'); ?>
<?php $this->load->view('dashboard/partial/menu'); ?>
<?php
  $general = $this->db->get('general')->row_array();
?>

<main id="main">

<!-- ======= Breadcrumbs Section ======= -->
<section class="breadcrumbs">
  <div class="container">

    <div class="d-flex justify-content-between align-items-center">
      <h2><?= $subjudul ?></h2>
      <ol>
        <li><a href="<?= base_url('') ?>">Home</a></li>
        <li><?= $judul ?></li>
        <li><?= $subjudul ?></li>
      </ol>
    </div>

  </div>
</section><!-- End Breadcrumbs Section -->

<section class="inner-page">
  <div class="container">
  <?= $struktur->struktur ?>
  </div>
</section>


</main><!-- End #main -->



<?php $this->load->view('dashboard/partial/footer'); ?>
