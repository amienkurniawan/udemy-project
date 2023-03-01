

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
3. untuk membuat unit test dapat menggunakan perintah "php artisan make:test AppEnvironmentTest" 

### App Environtment
APP_ENV digunakan untuk menentukan  environment apa saat aplikasi berjalan, misalkan local/prod

### Configuration
pada laravel sudah disediakan configuration yang dapat digunakan, configuration ini berada difolder config, untuk mengakses configuration dapat dilakukan cara berikut: 
1. mulai dengan config(nama_file.nama_key)
2. pada config menggunakan array untuk menyimpan nilai
3. kita dapat membuat configuration kita sendiri dengan membuat file php kemudian diisi dengan array key:value, contoh: config(contoh.author.first)

### Configuration Cache
kita dapat melakukan cache pada file configuration yang ada dilaravel, hal ini bertujuan agar mempercepat proses membaca file config, apabila configuration kita sudah banyak maka hal ini perlu dilakukan. untuk melakukan Cache pada configuration kita dapat menjalankan perintah artisan sebagai berikut : 
1. php artisan config:cache => perintah ini untuk membuat cache dari file config
2. php artisan config:clear => perintah ini digunakan untuk menghapus cache yang sudah dibuat sebelumnya

### Dependency Injection


## Laravel Sponsors


### Premium Partners


## Contributing


## Code of Conduct

## Security Vulnerabilities

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
