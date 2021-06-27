<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Pelanggan;

class pelangganserviceController extends Controller
{
    public function index (Request $request)
    {   
        $pelanggan = pelanggan::all();
        return view ('admin.pages.pelangganservice.index', compact('pelanggan'));
    }

    public function destroy($pelanggan){

        $pelanggan = pelanggan::findOrFail($pelanggan);

        $pelanggan->delete();
        return redirect ('admin/pelangganservice/')->with('success', 'Data berhasil dihapus!');;
    }
}
