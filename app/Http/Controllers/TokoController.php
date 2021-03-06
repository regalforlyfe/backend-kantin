<?php

namespace App\Http\Controllers;

use App\User;
use App\Toko;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Toko::all();
        return view('masterdata.toko.index', compact('data'));
    }
    
    public function all()
    {
        if (Auth::user()->tipe_user == 'admin') {
            $data = Toko::addSelect(['seller' => User::select('nama')->whereColumn('id', 'toko.id_penjual')])->get(); //nambah kolom seller
        } else {
            $data = Toko::addSelect(['seller' => User::select('nama')->whereColumn('id', 'toko.id_penjual')])->where('id_penjual', Auth::id())->get();
        }
        return $data;
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Auth::id();
        return view('masterdata.toko.create', compact('data'));
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
            'nama_toko' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            // 'hari_buka' => 'required',
            'waktu_buka' => 'required',
            'waktu_tutup' => 'required',
            // 'metode_pembayaran' => 'required',
            // 'metode_pengiriman' => 'required',
            'whatsapp' => 'required',
            'maps' => 'required',
            // 'foto_toko' => 'required',
        ]);
        
        Toko::create($request->all());
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
        $data = User::all();
        $toko = Toko::find($id);
        return view('masterdata.toko.edit', compact('data','toko'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Toko $toko)
    {
        $request->validate([
            'nama_toko' => 'required',
            'deskripsi' => 'required',
            'alamat' => 'required',
            // 'hari_buka' => 'required',
            'waktu_buka' => 'required',
            'waktu_tutup' => 'required',
            // 'metode_pembayaran' => 'required',
            // 'metode_pengiriman' => 'required',
            'whatsapp' => 'required',
            'maps' => 'required',
            // 'foto_toko' => 'required',
        ]);

        return $toko->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Toko $toko)
    {
        return $toko->delete();
    }
}