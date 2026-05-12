<style>
    @page {
        margin: 1cm;
    }

    body {
        font-family: Arial, sans-serif;
        font-size: 14px;
        margin: 0;
        padding: 0;
        line-height: 1.2;
    }

    p {
        margin: 0;
        padding: 0;
    }

    hr {
        margin: 3px 0;
        border: none;
        border-top: 1px solid #000;
    }

    /* =========================
       GRID 4 KOLOM
    ========================== */
    .card-table {
        width: 100%;
        border-collapse: collapse;
    }

    .card-table td {
        width: 25%;
        vertical-align: top;
        padding: 4px;
    }

    /* =========================
       CARD BOX
    ========================== */
    .card {
        border: 1px dashed #000;
        padding: 6px;
        box-sizing: border-box;
    }

    /* =========================
       JUDUL
    ========================== */
    .judul {
         font-family: Arial, sans-serif;
        text-align: center;
        font-weight: 600;
        font-size: 14px;
        margin: 0;
        padding: 0;
        line-height: 1.2;
    }

    /* =========================
       INFO SISWA
    ========================== */
    .info {
        margin: 0;
        padding: 0;
        line-height: 1.2;
    }

    /* =========================
       TABLE INFAQ (SUPER RAPAT)
    ========================== */
    table.inner {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin: 1px 0;
    }

    table.inner tr {
        margin: 0;
        padding: 0;
    }

    table.inner td {
        padding: 1px 0;
        /* 🔥 inti kerapatan */
        margin: 0;
        line-height: 1;
        /* 🔥 paling rapat */
        border-bottom: 1px dotted #000;
         font-family: Arial, sans-serif;
        font-size: 14px;
    }

    td.right {
        text-align: right;
    }

    /* =========================
       TOTAL
    ========================== */
    td.total {
        border-top: 1px solid #000;
        border-bottom: 1px solid #000;
        font-weight: 600;
        padding: 2px 0;
         font-family: Arial, sans-serif;
    }

    /* =========================
       KETERANGAN
    ========================== */
    .ket {
        text-align: center;
        margin: 2px 0;
        padding: 0;
        line-height: 1.2;
    }
</style>

@php
    $chunks = $data['tagihan']->chunk(4);
@endphp

@foreach ($chunks as $chunk)
    <div class="page">

        <table class="card-table">
            <tr>

                @foreach ($chunk as $siswa)
                    <td>
                        <div class="card">

                            <div class="judul">
                                Rincian Administrasi <br>
                                SMP Ma'arif NU 01 Wanareja
                            </div>

                            <hr>

                            <div>
                                Nama : {{ $siswa['nama_siswa'] }} <br>
                                Kelas : xxx
                            </div>

                            <hr>

                            <table class="inner">
                                @foreach ($siswa['items'] as $item)
                                    <tr>
                                        <td>{{ $item['infaq_name'] }}</td>
                                        <td class="right">
                                            {{ number_format($item['sisa'], 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach

                                <tr>
                                    <td class="total">Total</td>
                                    <td class="total right">-</td>
                                </tr>
                            </table>

                            <div class="ket">Ket: Belum Lunas</div>

                        </div>
                    </td>
                @endforeach

            </tr>
        </table>

    </div>
@endforeach
