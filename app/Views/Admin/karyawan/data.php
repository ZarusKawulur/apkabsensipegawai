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
<h3>Daftar Karyawan</h3>
</div>
<div class="card-body">
<table class="table table-triped">
<thead>
    <th>No</th>
    <th>Nama</th>
    <th>NIK</th>
    <th>Jabatan</th>
    <th>Opsi</th>
</thead>
<tbody>
    <?php foreach ($karyawan as $k => $value) : ?>
    
    <tr>
        <td><?= $k +1; ?></td>
        <td><?= $value['nama_karyawan']; ?></td>
        <td><?= $value['nik']; ?></td>
        <td><?= $value['jabatan']; ?></td>
        <td>
            <a href="/karyawan/detail/<?= $value['id'];?>" type="button" class="btn btn-success">Detail</a>
            
        </td>
    </tr>
    <?php endforeach; ?>      
</tbody>
</table>
</div>
</div>
</div>
<!-- End of Main Content -->


<div class="modal fade" id="modalTambah">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
    <div class="modal-body">
        <form action="<?= base_url('karyawan/tambah') ?>" method="post">
        <div class="form-group mb-0">
          <label for="Nama"></label>
          <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama">
        </div>
        <div class="form-group mb-0">
          <label for="Alamat"></label>
          <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Masukan Alamat">
        </div>
        <div class="form-group mb-0">
          <label for="NIK"></label>
          <input type="text" name="nik" id="nik" class="form-control" placeholder="Masukan NIK">
        </div>
        <div class="form-group mb-0">
          <label for="Kontak"></label>
          <input type="text" name="kontak" id="kontak" class="form-control" placeholder="Masukan No Kontak">
        </div>
        <div class="form-group mb-0">
          <label for="Agama"></label>
          <input type="text" name="agama" id="agama" class="form-control" placeholder="Masukan Agama">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="eror" class="btn btn-primary">Simpan</button>
    </div>
</div>
</div>

        <?= $this->endSection(); ?>

        