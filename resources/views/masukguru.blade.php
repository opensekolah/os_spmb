@include('header')
<div class="layout50-50">
    <div class="a">
        <img class="banner-masuk-bg" src="uploads/{{ $data['data_sekolah']->pamflet_sekolah }}">
        <img class="banner-masuk" src="uploads/{{ $data['data_sekolah']->pamflet_sekolah }}">
    </div>
    <div class="b">
        <div class="kotak-form">
            <div class="logo-area-login text-center mb-4">
                <img src="{{ asset('uploads/' . $data['data_sekolah']->logo_sekolah) }}" class="logo-sekolah">
            </div>
            <h1>Masuk</h1>
            <p>Selamat Datang Bapak/Ibu Guru <br> Silahkan masukkan Username dan Password untuk mengakses Administrasi
                SPMB
            </p>
            <form method="POST" action="/cekmasukguru">
                <!-- CSRF kalau di Blade -->
                @csrf

                <div class="mb-3">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="text" class="form-control" name="password" required>
                </div>

                <div class="mb-3">
                    <button type="submit" onclick="showLoading()" class="btn btn-primary w-100">
                        Masuk
                    </button>
                </div>

            </form>

            <div class="text-center mt-4 mb-3">
                <p class="text-muted mb-2 fs-5">
                    🎒 Kamu mau mendaftar sekolah?
                </p>

                <a href="/" class="btn btn-outline-primary btn-masuk w-100">
                    🚀 Yuk Daftar Sekarang!
                </a>
            </div>
        </div>
    </div>
</div>
@include('footer')
