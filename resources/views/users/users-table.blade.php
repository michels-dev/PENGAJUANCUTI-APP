@extends('layouts.dashboard')
{{-- Memanggil Yield --}}
@section('title', 'Table Users')
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
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Blog Users Tables
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
                            <h2>Tables Users Pengajuan Cuti</h2>
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
                                        <td>{{ $row->approval_date }}</td>
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
    @endpush