# Ujikom Laravel 12 - Admin Produk + Landing Page

Project ini berisi:
- Seksi A (wajib): Admin panel produk (tanpa login) + CRUD + upload thumbnail
- Seksi B (tambahan): Landing page dan detail produk

Data awal wajib hanya 3 produk sesuai soal.

## 1) Prasyarat

- PHP 8.2+ (disarankan 8.3)
- Composer
- Node.js 18+ dan npm
- MySQL

## 2) Install Dependency

```bash
composer install
npm install
```

## 3) Konfigurasi Environment

Copy `.env` jika belum ada:

```bash
cp .env.example .env
```

Generate key:

```bash
php artisan key:generate
```

Set koneksi database di `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ujikom_test
DB_USERNAME=root
DB_PASSWORD=
```

Buat database di MySQL:

```sql
CREATE DATABASE ujikom_test;
```

## 4) Siapkan Data (Pilih Salah Satu)

### Opsi A - Laravel Migration + Seeder (disarankan)

```bash
php artisan migrate:fresh --seed
```

### Opsi B - Import `data.sql`

```bash
mysql -u root -p ujikom_test < data.sql
```

## 5) Storage Link (wajib untuk thumbnail)

```bash
php artisan storage:link
```

## 6) Jalankan Project

Jalankan backend:

```bash
php artisan serve
```

Jalankan Vite (frontend Tailwind):

```bash
npm run dev
```

## 7) Akses URL

- Landing page: `http://127.0.0.1:8000/`
- Detail produk: `http://127.0.0.1:8000/produk/1`
- Admin dashboard: `http://127.0.0.1:8000/admin`
- Admin produk: `http://127.0.0.1:8000/admin/products`

## 8) Route Utama

- `GET /admin`
- `GET /admin/products`
- `GET /admin/products/create`
- `POST /admin/products`
- `GET /admin/products/{product}/edit`
- `PUT /admin/products/{product}`
- `DELETE /admin/products/{product}`
- `GET /`
- `GET /produk/{product}`

## 9) Catatan

- Tanpa login, tanpa cart, tanpa payment.
- Validasi form aktif di tambah/edit produk.
- CSRF protection aktif (`@csrf`).
- Flash message aktif setelah create/update/delete.
