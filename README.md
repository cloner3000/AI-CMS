# CakePHP AI-CMS OPEN SOURCE FOR WEB CMS

## Requirement

1. HTTP Server. For example: Apache. Having mod_rewrite is preferred, but by no means required. You can also use nginx, or Microsoft IIS if you prefer.
2. PHP 5.6.0 or greater (including PHP 7.3).
3. mbstring PHP extension
4. intl PHP extension
5. simplexml PHP extension
6. PDO PHP extension
7. sqlite3 PHP extension
8. Redis Server 
9. redis PHP extension
10. MySQL (5.5.3 or greater) 

## Installation

1. Download SOURCE.
2. Execute SQL di folder `config/schema/default.sql`.
3. Ganti Koneksi dan Nama Database di .env.default gak perlu ganti ke .env ya gan nanti juga otomatis ngikutin kalo udah di composer install.
4. Run CMD `php composer install`.
5. All ready done

## Google Analytics Report Installation
1. Kalo mau aktifin google analytics di adminnya cukup lengkapin data google di menu `App Settings` untuk sementara Google Secret Key File yang di upload hanya bisa menggunakan format JSON ya gan.
2. Setelah itu nanti di menu dashboard kalo Secret Key File dan Profile ID nya Valid nanti bakalan muncul di menu dashboard

## Fitur Admin

1. Custom Routes Nodes Berdasarkan data content 
2. User Group Access Controll List
3. CKEDITOR 5 CUSTOM GUYS
4. Metronic Admin Template (Dokumentasi source nya bisa cari di google ya gans)
5. CSRF Security
6. FORM Post Security jadi nanti web nya gakan bisa di temper guys.
7. ADMIN REPORTING GOOGLE ANALYTICS

[[CMS INI MASIH DEVELOPMENT YA WAK JADI MASIH BELUM SEMPURNA NETIJEN GAK USAH BANYAK KOMEN]]
