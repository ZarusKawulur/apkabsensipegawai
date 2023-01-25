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
<div class="card-header">
<h3>Absen Karyawan</h3>
</div>
<div class="card-body">
<table class="table table-triped">
<thead>
    <th>No</th>
    <th>Nama</th>
    <th>NIK</th>
    <th>Jabatan</th>
    <th>Opsi</th>
    <th>Status</th>
    
</thead>
<tbody>
    <?php foreach ($karyawan as $k => $value) : ?>
    
    <tr>
        <td><?= $k +1; ?></td>
        <td><?= $value['nama_karyawan']; ?></td>
        <td><?= $value['nik']; ?></td>
        <td><?= $value['jabatan']; ?></td>
        <td>
            <a href="/karyawan/detail/<?= $value['id'];?>" type="button" class="btn btn-success">Absen</a>
            
        </td>
    </tr>
    <?php endforeach; ?>      
</tbody>
</table>
</div>
</div>
</div>
<!-- End of Main Content -->



        <?= $this->endSection(); ?>