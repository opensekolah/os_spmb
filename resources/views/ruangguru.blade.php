@include('header')
<div class="layoutadmin">
    <div class="a">
        <div class="logo-nav mt-3">
            <!--img class="" src="uploads/logo_nu.png"-->
            <img src="{{ asset('uploads/' . $data['data_sekolah']->logo_sekolah) }}">
        </div>
        <span class="title-nav mb-3">{{ $data['data_sekolah']->nama_sekolah }}</span>

        <nav class="menubar">

            <a href="/ruangguru">
                <div class="menubarlist <?= $data['title'] == 'Ruang Guru' ? 'active' : '' ?>">
                    <i data-lucide="home"></i>
                    <span>Dashboard</span>
                </div>
            </a>
            <!--div class="separator mt-3">
                    Perencanaan :
                </div-->

            <a href="/datasiswabaru">
                <div class="menubarlist <?= $data['title'] == 'Kelola Data Siswa' ? 'active' : '' ?>">
                    <i data-lucide="users"></i>
                    <span>Data Siswa Baru</span>
                </div>
            </a>
            
            <a href="/pengaturan">
                <div class="menubarlist <?= $data['title'] == 'Pengaturan' ? 'active' : '' ?>">
                    <i data-lucide="settings"></i>
                    <span>Pengaturan</span>
                </div>
            </a>

            <a href="/keluar">
                <div class="menubarlist">
                    <i data-lucide="door-open"></i>
                    <span>Keluar</span>
                </div>
            </a>



        </nav>

    </div>
    <div class="b">
        <div class="navbar">
            <span class="ms-3">SPMB {{ $data['data_sekolah']->nama_sekolah }}
                {{ $data['data_sekolah']->tahun_ajaran }}</span>
            <div class="profil"><img src="https://api.dicebear.com/9.x/initials/svg?seed={{ session('name') }}"
                    alt="avatar" class="rounded-circle me-2" /><span>{{ session('name') }}</span></div>
        </div>
        <div class="content">
            <div class="title-area">

                @if ($data['title'] == 'Ruang Guru')
                    <h2 class="desktop-only">{{ $data['title'] }}</h2>
                    <h2 class="text-birutua">SPMB {{ $data['data_sekolah']->nama_sekolah }}
                        {{ $data['data_sekolah']->tahun_ajaran }}</h2>
                @else
                    <!--a href="javascript:history.back()">
                        <i data-lucide="arrow-left"></i>
                    </a-->
                    <h2>{{ $data['title'] }}</h2>
                @endif

            </div>
