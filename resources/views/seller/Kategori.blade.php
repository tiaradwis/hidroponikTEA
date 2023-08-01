@extends('layouts.masterSeller')

@section('content')
<ul class="nav nav-tabs nav-fill">
    <li class="nav-item">
        <a class="nav-link" id="title-navbar" href="{{route ('SellerPage')}}">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="title-navbar" href="{{route ('produk')}}">Produk</a>
    </li>
    <li class="nav-item">
        <a class="nav-link active" id="title-navbar" aria-current="page" href="{{route ('kategori')}}">Kategori</a>
    </li>
</ul>
<div class="container mt-3">
    <div class="row align-items-center">
        <div class="col align-middle ms-2">
            <h5>Daftar Kategori</h5>
        </div>
        <div class="col offset-md-5 d-md-flex justify-content-md-end">
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdropTambah">
            Tambah Kategori
            </button>

            @if ($errors->has('nama_kategori'))
                <span class="text-danger">{{ $errors->first('nama_kategori') }}</span>
            @endif

            <!-- Modal -->
            <form action="/Tambahkategori" id="tambahkategori" method="post">
            @csrf
                <div class="modal fade" id="staticBackdropTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Kategori</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-1">
                            <label for="exampleFormControlInput1" class="form-label">Masukan Nama Kategori</label>
                            <input type="text" class="form-control" name="nama_kategori" id="exampleFormControlInput1" placeholder="Contoh : Selada">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-success" type="submit">Tambah</button>
                        </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container mt-3">
    <table class="table">
        <thead>
            <tr>
                <th scope="col"> </th>
                <th scope="col">Nama Kategori</th>
                <th scope="col" class="text-center" style="width: 20px;"> Aksi </th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $x)
            <tr>
                <td class="align-middle" scope="row">{{ $index + 1 }}</th>          
                <td class="align-middle">{{$x->nama_kategori}}</td>
                <td>
                    <div class="d-grid d-md-flex justify-content-md-end ">
                        <!-- Button trigger modal ubah -->
                        <button type="button" class="btn btn-success mx-1 my-1" data-bs-toggle="modal" data-bs-target="#staticBackdropUbah_{{$x->id_kategori}}">
                        Ubah
                        </button>

                        <!-- Modal ubah -->
                        <form action="/Updatekategori" id="updatekategori" method="post">
                        @csrf
                        <input type="hidden" name="id_kategori" value="{{$x->id_kategori}}">
                        <div class="modal fade" id="staticBackdropUbah_{{$x->id_kategori}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel_{{$x->id_produk}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kategori</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-1">
                                    <label for="exampleFormControlInput1" class="form-label">Masukan Nama Kategori Baru</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_kategori">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-success">Ubah</button>   
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        <!-- Button trigger modal hapus -->
                        <button type="button" class="btn btn-danger mx-1 my-1" data-bs-toggle="modal" data-bs-target="#staticBackdropHapus_{{$x->id_kategori}}">
                        Hapus
                        </button>

                        <!-- Modal hapus -->
                        <form action="/Deletekategori" id="deletekategori" method="post">
                        @csrf    
                        <input type="hidden" name="id_kategori" value="{{$x->id_kategori}}">
                        <div class="modal fade" id="staticBackdropHapus_{{$x->id_kategori}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel_{{$x->id_kategori}}" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Kategori</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <p>Apakah kamu yakin ingin menghapus kategori?</p>
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
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection      