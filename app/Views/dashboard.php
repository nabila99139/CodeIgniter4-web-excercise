<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <section class="page-hero">
        <div>
            <p class="eyebrow">Modul 4 - CSS</p>
            <h1>Dashboard Praktikum</h1>
            <p>Selamat datang! Pilih fitur yang ingin kamu akses.</p>
        </div>
        <span class="hero-badge" style="background-color: #ecfeff;">
            <i class="fa-solid fa-palette"></i>
            Styling CSS
        </span>
    </section>

    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-3 feature-grid">
        <div class="col">
            <div class="card feature-card h-100">
                <div class="card-body d-flex flex-column">
                    <span class="card-icon"><i class="fa-solid fa-user-graduate"></i></span>
                    <h5 class="card-title">Profil Mahasiswa</h5>
                    <p class="card-text text-muted">Lihat contoh data profil mahasiswa.</p>
                    <a href="<?= base_url('profil') ?>" class="btn btn-primary mt-auto">Buka <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card feature-card h-100">
                <div class="card-body d-flex flex-column">
                    <span class="card-icon"><i class="fa-solid fa-pen-to-square"></i></span>
                    <h5 class="card-title">Form Mahasiswa</h5>
                    <p class="card-text text-muted">Input data mahasiswa (Pretest).</p>
                    <a href="<?= base_url('mahasiswa/form') ?>" class="btn btn-primary mt-auto">Buka <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card feature-card h-100">
                <div class="card-body d-flex flex-column">
                    <span class="card-icon"><i class="fa-solid fa-flask"></i></span>
                    <h5 class="card-title">Form Praktikum</h5>
                    <p class="card-text text-muted">Input data praktikum (Tugas BAB 2).</p>
                    <a href="<?= base_url('praktikum/form') ?>" class="btn btn-primary mt-auto">Buka <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card feature-card h-100">
                <div class="card-body d-flex flex-column">
                    <span class="card-icon"><i class="fa-solid fa-id-card"></i></span>
                    <h5 class="card-title">Biodata Mahasiswa</h5>
                    <p class="card-text text-muted">View + data dari Controller (Tugas BAB 3).</p>
                    <a href="<?= base_url('biodata') ?>" class="btn btn-primary mt-auto">Buka <i class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
