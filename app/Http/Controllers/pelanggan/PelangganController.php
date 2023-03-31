<?php

namespace App\Http\Controllers\pelanggan;

use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Validator;
use App\Models\Pelanggan;
use App\Models\kategori_service;
use App\Models\bengkelservice;
use App\Models\Masalah;
use App\Models\Jenis;
use App\Models\Merek;
use App\Models\pemesanan;
use App\Models\status_service;
use App\Models\riwayatPesanan;
use DB; 
use Carbon\Carbon; 
use Mail;
use App\Models\rating;
use session;

class PelangganController extends Controller
{

    public function index(Request $request)
    {
        if(!empty(Pelanggan::where('email',$request->session()->get('email'))->first())){
            $pelanggan = Pelanggan::where('email',$request->session()->get('email'))->first();

            view('pelanggan.layout.app')->with('namaPelanggan', $pelanggan->nama);

            return view ('pelanggan.pages.index')->with([
                'pelanggan' => $pelanggan

            ]);
        } 
        
        $kategori_services = kategori_service::all();
       return view ('pelanggan.pages.index', compact('kategori_services'));
    } 

    public function postRegister(Request $request)
    {
        $rules = [
            'nama'=> 'required|regex:/^[a-zA-Z ]+$/',
            'alamat'=> 'required',
            'no_hp'=> 'required|unique:pelanggan|numeric|digits_between:10,13',
            'email'=> 'required|email|unique:pelanggan',
            'password'=> 'required|min:6',
            'konfirmasi_password'=> 'required|same:password',
        ];

        $message = [
            'required' => 'Form :attribute tidak boleh kosong!',
            'email' => 'Format email salah',
            'min' => ':attribute :min karakter',
            'same' => 'Password tidak sama!',
            'unique' => ':attribute sudah ada!',
            'regex' => ':attribute tidak boleh dengan angka!',
            'numeric' => ':attribute masukan dengan angka!',
            'digits_between' => 'No.Hp/Telepone harus minimal 10 karakter dan maksimal 13 karakter',
        ];

        $validation = Validator::make($request->all(),$rules, $message);

        if($validation->fails()){
            // dd($validation->errors());
            
            return redirect()->back()->withErrors($validation->errors())->withInput($request->input());
        }

        pelanggan::create(
            [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );

       return redirect ('/')->with('success', 'Pendaftaran berhasil. Silahkan login') ;
    } 

    public function postLogin(Request $request)
    {
        $kategori_services = kategori_service::all();

        $dataPelangganService = pelanggan::where('email', $request->email1)->first();
            // dd($dataPelangganService);
                
        if($dataPelangganService->status == 0 ){
            return redirect('/')->with('banned','Akun anda telah dinonaktifkan');
        }

        $rules = [
            'email1'=> 'required|email',
            'password1'=> 'required|min:6',
        ];

        $message = [
            'required' => 'Harap di isi tidak boleh kosong!',
            'min' => ':attribute tidak valid!',
        ];

        $validation = Validator::make($request->all(),$rules, $message);

        if($validation->fails()){

            return redirect()->back()->withErrors($validation->errors())->withInput($request->input());
        }

        if(!empty(Pelanggan::where('email', $request->email1)->first())){
            $pelanggan = Pelanggan::where('email', $request->email1)->first();
            // dd($request->password == $pelanggan->password);
            if(Hash::check($request->password1, $pelanggan->password)) {
                $request->session()->put('token_pelanggan', $this->token());
                $request->session()->put('namaPelanggan', $pelanggan->nama);
                $request->session()->put('emailPelanggan', $pelanggan->email);
                $request->session()->put('id_pelanggan', $pelanggan->id);

                Pelanggan::where('email', $request->email1)->update(
                    [
                        'token' => $request->session()->get('token_pelanggan')
                    ]
                );

                

                return view ('pelanggan.pages.index', compact('kategori_services'));

            }else{
                return redirect ('/')->with('passwordsalah', 'email atau password salah')->withInput($request->input());
            }
            
        }else{

            return redirect ('/')->with('emailsalah', 'email atau password salah')->withInput($request->input());
        }
                
        return view ('pelanggan.pages.index', compact('kategori_services'));

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
        $token = $request->session()->get('token_pelanggan');
        $pelanggan = Pelanggan::where('token', $token)->first();

        if($pelanggan !== null){
            $pelanggan->update([
                'token' => null
            ]);
        }

        $request->session()->flush();

        return redirect()->route ('pelanggan.index');
    }

    public function caribengkel(Request $request)
    {
        $caribengkel = $request->get('caribengkel');
        $bengkelservice = bengkelservice::all();

        
        if($caribengkel !== null){
            $bengkelservice = bengkelservice::withCount(['rating as rate' => function($query){
                $query->select(DB::raw('AVG(stars_rated)'));
            }])->where("nama_kategori","LIKE","%{$caribengkel}%")
            ->orderByDesc("rate")
            ->get();
        }
        

        return view ('pelanggan.pages.caribengkel', compact('bengkelservice'));
    }

    public function status(Request $request)
    {   
        $id1 = $request->session()->get('id_pelanggan');
        if($id1 !== null){
            $id = $request->session()->get('id_pelanggan');
            $status = pemesanan::where("id_pelanggan","LIKE","%{$id}%")->where('status_pesanan', 'proses')->orWhere('status_pesanan', 'request')->get();
            // dd($status);
            
            return view ('pelanggan.pages.status', compact('status'));
        }else{
            return redirect ('/')->with('gagalmasuk', ' Silahkan login') ;
        }
    }

    public function formpemesanan(Request $request, $id)
    {   
        $id1 = $request->session()->get('id_pelanggan');
        if($id1 !== null){
            $id_pelanggan = Pelanggan::findOrFail($request->session()->get('id_pelanggan'));
            
            $kategori = $request->kategori; 
            $masalah = Masalah::with('kategori_service')
            ->whereHas('kategori_service', function($query)use($request){
                $query->where('nama_kategori', $request->kategori);
            })->get();
        
             
            $jenis = Jenis::with('kategori_service')
            ->whereHas('kategori_service', function($query)use($request){
                $query->where('nama_kategori', $request->kategori);
            })->get();
    
        
            $merek = Merek::with('kategori_service')
            ->whereHas('kategori_service', function($query)use($request){
                $query->where('nama_kategori', $request->kategori);
            })->get();
    
            return view ('pelanggan.pages.pemesanan', compact('kategori','masalah','jenis','merek', 'id', 'id_pelanggan'));
        }else{
            return redirect ('/')->with('gagalmasuk', ' Silahkan login') ;
        }
       
    }

    public function riwayatpemesanan(Request $request)
    {
        $id1 = $request->session()->get('id_pelanggan');

        if($id1 !== null){
            
            $id = $request->session()->get('id_pelanggan');


            $riwayatpemesanan = pemesanan::with('Rating', "Rating.pelanggan")->where("id_pelanggan","LIKE","%{$id}%")-> whereNotIn('status_pesanan', ['proses','request']) ->get();
            // dd($riwayatpemesanan);
            return view ('pelanggan.pages.riwayat', compact('riwayatpemesanan'))->with('i', ($request->input('page', 1) - 1));
        }else{
            return redirect ('/')->with('gagalmasuk', ' Silahkan login') ;
        }
        
    }

    public function tentang()
    {
        return view('pelanggan.pages.tentang');
    }

    public function forgotpassword()
    {   
        return view ('pelanggan.pages.forgotpassword');
    }


    public function postforgotpwd(Request $request)
    {
        // $request->validate([
        //     'email' => 'required|email|exists:pelanggan',
        // ]);

        $rules = [
            'email' => 'required|email|exists:pelanggan',
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

        Mail::send('pelanggan.pages.verif', ['token' => $token, 'email' => $request->email], function($message) use($request){
            $message->to($request->email);
            $message->subject('Notifikasi Reset Password!');
        });

        return back()->with('message', 'Reset password sudah dikirim harap cek email!');
    }

    public function getPassword(Request $request, $token) 
    { 
        // return view('pelanggan.pages.reset', ['token' => $token]);
        return view('pelanggan.pages.reset')->with(['token' => $token, 'email' => $request->email]);
    }
    
    public function updatePassword(Request $request)
    {

        $rules = [
            'email' => 'required|email|exists:pelanggan',
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
        
        $pelanggan = pelanggan::where('email', $request->email)
            ->update(['password' => Hash::make($request->password)]);

            DB::table('password_resets')->where(['email'=> $request->email])->delete();
        
        return redirect('/')->with('message', 'Your password has been changed!');

    }

    public function addRating(Request $request)
    {   
        $stars_rated = $request->input('rated');
        // $id_bengkel = $request->input('id_bengkel');
        $id1 = $request->session()->get('id_pelanggan');

        Rating::create([
            'id_pemesanan' => $request->id_pemesanan,
            'id_bengkel' => $request->id_bengkel,
            'id_pelanggan' => $id1,
            'stars_rated' => $stars_rated,
            'review' => $request->review
        ]);

        return redirect('/riwayatpemesanan')->with('makasih', '#');
        
    }

    public function searchbengkel(Request $request)
    {
        $searchbengkel = $request->get('searchbengkel');
        // dd($searchbengkel);
        if($searchbengkel != ""){

            $bengkelservice = bengkelservice::withCount(['rating as rate' => function($query){
                $query->select(DB::raw('AVG(stars_rated)'));
            }])->where("nama_kategori","LIKE","%{$searchbengkel}%")
            ->orderByDesc("rate")->where('nama_kategori','LIKE',"%$searchbengkel%")
            ->orWhere('nama_jasa_service','LIKE',"%$searchbengkel%")
            ->orWhere('alamat_lengkap','LIKE',"%$searchbengkel%")->get();

            // dd($bengkelservice);

        }else{
            $bengkelservice = bengkelservice::all();

            $bengkelservice = bengkelservice::withCount(['rating as rate' => function($query){
                $query->select(DB::raw('AVG(stars_rated)'));
            }])->where("nama_kategori","LIKE","%{$searchbengkel}%")
            ->orderByDesc("rate")
            ->get();
        }

        return view('pelanggan.pages.searchbengkel', compact('bengkelservice','searchbengkel'));
    }

}
