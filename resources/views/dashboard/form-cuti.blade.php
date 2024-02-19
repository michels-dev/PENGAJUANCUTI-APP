@extends('layouts.dashboard')
{{-- Memanggil Yield --}}
@section('title', 'Form Admin')
@section('content')
    {{-- Fitur --}}
    {{-- Sidebar --}}
    @include('components.sidebar')
    {{-- End Sidebar --}}
    <section class="content blog-page">
        <div class="block-header">
            <div class="row mt-4">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Blog Form Pengajuan Cuti
                        <small>Welcome to SAS BPK Penabur Jakarta</small>
                    </h2>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <ul class="breadcrumb float-md-right">
                    </ul>
                </div>
            </div>
        </div>
        <div class="container-fluid">
                    <!-- Basic Validation -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="header">
                        <h2>Form Input Pengajuan Cuti</h2>
                        <small class="text-danger">- Form ini dilengkapi dengan fitur notifikasi approved, not approved, yang dikirimkan kepada pihak yang mengajukan dan pihak-pihak terkait. </small><br>
                        <small class="text-danger">- Silahkan dibaca terlebih dahulu untuk syarat dan ketentuan dalam Pengajuan Cuti, Klik <a href="{{ asset('file/syarat-cuti-sdm.pdf') }}">disini</a></small>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Back To Previous</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body demo-masked-input">
                        <form action="{{ route('dashboard.store') }}" id="form_validation" method="POST">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-3">
                                    <p class="text-dark font-bold">Kategori Identitas <small class="text-danger">*</small> </p>
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="text-dark" style="font-weight: bold;">NIK</label>
                                                    <input type="text" class="form-control" name="nik" style="background-color: #fcfcfc" placeholder="Isi form ini sesuai dengan nik anda" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body mb-3">
                                            <div class="form-group">
                                                <label for="taskName" style="font-weight: bold;">Jenis Izin</label>
                                                    <div class="form-line">
                                                        <select class="form-control show-tick" name="tipe" style="background-color: #fcfcfc" required>
                                                            <option selected>SILAHKAN PILIH PENGAJUAN CUTI</option>
                                                            @foreach($masterCuti as $cuti)
                                                            <option value="{{ $cuti->kode }}">{{ $cuti->keterangan}}</option>
                                                            @endforeach
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-5">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="text-dark" style="font-weight: bold;">Jumlah Hari</label>
                                                    <input type="text" class="form-control" name="hari" style="background-color: #fcfcfc" placeholder="Isi form ini sesuai dengan jumlah hari anda" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                Mulai Tanggal
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">date_range</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="date" name="tanggal_mulai" class="form-control" style="background-color: #fcfcfc" placeholder="Ex: dd/mm/yyyy" required>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="text-dark" style="font-weight: bold;">Keterangan</label>
                                                    <textarea name="keperluan" cols="30" rows="5" class="form-control no-resize" style="background-color: #fcfcfc" placeholder="Berikan keterangan dalam pengajuan cuti" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="text-dark" style="font-weight: bold;">Pengganti</label>
                                                    <input type="text" class="form-control" name="pengganti" style="background-color: #fcfcfc" placeholder="Isi form ini sesuai dengan pengganti pengajuan cuti anda" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="text-dark" style="font-weight: bold;">Upload Bukti (max 5 MB)</label>
                                                    <input type="file" class="form-control" name="bukti_dokumen" style="background-color: #fcfcfc" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-12 col-sm-6 col-md-6 col-xs-12 mt-3">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                    <input type="hidden" class="form-control" name="user_created" value="{{ Auth::user()->email }}" style="background-color: #fcfcfc" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-raised btn-primary waves-effectt" style="float: right;" type="submit">SAVE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    @endsection
{{-- Script After --}}
@push('after-scripts')
@endpush