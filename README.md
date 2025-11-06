# 🛍️ Mini E-Commerce — Backend (Laravel API)

Project ini merupakan bagian backend dari **Mini E-Commerce App**, yang dibangun menggunakan **Laravel 10** dengan **MySQL/MariaDB** sebagai database.

---

## ⚙️ Persyaratan Sistem

Sebelum menjalankan proyek ini, pastikan Anda telah menginstal:

- **PHP** ≥ 8.1
- **Composer**
- **MySQL / MariaDB** (atau **SQLite** sebagai alternatif)
- **Git**

---

## 🚀 Langkah Instalasi

### 1. Clone Repository

```bash
git clone <repo-url> mini-ecommerce
cd mini-ecommerce/backend


2. Install Dependencies
composer install

3. Konfigurasi Environment

Salin file .env.example menjadi .env:

cp .env.example .env

Lalu jalankan
php artisan key:generate
php artisan migrate
php artisan db:seed

# run 
php artisan dev



Berikut contoh konfigurasi dasar:

APP_NAME=MiniCommerce
APP_ENV=local
APP_KEY=base64:...(otomatis dari php artisan key:generate)
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

# Database Configuration
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=8889
DB_DATABASE=be_mini_ecommerce
DB_USERNAME=root
DB_PASSWORD=
DB_SOCKET=/Applications/MAMP/tmp/mysql/mysql.sock
SESSION_DRIVER=file

# CORS Origins
FRONTEND_URL=http://localhost:5173     # React Web (Vite)
MOBILE_URL=http://localhost            # React Native (Expo)
