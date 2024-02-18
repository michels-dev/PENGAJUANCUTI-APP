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
                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-3">
                    <h5>Cek Data Pengajuan Cuti <small class="text-danger">*</small></h5>
                    <div class="card" style="background-color: #ffffff">
                        <div class="body">
                            <p class="text-dark">On-Hold</p>
                            <span class="label label-warning mt-3">{{ $pending }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
                    <div class="card" style="background-color: #ffffff">
                        <div class="body">
                            <p class="text-dark">Approved</p>
                            <span class="label label-success mt-3">{{ $approved }}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
                    <div class="card" style="background-color: #ffffff">
                        <div class="body">
                            <p class="text-dark">Rejected</p>
                            <span class="label label-danger mt-3">{{ $rejected }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Table Pengajuan Cuti Terkini --}}
        @if(Auth::user()->isAdmin())
        <div class="container">
            <div class="row clearfix mt-4">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Data Pengajuan Cuti Users</h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                    <ul class="dropdown-menu slideUp ">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive members_profiles">
                            <table class="table table-hover js-basic-user dataTable">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $row->nik }}</td>
                                        <td>{{ $row->tanggal_mulai }}</td>
                                        <td>
                                            <span>
                                                @if ($row->approval === null)
                                                    <a href="{{ route('admin.admin-table') }}" class="label bg-amber">On-Hold</a>
                                                @endif
                                            </span>
                                        </td>
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
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2>Data Pengajuan Anda <small></small> </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                    <ul class="dropdown-menu slideUp ">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body table-responsive members_profiles">
                            <table class="table table-hover js-basic-anda dataTable">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Tanggal Pengajuan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $row->nik }}</td>
                                        <td>{{ $row->tanggal_mulai }}</td>
                                        <td>
                                            <span>
                                                @if ($row->approval === null)
                                                    <span class="label bg-amber">On-Hold</span>
                                                @elseif ($row->approval === 1)
                                                    <span class="label bg-light-green">Approved</span>
                                                @elseif ($row->approval === 0)
                                                    <span class="label badge-danger text-white">Rejected</span>
                                                @else
                                                    <p>Status Persetujuan Tidak Valid</p>
                                                @endif

                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </section>
    @endsection

    {{-- Script After --}}
@push('after-scripts')
    <script>
        $(function () {
            $('.js-basic-anda').DataTable({
                "pageLength": 3,
                "lengthMenu": [3, 10, 25, 50, 100], // Specify the entries to show in the dropdown
            });
        });
    </script>
        <script>
            $(function () {
                $('.js-basic-user').DataTable({
                    "pageLength": 3,
                    "lengthMenu": [3, 10, 25, 50, 100], // Specify the entries to show in the dropdown
                });
            });
        </script>
@endpush