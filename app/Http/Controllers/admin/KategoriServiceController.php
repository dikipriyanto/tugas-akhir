<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\kategori_service; 
use Illuminate\Pagination\Paginator;

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
        $kategori_services->update([
            'nama_kategori' => $request->nama_kategori,
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
}
