@extends('layouts.dashboard')
@section('title', 'Rejected')
@section('content')
    @include('components.navbar')
    @include('components.sidebar')

    @push('after-style')

    @endpush

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Rejected</h3>
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
          <h3 class="card-title">Table Rejected</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
            <table id="rejectedTable" class="table table-bordered table-striped" style="font-size: 15px; background-color: white">
                <thead>
                    <tr>
                      <th>No.</th>
                      <th>NIK</th>
                      <th>Pengajuan</th>
                      <th>Tanggal Mulai</th>
                      <th>Status</th>
                      <th>Tanggal Persetujuan</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $index => $row )
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->nik }}</td>
                        <td>{{ $row->user_created }}</td>
                        <td>{{ $row->tanggal_mulai }}</td>
                        <td>
                            <span>
                                @if ($row->approval === 0)
                                    <span class="badge badge-danger">Rejected</span>
                                @endif
                            </span>
                        </td>
                        <td>{{ $row->approval_date }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
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
    $(function () {
      $('#rejectedTable').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "dom": '<"top"f>rt<"text-left"i><"top text-center"p>',
      });
    });
  </script>
@endpush