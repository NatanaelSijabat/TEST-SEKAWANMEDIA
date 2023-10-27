# TEST SEKAWAN-MEDIA

## Daftar Email - Password

| Email               | Password   |
| ------------------- | :--------- |
| admin@mail.com      | 1234567890 |
| manager@mail.com    | 1234567890 |
| supervisor@mail.com | 1234567890 |

## Database Version

Database client version: libmysql - mysqlnd 8.2.0

## PHP Version

PHP version: 8.2.0

## Framework Version

laravel/framework : ^10.10 ,
react : ^18.2.0,

## Panduan

### Clone This Project

Clone project ini dengan menggunakan perintah:

```bash
git clone https://github.com/NatanaelSijabat/TEST-SEKAWANMEDIA.git
```

Setelah clone project ini, buka di VS Code.

### Instalasi dan Jalankan Project

```bash
composer update
```

```bash
npm install
```

### Copy .env.example

copy file .env.example menjadi .env

```bash
cp .env.example .env
```

### Generate Key App Laravel

```bash
php artisan key:generate
```

### jalankan migrasi dan seed

```bash
php artisan migrate --seed
```

lalu ketik `YES` untuk generate database

### Jalankan Program

buka 2 terminal untuk menjalankan applikasi ini

Terminal 1 untuk Laravel :

```bash
php artisan serve
```

Terminal 2 untuk React JS :

```bash
npm run dev
```
