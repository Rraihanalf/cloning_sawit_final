@extends('petugas.layouts.app')

@section('title', 'Edit Pohon')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Pohon</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Pohon</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('pohon-update-petugas', $pohon->id_pohon) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Pohon</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Sampel</label>
                                <select class="form-control @error('id_sampel') is-invalid @enderror" name="id_sampel">
                                    @foreach ($sampel as $lab)
                                        <option value="{{ $lab->id_sampel }}" {{ $pohon->id_sampel == $lab->id_sampel ? 'selected' : '' }}> {{ $lab->id_sampel }}</option>
                                    @endforeach
                                </select>
                                @error('id_sampel')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Lapangan</label>
                                <select class="form-control @error('id_lapangan') is-invalid @enderror" name="id_lapangan">
                                    @foreach ($lapangan as $lap)
                                        <option value="{{ $lap->id_lapangan }}" {{ $pohon->id_lapangan == $lap->id_lapangan ? 'selected' : '' }}> {{ $lap->id_lapangan }}</option>
                                    @endforeach
                                </select>
                                @error('id_lapangan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Tanam</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input type="text"
                                        class="form-control datepicker @error('tgl_tanam') is-invalid @enderror" name="tgl_tanam" value="{{ $pohon->tgl_tanam }}">
                                </div>
                                @error('tgl_tanam')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tinggi Pohon</label>
                                <input type="text" class="form-control @error('tinggi_pohon') is-invalid @enderror" name="tinggi_pohon" placeholder="Example : 2.8" value="{{ $pohon->tinggi_pohon }}">
                                @error('tinggi_pohon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Tanggal Kematian</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <i class="fas fa-calendar"></i>
                                        </div>
                                    </div>
                                    <input type="date"
                                        class="form-control @error('tgl_kematian') is-invalid @enderror" name="tgl_kematian" value="{{ $pohon->tgl_kematian }}">
                                </div>
                                @error('tgl_kematian')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" data-height="150">{{ $pohon->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-success" type="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/cleave.js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('library/cleave.js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
