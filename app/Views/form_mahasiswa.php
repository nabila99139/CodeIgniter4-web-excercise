<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>

<body>
    <style>
        .container {
            display: grid;
        }

        table {
            border: 1px solid black;
        }

        body {
            background: grey;
        }

        h1 {
            text-align: center;
        }
    </style>

    <main class="container">
        <h1>Form Mahasiswa</h1>

        <?php if (! empty($pesan)) : ?>
            <p class="message"><?= esc($pesan) ?></p>
        <?php endif; ?>

        <form action="<?= base_url('mahasiswa/simpan') ?>" method="post">
            <?= csrf_field() ?>

            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" required>

            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>

            <label for="prodi">Prodi</label>
            <input type="text" id="prodi" name="prodi" required>

            <button type="submit">Simpan</button>
        </form>

        <table border="true">
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
    </main>
</body>

</html>