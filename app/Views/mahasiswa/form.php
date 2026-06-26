<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?><?= esc($title) ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="content-card">
        <div class="card-body">
            <p class="eyebrow">Form CRUD</p>
            <h1><?= esc($title) ?></h1>
            <p class="lead-text">Isi data mahasiswa sesuai field pada tabel <code>tb_mahasiswa</code>.</p>

            <?php if (! empty($validation)) : ?>
                <div class="alert alert-danger" role="alert">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                    <div><?= $validation->listErrors() ?></div>
                </div>
            <?php endif; ?>

            <form class="student-form" action="<?= esc($action) ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" value="<?= esc(old('nim', $mahasiswa['nim'] ?? '')) ?>" placeholder="Masukkan NIM" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= esc(old('nama', $mahasiswa['nama'] ?? '')) ?>" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" value="<?= esc(old('prodi', $mahasiswa['prodi'] ?? '')) ?>" placeholder="Masukkan program studi" required>
                </div>

                <div class="mb-3">
                    <label for="universitas" class="form-label">Universitas</label>
                    <input type="text" class="form-control" id="universitas" name="universitas" value="<?= esc(old('universitas', $mahasiswa['universitas'] ?? '')) ?>" placeholder="Masukkan nama universitas" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">Nomor Handphone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= esc(old('no_hp', $mahasiswa['no_hp'] ?? '')) ?>" placeholder="Contoh: 081234567890" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fa-solid fa-floppy-disk"></i> Simpan
                    </button>
                    <a href="<?= base_url('mahasiswa') ?>" class="btn btn-secondary">
                        <i class="fa-solid fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
<?= $this->endSection() ?>
