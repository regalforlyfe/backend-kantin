<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Produk;
use App\Toko;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::all();
        return view('masterdata.produk.index', compact('data'));
    }
    
    public function all()
    {
        $data = Produk::addSelect(['nama_toko' => Toko::select('nama_toko')->whereColumn('id', 'produk.id_toko')])->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Kategori::all();
        $toko = Toko::all();
        return view('masterdata.produk.create', compact('data','toko'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //echo '<script>console.log('.$request->gambar.')</script>';

        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'id_kategori' => 'required',
            'id_toko' => 'required',
            'foto_produk' => 'required',
        ]);
        
        Produk::create($request->all());
        //return redirect()->route('masterdata.kategori.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Kategori::all();
        $toko = Toko::all();
        $produk = Produk::find($id);
        return view('masterdata.produk.edit', compact('data','toko','produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'id_kategori' => 'required',
            'id_toko' => 'required',
            'foto_produk' => 'required',
        ]);

        return $produk->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        return $produk->delete();
    }
}
