<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getData(Request $r)
    {
        $data = Anggota::all(); // Dari database
        // dd($data);
        return view('profile', ['anggota' => $data]); // membawa data ke view
    }

    public function postData(Request $r)
    {
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

    public function deleteData(Request $r)
    {
        $anggotaId = $r->id;
        Anggota::where('id', $anggotaId)->delete();
        return redirect()->route('read_data_to_profile');
    }

    public function putData(Request $r)
    {
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

    public function searchData(Request $r)
    {
        if ($r->ajax()) {
            $name_searched = $r->name;

            $query = Anggota::where('nama', 'LIKE',  '%' . $name_searched . '%')->get();

            $output = '';

            foreach ($query as $data) {
                $output .= "<tr>
                    <th scope='row'>" . $data->id . "</th>
                    <td>" . $data->nama . "</td>
                    <td>" . $data->umur . " </td>
                    <td>" . $data->telp . " </td>
                    <td>
                        <form action='" . route('delete_data', $data->id) . "' method='POST'>
                            " . csrf_field() . "
                            " . method_field('delete') . "
                            <button type='button' class='btn btn-warning' data-bs-toggle='modal' data-bs-target='#modal" . $data->id . "'>
                                Edit
                            </button>
                            <input type='submit' value='Delete' class='btn btn-danger'>
                        </form>
                    </td>
                    <div class='modal fade' id='modal" . $data->id . "' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <h1 class='modal-title fs-5' id='exampleModalLabel'>Edit Data</h1>
                                    <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                </div>
                                <div class='modal-body'>
                                    <form action='" . route('update_data', $data->id) . "' method='POST' class='ms-3' style='width: 500px;'>
                                        " . csrf_field() . "
                                        " . method_field('PUT') . "
                                        <div class='mb-3' class='w-50'>
                                            <label for='' class='form-label'>Nama</label>
                                            <input type='text' name='nama' class='form-control' value='" . $data->nama . "'>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='' class='form-label'>Umur</label>
                                            <input type='text' name='umur' class='form-control' value='" . $data->umur . "'>
                                        </div>
                                        <div class='mb-3'>
                                            <label for='' class='form-label'>Telp</label>
                                            <input type='text' name='telp' class='form-control' value='" . $data->telp . "'>
                                        </div>
                                        <input type='submit' value='Update Data' class='btn btn-primary'>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>";
            }

            return response()->json(['output' => $output]);
        }
    }
}
