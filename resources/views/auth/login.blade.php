@extends('layouts.auth')
{{-- Memanggil Yield --}}
@section('title', 'LogIn')
@section('content')
@include('components.loading-login')
@push('after-styles')
@endpush
<div class="authentication">
    <div class="card">
        <div class="card-header">
          <img src="{{ asset('image/logopenabur.png') }}" alt="" style="width: 25%"> <small class="font-bold" style="font-size: 20px">BPK PENABUR Jakarta</small>
        </div>
        <div class="card-body">
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
                            <input type="password" name="password" class="form-control date" placeholder="Password">
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
@endsection