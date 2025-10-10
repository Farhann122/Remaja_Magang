<div class="sidebar">
    <div class="sidebar-header">
        <a href="{{ asset('template/dist/dashboard/sales.html') }}" class="sidebar-logo">Siparlemen </a>
    </div><!-- sidebar-header -->

    <div id="sidebarMenu" class="sidebar-body">

        <!-- ================== DATA WEBSITE ================== -->
        <div class="nav-group show">
            <a href="#" class="nav-label">Data Website</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-earth-line"></i> <span>Data Website</span></a>
                    <nav class="nav nav-sub">
                        <a href="#" class="nav-sub-link">Daftar Konten Statis</a>
                        <a href="#" class="nav-sub-link">Daftar Konten Setting</a>
                        <a href="#" class="nav-sub-link">Daftar Poster</a>
                        <a href="#" class="nav-sub-link">Daftar Album Foto</a>
                        <a href="#" class="nav-sub-link">Daftar Publikasi</a>
                    </nav>
                </li>
            </ul>
        </div><!-- nav-group -->

        <!-- ================== DATA SKORING ================== -->
        <div class="nav-group show">
            <a href="#" class="nav-label">Data Skoring</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-bar-chart-line"></i> <span>Data Skoring</span></a>
                    <nav class="nav nav-sub">
                        <a href="#" class="nav-sub-link">Daftar Kegiatan</a>
                        <a href="#" class="nav-sub-link">Daftar Tingkat</a>
                        <a href="#" class="nav-sub-link">Daftar Partisipasi</a>
                        <a href="#" class="nav-sub-link">Daftar Kriteria</a>
                        <a href="#" class="nav-sub-link">Daftar Skoring CV</a>
                        <a href="#" class="nav-sub-link">Daftar Skoring</a>
                    </nav>
                </li>
            </ul>
        </div><!-- nav-group -->

        <!-- ================== DATA PESERTA ================== -->
        <div class="nav-group show">
            <a href="#" class="nav-label">Data Peserta</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-group-line"></i> <span>Data Peserta</span></a>
                    <nav class="nav nav-sub">
                        <a href="#" class="nav-sub-link">Daftar Dapil</a>
                        <a href="#" class="nav-sub-link">Daftar Peserta</a>
                        <a href="#" class="nav-sub-link">Daftar Penilaian</a>
                        <a href="#" class="nav-sub-link">Daftar Hasil Penilaian</a>
                        <a href="#" class="nav-sub-link">Daftar Peserta (Lolos)</a>
                        <a href="#" class="nav-sub-link">Daftar Peserta (Lolos Seleksi)</a>
                        <a href="#" class="nav-sub-link">Laporan Kustom</a>
                    </nav>
                </li>
            </ul>
        </div><!-- nav-group -->

        <!-- ================== DATA PENILAIAN CV ================== -->
        <div class="nav-group show">
            <a href="#" class="nav-label">Data Penilaian CV</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-file-user-line"></i> <span>Data Penilaian CV</span></a>
                    <nav class="nav nav-sub">
                        <a href="#" class="nav-sub-link">Daftar Penilaian CV (Belum)</a>
                        <a href="#" class="nav-sub-link">Daftar Penilaian CV (Sudah)</a>
                    </nav>
                </li>
            </ul>
        </div><!-- nav-group -->

        <!-- ================== DATA PENILAIAN ESAI ================== -->
        <div class="nav-group show">
            <a href="#" class="nav-label">Data Penilaian Esai</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-file-text-line"></i> <span>Data Penilaian Esai</span></a>
                    <nav class="nav nav-sub">
                        <a href="#" class="nav-sub-link">Daftar Penilaian Esai (Belum)</a>
                        <a href="#" class="nav-sub-link">Daftar Penilaian Esai (Sudah)</a>
                    </nav>
                </li>
            </ul>
        </div><!-- nav-group -->

        <!-- ================== DATA PENILAIAN VIDEO ================== -->
        <div class="nav-group show mb-3">
            <a href="#" class="nav-label">Data Penilaian Video</a>
            <ul class="nav nav-sidebar">
                <li class="nav-item">
                    <a href="" class="nav-link has-sub"><i class="ri-video-line"></i> <span>Data Penilaian Video</span></a>
                    <nav class="nav nav-sub">
                        <a href="#" class="nav-sub-link">Daftar Penilaian Video (Belum)</a>
                        <a href="#" class="nav-sub-link">Daftar Penilaian Video (Sudah)</a>
                    </nav>
                </li>
            </ul>
        </div><!-- nav-group -->

    </div><!-- sidebar-body -->

    <!-- ================== FOOTER ================== -->
    <div class="sidebar-footer">
        <div class="sidebar-footer-top">
            <div class="sidebar-footer-thumb">
                <img src="{{ asset('template/dist/assets/img/img1.jpg') }}" alt="">
            </div>
            <div class="sidebar-footer-body">
                <h6><a href="{{ asset('template/dist/pages/profile.html') }}">Shaira Diaz</a></h6>
                <p>Premium Member</p>
            </div>
            <a id="sidebarFooterMenu" href="" class="dropdown-link"><i class="ri-arrow-down-s-line"></i></a>
        </div>
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
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="ri-logout-box-r-line"></i> Keluar
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </nav>
        </div>
    </div><!-- sidebar-footer -->
</div><!-- sidebar -->
