<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Toko;
use App\Produk;
use App\Kategori;
use App\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $toko = Toko::all()->where('id_penjual', Auth::id())->count();
        $produk = Produk::all()->where('id_penjual', Auth::id())->count();
        $produkSemua = Produk::all()->count();
        $penjual = User::all()->where('tipe_user','penjual')->count();
        $pembeli = User::all()->where('tipe_user','pembeli')->count();
        $kategori = Kategori::all()->count();
        return view('dashboard.index', compact('toko', 'produk','produkSemua','kategori','penjual','pembeli'));
    }
}
