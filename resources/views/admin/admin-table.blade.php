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
        /* css modal header */
        .right {
            display: flex;
            justify-content: right;
            align-items: right;
            height: 100%;
        }

        /* css center buttons modals */
        .centered {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }

        /* css buttons */
        .button {
            background-color: #04AA6D; /* Green */
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 2px;
            transition-duration: 0.4s;
            cursor: pointer;
        }
        .button1 {
            background-color: white;
            color: green;
            border: 2px solid #04AA6D;
        }

        .button1:hover {
            background-color: #04AA6D;
            color: white;
        }

        .button2 {
            background-color: white;
            color: blue;
            border: 2px solid #008CBA;
        }

        .button2:hover {
            background-color: #008CBA;
            color: white;
        }

        .button3 {
            background-color: white;
            color: red;
            border: 2px solid #f44336;
        }

        .button3:hover {
            background-color: #f44336;
            color: white;
        }

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
                                        <td><button type="button" class="btn  btn-raised bg-deep-purple btn-sm waves-effect" data-toggle="modal" data-target="#approvalModal{{ $row->id }}">APPROVAL</button></td>
                                        <td>{{ $row->approval_date }}</td>
                                        <td>{{ $row->keperluan }}</td>
                                        <td>{{ $row->hari }}</td>
                                        <td>{{ $row->tipe }}</td>
                                        <td>{{ $row->pengganti }}</td>
                                        <!-- Kolom Aksi -->
                                        <td>
                                            <a href="" class="button button2"><i class="zmdi zmdi-eye"></i></i></a>
                                            <button type="button" class="button button1" data-toggle="modal" data-target="#rejectedModal{{ $row->id }}"><i class="zmdi zmdi-edit"></i></button>
                                            <button type="button" class="button button3" data-toggle="modal" data-target="#rejectedModal{{ $row->id }}"><i class="zmdi zmdi-delete"></i></button>
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

        <!-- Default Size -->
        <div class="modal fade" id="approvalModal{{ $row->id }}" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header right" style="text-align: right;">
                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal" style="font-size: 12px">CLOSE</button>
                    </div>
                    <div class="modal-body">
                    <form action="{{ route('admin.approvalcuti', $row->id) }}" method="POST">
                        @csrf
                        <div class="form-group form-float">
                            Tanggal Persetujuan
                                <div class="input-group">
                                    <div class="form-line">
                                        <input type="date" name="tanggal_mulai" class="form-control" style="background-color: #fcfcfc" placeholder="Ex: dd/mm/yyyy" required>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer centered">
                        <button type="submit" class="button button1" style="text-decoration:none;">APPROVE</button>
                        <button type="submit" class="button button3" style="text-decoration:none;">REJECT</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
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