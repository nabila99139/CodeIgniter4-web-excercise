# Panduan Clone dan Menjalankan Project

Panduan ini digunakan untuk menjalankan project CodeIgniter 4 setelah repository di-clone dari GitHub.

## 1. Prasyarat

Pastikan perangkat sudah memiliki:

- PHP 7.4 atau lebih baru.
- Composer.
- MySQL atau MariaDB.
- DBeaver untuk mengelola database.
- Git.

## 2. Clone Repository

```bash
git clone <url-repository-github>
cd CI4WebPraktikum
```

Ganti `<url-repository-github>` dengan URL repository GitHub project.

## 3. Install Dependency Composer

Folder `vendor/` tidak dimasukkan ke repository karena ukurannya besar dan dapat dibuat ulang.

Jalankan:

```bash
composer install
```

Jika dependency sudah pernah ada dan ingin memperbarui sesuai `composer.lock`, tetap gunakan `composer install`, bukan `composer update`.

## 4. Membuat File `.env`

File `.env` tidak dimasukkan ke repository karena berisi konfigurasi lokal dan bisa berisi data sensitif.

Salin template:

```bash
copy .env.example .env
```

Jika menggunakan Git Bash/Linux/macOS:

```bash
cp .env.example .env
```

Isi contoh `.env`:

```ini
CI_ENVIRONMENT = development

app.baseURL = 'http://localhost:8081/'

database.default.hostname = localhost
database.default.database = db_kampus
database.default.username = root
database.default.password =
database.default.DBDriver = MySQLi
database.default.port = 3306
```

Sesuaikan `username`, `password`, dan `port` dengan MySQL lokal masing-masing.

## 5. Membuat Database di DBeaver

1. Buka DBeaver.
2. Buat koneksi ke MySQL lokal.
3. Buka file:

```text
database/db_kampus.sql
```

4. Jalankan seluruh query SQL.
5. Pastikan database `db_kampus` dan tabel `tb_mahasiswa` berhasil dibuat.

Isi tabel:

```text
tb_mahasiswa
```

Field:

- `nim`
- `nama`
- `prodi`
- `universitas`
- `no_hp`

## 6. Menjalankan Server

Jalankan:

```bash
php spark serve --port 8081
```

Buka browser:

```text
http://localhost:8081/
```

## 7. URL Penting

```text
http://localhost:8081/
http://localhost:8081/profil
http://localhost:8081/praktikum/form
http://localhost:8081/biodata
http://localhost:8081/mahasiswa
http://localhost:8081/mahasiswa/form
```

## 8. Pengujian CRUD Mahasiswa

1. Buka `http://localhost:8081/mahasiswa`.
2. Klik tombol Tambah Data.
3. Isi NIM, Nama, Prodi, Universitas, dan Nomor Handphone.
4. Klik Simpan.
5. Pastikan data muncul di tabel.
6. Klik Ubah untuk mengedit data.
7. Klik Hapus untuk menghapus data.

## 9. Troubleshooting

### Halaman database error

Periksa konfigurasi `.env`:

- Nama database harus `db_kampus`.
- MySQL harus menyala.
- Username dan password harus sesuai.
- Driver menggunakan `MySQLi`.

### Command `composer` tidak dikenal

Composer belum terinstall atau belum masuk ke PATH. Install Composer terlebih dahulu.

### Port 8081 sudah digunakan

Gunakan port lain:

```bash
php spark serve --port 8082
```

Lalu sesuaikan `app.baseURL` di `.env`:

```ini
app.baseURL = 'http://localhost:8082/'
```

### CSS tidak muncul

Pastikan server dijalankan dari root project dan file berikut ada:

```text
public/css/style.css
```

## 10. Catatan Git

File yang tidak boleh di-commit:

- `.env`
- `vendor/`
- file log di `writable/`
- cache/session/debugbar runtime
- konfigurasi lokal editor atau assistant seperti `.claude/`, `.codex/`, dan `.agents/`

File yang boleh di-commit:

- `.env.example`
- `composer.json`
- `composer.lock`
- source code di folder `app/`
- asset di folder `public/`
- SQL schema `database/db_kampus.sql`
