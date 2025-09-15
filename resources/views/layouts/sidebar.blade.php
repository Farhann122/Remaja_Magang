<div class="sidebar">
    <div class="sidebar-header">
        <a href="{{ asset('template/dist/dashboard/sales.html') }}" class="sidebar-logo">Perencanaan</a>
    </div><!-- sidebar-header -->
    <div id="sidebarMenu" class="sidebar-body">
        <div class="nav-group show">
            <a href="#" class="nav-label">Dashboard</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard.index') }}" class="nav-link {{ request()->routeIs('admin.dashboard.index') ? 'active' : '' }}"><i
                            class="ri-pie-chart-2-line"></i> <span>Dashboard Utama</span></a>
                </li>
            </ul>
        </div><!-- nav-group -->
        <div class="nav-group show">
            <a href="#" class="nav-label">Perencanaan</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-article-line"></i> <span>Login
                            Sebagai</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Eyang
                            Sincan</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}"
                            class="nav-sub-link">Perencanaan</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Staff
                            PPK</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">PPK</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Staff Unit
                            Kerja</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Timeline</a>
                    </nav>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.tahun.*') || request()->routeIs('admin.satuan.*') || request()->routeIs('admin.mak.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.tahun.*') || request()->routeIs('admin.satuan.*') || request()->routeIs('admin.mak.*') ? 'active show' : '' }}"><i class="ri-article-line"></i> <span>Data
                            Administrasi</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.tahun.*') || request()->routeIs('admin.satuan.*') || request()->routeIs('admin.mak.*') ? 'active show' : '' }}">
                        <a href="{{ route('admin.tahun.index') }}" class="nav-sub-link {{ request()->routeIs('admin.tahun.index') ? 'active' : '' }}">Daftar
                            Tahun</a>
                        <a href="{{ route('admin.tahun.add') }}" class="nav-sub-link {{ request()->routeIs('admin.tahun.add') ? 'active' : '' }}">Tambah
                            Tahun</a>
                        <a href="{{ route('admin.mak.index') }}" class="nav-sub-link {{ request()->routeIs('admin.mak.index') ? 'active' : '' }}">Daftar
                            MAK</a>
                        <a href="{{ route('admin.mak.add') }}" class="nav-sub-link {{ request()->routeIs('admin.mak.add') ? 'active' : '' }}">Tambah
                            MAK</a>
                        <a href="{{ route('admin.satuan.index') }}" class="nav-sub-link {{ request()->routeIs('admin.satuan.index') ? 'active' : '' }}">Daftar
                            Satuan</a>
                        <a href="{{ route('admin.satuan.add') }}" class="nav-sub-link {{ request()->routeIs('admin.satuan.add') ? 'active' : '' }}">Tambah
                            Satuan</a>
                    </nav>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.arsip_perencanaan.*') || request()->routeIs('admin.surat_masuk_perencanaan.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.arsip_perencanaan.*') || request()->routeIs('admin.surat_masuk_perencanaan.*') ? 'active show' : '' }}"><i class="ri-article-line"></i> <span>Data Referensi</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.arsip_perencanaan.*') || request()->routeIs('admin.surat_masuk_perencanaan.*') ? 'active show' : '' }}">
                        <a href="{{ route('admin.arsip_perencanaan.index') }}" class="nav-sub-link {{ request()->routeIs('admin.arsip_perencanaan.index') ? 'active' : '' }}">Daftar Arsip Perencanaan</a>
                        <a href="{{ route('admin.arsip_perencanaan.create') }}" class="nav-sub-link {{ request()->routeIs('admin.arsip_perencanaan.create') ? 'active' : '' }}">Tambah Arsip Perencanaan</a>
                        <a href="{{ route('admin.surat_masuk_perencanaan.index') }}" class="nav-sub-link {{ request()->routeIs('admin.surat_masuk_perencanaan.index') ? 'active' : '' }}">Daftar Surat Masuk Perencanaan</a>
                        <a href="{{ route('admin.surat_masuk_perencanaan.create') }}" class="nav-sub-link {{ request()->routeIs('admin.surat_masuk_perencanaan.create') ? 'active' : '' }}">Tambah Surat Masuk Perencanaan</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Daftar Surat Keluar Perencanaan</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Tambah Surat Keluar Perencanaan</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-article-line"></i> <span>Data Perjanjian
                            Kerja</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Daftar
                            Perjanjian Kerja</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Tambah
                            Perjanjian Kerja</a>
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Daftar Kamus Indikator</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Tambah Kamus Indikator</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-article-line"></i> <span>Data SBM</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Daftar
                            Daftar SBMe</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Tambah
                            SBMe</a>
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Daftar SBMbt</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Tambah SBMbt</a>
                    </nav>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.jabatan.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.jabatan.*') ? 'active show' : '' }}"><i class="ri-article-line"></i> <span>Data SDM</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.jabatan.*') ? 'active show' : '' }}">
                        <a href="{{ route('admin.jabatan.index') }}" class="nav-sub-link {{ request()->routeIs('admin.jabatan.index') ? 'active' : '' }}">Daftar Jabatan</a>
                        <a href="{{ route('admin.jabatan.add') }}" class="nav-sub-link {{ request()->routeIs('admin.jabatan.add') ? 'active' : '' }}">Tambah Jabatan</a>
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Daftar Pengguna</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Tambah Pengguna</a>
                    </nav>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.informasi.*') || request()->routeIs('admin.skoring.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.informasi.*') || request()->routeIs('admin.skoring.*') ? 'active show' : '' }}"><i class="ri-article-line"></i> <span>Pembuatan TOR</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.informasi.*') || request()->routeIs('admin.skoring.*') ? 'active show' : '' }}">
                        <a href="{{ route('admin.informasi.index') }}" class="nav-sub-link {{ request()->routeIs('admin.informasi.index') ? 'active' : '' }}">Daftar Informasi</a>
                        <a href="{{ route('admin.informasi.create') }}" class="nav-sub-link {{ request()->routeIs('admin.informasi.create') ? 'active' : '' }}">Tambah Informasi</a>
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Daftar Term Of Reference (TOR)</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Tambah Term Of Reference (TOR)</a>
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Daftar Rincian Anggaran Biaya</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Tambah Rincian Anggaran Biaya</a>
                        <a href="{{ route('admin.skoring.index') }}" class="nav-sub-link {{ request()->routeIs('admin.skoring.index') ? 'active' : '' }}">Daftar Skoring</a>
                        <a href="{{ route('admin.skoring.create') }}" class="nav-sub-link {{ request()->routeIs('admin.skoring.create') ? 'active' : '' }}">Tambah Skoring</a>
                    </nav>
                </li>
                <li class="nav-item {{ request()->routeIs('admin.kode_surat.*') || request()->routeIs('admin.klasifikasi_surat.*') || request()->routeIs('admin.asal_surat.*') ? 'active' : '' }}">
                    <a href="" class="nav-link has-sub {{ request()->routeIs('admin.kode_surat.*') || request()->routeIs('admin.klasifikasi_surat.*') || request()->routeIs('admin.asal_surat.*') ? 'active show' : '' }}"><i class="ri-article-line"></i> <span>Data Referensi</span></a>
                    <nav class="nav nav-sub {{ request()->routeIs('admin.kode_surat.*') || request()->routeIs('admin.klasifikasi_surat.*') || request()->routeIs('admin.asal_surat.*') ? 'active show' : '' }}">
                        <a href="{{ route('admin.kode_surat.index') }}" class="nav-sub-link {{ request()->routeIs('admin.kode_surat.index') ? 'active' : '' }}">Daftar Kode Surat</a>
                        <a href="{{ route('admin.kode_surat.add') }}" class="nav-sub-link {{ request()->routeIs('admin.kode_surat.add') ? 'active' : '' }}">Tambah Kode Surat</a>
                        <a href="{{ route('admin.klasifikasi_surat.index') }}" class="nav-sub-link {{ request()->routeIs('admin.klasifikasi_surat.index') ? 'active' : '' }}">Daftar Klasifikasi Surat</a>
                        <a href="{{ route('admin.klasifikasi_surat.add') }}" class="nav-sub-link {{ request()->routeIs('admin.klasifikasi_surat.add') ? 'active' : '' }}">Tambah Klasifikasi Surat</a>
                        <a href="{{ route('admin.asal_surat.index') }}" class="nav-sub-link {{ request()->routeIs('admin.asal_surat.index') ? 'active' : '' }}">Daftar Asal/Tujuan Surat</a>
                        <a href="{{ route('admin.asal_surat.add') }}" class="nav-sub-link {{ request()->routeIs('admin.asal_surat.add') ? 'active' : '' }}">Tambah Asal/Tujuan Surat</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-article-line"></i> <span>Data Revisi</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Daftar Surat Pengajuan Revisi</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Tambah Srt Pengajuan Revisi</a>
                        <a href="{{ asset('template/dist/apps/gallery-music.html') }}" class="nav-sub-link">Daftar Nota Dinas Revisi</a>
                        <a href="{{ asset('template/dist/apps/gallery-video.html') }}" class="nav-sub-link">Tambah Nota Dinas Revisi</a>
                    </nav>
                </li>

            </ul>
        </div><!-- nav-group -->
        <div class="nav-group show">
            <a href="#" class="nav-label">ANGGARAN</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-currency-fill"></i> <span>Daftar Usulan</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/pages/profile.html') }}" class="nav-sub-link">Struktur Anggaran</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Form Belanja</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-currency-fill"></i> <span>Daftar Pagu Indikatif</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/pages/profile.html') }}" class="nav-sub-link">Struktur Anggaran</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Form Belanja</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Pembatasan Pagu</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-currency-fill"></i> <span>Daftar Pagu Anggaran</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/pages/profile.html') }}" class="nav-sub-link">Struktur Anggaran</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Form Belanja</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Pembatasan Pagu</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-currency-fill"></i> <span>Daftar Alokasi Anggaran</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/pages/profile.html') }}" class="nav-sub-link">Struktur Anggaran</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Form Belanja</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Pembatasan Pagu</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-currency-fill"></i> <span>Daftar DIPA</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/pages/profile.html') }}" class="nav-sub-link">Struktur Anggaran</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Form Belanja</a>
                        <a href="{{ asset('template/dist/pages/people.html') }}" class="nav-sub-link">Tranfer ke SIREVI</a>
                    </nav>
                </li>



            </ul>
        </div><!-- nav-group -->
        <div class="nav-group show mb-3">
            <a href="#" class="nav-label">LAPORAN</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-2-line"></i> <span>Laporan</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/layout-grid.html') }}" class="nav-sub-link">RAB</a>
                        <a href="{{ asset('template/dist/docs/layout-columns.html') }}" class="nav-sub-link">Jumlah Per Satker</a>
                        <a href="{{ asset('template/dist/docs/layout-gutters.html') }}" class="nav-sub-link">Jumlah Per Program</a>
                        <a href="{{ asset('template/dist/docs/layout-gutters.html') }}" class="nav-sub-link">Jumlah Per Kegiatan</a>
                        <a href="{{ asset('template/dist/docs/layout-gutters.html') }}" class="nav-sub-link">Jumlah Per Output</a>
                        <a href="{{ asset('template/dist/docs/layout-gutters.html') }}" class="nav-sub-link">Jumlah Per Biro</a>
                        <a href="{{ asset('template/dist/docs/layout-gutters.html') }}" class="nav-sub-link">Jumlah Per Akun</a>
                    </nav>
                </li>
    
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-2-line"></i> <span>Statistik</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/chart-flot.html') }}" class="nav-sub-link">Jumlah Per Satker</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Program</a>
                        <a href="{{ asset('template/dist/docs/chart-chartjs.html') }}" class="nav-sub-link">Jumlah Per Kegiatan</a>
                        <a href="{{ asset('template/dist/docs/chart-peity.html') }}" class="nav-sub-link">Jumlah Per Output</a>
                        <a href="{{ asset('template/dist/docs/chart-morris.html') }}" class="nav-sub-link">Jumlah Per Biro</a>
                        <a href="{{ asset('template/dist/docs/chart-morris.html') }}" class="nav-sub-link">Jumlah Per Akun</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-2-line"></i> <span>Laporan Kustom</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/chart-flot.html') }}" class="nav-sub-link">Daftar Laporan Kustom</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Tambah Laporan Kustom</a>
                    </nav>
                </li>
            </ul>
        </div><!-- nav-group -->
        <div class="nav-group show mb-3">
            <a href="#" class="nav-label">SICAPING</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-box-line"></i> <span>Data Referensi</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/layout-grid.html') }}" class="nav-sub-link">Setting Persentase</a>
                    </nav>
                </li>
    
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-box-line"></i> <span>Data Cash Planning</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/chart-flot.html') }}" class="nav-sub-link">Pagu Indikatif</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Pagu Anggaran</a>
                        <a href="{{ asset('template/dist/docs/chart-chartjs.html') }}" class="nav-sub-link">Alokasi Anggaran</a>
                    </nav>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-box-line"></i> <span>Laporan Cash Planning</span></a>
                    <nav class="nav nav-sub">
                        <a href="{{ asset('template/dist/docs/chart-flot.html') }}" class="nav-sub-link">RAB</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Akun</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Komponen</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Output/KRO</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Kegiatan</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Program</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Satker</a>
                        <a href="{{ asset('template/dist/docs/chart-apex.html') }}" class="nav-sub-link">Jumlah Per Biro</a>
                    </nav>
                </li>
            </ul>
        </div><!-- nav-group -->
    </div><!-- sidebar-body -->
    <div class="sidebar-footer">
        <div class="sidebar-footer-top">
            <div class="sidebar-footer-thumb">
                <img src="{{ asset('template/dist/assets/img/img1.jpg') }}" alt="">
            </div><!-- sidebar-footer-thumb -->
            <div class="sidebar-footer-body">
                <h6><a href="{{ asset('template/dist/pages/profile.html') }}">Shaira Diaz</a></h6>
                <p>Premium Member</p>
            </div><!-- sidebar-footer-body -->
            <a id="sidebarFooterMenu" href="" class="dropdown-link"><i class="ri-arrow-down-s-line"></i></a>
        </div><!-- sidebar-footer-top -->
        <div class="sidebar-footer-menu">
            <nav class="nav">
                <a href=""><i class="ri-edit-2-line"></i> Edit Profile</a>
                <a href=""><i class="ri-profile-line"></i> View Profile</a>
            </nav>
            <hr>
            <nav class="nav">
                <a href=""><i class="ri-question-line"></i> Help Center</a>
                <a href=""><i class="ri-lock-line"></i> Privacy Settings</a>
                <a href=""><i class="ri-user-settings-line"></i> Account Settings</a>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ri-logout-box-r-line"></i> Keluar
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>
        </div><!-- sidebar-footer-menu -->
    </div><!-- sidebar-footer -->
</div><!-- sidebar -->