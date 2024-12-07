@extends('admin.layouts.main', ['title' => 'Tambah User'])
@section('headerside')
@include('admin.layouts.header')
@include('admin.layouts.sidebar')
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <h2 class="h3 mb-4 page-title">Tambah Akun Baru</h2>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <hr class="my-4">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="User Name" name="name"
                        value="{{ old('name') }}">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="tes@gmail.com" name="email"
                        value="{{ old('email') }}">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>
                <hr class="my-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputState5">Jenis Akun</label>
                            <select id="inputState5" class="form-control" name="role_id">
                                @foreach ($role as $r)
                                <option value="{{ $r->id }}">{{ $r->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword5">Password</label>
                            <input type="password" class="form-control" id="inputPassword5" name="password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword6">Confirm Password</label>
                            <input type="password" class="form-control" id="inputPassword6"
                                name="password_confirmation">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Persyaratan password</p>
                        <p class="small text-muted mb-2">Untuk membuat password baru, Anda harus memenuhi semua
                            persyaratan berikut:</p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li>Minimal 8 karakter</li>
                            <li>Setidaknya satu karakter khusus (@#$%*)</li>
                            <li>Setidaknya satu angka (0-9)</li>
                        </ul>

                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div> <!-- /.card-body -->
    </div> <!-- /.col-12 -->
</div> <!-- .row -->
</div> <!-- .container-fluid -->
@endsection