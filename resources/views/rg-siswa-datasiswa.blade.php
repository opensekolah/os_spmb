@include('header')
@include('ruangguru')
<div class="content-area">
    <!-- start content-area -->

    <div class="container my-4">

        <div class="row g-3">

            <!-- TOTAL -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center bg-primary text-white">
                    <div class="card-body">
                        <h6>Jumlah Calon Murid Baru</h6>
                        <h1 class="fw-bold">{{ $data['total'] }}</h1>
                    </div>
                </div>
            </div>

            <!-- LAKI-LAKI -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center bg-success text-white">
                    <div class="card-body">
                        <h6>Laki-Laki</h6>
                        <h1 class="fw-bold">{{ $data['laki'] }}</h1>
                    </div>
                </div>
            </div>

            <!-- PEREMPUAN -->
            <div class="col-md-4">
                <div class="card shadow-sm border-0 text-center bg-danger text-white">
                    <div class="card-body">
                        <h6>Perempuan</h6>
                        <h1 class="fw-bold">{{ $data['perempuan'] }}</h1>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <blockquote class="blockquote p-3 bg-light border-start border-4 border-primary rounded">

        <p class="mb-2">
            Pendaftaran siswa hanya bisa dilakukan di halaman utama SPMB. <br>
            Edit data siswa hanya bisa dilakukan di halaman Masuk Siswa
        </p>

    </blockquote>


    <div class="mb-3">
        <a href="/datasiswaexcel" class="btn btn-success">
            <i data-lucide="download"></i> Download Excel Data Siswa Baru
        </a>


    </div>


    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor Whatsapp</th>
                <th>Status</th>
                <!--th>Username</th>
                <th>Password</th-->
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($data['siswa']) > 0): ?>

            <?php $no = 1; ?>
            <?php foreach($data['siswa'] as $s): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $s->name ?></td>
                <td><?= $s->no_whatsapp ?></td>
                <td><?= $s->status ?></td>
                <td>
                    <button onclick="window.location.href='/terima/<?= $s->id ?>'"
                        class="btn btn-sm btn-outline-success" title="Terima"><i data-lucide="check"></i></button>
                    <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                        onclick="window.location.href='/tolak/<?= $s->id ?>'" title="Tolak"><i
                            data-lucide="x"></i></button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>

            <tr>
                <td colspan="5" class="text-center text-muted">
                    Data siswa belum ada
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
        form.action = '/hapussiswa/' + id;
    });
</script>

@include('footer')
