<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Biodata Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="text-primary mb-1">Biodata Mahasiswa</h1>
            <p class="text-muted mb-3">
                Data berikut dikirim dari Controller <code>Biodata::index</code>
                ke View <code>biodata.php</code>.
            </p>

            <table class="table table-bordered">
                <tbody>
                    <tr><th class="w-25">Nama</th><td><?= esc($nama) ?></td></tr>
                    <tr><th class="w-25">NIM</th><td><?= esc($nim) ?></td></tr>
                    <tr><th class="w-25">Mata Kuliah</th><td><?= esc($matakuliah) ?></td></tr>
                    <tr><th class="w-25">Program Studi</th><td><?= esc($prodi) ?></td></tr>
                </tbody>
            </table>

            <a href="<?= base_url('/') ?>" class="btn btn-secondary">Kembali ke Dashboard</a>
        </div>
    </div>
<?= $this->endSection() ?>
