@extends('layouts.dashboard')
{{-- Memanggil Yield --}}
@section('title', 'Dashboard')
@section('content')
    {{-- Fitur --}}
    {{-- Sidebar --}}
    @include('components.sidebar')
    {{-- End Sidebar --}}
    <section class="content blog-page">
        {{-- Go to Form Pengajuan Cuti --}}
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
                    <div class="card mt-5" style="background-color: rgba(29, 206, 222, 0.2);">
                        <div class="body">
                            <h5>Selamat Datang Di Pengajuan Cuti | SDM</h5>
                            <p class="text-dark">Aplikasi Layanan SAS BPK PENABUR Jakarta</p>
                            <a href="{{ route('dashboard.form-cuti') }}" class="btn  btn-raised bg-blue btn-lg waves-effect mt-3 font-20">PENGAJUAN CUTI</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Visualisasi Data Cuti --}}
        <div class="container">
            <div class="row clearfix mt-4">
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                    <h5>Cek Data Pengajuan Cuti</h5>
                    <div class="card" style="background-color: #f6f6f6">
                        <div class="body">
                            <p class="text-dark">Cuti Approved</p>
                            <span class="label label-success mt-3"></span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                    <div class="card" style="background-color: #f6f6f6">
                        <div class="body">
                            <p class="text-dark">Cuti Not Approved</p>
                            <span class="label label-warning mt-3"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table Pengajuan Cuti Terkini --}}
        {{-- @if(Auth::user()->isAdmin())
        <div class="container">
            <div class="row clearfix mt-4">
                <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 mt-3">
                    <h5>Riwayat Pengaajuan Cuti <small class="text-danger">*</small></h5>
                    <div class="card">
                        <div class="table-responsive social_media_table mt-4">
                            <table class="table table-hover js-basic-user dataTable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="font-italic">Data Pengajuan Cuti Users</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($data as $row)
                                        <tr style="background-color: #ffffff">
                                            <th>
                                                <ul class="mail_list list-group list-unstyled">
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a class="m-r-10">{{ $row->pemohon }}</a>
                                                                    <span>
                                                                        @if (!$row->approved && !$row->unapproved)
                                                                            <span class="label bg-amber">Pending approval</span>
                                                                        @elseif ($row->approved)
                                                                            <a href="" class="label bg-light-green">approved</a>
                                                                        @else
                                                                            <a href="" class="label badge-warning text-white">not approved</a>
                                                                        @endif
                                                                    </span>
                                                                    <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">{{ $row->tanggal_mulai }}</time></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container">
            <div class="row clearfix mt-4">
                <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 mt-3">
                    <h5>Riwayat Pengajuan Cuti <small class="text-danger">*</small></h5>
                    <div class="card">
                        <div class="table-responsive social_media_table mt-4">
                            <table class="table table-hover js-basic-user dataTable" style="width:100%;">
                                <thead>
                                    <tr>
                                        <th class="font-italic">Data Pengajuan Cuti Anda - <small class="font-bold">{{ $totalToday }}</small> &nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach($data as $row)
                                        <tr style="background-color: #ffffff">
                                            <th>
                                                <ul class="mail_list list-group list-unstyled">
                                                    <li class="list-group-item">
                                                        <div class="media">
                                                            <div class="media-body">
                                                                <div class="media-heading">
                                                                    <a class="m-r-10">{{ $row->pemohon }}</a>
                                                                    <span>
                                                                        @if (!$row->approved && !$row->unapproved)
                                                                            <span class="label bg-amber">Pending approval</span>
                                                                        @elseif ($row->approved)
                                                                            <a href="" class="label bg-light-green">approved</a>
                                                                        @else
                                                                            <a href="" class="label badge-warning text-white">not approved</a>
                                                                        @endif
                                                                    </span>
                                                                    <small class="float-right text-muted"><time class="hidden-sm-down" datetime="2017">{{ $row->tanngal_mulai }}</time></small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </th>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif --}}
    </section>
    @endsection

    {{-- Script After --}}
@push('after-scripts')
    <script>
        $(function () {
            $('.js-basic-terkini').DataTable({
                "pageLength": 3,
                "lengthMenu": [3, 10, 25, 50, 100], // Specify the entries to show in the dropdown
            });
        });
    </script>
@endpush