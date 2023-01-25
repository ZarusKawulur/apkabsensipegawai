<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container" >
    <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-8">
              <div class="card">
                <div class="card-header">
                <h3>Data Karyawan</h3>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    :  <?= $karyawan['nama_karyawan']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">NIK</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    :  <?= $karyawan['nik']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tempat Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    :  <?= $karyawan['tempat_lahir']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Tanggal Lahir</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    :  <?= $karyawan['tanggal_lahir']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jenis Kelamin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    :  <?= $karyawan['jk']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Kontak</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    :  <?= $karyawan['kontak']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Jabatan</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    :  <?= $karyawan['jabatan']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Agama</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    :  <?= $karyawan['agama']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      
                      <a class="btn btn-info" href="">Edit</a>
                      <a class="btn btn-danger" href="<?= base_url('karyawan/hapus/')."/".$karyawan['user_id'];?>">Hapus</a>
                      
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
    </div>
<?= $this->endSection(); ?>