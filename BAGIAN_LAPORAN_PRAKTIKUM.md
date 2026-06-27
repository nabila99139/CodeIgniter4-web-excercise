# Bagian Laporan Praktikum

## Pertemuan 1

### Langkah-Langkah Pengerjaan

Pertemuan 1 dikerjakan secara mandiri. Bagian ini dapat diisi sesuai kegiatan awal yang dilakukan, misalnya instalasi dan pengenalan project CodeIgniter 4, menjalankan server lokal, serta mencoba halaman awal aplikasi.

Contoh langkah yang dapat ditulis:

1. Menyiapkan project CodeIgniter 4.
2. Membuka project menggunakan editor kode.
3. Menjalankan server lokal menggunakan perintah:

```bash
php spark serve
```

4. Membuka project melalui browser.
5. Mempelajari struktur folder utama CodeIgniter 4 seperti `app`, `public`, `writable`, dan `vendor`.

### Source Code Penting

Contoh file awal CodeIgniter yang digunakan sebagai halaman utama:

```php
<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view('dashboard');
    }
}
```

### Analisis/Penjelasan Kode

Controller `Home` digunakan sebagai controller utama yang menangani halaman awal aplikasi. Method `index()` akan dijalankan ketika user membuka route utama `/`. Pada method tersebut, CodeIgniter memanggil view `dashboard`, sehingga tampilan halaman utama dipisahkan dari logika controller. Pemisahan ini sesuai konsep MVC, yaitu controller mengatur alur program, sedangkan view bertugas menampilkan halaman.

---

## Pertemuan 2 - Routes dan Controller Berbasis Form POST

### Langkah-Langkah Pengerjaan

1. Membuat route untuk menampilkan form praktikum menggunakan method `GET`.
2. Membuat route untuk menerima data form menggunakan method `POST`.
3. Membuat controller `Praktikum`.
4. Membuat method `form()` untuk menampilkan halaman form.
5. Membuat method `simpan()` untuk mengambil data dari form.
6. Membuat view `form_praktikum.php` sebagai halaman input data.
7. Membuat view `hasil_praktikum.php` untuk menampilkan data yang telah dikirim.
8. Menguji form dengan mengisi nama, NIM, kelas, mata kuliah, dosen pengampu, dan asisten praktikum.
9. Mengambil screenshot halaman form dan hasil input untuk dokumentasi.

### Source Code Penting 1 - Route Praktikum

```php
$routes->get('praktikum/form', 'Praktikum::form');
$routes->post('praktikum/simpan', 'Praktikum::simpan');
```

### Analisis/Penjelasan Kode

Route pertama menggunakan method `GET` untuk membuka halaman form praktikum. Route kedua menggunakan method `POST` untuk menerima data yang dikirim dari form. Dengan pemisahan ini, proses menampilkan form dan proses menyimpan/memproses data menjadi lebih jelas. Route `praktikum/form` diarahkan ke method `form()`, sedangkan route `praktikum/simpan` diarahkan ke method `simpan()`.

### Source Code Penting 2 - Controller Praktikum

```php
<?php

namespace App\Controllers;

class Praktikum extends BaseController
{
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
}
```

### Analisis/Penjelasan Kode

Controller `Praktikum` berfungsi mengatur proses input dan output data praktikum. Method `form()` hanya menampilkan view form. Method `simpan()` mengambil data yang dikirim melalui form menggunakan `$this->request->getPost()`. Data yang diambil disimpan dalam array `$data`, kemudian dikirim ke view `hasil_praktikum` agar bisa ditampilkan kepada user.

### Source Code Penting 3 - Form POST

```php
<form class="student-form" action="<?= base_url('praktikum/simpan') ?>" method="post">
    <?= csrf_field() ?>

    <input type="text" class="form-control" id="nama" name="nama" required>
    <input type="text" class="form-control" id="nim" name="nim" required>
    <input type="text" class="form-control" id="kelas" name="kelas" required>
    <input type="text" class="form-control" id="matakuliah" name="matakuliah" required>
    <input type="text" class="form-control" id="dosen_pengampu" name="dosen_pengampu" required>
    <input type="text" class="form-control" id="asisten_praktikum" name="asisten_praktikum" required>

    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
```

### Analisis/Penjelasan Kode

Form menggunakan method `POST` karena data dikirim ke server untuk diproses. Atribut `name` pada setiap input harus sesuai dengan nama yang diambil pada controller, misalnya input `name="nama"` dibaca dengan `getPost('nama')`. Fungsi `csrf_field()` digunakan untuk keamanan agar form terlindungi dari serangan CSRF.

### Source Code Penting 4 - Menampilkan Hasil Form

```php
<tr><th>Nama</th><td><?= esc($data['nama']) ?></td></tr>
<tr><th>NIM</th><td><?= esc($data['nim']) ?></td></tr>
<tr><th>Kelas</th><td><?= esc($data['kelas']) ?></td></tr>
<tr><th>Mata Kuliah</th><td><?= esc($data['matakuliah']) ?></td></tr>
<tr><th>Dosen Pengampu</th><td><?= esc($data['dosen_pengampu']) ?></td></tr>
<tr><th>Asisten Praktikum</th><td><?= esc($data['asisten_praktikum']) ?></td></tr>
```

### Analisis/Penjelasan Kode

Data yang dikirim dari controller ditampilkan dalam bentuk tabel. Fungsi `esc()` digunakan untuk mengamankan output agar data yang tampil di halaman tidak langsung dianggap sebagai kode HTML. Ini penting untuk mencegah masalah keamanan seperti XSS.

---

## Pertemuan 3 - View HTML dan Pengiriman Data dari Controller ke View

### Langkah-Langkah Pengerjaan

1. Membuat controller `Biodata`.
2. Membuat method `index()` pada controller.
3. Menyiapkan data biodata mahasiswa dalam bentuk array.
4. Mengirim array data dari controller ke view menggunakan `return view('biodata', $data)`.
5. Membuat view `biodata.php`.
6. Menampilkan data biodata pada halaman web menggunakan HTML.
7. Menambahkan route `/biodata` agar halaman dapat diakses dari browser.
8. Menguji halaman biodata dan mengambil screenshot hasil tampilan.

### Source Code Penting 1 - Route Biodata

```php
$routes->get('biodata', 'Biodata::index');
```

### Analisis/Penjelasan Kode

Route ini digunakan untuk menghubungkan URL `/biodata` dengan controller `Biodata` method `index()`. Saat user membuka URL tersebut, CodeIgniter akan menjalankan method `index()` dan menampilkan halaman biodata.

### Source Code Penting 2 - Controller Biodata

```php
<?php

namespace App\Controllers;

class Biodata extends BaseController
{
    public function index(): string
    {
        $data = [
            'nama'       => 'Nabila Anindya Hassya',
            'nim'        => '32602400080',
            'prodi'      => 'Teknik Informatika',
            'matakuliah' => 'Web Programming',
            'dosen'      => 'dosen 1',
            'asistendosen' => 'asdos 1'
        ];

        return view('biodata', $data);
    }
}
```

### Analisis/Penjelasan Kode

Controller `Biodata` menyiapkan data mahasiswa dalam array `$data`. Key array seperti `nama`, `nim`, dan `prodi` akan otomatis menjadi variabel yang dapat digunakan di view. Contohnya, key `nama` dapat dipanggil di view sebagai `$nama`. Dengan cara ini, controller bertugas menyediakan data, sedangkan view bertugas menampilkan data.

### Source Code Penting 3 - View Biodata

```php
<table class="table data-table">
    <tbody>
        <tr><th>Nama</th><td><?= esc($nama) ?></td></tr>
        <tr><th>NIM</th><td><?= esc($nim) ?></td></tr>
        <tr><th>Mata Kuliah</th><td><?= esc($matakuliah) ?></td></tr>
        <tr><th>Program Studi</th><td><?= esc($prodi) ?></td></tr>
    </tbody>
</table>
```

### Analisis/Penjelasan Kode

View `biodata.php` menerima data dari controller dan menampilkannya ke dalam tabel HTML. Variabel seperti `$nama`, `$nim`, `$matakuliah`, dan `$prodi` berasal dari array `$data` pada controller. Fungsi `esc()` tetap digunakan agar data yang tampil aman.

---

## Pertemuan 4 - Styling CSS, Google Fonts, Font Awesome, dan Responsive Design

### Langkah-Langkah Pengerjaan

1. Melanjutkan project dari pertemuan sebelumnya.
2. Membuat atau memperbarui file CSS eksternal di `public/css/style.css`.
3. Menghubungkan file CSS ke layout utama CodeIgniter.
4. Menambahkan Google Fonts agar tampilan teks lebih menarik.
5. Menambahkan Font Awesome untuk penggunaan icon.
6. Membuat layout utama pada `app/Views/layout/main.php`.
7. Mengatur tampilan halaman dashboard, form, tabel, tombol, dan navbar.
8. Menambahkan responsive design menggunakan media query.
9. Menguji tampilan pada ukuran desktop, tablet, dan smartphone.
10. Mengambil screenshot hasil tampilan program.

### Source Code Penting 1 - Menghubungkan CSS, Google Fonts, dan Font Awesome

```php
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
```

### Analisis/Penjelasan Kode

Kode tersebut berada pada layout utama `main.php`. Google Fonts digunakan untuk font `Poppins`, Font Awesome digunakan untuk icon, Bootstrap digunakan sebagai framework CSS dasar, dan `style.css` digunakan sebagai CSS custom project. File `style.css` diletakkan setelah Bootstrap agar style custom dapat menimpa style bawaan Bootstrap jika diperlukan.

### Source Code Penting 2 - Layout Navbar

```php
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
```

### Analisis/Penjelasan Kode

Navbar digunakan sebagai navigasi utama antar halaman. Fungsi `base_url()` digunakan agar URL yang dibuat mengikuti konfigurasi base URL pada CodeIgniter. Icon dari Font Awesome digunakan pada bagian brand agar tampilan lebih menarik.

### Source Code Penting 3 - CSS Variable, Selector, dan Styling Dasar

```css
* {
    box-sizing: border-box;
}

:root {
    --primary: #2563eb;
    --primary-dark: #1d4ed8;
    --accent: #0f766e;
    --ink: #172033;
    --muted: #64748b;
    --line: #dbe5f0;
    --shadow: 0 18px 40px rgba(15, 23, 42, 0.12);
}

body {
    margin: 0;
    min-height: 100vh;
    color: var(--ink);
    font-family: "Poppins", Arial, sans-serif;
    background: linear-gradient(135deg, #f8fbff 0%, #eef6ff 52%, #f7fafc 100%);
}
```

### Analisis/Penjelasan Kode

Universal selector `*` digunakan untuk mengatur `box-sizing` agar ukuran elemen lebih mudah dikontrol. Selector `:root` digunakan untuk menyimpan CSS variable seperti warna utama, warna teks, dan shadow. Selector `body` mengatur font, warna dasar, dan background halaman. Konsep inheritance terlihat karena font dan warna dari `body` diwariskan ke elemen di dalamnya.

### Source Code Penting 4 - Class Selector dan Pseudo Selector

```css
.feature-card {
    transition: transform 180ms ease, box-shadow 180ms ease, border-color 180ms ease;
}

.feature-card:hover {
    transform: translateY(-4px);
    border-color: #93c5fd;
    box-shadow: 0 24px 48px rgba(37, 99, 235, 0.15);
}

.nav-links a:hover,
.nav-links a:focus {
    color: var(--primary);
    background: var(--soft);
}
```

### Analisis/Penjelasan Kode

Class selector `.feature-card` digunakan untuk mengatur card pada dashboard. Pseudo selector `:hover` digunakan untuk memberikan efek ketika kursor diarahkan ke card. Pseudo selector `:focus` pada link navigasi membantu aksesibilitas saat user berpindah menggunakan keyboard.

### Source Code Penting 5 - Responsive Design

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

    h1 {
        font-size: 2rem;
    }
}
```

### Analisis/Penjelasan Kode

Media query digunakan agar tampilan menyesuaikan ukuran layar. Pada layar kecil, navbar dan hero dibuat vertikal agar tidak saling bertabrakan. Form yang pada layar besar dapat tampil dua kolom diubah menjadi satu kolom supaya nyaman digunakan di smartphone.

### Source Code Penting 6 - Embedded dan Inline CSS

```php
<?= $this->section('styles') ?>
    <style>
        #biodata-card {
            border-top: 5px solid #0ea5e9;
        }

        .biodata-note::before {
            content: "CSS";
            font-weight: 700;
            color: #0369a1;
            margin-right: 8px;
        }
    </style>
<?= $this->endSection() ?>
```

```php
<span class="hero-badge" style="background-color: #ecfeff;">
```

### Analisis/Penjelasan Kode

Embedded CSS digunakan di dalam view `biodata.php` melalui tag `<style>`. ID selector `#biodata-card` digunakan untuk memberi border khusus pada card biodata. Pseudo element `::before` digunakan untuk menambahkan teks sebelum elemen tanpa menulisnya langsung di HTML. Inline CSS digunakan pada elemen `hero-badge` untuk memberi warna background secara langsung.

---

## Pertemuan 5 - Database MySQL dan CRUD Mahasiswa

### Langkah-Langkah Pengerjaan

1. Membuat database `db_kampus` menggunakan MySQL melalui DBeaver.
2. Membuat tabel `tb_mahasiswa`.
3. Menambahkan field `nim`, `nama`, `prodi`, `universitas`, dan `no_hp`.
4. Mengatur koneksi database CodeIgniter 4 melalui file `.env`.
5. Membuat model `MahasiswaModel` untuk mengelola tabel `tb_mahasiswa`.
6. Membuat controller `Mahasiswa`.
7. Membuat method untuk menampilkan data, tambah data, simpan data, edit data, update data, dan hapus data.
8. Membuat route CRUD pada `Routes.php`.
9. Membuat view daftar data mahasiswa.
10. Membuat view form tambah dan ubah data mahasiswa.
11. Menguji fitur tambah, tampil, ubah, dan hapus.
12. Mengambil screenshot database, halaman daftar data, form tambah, hasil tambah, form ubah, hasil ubah, dan hasil hapus.

### Source Code Penting 1 - SQL Database dan Tabel

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

### Analisis/Penjelasan Kode

Database diberi nama `db_kampus`. Tabel `tb_mahasiswa` digunakan untuk menyimpan data mahasiswa. Field `nim` dijadikan primary key karena NIM bersifat unik untuk setiap mahasiswa. Field lain seperti `nama`, `prodi`, `universitas`, dan `no_hp` digunakan untuk melengkapi data sesuai kebutuhan tugas praktikum.

### Source Code Penting 2 - Konfigurasi Database di `.env`

```ini
database.default.hostname = localhost
database.default.database = db_kampus
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

### Analisis/Penjelasan Kode

Konfigurasi tersebut digunakan untuk menghubungkan CodeIgniter 4 dengan database MySQL. `hostname` menunjukkan server database, `database` menunjukkan nama database yang digunakan, `username` dan `password` digunakan untuk autentikasi, `DBDriver` menggunakan `MySQLi`, dan `port` default MySQL adalah `3306`.

### Source Code Penting 3 - Model Mahasiswa

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

### Analisis/Penjelasan Kode

Model `MahasiswaModel` digunakan untuk menghubungkan aplikasi dengan tabel `tb_mahasiswa`. Primary key yang digunakan adalah `nim`, sehingga `useAutoIncrement` dibuat `false` karena NIM bukan angka otomatis dari database. Properti `allowedFields` menentukan field mana saja yang boleh diisi melalui proses insert dan update. Ini membantu menjaga keamanan agar field di luar daftar tersebut tidak sembarang dimasukkan.

### Source Code Penting 4 - Route CRUD Mahasiswa

```php
$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->get('mahasiswa/form', 'Mahasiswa::form');
$routes->post('mahasiswa/simpan', 'Mahasiswa::simpan');
$routes->get('mahasiswa/edit/(:segment)', 'Mahasiswa::edit/$1');
$routes->post('mahasiswa/update/(:segment)', 'Mahasiswa::update/$1');
$routes->post('mahasiswa/hapus/(:segment)', 'Mahasiswa::hapus/$1');
```

### Analisis/Penjelasan Kode

Route CRUD digunakan untuk mengatur alamat URL setiap fitur. Route `mahasiswa` digunakan untuk menampilkan data. Route `mahasiswa/form` digunakan untuk form tambah. Route `mahasiswa/simpan` digunakan untuk menyimpan data baru. Route `mahasiswa/edit/(:segment)` mengambil NIM dari URL untuk mencari data yang akan diedit. Route `mahasiswa/update/(:segment)` menyimpan perubahan data, sedangkan `mahasiswa/hapus/(:segment)` menghapus data berdasarkan NIM.

### Source Code Penting 5 - Menampilkan Data Mahasiswa

```php
public function index(): string
{
    return view('mahasiswa/index', [
        'mahasiswa' => $this->mahasiswaModel->orderBy('nim', 'ASC')->findAll(),
    ]);
}
```

### Analisis/Penjelasan Kode

Method `index()` mengambil seluruh data mahasiswa dari database menggunakan `findAll()`. Data diurutkan berdasarkan NIM secara ascending menggunakan `orderBy('nim', 'ASC')`. Setelah itu data dikirim ke view `mahasiswa/index` agar dapat ditampilkan dalam tabel.

### Source Code Penting 6 - Menambah Data Mahasiswa

```php
public function simpan()
{
    if (! $this->validate($this->rules())) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $data = [
        'nim'         => $this->request->getPost('nim'),
        'nama'        => $this->request->getPost('nama'),
        'prodi'       => $this->request->getPost('prodi'),
        'universitas' => $this->request->getPost('universitas'),
        'no_hp'       => $this->request->getPost('no_hp'),
    ];

    $this->mahasiswaModel->insert($data);

    return redirect()->to(base_url('mahasiswa'))->with('pesan', 'Data mahasiswa berhasil ditambahkan.');
}
```

### Analisis/Penjelasan Kode

Method `simpan()` digunakan untuk menambahkan data baru. Sebelum data disimpan, validasi dijalankan terlebih dahulu. Jika validasi gagal, user dikembalikan ke form dengan input sebelumnya. Jika validasi berhasil, data dari form diambil menggunakan `getPost()`, lalu disimpan ke database menggunakan `$this->mahasiswaModel->insert($data)`.

### Source Code Penting 7 - Mengubah Data Mahasiswa

```php
public function edit(string $nim): string
{
    $mahasiswa = $this->mahasiswaModel->find($nim);

    if (! $mahasiswa) {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Data mahasiswa tidak ditemukan.');
    }

    return view('mahasiswa/form', [
        'title'      => 'Ubah Mahasiswa',
        'action'     => base_url('mahasiswa/update/' . $nim),
        'mahasiswa'  => $mahasiswa,
        'validation' => session('validation'),
    ]);
}

public function update(string $nim)
{
    if (! $this->validate($this->rules($nim))) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $data = [
        'nim'         => $this->request->getPost('nim'),
        'nama'        => $this->request->getPost('nama'),
        'prodi'       => $this->request->getPost('prodi'),
        'universitas' => $this->request->getPost('universitas'),
        'no_hp'       => $this->request->getPost('no_hp'),
    ];

    $this->mahasiswaModel->update($nim, $data);

    return redirect()->to(base_url('mahasiswa'))->with('pesan', 'Data mahasiswa berhasil diubah.');
}
```

### Analisis/Penjelasan Kode

Method `edit()` mencari data mahasiswa berdasarkan NIM. Jika data ditemukan, data dikirim ke view form agar field otomatis terisi. Method `update()` digunakan untuk menyimpan perubahan data. Setelah validasi berhasil, data baru diambil dari form dan diperbarui menggunakan `$this->mahasiswaModel->update($nim, $data)`.

### Source Code Penting 8 - Menghapus Data Mahasiswa

```php
public function hapus(string $nim)
{
    $this->mahasiswaModel->delete($nim);

    return redirect()->to(base_url('mahasiswa'))->with('pesan', 'Data mahasiswa berhasil dihapus.');
}
```

### Analisis/Penjelasan Kode

Method `hapus()` digunakan untuk menghapus data mahasiswa berdasarkan NIM. Setelah data dihapus, user diarahkan kembali ke halaman daftar mahasiswa dan ditampilkan pesan bahwa data berhasil dihapus.

### Source Code Penting 9 - Validasi Data

```php
private function rules(?string $oldNim = null): array
{
    $nimRules = 'required|min_length[3]|max_length[20]';

    if ($oldNim === null || $this->request->getPost('nim') !== $oldNim) {
        $nimRules .= '|is_unique[tb_mahasiswa.nim]';
    }

    return [
        'nim'         => $nimRules,
        'nama'        => 'required|min_length[3]|max_length[100]',
        'prodi'       => 'required|max_length[100]',
        'universitas' => 'required|max_length[120]',
        'no_hp'       => 'required|max_length[20]',
    ];
}
```

### Analisis/Penjelasan Kode

Method `rules()` berisi aturan validasi untuk input mahasiswa. Field `nim`, `nama`, `prodi`, `universitas`, dan `no_hp` wajib diisi. NIM juga dicek agar unik pada tabel `tb_mahasiswa`. Saat proses update, pengecekan unik disesuaikan agar NIM lama tidak dianggap duplikat jika tidak diubah.

### Source Code Penting 10 - View Tabel Data Mahasiswa

```php
<?php foreach ($mahasiswa as $row) : ?>
    <tr>
        <td><?= esc($row['nim']) ?></td>
        <td><?= esc($row['nama']) ?></td>
        <td><?= esc($row['prodi']) ?></td>
        <td><?= esc($row['universitas']) ?></td>
        <td><?= esc($row['no_hp']) ?></td>
        <td>
            <a href="<?= base_url('mahasiswa/edit/' . $row['nim']) ?>" class="btn btn-warning btn-sm">Ubah</a>
            <form action="<?= base_url('mahasiswa/hapus/' . $row['nim']) ?>" method="post">
                <?= csrf_field() ?>
                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
            </form>
        </td>
    </tr>
<?php endforeach; ?>
```

### Analisis/Penjelasan Kode

View melakukan perulangan terhadap data mahasiswa menggunakan `foreach`. Setiap data ditampilkan dalam satu baris tabel. Tombol `Ubah` mengarah ke halaman edit berdasarkan NIM, sedangkan tombol `Hapus` mengirim request POST ke route hapus. Fungsi `csrf_field()` tetap digunakan pada form hapus untuk menjaga keamanan.

### Source Code Penting 11 - View Form Tambah/Ubah

```php
<form class="student-form" action="<?= esc($action) ?>" method="post">
    <?= csrf_field() ?>

    <input type="text" class="form-control" id="nim" name="nim" value="<?= esc(old('nim', $mahasiswa['nim'] ?? '')) ?>" required>
    <input type="text" class="form-control" id="nama" name="nama" value="<?= esc(old('nama', $mahasiswa['nama'] ?? '')) ?>" required>
    <input type="text" class="form-control" id="prodi" name="prodi" value="<?= esc(old('prodi', $mahasiswa['prodi'] ?? '')) ?>" required>
    <input type="text" class="form-control" id="universitas" name="universitas" value="<?= esc(old('universitas', $mahasiswa['universitas'] ?? '')) ?>" required>
    <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= esc(old('no_hp', $mahasiswa['no_hp'] ?? '')) ?>" required>

    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
```

### Analisis/Penjelasan Kode

Form ini digunakan untuk dua kebutuhan, yaitu tambah dan ubah data. Variabel `$action` menentukan tujuan submit form. Fungsi `old()` digunakan agar input sebelumnya tetap muncul ketika validasi gagal. Jika sedang mengubah data, nilai default diambil dari array `$mahasiswa`. Fungsi `esc()` digunakan agar nilai input tetap aman ketika ditampilkan kembali.

---

## Kesimpulan Singkat untuk Bagian Pembahasan

Berdasarkan praktikum yang dilakukan, project CodeIgniter 4 berhasil dikembangkan secara bertahap mulai dari pengenalan route dan controller, pembuatan view, pengiriman data dari controller ke view, styling halaman menggunakan CSS, hingga integrasi database MySQL dan CRUD mahasiswa. Konsep MVC pada CodeIgniter 4 memudahkan pemisahan antara logika program, tampilan, dan pengelolaan data. Fitur CRUD mahasiswa menunjukkan bahwa aplikasi sudah dapat melakukan proses tambah, tampil, ubah, dan hapus data dari database.
