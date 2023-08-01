@extends('layouts.master')

@section('content')
<div class="container">
    @foreach($userSeller as $user) 
    <div class="row p-3">
        <div class="col-lg-6 col-12 text-center">
            <h3 class="pt-4">Katalog</h3>
            <h7>Sayur yang dimiliki {{$user->nama_toko}} ada disini!</h7>
        </div>
    </div>  
    <div class=p-2>

    </div>
    <div class="row" id="seller">
        <div class="col-lg-2 col-4">         
            <img src="{{URL('/storage/images/profil/'. $user->photo_profile)}}"  class="rounded-circle" id="image-cover" style="width: 120px; object-fit:cover; object-position:center" alt="">               
        </div>
        <div class="col-lg-10 col-8 pe-1">
            <p class="fs-2" id="nama_toko">{{$user->nama_toko}}</p>
            <p class="fs-2 ">{{$user->lokasi_toko}}</p>
        </div>            
    </div>
    @endforeach
    <div class="row pt-4" id="all-data">
        @foreach($data_produk as $row)
        <div class="col-lg-3 col-6 py-2 d-flex justify-content-center">
            <div class="card custom-card">
            <a href="{{ route('produkDetail', $row->id_produk) }}" class="card-link" id="$row->id_produk">
                <img src="{{asset('/storage/images/produk/photo1/'.$row->photo_produk_1) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$row->nama_produk}}</h5>
                    <p class="card-text">Rp. {{$row->harga_produk}}</p>
                    <p class="card-text">{{$row->user->lokasi_toko}}</p>     
                    <div class="row">    
                        <div class="col-12 px-1 d-flex flex-row-reverse">
                            <a href="{{route ('produkDetail', $row->id_produk) }}" class="btn btn-success custom-button-width">Pesan</a>
                        </div>
                    </div>            
                </div>
            </div>
        </div>
        @endforeach
        <div class="row p-5">
            <div class="col-12 d-flex justify-content-center">
                {{ $data_produk->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
    <div class="row" id="search-data">
    @if ($data_produk->isEmpty())
        <p>Toko belum mempunyai produk.</p>
    @else
    
    @endif
    </div> 
</div>

@endsection