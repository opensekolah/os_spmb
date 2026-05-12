<style>
    @page {
        margin: 1cm;
    }

    body {
        margin: 0;
        font-family: Arial, sans-serif;
        font-size: 12px;
    }
</style>
<h2>Tagihan Per Kelas</h2>

@foreach ($data['tagihan'] as $siswa)
    <h4>{{ $siswa['nama_siswa'] }}</h4>

    <table border="1" width="100%" cellpadding="5" cellspacing="0">
        <tr>
            <th>Infaq</th>
            <th>Sisa</th>
        </tr>

        @foreach ($siswa['items'] as $item)
            <tr>
                <td>{{ $item['infaq_name'] }}</td>
                <td>{{ number_format($item['sisa'], 0, ',', '.') }}</td>
            </tr>
        @endforeach

    </table>

    <br>
@endforeach
