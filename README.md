<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Following command need to run to make it runnable on local

- To Generate users using factory
  ```
    php artisan tinker
    User::factory()->count(20)->create()
  ```

- To Generate website using seeder
  ```
    php artisan db:seed --class=WebsiteSeeder
  ```
- To Generate migration
  ```
    php artisan migrate
  ```

- To run Command to send newly create post mail to all Related website Subscriber
  ```
    php artisan send:story
  ```
- Please do find collection for Postman in root folder.
 
  ```
    subscription.postman_collection.json
  ```
- Please do find database for Reference incase migration not working.
 
  ```
    subscription.sql
  ``
