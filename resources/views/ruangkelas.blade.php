@include('header')

<div class="container d-flex justify-content-center dash-wali">

    <!-- Batas lebar seperti HP -->
    <div class="w-100" style="max-width: 420px;">



        <div class="py-3">

            <!-- ================= INFO SISWA ================= -->
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body d-flex align-items-center">

                    <img src="https://api.dicebear.com/9.x/initials/svg?seed={{ $data['siswa']['name'] }}"
                        class="rounded-circle me-3" height="60">

                    <div>
                        <div class="fw-bold">{{ $data['siswa']['name'] }}</div>
                        <div class="text-muted small">{{ $data['siswa']['nisn'] }}</div>
                    </div>

                </div>
            </div>

            <!-- ================= RINGKASAN ================= -->
            <div class="row g-2 mb-3">

                <div class="col-12">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body">
                            <p>Selamat datang di SMP Ma'arif NU 01 Wanareja! <br>Status kamu
                                saat ini adalah: </p>
                            <span class="pill-hijau mb-3">{{ $data['siswa']['status'] }}</span>
                            <p>Sekarang saatnya kita melengkapi formulir pendaftaran!</p>


                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="text-center mb-3">
                                <h2>Formulir SPMB <br> {{ $data['data_sekolah']->nama_sekolah }} <br> Tahun Ajaran
                                    {{ $data['data_sekolah']->tahun_ajaran }}</h2>

                            </div>

                            <form method="POST" action="/siswaidentitas">
                                @csrf


                                @php
                                    $identitas = $data['identitas_siswa'] ?? [];
                                @endphp

                                <!-- ================= DATA SISWA ================= -->
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header bg-primary text-white">
                                        👨‍🎓 Data Siswa
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama Lengkap</label>
                                            <input type="text" name="name" class="form-control mb-3"
                                                value="{{ old('name', $data['siswa']['name']) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nisn" class="form-label">NISN</label>
                                            <input type="text" name="nisn" class="form-control mb-3"
                                                value="{{ old('nisn', $data['siswa']['nisn']) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_whatsapp" class="form-label">Nomor Whatsapp</label>
                                            <input type="text" name="no_whatsapp" class="form-control mb-3"
                                                value="{{ old('no_whatsapp', $data['siswa']['no_whatsapp']) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control mb-3"
                                                value="{{ old('email', $data['siswa']['email']) }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="jk" class="form-label">Jenis Kelamin</label>
                                            <select name="jk" class="form-control mb-3">
                                                <option value="">-- Pilih --</option>
                                                <option value="L"
                                                    {{ old('jk', $identitas['jk'] ?? '') == 'L' ? 'selected' : '' }}>
                                                    Laki-laki</option>
                                                <option value="P"
                                                    {{ old('jk', $identitas['jk'] ?? '') == 'P' ? 'selected' : '' }}>
                                                    Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="asal_sekolah" class="form-label">Asal Sekolah</label>
                                            <input type="text" name="asal_sekolah" class="form-control mb-3"
                                                value="{{ old('asal_sekolah', $identitas['asal_sekolah'] ?? '') }}">
                                        </div>




                                        <!-- JK -->



                                        <div class="mb-3">
                                            <label for="nik" class="form-label">NIK</label>
                                            <input type="text" name="nik" class="form-control mb-3"
                                                value="{{ old('nik', $identitas['nik'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_kk" class="form-label">Nomor KK</label>
                                            <input type="text" name="no_kk" class="form-control mb-3"
                                                value="{{ old('no_kk', $identitas['no_kk'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control mb-3"
                                                value="{{ old('tempat_lahir', $identitas['tempat_lahir'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir" class="form-control mb-3"
                                                value="{{ old('tgl_lahir', $identitas['tgl_lahir'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="no_reg_akta" class="form-label">Nomor Registrasi Akta
                                                Kelahiran</label>
                                            <input type="text" name="no_reg_akta" class="form-control mb-3"
                                                value="{{ old('no_reg_akta', $identitas['no_reg_akta'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="agama" class="form-label">Agama</label>
                                            <select name="agama" class="form-control mb-3">
                                                @foreach (['Islam', 'Kristen', 'Katolik', 'Hindu', 'Buddha'] as $a)
                                                    <option value="{{ $a }}"
                                                        {{ old('agama', $identitas['agama'] ?? '') == $a ? 'selected' : '' }}>
                                                        {{ $a }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="warganegara" class="form-label">Kewarganegaraan</label>
                                            <select name="warganegara" class="form-control mb-3">
                                                <option value="Indonesia"
                                                    {{ old('warganegara', $identitas['warganegara'] ?? '') == 'Indonesia' ? 'selected' : '' }}>
                                                    Indonesia</option>
                                                <option value="Asing"
                                                    {{ old('warganegara', $identitas['warganegara'] ?? '') == 'Asing' ? 'selected' : '' }}>
                                                    Asing</option>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="kebutuhan_khusus" class="form-label">Berkebutuhan
                                                Khusus</label>
                                            <select name="kebutuhan_khusus" class="form-control mb-3">
                                                @foreach (['Tidak', 'Tunanetra', 'Tunarungu', 'Tunawicara', 'Tunadaksa', 'Tunagrahita', 'Tunalaras', 'Autisme', 'ADHD', 'Kesulitan Belajar', 'Lainnya'] as $k)
                                                    <option value="{{ $k }}"
                                                        {{ old('kebutuhan_khusus', $identitas['kebutuhan_khusus'] ?? '') == $k ? 'selected' : '' }}>
                                                        {{ $k }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea name="alamat" class="form-control mb-3">{{ old('alamat', $identitas['alamat'] ?? '') }}</textarea>
                                        </div>


                                        <!-- Agama -->


                                        <!-- WN -->


                                        <!-- Kebutuhan Khusus -->



                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <label for="rt" class="form-label">RT</label>
                                                <input type="text" name="rt" class="form-control mb-3"
                                                    value="{{ old('rt', $identitas['rt'] ?? '') }}">
                                            </div>
                                            <div class="col-6">
                                                <label for="rw" class="form-label">RW</label>
                                                <input type="text" name="rw" class="form-control mb-3"
                                                    value="{{ old('rw', $identitas['rw'] ?? '') }}">
                                            </div>
                                        </div>



                                        <div class="mb-3">
                                            <label for="dusun" class="form-label">Dusun</label>
                                            <input type="text" name="dusun" class="form-control mb-3"
                                                value="{{ old('dusun', $identitas['dusun'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="desa" class="form-label">Desa</label>
                                            <input type="text" name="desa" class="form-control mb-3"
                                                value="{{ old('desa', $identitas['desa'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kecamatan" class="form-label">Kecamatan</label>
                                            <input type="text" name="kecamatan" class="form-control mb-3"
                                                value="{{ old('kecamatan', $identitas['kecamatan'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="kodepos" class="form-label">Kode Pos</label>
                                            <input type="text" name="kodepos" class="form-control mb-3"
                                                value="{{ old('kodepos', $identitas['kodepos'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tempat_tinggal" class="form-label">Tempat Tinggal</label>
                                            <select name="tempat_tinggal" class="form-control mb-3">
                                                @foreach (['Bersama Orang Tua', 'Kos', 'Asrama'] as $t)
                                                    <option value="{{ $t }}"
                                                        {{ old('tempat_tinggal', $identitas['tempat_tinggal'] ?? '') == $t ? 'selected' : '' }}>
                                                        {{ $t }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>






                                        <!-- Tempat Tinggal -->


                                        <!-- Transport -->
                                        <div class="mb-3">
                                            <label for="moda_transportasi" class="form-label">Moda
                                                Transportasi</label>
                                            <select name="moda_transportasi" class="form-control mb-3">
                                                @foreach (['Jalan Kaki', 'Kendaraan Pribadi', 'Kendaraan Umum', 'Jemputan Sekolah'] as $m)
                                                    <option value="{{ $m }}"
                                                        {{ old('moda_transportasi', $identitas['moda_transportasi'] ?? '') == $m ? 'selected' : '' }}>
                                                        {{ $m }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="anak_ke" class="form-label">Anak Ke</label>
                                            <select name="anak_ke" class="form-control mb-3">
                                                @for ($i = 1; $i <= 10; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ old('anak_ke', $identitas['anak_ke'] ?? '') == $i ? 'selected' : '' }}>
                                                        {{ $i }}
                                                    </option>
                                                @endfor
                                            </select>
                                        </div>
                                        <!-- Anak ke -->


                                        <!-- KIP -->
                                        <div class="mb-3">
                                            <label for="punya_kip" class="form-label">Punya KIP</label>
                                            <select name="punya_kip" class="form-control mb-3">

                                                <option value="Tidak"
                                                    {{ old('punya_kip', $identitas['punya_kip'] ?? '') == 'Tidak' ? 'selected' : '' }}>
                                                    Tidak</option>
                                                <option value="Ya"
                                                    {{ old('punya_kip', $identitas['punya_kip'] ?? '') == 'Ya' ? 'selected' : '' }}>
                                                    Ya</option>
                                            </select>
                                        </div>


                                    </div>
                                </div>

                                <!-- ================= AYAH ================= -->
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header bg-success text-white">👨 Data Ayah</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="nama_ayah" class="form-label">Nama</label>
                                            <input type="text" name="nama_ayah" class="form-control mb-3"
                                                value="{{ old('nama_ayah', $identitas['nama_ayah'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nik_ayah" class="form-label">NIK</label>
                                            <input type="text" name="nik_ayah" class="form-control mb-3"
                                                value="{{ old('nik_ayah', $identitas['nik_ayah'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tgl_lahir_ayah" class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir_ayah" class="form-control mb-3"
                                                value="{{ old('tgl_lahir_ayah', $identitas['tgl_lahir_ayah'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="pendidikan_ayah" class="form-label">Pendidikan
                                                Terakhir</label>
                                            <select name="pendidikan_ayah" class="form-control mb-3">
                                                @foreach (['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'] as $p)
                                                    <option value="{{ $p }}"
                                                        {{ old('pendidikan_ayah', $identitas['pendidikan_ayah'] ?? '') == $p ? 'selected' : '' }}>
                                                        {{ $p }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pekerjaan_ayah" class="form-label">Pekerjaan</label>
                                            <input type="text" name="pekerjaan_ayah" class="form-control mb-3"
                                                value="{{ old('pekerjaan_ayah', $identitas['pekerjaan_ayah'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="penghasilan_ayah" class="form-label">Penghasilan
                                                Perbulan</label>
                                            <select name="penghasilan_ayah" class="form-control mb-3">
                                                @foreach (['< 100.000', '100.000 - 200.000', '200.000 - 300.000', '300.000 - 400.000', '400.000 - 500.000', '500.000 - 600.000', '600.000 - 700.000', '700.000 - 800.000', '800.000 - 900.000', '900.000 - 1.000.000', '> 1.000.000'] as $g)
                                                    <option value="{{ $g }}"
                                                        {{ old('penghasilan_ayah', $identitas['penghasilan_ayah'] ?? '') == $g ? 'selected' : '' }}>
                                                        {{ $g }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>












                                    </div>
                                </div>

                                <!-- ================= IBU ================= -->
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-header bg-danger text-white">👩 Data Ibu</div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="nama_ibu" class="form-label">Nama</label>
                                            <input type="text" name="nama_ibu" class="form-control mb-3"
                                                value="{{ old('nama_ibu', $identitas['nama_ibu'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="nik_ibu" class="form-label">NIK</label>
                                            <input type="text" name="nik_ibu" class="form-control mb-3"
                                                value="{{ old('nik_ibu', $identitas['nik_ibu'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tgl_lahir_ibu" class="form-label">Tanggal Lahir</label>
                                            <input type="date" name="tgl_lahir_ibu" class="form-control mb-3"
                                                value="{{ old('tgl_lahir_ibu', $identitas['tgl_lahir_ibu'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="pendidikan_ibu" class="form-label">Pendidikan
                                                Terakhir</label>
                                            <select name="pendidikan_ibu" class="form-control mb-3">
                                                @foreach (['Tidak Sekolah', 'SD', 'SMP', 'SMA', 'S1', 'S2', 'S3'] as $p)
                                                    <option value="{{ $p }}"
                                                        {{ old('pendidikan_ibu', $identitas['pendidikan_ibu'] ?? '') == $p ? 'selected' : '' }}>
                                                        {{ $p }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="pekerjaan_ibu" class="form-label">Pekerjaan</label>
                                            <input type="text" name="pekerjaan_ibu" class="form-control mb-3"
                                                value="{{ old('pekerjaan_ibu', $identitas['pekerjaan_ibu'] ?? '') }}">
                                        </div>
                                        <div class="mb-3">
                                            <label for="penghasilan_ibu" class="form-label">Penghasilan
                                                Perbulan</label>
                                            <select name="penghasilan_ibu" class="form-control mb-3">
                                                @foreach (['< 100.000', '100.000 - 200.000', '200.000 - 300.000', '300.000 - 400.000', '400.000 - 500.000', '500.000 - 600.000', '600.000 - 700.000', '700.000 - 800.000', '800.000 - 900.000', '900.000 - 1.000.000', '> 1.000.000'] as $g)
                                                    <option value="{{ $g }}"
                                                        {{ old('penghasilan_ibu', $identitas['penghasilan_ibu'] ?? '') == $g ? 'selected' : '' }}>
                                                        {{ $g }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>












                                    </div>
                                </div>

                                <input type="hidden" name="nisn_asli" value="{{ $data['siswa']['nisn'] }}">
                                <button type="submit" class="btn btn-primary w-100">
                                    💾 Simpan Formulir
                                </button>


                            </form>



                        </div>
                    </div>
                </div>

            </div>



            <!-- ================= DETAIL =================
            <div class="card border-0 shadow-sm">

                <div class="card-body">

                    <div class="fw-bold mb-2">Rincian Tagihan</div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>Infaq</span>
                        <span>Rp 50.000</span>
                    </div>

                    <div class="d-flex justify-content-between border-bottom py-2">
                        <span>Kegiatan</span>
                        <span>Rp 100.000</span>
                    </div>

                    <div class="d-flex justify-content-between pt-2">
                        <span class="fw-bold">Total</span>
                        <span class="fw-bold">Rp 150.000</span>
                    </div>

                </div>

            </div>-->


            <!-- batas -->




            <!-- ================= FOOTER INFO ================= -->


            <!-- batas -->
            <!-- ================= MENU ================= -->
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">
                    <div class="text-center mb-3">
                        Jika ada kesalahan data, silakan hubungi sekolah
                    </div>


                    <a href="https://wa.me/{{ preg_replace('/^0/', '62', $data['data_sekolah']->no_whatsapp) }}"
                        class="btn btn-success w-100 mb-3">
                        📞 Whatsapp Sekolah
                    </a>

                    <a href="/" class="btn btn-outline-danger w-100 mb-3">
                        🚪 Keluar dari Aplikasi
                    </a>


                </div>
            </div>

        </div>

    </div>

</div>

@include('footer')
