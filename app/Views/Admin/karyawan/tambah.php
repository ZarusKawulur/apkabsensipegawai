<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card">
    <div class="card-header">
        <h3>Input Karyawan</h3>
    </div>
    <form action="<?= base_url('karyawan/tambah') ?>" method="post">`
        <div class="card-body">
            <div class="form-group">
                <label for="">Nama</label>
                <input type="text" name="nama_karyawan" id="" class="form-control" placeholder="Nama Karyawan" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Nomor Induk Karyawan</label>
                <input type="text" name="nik" id="" class="form-control" placeholder="Nomor Induk Karyawan" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="" class="form-control" placeholder="Tempat Lahir" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Tanggal Lahir</label>
                <input type="text" name="tanggal_lahir" id="" class="form-control" placeholder="Tanggal Lahir" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <input type="text" name="jk" id="" class="form-control" placeholder="Jenis Kelamin" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Kontak</label>
                <input type="text" name="kontak" id="" class="form-control" placeholder="Kontak" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Jabatan</label>
                <input type="text" name="jabatan" id="" class="form-control" placeholder="Jabatan" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Agama</label>
                <input type="text" name="agama" id="" class="form-control" placeholder="Agama" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Username</label>
                <input type="text" name="username" class="form-control" placeholder="Input Username" aria-describedby="helpId">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Password" aria-describedby="helpId">
            </div>

            <div class="form-group">
                <label for="">Akses</label>
                <select name="role_id" class="form-control">
                    <option value="">---Pilih Akses---</option>
                    <?php foreach ($role as $index => $roles) : ?>
                        <option value="<?= $roles['id'] ?>"><?= $roles['role'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="card-footer">
            <div class="form-group">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>