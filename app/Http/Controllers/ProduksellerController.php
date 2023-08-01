<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Storage;

class ProduksellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showProdukSeller() {

        $produk = Produk::with('kategori')->where('id_user', Auth::id())->orderBy('updated_at', 'desc')->get();
        $kategori = Kategori::with('userx')->where('id_user',Auth::id())->orderBy('nama_kategori', 'desc')->get();
        
        return view('seller/produk', compact('produk','kategori'));

    }

    public function tambahProduk(Request $request) {
        

        $validator = Validator::make($request->all(), [
            
            'nama_produk' => ['required'],
            'harga_produk' => ['required', 'integer'],
            'varietas_produk' => ['required'],
            'panen_usia' => ['required'],
            'bobot_rata_rata' => ['required'],
            'ks_ruangan' => ['required'],
            'ks_kulkas' => ['required'],
            'pestisida' => ['required'],
            'deskripsi_produk' => ['required'],
            'kapasitas_produksi' => ['required'],
            'opsi_pengiriman' => ['required'],
            'photo_produk_1' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'photo_produk_2' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'photo_produk_3' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            
       
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $produk = Produk::create([
                'nama_produk' => $request->input('nama_produk'),
                'harga_produk' => $request->input('harga_produk'),
                'id_kategori' => $request->input('kategori_sayur'),
                'id_user' => Auth::id(),
                'varietas_produk' => $request->input('varietas_produk'),
                'panen_usia' => $request->input('panen_usia'),
                'bobot_rata_rata' => $request->input('bobot_rata_rata'),
                'ks_ruangan' => $request->input('ks_ruangan'),
                'ks_kulkas' => $request->input('ks_kulkas'),
                'pestisida' => $request->input('pestisida'),
                'deskripsi_produk' => $request->input('deskripsi_produk'),
                'kapasitas_produksi' => $request->input('kapasitas_produksi'),
                'opsi_pengiriman' => $request->input('opsi_pengiriman'),      
            ]);

            // Handle poto pertama
            if ($request->hasFile('photo_produk_1')) {
                $photo1 = $request->file('photo_produk_1');
                $filename1 = $photo1->getClientOriginalName();
                $photo1->storeAs('public/images/produk/photo1', $filename1);
                $produk->photo_produk_1 = $filename1;
            }

            // Handle poto kedua
            if ($request->hasFile('photo_produk_2')) {
                $photo2 = $request->file('photo_produk_2');
                $filename2 = $photo2->getClientOriginalName();
                $photo2->storeAs('public/images/produk/photo2', $filename2);
                $produk->photo_produk_2 = $filename2;
            }

            // Handle poto ketiga
            if ($request->hasFile('photo_produk_3')) {
                $photo3 = $request->file('photo_produk_3');
                $filename3 = $photo3->getClientOriginalName();
                $photo3->storeAs('public/images/produk/photo3', $filename3);
                $produk->photo_produk_3 = $filename3;
            }

            $produk->save();


            $produk = Produk::with('kategori')->where('id_user', Auth::id())->orderBy('updated_at', 'desc')->get();
            $kategori = Kategori::with('userx')->where('id_user',Auth::id())->orderBy('nama_kategori', 'desc')->get();

            return redirect()->route('produk', compact('produk','kategori'));

        }
    }

    public function update(Request $request) {

        $validator = Validator::make($request->all(), [
            
            'nama_produk' => ['required'],
            'harga_produk' => ['required', 'integer'],
            'varietas_produk' => ['required'],
            'panen_usia' => ['required'],
            'bobot_rata_rata' => ['required'],
            'ks_ruangan' => ['required'],
            'ks_kulkas' => ['required'],
            'pestisida' => ['required'],
            'deskripsi_produk' => ['required'],
            'kapasitas_produksi' => ['required'],
            'opsi_pengiriman' => ['required'],
            // 'photo_produk_1' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            // 'photo_produk_2' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            // 'photo_produk_3' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
             
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $nama_produk = $request->input('nama_produk');
            $harga_produk = $request->input('harga_produk');
            $id_kategori = $request->input('kategori_sayur');
            $id_user = Auth::id();
            $varietas_produk = $request->input('varietas_produk');
            $panen_usia = $request->input('panen_usia');
            $bobot_Rata_rata = $request->input('bobot_rata_rata');
            $ks_ruangan = $request->input('ks_ruangan');
            $ks_kulkas = $request->input('ks_kulkas');
            $pestisida = $request->input('pestisida');
            $deskripsi_produk = $request->input('deskripsi_produk');
            $kapasitas_produksi = $request->input('kapasitas_produksi');
            $opsi_pengiriman = $request->input('opsi_pengiriman');

            $produks = Produk::where('id_user',Auth::id())->where('id_produk', $request->id_produk)->first();

            $produks->nama_produk = $nama_produk;
            $produks->harga_produk = $harga_produk;
            $produks->id_kategori = $id_kategori;
            $produks->id_user = Auth::id();
            $produks->varietas_produk = $varietas_produk;
            $produks->panen_usia = $panen_usia;
            $produks->bobot_rata_rata = $bobot_Rata_rata;
            $produks->ks_ruangan = $ks_ruangan;
            $produks->ks_kulkas = $ks_kulkas;
            $produks->pestisida = $pestisida;
            $produks->deskripsi_produk = $deskripsi_produk;
            $produks->kapasitas_produksi = $kapasitas_produksi;
            $produks->opsi_pengiriman = $opsi_pengiriman;

            // Handle photo pertama
            if ($request->hasFile('photo_produk_1')) {
                $photo1 = $request->file('photo_produk_1');
                $filename1 = $photo1->getClientOriginalName();
                $photo1->storeAs('public/images/produk/photo1', $filename1);
                $produks->photo_produk_1 = $filename1;
            }

            // Handle photo kedua
            if ($request->hasFile('photo_produk_2')) {
                $photo2 = $request->file('photo_produk_2');
                $filename2 = $photo2->getClientOriginalName();
                $photo2->storeAs('public/images/produk/photo2', $filename2);
                $produks->photo_produk_2 = $filename2;
            }

            // Handle poto ketiga
            if ($request->hasFile('photo_produk_3')) {
                $photo3 = $request->file('photo_produk_3');
                $filename3 = $photo3->getClientOriginalName();
                $photo3->storeAs('public/images/produk/photo3', $filename3);
                $produks->photo_produk_3 = $filename3;
            }

            $produks->save();

            $produk = Produk::with('kategori')->where('id_user', Auth::id())->orderBy('updated_at', 'desc')->get();
            $kategori = Kategori::with('userx')->where('id_user',Auth::id())->orderBy('nama_kategori', 'desc')->get();

            return redirect()->route('produk', compact('produk','kategori'));
        }
    }

    public function destroy(Request $request) {
        $data_delete = $request->id_produk;
        $id_kategori = Produk::findOrFail($data_delete);
        $id_kategori->delete();
        $id_kategori->deleteWithImage();
        $produk = Produk::with('kategori')->where('id_user', Auth::id())->orderBy('updated_at', 'desc')->get();
        $kategori = Kategori::with('userx')->where('id_user',Auth::id())->orderBy('nama_kategori', 'desc')->get();

        return redirect()->route('produk', compact('produk','kategori'));
        
    }
}
