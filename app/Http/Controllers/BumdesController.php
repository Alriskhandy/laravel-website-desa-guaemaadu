<?php

namespace App\Http\Controllers;

use App\Models\Bumdes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BumdesController extends Controller
{
    function index()
    {
        $profil = Bumdes::findOrFail(1);
        $struktur = Bumdes::findOrFail(2);
        return view('pages.bumdes.index', compact('profil', 'struktur'));
    }

    function dashboard()
    {
        $profil = Bumdes::findOrFail(1);
        $struktur = Bumdes::findOrFail(2);
        $produk = Bumdes::where('id', '!=', 1)->where('id', '!=', 2)->get();

        return view('admin.bumdes.index', compact('profil', 'struktur', 'produk'));
    }

    function updateProfil(Request $request)
    {
        $data = Bumdes::findOrFail(1);
        $rules = $request->validate([
            'isi' => ['nullable'],
        ]);

        $data->where('id', $data->id)->update($rules);
        return redirect()->route('admin.bumdes')->with('success', 'Data Berhasil Di Ubah');
    }

    function updateStruktur(Request $request)
    {
        $rules = $request->validate([
            'gambar' => 'image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $struktur = Bumdes::findOrFail(2);

        if ($request->file('gambar')) {
            if ($request->gambarlama) {
                Storage::delete($request->gambarlama);
            }

            $rules['gambar'] = $request->file('gambar')->store('StrukturBumdes');
        }


        $struktur->update($rules);
        return redirect()->route('admin.bumdes')->with('success', $struktur->nama . ' Berhasil Di Ubah');
    }
}
