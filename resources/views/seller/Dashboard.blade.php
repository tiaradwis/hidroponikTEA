@extends('layouts.masterSeller')

@section('content')
<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <a class="nav-link active" id="title-navbar" aria-current="page" href="{{route ('SellerPage')}}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="title-navbar" href="{{route ('produk')}}">Produk</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="title-navbar" href="{{route ('kategori')}}">Kategori</a>
    </li>
</ul>
<div class="container mt-3">
    <div class="row align-items-center">
        <div class="col col-lg-1">
            <img src="{{ asset('/storage/images/profil/' . $data->photo_profile) }}" class="img-circle" width="100px" alt="Photo Profil">
        </div>
        <div class="col ms-3">
            <p>{{ Auth::user()->nama_toko }}</p>
            <p>{{ Auth::user()->lokasi_toko }}</p>
        </div>
        <div class="col offset-md-5 d-md-flex justify-content-md-end">
            <!-- Button trigger modal -->
            <form action="/Tambahproduk" id="tambahproduk" enctype="multipart/form-data" method="post">
            @csrf
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Tambah Produk
            </button>
            
            <!-- Modal -->
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
                            <input type="text" name="harga_produk" class="form-control" id="exampleFormControlInput1" placeholder="Contoh : 12000">
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
<div class="container text-center mt-3">
    <div class="row row-cols-1 ">
        <div class="col-md-6">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Total Kunjungan</div>
                <div class="card-body">
                    <h5 class="card-title">{{$click_profile}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Total Klik Whatsapp</div>
                <div class="card-body">
                    <h5 class="card-title">{{$click_whatsapp}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Total Klik Produk</div>
                <div class="card-body">
                    <h5 class="card-title">{{$click_produk}}</h5>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card text-bg-light mb-3">
                <div class="card-header">Total Klik Keranjang</div>
                <div class="card-body">
                    <h5 class="card-title">{{$click_keranjang}}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <h4>Produk Dengan jumlah Klik Tertinngi</h4>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">No</th>
            <th scope="col">Foto</th>
            <th scope="col">Nama Sayur</th>
            <th scope="col">Jumlah Klik</th>
            </tr>
        </thead>
        <tbody>
            @php
            $counter = 1;
            @endphp
            @foreach($ptertinggi as $row)
            <tr>
            <th scope="row">{{ $counter }}</th>
            <td><img src="{{ asset('/storage/images/produk/photo1/' . $row->photo_produk_1) }}" class="img-circle" width="100px" alt="Photo Produk"></td>
            <td>{{$row->nama_produk}}</td>
            <td>{{$row->click_produk}}</td>
            </tr>
            @php
            $counter++
            @endphp
            @endforeach
        </tbody>
    </table>    
</div>
@endsection