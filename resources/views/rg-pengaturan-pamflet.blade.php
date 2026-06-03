@include('header')
@include('ruangguru')
<div class="content-area">
    <!-- start content-area -->

    <div class="mb-3">

        <!-- Form Upload -->
        <form action="/pengaturan/banner" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-section p-3 rounded mb-3">

                <div class="mb-3">
                    <label class="form-label">Nama Sekolah</label>
                    <input type="text" name="nama_sekolah" class="form-control"
                        value="{{ $data['data_sekolah']->nama_sekolah }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <input type="text" name="alamat" class="form-control"
                        value="{{ $data['data_sekolah']->alamat }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Tahun Ajaran</label>
                    <input type="text" name="tahun_ajaran" class="form-control"
                        value="{{ $data['data_sekolah']->tahun_ajaran }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Nomor Whatsapp</label>
                    <input type="text" name="no_whatsapp" class="form-control"
                        value="{{ $data['data_sekolah']->no_whatsapp }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control"
                        value="{{ $data['data_sekolah']->email }}">
                </div>

                <!-- LOGO -->
                <div class="mb-3">
                    <label class="form-label">Logo Sekolah</label>
                    <div class="row">
                        <div class="col-6">
                            <input type="file" name="logo_sekolah" class="form-control" id="logoInput">
                        </div>
                        <div class="col-6 text-center">
                            <img id="logoPreview" src="{{ asset('uploads/' . $data['data_sekolah']->logo_sekolah) }}"
                                class="img-fluid" style="max-height: 200px;">
                        </div>
                    </div>
                </div>

                <!-- PAMFLET -->
                <div class="mb-3">
                    <label class="form-label">Pamflet Sekolah</label>
                    <div class="row">
                        <div class="col-6">
                            <input type="file" name="pamflet_sekolah" class="form-control" id="pamfletInput">
                        </div>
                        <div class="col-6 text-center">
                            <img id="pamfletPreview"
                                src="{{ asset('uploads/' . $data['data_sekolah']->pamflet_sekolah) }}" class="img-fluid"
                                style="max-height: 200px;">
                        </div>
                    </div>
                </div>
            </div>

                <div class="mb-3 mt-3">
                    <button class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" onclick="history.back()">
                        Batal
                    </button>
                </div>

            


        </form>
    </div>


</div> <!-- end content-area -->
</div> <!-- end content -->
</div> <!-- end b -->
</div> <!-- end layoutadmin -->



@include('footer')
