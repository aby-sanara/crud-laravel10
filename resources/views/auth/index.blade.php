@extends('layout/main')

@section('content')
<div class="card mx-auto mt-5 px-5 tampil" style="width: 550px">
    <form action="/auth/login" method="POST">
        @csrf
        <div class="card-body">
            <h3 class="text-center mt-3 mb-2">Selamat Datang</h3>
            <hr class="mb-4 mx-auto" width="100px">
            <input type="text" name="username" class="form-control rounded-pill mb-4 py-2 px-3"
                placeholder="masukkan email anda.." value="{{ Session::get('username') }}">
            <input type="password" name="password" class="form-control rounded-pill mb-4 py-2 px-3"
                placeholder="masukkan password anda..">
            <div class="d-grid">
                <button type="submit" name="submit" class="btn btn-primary rounded-pill">Login</button>
            </div>
            <hr class="mb-2">
            <div class="text-center">
                <a href="/auth/register" class="btn btn-transparent text-primary btn-sm mb-2">Belum punya akun ? silahkan registrasi..</a>
            </div>
        </div>
    </form>
</div>
@endsection