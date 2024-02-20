@extends('layouts.dashboard')
@section('title', 'Admin Tables')
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
            <h3>Admin Tables</h3>
          </div>
          <div class="col-sm-6" style="font-size: 14px">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
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
          <h1 class="card-title">Data Pengajuan Cuti</h1>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-body">
            <table id="adminTable" class="table table-bordered table-striped" style="font-size: 15px; background-color: white">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>Nik</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Persetujuan</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
               @php
                   $no = 1;
               @endphp
                @foreach ($data as $row)
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $row->nik }}</td>
                  <td>{{ $row->user_created }}</td>
                  <td><button type="button" class="btn  btn-outline-info" data-toggle="modal" data-target="#approvalModal{{ $row->id }}">APPROVAL</button></td>
                  <td>{{ $row->approval_date }}</td>
                  <td>
                    <button type="button" class="btn btn-outline-primary"><i class="fas fa-eye"></i></button>
                    <button type="button" class="btn btn-outline-success"><i class="fas fa-edit"></i></button>
                    <button type="button" class="btn btn-outline-danger"><i class="fas fa-trash"></i></button>
                  </td>
                </tr>
                </tbody>
                @endforeach
            </table>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

          <!-- Default Size -->
          @foreach ($data as $row)
          <div class="modal fade" id="approvalModal{{ $row->id }}" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal Approval</h5>
                        <button type="button" class="btn btn-link" data-dismiss="modal" style="font-size: 12px">CLOSE</button>
                      </div>
                      <div class="modal-body">
                          <form id="approvalForm{{ $row->id }}" action="{{ route('admin.approvalcuti', $row->id) }}" method="POST">
                              @csrf
                              <input type="hidden" name="action" id="action{{ $row->id }}" value="">
                              <!-- Tambahkan hidden input untuk menyimpan nilai 1 atau 0 -->
                              <input type="hidden" name="approval" id="approval{{ $row->id }}" value="">
                              <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Tanggal Persetujuan</label>
                                <input type="date" class="form-control" name="approval_date" placeholder="Ex: dd/mm/yyyy">
                              </div>
                      </div>
                      <div class="modal-footer" style="text-align: center;">
                        <button type="button" class="btn btn-outline-primary mr-2" onclick="setActionAndSubmit('approve', {{ $row->id }})">APPROVE</button>
                        <button type="button" class="btn btn-outline-danger" onclick="setActionAndSubmit('reject', {{ $row->id }})">REJECT</button>
                    </div>
                      </form>
                  </div>
              </div>
          </div>
          @endforeach

@endsection

@push('after-scripts')
<script>
    $(function () {
      $('#adminTable').DataTable({
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

    {{-- script action approve and reject --}}
    <script>
        function setActionAndSubmit(action, id)
        {
            document.getElementById('action' + id).value = action;
            document.getElementById('approvalForm' + id).submit();
        }
    </script>
@endpush