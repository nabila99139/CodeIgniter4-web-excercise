<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Form Praktikum<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="content-card">
        <div class="card-body">
            <p class="eyebrow">Tugas BAB 2</p>
            <h1>Form Praktikum</h1>
            <p class="lead-text">Isi data praktikum untuk melihat hasil input pada halaman berikutnya.</p>

            <form class="student-form" action="<?= base_url('praktikum/simpan') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                </div>

                <div class="mb-3">
                    <label for="kelas" class="form-label">Kelas</label>
                    <input type="text" class="form-control" id="kelas" name="kelas" placeholder="Masukkan kelas" required>
                </div>

                <div class="mb-3">
                    <label for="matakuliah" class="form-label">Mata Kuliah</label>
                    <input type="text" class="form-control" id="matakuliah" name="matakuliah" placeholder="Masukkan mata kuliah" required>
                </div>

                <div class="mb-3">
                    <label for="dosen_pengampu" class="form-label">Dosen Pengampu</label>
                    <input type="text" class="form-control" id="dosen_pengampu" name="dosen_pengampu" placeholder="Masukkan nama dosen" required>
                </div>

                <div class="mb-3">
                    <label for="asisten_praktikum" class="form-label">Asisten Praktikum</label>
                    <input type="text" class="form-control" id="asisten_praktikum" name="asisten_praktikum" placeholder="Masukkan nama asisten" required>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Kirim</button>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>
