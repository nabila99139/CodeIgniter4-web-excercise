<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profil Mahasiswa</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <main class="container">
        <h1>Profil Mahasiswa</h1>
        <p>Ini adalah halaman profil.</p>

        <ul>
            <li>Nama: <?php echo $nama ?></li>
            <li>NIM: <?php echo $nim ?></li>
            <li>Kelas: <?php echo $kelas ?></li>
        </ul>

        <p>
            <a href="<?= base_url('mahasiswa/form') ?>">Buka Form Mahasiswa</a>
        </p>
    </main>
</body>
</html>
