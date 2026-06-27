# Dokumentasi Project CI4 Web Praktikum

## 1. Gambaran Umum

Project ini merupakan aplikasi web sederhana berbasis CodeIgniter 4 yang dibuat untuk memenuhi rangkaian praktikum Web Programming. Aplikasi dikembangkan secara bertahap mulai dari pengenalan route dan controller, pembuatan view, penggunaan CSS, sampai implementasi CRUD data mahasiswa menggunakan database MySQL.

Fitur utama aplikasi:

- Dashboard utama.
- Halaman profil mahasiswa.
- Form praktikum menggunakan method POST.
- Halaman biodata dari controller ke view.
- Styling menggunakan CSS eksternal, embedded CSS, inline CSS, Google Fonts, dan Font Awesome.
- CRUD data mahasiswa dengan field NIM, Nama, Prodi, Universitas, dan Nomor Handphone.

## 2. Teknologi yang Digunakan

- PHP 7.4 atau lebih baru.
- CodeIgniter 4.
- MySQL.
- DBeaver sebagai database client.
- Bootstrap 5.
- Google Fonts.
- Font Awesome.
- CSS custom pada `public/css/style.css`.

## 3. Struktur Folder Penting

```text
CI4WebPraktikum/
|-- app/
|   |-- Config/
|   |   `-- Routes.php
|   |-- Controllers/
|   |   |-- Home.php
|   |   |-- Profil.php
|   |   |-- Praktikum.php
|   |   |-- Biodata.php
|   |   `-- Mahasiswa.php
|   |-- Models/
|   |   `-- MahasiswaModel.php
|   `-- Views/
|       |-- layout/
|       |   `-- main.php
|       |-- mahasiswa/
|       |   |-- index.php
|       |   `-- form.php
|       |-- dashboard.php
|       |-- profil.php
|       |-- form_praktikum.php
|       |-- hasil_praktikum.php
|       `-- biodata.php
|-- public/
|   `-- css/
|       `-- style.css
|-- writable/
|-- vendor/
|-- .env
|-- composer.json
`-- spark
```

Penjelasan folder:

- `app/Controllers`: berisi controller yang mengatur alur program.
- `app/Models`: berisi model untuk berkomunikasi dengan database.
- `app/Views`: berisi tampilan halaman web.
- `app/Config/Routes.php`: berisi daftar route aplikasi.
- `public/css/style.css`: berisi CSS custom aplikasi.
- `public/index.php`: entry point aplikasi.
- `writable`: folder untuk cache, log, session, dan file runtime.
- `vendor`: dependency CodeIgniter dan Composer.

## 4. Cara Menjalankan Project

1. Buka terminal pada folder project.
2. Pastikan dependency Composer sudah tersedia.
3. Jalankan server CodeIgniter:

```bash
php spark serve --port 8081
```

4. Buka browser:

```text
http://localhost:8081/
```

Base URL pada file `.env`:

```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8081/'
```

## 5. Konsep MVC pada Project

Project ini menggunakan pola MVC:

- Model: menangani data dan query database, contohnya `MahasiswaModel`.
- View: menampilkan halaman web, contohnya `dashboard.php`, `biodata.php`, dan view CRUD mahasiswa.
- Controller: mengatur proses request, memanggil model, dan mengirim data ke view.

Contoh alur:

```text
User membuka /mahasiswa
        ↓
Routes.php mengarahkan ke Mahasiswa::index
        ↓
Controller Mahasiswa mengambil data dari MahasiswaModel
        ↓
Data dikirim ke view mahasiswa/index.php
        ↓
Halaman daftar mahasiswa tampil di browser
```

## 6. Daftar Route Aplikasi

Route berada pada file `app/Config/Routes.php`.

```php
$routes->get('/', 'Home::index');
$routes->get('profil', 'Profil::index');
$routes->get('profile', 'Profil::index');
$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->get('mahasiswa/form', 'Mahasiswa::form');
$routes->post('mahasiswa/simpan', 'Mahasiswa::simpan');
$routes->get('mahasiswa/edit/(:segment)', 'Mahasiswa::edit/$1');
$routes->post('mahasiswa/update/(:segment)', 'Mahasiswa::update/$1');
$routes->post('mahasiswa/hapus/(:segment)', 'Mahasiswa::hapus/$1');
$routes->get('praktikum/form', 'Praktikum::form');
$routes->post('praktikum/simpan', 'Praktikum::simpan');
$routes->get('biodata', 'Biodata::index');
```

Tabel route:

| Method | URL | Controller | Fungsi |
| --- | --- | --- | --- |
| GET | `/` | `Home::index` | Menampilkan dashboard |
| GET | `/profil` | `Profil::index` | Menampilkan profil mahasiswa |
| GET | `/profile` | `Profil::index` | Alias halaman profil |
| GET | `/praktikum/form` | `Praktikum::form` | Menampilkan form praktikum |
| POST | `/praktikum/simpan` | `Praktikum::simpan` | Memproses data form praktikum |
| GET | `/biodata` | `Biodata::index` | Menampilkan biodata mahasiswa |
| GET | `/mahasiswa` | `Mahasiswa::index` | Menampilkan data mahasiswa |
| GET | `/mahasiswa/form` | `Mahasiswa::form` | Menampilkan form tambah mahasiswa |
| POST | `/mahasiswa/simpan` | `Mahasiswa::simpan` | Menyimpan data mahasiswa |
| GET | `/mahasiswa/edit/{nim}` | `Mahasiswa::edit` | Menampilkan form ubah mahasiswa |
| POST | `/mahasiswa/update/{nim}` | `Mahasiswa::update` | Menyimpan perubahan data mahasiswa |
| POST | `/mahasiswa/hapus/{nim}` | `Mahasiswa::hapus` | Menghapus data mahasiswa |

## 7. Controller

### 7.1 Home Controller

File: `app/Controllers/Home.php`

```php
class Home extends BaseController
{
    public function index(): string
    {
        return view('dashboard');
    }
}
```

Controller ini menampilkan halaman dashboard sebagai halaman utama aplikasi.

### 7.2 Profil Controller

File: `app/Controllers/Profil.php`

Controller ini menyiapkan data profil mahasiswa dalam bentuk array, lalu mengirimkannya ke view `profil`.

Data yang ditampilkan meliputi:

- Nama.
- NIM.
- Kelas.
- Mata kuliah.
- Dosen.
- Asisten dosen.

### 7.3 Praktikum Controller

File: `app/Controllers/Praktikum.php`

```php
public function form(): string
{
    return view('form_praktikum');
}

public function simpan(): string
{
    $data = [
        'nama'              => $this->request->getPost('nama'),
        'nim'               => $this->request->getPost('nim'),
        'kelas'             => $this->request->getPost('kelas'),
        'matakuliah'        => $this->request->getPost('matakuliah'),
        'dosen_pengampu'    => $this->request->getPost('dosen_pengampu'),
        'asisten_praktikum' => $this->request->getPost('asisten_praktikum'),
    ];

    return view('hasil_praktikum', ['data' => $data]);
}
```

Penjelasan:

- `form()` menampilkan halaman form praktikum.
- `simpan()` mengambil data dari form menggunakan `getPost()`.
- Data dikirim ke view `hasil_praktikum`.

### 7.4 Biodata Controller

File: `app/Controllers/Biodata.php`

Controller ini mengirim data biodata dari controller ke view.

```php
$data = [
    'nama'  => 'Nabila Anindya Hassya',
    'nim'   => '32602400080',
    'prodi' => 'Teknik Informatika',
    'matakuliah' => 'Web Programming',
    'dosen' => 'dosen 1',
    'asistendosen' => 'asdos 1'
];

return view('biodata', $data);
```

Key array seperti `nama`, `nim`, dan `prodi` akan menjadi variabel di view, misalnya `$nama`, `$nim`, dan `$prodi`.

### 7.5 Mahasiswa Controller

File: `app/Controllers/Mahasiswa.php`

Controller ini mengatur CRUD data mahasiswa.

Method utama:

- `index()`: menampilkan semua data mahasiswa.
- `form()`: menampilkan form tambah data.
- `simpan()`: menyimpan data baru.
- `edit($nim)`: menampilkan form ubah data berdasarkan NIM.
- `update($nim)`: menyimpan perubahan data.
- `hapus($nim)`: menghapus data mahasiswa.
- `rules()`: mengatur validasi input.

Contoh method tampil data:

```php
public function index(): string
{
    return view('mahasiswa/index', [
        'mahasiswa' => $this->mahasiswaModel->orderBy('nim', 'ASC')->findAll(),
    ]);
}
```

Penjelasan:

Method ini mengambil semua data dari tabel `tb_mahasiswa`, mengurutkannya berdasarkan NIM, lalu mengirim data ke view `mahasiswa/index`.

## 8. Model

File: `app/Models/MahasiswaModel.php`

```php
<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'nim';
    protected $useAutoIncrement = false;
    protected $returnType = 'array';
    protected $allowedFields = ['nim', 'nama', 'prodi', 'universitas', 'no_hp'];
}
```

Penjelasan:

- `$table`: nama tabel yang digunakan.
- `$primaryKey`: primary key tabel, yaitu `nim`.
- `$useAutoIncrement`: dibuat `false` karena NIM diinput manual.
- `$returnType`: data dikembalikan dalam bentuk array.
- `$allowedFields`: daftar field yang boleh diisi saat insert dan update.

## 9. Database

Database yang digunakan:

```text
db_kampus
```

Tabel yang digunakan:

```text
tb_mahasiswa
```

Field tabel:

| Field | Tipe Data | Keterangan |
| --- | --- | --- |
| `nim` | `VARCHAR(20)` | Primary key |
| `nama` | `VARCHAR(100)` | Nama mahasiswa |
| `prodi` | `VARCHAR(100)` | Program studi |
| `universitas` | `VARCHAR(120)` | Nama universitas |
| `no_hp` | `VARCHAR(20)` | Nomor handphone |

SQL pembuatan database dan tabel:

```sql
CREATE DATABASE IF NOT EXISTS db_kampus;

USE db_kampus;

CREATE TABLE IF NOT EXISTS tb_mahasiswa (
    nim VARCHAR(20) NOT NULL,
    nama VARCHAR(100) NOT NULL,
    prodi VARCHAR(100) NOT NULL,
    universitas VARCHAR(120) NOT NULL,
    no_hp VARCHAR(20) NOT NULL,
    PRIMARY KEY (nim)
);
```

Contoh data awal:

```sql
INSERT INTO tb_mahasiswa (nim, nama, prodi, universitas, no_hp) VALUES
('32602400080', 'Nabila Anindya Hassya', 'Teknik Informatika', 'Universitas Islam Sultan Agung', '081234567890');
```

Contoh konfigurasi database di `.env`:

```ini
database.default.hostname = localhost
database.default.database = db_kampus
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

## 10. View

### 10.1 Layout Utama

File: `app/Views/layout/main.php`

Layout ini digunakan sebagai template utama. Di dalamnya terdapat:

- Struktur HTML dasar.
- Link Bootstrap.
- Link Google Fonts.
- Link Font Awesome.
- Link CSS custom.
- Navbar aplikasi.
- Render section content.

Potongan kode:

```php
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">

<main class="container page-container">
    <?= $this->renderSection('content') ?>
</main>
```

Penjelasan:

`renderSection('content')` digunakan agar setiap halaman dapat mengisi konten utama yang berbeda, tetapi tetap memakai layout yang sama.

### 10.2 Dashboard

File: `app/Views/dashboard.php`

Dashboard menampilkan menu utama untuk membuka:

- Profil Mahasiswa.
- Data Mahasiswa.
- Form Praktikum.
- Biodata Mahasiswa.

### 10.3 Form Praktikum

File: `app/Views/form_praktikum.php`

Form ini menggunakan method POST dan mengirim data ke route `praktikum/simpan`.

```php
<form class="student-form" action="<?= base_url('praktikum/simpan') ?>" method="post">
    <?= csrf_field() ?>
    ...
</form>
```

`csrf_field()` digunakan sebagai perlindungan keamanan form.

### 10.4 Hasil Praktikum

File: `app/Views/hasil_praktikum.php`

View ini menampilkan data hasil input dari form praktikum dalam bentuk tabel.

```php
<tr><th>Nama</th><td><?= esc($data['nama']) ?></td></tr>
<tr><th>NIM</th><td><?= esc($data['nim']) ?></td></tr>
```

Fungsi `esc()` digunakan untuk mengamankan output.

### 10.5 Biodata

File: `app/Views/biodata.php`

View ini menampilkan data dari controller `Biodata`.

```php
<tr><th>Nama</th><td><?= esc($nama) ?></td></tr>
<tr><th>NIM</th><td><?= esc($nim) ?></td></tr>
<tr><th>Program Studi</th><td><?= esc($prodi) ?></td></tr>
```

### 10.6 Daftar Mahasiswa

File: `app/Views/mahasiswa/index.php`

View ini menampilkan data mahasiswa dalam tabel dan menyediakan tombol:

- Tambah Data.
- Ubah.
- Hapus.

Potongan kode:

```php
<?php foreach ($mahasiswa as $row) : ?>
    <tr>
        <td><?= esc($row['nim']) ?></td>
        <td><?= esc($row['nama']) ?></td>
        <td><?= esc($row['prodi']) ?></td>
        <td><?= esc($row['universitas']) ?></td>
        <td><?= esc($row['no_hp']) ?></td>
    </tr>
<?php endforeach; ?>
```

### 10.7 Form Tambah dan Ubah Mahasiswa

File: `app/Views/mahasiswa/form.php`

Form ini digunakan untuk tambah dan ubah data. Tujuan submit ditentukan oleh variabel `$action`.

```php
<form class="student-form" action="<?= esc($action) ?>" method="post">
    <?= csrf_field() ?>
    ...
</form>
```

Fungsi `old()` digunakan agar data input tetap muncul ketika validasi gagal.

```php
value="<?= esc(old('nama', $mahasiswa['nama'] ?? '')) ?>"
```

## 11. Styling CSS

File CSS utama:

```text
public/css/style.css
```

Komponen styling:

- CSS variable pada `:root`.
- Universal selector `*`.
- Type selector seperti `body`, `a`, dan `h1`.
- Class selector seperti `.app-navbar`, `.content-card`, `.student-form`, dan `.data-table`.
- ID selector seperti `#biodata-card`.
- Attribute selector seperti `input[type="text"]`.
- Pseudo selector seperti `:hover`, `:focus`, dan `:nth-child(even)`.
- Media query untuk responsive design.

Contoh CSS variable:

```css
:root {
    --primary: #2563eb;
    --primary-dark: #1d4ed8;
    --accent: #0f766e;
    --ink: #172033;
    --muted: #64748b;
    --line: #dbe5f0;
}
```

Contoh responsive design:

```css
@media (max-width: 768px) {
    .app-navbar,
    .page-hero,
    .page-heading {
        align-items: flex-start;
        flex-direction: column;
    }

    .student-form {
        grid-template-columns: 1fr;
    }
}
```

Penjelasan:

Media query digunakan agar tampilan tetap nyaman pada layar kecil. Form yang sebelumnya bisa tampil dua kolom akan berubah menjadi satu kolom pada layar smartphone.

## 12. Alur CRUD Mahasiswa

### 12.1 Tampil Data

1. User membuka `/mahasiswa`.
2. Route mengarah ke `Mahasiswa::index`.
3. Controller mengambil data menggunakan `MahasiswaModel`.
4. Data dikirim ke view `mahasiswa/index`.
5. View menampilkan data dalam tabel.

### 12.2 Tambah Data

1. User membuka `/mahasiswa/form`.
2. User mengisi form.
3. Form dikirim ke `/mahasiswa/simpan`.
4. Controller melakukan validasi.
5. Jika valid, data disimpan ke database.
6. User diarahkan kembali ke halaman daftar mahasiswa.

### 12.3 Ubah Data

1. User menekan tombol Ubah.
2. URL mengarah ke `/mahasiswa/edit/{nim}`.
3. Controller mencari data berdasarkan NIM.
4. Data ditampilkan pada form.
5. User mengubah data dan menekan Simpan.
6. Data dikirim ke `/mahasiswa/update/{nim}`.
7. Controller memperbarui data pada database.

### 12.4 Hapus Data

1. User menekan tombol Hapus.
2. Form mengirim request POST ke `/mahasiswa/hapus/{nim}`.
3. Controller menghapus data berdasarkan NIM.
4. User diarahkan kembali ke halaman daftar mahasiswa.

## 13. Validasi dan Keamanan

Validasi input dilakukan pada controller `Mahasiswa`.

```php
return [
    'nim'         => $nimRules,
    'nama'        => 'required|min_length[3]|max_length[100]',
    'prodi'       => 'required|max_length[100]',
    'universitas' => 'required|max_length[120]',
    'no_hp'       => 'required|max_length[20]',
];
```

Keamanan yang digunakan:

- `csrf_field()` pada form POST.
- `esc()` untuk mengamankan output di view.
- `allowedFields` pada model agar hanya field tertentu yang dapat diisi.
- Validasi `is_unique` untuk mencegah NIM duplikat.

## 14. Screenshot yang Disarankan untuk Dokumentasi

Screenshot yang sebaiknya dimasukkan ke laporan:

1. Halaman dashboard.
2. Halaman profil mahasiswa.
3. Form praktikum.
4. Hasil input form praktikum.
5. Halaman biodata.
6. Tampilan responsive pada ukuran kecil.
7. Database `db_kampus` di DBeaver.
8. Struktur tabel `tb_mahasiswa`.
9. Halaman daftar data mahasiswa.
10. Halaman tambah data mahasiswa.
11. Data berhasil ditambahkan.
12. Halaman ubah data mahasiswa.
13. Data berhasil diubah.
14. Data berhasil dihapus.

## 15. Cara Pengujian Manual

1. Jalankan server:

```bash
php spark serve --port 8081
```

2. Buka dashboard:

```text
http://localhost:8081/
```

3. Uji form praktikum:

```text
http://localhost:8081/praktikum/form
```

4. Uji halaman biodata:

```text
http://localhost:8081/biodata
```

5. Uji CRUD mahasiswa:

```text
http://localhost:8081/mahasiswa
```

6. Lakukan tambah, ubah, dan hapus data mahasiswa.

## 16. Kesimpulan

Project ini menunjukkan penerapan dasar CodeIgniter 4 dalam membangun aplikasi web dengan pola MVC. Setiap fitur dikembangkan secara bertahap, mulai dari routing, controller, view, styling CSS, sampai integrasi database MySQL. Dengan adanya CRUD mahasiswa, aplikasi sudah mampu mengelola data melalui fitur tambah, tampil, ubah, dan hapus. Penggunaan CSS, Bootstrap, Google Fonts, dan Font Awesome membuat tampilan aplikasi lebih rapi, menarik, dan responsif.
