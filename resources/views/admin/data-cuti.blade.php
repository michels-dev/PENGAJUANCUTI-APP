@extends('layouts.dashboard')
@section('title', 'Data Cuti')
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
                  <th>Tanggal Cuti</th>
                  <th>Selesai Cuti</th>
                  <th>Jumlah Hari</th>
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
                  <td>{{$row->approval_date}}</td>
                  <td>
                    {{-- <button type="button" class="btn btn-outline-primary"><i class="fas fa-eye"></i></button> --}}
                    <button type="button" class="btn  btn-outline-success" data-toggle="modal" data-target="#approvalModal{{ $row->id }}"><i class="fas fa-calendar-check"></i></button>
                    <a href="#" onclick="cancelSweetAlert(event, {{ $row->id }}, '{{ $row->nik }}')"
                      class="btn btn-outline-warning"><i class="far fa-calendar-times"></i>
                    </a>
                    <a href="#" onclick="deleteSweetAlert(event, {{ $row->id }}, '{{ $row->nik }}')"
                      class="btn btn-outline-danger"><i class="fas fa-trash"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

          <!-- Approval Modal -->
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
                              {{-- <input type="hidden" name="approval" id="approval{{ $row->id }}" value=""> --}}
                              <div class="mb-3">
                                <label>Tanggal Persetujuan <span class="text-danger">*</span></label>
                                <input type="date" name="approval_date" class="form-control" placeholder="{{ date('d/m/Y') }}" value="{{ date('Y-m-d') }}" style="background-color: white" readonly/>
                              </div>
                      </div>
                      <div class="modal-footer" style="text-align: center;">
                        <button type="button" class="btn btn-outline-primary mr-2 swalDefaultSuccess" onclick="setActionAndSubmit('approve', {{ $row->id }})">APPROVE</button>
                        <button type="button" class="btn btn-outline-danger swalDefaultError" onclick="setActionAndSubmit('reject', {{ $row->id }})">REJECT</button>
                    </div>
                      </form>
                  </div>
              </div>
          </div>
          @endforeach

          {{-- <!-- Cancel Modal -->
          @foreach ($data as $index => $row)
          <div class="modal fade" id="cancelModal{{ $row->id }}" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title">Modal Cancel Cuti</h5>
                      </div>
                      <div class="modal-body">
                          <form action="{{ route('admin.cancel', ['id'=>$row->id]) }}" method="POST">
                              @csrf
                              <input type="hidden" name="approval" value="{{ $row->approval }}">
                              <input type="hidden" name="approval_date" value="{{ $row->approval_date }}">
                              <div class="row">
                                  <div class="col-6">
                                      <label>Tanggal Cuti <span class="text-danger">*</span></label>
                                      <input type="date" name="tanggal_mulai" class="form-control" value="{{ date('Y-m-d', strtotime($row->tanggal_mulai)) }}"/>
                                  </div>
                                  <div class="col-6">
                                      <label>Tanggal Selesai <span class="text-danger">*</span></label>
                                      <input type="date" name="tanggal_selesai" class="form-control" value="{{ date('Y-m-d', strtotime($row->tanggal_selesai)) }}"/>
                                  </div>
                              </div>
                              <div class="row mt-3">
                                  <div class="col-12">
                                      <label>Hari <span class="text-danger">*</span></label>
                                      <input type="hari" name="hari" class="form-control" value="{{ $row->hari }}"/>
                                  </div>
                              </div>
                      </div>
                      <div class="modal-footer" style="text-align: center;">
                          <button type="button" class="btn btn-outline-info mr-2" data-dismiss="modal">Kembali</button>
                          <button type="submit" class="btn btn-warning mr-2 swalCancelWarning">Cancel</button>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
          @endforeach --}}

          <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
              <strong>Develop by <img src="{{ asset('image/logosim.png') }}" alt="" style="width: 18px"></strong>
            </div>
            <strong>&copy; 2024 BPK PENABUR Jakarta</strong>
          </footer>
@endsection

@push('after-scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
      const startDateInputs = document.querySelectorAll('[name^="tanggal_mulai"]');
      const endDateInputs = document.querySelectorAll('[name^="tanggal_selesai"]');
      const daysInputs = document.querySelectorAll('[name^="hari"]');

      function calculateDays(index) {
          const startDateInput = startDateInputs[index];
          const endDateInput = endDateInputs[index];
          const daysInput = daysInputs[index];

          const startDate = new Date(startDateInput.value);
          const endDate = new Date(endDateInput.value);
          const timeDiff = endDate - startDate;
          const diffDays = timeDiff ? (timeDiff / (1000 * 60 * 60 * 24)) + 1 : ''; // Tambahkan 1 untuk menghitung termasuk hari terakhir
          daysInput.value = diffDays ? diffDays + " Hari" : ''; // Pastikan ini mengupdate input yang benar
      }

      startDateInputs.forEach((input, index) => {
          input.addEventListener('change', () => calculateDays(index));
          calculateDays(index);
      });

      endDateInputs.forEach((input, index) => {
          input.addEventListener('change', () => calculateDays(index));
          calculateDays(index);
      });
  });
</script>

{{-- <script>
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
  </script> --}}

  {{-- Script DataTables --}}
  <script>
    $(document).ready(function() {
        $('#adminTable').DataTable({
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

    {{-- script action approve and reject --}}
    <script>
        function setActionAndSubmit(action, id)
        {
            document.getElementById('action' + id).value = action;
            document.getElementById('approvalForm' + id).submit();
        }
    </script>

    {{-- Tostr Approval --}}
    <script>
      $(function() {
      var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
      });

      // Approved
      $('.swalDefaultSuccess').click(function() {
        Toast.fire({
          icon: 'success',
          title: 'Data persetujuan cuti telah disetujui.'
        })
      });

      // Rejected
      $('.swalDefaultError').click(function() {
        Toast.fire({
          icon: 'error',
          title: 'Data persetujuan cuti tidak disetujui.'
        })
      });

        // Delect
      //   $('.swalDeleteError').click(function() {
      //   Toast.fire({
      //     icon: 'error',
      //     title: 'Data persetujuan cuti tersebut telah dihapus.'
      //   })
      // });

        // Cancel
      //   $('.swalCancelWarning').click(function() {
      //   Toast.fire({
      //     icon: 'warning',
      //     title: 'Data persetujuan cuti telah dicancel.'
      //   })
      // });
    });
    </script>

  <script>
    //Date picker
    $('#reservationdate').datetimepicker({
    format: 'L'
  });
  </script>

{{-- <script>
    $(document).ready(function() {
        $('#adminTable').DataTable({
            "lengthMenu": [[10, 25, 50, 100], [10, 25, 50, 100]],
            "destroy": true
        });
    });
</script> --}}

{{-- script sweet alert cancel cuti --}}
<script>
  function cancelSweetAlert(event, id, nama) {
      event.preventDefault();
      Swal.fire({
          title: "Cancel Cuti?",
          text: "Apakah Anda yakin ingin cancel cuti dengan NIK " + nama + "?",
          icon: "warning",
          showCancelButton: true,
          confirmButtonText: "Ya, Cancel",
          confirmButtonColor: '#FFA500',
          cancelButtonText: "Batal",
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = "{{ url('admin/cancel') }}/" + id;
              Swal.fire("Cancel!", "Cuti berhasil dicancel.", "success");
          }
      });
  }
</script>

{{-- script sweet alert delete --}}
<script>
  function deleteSweetAlert(event, id, nama) {
      event.preventDefault();
      Swal.fire({
          title: "Hapus Data?",
          text: "Apakah Anda yakin ingin menghapus data dengan NIK " + nama + "?",
          icon: "error",
          showCancelButton: true,
          confirmButtonText: "Ya, Hapus",
          confirmButtonColor: '#FF0000',
          cancelButtonText: "Batal",
      }).then((result) => {
          if (result.isConfirmed) {
              window.location.href = "{{ url('admin/destroy') }}/" + id;
              Swal.fire("Terhapus!", "Data berhasil dihapus.", "success");
          }
      });
  }
</script>

@endpush