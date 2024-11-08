<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getData(Request $r) {
        $data = Anggota::all(); // Dari database
        // dd($data);
        return view('profile', ['anggota' => $data]); // membawa data ke view
    }

    public function postData(Request $r) {
        $nama = $r->nama;
        $umur = $r->umur;
        $telp = $r->telp;
        // dd($nama, $umur, $telp);

        Anggota::create([
            'nama' => $nama,
            'umur' => $umur,
            'telp' => $telp
        ]);

        return redirect()->route('read_data_to_profile');
    }

    public function deleteData(Request $r) {
        $anggotaId = $r->id;
        Anggota::where('id', $anggotaId)->delete();
        return redirect()->route('read_data_to_profile');
    }

    public function putData(Request $r) {
        $id = $r->id;
        $nama = $r->nama;
        $umur = $r->umur;
        $telp = $r->telp;

        // Anggota::where('id', $id)->update([
        //     'nama' => $nama,
        //     'umur' => $umur,
        //     'telp' => $telp
        // ]);

        $anggota = Anggota::find($id);
        $anggota->nama = $nama;
        $anggota->umur = $umur;
        $anggota->telp = $telp;
        $anggota->save();

        return redirect()->route('read_data_to_profile');
    }
}
