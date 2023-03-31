<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\bengkelservice;
use Illuminate\Pagination\Paginator;

class PenggunabengkelController extends Controller
{
    public function index (Request $request)
    {   
        $bengkelservice = bengkelservice::all();
        return view ('admin.pages.penggunabengkel.index', compact('bengkelservice'));
    }

    public function destroy($bengkelservice){

        $bengkelservice = bengkelservice::findOrFail($bengkelservice);

        $bengkelservice->delete();
        return redirect ('admin/penggunabengkel/')->with('success', 'Data berhasil dihapus!');;
    }

    public function updatestatus(Request $request){
        $bengkelservice = bengkelservice::where('id',$request->id);

        $bengkelservice->update([
            'status' => $request->status,
        ]);
        // dd($bengkelservice);
        return redirect ('admin/penggunabengkel/');
    }

}
