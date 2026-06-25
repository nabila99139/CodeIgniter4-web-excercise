<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Form Praktikum<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="text-primary mb-3">Form Praktikum</h1>

            <form action="<?= base_url('praktikum/simpan') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" required>
                </div>

                <div class="mb-3">
                    <label for="matakuliah" class="form-label">Mata Kuliah</label>
                    <input type="text" class="form-control" id="matakuliah" name="matakuliah" required>
                </div>

                <div class="mb-3">
                    <label for="dosen_pengampu" class="form-label">Dosen Pengampu</label>
                    <input type="text" class="form-control" id="dosen_pengampu" name="dosen_pengampu" required>
                </div>

                <div class="mb-3">
                    <label for="asisten_praktikum" class="form-label">Asisten Praktikum</label>
                    <input type="text" class="form-control" id="asisten_praktikum" name="asisten_praktikum" required>
                </div>

                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>
