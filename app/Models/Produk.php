<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Produk extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_produk';
    
    protected $fillable = [
        'nama_produk',
        'harga_produk',
        'id_kategori',
        'id_user',
        'varietas_produk',
        'panen_usia',
        'bobot_rata_rata',
        'ks_ruangan',
        'ks_kulkas',
        'pestisida',
        'deskripsi_produk',
        'kapasitas_produksi',
        'opsi_pengiriman',
        'photo_produk_1',
        'photo_produk_2',
        'photo_produk_3',
        'click_produk',
        'click_keranjang'
    ];

    public function user() {
        return $this->belongsTo(User::class,'id_user');
    }

    public function kategori() {
        return $this->belongsTo(Kategori::class,'id_kategori');
    }

    public function deleteWithImage()
    {
        // Hapus file gambar dari storage
        Storage::delete([
            'public/images/produk/photo1/' . $this->photo_produk_1,
            'public/images/produk/photo2/' . $this->photo_produk_2,
            'public/images/produk/photo3/' . $this->photo_produk_3,
        ]);

        // Hapus entitas produk dari database
        $this->delete();
    }
}
