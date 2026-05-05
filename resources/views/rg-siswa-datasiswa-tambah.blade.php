@include('header')
@include('ruangguru')
<div class="content-area">
    <!-- start content-area -->
    <form method="POST" action="/simpansiswa">
    @csrf

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th width="50">No</th>
                <th>Nama</th>
                <th>No Whatsapp</th>
            </tr>
        </thead>
        <tbody>

            <?php for($i = 0; $i < 30; $i++): ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td>
                    <input type="text" name="name[]" class="form-control" placeholder="Nama siswa">
                </td>
                <td>
                    <input type="text" name="no_whatsapp[]" class="form-control" placeholder="08xxxxxxxxxx">
                </td>
            </tr>
            <?php endfor; ?>

        </tbody>
    </table>

    <input type="hidden" name="id_angkatan" value="<?= $data['angkatan']->id ?>">

    <div class="d-flex gap-2">
        <button type="submit" class="btn btn-primary">
            Simpan Semua
        </button>

        <button type="button" class="btn btn-outline-secondary" onclick="history.back()">
            Batal
        </button>
    </div>

    </form>

</div> <!-- end content-area -->
</div> <!-- end content -->
</div> <!-- end b -->
</div> <!-- end layoutadmin -->



@include('footer')
