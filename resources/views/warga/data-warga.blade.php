@extends('layout/main')

@section('content')
    <div class="d-flex justify-content-between">
        <h3>Data Warga</h3>
        <div>
            <a href="warga/create" class="btn btn-primary btn-sm" title="tambah warga">+ Warga</a>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Umur</th>
                <th>Status</th>
                <th class="text-center">Operasi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>
                        <img src="image/{{ $item->foto }}" alt="" width="60px" class="rounded-circle">
                    </td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->umur }}</td>
                    <td>{{ $item->status }}</td>
                    <td class="text-center">
                        <a href="{{ url('/warga/' . $item->id . '/edit') }}" class="btn btn-warning btn-sm" title="edit data warga">Edit</a>
                        <form action="{{ url('/warga/' . $item->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Anda yakin akan menghapus data warga ini ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" title="hapus data warga">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
