<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Keranjang;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class KeranjangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        
        $data = Keranjang::where('id_user', Auth::id()) //Ambil data keranjang yang memiliki id sama dengan id yang sama dengan yang mengakses sistem
        
        ->with(['produk.user' => function ($query) { //relasi dengan produk, dari produk relasi dengan user 
            $query->groupBy('nama_toko')->selectRaw('MAX(users.id) as id, nama_toko'); //group dengan nama toko
        }])
        ->orderBy('created_at', 'desc') //order by created_at
        ->get();


        
        return view('keranjang', compact('data'));
    }

    public function store(Request $request) {
      
        if (Keranjang::where('id_produk', $request->id_produk)->where('id_user', Auth::id())->exists()) {
            $old = Keranjang::where('id_produk', $request->id_produk)->where('id_user', Auth::id())->value('qty_produk');
            Keranjang::where('id_produk',$request->id_produk)->where('id_user', Auth::id())->update(
                ['qty_produk'=> $old + $request->quantity]
            );    
        } else {
            Keranjang::create([        
                'id_user' => Auth::id(),
                'id_produk' => $request->id_produk,
                'qty_produk' => $request->quantity,
            ]);
        }

        if (!Session::has('click_count_' . $request->id_produk)) {
            $produk = Produk::find($request->id_produk);
            if ($produk) {
                $produk->update(['click_keranjang' => $produk->click_keranjang + 1]);
            }

            Session::put('click_count_' . $request->id_produk, true);

        }

        session(['last_clicked_user' => Auth::user()->name]);
        
        return redirect()->route('produkDetail', $request->id_produk)->with('success','Produk berhasil dimasukan keranjang!');
    }


    public function destroy($dk) {

        Keranjang::where('id_keranjang', $dk)->delete();
        $data = Keranjang::where('id_user', Auth::id())->with('produk')->with(['userx' => function ($query) {
            $query->orderBy('nama_toko', 'desc');
        }])->get();

        return redirect()->route('keranjangIndex',compact('data'));
    }

    public function update(Request $request) {
        Keranjang::where('id_keranjang',$request->id_keranjang)->update(
            ['qty_produk'=> $request->qty]
        );
        $data = Keranjang::where('id_user', Auth::id())->with('produk')->with(['userx' => function ($query) {
            $query->orderBy('nama_toko', 'desc');
        }])->get();
        return view('keranjang',compact('data'));
    }
    
    // public function clickwa(Request $request) {
            
    //     $id_produk = Keranjang::where('id_keranjang',$request->id_keranjang)->value('id_produk'); //ambil id produk sebagai trigger untuk mengambil id user karena mengakses id user harus menggunakan relasi
    //     $id_user = Produk::where('id_produk', $id_produk)->value('id_user');  //ambil id user
    //     $nama_toko = User::where('id',$id_user)->value('nama_toko'); //ambil nama toko
        
    //     $oldcw = User::where('id',$id_user)->value('click_whatsapp');
    //     User::where('id', $id_user)->update(['click_whatsapp' => $oldcw +1]);
        
    //     $no_hp = User::where('id',$id_user)->value('no_hp'); // ambil no hp
    //     $alamat = User::where('id',Auth::id())->value('alamat');
    //     $nama = User::where('id',Auth::id())->value('nama_lengkap');
    //     $produk_toko = Keranjang::where('id_user',Auth::id())->whereHas('produk', function ($query) use ($id_user) {
    //         $query->where('id_user', $id_user );
    //     })->get(); //ambil data produk dalam toko

    //     $data = '';
    //     foreach ($produk_toko as $key) {
    //         $id_produk = $key['id_produk'];
    //         $nama_produk = Produk::where('id_produk', $id_produk)->value('nama_produk');
    //         $qty = $key['qty_produk'];
    //         $data .= ' '.$nama_produk.' '.$qty. ' pcs%0A';
            
    //     } //eksekusi perulangan untuk mengambil data produk
        
    //     $url = 'https://wa.me/'.$no_hp.'?text=Halo%20'.$nama_toko.
    //     '%20Saya%20menemukan%20produk%20anda%20di%20aplikasi%20Lapak%20Hidroponik,%20Saya%20tertarik%20untuk%20memesan%20:%0A'
    //     .$data.'%0ANama%20penerima%20:%20'.$nama.'%0AAlamat%20penerima%20:%20'.$alamat;
        
    //     return redirect($url);        
    // }

    public function clickwa(Request $request) {
    $id_produk = Keranjang::where('id_keranjang', $request->id_keranjang)->value('id_produk');
    $id_user = Produk::where('id_produk', $id_produk)->value('id_user');
    $nama_toko = User::where('id', $id_user)->value('nama_toko');


    if (!Session::has('clicked_whatsapp')) {

        $oldcw = User::where('id', $id_user)->value('click_whatsapp');
        User::where('id', $id_user)->update(['click_whatsapp' => $oldcw + 1]);


        Session::put('clicked_whatsapp', true);
    }


    $no_hp = User::where('id', $id_user)->value('no_hp');
    $alamat = User::where('id', Auth::id())->value('alamat');
    $nama = User::where('id', Auth::id())->value('nama_lengkap');
    $produk_toko = Keranjang::where('id_user', Auth::id())->whereHas('produk', function ($query) use ($id_user) {
        $query->where('id_user', $id_user);
    })->get();

    $data = '';
    foreach ($produk_toko as $key) {
        $id_produk = $key['id_produk'];
        $nama_produk = Produk::where('id_produk', $id_produk)->value('nama_produk');
        $qty = $key['qty_produk'];
        $data .= ' ' . $nama_produk . ' ' . $qty . ' pcs%0A';
    }

    $url = 'https://wa.me/' . $no_hp . '?text=Halo%20' . $nama_toko .
        '%20Saya%20menemukan%20produk%20anda%20di%20aplikasi%20Lapak%20Hidroponik,%20Saya%20tertarik%20untuk%20memesan%20:%0A'
        . $data . '%0ANama%20penerima%20:%20' . $nama . '%0AAlamat%20penerima%20:%20' . $alamat;

    return redirect($url);
}

}
