<?php

namespace App\Http\Controllers\bengkel;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\kategori_service; 
use App\Models\bengkelservice; 
use Illuminate\Http\RedirectResponse;
use Validator;
use App\Models\masalah;
use App\Models\masalah_pesanan;
use App\Models\Pemesanan;
use App\Models\jenis_pesanan;
use App\Models\merek_pesanan;
use App\Models\estimasi_biaya;
use Redirect;
use App\Models\riwayatPesanan;

class BengkelController extends Controller
{
    public function index(Request $request)
    {   
        if(!empty(bengkelservice::where('email',$request->session()->get('email'))->first())){
            $bengkelservice = bengkelservice::where('email',$request->session()->get('email'))->first();

            view('bengkel.layout.app')->with('namabengkel', $bengkelservice->nama_lengkap);

            return view ('bengkel.pages.dashboard')->with([
                'bengkelservice' => $bengkelservice
            ]);
        } 

        return view ('bengkel.pages.dashboard');
    }

    public function register()
    {
        $kategori_services = kategori_service::all();
        return view ('bengkel.auth.register', compact('kategori_services'));

    }

    public function loginbengkel()
    {
        return view ('bengkel.auth.login');
    }

    public function postregister(Request $request)
    {
        $rules = [
            'nama_lengkap'=> 'required',
            'nama_jasa_service'=> 'required',
            'alamat_lengkap'=> 'required',
            'no_telepon'=> 'required|unique:bengkelservice',
            'nama_kategori'=> 'required',
            'email'=> 'required|email|unique:bengkelservice',
            'password'=> 'required|min:6',
            'konfirmasi_password'=> 'required|same:password',
            // 'logo'=> 'required',
            'deskripsi'=> 'required',
        ];

        $message = [
            'required' => 'Form :attribute tidak boleh kosong!',
            'email' => 'Format email salah',
            'min' => ':attribute :min karakter',
            'same' => 'Password tidak sama!',
            'unique' => ':attribute sudah ada!'
        ];

        $validation = Validator::make($request->all(),$rules, $message);

        if($validation->fails()){
            
            return redirect()->back()->withErrors($validation->errors());
        }

        bengkelservice::create(
            [
                'nama_lengkap' => $request->nama_lengkap,
                'nama_jasa_service' => $request->nama_jasa_service,
                'alamat_lengkap' => $request->alamat_lengkap,
                'no_telepon' => $request->no_telepon,
                'nama_kategori' => $request->nama_kategori,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                // 'logo' => $request->logo,
                'deskripsi' => $request->deskripsi,
            ]
        );
        
       return redirect ('/login')->with('success', 'Pendaftaran berhasil. Silahkan login!');
    }

    public function postlogin(Request $request)
    {
        $rules = [
            'email'=> 'required|email',
            'password'=> 'required|min:6',
        ];

        $message = [
            'required' => 'Form :attribute tidak boleh kosong!',
            'min' => ':attribute harus 6 karakter!',
        ];

        $validation = Validator::make($request->all(),$rules, $message);

        if($validation->fails()){
            // dd($validation->errors());
            
            return redirect()->back()->withErrors($validation->errors());
        }

        if(!empty(bengkelservice::where('email', $request->email)->first())){
            $bengkelservice = bengkelservice::where('email', $request->email)->first();
            if(Hash::check($request->password, $bengkelservice->password)) {
                $request->session()->put('token_bengkel', $this->token());
                $request->session()->put('namabengkel', $bengkelservice->nama_lengkap);
                $request->session()->put('emailbengkel', $bengkelservice->email);
                $request->session()->put('id_bengkel', $bengkelservice->id);

                bengkelservice::where('email', $request->email)->update(
                    [
                        'token' => $request->session()->get('token_bengkel')
                    ]
                );

                return redirect ('/dashboard');
            }
            
        }else{

            return redirect ('/login')->with('gagallogin', 'email atau password salah') ;
        }
        
        return view ('bengkel.auth.login');
    }

    public function token()
    {
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXWYZ';
        $length = 12;
        $code = substr(str_shuffle($str), 0, $length);

        return $code; 
    } 

    public function logout(Request $request)
    {
        $token = $request->session()->get('token_bengkel');
        $bengkelservice = bengkelservice::where('token', $token)->first();

        if($bengkelservice !== null){
            $bengkelservice->update([
                'token' => null
            ]);
        }

        $request->session()->flush();

        return redirect('/login');
    }

    public function daftarPemesanan(Request $request)
    {   
        $id = $request->session()->get('id_bengkel');
        $daftarpemesan = pemesanan::with('masalah_pesanan', 'jenis_pesanan', 'merek_pesanan')->where("id_bengkel_service","LIKE","%{$id}%")->get();

        return view ('bengkel.pages.daftarpemesanan', compact('daftarpemesan'));
    }

    public function editPesanan(Request $request, $daftarpemesan)
    {
        $daftarpemesan = pemesanan::find($daftarpemesan);
        
        return view ('bengkel.pages.editpesanan', compact('daftarpemesan'));   
    }

    public function updatePesanan(Request $request)
    {
        $daftarpemesan = pemesanan::where('id',$request->id);
        $daftarpemesan->update([
            'status_pesanan' => $request->status_pesanan,
        ]);

        // $estimasi_biaya = estimasi_biaya::create([
        //     'biaya_service' => $request->biaya_service,
        //     'biaya_sparepart' => $request->biaya_sparepart,
        //     'biaya_kedatangan' => $request->biaya_kedatangan,
        //     'total_biaya' => $request->total_biaya,
        //     'id_pesanan'=> $request->id,
        // ]);
        // dd($daftarpemesan);
        return redirect ('/daftarpemesanan');   
    }

    public function estimasiBiaya(Request $request)
    {
        $daftarpemesan = pemesanan::where('id',$request->id);
        $estimasi_biaya = estimasi_biaya::create([
            'biaya_service' => $request->biaya_service,
            'biaya_sparepart' => $request->biaya_sparepart,
            'biaya_kedatangan' => $request->biaya_kedatangan,
            'total_biaya' => $request->total_biaya,
            'id_pesanan'=> $request->id,
        ]);
        // dd($daftarpemesan);
        // return redirect ('/daftarpemesanan');
        return Redirect::back(); 
    }

    public function editBiaya(Request $request, $editbiaya)
    {
        $editbiaya = estimasi_biaya::find($editbiaya);
        // dd($editbiaya);
        return view ('bengkel.pages.editbiaya', compact('editbiaya'));
    }

    public function updateBiaya(Request $request)
    {
        $editbiaya = estimasi_biaya::where('id',$request->id);
        $editbiaya->update([
            'biaya_service' => $request->biaya_service,
            'biaya_sparepart' => $request->biaya_sparepart,
            'biaya_kedatangan' => $request->biaya_kedatangan,
            'total_biaya' => $request->total_biaya,
        ]);

        return redirect('/daftarpemesanan');
        // return redirect()->route('editpesanan', ['$id']);
    }

    public function hapusBiaya (Request $request)
    {
        $hapusbiaya = estimasi_biaya::where('id',$request->id);
        $hapusbiaya->delete();
        // dd($hapusbiaya);

        // return redirect ('/daftarpemesanan');
        return Redirect::back();
    }

    public function hapusPesanan(Request $request)
    {
        $total_biaya = estimasi_biaya::where("id_pesanan","LIKE","%{$request->id}%")->first('total_biaya');
        $daftarpemesan = pemesanan::findOrFail($request->id);

        $riwayatpesanan = riwayatpesanan::create([
            'id_bengkel_service' => $daftarpemesan->id_bengkel_service,
            'id_pelanggan' => $daftarpemesan->id_pelanggan,
            'kode_pemesanan' => $daftarpemesan->kode_pemesanan,
            'nama_pemesan' => $daftarpemesan->nama_pemesan,
            'tanggal_pemesanan' => $daftarpemesan->tanggal_pemesanan,
            'status_pesanan' => $daftarpemesan->status_pesanan,
            'total_biaya' => $total_biaya->total_biaya,
        ]);

        $hapuspesanan = pemesanan::findOrFail($request->id);
        $hapuspesanan->delete();
        // dd($total_biaya);
        
        return redirect ('/daftarpemesanan');
    }

    public function riwayatpesanan(Request $request)
    {
        $id = $request->session()->get('id_bengkel');
        $riwayatpemesan = riwayatpesanan::where("id_bengkel_service","LIKE","%{$id}%")->get();

        return view ('bengkel.pages.riwayat', compact('riwayatpemesan'));
    }

    
}
