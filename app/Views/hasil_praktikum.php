<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hasil Praktikum</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <main class="container">
        <h1>Hasil Praktikum</h1>
        <p class="message">Data berhasil dikirim.</p>

        <table>
            <tbody>
                <tr><th>Nama</th><td><?= esc($data['nama']) ?></td></tr>
                <tr><th>NIM</th><td><?= esc($data['nim']) ?></td></tr>
                <tr><th>Kelas</th><td><?= esc($data['kelas']) ?></td></tr>
                <tr><th>Mata Kuliah</th><td><?= esc($data['matakuliah']) ?></td></tr>
                <tr><th>Dosen Pengampu</th><td><?= esc($data['dosen_pengampu']) ?></td></tr>
                <tr><th>Asisten Praktikum</th><td><?= esc($data['asisten_praktikum']) ?></td></tr>
            </tbody>
        </table>

        <p><a href="<?= base_url('praktikum/form') ?>">Kembali ke Form</a></p>
    </main>
</body>
</html>
