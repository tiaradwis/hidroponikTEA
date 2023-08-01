<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Models\Produk;


class ProduksTableSeeder extends Seeder
{
    public function run()
    {
        // Data dummy untuk tabel 'produks'
        $dataProduks = [
            [
                'nama_produk' => 'Selada Iceberg',
                'harga_produk' => 110000,
                'id_kategori' => 1, // Ganti dengan ID kategori yang sesuai
                'id_user' => 1, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Bruma RZ',
                'panen_usia' => '50 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '5',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Selada Iceberg dengan varietas burma adalah selada iceberg terbaik di pasaran',
                'kapasitas_produksi' => '20 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Selada Iceberg.jpg',
                'photo_produk_2' => 'Selada Iceberg 2.jpg',
                'photo_produk_3' => 'Selada Iceberg 3.jpg',
            ],
            [
                'nama_produk' => 'Selada Kriting Hijau',
                'harga_produk' => 120000,
                'id_kategori' => 1, // Ganti dengan ID kategori yang sesuai
                'id_user' => 1, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Caipira',
                'panen_usia' => '45Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '5',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Selada Kriting hijau adalah selada yang umum dipasaran, selada ini menggunakan benih imopor terbaik',
                'kapasitas_produksi' => '10 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'selada kriting hijau.jpg',
                'photo_produk_2' => 'selada kriting hijau 2.jpg',
                'photo_produk_3' => 'selada kriting hijau 3.jpg',
            ],
            [
                'nama_produk' => 'Selada Merah',
                'harga_produk' => 120000,
                'id_kategori' => 1, // Ganti dengan ID kategori yang sesuai
                'id_user' => 1, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Lolorosa',
                'panen_usia' => '45Hari',
                'bobot_rata_rata' => '250 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Selada merah yang menggunakan benih lolorosa tidak pernah meengecewakan konsumen',
                'kapasitas_produksi' => '10 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'selada merah.jpg',
                'photo_produk_2' => 'selada merah 2.jpg',
                'photo_produk_3' => 'selada merah 3.jpg',
            ],
            [
                'nama_produk' => 'Selada Romaine',
                'harga_produk' => 130000,
                'id_kategori' => 1, // Ganti dengan ID kategori yang sesuai
                'id_user' => 1, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Babycos',
                'panen_usia' => '40Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Selada romaine adalah selada yang sering digunakan sebagai campuran salad',
                'kapasitas_produksi' => '15 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'selada romaine.jpg',
                'photo_produk_2' => 'selada romaine 2.jpg',
                'photo_produk_3' => 'selada romaine 3.jpg',
            ],
            [
                'nama_produk' => 'Selada Siomak',
                'harga_produk' => 120000,
                'id_kategori' => 1, // Ganti dengan ID kategori yang sesuai
                'id_user' => 1, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'KnownYouSeed',
                'panen_usia' => '47Hari',
                'bobot_rata_rata' => '150 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Selada Siomak dari KYS sangat wangi dan cocok untuk tumisan atau lalapan',
                'kapasitas_produksi' => '20 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'selada siomak.jpg',
                'photo_produk_2' => 'selada siomak 2.jpg',
                'photo_produk_3' => 'selada siomak 3.jpg',
            ],
            [
                'nama_produk' => 'Selada Red Romaine',
                'harga_produk' => 120000,
                'id_kategori' => 2, // Ganti dengan ID kategori yang sesuai
                'id_user' => 2, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Maximus',
                'panen_usia' => '42Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Selada romaine merah memiliki tekstur crunchy',
                'kapasitas_produksi' => '20 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Selada red romaine.jpg',
                'photo_produk_2' => 'Selada red romaine 2.jpg',
                'photo_produk_3' => 'Selada red romaine 3.jpg',
            ],
            [
                'nama_produk' => 'Selada chris green',
                'harga_produk' => 120000,
                'id_kategori' => 2, // Ganti dengan ID kategori yang sesuai
                'id_user' => 2, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'okl',
                'panen_usia' => '42Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Pestisida',
                'deskripsi_produk' => 'Selada unik dengan daun tipis',
                'kapasitas_produksi' => '20 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Selada chris green.jpg',
                'photo_produk_2' => 'Selada chris green 2.jpg',
                'photo_produk_3' => 'Selada chris green 3.jpg',
            ],
            [
                'nama_produk' => 'Kemangi',
                'harga_produk' => 60000,
                'id_kategori' => 3, // Ganti dengan ID kategori yang sesuai
                'id_user' => 2, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'GreenPL',
                'panen_usia' => '42Hari',
                'bobot_rata_rata' => '100 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Daun kemangi sudah sangat umum dan banyak ditemukan di pasaran',
                'kapasitas_produksi' => '20 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Kemangi.jpg',
                'photo_produk_2' => 'Kemangi 2.jpg',
                'photo_produk_3' => 'Kemangi 3.jpg',
            ],
            [
                'nama_produk' => 'Oregano',
                'harga_produk' => 60000,
                'id_kategori' => 3, // Ganti dengan ID kategori yang sesuai
                'id_user' => 2, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Oregano F1',
                'panen_usia' => '60Hari',
                'bobot_rata_rata' => '100 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'bumbu dapur',
                'kapasitas_produksi' => '20 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'oregano.jpg',
                'photo_produk_2' => 'oregano 2.jpg',
                'photo_produk_3' => 'oregano 3.jpg',
            ],
            [
                'nama_produk' => 'Seledri',
                'harga_produk' => 70000,
                'id_kategori' => 3, // Ganti dengan ID kategori yang sesuai
                'id_user' => 2, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'BintangAsia F1',
                'panen_usia' => '50 Hari',
                'bobot_rata_rata' => '100 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Pelengkap masakan',
                'kapasitas_produksi' => '10 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Seledri.jpg',
                'photo_produk_2' => 'Seledri 2.jpg',
                'photo_produk_3' => 'Seledri 3.jpg',
            ],
            [
                'nama_produk' => 'Seledri',
                'harga_produk' => 70000,
                'id_kategori' => 3, // Ganti dengan ID kategori yang sesuai
                'id_user' => 2, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'BintangAsia F1',
                'panen_usia' => '50 Hari',
                'bobot_rata_rata' => '100 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Pelengkap masakan',
                'kapasitas_produksi' => '10 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Seledri.jpg',
                'photo_produk_2' => 'Seledri 2.jpg',
                'photo_produk_3' => 'Seledri 3.jpg',
            ],
            [
                'nama_produk' => 'Bayam',
                'harga_produk' => 110000,
                'id_kategori' => 4, // Ganti dengan ID kategori yang sesuai
                'id_user' => 3, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Maestro F1',
                'panen_usia' => '22 Hari',
                'bobot_rata_rata' => '150 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Sayuran berdaun hijau yang banyak diminati masyarakat',
                'kapasitas_produksi' => '15 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Bayam.jpg',
                'photo_produk_2' => 'Bayam 2.jpg',
                'photo_produk_3' => 'Bayam 3.jpg',
            ],
            [
                'nama_produk' => 'Bayam Batik',
                'harga_produk' => 110000,
                'id_kategori' => 4, // Ganti dengan ID kategori yang sesuai
                'id_user' => 3, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Maestro F1',
                'panen_usia' => '22 Hari',
                'bobot_rata_rata' => '150 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Sayuran berdaun seperti motif batik yang banyak diminati masyarakat',
                'kapasitas_produksi' => '10 KG',
                'opsi_pengiriman' => 'Pre Order',
                'photo_produk_1' => 'Bayam batik.jpg',
                'photo_produk_2' => 'Bayam batik 2.jpg',
                'photo_produk_3' => 'Bayam batik 3.jpg',
            ],
            [
                'nama_produk' => 'Bayam Brazil',
                'harga_produk' => 150000,
                'id_kategori' => 4, // Ganti dengan ID kategori yang sesuai
                'id_user' => 3, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Toledo',
                'panen_usia' => '25 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'varietaas baru bayam yang belum banyak beredar',
                'kapasitas_produksi' => '5 KG',
                'opsi_pengiriman' => 'Pre Order',
                'photo_produk_1' => 'Bayam brazil.jpg',
                'photo_produk_2' => 'Bayam brazil 2.jpg',
                'photo_produk_3' => 'Bayam brazil 3.jpg',
            ],
            [
                'nama_produk' => 'Bayam Jepang',
                'harga_produk' => 150000,
                'id_kategori' => 4, // Ganti dengan ID kategori yang sesuai
                'id_user' => 3, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Horenzo',
                'panen_usia' => '25 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'varietaas yang mulai banyak dibudidayakan, memiliki rasa yang renyah',
                'kapasitas_produksi' => '5 KG',
                'opsi_pengiriman' => 'Pre Order',
                'photo_produk_1' => 'Bayam jepang.jpg',
                'photo_produk_2' => 'Bayam jepang 2.jpg',
                'photo_produk_3' => 'Bayam jepang 3.jpg',
            ],
            [
                'nama_produk' => 'Bayam Merah',
                'harga_produk' => 140000,
                'id_kategori' => 4, // Ganti dengan ID kategori yang sesuai
                'id_user' => 3, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Maendo',
                'panen_usia' => '24 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'bayam merah memiliki nutrisi tinggi',
                'kapasitas_produksi' => '20 KG',
                'opsi_pengiriman' => 'Pre Order',
                'photo_produk_1' => 'Bayam merah.jpg',
                'photo_produk_2' => 'Bayam merah 2.jpg',
                'photo_produk_3' => 'Bayam merah 3.jpg',
            ],
            [
                'nama_produk' => 'Bayam Bokor',
                'harga_produk' => 140000,
                'id_kategori' => 5, // Ganti dengan ID kategori yang sesuai
                'id_user' => 4, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Green Rapids',
                'panen_usia' => '45 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Selada bokor memiliki daun lebar dan tektus renyah',
                'kapasitas_produksi' => '30 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Selada Bokor.jpg',
                'photo_produk_2' => 'Selada Bokor 2.jpg',
                'photo_produk_3' => 'Selada Bokor 3.jpg',
            ],
            [
                'nama_produk' => 'Selada Oakleaf',
                'harga_produk' => 150000,
                'id_kategori' => 5, // Ganti dengan ID kategori yang sesuai
                'id_user' => 4, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Oakleaf F1',
                'panen_usia' => '45 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Selada oakleaf memiliki daun tipis dan tektus renyah',
                'kapasitas_produksi' => '30 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Selada oakleaf.jpg',
                'photo_produk_2' => 'Selada oakleaf 2.jpg',
                'photo_produk_3' => 'Selada oakleaf 3.jpg',
            ],
            [
                'nama_produk' => 'Selada Redcoral',
                'harga_produk' => 150000,
                'id_kategori' => 5, // Ganti dengan ID kategori yang sesuai
                'id_user' => 4, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Lolorosa',
                'panen_usia' => '45 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Selada merah memiliki daun kriting dan tektus renyah',
                'kapasitas_produksi' => '20 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Selada redcoral.jpg',
                'photo_produk_2' => 'Selada redcoral 2.jpg',
                'photo_produk_3' => 'Selada redcoral 3.jpg',
            ],
            [
                'nama_produk' => 'Sawi Sendok',
                'harga_produk' => 120000,
                'id_kategori' => 6, // Ganti dengan ID kategori yang sesuai
                'id_user' => 4, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Nauli F1',
                'panen_usia' => '25 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Sawi sendok atau sawi pakcoy adalah salah satu jenis sawi yang banyak diminati',
                'kapasitas_produksi' => '20 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Sawi sendok.jpg',
                'photo_produk_2' => 'Sawi sendok 2.jpg',
                'photo_produk_3' => 'Sawi sendok 3.jpg',
            ],
            [
                'nama_produk' => 'Daun Mint',
                'harga_produk' => 120000,
                'id_kategori' => 7, // Ganti dengan ID kategori yang sesuai
                'id_user' => 4, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Orph',
                'panen_usia' => '45 Hari',
                'bobot_rata_rata' => '100 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Daun yang memiliki aroma yang sangat harum',
                'kapasitas_produksi' => '5 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Daun mint.jpg',
                'photo_produk_2' => 'Daun mint 2.jpg',
                'photo_produk_3' => 'Daun mint 3.jpg',
            ],
            [
                'nama_produk' => 'Sawi Caisim',
                'harga_produk' => 150000,
                'id_kategori' => 8, // Ganti dengan ID kategori yang sesuai
                'id_user' => 5, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Tosakan',
                'panen_usia' => '35 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Sawi caisim atau sawi bakso memiliki tekstur renyah dan rasa yang manis',
                'kapasitas_produksi' => '10 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Sawi caisim.jpg',
                'photo_produk_2' => 'Sawi caisim 2.jpg',
                'photo_produk_3' => 'Sawi caisim 3.jpg',
            ],
            [
                'nama_produk' => 'Sawi Pagoda',
                'harga_produk' => 150000,
                'id_kategori' => 8, // Ganti dengan ID kategori yang sesuai
                'id_user' => 5, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Shinta',
                'panen_usia' => '35 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Tanpa Pestisida',
                'deskripsi_produk' => 'Sawi Pagoda memiliki tekstur renyah dan rasa yang manis',
                'kapasitas_produksi' => '15 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Sawi pagoda.jpg',
                'photo_produk_2' => 'Sawi pagoda 2.jpg',
                'photo_produk_3' => 'Sawi pagoda 3.jpg',
            ],
            [
                'nama_produk' => 'Sawi Pakcoy',
                'harga_produk' => 120000,
                'id_kategori' => 8, // Ganti dengan ID kategori yang sesuai
                'id_user' => 5, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Nauli F1',
                'panen_usia' => '35 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Pestisida',
                'deskripsi_produk' => 'Sawi pakcoy atau sawi sendok memiliki tekstur renyah dan rasa yang manis',
                'kapasitas_produksi' => '10 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Sawi pakcoy.jpg',
                'photo_produk_2' => 'Sawi pakcoy 2.jpg',
                'photo_produk_3' => 'Sawi pakcoy 3.jpg',
            ],
            [
                'nama_produk' => 'Sawi Samhong',
                'harga_produk' => 140000,
                'id_kategori' => 8, // Ganti dengan ID kategori yang sesuai
                'id_user' => 5, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'NDS F1',
                'panen_usia' => '35 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Pestisida',
                'deskripsi_produk' => 'Sawi samhong memiliki daun lebar dan rasa yang renyah',
                'kapasitas_produksi' => '5 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Sawi samhong.jpg',
                'photo_produk_2' => 'Sawi samhong 2.jpg',
                'photo_produk_3' => 'Sawi samhong 3.jpg',
            ],
            [
                'nama_produk' => 'Kangkung',
                'harga_produk' => 120000,
                'id_kategori' => 9, // Ganti dengan ID kategori yang sesuai
                'id_user' => 5, // Ganti dengan ID user yang sesuai
                'varietas_produk' => 'Bangkok',
                'panen_usia' => '21 Hari',
                'bobot_rata_rata' => '200 gram',
                'ks_ruangan' => '3',
                'ks_kulkas' => '7',
                'pestisida' => 'Pestisida',
                'deskripsi_produk' => 'Kangkung Bangkok adalah kangkung berdaun lebar dan batang besar',
                'kapasitas_produksi' => '10 KG',
                'opsi_pengiriman' => 'Kirim langsung',
                'photo_produk_1' => 'Kangkung.jpg',
                'photo_produk_2' => 'Kangkung 2.jpg',
                'photo_produk_3' => 'Kangkung 3.jpg',
            ],
            
        ];

        foreach ($dataProduks as $produkData) {
            Produk::create($produkData);
        }
    }
}
