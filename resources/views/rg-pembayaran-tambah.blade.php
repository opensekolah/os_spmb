@include('header')
@include('ruangguru')
<div class="content-area">
    <!-- start content-area -->


    <form method="POST" action="/simpanpembayaran">
        @csrf
        <div class="row mb-3">
            <div class="col-md-9">
                <blockquote class="blockquote p-3 bg-light border-start border-4 border-primary rounded ">

                    <p class="mb-1 small">
                        Anda dapat menambahkan pembayaran dengan mencari siswa, kemudian memilih infaq dan mengisi
                        nominal pembayaran. <br>

                    </p>
                    <p class="mb-1 small">
                        Untuk penulisan nominal pembayaran yang benar adalah hanya angka, tanpa titik, tanpa koma.
                    </p>
                    <p class="mb-1 small">
                        Contoh: <br>
                        50000 <span class="badge bg-success rounded-pill px-3 py-2 mb-1">Benar</span> <br>
                        50.000 <span class="badge bg-danger rounded-pill px-3 py-2 mb-1">Salah</span> <br>
                        50,000 <span class="badge bg-danger rounded-pill px-3 py-2 mb-1">Salah</span>
                    </p>

                    <p class="mb-1 small">
                        Untuk pembayaran Beasiswa PIP, Lazisnu, Prestasi, Santunan (Anak Yatim), Saudara Kandung dapat dipilih di bagian Jenis Pembayaran
                    </p>

                </blockquote>
                <div class="row">
                    <div class="col-md-12 mb-3">

                        <div style="position:relative;">
                            <input type="text" id="searchInput" class="form-control" placeholder="Cari Siswa ..">

                            <div id="dropdownResult"
                                style="position:absolute; width:100%; background:white; z-index:9999;">
                            </div>
                        </div>

                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" id="namaField" class="form-control" disabled>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Kelas</label>
                        <input type="text" id="kelasField" class="form-control" disabled>
                    </div>

                    <input type="hidden" name="id_siswa" id="idSiswa">
                    <input type="hidden" name="id_angkatan" id="idAngkatan">

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Jenis Pembayaran</label>
                        <select name="jenis_bayar" class="form-control">
                            <?php foreach ($data['jenisbayar'] as $j) : ?>


                            <option value="<?= $j->id ?>"><?= $j->name ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <table class="table table-bordered table-hover">
                    <thead class="table-light">
                        <tr>
                            <th class="w-50">Jenis Infaq</th>
                            <th class="w-50">Nominal</th>
                        </tr>
                    </thead>
                    <tbody id="infaqList">

                    </tbody>
                </table>
            </div>
            <div class="col-md-3">

                <div class="sticky-summary">

                    <div class="p-3 rounded w-100 border border-1 border-secondary bg-light">

                        <!-- Info -->
                        <div class="text-center">
                            <h6 class="mb-0 fw-bold">RINGKASAN PEMBAYARAN</h6>
                        </div>

                        <hr class="border border-dark border-1 border-dashed">

                        <!-- Item -->
                        <div id="summaryList"></div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold">
                            <span>Total</span>
                            <span id="totalBayar">0</span>
                        </div>

                        <hr class="border border-dark border-1 border-dashed">

                        <div class="small text-center">
                            Periksa kembali jenis infaq dan nominal pembayaran
                        </div>

                    </div>

                </div>

            </div>
        </div>




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
