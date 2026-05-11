<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ $data['title'] }}</title>

    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
        }

        .wrapper {
            width: 700px;
            margin: auto;
        }

        .kwitansi {
            width: 100%;
            background: url('{{ public_path('uploads/kwitansi_bg_blue_2.png') }}');
            background-size: cover;
            background-position: center;
            padding: 20px;
        }

        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .row {
            width: 100%;
            margin-bottom: 5px;
        }

        .left {
            float: left;
        }

        .right {
            float: right;
        }

        .clear {
            clear: both;
        }

        .line {
            border-bottom: 1px dashed #000;
            display: inline-block;
            min-width: 200px;
            padding: 2px 5px;
        }

        .total-box {
            font-size: 14px;
            font-weight: bold;
            border-bottom: 1px dashed #000;
            display: inline-block;
            padding: 2px 5px;
        }

        .ttd {
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <div class="kwitansi">

        <!-- Header -->
        <div class="title">KWITANSI</div>

        <div class="row">
            <div class="left">
                No: {{ $data['id_transaksi'] }}
            </div>
            <div class="right">
                {{ $data['jenis_bayar'] }}
            </div>
            <div class="clear"></div>
        </div>

        <hr>

        <!-- Isi -->
        <div class="row">
            Telah diterima dari:
            <span class="line">{{ $data['nama_siswa'] }}</span>
        </div>

        <div class="row">
            Uang sejumlah:
            <span class="line">
                Rp {{ number_format($data['total_bayar'], 0, ',', '.') }}
            </span>
        </div>

        <div class="row">
            Untuk pembayaran:
            <span class="line">
                @foreach ($data['detail'] as $item)
                    {{ $item->infaq_name }} (Rp {{ number_format($item->infaq_harga, 0, ',', '.') }}),
                @endforeach
            </span>
        </div>

        <br>

        <!-- Total + Tanggal -->
        <div class="row">
            <div class="left total-box">
                Rp {{ number_format($data['total_bayar'], 0, ',', '.') }}
            </div>

            <div class="right">
                {{ date('d-m-Y', strtotime($data['tanggal'])) }}<br>
                Petugas<br><br><br>
                <strong>{{ $data['nama_petugas'] }}</strong>
            </div>

            <div class="clear"></div>
        </div>

    </div>
</div>

</body>
</html>