@extends('layouts.dashboard')
@section('title', 'Form Cuti')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')
    @push('after-styles')

    @endpush

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Pengajuan Cuti</h3>
          </div>
          <div class="col-sm-6"  style="font-size: 14px">
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
          <h3 class="card-title">Tambah Cuti</h3>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <form action="{{ route('dashboard.store') }}" method="POST">
            @csrf
            <div class="card-body">
                <input type="hidden" name="user_created" value="{{ Auth::user()->email }}">
                <div class="row" style="font-size: 14px">
                  <div class="col-6">
                    <label>NIK <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nik">
                  </div>
                  <div class="col-6">
                    <label>Pengajuan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="user_created" value="{{ Auth::user()->email }}" style="background-color: white" disabled>
                  </div>
                </div>
                <div class="row mt-3" style="font-size: 14px">
                    <div class="col-6">
                        <label>Jenis Cuti <span class="text-danger">*</span></label>
                        <select name="tipe" class="cuties" multiple="multiple" style="width: 100%;" data-placeholder="Select Cuti">
                            @foreach($masterCuti as $cuti)
                            <option value="{{ $cuti->kode }}">{{ $cuti->keterangan}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-3">
                      <label>Tanggal Cuti <span class="text-danger">*</span></label>
                      <div class="input-group date" id="startdate" data-target-input="nearest">
                          <input type="text" name="tanggal_mulai" class="form-control datetimepicker-input" data-target="#startdate"/>
                          <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <label>Selesai Cuti <span class="text-danger">*</span></label>
                      <div class="input-group date" id="enddate" data-target-input="nearest">
                          <input type="text" name="tanggal_selesai" class="form-control datetimepicker-input" data-target="#enddate"/>
                          <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                    </div>
                </div>
                <div class="row mt-3" style="font-size: 14px">
                    <div class="col-6">
                      <label>Jumlah Hari <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="hari" id="jumlahHari" style="background-color: white" readonly>
                    </div>
                    <div class="col-6">
                      <label>Keterangan <span class="text-danger">*</span></label>
                      <textarea type="text" name="keperluan" class="form-control"></textarea>
                    </div>
                </div>
                <div class="row mt-3" style="font-size: 14px">
                    <div class="col-6">
                      <label>Pengganti <span class="text-danger">*</span></label>
                      <input type="text" name="pengganti" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="exampleInputFile">File input <span class="text-danger">*</span></label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="bukti_dokumen" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
              <!-- /.card-body -->
            <div class="card-footer">
                <a href="{{ route('users.users-table') }}" type="submit" class="btn btn-outline-info">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            <!-- /.card-footer-->
        </form>
      </div>
      <!-- /.card -->

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

@push('after-scripts')
<script>
  //Date picker
  $('#startdate').datetimepicker({
    format: 'L',
  });

  $('#enddate').datetimepicker({
    format: 'L',
  });

  $('#startdate').on('change.datetimepicker', function (e) {
    calculateDays();
  });

  $('#enddate').on('change.datetimepicker', function (e) {
    calculateDays();
  });

  function calculateDays() {
    var start_date = moment($('#startdate').datetimepicker('viewDate'));
    var end_date = moment($('#enddate').datetimepicker('viewDate'));

    if (start_date.isValid() && end_date.isValid()) {
      var diffDays = end_date.diff(start_date, 'days') + 1;
      $('#jumlahHari').val(diffDays + ' Hari');
    }
  }
</script>

    <script>
        // File input
        $(function () {
            bsCustomFileInput.init();
        });
    </script>

    <script>
        //Initialize Select2 Elements
        $('.cuties').select2({
            theme: 'bootstrap4'
        })
    </script>
@endpush