
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" id="title-navbar" href="{{route ('getProduk') }}">LapakHidroponik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      @guest
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      </ul>
      @else
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{route ('getProduk') }}">Katalog</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('keranjangIndex')}}">Keranjang</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cari lokasi terdekat
            </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Andir']) }}">Andir</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Astana Anyar']) }}">Astana Anyar</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Antapani']) }}">Antapani</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Arcamanik']) }}">Arcamanik</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Babakan Ciparay']) }}">Babakan Ciparay</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Bandung Kidul']) }}">Bandung Kidul</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Bandung Kulon']) }}">Bandung Kulon</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Bandung Wetan']) }}">Bandung Wetan</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Batununggal']) }}">Batununggal</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Bojongloa Kaler']) }}">Bojongloa Kaler</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Bojongloa Kidul']) }}">Bojongloa Kidul</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Buah Batu']) }}">Buah Batu</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Cibeunying Kidul']) }}">Cibeunying Kidul</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Cibeunying Kaler']) }}">Cibeunying Kaler</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Cibiru']) }}">Cibiru</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Cicendo']) }}">Cicendo</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Cidadap']) }}">Cidadap</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Cinambo']) }}">Cinambo</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Coblong']) }}">Coblong</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Gedebage']) }}">Gedebage</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Kiaracondong']) }}">Kiaracondong</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Lengkong']) }}">Lengkong</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Mandalapati']) }}">Mandalapati</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Panyileukan']) }}">Panyileukan</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Rancasari']) }}">Rancasari</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Regol']) }}">Regol</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Sukajadi']) }}">Sukajadi</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Sukasari']) }}">Sukasari</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Sumur Bandung']) }}">Sumur Bandung</a></li>
            <li><a class="dropdown-item" href="{{ route('lokasiProduk', ['id' => 'Ujungberung']) }}">Ujungberung</a></li>
          </ul>
        </li>
      </ul>
      @endguest
      <li class="nav-item dropdown d-flex fluid listx">
        @guest
            @if (Route::has('login'))
                <li class="nav-item listx">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
            @endif

            @if (Route::has('register'))
                <li class="nav-item listx">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->nama_lengkap }}
            </a>
            <ul class="dropdown-menu">
              <li>
                  <a class="dropdown-item" href="{{ route('Profile') }}">
                      Ubah Alamat
                  </a>
                </li> 

                <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>      
            </ul>
        @endguest    
        </li>
    </div>
  </div>
</nav>

      <!-- <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form> -->