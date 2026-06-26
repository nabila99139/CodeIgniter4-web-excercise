<?= $this->extend('layout/main') ?>

<?= $this->section('title') ?>Data Mahasiswa<?= $this->endSection() ?>

<?= $this->section('content') ?>
    <div class="content-card wide-card">
        <div class="card-body">
            <div class="page-heading">
                <div>
                    <p class="eyebrow">CRUD Database</p>
                    <h1>Data Mahasiswa</h1>
                    <p class="lead-text">Kelola data mahasiswa dari tabel <code>tb_mahasiswa</code>.</p>
                </div>
                <a href="<?= base_url('mahasiswa/form') ?>" class="btn btn-primary">
                    <i class="fa-solid fa-plus"></i> Tambah Data
                </a>
            </div>

            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <i class="fa-solid fa-circle-check"></i> <?= esc(session()->getFlashdata('pesan')) ?>
                </div>
            <?php endif; ?>

            <div class="table-responsive">
                <table class="table data-table crud-table">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Universitas</th>
                            <th>No. HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (! empty($mahasiswa)) : ?>
                            <?php foreach ($mahasiswa as $row) : ?>
                                <tr>
                                    <td><?= esc($row['nim']) ?></td>
                                    <td><?= esc($row['nama']) ?></td>
                                    <td><?= esc($row['prodi']) ?></td>
                                    <td><?= esc($row['universitas']) ?></td>
                                    <td><?= esc($row['no_hp']) ?></td>
                                    <td>
                                        <div class="table-actions">
                                            <a href="<?= base_url('mahasiswa/edit/' . $row['nim']) ?>" class="btn btn-warning btn-sm">
                                                <i class="fa-solid fa-pen"></i> Ubah
                                            </a>
                                            <form action="<?= base_url('mahasiswa/hapus/' . $row['nim']) ?>" method="post" onsubmit="return confirm('Hapus data mahasiswa ini?')">
                                                <?= csrf_field() ?>
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa-solid fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6">
                                    <div class="empty-state">
                                        <i class="fa-solid fa-folder-open"></i>
                                        <span>Belum ada data mahasiswa. Tambahkan data pertama.</span>
                                    </div>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>
