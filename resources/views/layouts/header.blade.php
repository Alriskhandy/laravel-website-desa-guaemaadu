<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center {{ Request::is('/') ? 'header-transparent' : '' }}"
    style="z-index: 9999;">
    <div class="container d-flex justify-content-between align-items-center">

        <div class="logo">
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="/"><img src="{{ asset('assets/img/logo-desa.png') }}" alt="" class="img-fluid"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="{{ url('/') }}">Beranda</a></li>
                <li class="dropdown">
                    <a class="{{ Request::is('profil*') ? 'active' : '' }}" href="{{ route('visimisi') }}">
                        <span>Profil</span> <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <li><a href="{{ route('visimisi') }}">Visi & Misi</a></li>
                        <li><a href="{{ route('sejarah') }}">Sejarah</a></li>
                        <li><a href="{{ route('gambaran.umum') }}">Gambaran Umum</a></li>
                        <li><a href="{{ route('struktur.organisasi') }}">Struktur Organisasi</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a class="{{ Request::is('statistik*') ? 'active' : '' }}"
                        href="{{ route('jenis_kelamin') }}"><span>Statistik Desa</span></a>

                </li>
                <li><a class="{{ Request::is('berita') ? 'active' : '' }}" href="{{ route('berita') }}">Berita</a>
                </li>
                <li><a class="{{ Request::is('bumdes') ? 'active' : '' }}" href="{{ route('bumdes') }}">BUMDes</a></li>
                </li>
                <li><a class="{{ Request::is('peta') ? 'active' : '' }}" href="{{ route('peta') }}">Peta
                        Desa</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->