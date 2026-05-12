@include('header')
@include('ruangguru')
<div class="content-area">
    <!-- start content-area -->


    <!--blockquote class="blockquote p-3 bg-light border-start border-4 border-primary rounded">

        <p class="mb-2">
            Siswa-siswi <strong><//?= optional($data['angkatan']->kelompok)->name ?></strong> ini adalah Angkatan
            
            <span class="badge bg-primary rounded-pill px-3 py-2">
                <//?= $data['angkatan']->name ?>
            </span>
        </p>
        <p class="mb-2">
            Jumlah siswa : <span class="badge bg-success rounded-pill px-3 py-2">
        <//?= $data['angkatan']->siswa_count ?> Siswa
    </span>
        </p>

    </blockquote-->


    <div class="mb-3">

        <!-- Tombol tambah -->
        <a href="/tambahpembayaran" class="btn btn-primary">
            <i data-lucide="plus"></i> Tambah Pembayaran
        </a>
    </div>

    


    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Tanggal</th>
                <th>Nama Siswa</th>
                <th>Petugas</th>
                <th>Jenis Pembayaran</th>
                <th>Total Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($data['pembayaran']) > 0): ?>


            <?php foreach($data['pembayaran'] as $p): ?>
            <tr>
                <td>
                    {{ \Carbon\Carbon::parse($p['tanggal_pembayaran'])->translatedFormat('j F Y') }}
                </td>

                <td>
                    {{ $p['nama_siswa'] }}
                </td>

                <td>
                    {{ $p['nama_petugas'] }}
                </td>

                <td>
                    {{ $p['jenis_bayar'] }}
                </td>

                <td>
                    Rp {{ number_format($p['total_bayar'], 0, ',', '.') }}
                  
                </td>

                <td>
                    <button onclick="window.location.href='/datapembayaran/kwitansi/{{ $p['id_transaksi'] }}'"
                        class="btn btn-sm btn-outline-primary" title="Lihat Kwitansi">
                        <i data-lucide="file-text"></i> 
                    </button>

                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                        data-id="{{ $p['id_transaksi'] }}" title="Hapus">
                        <i data-lucide="trash"></i>
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>

            <tr>
                <td colspan="6" class="text-center text-muted">
                    Data pembayaran belum ada
                </td>
            </tr>

            <?php endif; ?>

        </tbody>
    </table>

</div> <!-- end content-area -->
</div> <!-- end content -->
</div> <!-- end b -->
</div> <!-- end layoutadmin -->


<!-- modal popup -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Konfirmasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                Apakah Anda yakin ingin menghapus data ini?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Batal
                </button>

                <form id="formHapus" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger">
                        Ya, Hapus
                    </button>
                </form>
            </div>

        </div>
    </div>
</div>

<script>
    var modalHapus = document.getElementById('confirmDeleteModal');

    modalHapus.addEventListener('show.bs.modal', function(event) {
        var button = event.relatedTarget;
        var id = button.getAttribute('data-id');

        var form = document.getElementById('formHapus');
        form.action = '/hapuspembayaran/' + id;
    });
</script>

@include('footer')
