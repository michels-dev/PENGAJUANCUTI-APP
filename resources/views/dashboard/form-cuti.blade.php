@extends('layouts.dashboard')
@section('title', 'Form Cuti')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')
    @push('after-styles')
    <style>
      .error-message {
          color: red;
          font-size: 12px;
      }
    </style>
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
        <form name="myForm" action="{{ route('dashboard.store') }}" method="POST" onsubmit="return validateForm()">
            @csrf
            <div class="card-body">
                <input type="hidden" name="user_created" value="{{ Auth::user()->email }}">
                <div class="row" style="font-size: 14px">
                  <div class="col-6">
                    <label>NIK <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="nik" value="{{ Auth::user()->nik }}" style="background-color: white" readonly>
                    <span id="nik-error" class="error-message"></span>
                  </div>
                  <div class="col-6">
                    <label>Pengajuan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="user_created" value="{{ Auth::user()->email }}" style="background-color: white" disabled>
                    <span id="pengajuan-error" class="error-message"></span>
                  </div>
                </div>
                <div class="row mt-3" style="font-size: 14px">
                    <div class="col-6">
                        <label>Jenis Cuti <span class="text-danger">*</span></label>
                        <select name="tipe" class="cuties" style="width: 100%;" data-placeholder="Select Cuti">
                          <option>Select Cuti</option>
                            @foreach($masterCuti as $cuti)
                            <option value="{{ $cuti->kode }}">{{ $cuti->keterangan}}</option>
                            @endforeach
                        </select>
                        <span id="tipe-error" class="error-message"></span>
                    </div>
                    <div class="col-3">
                      <label>Tanggal Cuti <span class="text-danger">*</span></label>
                      <div class="input-group date" id="startdate" data-target-input="nearest">
                          <input type="text" name="tanggal_mulai" class="form-control datetimepicker-input" data-target="#startdate"/>
                          <div class="input-group-append" data-target="#startdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                      <span id="tanggalMulai-error" class="error-message"></span>
                    </div>
                    <div class="col-3">
                      <label>Selesai Cuti <span class="text-danger">*</span></label>
                      <div class="input-group date" id="enddate" data-target-input="nearest">
                          <input type="text" name="tanggal_selesai" class="form-control datetimepicker-input" data-target="#enddate"/>
                          <div class="input-group-append" data-target="#enddate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                      <span id="tanggalSelesai-error" class="error-message"></span>
                    </div>
                </div>
                <div class="row mt-3" style="font-size: 14px">
                    <div class="col-6">
                      <label>Jumlah Hari <span class="text-danger">*</span></label>
                      <input type="text" class="form-control" name="hari" id="jumlahHari" style="background-color: white" readonly>
                      <span id="hari-error" class="error-message"></span>
                    </div>
                    <div class="col-6">
                      <label>Keterangan <span class="text-danger">*</span></label>
                      <textarea type="text" name="keperluan" class="form-control"></textarea>
                      <span id="keperluan-error" class="error-message"></span>
                    </div>
                </div>
                <div class="row mt-3" style="font-size: 14px">
                    <div class="col-6">
                      <label>Pengganti <span class="text-danger">*</span></label>
                      <input type="text" name="pengganti" class="form-control">
                      <span id="pengganti-error" class="error-message"></span>
                    </div>
                    <div class="col-6">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                          <div class="custom-file">
                            <input type="file" name="bukti_dokumen" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                          </div>
                        </div>
                        <span class="text-danger" style="font-size: 10px">Silahkan upload file jika ada</span>
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
      <strong>Develop by <img src="{{ asset('image/logosim.png') }}" alt="" style="width: 18px"></strong>
    </div>
    <strong>&copy; 2024 BPK PENABUR Jakarta</strong>
  </footer>

@endsection

@push('after-scripts')
<script>
  // Date picker
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
      var totalDays = 0;
      var current_date = start_date;

      // Ulangi setiap hari antara tanggal mulai dan akhir
      while (current_date <= end_date) {
        // Periksa apakah hari ini bukan hari Sabtu (6) atau Minggu (0)
        if (current_date.day() !== 6 && current_date.day() !== 0) {
          totalDays++;
        }
        current_date.add(1, 'days'); // Move to the next day
      }

      $('#jumlahHari').val(totalDays + ' Hari');
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

    {{-- Form Validasi --}}
    <script>
      function validateForm() {
          var nik = document.forms["myForm"]["nik"].value;
          var tipe = document.forms["myForm"]["tipe"].value;
          var tanggalMulai = document.forms["myForm"]["tanggal_mulai"].value;
          var tanggalSelesai = document.forms["myForm"]["tanggal_selesai"].value;
          var hari = document.forms["myForm"]["hari"].value;
          var keperluan = document.forms["myForm"]["keperluan"].value;
          var pengganti = document.forms["myForm"]["pengganti"].value;
          var buktiDokumen = document.forms["myForm"]["bukti_dokumen"].value;

          var isAnyFieldEmpty = false;

          if (nik == "") {
              document.getElementById('nik-error').innerHTML = 'NIK harus diisi';
              isAnyFieldEmpty = true;
          } else {
              document.getElementById('nik-error').innerHTML = '';
          }

          if (tipe == "") {
              document.getElementById('tipe-error').innerHTML = 'Jenis Cuti harus diisi';
              isAnyFieldEmpty = true;
          } else {
              document.getElementById('tipe-error').innerHTML = '';
          }

          if (tanggalMulai == "") {
              document.getElementById('tanggalMulai-error').innerHTML = 'Tanggal Mulai harus diisi';
              isAnyFieldEmpty = true;
          } else {
              document.getElementById('tanggalMulai-error').innerHTML = '';
          }

          if (tanggalSelesai == "") {
              document.getElementById('tanggalSelesai-error').innerHTML = 'Tanggal Selesai harus diisi';
              isAnyFieldEmpty = true;
          } else {
              document.getElementById('tanggalSelesai-error').innerHTML = '';
          }

          if (hari == "") {
              document.getElementById('hari-error').innerHTML = 'Jumlah hari harus diisi dari Tanggal Mulai dan Tanggal Selesai';
              isAnyFieldEmpty = true;
          } else {
              document.getElementById('hari-error').innerHTML = '';
          }

          if (keperluan == "") {
              document.getElementById('keperluan-error').innerHTML = 'Keperluan harus diisi';
              isAnyFieldEmpty = true;
          } else {
              document.getElementById('keperluan-error').innerHTML = '';
          }

          if (pengganti == "") {
              document.getElementById('pengganti-error').innerHTML = 'Pengganti harus diisi';
              isAnyFieldEmpty = true;
          } else {
              document.getElementById('pengganti-error').innerHTML = '';
          }

          if (isAnyFieldEmpty) {
              return false;
          }

          return true;
      }
    </script>

@endpush