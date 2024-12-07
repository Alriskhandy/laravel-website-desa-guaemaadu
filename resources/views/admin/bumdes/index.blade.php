@extends('admin.layouts.main',['title' => 'BUMDes'])
@section('headerside')
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
@endsection
@section('content')
<h2 class="mb-2 page-title text-center">Profil BUMDes Posi-Posi</h2>

{{-- Profil BUMDes --}}
<div class="card shadow mb-4">
    <form action="{{ route('bumdes.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-header">
            <button class="btn btn-primary"><i class="fe fe-save"></i> Simpan</button>
        </div>
        <div class="card-body">
            <h4 class="card-title">{{ $profil->nama }}</h4>
            <input id="isi" class="form-control @error('isi') is-invalid @enderror" type="hidden" name="isi"
                value="{{ $profil->isi }}">
            @error('isi')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
            <trix-editor input="isi"></trix-editor>
        </div>
    </form>
</div>

{{-- Struktur BUMDES --}}
<div class="card shadow mb-4">
    @if ($struktur->gambar != null)
    <form action="{{ route('struktur_bumdes.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-header">
            <button class="btn btn-primary"><i class="fe fe-save"></i> Simpan</button>
        </div>
        <div class="card-body">
            <h4 class="card-title">Struktur Organisasi BUMDes</h4>
            <div class="form-group mb-3">
                <label for="example-fileinput">Bagan:</label>
                <input type="file" id="fileinput" class="form-control-file @error('gambar') is-invalid @enderror"
                    name="gambar">
                <input type="hidden" name="gambarlama" value="{{ $struktur->gambar }}">
                @error('gambar')
                <span class="invalid-feedback" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>
    </form>
    <div class="text-center mb-3">
        <img id="image" src="{{ asset('storage/' . $struktur->gambar) }}" alt="" height="50%" width="100%"
            style="border-radius: 3%">

    </div>
    @else
    <form action="{{ route('struktur_bumdes.update') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card-header">
            <button class="btn btn-primary"><i class="fe fe-save"></i> Simpan</button>
        </div>
        <div class="card-body">
            <h4 class="card-title">Struktur Organisasi BUMDes</h4>
            <label for="example-fileinput">Bagan:</label>
            <input type="file" id="fileinput" class="form-control-file @error('gambar') is-invalid @enderror"
                name="gambar">
            @error('gambar')
            <span class="invalid-feedback" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </form>
    <div class="text-center mb-3">
        <img id="image" src="{{ asset('assets/img/choose-image.png') }}" alt="" height="35%" width="70%"
            style="border-radius: 3%">
    </div>
    @endif
</div>

@endsection

@section('scrip')
<script>
    let img = document.querySelector('#image')
        let input = document.querySelector('#fileinput')

        // choose image
        input.onchange = (e) => {
            if (input.files[0]) {

                img.src = URL.createObjectURL(input.files[0]);
            }
        }
</script>
@endsection