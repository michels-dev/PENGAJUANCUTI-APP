@extends('layouts.datatables')
{{-- Memanggil Yield --}}
@section('title', 'Table Admin')
@section('content')
    {{-- Fitur --}}
    {{-- Sidebar --}}
    @include('')
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

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">DataTable with default features</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                              <th>Rendering engine</th>
                              <th>Browser</th>
                              <th>Platform(s)</th>
                              <th>Engine version</th>
                              <th>CSS grade</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                              <td>Trident</td>
                              <td>Internet
                                Explorer 4.0
                              </td>
                              <td>Win 95+</td>
                              <td> 4</td>
                              <td>X</td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr>
                              <th>Rendering engine</th>
                              <th>Browser</th>
                              <th>Platform(s)</th>
                              <th>Engine version</th>
                              <th>CSS grade</th>
                            </tr>
                            </tfoot>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                      <!-- /.card -->
                    </div>
                    <!-- /.col -->
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </section>

    @endsection
    @push('after-scripts')
        {{-- script action approve and reject --}}
        <script>
            function setActionAndSubmit(action, id)
            {
                document.getElementById('action' + id).value = action;
                document.getElementById('approvalForm' + id).submit();
            }
        </script>
    <!-- Page specific script -->
    <script>
        $(function () {
        $("#adminTable").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
        });
    </script>
    @endpush