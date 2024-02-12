@extends('layouts.dashboard')
{{-- Memanggil Yield --}}
@section('title', 'Dashboard')
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
                        <h2>Form Input Peminjaman Ruangan</h2>
                        <small class="text-danger">- Form ini dilengkapi dengan fitur notifikasi approved, not approved, rejected yang dikirimkan kepada pihak yang mengajukan dan pihak-pihak terkait.</small><br>
                        <small class="text-danger">- Fitur notifikasi approved, not approved, rejected akan dikirimkan setelah admin melakukan action, baik saat diajukan pertama kali, maupun pada saat form di edit</small>
                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown"><a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more-vert"></i> </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a href="javascript:void(0);">Back To Previous</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body demo-masked-input">
                        <form action="" id="form_validation" method="POST">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-4 col-sm-6 col-md-6 col-xs-12 mt-3">
                                    <p class="text-dark font-bold">Kategori Identitas <small class="text-danger">*</small> </p>
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body mb-3">
                                            <div class="form-group">
                                                <label for="taskName" style="font-weight: bold;">Users Created</label>
                                                    <div class="form-line">
                                                        <select class="form-control" id="selectUsers" name="user_created" style="background-color: #fcfcfc" required>
                                                            <option selected>SILAHKAN PILIH USERS</option>
                                                            {{-- @foreach($masterRole as $user)
                                                            <option value="{{ $user->email }}">{{ $user->name }} ({{ $user->role }})</option>
                                                            @endforeach --}}
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
                                                    <label class="text-dark" style="font-weight: bold;">Pemohon</label>
                                                    <input type="text" class="form-control" name="pemohon" style="background-color: #fcfcfc" placeholder="Isi form ini sesuai dengan nama anda" required>
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
                                                    <label class="text-dark" style="font-weight: bold;">Jumlah Peserta</label>
                                                    <input type="text" class="form-control" name="jumlah_peserta" style="background-color: #fcfcfc" placeholder="Input jumlah peserta yang mengikuti acara" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                    <p class="text-dark font-bold">Kategori Tujuan <small class="text-danger">*</small> </p>
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body mb-5">
                                            <div class="form-group">
                                                <label for="taskName" style="font-weight: bold;">Unit/Bagian</label>
                                                    <div class="form-line">
                                                        <select class="form-control" id="selectUnit" name="unit" style="background-color: #fcfcfc" required>
                                                            <option selected>SILAHKAN PILIH UNIT ANDA</option>
                                                            {{-- @foreach($masterUnit as $unit)
                                                            <option value="{{ $unit }}">{{ $unit }}</option>
                                                            @endforeach --}}
                                                        </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="text-dark" style="font-weight: bold;">Keperluan</label>
                                                    <textarea name="keperluan" cols="30" rows="5" class="form-control no-resize" style="background-color: #fcfcfc" placeholder="Berikan alasan keperluan apa dalam peminjaman ruangan" required></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12 mt-3">
                                    <p class="text-dark font-bold">Kategori Tanggal/Waktu <small class="text-danger">*</small> </p>
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                Mulai Tanggal
                                                    <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">date_range</i>
                                                        </span>
                                                        <div class="form-line">
                                                            <input type="date" name="mulai" class="form-control" style="background-color: #fcfcfc" placeholder="Ex: dd/mm/yyyy" required>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12 mt-5">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                Waktu Mulai (24 hour)
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">access_time</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="time" name="waktu_mulai" class="form-control" style="background-color: #fcfcfc" placeholder="Ex: 23:59" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12 mt-5">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                Selesai Tanggal
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">date_range</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="date" name="selesai" class="form-control" style="background-color: #fcfcfc" placeholder="Ex: dd/mm/yyyy" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-md-6 col-xs-12 mt-5">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                Waktu Selesai (24 hour)
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">access_time</i>
                                                    </span>
                                                    <div class="form-line">
                                                        <input type="time" name="waktu_selesai" class="form-control" style="background-color: #fcfcfc" placeholder="Ex: 23:59" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-3">
                                    <p class="text-dark font-bold">Kategori Peminjaman <small class="text-danger">*</small> </p>
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label class="text-dark" style="font-weight: bold;">Keterangan</label>
                                                    <textarea name="keterangan" cols="30" rows="5" class="form-control no-resize" style="background-color: #fcfcfc" placeholder="Berikan keterangan dalam peminjaman ruangan" required></textarea>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12 mt-5">
                                    <div class="card" style="background-color: #fcfcfc">
                                        <div class="body mb-5">
                                            <div class="form-group">
                                                <label for="taskName" style="font-weight: bold;">Ruangan</label>
                                                <div class="form-line">
                                                    <select class="form-control" id="selectRuangan" name="ruangan" style="background-color: #fcfcfc" required>
                                                        <option selected>SILAHKAN PILIH RUANGAN ANDA</option>
                                                        {{-- @foreach($masterRuangan as $ruangan)
                                                            <option value="{{ $ruangan }}">{{ $ruangan }}</option>
                                                        @endforeach --}}
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button id="sendButton" class="btn btn-raised btn-primary btn-lg waves-effect" style="float: right;" type="button">SAVE</button>
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