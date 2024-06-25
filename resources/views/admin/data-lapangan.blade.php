
@extends('layouts.app')

@section('title', 'Data Lapangan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/jqvmap/dist/jqvmap.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('library/summernote/dist/summernote-bs4.min.css') }}">
    <link rel="stylesheet" 
        href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
                                        <h3 class="card-title">Data Lapangan</h3>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            @include('layouts.alert')
                                        </div>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <form >
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
                                                        <th>ID Lapangan</th>
                                                        <th>Luas (m<sup>2</sup>)</th>
                                                        <th>Lokasi</th>
                                                        <th>Kondisi Tanah</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $data)
                                                    <tr>              
                                                        <td>{{ $data->id_lapangan }}</td>
                                                        <td>{{ $data->luas }}</td>
                                                        <td>{{ $data->lokasi }}</td>
                                                        <td>{{ $data->kondisi_tanah }}</td>
                                                        <td>
                                                            <div class="row">
                                                                <div class="col-md">
                                                                    <a href="{{ route('lapangan-edit', $data->id_lapangan) }}" aria-placeholder="Edit">
                                                                        <i class="nav-icon fas fa-edit" style="color: green;"></i>
                                                                    </a>
                                                                    <a href="{{ route('lapangan-delete', $data->id_lapangan) }}" aria-placeholder="Delete" onclick="return confirm('Are you sure you want to delete this item?');">
                                                                        <i class="nav-icon fas fa-trash" style="color: red;"></i>
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

        <!-- jQuery -->
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/simpleweather/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('library/chart.js/dist/Chart.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset('library/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
    <script src="{{ asset('library/summernote/dist/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('library/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/index-0.js') }}"></script>
    
    <script>
        document.querySelector('.tambah-button').addEventListener('click', function() {
            window.location.href = "{{ route('lapangan-create') }}";
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
        });
    </script>
@endpush



