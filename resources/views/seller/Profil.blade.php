@extends('layouts.masterSeller')

@section('content')

<div class="container">
    <form action="/updateProfil" id="editprofil" enctype="multipart/form-data" method="post">
    @csrf
    <input type="hidden" name="id_user" value="{{$data->id}}">
    <h4 class="mt-3">Profil Toko</h4>
    <div>
    @if ($errors->any())
        <div class="text-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>

    <div class="col">
        <img src="{{ asset('/storage/images/profil/' . $data->photo_profile) }}" class="rounded" width="100px" alt="Photo Profil">
    </div>
    <div class="modal-body mt-3">
        <div class="mb-1">
        <label for="formFileMultiple" class="form-label">Nama Lengkap</label>
        <input type="text" name="nama_lengkap" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->nama_lengkap }}">
        </div>
    </div>

    <div class="modal-body mt-3">
        <div class="mb-1">
        <label for="formFileMultiple" class="form-label">Nama Toko</label>
        <input type="text" name="nama_toko" class="form-control" id="exampleFormControlInput1" value="{{ Auth::user()->nama_toko }}">
        </div>
    </div>
    <!-- Foto Profil -->
    <div class="modal-body mt-3">
        <div class="mb-1">
        <label for="formFileMultiple" class="form-label">Foto Profil</label>
        <input name="photo_profile" class="form-control" type="file" id="formFileMultiple">
        </div>
    </div>
    <!-- No HP -->
    <div class="modal-body mt-3">
        <div class="mb-1">
        <label for="exampleFormControlInput1" class="form-label">No HP (Wajib)</label>
        <input type="number" name="no_hp" class="form-control" id="exampleFormControlInput1" placeholder=" " value="{{ Auth::user()->no_hp }}">
        </div>
    </div>
    <!-- Alamat Toko -->
    <div class="modal-body mt-3">
        <div class="mb-1">
        <label for="exampleFormControlInput1" class="form-label">Alamat Toko</label>
        <input type="text" name="alamat_toko" class="form-control" id="exampleFormControlInput1" placeholder=" " value="{{ Auth::user()->alamat_toko }}">
        </div>
    </div>
    <!-- Lokasi -->
    <div class="modal-body mt-3">
        <div class="mb-1">
        <label class="form-label">Lokasi Toko</label>
        <select name="lokasi_toko" class="form-select" aria-label="Default select example">
        <option value="Andir" {{ Auth::user()->lokasi_toko == 'Andir' ? 'selected' : '' }}>Andir</option>
        <option value="Astana Anyar" {{ Auth::user()->lokasi_toko == 'Astana Anyar' ? 'selected' : '' }}>Astana Anyar</option>
        <option value="Arcamanik" {{ Auth::user()->lokasi_toko == 'Arcamanik' ? 'selected' : '' }}>Antapani</option>
        <option value="Buah Batu" {{ Auth::user()->lokasi_toko == 'Buah Batu' ? 'selected' : '' }}>Arcamanik</option>
        <option value="Kiaracondong" {{ Auth::user()->lokasi_toko == 'Kiaracondong' ? 'selected' : '' }}>Babakan Ciparay</option>
        <option value="Bandung Kidul" {{ Auth::user()->lokasi_toko == 'Bandung Kidul' ? 'selected' : '' }}>Bandung Kidul</option>
        <option value="Bandung Kulon" {{ Auth::user()->lokasi_toko == 'Bandung Kulon' ? 'selected' : '' }}>Bandung Kulon</option>
        <option value="Bandung Wetan" {{ Auth::user()->lokasi_toko == 'Bandung Wetan' ? 'selected' : '' }}>Bandung Wetan</option>
        <option value="Batununggal" {{ Auth::user()->lokasi_toko == 'Batununggal' ? 'selected' : '' }}>Batununggal</option>
        <option value="Bojongloa Kaler" {{ Auth::user()->lokasi_toko == 'Bojongloa Kaler' ? 'selected' : '' }}>Bojongloa Kaler</option>
        <option value="Bojongloa Kidul" {{ Auth::user()->lokasi_toko == 'Bojongloa Kidul' ? 'selected' : '' }}>Bojongloa Kidul</option>
        <option value="Buah Batu" {{ Auth::user()->lokasi_toko == 'Buah Batu' ? 'selected' : '' }}>Buah Batu</option>
        <option value="Cibeunying Kidul" {{ Auth::user()->lokasi_toko == 'Cibeunying Kidul' ? 'selected' : '' }}>Cibeunying Kidul</option>
        <option value="Cibeunying Kaler" {{ Auth::user()->lokasi_toko == 'Cibeunying Kaler' ? 'selected' : '' }}>Cibeunying Kaler</option>
        <option value="Cibiru" {{ Auth::user()->lokasi_toko == 'Cibiru' ? 'selected' : '' }}>Cibiru</option>
        <option value="Cicendo" {{ Auth::user()->lokasi_toko == 'Cicendo' ? 'selected' : '' }}>Cicendo</option>
        <option value="Cidadap" {{ Auth::user()->lokasi_toko == 'Cidadap' ? 'selected' : '' }}>Cidadap</option>
        <option value="Cinambo" {{ Auth::user()->lokasi_toko == 'Cinambo' ? 'selected' : '' }}>Cinambo</option>
        <option value="Coblong" {{ Auth::user()->lokasi_toko == 'Coblong' ? 'selected' : '' }}>Coblong</option>
        <option value="Gedebage" {{ Auth::user()->lokasi_toko == 'Gedebage' ? 'selected' : '' }}>Gedebage</option>
        <option value="Kiaracondong" {{ Auth::user()->lokasi_toko == 'Kiaracondong' ? 'selected' : '' }}>Kiaracondong</option>
        <option value="Lengkong" {{ Auth::user()->lokasi_toko == 'Lengkong' ? 'selected' : '' }}>Lengkong</option>
        <option value="Mandalapati" {{ Auth::user()->lokasi_toko == 'Mandalapati' ? 'selected' : '' }}>Mandalapati</option>
        <option value="Panyileukan" {{ Auth::user()->lokasi_toko == 'Panyileukan' ? 'selected' : '' }}>Panyileukan</option>
        <option value="Rancasari" {{ Auth::user()->lokasi_toko == 'Rancasari' ? 'selected' : '' }}>Rancasari</option>
        <option value="Regol" {{ Auth::user()->lokasi_toko == 'Regol' ? 'selected' : '' }}>Regol</option>
        <option value="Sukajadi" {{ Auth::user()->lokasi_toko == 'Sukajadi' ? 'selected' : '' }}>Sukajadi</option>
        <option value="Sukasari" {{ Auth::user()->lokasi_toko == 'Sukasari' ? 'selected' : '' }}>Sukasari</option>
        <option value="Sumur Bandung" {{ Auth::user()->lokasi_toko == 'Sumur Bandung' ? 'selected' : '' }}>Sumur Bandung</option>
        <option value="Ujungberung" {{ Auth::user()->lokasi_toko == 'Ujungberung' ? 'selected' : '' }}>Ujungberung</option>
        </select>
        </div>
    </div>
    <!-- Deskripsi -->
    <div class="modal-body mt-3">
        <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Toko</label>
        <textarea name="deskripsi_toko" class="form-control" id="exampleFormControlTextarea1" rows="4" >{{ Auth::user()->deskripsi }}</textarea>
        </div>
    </div>

    <div class="col">
        <div class="col-12 mt-2 mb-2 text-center">
        <!-- Button trigger modal batal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdropBatal">
        Batal
        </button>
        <!-- Modal batal-->
        <div class="modal fade" id="staticBackdropBatal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Batal</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Apakah kamu yakin ingin kembali?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="button" onclick="location.href='{{route ('SellerPage')}}'" class="btn btn-success">Ya</button>
                </div>
                </div>
            </div>
        </div>

        <!-- Button trigger modal Simpan -->
        <button type="button"  class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdropSimpan">
        Simpan
        </button>
        <!-- Modal simpan-->
        <div class="modal fade" id="staticBackdropSimpan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Simpan</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Simpan Perubahan?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" value="Upload" class="btn btn-success">Ya</button>
                </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>

@endsection