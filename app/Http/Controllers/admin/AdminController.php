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
        
        return view ('admin.pages.dashboard_admin');
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
}
    
