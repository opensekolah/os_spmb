@include('header')
@include('ruangguru')
<div class="content-area">
    <!-- start content-area -->
    
<blockquote class="blockquote p-3 bg-light border-start border-4 border-primary rounded ">

                    <p class="mb-1 small">
                        Anda dapat mencetak Kwitansi ini dengan klik Download Kwitansi.
                    </p>                  

                </blockquote>
<div class="mb-3">
    <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
        Kembali
    </button>

    <button onclick="window.location.href='/kwitansi/pdf/{{ $data['id_transaksi'] }}'"
                        class="btn btn-primary">
                        Download Kwitansi
                    </button>
</div>
    
    <div class="d-flex align-items-center justify-content-center">
        <div class="kwitansi shadow position-relative">

            <div class="overlay">

                <!-- Header -->
                <div class="d-flex justify-content-center">
                    <div>
                        <div class="title fw-bold fs-4">KWITANSI</div>
                    </div>

                </div>
                <div class="d-flex justify-content-between">
                  <div>
                    No: {{ $data['id_transaksi'] }}
                </div>  
                <div>
                    {{ $data['jenis_bayar'] }}
                </div>
                </div>
                

                <hr class="m-0">

                <!-- Isi -->
                <div class="">
                    Telah diterima dari:
                    <span class="line fw-bold">{{ $data['nama_siswa'] }}</span>
                </div>

                <div class="">
                    Uang sejumlah:
                    <span class="line fw-bold">
                        Rp {{ number_format($data['total_bayar'], 0, ',', '.') }}
                    </span>
                </div>

                <div class="">
                    Untuk pembayaran:
                    <span class="line fw-bold">
                        @foreach ($data['detail'] as $item)
                            {{ $item->infaq_name }} : Rp {{ number_format($item->infaq_harga, 0, ',', '.') }},
                        @endforeach
                    </span>
                </div>



                <!-- Total -->
                <div class="d-flex justify-content-between">
                    <div class="text-start total-box mt-2 fw-bold d-flex align-items-end line">
                        Rp {{ number_format($data['total_bayar'], 0, ',', '.') }}
                    </div>
                    <div class="text-end">
                        <strong>
                            {{ \Carbon\Carbon::parse($data['tanggal'])->translatedFormat('d F Y') }}
                        </strong>
                        <p>Petugas</p>

                        <strong>{{ $data['nama_petugas'] }}</strong>
                    </div>

                </div>


                <!-- TTD -->


            </div>

        </div>
    </div>


</div> <!-- end content-area -->
</div> <!-- end content -->
</div> <!-- end b -->
</div> <!-- end layoutadmin -->


@include('footer')
