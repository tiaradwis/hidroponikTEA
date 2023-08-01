@extends('layouts.masterSeller')

@section('content')
<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <a class="nav-link" id="title-navbar" href="{{route ('SellerPage')}}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" id="title-navbar" aria-current="page" href="{{route ('produk')}}">Produk</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="title-navbar" href="{{route ('kategori')}}">Kategori</a>
    </li>
</ul>

<div class="container mt-3 ">
    <div class="row align-items-center">
        <div class="col align-middle ms-2">
            <h4>Produk Anda</h4>
        </div>
        @if ($errors->any())
            <div class="text-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <div class="col offset-md-6 d-md-flex justify-content-md-center">
            <!-- Button trigger tambah produk -->
            <form action="/Tambahproduk" id="tambahproduk" enctype="multipart/form-data" method="post">
            @csrf
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah Produk
            </button>
            
            <!-- tambah produk -->
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Produk Baru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <!-- Foto Produk -->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="formFileMultiple" class="form-label">Foto Produk Utama</label>
                            <input class="form-control" name="photo_produk_1" type="file" id="formFileMultiple" >
                            </div>
                        </div>
                        <!-- Foto Produk 2 -->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="formFileMultiple" class="form-label">Foto Produk 2</label>
                            <input class="form-control" name="photo_produk_2" type="file" id="formFileMultiple" >
                            </div>
                        </div>
                        <!-- Foto Produk 3-->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="formFileMultiple" class="form-label">Foto Produk 3</label>
                            <input class="form-control" name="photo_produk_3" type="file" id="formFileMultiple" >
                            </div>
                        </div>
                        <!-- Nama Produk -->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : Caisim">
                            </div>
                        </div>
                        <!-- Harga Produk -->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Harga Produk</label>
                            <input type="integer" name="harga_produk" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : 12000">
                            </div>
                        </div>
                        <!-- Varietas Produk -->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Varietas Produk</label>
                            <input type="text" name="varietas_produk" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : Tosakan F1">
                            </div>
                        </div>
                        <!-- Kategori Sayur-->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label class="form-label">Kategori Sayur</label>
                            <select name="kategori_sayur" class="form-select" aria-label="Default select example">           
                                <option selected>Pilih Kategori Sayur</option>
                                @foreach($kategori as $kategoris)
                                <option value="{{$kategoris->id_kategori}}">{{$kategoris->nama_kategori}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <!-- Panen Usia -->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Panen Usia</label>
                        <input type="text" name="panen_usia" class="form-control" id="exampleFormControlInput1" placeholder="| Hari">
                            </div>
                        </div>
                        <!-- Bobot -->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Bobot Rata-Rata Perpack</label>
                            <input type="text" name="bobot_rata_rata" class="form-control" id="exampleFormControlInput1" placeholder="| Gram">
                            </div>
                        </div>
                        <!-- Ketahanan ruangan -->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Ketahanan Sayur Pada Suhu Ruangan</label>
                            <input type="text" name="ks_ruangan" class="form-control" id="exampleFormControlInput1" placeholder="| Hari">
                            </div>
                        </div>
                        <!-- Ketahanan chiller -->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Ketahanan Sayur Pada Chiller</label>
                            <input type="text" name="ks_kulkas" class="form-control" id="exampleFormControlInput1" placeholder="| Hari">
                            </div>
                        </div>
                        <!-- Kapasitas produksi -->
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Kapasitas produksi</label>
                            <input type="text" name="kapasitas_produksi" class="form-control" id="exampleFormControlInput1" placeholder="Kapasitas Produk">
                            </div>
                        </div>
                        <!-- Deskripsi -->
                        <div class="modal-body">
                            <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk</label>
                            <textarea name="deskripsi_produk" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>
                            </div>
                        </div>
                        <!-- Opsi Pestisida -->
                        <div class="modal-body">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="pestisida" type="radio" id="inlineCheckbox1" value="Pestisida">
                                <label class="form-check-label" for="inlineCheckbox1">Pestisida</label>
                            </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" name="pestisida" type="radio" id="inlineCheckbox2" value="Tanpa Pesitisida">
                                <label class="form-check-label" for="inlineCheckbox2">Tanpa Pestisida</label>
                            </div>
                        </div>
                        <!-- Opsi Pengiriman -->
                        <div class="modal-body">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" name="opsi_pengiriman" type="radio" id="inlineCheckbox1" value="Kirim langsung">
                                <label class="form-check-label" for="inlineCheckbox1">Kirim langsung</label>
                            </div>
                                <div class="form-check form-check-inline">
                                <input class="form-check-input" name="opsi_pengiriman" type="radio" id="inlineCheckbox2" value="Pre Order">
                                <label class="form-check-label" for="inlineCheckbox2">Pre Order</label>
                            </div>
                        </div>
                        <!-- konfirmasi -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" value="Upload" class="btn btn-success">Tambah</button>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4 justify-content-md-start">
        @foreach($produk as $produks)
        <div class="col pt-3">
            <!-- Card Produk -->
            <div class="card mx-auto" style="max-width: 270px;">
                <img src="{{ asset('/storage/images/produk/photo1/' . $produks->photo_produk_1) }}" class="card-img-top" alt="Foto Sayur">
                <div class="card-body">
                    <h5 class="card-title">{{$produks->nama_produk}}</h5>
                    <p class="card-text">Rp. {{$produks->harga_produk}}</p>   
                </div>
                <div class="card-footer">
                    <div class="row">    
                        <!-- Tombol Ubah -->
                        <div class="col mt-2 mb-2 text-center">
                            <!-- Button trigger modal ubah-->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop_{{$produks->id_produk}}">
                            Ubah
                            </button>
                            <!-- Modal ubah -->
                            <form action="/Updateproduk" id="updateproduk" enctype="multipart/form-data" method="post">    
                            @csrf
                            <input type="hidden" name="id_produk" value="{{$produks->id_produk}}">
                            <div class="modal fade" id="staticBackdrop_{{$produks->id_produk}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel_{{$produks->id_produk}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Detail Produk</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- Foto Produk -->
                                        <div class="modal-body">
                                            <div class="mb-1">
                                                <label for="formFileMultiple" class="form-label">Foto Produk Utama</label>
                                                <input class="form-control" name="photo_produk_1" type="file" id="formFileMultiple" >
                                            </div>
                                        </div>

                                        <div class="modal-body">
                                            <div class="mb-1">
                                                <label for="formFileMultiple" class="form-label">Foto Produk 2</label>
                                                <input class="form-control" name="photo_produk_2" type="file" id="formFileMultiple" >
                                            </div>
                                        </div>

                                        <div class="modal-body">
                                            <div class="mb-1">
                                                <label for="formFileMultiple" class="form-label">Foto Produk 3</label>
                                                <input class="form-control" name="photo_produk_2" type="file" id="formFileMultiple" >
                                            </div>
                                        </div>
                                        <!-- Nama Produk -->
                                        <div class="modal-body">
                                            <div class="mb-1">
                                            <label for="exampleFormControlInput1" class="form-label">Nama Produk</label>
                                            <input type="text" name="nama_produk" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : Caisim" value="{{$produks->nama_produk}}">
                                            </div>
                                        </div>
                                        <!-- Harga Produk -->
                                        <div class="modal-body">
                                            <div class="mb-1">
                                            <label for="exampleFormControlInput1" class="form-label">Harga Produk</label>
                                            <input type="integer" name="harga_produk" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : 12000" value="{{$produks->harga_produk}}">
                                            </div>
                                        </div>
                                        <!-- Varietas Produk -->
                                        <div class="modal-body">
                                            <div class="mb-1">
                                            <label for="exampleFormControlInput1" class="form-label">Varietas Produk</label>
                                            <input type="text" name="varietas_produk" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : Tosakan F1" value="{{$produks->varietas_produk}}">
                                            </div>
                                        </div>
                                        <!-- Kategori Sayur-->
                                        <div class="modal-body">
                                            <div class="mb-1">
                                            <label class="form-label">Pilih kategori</label>
                                            <select name="kategori_sayur" class="form-select" aria-label="Default select example">
                                                <option selected value="{{$produks->id_kategori}}">{{$produks->kategori->nama_kategori}}</option>
                                                @foreach($kategori as $kategoris)                    
                                                    <option value="{{$kategoris->id_kategori}}">{{$kategoris->nama_kategori}}</option>
                                                @endforeach
                                            </select>
                                            </div>
                                        </div>
                                        <!-- Panen Usia -->
                                        <div class="modal-body">
                                            <div class="mb-1">
                                            <label for="exampleFormControlInput1" class="form-label">Panen Usia</label>
                                            <input type="text" name="panen_usia"  class="form-control" id="exampleFormControlInput1" placeholder="| Hari" value="{{$produks->panen_usia}}">
                                            </div>
                                        </div>
                                        <!-- Bobot -->
                                        <div class="modal-body">
                                            <div class="mb-1">
                                            <label for="exampleFormControlInput1" class="form-label">Bobot Rata-Rata Perpack</label>
                                            <input type="text" name="bobot_rata_rata" class="form-control" id="exampleFormControlInput1" placeholder="| Gram" value="{{$produks->bobot_rata_rata}}">
                                            </div>
                                        </div>
                                        <!-- Ketahanan ruangan -->
                                        <div class="modal-body">
                                            <div class="mb-1">
                                            <label for="exampleFormControlInput1" class="form-label">Ketahanan Sayur Pada Suhu Ruangan</label>
                                            <input type="text" name="ks_ruangan" class="form-control" id="exampleFormControlInput1" placeholder="| Hari" value="{{$produks->ks_ruangan}}">
                                            </div>
                                        </div>
                                        <!-- Ketahanan chiller -->
                                        <div class="modal-body">
                                            <div class="mb-1">
                                            <label for="exampleFormControlInput1" class="form-label">Ketahanan Sayur Pada Chiller</label>
                                            <input type="text" name="ks_kulkas" class="form-control" id="exampleFormControlInput1" placeholder="| Hari" value="{{$produks->ks_kulkas}}">
                                            </div>
                                        </div>
                                        <!-- Kapasitas produk -->
                                        <div class="modal-body">
                                            <div class="mb-1">
                                            <label for="exampleFormControlInput1" class="form-label">Kapasitas produk</label>
                                            <input type="text" name="kapasitas_produksi" class="form-control" id="exampleFormControlInput1" placeholder="Kapasitas Produksi" value="{{$produks->kapasitas_produksi}}">
                                            </div>
                                        </div>
                                        <!-- Deskripsi -->
                                        <div class="modal-body">
                                            <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Produk</label>
                                            <textarea name="deskripsi_produk" class="form-control" id="exampleFormControlTextarea1" rows="4" >{{$produks->nama_produk}}</textarea>
                                            </div>
                                        </div>
                                        <!-- Opsi Pestisida -->
                                        <div class="modal-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pestisida" type="radio" id="inlineCheckbox1" value="Pestisida" @if ($produks->pestisida === 'Pestisida') checked @endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Pestisida</label>
                                            </div>
                                                <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pestisida" type="radio" id="inlineCheckbox2" value="Tanpa Pesitisida" @if ($produks->pestisida === 'Tanpa Pestisida') checked @endif>
                                                <label class="form-check-label" for="inlineCheckbox2">Tanpa Pestisida</label>
                                            </div>
                                        </div>
                                        <!-- Opsi Pengiriman -->
                                        <div class="modal-body">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="opsi_pengiriman" type="radio" id="inlineCheckbox1" value="Kirim langsung" @if ($produks->opsi_pengiriman === 'Kirim langsung') checked @endif>
                                                <label class="form-check-label" for="inlineCheckbox1">Kirim langsung</label>
                                            </div>
                                                <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="opsi_pengiriman" type="radio" id="inlineCheckbox2" value="Pre Order" @if ($produks->opsi_pengiriman === 'Pre Order') checked @endif>
                                                <label class="form-check-label" for="inlineCheckbox2">Pre Order</label>
                                            </div>
                                        </div>
                                        <!-- konfirmasi -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-success" value="Upload">Ubah</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </form> 
                        </div>
                        <!-- Tombol Hapus -->
                        <div class="col mt-2 mb-2 text-center">
                            <!-- Button trigger modal hapus -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropHapus_{{$produks->id_produk}}">
                            Hapus
                            </button>

                            <!-- Modal hapus-->
                            <form action="/Deleteproduk" id="hapusproduk" method="post">
                            @csrf
                            <input type="hidden" name="id_produk" value="{{$produks->id_produk}}">
                            <div class="modal fade" id="staticBackdropHapus_{{$produks->id_produk}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel_{{$produks->id_produk}}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Produk</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah kamu yakin ingin menghapus produk?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <button type="submit" class="btn btn-danger">Hapus</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>


@endsection  