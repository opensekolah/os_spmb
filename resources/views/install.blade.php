@include('header')
<div class="layout50-50">
    <div class="a">
        <img class="banner-masuk-bg" src="https://picsum.photos/id/13/2500/1667">
        <img class="banner-masuk" src="https://picsum.photos/id/13/2500/1667">
    </div>
    <div class="b">
        <div class="kotak-form">
            <!--div class="logo-area-login">
        <img class="" src="uploads/">
    </div-->
            <h1>Instalasi SPMB</h1>
            <p>Selamat datang di Instalasi Website SPMB <br>Silahkan isikan identitas sekolah untuk dapat mulai
                menggunakan website ini.</p>
            <div class="container mt-4">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Peringatan!</strong><br>
                    Website ini belum siap diisi oleh siswa. Data harus diinput terlebih dahulu oleh petugas
                    sekolah.<br><br>
                    Silakan lengkapi pengaturan berikut ini sebelum website digunakan oleh siswa.

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
            <form method="POST" action="/install" enctype="multipart/form-data">
                <!-- CSRF kalau di Blade -->
                @csrf


                <div class="mb-3">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor Whatsapp</label>
                    <input type="text" name="no_whatsapp" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Logo Sekolah</label>
                    <input type="file" name="logo_sekolah" id="" class="form-control" required>
                </div>
                <div class="mb-5">
                    <label class="form-label">Pamflet Sekolah</label>
                    <input type="file" name="pamflet_sekolah" id="" class="form-control" required>
                </div>

                <div class="mb-3">
                    <h2>Buat Akun Utama</h2>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <input type="text" name="name" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Username untuk login</label>
                    <input type="text" name="username" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Buat Password Baru</label>
                    <input type="text" name="password" id="" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Ulangi Password</label>
                    <input type="text" name="password_confirmation" id="" class="form-control" required>
                </div>


                <!--input type="hidden" name="kelas" id="kelasInput"-->

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary w-100">
                        Install
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

@include('footer')
