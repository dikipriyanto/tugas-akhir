<?php

namespace App\Http\Controllers\pelanggan;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Models\Pelanggan;
use App\Models\kategori_service;
use App\Models\bengkelservice;
use App\Models\Masalah;
use App\Models\Jenis;
use App\Models\Merek;
use App\Models\pemesanan;
use App\Models\status_service;

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
            'nama'=> 'required',
            'alamat'=> 'required',
            'no_hp'=> 'required|unique:pelanggan',
            'email'=> 'required|email|unique:pelanggan',
            'password'=> 'required|min:8',
            'konfirmasi_password'=> 'required|same:password',
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
            // dd($validation->errors());
            
            return redirect()->back()->withErrors($validation->errors());
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
        // $this->validate($request, [
        //     'email'=> 'required|email',
        //     'password'=> 'required|min:8',

        // ]);
        $kategori_services = kategori_service::all();

        $rules = [
            'email'=> 'required|email',
            'password'=> 'required|min:8',
        ];

        $message = [
            'required' => 'Form :attribute tidak boleh kosong!',
            'min' => ':attribute tidak valid!',
        ];

        $validation = Validator::make($request->all(),$rules, $message);

        if($validation->fails()){

            return redirect()->back()->withErrors($validation->errors());
        }

        if(!empty(Pelanggan::where('email', $request->email)->first())){
            $pelanggan = Pelanggan::where('email', $request->email)->first();
            if(Hash::check($request->password, $pelanggan->password)) {
                $request->session()->put('token_pelanggan', $this->token());
                $request->session()->put('namaPelanggan', $pelanggan->nama);
                $request->session()->put('emailPelanggan', $pelanggan->email);

                Pelanggan::where('email', $request->email)->update(
                    [
                        'token' => $request->session()->get('token_pelanggan')
                    ]
                );

                return view ('pelanggan.pages.index', compact('kategori_services'));
            }
            
        }else{

            return redirect ('/')->with('gagallogin', 'email atau password salah') ;
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
            $bengkelservice = bengkelservice::where("nama_kategori","LIKE","%{$caribengkel}%")->get();
        }
        return view ('pelanggan.pages.caribengkel', compact('bengkelservice'));
    }

    public function status(Request $request)
    {   
        $status = status_service::all();
        // dd($status);
        return view ('pelanggan.pages.status', compact('status'));
    }

    public function formpemesanan(Request $request, $id)
    {   
        $kategori = $request->kategori; 
        $masalah = Masalah::with('kategori_service')
        ->whereHas('kategori_service', function($query)use($request){
            $query->where('nama_kategori', $request->kategori);
        })->get();
        // dd($masalah);
        
         
        $jenis = Jenis::with('kategori_service')
        ->whereHas('kategori_service', function($query)use($request){
            $query->where('nama_kategori', $request->kategori);
        })->get();

    
        $merek = Merek::with('kategori_service')
        ->whereHas('kategori_service', function($query)use($request){
            $query->where('nama_kategori', $request->kategori);
        })->get();

        return view ('pelanggan.pages.pemesanan', compact('kategori','masalah','jenis','merek', 'id'));

    }
}
