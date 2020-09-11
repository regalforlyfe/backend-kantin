<?php

namespace App\Http\Controllers;

use App\User;
use App\Toko;
use App\Produk;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::with('toko','produk','pembeli')->get();
        return view('order.index', compact('data'));
        return response()->json($data);
    }
    
    public function all()
    {
        $data = Order::with('toko','produk','pembeli')->where('id_penjual', Auth::id())->get();
	    return $data;
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'kode_order' => 'required',
            'jumlah' => 'required',
            'id_pembeli' => 'required',
            'id_toko' => 'required',
            'id_produk' => 'required',
            'timestamps' => 'required',
        ]);
        
        Order::create($request->all());
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
        return view('order.index', compact('data','toko'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $request->validate([
            'kode_order' => 'required',
            'jumlah' => 'required',
            'id_pembeli' => 'required',
            'id_toko' => 'required',
            'id_produk' => 'required',
            'timestamps' => 'required',
        ]);

        return $order->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        return $order->delete();
    }
}
