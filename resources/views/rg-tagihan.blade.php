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
        @foreach($data['acara'] as $a)

<a href="/datatagihan/acara/{{ $a->id }}">
    <div class="menuitem btn btn-primary menutagihan">
        <h3>{{ $a->name }}</h3>
        <span>
            <i data-lucide="calendar-days"></i>
            {{ Carbon::parse($a->created_at)->translatedFormat('j F Y') }}<br>

            <i data-lucide="user"></i>
            {{ $a->nama_guru }}
        </span>
    </div>
</a>

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
