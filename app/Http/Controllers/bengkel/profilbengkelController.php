<?php

namespace App\Http\Controllers\bengkel;

use Illuminate\Http\Request;
use App\Models\bengkelservice;
use App\Http\Controllers\Controller;
use Session;

class profilbengkelController extends Controller
{
    public function profil(request $request){
        
        $id = $request->session()->get('id_bengkel');
        $bengkelservice = bengkelservice::findOrFail($id);

        return view ('bengkel.pages.profil', compact('bengkelservice'));

    }
}
