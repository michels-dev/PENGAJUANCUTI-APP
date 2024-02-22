@extends('layouts.auth')
{{-- Memanggil Yield --}}
@section('title', 'LogIn')
@section('content')
@push('after-styles')
<style>
  .outline:focus {
    outline-color: none;
  }
</style>
@endpush
<div class="login-box">
    <div class="card card-outline">
      <div class="card card-header bg-dark">
          <h3 class="card-img-top text-center">BPK PENABUR Jakarta</h3>
      </div>
      <div class="card-body">
        <p class="login-box-msg text-center" style="font-size: 14px">Silahkan Masuk dengan akun anda</p>
        <form action="{{ route('auth.loginproses') }}" method="POST">
          @csrf
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="email" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password" id="myInput">
            <div class="input-group-append">
              <div class="input-group-text" style="font-size:12px; background-color:transparent" onclick="togglePasswordVisibility()">
                <a href="#" id="eyeIcon" class="fas fa-eye-slash text-dark" tabindex="o"></a>
              </div>
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" class="btn btn-primary btn-block">LOG IN</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
        <!-- /.social-auth-links -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->
@endsection

@push('after-scripts')
<script>
  function togglePasswordVisibility() {
    var input = document.getElementById("myInput");
    var eyeIcon = document.getElementById("eyeIcon");

    if (input.type === "password") {
      input.type = "text";
      eyeIcon.classList.remove("fas", "fa-eye-slash");
      eyeIcon.classList.add("fas", "fa-eye");
    } else {
      input.type = "password";
      eyeIcon.classList.remove("fas", "fa-eye");
      eyeIcon.classList.add("fas", "fa-eye-slash");
    }
  }
</script>
@endpush