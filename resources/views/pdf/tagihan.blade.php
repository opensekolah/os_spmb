<h2>Tagihan Per Kelas</h2>

@php
$nama_kelas = [
    2 => 'Kelas 7',
    3 => 'Kelas 8',
    4 => 'Kelas 9',
];
@endphp

@foreach($data['tagihan'] as $id_kelas => $siswaGroup)

    <h3>{{ $nama_kelas[$id_kelas] ?? 'Kelas' }}</h3>

    @foreach($siswaGroup as $id_siswa => $items)

        <h4>{{ $items[0]->nama_siswa }}</h4>

        <table border="1" width="100%" cellpadding="5" cellspacing="0">
            <tr>
                <th>Infaq</th>
                <th>Nominal</th>
            </tr>

            @foreach($items as $d)
            <tr>
                <td>{{ $d->infaq_name }}</td>
                <td>{{ number_format($d->infaq_harga) }}</td>
            </tr>
            @endforeach

        </table>

        <br>

    @endforeach

@endforeach