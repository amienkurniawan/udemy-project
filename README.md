

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
Dependency Injection adalah teknik dimana sebuah object menerima object lain yang dibutuhkan atau istilahnya dependencies. ketika kita membuat object seringkali kita membutuhkan object yang lain. 
untuk melakukan Injection cara yang digunakan tidak hanya dengan menggunakan constructor, bisa menggunakan attribute atau function. tapi untuk melakukan dependency injection disarankan menggunakan construct.

### Service container
pada laravel kita tidak perlu lagi melakukan Dependency injection secara manual, kita dapat menggunakan service container yang sudah disediakan laravel, untuk menggunakan service container ada beberapa function yang bisa digunakan, yaitu :
1. make(key) => pada make(key) kita akan membuat sebuah objek baru yang ada dari class. contoh : ServiceContainerTest.php
2. bind(key,closure) => pada bind(key,closure) digunakan ketika kita akan membuat sebuah object baru yang class-nya membutuhkan data parameter construct, parameter tersebut ditulis pada closure. contoh : ServiceContainerTest.php
3. singleton(key,closure) => setiap kali kita menggunakan make(key) laravel akan membuat object baru, ada kalanya dimana kita hanya membutuhkan cukup satu object saja, dengan menggunakan singleton maka setiap kali kita menggunakan make(key) object yang terbentuk akan sama dan dapat digunakan secara terus menerus. contoh : ServiceContainerTest.php
4. instance => digunakan ketika sebuah object sudah terbentuk dan kita ingin binding object tersebut di dalam laravel. contoh : ServiceContainerTest.php

### Provider Service

### Service container

### Facades

### Routing

### Middleware
pada test ini kita menambahkan middleware
1. Global Middleware => jika kita sudah membuat sebuah middleware kita perlu mendaftarkan middleware tersebut, kita dapat mendaftarkannya secara global middleware maupun route middleware, untuk global middleware akan dibaca secara global, sedangkan route middleware akan dibaca pada route masing-masing yang mengimplementasikan middleware tersebut.
2. alias Middleware => pada alias middleware kita dapat memanggil middleware kita dengan menggunakan alias, 
misalkan middleware => App\Http\Middleware\ContohMiddleware:class 
menjadi protected $routeMiddleware = [
        'contoh' => ContohMiddleware::class,
        ...
        ]
3. Group Middleware => pada group middleware kita dapat mengelompokkan masing-masing route 
4. Middleware Parameter => ketika kita menggunakan parameter middleware alangkah lebih baiknya jika kita tidak menggunakan group middleware karena akan mengurangi fleksibilitas dari parameter tersebut, misalkan untuk route dengan middleware => PZN, group => PZN pada route middleware parameter perlu ditambahkan parameter sebagai berikut ->middleware('PZN:PZN,401'), sedangkan di group kurang fleksibel sehingga kita perlu mengubah group middleware menjadi berikut ini 
'pzn' => [
            'contoh:PZN,401',
        ],

5. Exclude Middleware => menggunakan withoutMiddleware()

### file upload
pada file upload kita perlu mensetting filesystem default kita, misalkan menggunakan public, local, s3

### file Storage
pada file storage kita dapat setting storagenya yang awalnya local menjadi public, perbedaannya adalah ketika local maka file yang diupload akan disimpang distorage sedangkan jika dipublic akan disimpan di storage/public agar dapat diakses secara public.

untuk setting default driver yang akan digunakan pada storage dapat di setting melalui config/app

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
