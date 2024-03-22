<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Warga::all()->sortBy('nama');

        return view('warga/data-warga', ['no' => 1])->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('warga/add-warga');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'nama'  => 'required',
                'umur'  => 'required|numeric',
                'status' => 'required',
                'foto'  => 'mimes:jpg,jpeg,png,gif|max:1024'
            ],
            [
                'nama.required' => 'nama warga harus diisi..',
                'umur.required' => 'umur warga harus diisi..',
                'umur.numeric'  => 'umur warga harus berupa angka',
                'status.required'=> 'status pernikahan harus disi..',
                'foto.mimes'    => 'file yang anda upload bukan gambar',
                'foto.max'      => 'ukuran file gambar tidak boleh melebihi 1 MB',
            ]
        );

        $data_warga = [
            'nama'  => $request->nama,
            'umur'  => $request->umur,
            'status'  => $request->status,
        ];

        // cek gambar yg diupload
        if ($request->hasFile('foto')){
            $foto_file  = $request->file('foto');
            $foto_nama  = $foto_file->hashName();
            $foto_file->move(public_path('image'), $foto_nama);

            $data_warga['foto'] = $foto_nama;
        }

        Warga::create($data_warga);

        return redirect('warga/create')->with('info', 'Tambah data warga berhasil..');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Warga::where('id', $id)->first();
        return view('warga/edit-warga')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'nama'  => 'required',
                'umur'  => 'required|numeric',
                'status' => 'required',
            ],
            [
                'nama.required' => 'nama warga harus diisi..',
                'umur.required' => 'umur warga harus diisi..',
                'umur.numeric'  => 'umur warga harus berupa angka',
                'status.required'=> 'status pernikahan harus disi..',
            ]
        );

        $dataEdit = [
            'nama'  => $request->nama,
            'umur'  => $request->umur,
            'status'  => $request->status,
        ];

        // cek gambar yg diupload
        if ($request->hasFile('foto')){
            $request->validate([
                'foto'  => 'mimes:jpg,jpeg,png,gif|max:1024'
            ],[
                'foto.mimes'    => 'file yang anda upload bukan gambar',
                'foto.max'      => 'ukuran file gambar tidak boleh melebihi 1 MB',
            ]);
            $foto_file  = $request->file('foto');
            $foto_nama  = $foto_file->hashName();
            $foto_file->move(public_path('image'), $foto_nama);

            $data_warga = Warga::where('id', $id)->first();
            File::delete(public_path('image').'/'. $data_warga->foto);

            $dataEdit['foto'] = $foto_nama;
        }

        Warga::where('id', $id)->update($dataEdit);

        return redirect('warga')->with('info', 'Edit data warga berhasil..');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Warga::where('id', $id)->first();
        File::delete(public_path('image').'/'.$data->foto);
        Warga::where('id', $id)->delete();

        return redirect('/warga')->with('info', "Hapus data berhasil");
    }
}
