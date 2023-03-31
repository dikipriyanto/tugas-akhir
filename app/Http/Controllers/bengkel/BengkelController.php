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
use App\Models\estimasi_biayas;
use App\Models\VerifyBengkel;
use Redirect;
use App\Models\riwayatPesanan;
use DB; 
use Carbon\Carbon; 
use Mail;

class BengkelController extends Controller
{
    public function index(Request $request)
    {   
        $id = $request->session()->get('id_bengkel');
        if($id !== null){
            $dataBengkel = bengkelservice::findOrFail($id);

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

            return view ('bengkel.pages.dashboard', compact('month_batal', 'month_selesai', 'month_total', 'dataBengkel'));

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

           $bengkelregister= bengkelservice::create(
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

            $verifybengkel = Verifybengkel::create([
                'bengkel_id' => $bengkelregister->id,
                'token' => sha1(time())
            ]);
        
            Mail::send('bengkel.pages.verifregister', ['token' => $verifybengkel->token , 'email' => $request->email], function($message) use($request){
                $message->to($request->email);
                $message->subject('Notifikasi Verifikasi Registrasi');
            });
        
       return redirect ('/login')->with('success', 'Pendaftaran berhasil. Silahkan cek email!');
    }


    public function verifyBengkel(Request $request, $token)
        {
        
            $verifyBengkel = DB::table('Verify_bengkels')->where(['token' => $request->token])->first();

            if(!$verifyBengkel == 0)
                return back()->withInput()->with('error', 'Invalid token!');
        
            $bengkelservice = bengkelservice::where('email', $request->email)
                ->update(['verified' => 1 ]);

            // bengkelservice::where('verified', '0');

                DB::table('Verify_bengkels')->where(['token'=> $request->token])->delete();
                $status = "Email Sudah DiVerifikasi. Silahkan Login!.";

                return redirect('/login')->with('status', $status);
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

                    $dataBengkelService = bengkelservice::where('email', $request->email)->first();
                    if($dataBengkelService->verified == 0 ){
                        return redirect('/login')->with('status','Kami mengirimkan kode aktivasi kepada Anda. Periksa email Anda dan klik tautan untuk memverifikasi');
                    }

                    if($dataBengkelService->status == 0 ){
                        return redirect('/')->with('warning','Akun anda telah dinonaktifkan');
                    }
    
                    return redirect ('/dashboard');
                    
                }else{
    
                    return redirect ('/login')->with('passwordsalah', 'Email atau Password salah !')->withInput($request->input());
                }
                
            }else{
    
                return redirect ('/login')->with('emailsalah', 'Email atau Password salah !!',)->withInput($request->input());
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
            $daftarpemesan = pemesanan::with('masalah_pesanan', 'jenis_pesanan', 'merek_pesanan','estimasi_biaya')
            ->where("id_bengkel_service","LIKE","%{$id}%")->whereNotIn('status_pesanan', ['selesai','batal'])->get();
            
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


    public function daftartransaksi(Request $request)
    {
        $id1 = $request->session()->get('id_bengkel');
        if($id1 !== null){

            $id = $request->session()->get('id_bengkel');
            $riwayatpemesan = pemesanan::where("id_bengkel_service","LIKE","%{$id}%")
            -> whereNotIn('status_pesanan', ['proses','request'])->get();

            // dd($riwayatpemesan);
            

            return view ('bengkel.pages.daftartransaksi', compact('riwayatpemesan'));

        }else{
            return redirect ('/login');
        }
    }

    public function searchtable(Request $request)
    {
        $id = $request->session()->get('id_bengkel');
        $riwayatpemesan = pemesanan::where("id_bengkel_service","LIKE","%{$id}%")
        ->whereNotIn('status_pesanan', ['request','proses']);

            $fromDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
            // $fromDate ='2023-01-01' ;
            // $toDate ='2023-01-06' ;
            // dd($fromDate);

            $riwayatpemesan = pemesanan::with('bengkelservice','estimasi_biaya')->select()
            ->where("id_bengkel_service","LIKE","%{$id}%")
            ->where('tanggal_pemesanan', '>=', $fromDate)
            ->where('tanggal_pemesanan', '<=', $toDate)
            ->whereNotIn('status_pesanan', ['request','proses'])->get();
            // dd($riwayatpemesan);

            return view ('bengkel.pages.daftartransaksi', compact('riwayatpemesan'));
    }

    public function forgotpasswordbengkel(Request $request)
    {
        return view ('bengkel.auth.forgotpassword');
    }

    public function postforgotpwdbengkel(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email|exists:pelanggan',
        // ]);

        $rules = [
            'email' => 'required|email|exists:bengkelservice',
        ];

        $message = [
            'required' => 'Harap di isi tidak boleh kosong!',
            'email' => 'Format harus Email',
            'exists' => 'Email Tidak Ditemukan',
        ];

        $validation = Validator::make($request->all(),$rules, $message);

        if($validation->fails()){

            return redirect()->back()->withErrors($validation->errors())->withInput($request->input());
        }


        
        $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVXWYZ';
        $length = 64;
        $token = substr(str_shuffle($str), 0, $length);
        // dd($token);
        
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        Mail::send('bengkel.auth.verif', ['token' => $token, 'email' => $request->email], function($message) use($request){
            $message->to($request->email);
            $message->subject('Notifikasi Reset Password!');
        });

        return back()->with('message', 'Reset password sudah dikirim harap cek email!');
    }

    public function getPasswordbengkel(Request $request, $token) 
    { 
        // return view('pelanggan.pages.reset', ['token' => $token]);
        return view('bengkel.auth.reset')->with(['token' => $token, 'email' => $request->email]);
    }
    
    public function updatePasswordbengkel(Request $request)
    {

        $rules = [
            'email' => 'required|email|exists:bengkelservice',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ];

        $message = [
            'required' => 'Harap di isi tidak boleh kosong!',
            'email' => 'Format harus Email',
            'exists' => 'Email tidak cocok!',
            'confirmed' => 'Password tidak sama!'
        ];
        
        $validation = Validator::make($request->all(),$rules, $message);

        if($validation->fails()){

            return redirect()->back()->withErrors($validation->errors())->withInput($request->input());
        }

        $updatePassword = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();

        if(!$updatePassword)
            return back()->withInput()->with('error', 'Invalid token!');
        
        $pelanggan = bengkelservice::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email'=> $request->email])->delete();
        
        return redirect('/login')->with('message', 'Password Berhasil Dirubah!');

    }

    public function closeOrder(Request $request) {
        $id = $request->session()->get('id_bengkel');
        $bengkel = bengkelservice::findOrFail($id);
        $status = $bengkel->available == 1 ? 0 : 1;
        
        $bengkel->update([
            "available" => $status
        ]);

        return redirect()->back();
    }

}
