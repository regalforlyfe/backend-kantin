<?php

namespace App\Http\Controllers;

use App\Produk;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getProduk() {
        $produk = Produk::all();
        return response()->json($produk);
    }
}
