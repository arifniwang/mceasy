# McEasy - Intervew
Menyelesaikan soal Submission pada file PDF.
- Buatlah sebuah software untuk menyimpan, mengedit, menghapus dan melihat data kontak dengan menggunakan bahasa yang dikuasai dengantampil
- Menampilkan 3 karyawan yang pertama kali bergabung ?
- Menampilkan daftar karyawan yang saat ini pernah mengambil cuti. Daftar berisikan (nomor_induk, nama, tanggal_cuti dan keterangan)
- Menampilkan daftar karyawan yang saat ini pernah mengambil cuti lebih dari satu kali. Daftar berisikan (nomor_induk, nama, tanggal_cuti danketerangan)
- Menampilkan sisa cuti tiap karyawan adalah 12 hari. Daftar berisikan (nomor_induk, nama, sisa_cuti)
<hr>

## System Requirement
- PHP 7.3.*
- Composer 2.*.
- MySQL
<hr>

## Cara Menjalankan Program
1. Setup Koneksi Database. Disarankan untuk membuat database baru sendiri dengan nama "interview_telkominfra". Contoh setup koneksi database dapat dilihat dibawah ini.
```php
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=interview_mceasy
DB_USERNAME=root
DB_PASSWORD=
```

2. Buka terminal pada directory base project, lalu jalankan command migrate untuk membuat tabel pada database.
```php
$ php artisan migrate
```

3. Untuk menggunakan memasukan data sesuai yang ada pada excel, silahkan jalankan comman seeder laravel.
```php
$ php artisan db:seed
```

4. Agar bisa diakses melalui browser dengan cara menjalankan command serve terlebih dahulu.
```php
$ php artisan serve
```

5. Silahkan buka browser dengan alamat yang sesuai pada port sudah di setup pada perintah nomor 4 diatas. Contoh anda dapat mengakses melalui browser dengan URI "http://127.0.0.1:8000".


## License

The code is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
