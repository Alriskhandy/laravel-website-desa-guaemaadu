<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
        <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
        <!-- nav bar -->
        <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard') }}">
                <img src="{{ asset('assets/img/logo-192.png') }}" alt="Logo" class="avatar-img img-fluid" width="100">
            </a>
        </div>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fe fe-home fe-16"></i>
                    <span class="ml-3 item-text">Beranda</span>
                </a>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Halaman</span>
        </p>
        @can('isAdmin')
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item active dropdown">
                <a href="#profil-kelurahan" data-toggle="collapse" aria-expanded="false"
                    class="dropdown-toggle nav-link">
                    <i class="fe fe-book fe-16"></i>
                    <span class="ml-3 item-text">Profil Desa</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="profil-kelurahan">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('visimisi.index') }}"><span class="ml-1 item-text">Visi
                                & Misi</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('sejarah.index') }}"><span
                                class="ml-1 item-text">Sejarah</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('gambaranumum.index') }}"><span
                                class="ml-1 item-text">Gambaran Umum</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('organisasi.index') }}"><span
                                class="ml-1 item-text">Struktur
                                Organisasi</span></a>
                    </li>
                </ul>
            </li>
        </ul>
        @endcan

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#kependudukan" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-users fe-16"></i>
                    <span class="ml-3 item-text">Kependudukan</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="kependudukan">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('datapenduduk.index') }}"><span
                                class="ml-1 item-text">Data Penduduk</span></a>
                    </li>
                    @can('isAdmin')
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('pekerjaan.index') }}"><span
                                class="ml-1 item-text">Pekerjaan</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('pendidikan.index') }}"><span
                                class="ml-1 item-text">Pendidikan</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('rt_rw') }}"><span class="ml-1 item-text">Rt &
                                Rw</span></a>
                    </li>
                    @endcan
                </ul>
            </li>
        </ul>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
                <a href="#berita" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-grid fe-16"></i>
                    <span class="ml-3 item-text">Berita</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="berita">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('berita.index') }}"><span class="ml-1 item-text">Semua
                                Berita</span></a>
                    </li>

                    @can('isLurah')
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('lurah.index') }}"><span class="ml-1 item-text">Sambutan
                                Kepala Desa</span></a>
                    </li>
                    @endcan

                </ul>
            </li>
        </ul>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('admin.bumdes') }}">
                    <i class="fe fe-truck fe-16"></i>
                    <span class="ml-3 item-text">BUMDes</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <a class="nav-link" href="{{ route('peta.index') }}">
                    <i class="fe fe-map fe-16"></i>
                    <span class="ml-3 item-text">Peta Desa</span>
                </a>
            </li>
        </ul>

        <p class="text-muted nav-heading mt-4 mb-1">
            <span>Manajemen Pengguna</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item active dropdown">
                <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-user fe-16"></i>
                    <span class="ml-3 item-text">Pengguna</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="user">
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('profile.edit') }}"><span class="ml-1 item-text">Profil
                                Saya</span></a>
                    </li>
                    @can('isLurah')
                    <li class="nav-item">
                        <a class="nav-link pl-3" href="{{ route('register') }}"><span class="ml-1 item-text">Tambah
                                Akun</span></a>
                    </li>
                    @endcan
                </ul>
            </li>
        </ul>

        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
            this.closest('form').submit();">
                        <i class="fe fe-log-out fe-16"></i>
                        <span class="ml-3 item-text">Logout</span>
                    </a>

                </form>
            </li>
        </ul>
    </nav>
</aside>