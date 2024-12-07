<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex justify-cntent-center align-items-center">

    <div id="heroCarousel" class="container carousel carousel-fade" data-bs-ride="carousel" data-bs-interval="5000">

        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">Selamat Datang Di Website <span>Desa Guaemaadu</span>
                </h2>
                <h4 class="animate__animated animate__fadeInUp text-light">Kecamatan Jailolo, Kabupaten Halmahera Barat,
                    Provinsi Maluku Utara</h4>
            </div>
        </div>

        @foreach ($hero as $h)
        <div class="carousel-item">
            <div class="carousel-container">
                <h2 class="animate__animated animate__fadeInDown">{{ $h->judul }}</h2>
                <a href="{{ route('detail.berita', $h->slug) }}"
                    class="btn-get-started animate__animated animate__fadeInUp">Selengkapnya</a>
            </div>
        </div>
        @endforeach

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section><!-- End Hero -->