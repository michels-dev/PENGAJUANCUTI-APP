@extends('layouts.auth')
{{-- Memanggil Yield --}}
@section('title', 'LogIn')
@section('content')
@include('components.loading-login')
<div class="authentication">
    <div class="card">
        <div class="body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header slideDown">
                        <div class="logo">
                            <div class="logo"><img src="{{ asset('image/logopenabur.png') }}" style="width: 30%"></div>
                            <a href=""><img src="{{ asset('image/centerbg.png') }}" class="img-fluid" alt="Center Image" style="width: 80%; margin: 0 auto;"></a>
                        </div>
                    </div>
                </div>
                <form action="{{ route('auth.loginproses') }}" class="col-lg-12" id="sign_in" method="POST">
                    @csrf
                    <div class="form-group form-float">
                        <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">person</i> </span>
                            <div class="form-line">
                                <input type="email" name="email" class="form-control date" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-float">
                        <div class="input-group"> <span class="input-group-addon"> <i class="material-icons">vpn_key</i> </span>
                            <div class="form-line">
                                <input type="text" name="password" class="form-control date" placeholder="Password">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn  btn-raised bg-blue waves-effect">LOGIN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection