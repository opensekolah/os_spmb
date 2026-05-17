@include('header')
@include('layoutmasuk')
<div class="kotak-form">
    <h1>Masuk</h1>
    <h2><?= $data['app_name'] ?></h2>
    <p>Selamat Datang Bapak/Ibu/Wali Murid <br> Silahkan pilih Kelas dan Nama Siswa untuk melihat Rincian Administrasi
        Terbaru</p>
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
                        <input type="radio" class="btn-check kelas" name="kelas" value="2" id="k7">
                        <label class="card option-card text-center p-3" for="k7">7</label>
                    </div>

                    <!-- Option 2 -->
                    <div class="col-4">
                        <input type="radio" class="btn-check kelas" name="kelas" value="3" id="k8">
                        <label class="card option-card text-center p-3" for="k8">8</label>
                    </div>

                    <!-- Option 3 -->
                    <div class="col-4">
                        <input type="radio" class="btn-check kelas" name="kelas" value="4" id="k9">
                        <label class="card option-card text-center p-3" for="k9">9</label>
                    </div>

                </div>

            </div>

        </div>

        <div class="mb-3">
            <label class="form-label">Nama Siswa</label>
            <select name="siswa_id" id="siswaSelect" class="form-control">
                <option value="">Pilih Siswa</option>
            </select>
        </div>

        <input type="hidden" name="kelas" id="kelasInput">

        <div class="mb-3">
            <button type="submit" class="btn btn-primary w-100">
                Masuk
            </button>
        </div>

        </form-->
        <div class="mb-3  text-center">
            <p>Anda seorang Guru?</p>
        </div>
        <div class="mb-3">
            <a href="/masukguru" class="btn btn-outline-primary w-100">Masuk Sebagai Guru</a>
        </div>

</div>
</div>
</div>

<script>
    const siswaData = @json($data['siswa']);

    document.querySelectorAll('.kelas').forEach(radio => {
        radio.addEventListener('change', function() {

            let kelas = this.value;
            let select = document.getElementById('siswaSelect');

            select.innerHTML = '<option value="">Pilih Siswa</option>';

            siswaData.forEach(s => {

                if (s.angkatan && s.angkatan.id_kelompok == kelas) {
                    let opt = document.createElement('option');
                    opt.value = s.id;
                    opt.textContent = s.name;
                    select.appendChild(opt);
                }

            });

        });
    });
</script>
@include('footer')
