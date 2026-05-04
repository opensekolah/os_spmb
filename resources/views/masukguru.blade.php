@include('header')
@include('layoutmasuk')
            <div class="kotak-form">
                <h1>Masuk</h1>
                <h2><?= $data['app_name'] ?></h2>
                <p>Selamat Datang Bapak/Ibu Guru <br> Silahkan masukkan Username dan Password untuk mengakses Administrasi</p>
                <form method="POST" action="/ruangguru">
                        <!-- CSRF kalau di Blade -->
                         @csrf 

                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" onclick="showLoading()" class="btn btn-primary w-100">
                            Masuk
                        </button>
                        </div>
                        
                    </form>

                    <div class="mb-3  text-center">
                        <p>Anda seorang Wali Murid?</p>
                    </div>
                    <div class="mt-3">
                        <a href="/" class="btn btn-outline-primary w-100">Masuk Sebagai Wali Murid</a>
                    </div>
            </div>
            </div>
    </div> 
@include('footer')
        