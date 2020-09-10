<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Toko;
use App\Produk;
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
        return view('dashboard.index', compact('toko', 'produk'));
    }
}
