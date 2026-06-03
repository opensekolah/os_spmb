@include('header')
@include('ruangguru')
<div class="content-area">
    <!-- start content-area -->
    <div class="mb-3">
        <a href="/tambahguru" class="btn btn-md btn-primary">
            Tambah Guru
        </a>
    </div>


    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Username</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if(count($data['guru']) > 0): ?>

            <?php $no = 1; ?>
            <?php foreach($data['guru'] as $g): ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $g->name ?></td>
                <td><?= $g->username ?></td>
                <td>
                    <button onclick="window.location.href='/editguru/<?= $g->id ?>'"
                        class="btn btn-sm btn-primary">Ubah Password</button>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                        data-id="<?= $g->id ?>">Hapus</button>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php else: ?>

            <tr>
                <td colspan="4" class="text-center text-muted">
                    Data guru belum ada
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
        form.action = '/hapusguru/' + id;
    });
</script>

@include('footer')
