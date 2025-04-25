# Fullstack User API – PT Rimba Ananta Vikasa Indonesia

RESTful API sederhana untuk manajemen data User. Dibuat menggunakan **Laravel + MySQL** untuk backend dan **Vanilla JS + HTML** untuk frontend.

## Instruksi Instalasi

1. **Clone repository**
   ```bash
   git clone https://github.com/ardanwungkul/rimba.git
   cd backend_laravel

2. **Install dependencies Untuk menginstall semua dependency Laravel**
    ```bash
    composer install

3. **Salin file konfigurasi**
    ```bash
    cp .env.example .env

4. **Atur Database dengan Edit file .env**
    ```ini
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=laravel
    DB_USERNAME=root
    DB_PASSWORD=

5. **Generate Key Application**
    ```bash
    php artisan key:generate

6. **Jalankan Migrasi Database**
    ```bash
    php artisan migrate

## Jalankan Aplikasi Laravel
    php artisan serve

# Penjelasan Arsitektur & Alur Kerja API
### Arsitektur (MVC – Model, View, Controller)
    Aplikasi dibangun dengan arsitektur **MVC** menggunakan Laravel. Alur utamanya seperti ini:

    Request (AJAX/HTTP)
    ↓
    Route (routes/web.php)
    ↓ 
    Controller (App\Http\Controllers\Api\UserController) 
    ↓ 
    Validasi + Proses Data
    ↓ 
    Model (App\Models\User) 
    ↓ 
    Database (MySQL) 
    ↓ 
    Response (JSON)

### Komponen Utama

| Komponen        | Fungsi                                                                 |
|-----------------|------------------------------------------------------------------------|
| **Route**        | Mendefinisikan endpoint API (`/users`) di `routes/web.php`.            |
| **Controller**   | Mengelola request dan response (CRUD) di `UserController.php`.         |
| **Model**        | Mewakili data `user` di database (`User.php`).                         |
| **Middleware**   | `log.request` mencatat semua request ke `storage/logs/log.txt`.    |
| **Validator**    | Mengecek input pengguna saat create/update.                           |
| **Log**          | Semua request dicatat otomatis sebagai file log.                       |
| **Testing**      | `tests/Feature/UserApiTest.php` menguji fungsi dan integrasi API.         |

### Alur CRUD API

1. **Frontend** mengirimkan request menggunakan `fetch` (AJAX).
2. **Middleware** mencatat semua request.
3. **Route** meneruskan ke controller sesuai HTTP method.
4. **Controller**:
   - Melakukan validasi.
   - Menyimpan/mengubah/menghapus data lewat **Model**.
5. **Model** berinteraksi langsung dengan database (tabel `user`).
6. **Response** dikembalikan dalam bentuk JSON.

### Testing
    ```bash
    php artisan test