<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Form Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="content-card">
        <div class="card-body">
            <p class="eyebrow">Input Data</p>
            <h1>Form Mahasiswa</h1>
            <p class="lead-text">Lengkapi identitas mahasiswa, lalu kirim data untuk ditampilkan pada tabel.</p>

            <?php if (! empty($pesan)) : ?>
                <div class="alert alert-success" role="alert"><?= esc($pesan) ?></div>
            <?php endif; ?>

            <form class="student-form" action="<?= base_url('mahasiswa/simpan') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" placeholder="Masukkan NIM" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" placeholder="Masukkan program studi" required>
                </div>

                <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i> Simpan</button>
            </form>

            <div class="table-responsive">
                <table class="table data-table">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (! empty($mahasiswa)) : ?>
                            <tr>
                                <td><?= esc($mahasiswa['nim']) ?></td>
                                <td><?= esc($mahasiswa['nama']) ?></td>
                                <td><?= esc($mahasiswa['prodi']) ?></td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <td>2211001</td>
                                <td>Budi</td>
                                <td>Teknik Informatika</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
