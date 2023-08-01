@extends('layouts.master')

@section('content')
<div class="container">
  <div class="row pb-4">
    <div class="col-lg-12 col-12 text-center">
      <h3 class="pt-4">Keranjang</h3>
      @if ($data->isEmpty())
        <p>Anda belum memiliki pesanan di keranjang.</p>
      @else     
      <h7>Sayur yang kamu masukan keranjang ada disini</h7>
    </div>
  </div>
    
    <div class="row d-flex justify-content-center">      
    @php
    $tokoProduk = [];
    @endphp
    
    @foreach ($data as $dk)
      @php
      $namaToko = $dk->produk->user->nama_toko;
      @endphp
          
      @if (!in_array($namaToko, $tokoProduk))
        @php
        $tokoProduk[] = $namaToko;
        @endphp
        <form action="{{route ('chatWhatsapp') }}" id="chatwhatsapp" method="get">
          @csrf
          <div class="col-lg-12 col-12 pb-2 d-flex justify-content-center">
            <div class="col-lg-6 col-12 d-flex justify-content-center ">
              <div class="row ps-2 pe-2">     
                <div class="col-lg-8 pt-4 d-flex flex-row">
                  <a href="{{ route('getSeller', ['id' => $dk->produk->user->id]) }}" class="text-decoration-none pb-2 custom-link"><h3 class="font-weight-bold">{{$dk->produk->user->nama_toko}} </h3></a>
                </div>
                @foreach($data as $dx)
                  @if($dx->produk->user->nama_toko === $dk->produk->user->nama_toko)
                  <div class="card">     
                    <div class="row keranjang_data">          
                      <div class ="col-lg-4 col-5 pe-2 gambar-keranjang">
                        <img class="card-img-top" src="{{URL('/storage/images/produk/photo1/'. $dx->produk->photo_produk_1)}}"  alt="Card image cap">
                      </div>        
                      <div class="col-lg-4 col-7">
                        <div class="container">
                          <div class="card-body ">
                            <input type="hidden" name="id_keranjang" id="id_keranjang" value="{{$dx->id_keranjang}}">
                            <input type="hidden" name="id_user" id="id_user" value="{{$dx->id}}">
                            <h5 class="card-text">{{$dx->produk->nama_produk}}</h5>
                            <p class="card-text">{{$dx->produk->harga_produk}} / Pcs</p>
                            <label for="fname" class="">Jumlah</label><br>   
                            
                            <div class="input-group mb-3" style="width:130px;">
                              <button class="input-group-text decrement-btn">-</button>
                              <input type="number" class="form-control input-qty" value="{{$dx->qty_produk}}" readonly>
                              <button class="input-group-text increment-btn">+</button>
                            </div> 
                          </div>
                        </div>
                      </div>  
                      <div class="col-lg-4 col-12 pt-3 pb-4 d-flex justify-content-end">
                        <a class="btn btn-danger col-4" style="font-size: 12px;" href="{{route ('DeleteDataKeranjang', $dk->id_keranjang)}}">Delete</a>   
                      </div>
                    </div>
                  </div>
                  @endif
                @endforeach
                <div class="col-lg-12 col-12 pt-3 pb-4 d-flex justify-content-end">
                  <button class="btn btn-success col-12" type="submit" style="margin-top: 20px;" >Chat Whatsapp</button>
                </div>
              </div>
            </div>  
          </div>
        </form>  
      @endif
    @endforeach
    </div>
      @endif
</div>
@endsection