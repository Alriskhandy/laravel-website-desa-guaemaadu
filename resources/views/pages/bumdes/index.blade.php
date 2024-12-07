@extends('layouts.main')

@section('body')
@section('outmain')
@include('layouts.header')
@endsection

<!-- ======= Profil BUMDes ======= -->
<section id="profil" class="facts section-bg mt-3" data-aos="fade-up">
    <div class="logo text-center mb-3">
        <a href="/"><img src="{{ asset('assets/img/logo-bumdes.png') }}" alt="" class="img-fluid"></a>
    </div>
    <div class="container">
        <div class="section-title">
            <h2>Profil BUMDes Posi-Posi</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8 entries">
                <div class="row">
                    @if ($profil->isi != null)
                    <p>{!! $profil->isi !!}</p>
                    @else
                    @endif
                </div>
            </div><!-- End blog entries list -->

        </div>

    </div>
</section><!-- End Profil BUMDes Section -->

<!-- ======= Struktur BUMDes ======= -->
<section id="struktur" class="blog my-3">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Struktur Organisasi BUMDes</h2>
        </div>
        <div class="row">
            <div class="col entries">
                <img class="img-fluid" id="image" src="{{ asset('storage/' . $struktur->gambar) }}" alt=""
                    style="border-radius: 3%">
            </div>
        </div>
    </div>
</section><!-- End Struktur BUMDes Section -->

@include('layouts.footer')
@endsection