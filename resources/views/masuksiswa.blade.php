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

            <div class="text-center mb-4">
                <h1 class="judul-spmb">
                    🎓 SPMB {{ $data['data_sekolah']->nama_sekolah }}
                </h1>

                <h2 class="tahun-ajaran">
                    📚 Tahun Ajaran {{ $data['data_sekolah']->tahun_ajaran }}
                </h2>

                <p class="deskripsi-spmb">
                    Ayo masuk ke kelas! 👋 <br>
                    Absen dulu ya.. ✨
                </p>
            </div>
            <form method="POST" action="/masuk_kelas">
                <!-- CSRF kalau di Blade -->
                @csrf


                <div class="form-section p-3 rounded mb-3">

                    <div class="mb-3">
                        <label class="form-label">👤 Nama Kamu Siapa?</label>
                        <select name="nisn" class="form-control input-keren">
                            <option value="">-- Pilih Nama --</option>

                            @foreach ($data['siswa'] as $item)
                                <option value="{{ $item->nisn }}">
                                    {{ $item->name }} - {{ $item->nisn }}
                                </option>
                            @endforeach

                        </select>
                    </div>



                </div>

                <!--input type="hidden" name="kelas" id="kelasInput"-->

                <div class="mb-3">
                    <button type="submit"
                        class="btn btn-primary w-100 py-3 fs-4 fw-bold rounded-pill shadow btn-masuk">
                        Hadir!
                    </button>
                </div>

            </form>
            <div class="text-center mt-4 mb-3">
                <p class="text-muted mb-2 fs-5">
                    🎒 Kamu belum mendaftar sekolah?
                </p>

                <a href="/" class="btn btn-outline-primary btn-masuk w-100">
                    🚀 Yuk Daftar Sekarang!
                </a>
            </div>
            <div class="text-center mt-3 mb-3">
                <p class="text-muted mb-2">👨‍🏫 Anda seorang Guru?</p>

                <a href="/masukguru" class="btn btn-guru w-100">
                    🎓 Masuk Sebagai Guru
                </a>
            </div>

        </div>
    </div>
</div>
<audio id="bg-music" src="{{ asset('uploads/hari-baru.mp3') }}"></audio>

@include('footer')
