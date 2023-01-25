<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<?php if (session()->getFlashdata('pesan')) : ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span> </button>
    <?= session()->getFlashdata('pesan'); ?>
  </div>
<?php endif; ?>


<div class="card">
  <div class="card-header d-flex justify-content-between">
    <h3>Absen Karyawan</h3>
    <a href="<?= base_url('hari/open')?>" class="btn btn-primary <?= $cek != null ? "disabled":"" ?>">Open</a>
  </div>
  <div class="card-body">
    <table class="table table-triped">
      <thead>
        <th>No</th>
        <th>Tanggal</th>
        <th>Jam</th>
      </thead>
      <tbody>
        <?php foreach ($haris as $key => $hari) : ?>
          <tr>
            <td><?= $key + 1; ?></td>
            <td><?= $hari['tanggal']; ?></td>
            <td><?= $hari['waktu']; ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>

<!-- End of Main Content -->



<?= $this->endSection(); ?>