<?php

namespace App\Http\Controllers\pelanggan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\masalah;
use App\Models\masalah_pesanan;
use App\Models\Pemesanan;
use App\Models\bengkelservice;
use App\Models\jenis_pesanan;
use App\Models\merek_pesanan;
use App\Models\status_service;

class PesananController extends Controller
{
    public function buatPesanan(Request $request){
        $bengkelservice = bengkelservice::findOrFail($request->bengkel_id);
        // dd($bengkelservice);
        $pesanan = Pemesanan::create([
            'kode_pemesanan' => $request->kode_pemesanan = mt_rand(1111, 9999),
            'nama_pemesan' => $request->nama_pemesan,
            'no_wa' => $request->no_wa,
            'tanggal_pemesanan' => $request->tanggal_pemesanan,
            'kecamatan' => $request->kecamatan,
            'kelurahan' => $request->kelurahan,
            'alamat' => $request->alamat,
            'id_bengkel_service' => $bengkelservice->id,
            'informasi_tambahan' => $request->informasi_tambahan,
        ]);

        // foreach ($request->masalah as $index => $masalah) {
        //     // echo $masalah.'<br>';
        //     PesananMsalah::create([
        //         'nama_masalah' => $masalah,
        //         'id_pesanan' => $pesanan->id
        //     ]);
        // };

        foreach ($request ->masalah as $masalah){
            masalah_pesanan::create([
                'nama_masalah' => $masalah,
                'id_pesanan' => $pesanan->id,
            ]);
        }

        foreach ($request -> jenis as $jenis){
            jenis_pesanan::create([
                'nama_jenis' => $jenis,
                'id_pesanan' => $pesanan->id,
            ]);
        }

        foreach ($request -> merek as $merek){
            merek_pesanan::create([
                'nama_merek' => $merek,
                'id_pesanan' => $pesanan->id,
            ]);
        }

        $status = status_service::create([
            'id_pesanan' => $pesanan->id,
            'nama_pelanggan' => $pesanan->nama_pemesan,
            'tanggal_pemesanan' => $pesanan->tanggal_pemesanan,
            
        ]);

        return redirect ('/status')->with('success', '#') ;

    }
}
