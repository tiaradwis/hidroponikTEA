<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'id_user',
        'nama_kategori'
    ];

    public function userx() {
        return $this->belongsTo(User::class,'id');
    }

    public function produkx()
    {
        return $this->hasMany(Produk::class, 'id_kategori');
    }
}
