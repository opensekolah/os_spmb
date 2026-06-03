@include('header')

<div class="container mt-5">

    <h3>Pengaturan Banner</h3>

    <!-- Preview -->
    <div class="mb-3">
        <label>Banner Saat Ini</label><br>
        <img src="{{ $data['data_sekolah']->pamflet_sekolah }}" width="300">
    </div>

    <!-- Form Upload -->
    <form action="/pengaturan/banner" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Upload Banner</label>
            <input type="file" name="banner" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>

</div>

@include('footer')