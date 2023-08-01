<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use App\Models\Kategori;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $data = User::where('id',Auth::id())->first();
        $kategori = Kategori::with('userx')->where('id_user',Auth::id())->orderBy('nama_kategori', 'desc')->get();
        $click_produk = Produk::where('id_user',Auth::id())->sum('click_produk');
        $click_profile = User::where('id',Auth::id())->sum('click_vprofile');
        $click_whatsapp = User::where('id',Auth::id())->sum('click_whatsapp');
        $click_keranjang = Produk::where('id_user',Auth::id())->sum('click_keranjang');
        $ptertinggi = Produk::where('id_user',Auth::id())->orderBy('click_produk','desc')->get();
        

        return view('seller/Dashboard',compact('data','kategori','click_produk','click_profile','click_whatsapp','click_keranjang','ptertinggi'));
        
    }

    public function totalKunjungan() {
        
        $datax = Produk::where('id_user',Auth::id())->sum('click_produk');

        return view('Dashboard',compact('data'));
    }




}
