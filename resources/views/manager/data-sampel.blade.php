@extends('manager.layouts.app')

@section('title', 'Data Sampel')

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
                                        <h3 class="card-title">Data Sampel</h3>
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
                                                
                                            </div>

                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>ID Sampel</th>
                                                        <th>ID Lab</th>
                                                        <th>Jenis Bibit</th>
                                                        <th>Asal Bibit</th>
                                                        
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($data as $data)
                                                    <tr>                                                
                                                        <td>{{ $data->id_sampel }}</td>
                                                        <td>{{ $data->id_lab }}</td>
                                                        <td>{{ $data->jenis_bibit }}</td>
                                                        <td>{{ $data->asal_bibit }}</td>
                                                        
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
            window.location.href = "{{ route('sampel-create') }}";
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



