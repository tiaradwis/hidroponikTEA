<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Kategori;

class KategorisTableSeeder extends Seeder
{
    public function run()
    {
        // Data dummy untuk tabel 'kategoris'
        $dataKategoris = [
            [
                'id_user' => 1, // Ganti dengan ID user yang sesuai
                'nama_kategori' => 'Selada',
            ],
            [
                'id_user' => 2, // Ganti dengan ID user yang sesuai
                'nama_kategori' => 'Selada',
            ],
            [
                'id_user' => 2, // Ganti dengan ID user yang sesuai
                'nama_kategori' => 'Herbs',
            ],
            [
                'id_user' => 3, // Ganti dengan ID user yang sesuai
                'nama_kategori' => 'Bayam',
            ],
            [
                'id_user' => 4, // Ganti dengan ID user yang sesuai
                'nama_kategori' => 'Selada',
            ],
            [
                'id_user' => 4, // Ganti dengan ID user yang sesuai
                'nama_kategori' => 'Sawi',
            ],
            [
                'id_user' => 4, // Ganti dengan ID user yang sesuai
                'nama_kategori' => 'Herbs',
            ],
            [
                'id_user' => 5, // Ganti dengan ID user yang sesuai
                'nama_kategori' => 'Sawi',
            ],
            [
                'id_user' => 5, // Ganti dengan ID user yang sesuai
                'nama_kategori' => 'Kangkung',
            ],
        ];

        foreach ($dataKategoris as $kategoriData) {
            Kategori::create($kategoriData);
        }
    }
}
