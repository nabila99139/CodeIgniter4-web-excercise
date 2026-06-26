<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Hasil Praktikum<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="content-card">
        <div class="card-body">
            <p class="eyebrow">Hasil Input</p>
            <h1>Hasil Praktikum</h1>

            <div class="alert alert-success" role="alert"><i class="fa-solid fa-circle-check"></i> Data berhasil dikirim.</div>

            <div class="table-responsive">
                <table class="table data-table">
                    <tbody>
                        <tr><th>Nama</th><td><?= esc($data['nama']) ?></td></tr>
                        <tr><th>NIM</th><td><?= esc($data['nim']) ?></td></tr>
                        <tr><th>Kelas</th><td><?= esc($data['kelas']) ?></td></tr>
                        <tr><th>Mata Kuliah</th><td><?= esc($data['matakuliah']) ?></td></tr>
                        <tr><th>Dosen Pengampu</th><td><?= esc($data['dosen_pengampu']) ?></td></tr>
                        <tr><th>Asisten Praktikum</th><td><?= esc($data['asisten_praktikum']) ?></td></tr>
                    </tbody>
                </table>
            </div>

            <a href="<?= base_url('praktikum/form') ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali ke Form</a>
        </div>
    </div>
<?= $this->endSection() ?>
