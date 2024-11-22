<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function uploadPhoto(Request $r){
        $nama_foto = $r->image_name;

        if ($r->hasFile('image_input')) {
            $image = $r->file('image_input');

            $image_name_with_extension = $nama_foto . '.' . $image->getClientOriginalExtension();

            $image->storeAs('public', $image_name_with_extension);

            Photo::create([
                'nama' => $nama_foto,
                'path_photo' => $image_name_with_extension,
            ]);

            return redirect()->route('home');
        } else {
            return redirect()->route('home');
        }
    }
}
