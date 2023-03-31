<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\admin; 
use App\Models\riwayatPesanan;
use App\Models\Pemesanan;
use App\Models\estimasi_biayas;
use App\Models\bengkelservice;
use App\Models\Pelanggan; 




class AdminController extends Controller
{
    public function index(Request $request)
    {
        if(!empty(admin::where('email',$request->session()->get('email'))->first())){
            $admin = admin::where('email',$request->session()->get('email'))->first();

            view('admin.layout.app')->with('namaadmin', $admin->nama);

            return view ('admin.pages.dashboard_admin')->with([
                'admin' => $admin
            ]);
        }
        
        $totalPemesanan = pemesanan::count();
        $pesananBerlangsung = pemesanan::all('status_pesanan')
        ->WhereNotIn('status_pesanan', ['selesai','batal','request'])->count();

        $pesananRequest = pemesanan::all('status_pesanan')
        ->WhereNotIn('status_pesanan', ['selesai','batal','proses'])->count();

        $pesananSelesai = pemesanan::all('status_pesanan')
        ->WhereNotIn('status_pesanan', ['request','batal','proses'])->count();

        $pesananBatal = pemesanan::all('status_pesanan')
        ->WhereNotIn('status_pesanan', ['request','selesai','proses'])->count();

        $totalBengkel = bengkelservice::count();
        $totalPelanggan = pelanggan::count();
        
        return view ('admin.pages.dashboard_admin', compact('totalPemesanan', 'pesananBerlangsung','totalBengkel','totalPelanggan',
                    'pesananRequest','pesananSelesai','pesananBatal'));
    }

    public function register()
    {
        return view ('admin.auth.register');

    }

    public function loginadmin()
    {
        return view ('admin.auth.login');
    }

    public function postregister(Request $request)
    {
        $rules = [
            'email'=> 'required|email|unique:admin',
            'password'=> 'required|min:6',
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

        admin::create(
            [
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]
        );
        
       return redirect ('/admin/login');
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

        if(!empty(admin::where('email', $request->email)->first())){
            $admin = admin::where('email', $request->email)->first();
            if(Hash::check($request->password, $admin->password)) {
                $request->session()->put('token_admin', $this->token());
                $request->session()->put('namaadmin', $admin->nama);
                $request->session()->put('emailadmin', $admin->email);

                admin::where('email', $request->email)->update(
                    [
                        'token' => $request->session()->get('token_admin')
                    ]
                );

                return redirect ('/dashboard_admin');
            }
            
        }else{

            return redirect ('/admin/login')->with('gagallogin', 'email atau password salah') ;
        }
        
        return view ('admin.auth.login');
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
        $token = $request->session()->get('token_admin');
        $admin = admin::where('token', $token)->first();

        if($admin !== null){
            $admin->update([
                'token' => null
            ]);
        }

        $request->session()->flush();

        return redirect('/admin/login');
    }

    public function datatransaksi (Request $request)
    {
        $keloladatapemesanan = pemesanan::all();
        // dd($datatransaksi);

        return view ('admin.pages.datapemesanan', compact('keloladatapemesanan'));
    }

    public function searchtanggal(Request $request)
    {
        $keloladatapemesanan = pemesanan::whereNotIn('status_pesanan', ['request','proses']);

            $fromDate = $request->input('fromDate');
            $toDate = $request->input('toDate');
            // $fromDate ='2023-01-01' ;
            // $toDate ='2023-01-06' ;
            // dd($fromDate);

            $keloladatapemesanan = pemesanan::with('bengkelservice','estimasi_biaya')->select()
            ->where('tanggal_pemesanan', '>=', $fromDate)
            ->where('tanggal_pemesanan', '<=', $toDate)
            ->whereNotIn('status_pesanan', ['request','proses'])->get();
            // dd($riwayatpemesan);

            return view ('admin.pages.datapemesanan', compact('keloladatapemesanan'));
    }

    public function editadmin(Request $request)
    {
        $editadmin = admin::first();
        
        return view ('admin.pages.editadmin', compact('editadmin'));
    }

    public function editadminupdate(Request $request)
    {
        $rules = [
            'email'=> 'required|email|unique:bengkelservice',
            'password'=> 'required|min:6',
            'konfirmasi_password'=> 'required|same:password',
        ];

        $message = [
            'required' => 'Form :attribute tidak boleh kosong!',
            'email' => 'Format email salah',
            'min' => ':attribute :min karakter',
            'same' => 'Password tidak sama!',
            'digits_between' => 'No.Hp/Telepone harus minimal 10 karakter dan maksimal 13 karakter',
        ];

        $validation = Validator::make($request->all(),$rules, $message);
        if($validation->fails()){
            
            return redirect()->back()->withErrors($validation->errors())->withInput($request->input());
        }

        $editadmin = admin::first();
        $editadmin->update(
                [
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                ]
            );
        
            return redirect()->back()->with('message', 'Data Berhasil Disimpan!');
    }
}
    
