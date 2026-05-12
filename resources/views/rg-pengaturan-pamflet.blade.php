@include('header')
@include('ruangguru')
<div class="content-area">
    <!-- start content-area -->

    <div class="mb-3">
        <label>Banner Saat Ini</label><br>
        <img src="{{ asset('uploads/' . $data['banner_image']) }}" width="300">
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
</div> <!-- end content-area -->
</div> <!-- end content -->
</div> <!-- end b -->
</div> <!-- end layoutadmin -->



@include('footer')
