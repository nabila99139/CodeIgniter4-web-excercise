<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Form Praktikum</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <main class="container">
        <h1>Form Praktikum</h1>

        <form action="<?= base_url('praktikum/simpan') ?>" method="post">
            <?= csrf_field() ?>

            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>

            <label for="nim">NIM</label>
            <input type="text" id="nim" name="nim" required>

            <label for="kelas">Kelas</label>
            <input type="text" id="kelas" name="kelas" required>

            <label for="matakuliah">Mata Kuliah</label>
            <input type="text" id="matakuliah" name="matakuliah" required>

            <label for="dosen_pengampu">Dosen Pengampu</label>
            <input type="text" id="dosen_pengampu" name="dosen_pengampu" required>

            <label for="asisten_praktikum">Asisten Praktikum</label>
            <input type="text" id="asisten_praktikum" name="asisten_praktikum" required>

            <button type="submit">Kirim</button>
        </form>
    </main>
</body>
</html>
