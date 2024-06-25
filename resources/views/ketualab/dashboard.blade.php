@extends('ketualab.layouts.app')

@section('title', 'Dashboard')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
    <div class="wrapper">
        <!-- Content Wrapper. Contains page content -->
        <div class="main-content">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Dashboard</h3>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        @include('layouts.alert')
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <form>
                                        <div class="row">
                                            <div class="col-md mb-3">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" placeholder="Search" aria-label="Search" id="search-input" aria-describedby="button-addon2">
                                                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <button class="tambah-button" type="button">Tambah</button>
                                            </div>
                                        </div>

                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>ID Pohon</th>
                                                    <th>Tanggal Tanam</th>
                                                    <th>Tinggi Pohon (m)</th>
                                                    <th>Daya Hidup</th>
                                                    <th>Tanggal Kematian</th>
                                                    <th>Bukti Kematian</th>
                                                    <th style="width: 110px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data as $data)
                                                <tr>
                                                    <td>{{ $data->id_pohon }}</td>
                                                    <td>{{ $data->tgl_tanam }}</td>
                                                    <td>{{ $data->tinggi_pohon }}</td>
                                                    <td>
                                                        @if ($data->daya_hidup == 'Hidup')
                                                            <div class="badge badge-success">Survive</div>
                                                        @elseif ($data->daya_hidup == 'Mati')
                                                            <div class="badge badge-danger">Dead</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (is_null($data->tgl_kematian))
                                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="setTanggalKematian('{{ $data->id_pohon }}')">Set tanggal</button>
                                                        @else
                                                            {{ $data->tgl_kematian }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($data->bukti_kematian)
                                                            <button type="button" class="btn btn-outline-info btn-sm" onclick="lihatBuktiKematian('{{ asset($data->bukti_kematian) }}')">Lihat Bukti</button>
                                                        @else
                                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="setBuktiKematian('{{ $data->id_pohon }}')">Bukti Mati</button>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col-md">
                                                                <a href="{{ route('pohon-edit-ketualab', $data->id_pohon) }}" aria-placeholder="Detail">
                                                                    <i class="nav-icon fas fa-edit" style="color:green;"></i>
                                                                </a>
                                                                <a href="{{ route('pohon-detail-ketualab', $data->id_pohon) }}" aria-placeholder="Detail">
                                                                    <i class="nav-icon fas fa-print"></i>
                                                                </a>
                                                                <a href="{{ route('pohon-delete-ketualab', $data->id_pohon) }}" aria-placeholder="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                    <i class="nav-icon fas fa-trash" style="color:red;"></i>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </form>
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
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="setTanggalModal" tabindex="-1" aria-labelledby="setTanggalModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="setTanggalModalLabel">Set Tanggal Kematian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="setTanggalForm" method="post">
                        @csrf
                        <!-- <input type="hidden" name="id_pohon" id="editIdPohon"> -->
                        <div class="mb-3">
                            <label for="tgl_kematian" class="form-label">Tanggal Kematian</label>
                            <input type="text" class="form-control datepicker" id="tgl_kematian" name="tgl_kematian" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal untuk Menambahkan Bukti Kematian -->
    <div class="modal fade" id="setBuktiModal" tabindex="-1" aria-labelledby="setBuktiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="setBuktiModalLabel">Tambah Bukti Kematian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form id="setBuktiForm" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id_pohon" id="buktiIdPohon">
                        <div class="mb-3">
                            <label for="bukti_kematian" class="form-label">Upload Bukti Kematian</label>
                            <input type="file" class="form-control" id="bukti_kematian" name="bukti_kematian" accept="image/*" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="lihatBuktiModal" tabindex="-1" aria-labelledby="lihatBuktiModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="lihatBuktiModalLabel">Bukti Kematian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="Bukti Kematian" id="lihatBuktiImg" style="max-width: 100%;">
                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
    
    <script>
        document.querySelector('.tambah-button').addEventListener('click', function() {
            window.location.href = "{{ route('pohon-create-ketualab') }}";
        });

        document.getElementById('search-input').addEventListener('input', function() {
            let filter = this.value.toLowerCase();
            let rows = document.querySelectorAll('#example1 tbody tr');
            
            rows.forEach(row => {
                let cells = row.querySelectorAll('td');
                let match = false;
                cells.forEach(cell => {
                    if (cell.textContent.toLowerCase().includes(filter)) {
                        match = true;
                    }
                });
                if (match) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });

        $(document).ready(function() {
            $('#example1').DataTable({
                "pageLength": 10,
                "lengthChange": false,
                "searching": false,
                "ordering": false,
                "info": true
            });

            // Initialize date picker
            $('.datepicker').daterangepicker({
                singleDatePicker: true,
                showDropdowns: true,
                locale: {
                    format: 'YYYY-MM-DD'
                }
            });

            // Handle date change event
            $('.datepicker').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('YYYY-MM-DD'));
            });
        });

        function setTanggalKematian(id_pohon) {
            // Set action for the form
            $('#setTanggalForm').attr('action', `/pohon/${id_pohon}/set-tanggal-kematian/ketualab`);
            // Show the modal
            $('#setTanggalModal').modal('show');
        }

        function setBuktiKematian(id_pohon) {
            $('#buktiIdPohon').val(id_pohon); // Mengatur nilai ID pohon pada input hidden
            $('#setBuktiForm').attr('action', `/pohon/${id_pohon}/set-bukti-kematian/ketualab`);
            $('#setBuktiModal').modal('show'); // Menampilkan modal
        }

        function lihatBuktiKematian(bukti_kematian_path) {
        // Set the image source in the modal
        $('#lihatBuktiModal img').attr('src', bukti_kematian_path);
        // Show the modal
        $('#lihatBuktiModal').modal('show');
    }

    </script>
@endpush
