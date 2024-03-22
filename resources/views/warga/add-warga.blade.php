@extends('layout/main')

@section('content')
    <h3>Tambah Warga</h3>
    <a href="/warga" class="btn btn-sm btn-outline-primary mt-3" title="ke data warga">
        << kembali</a>
            <form action="/warga" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 col-6 mt-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama') }}"
                        placeholder="masukkan nama warga">
                </div>
                <div class="mb-3 col-6 mt-3">
                    <label for="umur" class="form-label">Umur</label>
                    <input type="text" class="form-control" id="umur" name="umur" value="{{ old('umur') }}"
                        placeholder="masukkan usia warga">
                </div>
                <div class="mb-3 col-6 mt-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select">
                        <option value="" selected>-- Pilih Status Pernikahan --</option>
                        <option value="menikah" {{ old('status') == 'menikah' ? 'selected' : null }}>Menikah</option>
                        <option value="lajang" {{ old('status') == 'lajang' ? 'selected' : null }}>Lajang</option>
                        <option value="cerai" {{ old('status') == 'cerai' ? 'selected' : null }}>Cerai</option>
                    </select>
                </div>
                <div class="mb-3 col-6 mt-3">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" name="foto">
                </div>
                <button type="submit" class="btn btn-primary btn-sm mt-2">Simpan</button>
            </form>
        @endsection
