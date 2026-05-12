@include('header')
@include('ruangguru')
@php
    use Carbon\Carbon;
@endphp

<div class="content-area">
    <!-- start content-area -->

    <div class="mb-3">
        <h3>Pilih Tagihan</h3>
    </div>

    <div class="menukotak">
        @foreach ($data['acara'] as $a)
            <div class="position-relative">
                <a href="/datatagihan/acara/{{ $a->id }}">
                    <!--div class="menuitem btn btn-primary menutagihan">
                    <h3>{{ $a->name }}</h3>
                    <span>
                        <i data-lucide="calendar-days"></i>
                        {{ Carbon::parse($a->created_at)->translatedFormat('j F Y') }}<br>

                        <i data-lucide="user"></i>
                        {{ $a->nama_guru }}
                    </span>
                    <button class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal"
                        data-id="{{ $a->id }}">
                        <i data-lucide="trash"></i>
                    </button>

                </div-->

                    <div class="menuitem btn btn-primary menutagihan d-flex flex-column  text-start">

                        <h3 class="mb-2">{{ $a->name }}</h3>

                        <span class="small">
                            <i data-lucide="calendar-days"></i>
                            {{ Carbon::parse($a->created_at)->translatedFormat('j F Y') }}<br>

                            <i data-lucide="user"></i>
                            {{ $a->nama_guru }}
                        </span>

                        <!-- tombol hapus pojok kanan bawah -->


                    </div>
                </a>
                <button class="btn btn-danger btn-sm position-absolute bottom-0 end-0 m-2" data-bs-toggle="modal"
                    data-bs-target="#confirmDeleteModal" data-id="{{ $a->id }}" title="Hapus">

                    <i data-lucide="trash"></i>
                </button>
            </div>
        @endforeach

        <a href="/tambahtagihan">
            <div class="menuitem btn btn-success">
                <i data-lucide="plus"></i>

                <span>Buat Tagihan Baru</span>
            </div>
        </a>

    </div> <!-- end menukotak -->


</div> <!-- end content-area -->
</div> <!-- end content -->
</div> <!-- end b -->
</div> <!-- end layoutadmin -->
@include('footer')

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
        form.action = '/hapusacara/' + id;
    });
</script>
