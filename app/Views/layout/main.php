<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->renderSection('title') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <?= $this->renderSection('styles') ?>
</head>
<body>
    <div class="site-shell">
        <nav class="app-navbar">
            <a class="brand-link" href="<?= base_url('/') ?>">
                <span class="brand-icon"><i class="fa-solid fa-code"></i></span>
                <span>CI4 Praktikum</span>
            </a>
            <div class="nav-links">
                <a href="<?= base_url('profil') ?>">Profil</a>
                <a href="<?= base_url('mahasiswa') ?>">Mahasiswa</a>
                <a href="<?= base_url('praktikum/form') ?>">Praktikum</a>
                <a href="<?= base_url('biodata') ?>">Biodata</a>
            </div>
        </nav>

        <main class="container page-container">
            <?= $this->renderSection('content') ?>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
