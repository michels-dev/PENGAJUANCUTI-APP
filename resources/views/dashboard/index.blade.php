@extends('layouts.dashboard')
{{-- Memanggil Yield --}}
@section('title', 'Dashboard')
@section('content')
    {{-- Fitur --}}
    {{-- Sidebar --}}
    @include('components.navbar')
    @include('components.sidebar')
    {{-- End Sidebar --}}

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Dashboard</h3>
          </div>
          <div class="col-sm-6" style="font-size: 14px">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h1 class="card-title">Selamat Datang Di Pengajuan Persetujuan Cuti -SDM</h1>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('dashboard.form-cuti') }}" class="btn  btn-raised btn-outline-primary waves-effect mt-3">Ajukan Cuti Anda</a>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

      <div class="row">
        <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $pending }}</h3>
                    <p>Cuti <span class="text-bold">Awaiting Approval</span></p>
                </div>
            <a href="{{ route('dashboard.table-onhold') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-lg-4 col-6">
        <div class="small-box bg-info">
            <div class="inner">
                <h3>{{ $approved }}</h3>
                <p>Cuti <span class="text-bold">Approved</span></p>
            </div>
            <a href="{{ route('dashboard.table-approved') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
        </div>
        <div class="col-lg-4 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $rejected }}</h3>
                    <p>Cuti <span class="text-bold">Rejected</span></p>
                </div>
            <a href="{{ route('dashboard.table-rejected') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>SIM</b> |Sistem Informasi Manajemen
    </div>
    <strong>BPK PENABUR Jakarta &copy; 2024.</strong>
  </footer>

@endsection

    {{-- Script After --}}
@push('after-scripts')
@endpush