@extends('layouts.dashboard')
@section('title', 'Users Tables')
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
            <h3>Users Tables</h3>
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
          <h3 class="card-title">Data Cuti</h3>

          <div class="card-tools">
            <a href="{{ route('dashboard.form-cuti') }}" type="button" class="btn btn-tool">
                <span style="font-size: 20px">Tambah Data <i class="fa fa-plus"></i></span>
            </a>
          </div>
        </div>
        <div class="card-body">
            <table id="usersTable" class="table table-bordered table-striped" style="font-size: 15px; background-color: white">
                <thead>
                    <tr>
                      <th>No.</th>
                      <th>NIK</th>
                      <th>Pengajuan</th>
                      <th>Tanggal Cuti</th>
                      <th>Selesai Cuti</th>
                      <th>Jumlah Hari</th>
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
                        <td>{{ date('d/m/Y', strtotime($row->tanggal_mulai)) }}</td>
                        <td>{{ date('d/m/Y', strtotime($row->tanggal_selesai)) }}</td>
                        <td>{{ $row->hari }}</td>
                        <td>
                            <span>
                                @if ($row->approval === null)
                                    <span class="badge badge-warning">Awaitaing Approval</span>
                                @elseif ($row->approval === 1)
                                    <span class="badge badge-success">Approved</span>
                                @elseif ($row->approval === 0)
                                    <span class="badge badge-danger">Rejected</span>
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
    <strong>&copy; 2024 BPK PENABUR Jakarta</strong>
  </footer>

@endsection

@push('after-scripts')
<script>
  $(document).ready(function() {
      $('#usersTable').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": false,
          "responsive": true,
          "dom": '<"top"<"float-left"l><"float-right"f>>rt<"bottom"ip><"clear">', // Menempatkan searching dan lengthChange sejajar
          "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
          "destroy": true,
          "language": {
              "paginate": {
                  "previous": "Sebelumnya",
                  "next": "Selanjutnya"
              },
              "search": "",
              "searchPlaceholder": "Cari...",
              "lengthMenu": "Tampilkan Data _MENU_",
              "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
              "infoEmpty": "Menampilkan 0 sampai 0 dari 0 data",
              "infoFiltered": "(disaring dari total data _MAX_)"
          }
      });
  });
</script>
@endpush