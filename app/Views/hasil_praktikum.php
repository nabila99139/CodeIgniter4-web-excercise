<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Hasil Praktikum<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="text-primary mb-3">Hasil Praktikum</h1>

            <div class="alert alert-success" role="alert">Data berhasil dikirim.</div>

            <table class="table table-bordered">
                <tbody>
                    <tr><th class="w-25">Nama</th><td><?= esc($data['nama']) ?></td></tr>
                    <tr><th class="w-25">NIM</th><td><?= esc($data['nim']) ?></td></tr>
                    <tr><th class="w-25">Kelas</th><td><?= esc($data['kelas']) ?></td></tr>
                    <tr><th class="w-25">Mata Kuliah</th><td><?= esc($data['matakuliah']) ?></td></tr>
                    <tr><th class="w-25">Dosen Pengampu</th><td><?= esc($data['dosen_pengampu']) ?></td></tr>
                    <tr><th class="w-25">Asisten Praktikum</th><td><?= esc($data['asisten_praktikum']) ?></td></tr>
                </tbody>
            </table>

            <a href="<?= base_url('praktikum/form') ?>" class="btn btn-secondary">Kembali ke Form</a>
        </div>
    </div>
<?= $this->endSection() ?>
