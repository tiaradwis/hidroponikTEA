
@extends('layouts.master')
@section('title', 'Detail Katalog')
@section('content')
@if(session('success'))
    <script>
        window.onload = function() {
            alert('{{ session('success') }}');
        };
    </script>
@endif
<div class="container">
    <form action="/Katalog/TambahKeranjang" method="post" clas="form-group">
    @csrf
    <input type="hidden" name="id_produk" value="{{$data->id_produk}}">
        <div class="row">  
            <div class="col-lg-6">
                <div class="col-lg-12 mt-lg-5 ms-lg-5 pt-lg-5 ps-lg-5 pb-lg-4 pb-4">
                    <div class="row d-flex justify-content-center image-container-main">
                        <a class="col d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#imageModalPreviewMain">
                            <img src="{{asset('/storage/images/produk/photo1/'.$data->photo_produk_1) }}" class="card-img-top image-custom" style="width: 300px;" alt="...">
                        </a>
                        
                        <!-- Trigger Modal Gambar Utama -->
                        <div class="modal fade" id="imageModalPreviewMain" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-success text-center">                
                                        <img src="{{asset('/storage/images/produk/photo1/'.$data->photo_produk_1) }}" class="img-fluid ">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> 
                    <div class="row d-flex justify-content-center pt-lg-4 pt-4">
                        <div class="col image-container">
                            <a data-bs-toggle="modal" data-bs-target="#imageModalPreview1">
                                <img src="{{asset('/storage/images/produk/photo1/'.$data->photo_produk_1) }}" class="card-img-top m-2 border border-light img-fluid image-wrapper"  alt="...">
                            </a>
                        </div>
                        <div class="col image-container">
                            <a data-bs-toggle="modal" data-bs-target="#imageModalPreview2">    
                                <img src="{{asset('/storage/images/produk/photo2/'.$data->photo_produk_2) }}" class="card-img-top m-2 border border-light img-fluid image-wrapper" alt="...">
                            </a>
                        </div>    
                        <div class="col image-container">    
                            <a data-bs-toggle="modal" data-bs-target="#imageModalPreview3">
                                <img src="{{asset('/storage/images/produk/photo3/'.$data->photo_produk_3) }}" class="card-img-top m-2 border border-light img-fluid image-wrapper"  alt="...">
                            </a>
                        </div>        
                        <!-- Trigger Modal 1 -->
                        <div class="modal fade" id="imageModalPreview1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-success text-center">                
                                        <img src="{{asset('/storage/images/produk/photo1/'.$data->photo_produk_1) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Trigger Modal 2 -->
                        <div class="modal fade" id="imageModalPreview2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-success text-center">                
                                        <img src="{{asset('/storage/images/produk/photo2/'.$data->photo_produk_2) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Trigger Modal 3 -->
                        <div class="modal fade" id="imageModalPreview3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-success text-center">                
                                        <img src="{{asset('/storage/images/produk/photo3/'.$data->photo_produk_3) }}" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Akhir ketiga Modal -->
                    </div>
                </div>   
            </div>
            <div class="col-lg-6">
                <div class="col-lg-12 col-12 m-lg-5 p-lg-5 p-1 m-1">
                    <p class="fs-2">{{$data->nama_produk}}</p>
                    <p class="fs-2">Rp. {{$data->harga_produk}} / Pcs</p>             
                    <label for="fname" class="">Jumlah</label><br>   
                      
                      <div class="input-group mb-3" style="width:130px;">
                        <span class="input-group-text" id="decrement">-</span>
                        <input type="number" id="counter" name="quantity" class="form-control input-qty" value=1 readonly>
                        <span class="input-group-text" id="increment">+</span>
                      </div>

                    <div class="col-lg-8 py-4">
                        <button class="btn btn-success col-12 clickable" style="cursor:pointer;" type="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambahkan Keranjang</button>
                    </div>   
                    
                </div>   
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <hr class="my-lg-5 col-12">
                <div class="row  p-lg-0 m-lg-0">           
                    <div class="card" id="card-toko">
                    <a href="{{ route('getSeller', ['id' => $data->user->id]) }}" class="text-decoration-none custom-link">
                        <div class="row g-0 col-12">
                            <div class="col-md-4 col-4">
                                <img src="{{ URL('/storage/images/profil/'. $data->user->photo_profile) }}" class="rounded-circle" id="image-cover" style="width: 120px; object-fit: cover; object-position: center;" alt="">
                            </div>
                            <div class="col-md-8 col-8 d-flex align-items-center">
                                <div class="card-body">
                                    <input type="hidden" name="value_nama_toko" id="nama_toko" value="{{$data->user->nama_toko}}">
                                    <input type="hidden" name="id_user" id="id_user" value="{{$data->user->id}}">
                                    <h2 class="card-title fs-2">{{$data->user->nama_toko}}</h2>
                                    <p class="card-text fs-2">{{$data->user->lokasi_toko}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>         
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-12 p-3">
                <h4>Detail Produk</h4>
                <p>Kategori : {{$data->kategori->nama_kategori}}</p>
                <p>Varietas Produk : {{$data->varietas_produk}}</p>
                <p>Panen usia : {{$data->panen_usia}}</p>
                <p>Bobot rata-rata{{$data->bobot_rata_rata}}</p>
                <p>Ketahanan suhu ruangan : {{$data->ks_ruangan}}</p>
                <p> Penggunaan pestisida : {{$data->pestisida}}</p>
                <p>Kapasitas produksi : {{$data->kapasitas_produksi}}</p>
                <p>Opsi Pengiriman : {{$data->opsi_pengiriman}}</p>

                <h4>Deskripsi</h4>
                <div class="col-lg-8 col-12">
                    <p>{{$data->deskripsi_produk}}</p>
                </div>
            </div>
        </div>
    </form>    
</div>
<script type="text/javascript" src="{{asset('js/incredeDetail.js') }}"></script>
@endsection

