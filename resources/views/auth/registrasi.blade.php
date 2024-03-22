@extends('layout/main')

@section('content')
<div class="card mx-auto mt-5 px-5 tampil" style="width: 550px">
    <form action="/auth/create" method="POST">
        @csrf
        <div class="card-body">
            <h3 class="text-center mt-3 mb-4">Registrasi</h3>
            <input type="text" name="nama" class="form-control rounded-pill mb-4 py-2 px-3"
                placeholder="masukkan nama anda.." value="{{ old('nama') }}">
            <input type="text" name="email" class="form-control rounded-pill mb-4 py-2 px-3"
                placeholder="masukkan email anda.." value="{{ old('email') }}">
            <div class="row">
                <div class="col-6">
                    <input type="password" name="pass" class="form-control rounded-pill mb-4 py-2 px-3" placeholder="password">
                </div>
                <div class="col-6">
                    <input type="password" name="pass_confirmation" class="form-control rounded-pill mb-4 py-2 px-3" placeholder="konfirmasi password">
                </div>
            </div>
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary rounded-pill">Buat Akun</button>
            </div>
            <hr class="mb-2">
            <div class="text-center">
                <a href="/" class="btn btn-transparent text-primary btn-sm mb-2">Sudah punya akun ? silahkan login..</a>
            </div>
        </div>
    </form>
</div>
@endsection