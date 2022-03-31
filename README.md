<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<h1 align="center">Ujikompetensi-Pemesanan-Hotel</h1>

## Struktur Laravel

model app/models<br>
view resources/views<br>
controller app/http/controllers<br>
router routes/web<br>
untuk menyimpan file static seperti gambar,css,js,dll disimpan di public<br>

## How to run this project

buka terminal

```
git clone https://github.com/faishallathif/ukom-pemesanan-hotel.git
cd ukom-pemesanan-hotel
composer install
php artisan serve
```

atau<br>
download zip<br>
buka di code editor<br>
buka terminal<br>

```
composer install
php artisan serve
```

## Setup Mysql Database

untuk menghubungkan ke database create database terlebih dahulu di phpmyadmin sesuaikan dengan yang ada di file .env DB_DATABASE kalau mau di ganti juga bebas<br>
terus<br>
buka terminal<br>

```
php artisan migrate
```

## update project

```
git pull origin main
```

## cara push ke github

buat branch baru<br>
contoh :

```
git branch dev-faishal
```

cara ganti branch

```
git checkout nama branch
```

push ke github

```
git add .
git commit -m "penjelasan apa aja yang sudah di kerjakan"
git push origin nama branch
```
