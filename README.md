 ## CRUD Penduduk
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation
ketikkan :
```bash
https://github.com/madmouse17/crud-penduduk.git
composer install
```
copy ``.env.example`` menjadi ``.env``
tambahkan ini di .env jika belum ada supaya sweet-alert berfungsi :

``SWEET_ALERT_AUTO_DISPLAY_ERROR_MESSAGES=true``

setelah itu :
```bash
php artisan key:generate 
php artisan migrate
php artisan optimize:clear
```

## USER INTERFACE

![Image 004](https://user-images.githubusercontent.com/33163281/148382866-b000df95-0bf6-45bb-acfe-44ebcfaafbae.png)
![Image 003](https://user-images.githubusercontent.com/33163281/148382873-f5608a33-32cc-4dba-a5a4-c30cd12c504f.png)
![Image 002](https://user-images.githubusercontent.com/33163281/148382876-338a16be-8265-4f1d-865e-80bbca4f2212.png)
![Image 001](https://user-images.githubusercontent.com/33163281/148382880-a16a667f-73db-4f42-9dba-fc874a514da6.png)



## Plugin
[Yajra DataTables](https://yajrabox.com/docs/laravel-datatables/master/installation)

[Jquery](https://jquery.com/)

[RealRasheedSweet Alert](https://realrashid.github.io/sweet-alert/)
