<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Profil Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card shadow-sm">
        <div class="card-body">
            <h1 class="text-primary mb-3">Profil Mahasiswa</h1>
            <p>Ini adalah halaman profil.</p>

            <ul class="list-group mb-3">
                <li class="list-group-item"><strong>Nama:</strong> <?php echo $nama ?></li>
                <li class="list-group-item"><strong>NIM:</strong> <?php echo $nim ?></li>
                <li class="list-group-item"><strong>Kelas:</strong> <?php echo $kelas ?></li>
            </ul>

            <a href="<?= base_url('mahasiswa/form') ?>" class="btn btn-primary">Buka Form Mahasiswa</a>
        </div>
    </div>
<?= $this->endSection() ?>
