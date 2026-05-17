<h1 style="text-align:center">APLIKASI PENGELOLA SPP</h1>

## PANDUAN INSTALASI

Sebelum memulai, copy file '.env.example' dan ubah menjadi '.env'
1. Isi APP_KEY dengan mengunjungi link https://www.convertsimple.com/random-base64-generator/
2. Isi APP_URL dengan alamat website Anda. Contoh: https://websitesekolah.com
3. Isi DB_DATABASE dengan nama database yang sudah dibuat di PhpMyadmin. Jika belum membuat, buat terlebih dahulu.
4. Isi DB_USERNAME dengan nama username database. Jika belum membuat, buat terlebih dahulu di menu Database dan hubungkan username tersebut dengan tabel yang sudah dibuat.
5. Isi DB_PASSWORD dengan password dari username database.
6. Download file 'Database-Awal.sql' kemudian buka PhpMyadmin, klik nama tabel yang baru dibuat, kemudian klik IMPORT dan pilih file 'Database-Awal.sql'
7. Selesai, aplikasi dapat digunakan dengan login menggunakan:

```txt
Username: admin
Password: 12345
```

> Segera ubah password tersebut di menu Pengaturan -> Kelola Data Guru