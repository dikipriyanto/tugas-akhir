<?php

namespace App\Http\Controllers\bengkel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\bengkelservice;
use App\Http\Controllers\Controller;
use Session;
use Validator;
use Storage;
use Carbon\Carbon;
use Cloudinary;

class profilbengkelController extends Controller
{
    public function profil(request $request){
        
        $id = $request->session()->get('id_bengkel');
        $bengkelservice = bengkelservice::findOrFail($id);

        return view ('bengkel.pages.profil', compact('bengkelservice'));

    }

    public function editprofil(request $request){

        $id = $request->session()->get('id_bengkel');
        $bengkelservice = bengkelservice::findOrFail($id);

        return view ('bengkel.pages.editprofil', compact('bengkelservice'));
    }

    public function updateprofil(request $request, $bengkelservice){

        $id = $request->session()->get('id_bengkel');
        $bengkelservice = bengkelservice::findOrFail($id);

        if($request->logo){
            $fileName = Carbon::now()->format('Y-m-d H:i:s').'-'.$request->nama_jasa_service;
            
            
            if($bengkelservice->public_id !== null){
                Cloudinary::destroy($bengkelservice->public_id);
            }
            
            $uploadedFile = $request->file('logo')->storeOnCloudinaryAs('logo',$fileName);
            
            $logo = $uploadedFile->getSecurePath();
            $public_id = $uploadedFile->getPublicId();
        }

        // dd($public_id);

        $bengkelservice->update([
            'nama_lengkap' => $request->nama_lengkap,
            'nama_jasa_service' => $request->nama_jasa_service,
            'alamat_lengkap' => $request->alamat_lengkap,
            'no_telepon' => $request->no_telepon,
            'email' => $request->email,
            'deskripsi' => $request->deskripsi,
            'logo' => $request->logo ? $logo : $bengkelservice->logo,
            'public_id' => $request->logo ? $public_id : $bengkelservice->public_id,
        ]);

        return view ('bengkel.pages.profil', compact('bengkelservice'));
    }

    public function gantipassword(request $request)
    {

        $id = $request->session()->get('id_bengkel');
        $bengkelservice = bengkelservice::findOrFail($id);

        return view('bengkel.pages.gantipassword',compact('bengkelservice'));
    }

    public function updatepassword(request $request)
    {
        $id = $request->session()->get('id_bengkel');
        $bengkelservice = bengkelservice::findOrFail($id);
        
        $this->validate($request, [
            'password_lama' => 'required',
            'password' => 'required|string|min:6',
            'ulangi_password' => 'required|same:password',    
        ]);
        
        if (!Hash::check($request->password_lama, $bengkelservice->password)) {
            return back()->with('error', 'Password Tidak Cocok!');
        }

        $bengkelservice->password = Hash::make($request->password);
        $bengkelservice->save();

        return back()->with('success', 'Password Berhasil di ubah!');

    }
}
