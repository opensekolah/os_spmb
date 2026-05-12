@include('header')
@include('ruangguru')

<div class="content-area">
    <blockquote class="blockquote p-3 bg-light border-start border-4 border-primary rounded">
        <p class="mb-3">Pilih kelas untuk mendownload data Tagihan</p>
    </blockquote>


    <div class="row">
        <div class="col-md-1 mb-3">
            <button type="button" class="btn btn-outline-secondary" onclick="history.back()" title="Kembali">
                <i data-lucide="arrow-left"></i>
            </button>
        </div>
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
