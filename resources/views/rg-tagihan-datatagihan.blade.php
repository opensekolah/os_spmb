@include('header')
@include('ruangguru')

<div class="content-area">

    <div class="mb-3">
        <span>Pilih kelas untuk mendownload data Tagihan</span>
    </div>

    <div class="row">
        <div class="col-md-4">
            <select id="kelas" class="form-control">
                <option value="">-- Pilih Kelas --</option>

                @foreach ($data['kelaslist'] as $k)
                    <option value="{{ $k->id }}">
                        {{ $k->name }}
                    </option>
                @endforeach

            </select>
        </div>

    </div>

    <div id="preview-area">
        <iframe id="pdfPreview" width="100%" height="50px"></iframe>
    </div>

</div>

<script>
    let acaraId = "<?= $data['acara']->id ?>"; // dari controller

    document.getElementById('kelas').addEventListener('change', function() {
        let kelas = this.value;

        if (kelas) {
            document.getElementById('pdfPreview').src =
                "/datatagihan/pdf/" + acaraId + "/" + kelas;
        }
    });
</script>

@include('footer')
