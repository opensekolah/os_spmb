@include('header')
@include('ruangguru')
<div class="content-area">
    <!-- start content-area -->
    <div class="menukotak">
        <a href="/dataguru">
            <div class="menuitem bg-primary">
                <i data-lucide="users"></i>
                <span>Kelola Data Guru</span>
            </div>
        </a>
        <a href="#">
            <div class="menuitem bg-primary">
                <i data-lucide="image"></i>
                <span>Ubah Pamflet Halaman Masuk</span>
            </div>
        </a>
        
    </div> <!-- end menukotak -->
    <!--a href="">
        <div class="list-content mb-3">
            <i data-lucide="users"></i>
            <span>Kelola Data Guru</span>
        </div>
    </a>

    <a href="">
        <div class="list-content mb-3">
            <i data-lucide="image"></i>
            <span>Ubah Banner Halaman Login</span>
        </div>
    </a-->

    <!--div class="list-content mb-3">
        <h3>Ubah Banner Halaman Login</h3>
        <form action="/pengaturan/banner" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Ubah Banner</label>
                <input type="file" name="banner" class="form-control" required>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary">Simpan</button>
            </div>

        </form>
        <div class="mb-3">
            <img src="{{ asset('uploads/' . $data['banner_image']) }}">
        </div>
    </div>

    <div class="list-content mb-3">
        <h3>Nama Sekolah</h3>
        <div class="mb-3">
            <span>SMP Ma'arif NU 01 Wanareja</span>
        </div>
    </div-->

</div> <!-- end content-area -->
</div> <!-- end content -->
</div> <!-- end b -->
</div> <!-- end layoutadmin -->
@include('footer')
