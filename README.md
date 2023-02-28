

## Learning Laravel
### Request lifecycle
1. pertama request akan mengeksekusi public index
2. kemudian akan dilanjutkan ke class kernel, pada class kernal terdapat 2 jenis kernel yaitu HTTP kernel dan Console Kernel. HTTP Kernel digunakan untuk nangani request berupa HTTP, sedangkan Console Kernel digunakan untuk menangani request berupa perintah console.
pada kernel akan melakukan proses bootstraping/me-load Service Provider.
3. service provider ini yang melakukan bootstraping pada semua komponen laravel seperti database, queue, validation, routing, dll.
Macam-macam service provider adalah AppServiceProvider, AuthServiceProvider, RouteServiceProvider.

### Testing
Laravel menggunakan PHPUnit untuk testing, ada dua jenis test, unit test dan feature test/integration test.
1. unit test digunakan ketika ingin menjalankan test yang tidak berhubungan dengan fitur dari laravel itu sendiri
2. feature test digunakan ketika ingin menjalankan test yang memiliki hubungan dengan fitur laravel itu sendiri misalkan Model, Controller, dan lain-lain.

### Environtment

## Laravel Sponsors


### Premium Partners


## Contributing


## Code of Conduct

## Security Vulnerabilities

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
