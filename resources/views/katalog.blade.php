@extends('layouts.master')

@section('content')
<div class="container">
    <div>
        <div class="row p-3">
            <div class="col-lg-6 col-12 text-center">
                <h3 class="pt-4">Katalog</h3>
                <h7>Cari sayur yang kamu butuhkan disini!</h7>
            </div>
            <div class="col-lg-6 col-12 text-center py-5">
                <input type="text" name="search" id="search" placeholder="Cari sayur apa..">
            </div>
        </div>
    </div>

    <div class="row" id="all-data">
        @foreach($data as $row)
        <div class="col-lg-2 col-6 py-2 d-flex justify-content-center">  
            <div class="card custom-card">
                <a href="{{ route('produkDetail', $row->id_produk) }}" class="card-link" id="$row->id_produk">
                <img src="{{URL('/storage/images/produk/photo1/'.$row->photo_produk_1) }}" class="card-img-top custom-image-main-katalog" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$row->nama_produk}}</h5>
                    <p class="card-text custom-color-text">Rp. {{$row->harga_produk}}</p>
                    <p class="card-text pb-3 custom-color-text">{{$row->user->lokasi_toko}}</p>     
                    <div class="row">    
                        <div class="col-12 px-1 d-flex flex-row-reverse">
                            <a href="{{route ('produkDetail', $row->id_produk) }}" class="btn btn-success custom-button-width" data-id="{{ $row->id_produk }}">Pesan</a>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
        @endforeach
        <div class="row p-5">
            <div class="col-12 d-flex justify-content-center">
                {{ $data->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>

    <div class="row" id="search-data">
    @if ($data->isEmpty())
        <p class="text-center">Produk belum tersedia</p>
    @endif
    </div> 


</div>

@endsection




