# Aplikasi Manajemen Sekolah - Tes Koding

Aplikasi web sederhana untuk manajemen data sekolah yang mencakup data Kelas, Guru, dan Siswa. Aplikasi ini dibangun sebagai bagian dari proses seleksi dengan fokus pada fungsionalitas backend dan frontend yang interaktif.

## Teknologi & Library yang Digunakan
* **Framework Backend**: Laravel 11
* **UI Framework**: Livewire 3
* **Database**: SQLite
* **Styling**: Tailwind CSS
* **JavaScript**: Alpine.js (bawaan Livewire/Breeze)
* **Otentikasi**: Laravel Breeze

---
## Fitur
* Sistem Otentikasi Pengguna (Login & Registrasi).
* Manajemen Data Kelas (CRUD - Create, Read, Update, Delete).
* Manajemen Data Guru (CRUD - Create, Read, Update, Delete).
* Manajemen Data Siswa (CRUD - Create, Read, Update, Delete).
* Kemampuan untuk menetapkan Guru ke beberapa Kelas (Relasi Many-to-Many).
* Fitur filter untuk menampilkan Guru berdasarkan Kelas yang diajar.
* Halaman ringkasan untuk menampilkan semua daftar data (Siswa, Kelas, Guru).

---
## Instalasi & Setup

Berikut adalah langkah-langkah untuk menjalankan proyek ini di lingkungan lokal.

1.  **Clone repositori ini:**
    ```bash
    git clone [https://github.com/pangdamsetiawan/digitamaze-coding-test]
    cd nama-folder-proyek
    ```

2.  **Install dependensi PHP:**
    ```bash
    composer install
    ```

3.  **Buat file environment:**
    Salin file `.env.example` menjadi `.env`.
    ```bash
    cp .env.example .env
    ```

4.  **Generate application key:**
    ```bash
    php artisan key:generate
    ```

5.  **Buat file database SQLite:**
    ```bash
    touch database/database.sqlite
    ```

6.  **Install dependensi JavaScript/NPM:**
    ```bash
    npm install
    ```

7.  **Jalankan migrasi dan seeder:**
    Perintah ini akan membuat semua tabel dan mengisinya dengan data contoh dari seeder Anda.
    ```bash
    php artisan migrate:fresh --seed
    ```

8.  **Jalankan server:**
    Anda perlu menjalankan dua server secara bersamaan di **dua terminal terpisah**.

    * Di terminal pertama, jalankan Vite untuk frontend:
        ```bash
        npm run dev
        ```
    * Di terminal kedua, jalankan server Laravel:
        ```bash
        php artisan serve
        ```

9.  **Akses Aplikasi:**
    Buka browser Anda dan kunjungi `http://127.0.0.1:8000`.

---
## Akun Demo

Gunakan akun di bawah ini untuk login. Akun ini dibuat melalui `UserSeeder`.

* **Email:** `tes@example.com`
* **Password:** `password123`
