# DIKBUDWA

### **Prerequisite :**
1. Install terlebih dahulu web local server : **Xampp** atau **Lampp** atau  **Wamp** dll.
2. Install **[Composer](https://getcomposer.org/ "Composer")**

### **Instalasi :**

1. clone repository ini : https://github.com/hajirasyafi/dikbudwa.git ke folder htdocs/
2. Buka folder **/dikbudwa** dengan menggunakan editor, ubah nama file **.env.example** menjadi  **.env**
3. lalu buka file **.env** tadi dan ubah konfigurasi nama database, username dan password
4. Jalankan **local webserver** lalu buka **Terminal** dan arahkan ke folder **htdocs/dikbudwa** lalu lakukan perintah berikut satu persatu

- composer install
- php artisan key:generate
- php artisan migrate
- php artisan db:seed

5. Import manual file database berikut melalui **phpMyAdmin** ke database yang kita buat tadi
    - file **desas.sql** yang berada didalam folder **dikbudwa/database/seeders**
    - file **sekolahs.sql** yang berada didalam folder **dikbudwa/database/seeders**
    
6. Langkah instalasi selesai selanjutnya registrasi user melalui :
	[localhost/dikbudwa/public/register](http://localhost/dikbudwa/public/register "localhost/dikbudwa/public/register")
	
	- halaman awal : localhost/dikbudwa/public/
	- halaman login : localhost/dikbudwa/public/login
