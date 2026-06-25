<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Form Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h1 class="text-primary mb-3">Form Mahasiswa</h1>

            <?php if (! empty($pesan)) : ?>
                <div class="alert alert-success" role="alert"><?= esc($pesan) ?></div>
            <?php endif; ?>

            <form action="<?= base_url('mahasiswa/simpan') ?>" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" class="form-control" id="nim" name="nim" required>
                </div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="prodi" class="form-label">Prodi</label>
                    <input type="text" class="form-control" id="prodi" name="prodi" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>

            <table class="table table-bordered mt-4">
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
<?= $this->endSection() ?>
