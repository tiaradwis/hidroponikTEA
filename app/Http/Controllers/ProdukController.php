<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProduk(Request $request) {
    
        $data = Produk::with('user')
        ->when($request->has('lokasiSort') && $request->lokasiSort != null, function($query) use ($request) {
            $query->whereRelation('user','lokasi_toko', $request->lokasiSort);
        })->orderBy('created_at','desc')->paginate(12);

        return view('katalog', compact('data'));
        
    }

    public function lokasiProduk(Request $request, $id) {
    
        $data = Produk::with('user')
        ->when($id != null, function($query) use ($id) {
            $query->whereRelation('user','lokasi_toko', $id);
        })->orderBy('created_at','desc')->paginate(12);


        return view('katalog', compact('data'));
        
    }


    public function showDetail($id)
    {
        $get = Produk::with('user')->with('kategori')->find($id);
    

        $productId = 'product_' . $id;
        if (!session()->has($productId)) {
            if ($get) {
                $clickp = $get->click_produk;
                $clickp += 1;
                $get->update(['click_produk' => $clickp]);
    
                // Tandai bahwa produk ini sudah diklik
                session()->put($productId, true);
            }
        }
    
        return view('katalogDetail', ['data' => $get]);
    }
    
    public function search(Request $request) {
        
        $output="";
        $produk=Produk::with('user')
        ->where('nama_produk','Like','%'.$request->search.'%')
        ->orWhere('harga_produk','Like','%'.$request->search.'%')
        ->orwhereRelation('user','lokasi_toko','Like','%'.$request->search.'%')
        ->orwhereRelation('user','nama_toko','Like','%'.$request->search.'%')
        ->orderBy('created_at','desc')->paginate(12);
        

        if ($produk->isEmpty()) {
            $output = '<p class="text-center">Produk tidak ditemukan.</p>';
        } else {
            foreach($produk as $data){
        
                $output.=

                ' 
                <div class="col-lg-2 col-6 py-2 d-flex justify-content-center">
                    <div class="card custom-card ">
                    <a href="/Katalog/' . $data->id_produk . '" class="card-link" id="' . $data->id_produk . '">
                        <img src="/storage/images/produk/photo1/'.$data->photo_produk_1.' " class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">'.$data->nama_produk.'</h5>
                            <p class="card-text custom-color-text">Rp. '.$data->harga_produk.'</p>
                            <p class="card-text pb-3 custom-color-text"> '.$data->user->lokasi_toko.' </p>                        
                            <div class="row">    
                                <div class="col-12 px-1 d-flex flex-row-reverse">                              
                                    <a href="/Katalog/'.$data->id_produk.' "class="btn btn-success custom-button-width">Pesan</a>                 
                                </div>
                            </div>            
                        </div>
                    </div>
                </div>
                ';
            }
        }    

        return response($output);
    }


    public function sellerKatalog($id) {
        // Cek apakah sesi untuk klik profil sudah ada
        if(!Session::has('clicked_profile')) {
 
            $oldcp = User::where('id', $id)->value('click_vprofile');
            User::where('id', $id)->update(['click_vprofile' => $oldcp + 1]);
    
            // Set sesi agar tidak diupdate lagi saat halaman direfresh
            Session::put('clicked_profile', true);
        }
    
        $userSeller = User::where('id', $id)->get();
        $id_toko = User::where('id', $id)->value('id');
        $data_produk = Produk::where('id_user', $id_toko)->with('user')->paginate(12);
    
        return view('katalogSeller', compact('userSeller', 'data_produk'));
    }
    


}