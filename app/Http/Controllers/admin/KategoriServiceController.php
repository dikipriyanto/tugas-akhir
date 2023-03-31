<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kategori_service; 
use App\Models\masalah; 
use App\Models\jenis; 
use App\Models\merek; 
use Illuminate\Pagination\Paginator;
use Storage;
use Carbon\Carbon;
use Cloudinary;

class KategoriServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $pagination = 5;
        $kategori_services = kategori_service::paginate($pagination);
        return view('admin.pages.kategoriservice.index', compact('kategori_services'))
        ->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.kategoriservice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kategori_services = kategori_service::create([
            'nama_kategori' => $request->nama_kategori,
        ]);

        $pagination = 5;
        $kategori_services = kategori_service::paginate($pagination);

        return redirect('/kategoriservice?page='.$kategori_services->lastPage())->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($kategori_service)
    {
        $kategori_services = kategori_service::find($kategori_service);
        return view('admin.pages.kategoriservice.show', compact('kategori_services'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kategori_service)
    {
        $kategori_services = kategori_service::find($kategori_service);
        return view('admin.pages.kategoriservice.edit', compact ('kategori_services'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kategori_service)
    {
        $kategori_services = kategori_service::find($kategori_service);
        if($request->foto){
            $fileName = Carbon::now()->format('Y-m-d H:i:s').'-'.$request->nama_kategori;
            
            
            if($kategori_services->public_id !== null){
                Cloudinary::destroy($kategori_services->public_id);
            }
            
            $uploadedFile = $request->file('foto')->storeOnCloudinaryAs('KategoriService',$fileName);
            
            $foto = $uploadedFile->getSecurePath();
            $public_id = $uploadedFile->getPublicId();
        }

        $kategori_services->update([
            'nama_kategori' => $request->nama_kategori,
            'foto' => $request->foto ? $foto : $kategori_services->foto,
            'public_id' => $request->foto ? $public_id : $kategori_services->public_id,
        ]);
        

        return redirect()->route('kategoriservice.index')->with('success', 'Data telah berhasil diubah!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $kategori_service)
    {
        $kategori_services = kategori_service::findOrFail($kategori_service);
        $kategori_services->delete();
        $pagination = 5;
        $kategori_services = kategori_service::paginate($pagination);
        if($kategori_services->lastPage() === $request->page){
            return redirect('/kategoriservice?page='.$request->page)->with('berhasil', 'Data berhasil dihapus');
        }else{
            return redirect('/kategoriservice?page='.$kategori_services->lastPage())->with('berhasil', 'Data berhasil dihapus');
        }
    }

    public function masalahindex(Request $request)
    {
        $pagination = 5;
        $masalah = masalah::paginate($pagination);
        return view('admin.pages.masalahservice.index', compact('masalah'))
        ->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function masalahcreate()
    {   
        $kategori_services = kategori_service::all();
        return view('admin.pages.masalahservice.create', compact('kategori_services'));
    }

    public function masalahstore(Request $request)
    {
        $masalah = masalah::create([
            'nama_masalah' => $request->nama_masalah,
            'kategori_id' => $request->kategori_id,
        ]);
        // dd($masalah);
        $pagination = 10;
        $masalah = kategori_service::paginate($pagination);

        return redirect('/masalahservice?page='.$masalah->lastPage())->with('success', 'Data berhasil ditambahkan!');
    }

    public function masalahedit(Request $masalah)
    {
        $masalah = masalah::find($masalah->id);
        // dd($masalah);
        $kategori_services = kategori_service::all();
        return view('admin.pages.masalahservice.edit', compact ('masalah','kategori_services'));
    }

    public function masalahupdate(Request $request, $id)
    {
        $masalah = masalah::find($id);
        // dd($masalah);
        $masalah->update([
            'nama_masalah' => $request->nama_masalah,
            'kategori_id' => $request->kategori_id,
        ]);
        

        return redirect()->route('masalah')->with('success', 'Data telah berhasil diubah!!');
    }

    public function masalahhapus(Request $request, $masalahs)
    {
        $masalah = masalah::findOrFail($masalahs);
        $masalah->delete();
        $pagination = 5;
        $masalah = masalah::paginate($pagination);
        if($masalah->lastPage() === $request->page){
            return redirect('/masalahservice?page='.$request->page)->with('berhasil', 'Data berhasil dihapus');
        }else{
            return redirect('/masalahservice?page='.$masalah->lastPage())->with('berhasil', 'Data berhasil dihapus');
        }
    }

    public function jenisindex(Request $request)
    {
        $pagination = 5;
        $jenis = jenis::paginate($pagination);
        return view('admin.pages.jenisservice.index', compact('jenis'))
        ->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function jeniscreate()
    {   
        $kategori_services = kategori_service::all();
        return view('admin.pages.jenisservice.create', compact('kategori_services'));
    }

    public function jenisstore(Request $request)
    {
        $jenis = jenis::create([
            'nama_jenis' => $request->nama_jenis,
            'kategori_id' => $request->kategori_id,
        ]);
        // dd($masalah);
        $pagination = 5;
        $jenis = jenis::paginate($pagination);

        return redirect('/jenisservice?page='.$jenis->lastPage())->with('success', 'Data berhasil ditambahkan!');
    }

    public function jenisedit(Request $jenis)
    {
        $jenis = jenis::find($jenis->id);
        
        $kategori_services = kategori_service::all();
        return view('admin.pages.jenisservice.edit', compact ('jenis','kategori_services'));
    }

    public function jenisupdate(Request $request, $id)
    {
        $jenis = jenis::find($id);
        // dd($masalah);
        $jenis->update([
            'nama_jenis' => $request->nama_jenis,
            'kategori_id' => $request->kategori_id,
        ]);
        $pagination = 5;
        $jenis = jenis::paginate($pagination);
        return redirect('/jenisservice?page='.$jenis->lastPage())->with('success', 'Data telah berhasil diubah!!');
    }

    public function jenishapus(Request $request, $jenish)
    {
        $jenis = jenis::findOrFail($jenish);
        $jenis->delete();
        $pagination = 5;
        $jenis = jenis::paginate($pagination);
        if($jenis->lastPage() === $request->page){
            return redirect('/jenisservice?page='.$request->page)->with('berhasil', 'Data berhasil dihapus');
        }else{
            return redirect('/jenisservice?page='.$jenis->lastPage())->with('berhasil', 'Data berhasil dihapus');
        }
    }

    public function merekindex(Request $request)
    {
        $pagination = 5;
        $merek = merek::paginate($pagination);
        return view('admin.pages.merekservice.index', compact('merek'))
        ->with('i', ($request->input('page', 1) - 1) * $pagination);
    }

    public function merekcreate()
    {   
        $kategori_services = kategori_service::all();
        return view('admin.pages.merekservice.create', compact('kategori_services'));
    }

    public function merekstore(Request $request)
    {
        $merek = merek::create([
            'nama_merek' => $request->nama_merek,
            'kategori_id' => $request->kategori_id,
        ]);
        // dd($masalah);
        $pagination = 5;
        $merek= merek::paginate($pagination);

        return redirect('/merekservice?page='.$merek->lastPage())->with('success', 'Data berhasil ditambahkan!');
    }

    public function merekedit(Request $mereks)
    {
        $merek = merek::find($mereks->id);
        
        $kategori_services = kategori_service::all();
        return view('admin.pages.merekservice.edit', compact ('merek','kategori_services'));
    }

    public function merekupdate(Request $request, $id)
    {
        $merek = merek::find($id);
        // dd($masalah);
        $merek->update([
            'nama_merek' => $request->nama_merek,
            'kategori_id' => $request->kategori_id,
        ]);
        $pagination = 5;
        $merek = merek::paginate($pagination);
        return redirect('/merekservice?page='.$merek->lastPage())->with('success', 'Data telah berhasil diubah!!');
    }

    public function merekhapus(Request $request, $mereks)
    {
        $merek = merek::findOrFail($mereks);
        $merek->delete();
        $pagination = 5;
        $merek = merek::paginate($pagination);
        if($merek->lastPage() === $request->page){
            return redirect('/merekservice?page='.$request->page)->with('berhasil', 'Data berhasil dihapus');
        }else{
            return redirect('/merekservice?page='.$merek->lastPage())->with('berhasil', 'Data berhasil dihapus');
        }
    }
}
