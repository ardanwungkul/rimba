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
    DB_DATABASE=user
    DB_USERNAME=root
    DB_PASSWORD=your_password

5. **Generate Key Application**
    ```bash
    php artisan key:generate

6. **Jalankan Migrasi Database**
    ```bash
    php artisan migrate

7. **Jalankan Server Laravel**
    ```bash
    php artisan serve