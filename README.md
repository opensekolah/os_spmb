<h1 style="text-align:center">Sitem Penerimaan Murid Baru 2026 (SPMB) by Open Sekolah Indonesia</h1>

## PANDUAN INSTALASI

1. clone repo
2. Buat database mysql dan import semua tabel di folder db_dump
3. Rename file '.env copy' menjadi '.env'
4. Isikan url website anda dan database anda (nama database, username, password)
5. Ke terminal di hostingan, lakukan composer install dan php artisan key:generate
6. Buka website dan anda akan mendapatkan tampilan instalasi website

## PANDUAN UPDATE
1. Masuk Ke Terminal di hosting
2. cd ke folder website
3. git pull origin main
4. composer install
5. php artisan optimize:clear