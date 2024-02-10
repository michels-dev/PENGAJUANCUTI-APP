@extends('layouts.dashboard')
{{-- Memanggil Yield --}}
@section('title', 'Dashboard')
@section('content')
    {{-- Fitur --}}
    {{-- Sidebar --}}
    @include('components.sidebar')
    {{-- End Sidebar --}}
    <section class="content blog-page">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
                    <div class="card mt-5" style="background-color: rgba(29, 206, 222, 0.2);">
                        <div class="body">
                            <h5>Selamat Datang Di Peminjaman Ruangan | Manajemen Gedung</h5>
                            <p class="text-dark">Aplikasi Layanan SAS BPK PENABUR Jakarta</p>
                            <a href="" class="btn  btn-raised bg-blue btn-lg waves-effect mt-3 font-20">PINJAM RUANGAN</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endsection