<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Biodata Mahasiswa<?= $this->endSection() ?>

<?= $this->section('styles') ?>
    <style>
        #biodata-card {
            border-top: 5px solid #0ea5e9;
        }

        .biodata-note::before {
            content: "CSS";
            font-weight: 700;
            color: #0369a1;
            margin-right: 8px;
        }
    </style>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div id="biodata-card" class="content-card">
        <div class="card-body">
            <p class="eyebrow">Tugas BAB 3</p>
            <h1>Biodata Mahasiswa</h1>
            <p class="lead-text biodata-note">
                Data berikut dikirim dari Controller <code>Biodata::index</code>
                ke View <code>biodata.php</code>.
            </p>

            <div class="table-responsive">
                <table class="table data-table">
                    <tbody>
                        <tr><th>Nama</th><td><?= esc($nama) ?></td></tr>
                        <tr><th>NIM</th><td><?= esc($nim) ?></td></tr>
                        <tr><th>Mata Kuliah</th><td><?= esc($matakuliah) ?></td></tr>
                        <tr><th>Program Studi</th><td><?= esc($prodi) ?></td></tr>
                    </tbody>
                </table>
            </div>

            <a href="<?= base_url('/') ?>" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Kembali ke Dashboard</a>
        </div>
    </div>
<?= $this->endSection() ?>
