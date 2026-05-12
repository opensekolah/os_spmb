@include('header')
@include('ruangguru')
<div class="content-area">
    <!-- start content-area -->
    
    <blockquote class="blockquote p-3 bg-light border-start border-4 border-primary rounded">

        <p>Anda akan membuat tagihan baru pada kegiatan tertentu. Isilah nama dengan kegiatan yang akan dilakukan.
            Contoh: ASTS 1 2026 </p>
            <p>
               Kemudian pilihlah infaq pada setiap kelas yang akan dibuat tagihan. 
            </p>

    </blockquote>

    


    <form method="POST" action="/simpantagihan">
        @csrf

        <div class="row">
            <div class="col-md-4 mb-3">
                <label class="form-label">Nama Kegiatan</label>
                <input type="text" name="name" class="form-control" required>
            </div>
        </div>
        <?php
        $nama_kelas = [
            2 => 'Kelas 7',
            3 => 'Kelas 8',
            4 => 'Kelas 9',
        ];
        ?>
        

        <div class="row">

            <?php foreach($data['infaq_group'] as $id_kelas => $list): ?>
            <div class="col-md-4 mb-3">

                <div class="p-3 border rounded group-box">

                    <h5 class="group-title d-inline-block bg-light text-dark rounded-pill px-4 py-2">
    <input type="checkbox" name="id_kelompok[]" value="<?= $id_kelas ?>"
        class="kelas-check d-none">
    <?= $nama_kelas[$id_kelas] ?? 'Kelas' ?>
</h5>

                    <?php foreach($list as $i): ?>
                    <div class="form-check">
                        <input type="checkbox" 
    name="id_infaq[]" 
    value="<?= $i->id ?>"
    class="form-check-input infaq-check"
    data-kelas="<?= $id_kelas ?>">
                        <label class="form-check-label">
                            <?= $i->name ?> - Rp <?= number_format($i->harga, 0, ',', '.') ?>
                        </label>
                    </div>
                    <?php endforeach; ?>

                </div>

            </div>
            <?php endforeach; ?>

        </div>


        <button type="submit" class="btn btn-primary" onclick="this.disabled=true; this.form.submit();">
            Lanjutkan
        </button>

        <button type="button" class="btn btn-danger" onclick="history.back()">
            Batal
        </button>
    </form>

</div> <!-- end content-area -->
</div> <!-- end content -->
</div> <!-- end b -->
</div> <!-- end layoutadmin -->



@include('footer')
