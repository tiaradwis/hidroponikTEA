@extends('layouts.master')

@section('content')
<div class="container p-4">
    <div class="row pb-3">
        <div class="col-lg-12 col-12 text-center">
            <h3 class="pt-4">Selamat Datang</h3>
            <h7>Silahkan login terlebih dahulu</h7>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- <div class="card"> -->
                <!-- <div class="card-header">{{ __('Login') }}</div> -->

                <!-- <div class="card-body"> -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Login') }}
                                </button>                               
                            </div>
                        </div>

                        <div class="row mt-2">
                            <div class="col-md-6 offset-md-4">
                                <p>Belum punya akun ? <a class="nav-link text-success" href="{{ route('register') }}">{{ __('Register') }}</a></p>
                            </div>
                        </div>

                    </form>
                <!-- </div> -->
            <!-- </div> -->
        </div>
    </div>
</div>
@endsection
