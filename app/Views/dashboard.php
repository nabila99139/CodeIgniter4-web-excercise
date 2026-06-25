<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="mb-4">
        <h1 class="text-primary mb-1">Dashboard</h1>
        <p class="text-muted mb-0">Selamat datang! Pilih fitur yang ingin kamu akses.</p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-3">
        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-primary">Profil Mahasiswa</h5>
                    <p class="card-text text-muted">Lihat contoh data profil mahasiswa.</p>
                    <a href="<?= base_url('profil') ?>" class="btn btn-primary mt-auto">Buka</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-primary">Form Mahasiswa</h5>
                    <p class="card-text text-muted">Input data mahasiswa (Pretest).</p>
                    <a href="<?= base_url('mahasiswa/form') ?>" class="btn btn-primary mt-auto">Buka</a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card h-100 shadow-sm">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-primary">Form Praktikum</h5>
                    <p class="card-text text-muted">Input data praktikum (Tugas BAB 2).</p>
                    <a href="<?= base_url('praktikum/form') ?>" class="btn btn-primary mt-auto">Buka</a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
