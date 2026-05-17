<h1 style="text-align:center">APLIKASI PENGELOLA SPP</h1>

## PANDUAN INSTALASI

1. Download source code .zip
2. Pergi ke File Manager di penyedia hosting, buat folder baru, misalnya "aplikasi_spp"
3. Upload source code tersebut ke folder aplikasi_spp dan ekstrak
4. Pindahkan isi semua file ke folder sebelumnya. Biasanya struktur folder seperti ini:
```txt
- aplikasi_spp
    |- aplikasi_spp.zip
    |- aplikasi_spp
        |- File-file source code   <- awalnya disini

Pindahkan ke sini:
- aplikasi_spp
    |- File-file source code   <- jadi disini
    |- aplikasi_spp.zip
    |- aplikasi_spp

```
5. Jika menggunakan subdomain, buat subdomain, atur foldernya ke 
> aplikasi_spp/public
6. Pergi ke Terminal dari penyedia hosting
7. Masuk ke folder aplikasi_spp dengan
> cd aplikasi_spp
8. Kemudian jalankan
> composer install
9. Setelah instalasi selesai, ubah nama file .env.example menjadi .env
10. Kemudian jalankan ini di Terminal
> php artisan key:generate
11. Isi APP_URL dengan alamat website Anda. Contoh: https://spp.websitesekolah.com
12. Isi DB_DATABASE dengan nama database yang sudah dibuat di PhpMyadmin. Jika belum membuat, buat terlebih dahulu.
13. Isi DB_USERNAME dengan nama username database. Jika belum membuat, buat terlebih dahulu di menu Database dan hubungkan username tersebut dengan tabel yang sudah dibuat.
14. Isi DB_PASSWORD dengan password dari username database.
15. Download file 'Database-Awal.sql' kemudian buka PhpMyadmin, klik nama tabel yang baru dibuat, kemudian klik IMPORT dan pilih file 'Database-Awal.sql'
16. Selesai, aplikasi dapat digunakan dengan login menggunakan:

```txt
Username: admin
Password: 12345
```

> Segera ubah password tersebut di menu Pengaturan -> Kelola Data Guru