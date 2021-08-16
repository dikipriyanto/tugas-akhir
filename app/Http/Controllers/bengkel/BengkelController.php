<?php

namespace App\Http\Controllers\bengkel;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Models\kategori_service; 
use App\Models\bengkelservice; 
use Illuminate\Http\RedirectResponse;
use Validator;
use App\Models\masalah;
use App\Models\masalah_pesanan;
use App\Models\pemesanan;
use App\Models\jenis_pesanan;
use App\Models\merek_pesanan;
use App\Models\estimasi_biaya;
use Redirect;
use App\Models\riwayatPesanan;

class BengkelController extends Controller
{
    public function index(Request $request)
    {   
        $id = $request->session()->get('id_bengkel');
        if($id !== null){

            if(!empty(bengkelservice::where('email',$request->session()->get('email'))->first())){
                $bengkelservice = bengkelservice::where('email',$request->session()->get('email'))->first();

                view('bengkel.layout.app')->with('namabengkel', $bengkelservice->nama_lengkap);

                return view ('bengkel.pages.dashboard')->with([
                    'bengkelservice' => $bengkelservice
                ]);
            } 

            $currentYear = date('Y');
            // $id = $request->session()->get('id_bengkel');

            $riwayatpemesan_total = pemesanan::select(
                \DB::raw('count(*) as total'),
                \DB::raw('MONTH(created_at) as month')
            )->whereYear('created_at', $currentYear)->groupby('month')->where("id_bengkel_service","LIKE","%{$id}%")
            ->get();

            $riwayatpemesan_selesai = pemesanan::select(
                \DB::raw('count(*) as total'),
                \DB::raw('MONTH(created_at) as month')
            )->whereYear('created_at', $currentYear)->where('status_pesanan', 'selesai')->groupby('month')->where("id_bengkel_service","LIKE","%{$id}%")
            ->get();

            $riwayatpemesan_batal = pemesanan::select(
                \DB::raw('count(*) as total'),
                \DB::raw('MONTH(created_at) as month')
            )->whereYear('created_at', $currentYear)->where('status_pesanan', 'batal')->groupby('month')->where("id_bengkel_service","LIKE","%{$id}%")
            ->get();

            $month_total = [0,0,0,0,0,0,0,0,0,0,0,0];
            $month_selesai = [0,0,0,0,0,0,0,0,0,0,0,0];
            $month_batal = [0,0,0,0,0,0,0,0,0,0,0,0];

            foreach($riwayatpemesan_total as $total){
                $month_total[$total->month - 1] = $total->total;
            };

            foreach($riwayatpemesan_selesai as $selesai){
                $month_selesai[$selesai->month - 1] = $selesai->total;
            };

            foreach($riwayatpemesan_batal as $batal){
                $month_batal[$batal->month - 1] = $batal->total;
            };

            return view ('bengkel.pages.dashboard', compact('month_batal', 'month_selesai', 'month_total'));

        }else{
            return redirect ('/login');
        }

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
            'nama_lengkap'=> 'required|regex:/^[a-zA-Z ]+$/',
            'nama_jasa_service'=> 'required',
            'alamat_lengkap'=> 'required',
            'no_telepon'=> 'required|unique:bengkelservice|numeric|digits_between:10,13',
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
            'unique' => ':attribute sudah ada!',
            'numeric' => ':attribute masukan dengan angka!',
            'regex' => ':attribute tidak boleh dengan angka!',
            'digits_between' => 'No.Hp/Telepone harus minimal 10 karakter dan maksimal 13 karakter',
        ];

        $validation = Validator::make($request->all(),$rules, $message);

        if($validation->fails()){
            
            return redirect()->back()->withErrors($validation->errors())->withInput($request->input());
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
            'email' => 'password salah',
        ];

        $validation = Validator::make($request->all(),$rules, $message);

        if($validation->fails()){
            // dd($validation->errors());
            
            return redirect()->back()->withErrors($validation->errors())->withInput($request->input());
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
                
            }else{

                return redirect ('/login')->with('passwordsalah', 'Email atau Password salah !')->withInput($request->input());
            }
            
        }else{

            return redirect ('/login')->with('emailsalah', 'Email atau Password salah !')->withInput($request->input());
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
        if($id !== null){

            $id = $request->session()->get('id_bengkel');
            $daftarpemesan = pemesanan::with('masalah_pesanan', 'jenis_pesanan', 'merek_pesanan','estimasi_biaya')->where("id_bengkel_service","LIKE","%{$id}%")->get();
            // dd($id);
            return view ('bengkel.pages.daftarpemesanan', compact('daftarpemesan'));
        
        }else{
            return redirect ('/login');
        }
    }


    public function editPesanan(Request $request, $daftarpemesan)
    {
        $daftarpemesan = pemesanan::with('masalah_pesanan', 'jenis_pesanan', 'merek_pesanan','estimasi_biaya')->find($daftarpemesan);
        // dd($daftarpemesan);
        
        return view ('bengkel.pages.editpesanan', compact('daftarpemesan'));   
    }

    public function updatePesanan(Request $request)
    {
        $daftarpemesan = pemesanan::where('id',$request->id);
        $daftarpemesan->update([
            'status_pesanan' => $request->status_pesanan,
        ]);

        return redirect ('/daftarpemesanan');   
    }

    public function estimasiBiaya(Request $request)
    {
        $daftarpemesan = pemesanan::where('id',$request->id);
        if($request->estimasi_biaya_id == null){
            $estimasi_biaya = estimasi_biaya::create([
                'biaya_service' => $request->biaya_service,
                'biaya_sparepart' => $request->biaya_sparepart,
                'biaya_kedatangan' => $request->biaya_kedatangan,
                'total_biaya' => $request->total_biaya,
                'id_pesanan'=> $request->id,
            ]);
        }else{
            $estimasi_biaya = estimasi_biaya::findOrFail($request->estimasi_biaya_id);
            $estimasi_biaya->update([
                'biaya_service' => $request->biaya_service,
                'biaya_sparepart' => $request->biaya_sparepart,
                'biaya_kedatangan' => $request->biaya_kedatangan,
                'total_biaya' => $request->total_biaya,
                'id_pesanan'=> $request->id,
            ]);
        }
    
        return redirect ('/daftarpemesanan');  
        // return view ('bengkel.pages.editpesanan', compact('daftarpemesan'));  
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
    }


    public function riwayatpesanan(Request $request)
    {
        $id = $request->session()->get('id_bengkel');
        $riwayatpemesan = riwayatpesanan::where("id_bengkel_service","LIKE","%{$id}%")->get();

        return view ('bengkel.pages.riwayat', compact('riwayatpemesan'));
    }

    
}
