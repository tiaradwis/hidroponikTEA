<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Data dummy untuk tabel 'users'
        $data = [
            [
                'nama_lengkap' => 'Seller1',
                'email' => 'Seller1@gmail.com',
                'password' => Hash::make('abcd1234'),
                'no_hp' => '082216136865',
                'is_seller' => true,
                'lokasi_toko' => 'Buah Batu',
                'alamat_toko' => 'Buah Batu',
                'nama_toko' => 'BJS Hydrofarm',
                'photo_profile' => 'Petani 1.jpeg',
                'deskripsi' => 'Toko yang menyediakan banyak sayuran segar',
                'email_verified_at' => now(),
            ],
            [
                'nama_lengkap' => 'Seller2',
                'email' => 'Seller2@gmail.com',
                'password' => Hash::make('abcd1234'),
                'no_hp' => '082216136865',
                'is_seller' => true,
                'lokasi_toko' => 'Andir',
                'alamat_toko' => 'Andir',
                'nama_toko' => 'Akang Farm',
                'photo_profile' => 'Petani 2.jpeg',
                'deskripsi' => 'menyediakan sayuran segar setiap hari',
                'email_verified_at' => now(),
            ],
            [
                'nama_lengkap' => 'Seller3',
                'email' => 'Seller3@gmail.com',
                'password' => Hash::make('abcd1234'),
                'no_hp' => '082216136865',
                'is_seller' => true,
                'lokasi_toko' => 'Astana Anyar',
                'alamat_toko' => 'Astana Anyar',
                'nama_toko' => 'Kebun Kami',
                'photo_profile' => 'Petani 3.jpeg',
                'deskripsi' => 'Satu satunya petani di astana anyar yang menyediakan sayuran hidroponik',
                'email_verified_at' => now(),
            ],
            [
                'nama_lengkap' => 'Seller4',
                'email' => 'Seller4@gmail.com',
                'password' => Hash::make('abcd1234'),
                'no_hp' => '082216136865',
                'is_seller' => true,
                'lokasi_toko' => 'Arcamanik',
                'alamat_toko' => 'Arcamanik',
                'nama_toko' => 'PP Farm',
                'photo_profile' => 'Petani 4.jpg',
                'deskripsi' => 'PP Farm menyediakan sayuran segar untuk kebutuhan anda',
                'email_verified_at' => now(),
            ],
            [
                'nama_lengkap' => 'Seller5',
                'email' => 'Seller5@gmail.com',
                'password' => Hash::make('abcd1234'),
                'no_hp' => '082216136865',
                'is_seller' => true,
                'lokasi_toko' => 'Kiaracondong',
                'alamat_toko' => 'Kiaracondong',
                'nama_toko' => 'Rumah Hijau',
                'photo_profile' => 'Petani 5.jpg',
                'deskripsi' => 'Kebun kecil kami siap memenuhi kebutuhan sayuran segar anda',
                'email_verified_at' => now(),
            ],
        ];

        // Masukkan data ke dalam tabel 'users'
        DB::table('users')->insert($data);
    }
}