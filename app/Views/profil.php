<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Profil Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="content-card">
        <div class="card-body">
            <p class="eyebrow">Data Mahasiswa</p>
            <h1>Profil Mahasiswa</h1>
            <p class="lead-text">Ini adalah halaman profil yang menampilkan data dari controller.</p>

            <ul class="info-list">
                <li><span><i class="fa-solid fa-user"></i> Nama</span><strong><?= esc($nama) ?></strong></li>
                <li><span><i class="fa-solid fa-hashtag"></i> NIM</span><strong><?= esc($nim) ?></strong></li>
                <li><span><i class="fa-solid fa-building-columns"></i> Kelas</span><strong><?= esc($kelas) ?></strong></li>
            </ul>

            <a href="<?= base_url('mahasiswa/form') ?>" class="btn btn-primary">
                <i class="fa-solid fa-pen"></i> Buka Form Mahasiswa
            </a>
        </div>
    </div>
<?= $this->endSection() ?>
