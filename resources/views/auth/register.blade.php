@extends('layouts.master')

@section('content')
<div class="container p-4">

    <div class="row pb-3">
        <div class="col-lg-12 col-12 text-center">
            <h3 class="pt-4">Registrasi Sekarang</h3>
            <h7>Lagi nyari sayur ? Daftar dulu yuk</h7>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card"> -->
                <!-- <div class="card-header">{{ __('Register') }}</div> -->

                <!-- <div class="card-body"> -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="no_hp" class="col-md-4 col-form-label text-md-end">{{ __('No HP') }}</label>

                            <div class="col-md-6">
                                <input id="no_hp" type="text" class="form-control" name="no_hp">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="is_seller" class="col-md-4 col-form-label text-md-end">{{ __('Daftar Sebagai')}}</label>

                            <div class="col-md-6">
                                <select name="is_seller" class="form-control">
                                    <option style="width : 50px" value=0>Pembeli</option>
                                    <option style="width : 50px" value=1>Penjual</option>
                                </select>
                                @error('is_seller')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <!-- <input type="radio" id="html" name="is_seller" value="0">
                                <label for="pembeli">Pembeli</label>       
                                <input type="radio" id="penjual" name="is_seller" value="1">
                                <label for="penjual">Penjual</label><br> -->
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 offset-md-4">
                                <p>Sudah memiliki akun ? <a class="nav-link text-success" href="{{ route('login') }}">{{ __('Login') }}</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
