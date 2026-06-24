# Project CodeIgniter 4 - Soal Pretest

## Route

Route yang dibuat ada di `app/Config/Routes.php`:

```php
$routes->get('/profil', 'Profil::index');
$routes->get('/mahasiswa/form', 'Mahasiswa::form');
$routes->post('/mahasiswa/simpan', 'Mahasiswa::simpan');
```

## Controller

Controller profil ada di `app/Controllers/Profil.php`. Method `index()` mengirim data berikut ke view:

```php
$data = [
    'nama'  => 'Budi',
    'nim'   => '2211001',
    'kelas' => 'TI-A',
];
```

Controller mahasiswa ada di `app/Controllers/Mahasiswa.php`. Method `simpan()` menerima data dari form dengan method POST.

## View

View yang dibuat:

- `app/Views/profil.php`
- `app/Views/form_mahasiswa.php`

## Model

Model sederhana dibuat di `app/Models/MahasiswaModel.php` dengan tabel `tb_mahasiswa` dan primary key `nim`.

## CSS

CSS dibuat di `public/css/style.css` dengan ketentuan:

- Background body abu-abu.
- Heading utama warna biru.
- Tabel memiliki border.

## Menjalankan Project CI4

Jalankan perintah berikut:

```bash
php spark serve
```

Lalu buka:

- `http://localhost:8080/profil`
- `http://localhost:8080/mahasiswa/form`
