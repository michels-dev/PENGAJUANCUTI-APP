@extends('layouts.dashboard')
{{-- Memanggil Yield --}}
@section('title', 'Table Admin')
@section('content')
    {{-- Fitur --}}
    {{-- Sidebar --}}
    @include('components.sidebar')
    {{-- End Sidebar --}}
    @push('after-styles')
    <style>
        /* Tambahkan CSS ini atau integrasikan dengan file CSS Anda */
        .scrollable-modal-body {
            max-height: calc(70vh - 200px); /* Sesuaikan nilai sesuai kebutuhan */
            overflow-y: auto;
        }
    </style>
    @endpush
    <section class="content blog-page">
        <div class="block-header">
            <div class="row mt-5">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Blog Admin Tables
                        <small>Welcome to SAS BPK Penabur Jakarta</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                </div>
            </div>
        </div>
            <div class="row clearfix">
                <div class="col-sm-12">
                     <div class="card">
                        <div class="header">
                            <h2>Tables Admin Pengajuan Cuti</h2>
                            {{-- <a href="" class="btn badge-secondary text-white"><i class="zmdi zmdi-file"></i></a>
                            <a href="" class="btn badge-secondary text-white"><i class="zmdi zmdi-cloud-download"></i></a> --}}
                            <div class="demo-button-groups">
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="">Go To Dashboard</a></li>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="btn-group mb-3" role="group">
                                    <a href="" class="btn btn-default waves-effect">Delete All</a>
                                    <button type="button" class="btn btn-default waves-effect">PDF</button>
                                    <button type="button" class="btn btn-default waves-effect">Excel</button>
                            </div>
                            <div class="table-responsive social_media_table">
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nik</th>
                                            <th>Tanggal Mulai</th>
                                            <th>Status</th>
                                            <th>Tanggal Persetujuan</th>
                                            <th>Keperluan</th>
                                            <th>Hari</th>
                                            <th>Tipe</th>
                                            <th>Pengganti</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data as $index => $row)
                                    <tr>
                                        <th scope="row">{{ $no++ }}</th>
                                        <td>{{ $row->nik }}</td>
                                        <td>{{ $row->tanggal_mulai }}</td>
                                        <td>{{ $row->approval }}</td>
                                        <td>{{ $row->approval_date }}</td>
                                        <td>{{ $row->keperluan }}</td>
                                        <td>{{ $row->hari }}</td>
                                        <td>{{ $row->tipe }}</td>
                                        <td>{{ $row->pengganti }}</td>
                                        <!-- Kolom Aksi -->
                                        <td>
                                            <a href="" class="badge badge-primary"><i class="zmdi zmdi-edit"></i></a>
                                            <button type="button" class="badge badge-danger" data-toggle="modal" data-target="#rejectedModal{{ $row->id }}"><i class="zmdi zmdi-close-circle"></i></button>
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
    </section>
    @endsection
    @push('after-scripts')
        {{-- select2 for Users --}}
        <script>
            $("#approveUsers").select2({
                tags: true,
            });
        </script>
        <script>
            $("#approveUnit").select2({
                tags: true,
            });
        </script>
        <script>
            $("#approveRuangan").select2({
                tags: true,
            });
        </script>
    @endpush