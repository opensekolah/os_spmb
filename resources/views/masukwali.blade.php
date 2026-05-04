@include('header')
@include('layoutmasuk')
            <div class="kotak-form">
                <h1>Masuk</h1>
                <h2><?= $data['app_name'] ?></h2>
                <p>Selamat Datang Bapak/Ibu/Wali Murid <br> Silahkan pilih Kelas dan Nama Siswa untuk melihat Rincian Administrasi Terbaru</p>
                <form method="POST" action="/ruangwali">
                        <!-- CSRF kalau di Blade -->
                         @csrf

                        <div class="mb-3">
                            <label class="form-label">Pilih Kelas</label>

                            <!--select name="" id="" class="form-control">
                                <option value="">Pilih Kelas</option>
                                <option value="">7 (Tujuh)</option>
                                <option value="">8 (Delapan)</option>
                                <option value="">9 (Sembilan)</option>
                            </select-->
                            <div class="container mt-4">

                            <div class="row g-3">

                                <!-- Option 1 -->
                                <div class="col-4">
                                    <input type="radio" class="btn-check" name="pilihan" id="pilihan1" autocomplete="off">
                                    <label class="card option-card text-center p-3" for="pilihan1">
                                        <h5>7</h5>
                                    </label>
                                </div>

                                <!-- Option 2 -->
                                <div class="col-4">
                                    <input type="radio" class="btn-check" name="pilihan" id="pilihan2" autocomplete="off">
                                    <label class="card option-card text-center p-3" for="pilihan2">
                                        <h5>8</h5>
                                    </label>
                                </div>

                                <!-- Option 3 -->
                                <div class="col-4">
                                    <input type="radio" class="btn-check" name="pilihan" id="pilihan3" autocomplete="off">
                                    <label class="card option-card text-center p-3" for="pilihan3">
                                        <h5>9</h5>
                                    </label>
                                </div>

                            </div>

                        </div>

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Nama Siswa</label>
                            <select name="" id="" class="form-control">
                                <option value="">Pilih Siswa</option>
                                <option value="">Azkia</option>
                                <option value="">Rivda</option>
                                <option value="">Wulan</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary w-100">
                            Masuk
                            </button>
                        </div>
                        
                    </form>
                    <div class="mb-3  text-center">
                        <p>Anda seorang Guru?</p>
                    </div>
                    <div class="mb-3">
                        <a href="/masukguru" class="btn btn-outline-primary w-100">Masuk Sebagai Guru</a>
                    </div>
                    
            </div>
            </div>
    </div> 
@include('footer')
        