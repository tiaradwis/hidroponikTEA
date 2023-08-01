<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keranjang extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_keranjang';

    protected $fillable = [
        'id_user',
        'id_produk',
        'qty_produk',
    ];

    public function produk() {
        return $this->belongsTo(Produk::class,'id_produk');
    }

    // public function user() {
    //     return $this->belongsTo(Produk::class,'id_user');
    // }

    public function userx() {
        return $this->belongsTo(User::class,'id');
    }


}
