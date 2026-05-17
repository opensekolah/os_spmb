@include('header')
@include('ruangwali')

<div class="container d-flex justify-content-center dash-wali">

    <!-- Batas lebar seperti HP -->
    <div class="w-100" style="max-width: 420px;">

        <!-- ================= BANNER ================= -->
        <img src="uploads/<?= $data['banner_image'] ?>" class="rounded img-fluid w-100">

        <div class="py-3">

            <!-- ================= INFO SISWA ================= -->
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body d-flex align-items-center">

                    <img src="https://api.dicebear.com/9.x/initials/svg?seed={{ $data['siswa']->name }}" class="rounded-circle me-3" height="60">

                    <div>
                        <div class="fw-bold">{{ $data['siswa']->name }}</div>
                        <div class="text-muted small">{{ $data['kelas'] }}</div>
                    </div>

                </div>
            </div>

            <!-- ================= RINGKASAN ================= -->
            <div class="row g-2 mb-3">

                <div class="col-12">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body">
                            <div class="text-muted small">Infaq yang telah dibayarkan selama {{ $data['kelas'] }}</div>
                            <div class="fw-bold text-success">
                                <h2>Rp {{ number_format($data['total_dibayar'], 0, ',', '.') }}</h2>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-2 mb-3">
                <div class="col-12">
                    <div class="card border-0 shadow-sm text-center">
                        <div class="card-body">
                            <div class="text-success">Terima kasih atas Infaq yang telah dibayarkan <br> 😇🙏</div>

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

            <!-- ================= SUMMARY ================= -->
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body text-center">

                    <div class="text-muted small">Total Administrasi</div>

                    @if ($data['acara'] ?? null)

                        <div class="fs-5 fw-bold">
                            Rp {{ number_format($data['total'], 0, ',', '.') }}
                        </div>

                        <div class="mt-2">
                            @if ($data['total'] > 0)
                                <span class="badge bg-danger">Belum Lunas</span>
                            @else
                                <span class="badge bg-success">Lunas</span>
                            @endif
                        </div>
                    @else
                        <div class="text-muted mt-2">
                            Belum ada administrasi terbaru
                        </div>
                    @endif

                </div>
            </div>

            <!-- ================= LIST INFAQ ================= -->
            @if ($data['acara'] ?? null)

                <div class="card border-0 shadow-sm">

                    <div class="card-body">

                        <div class="fw-bold mb-2">Rincian Administrasi</div>
                        <div class="mb-2">
                            Tanggal dikeluarkan:
                            {{ \Carbon\Carbon::parse($data['acara']->created_at)->translatedFormat('d F Y') }}
                        </div>

                        @forelse($data['items'] as $item)
                            <div class="d-flex justify-content-between border-bottom py-2">
                                <div>
                                    <div>{{ $item['infaq_name'] }}</div>
                                    <!--small class="text-muted">
                                        Tagihan: {{ number_format($item['tagihan'], 0, ',', '.') }}
                                    </small-->
                                </div>

                                <div class="text-end">
                                    <div class="">
                                        {{ number_format($item['sisa'], 0, ',', '.') }}
                                    </div>
                                    <!--small class="text-muted">Sisa</small-->
                                </div>
                            </div>

                        @empty

                            <div class="text-center text-success py-3">
                                🎉 Semua tagihan sudah lunas
                            </div>
                        @endforelse

                    </div>

                </div>

            @endif

            <!-- ================= FOOTER INFO ================= -->
            <div class="text-center mt-3 mb-3 small text-muted">
                Jika ada kesalahan data, silakan hubungi bendahara
            </div>

            <!-- batas -->
            <!-- ================= MENU ================= -->
            <div class="card border-0 shadow-sm mb-3">
                <div class="card-body">

                    <div class="row">



                        <div class="col-6">
                            <a href="https://wa.me/62881010822346" class="btn btn-outline-success w-100">
                                📞 WA Bendahara
                            </a>
                        </div>

                        <div class="col-6">
                            <a href="/" class="btn btn-outline-danger w-100">
                                🚪 Keluar dari Aplikasi
                            </a>
                        </div>

                    </div>

                </div>
            </div>

        </div>

    </div>

</div>

@include('footer')
