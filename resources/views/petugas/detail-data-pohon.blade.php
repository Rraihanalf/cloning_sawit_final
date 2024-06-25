@extends('petugas.layouts.app')

@section('title', 'Detail Pohon')

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
            <h1>Detail Pohon</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form action="">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>ID Pohon</label>
                            <input type="text" class="form-control" name="id_sampel" value="{{ $pohon->id_pohon }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>ID Sampel</label>
                            <input type="text" class="form-control" name="id_sampel" value="{{ $pohon->id_sampel }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>ID Lapangan</label>
                            <input type="text" class="form-control" name="id_lab" value="{{ $pohon->id_lapangan }}" readonly>
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
                                    class="form-control datepicker" name="tgl_tanam" value="{{ $pohon->tgl_tanam }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Daya Hidup</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Hidup" class="selectgroup-input" {{ $pohon->daya_hidup == 'Hidup' ? 'checked' : '' }} disabled >
                                    <span class="selectgroup-button">Hidup</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Mati" class="selectgroup-input" {{ $pohon->daya_hidup == 'Mati' ? 'checked' : '' }} disabled >
                                    <span class="selectgroup-button">Mati</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Tinggi Pohon</label>
                            <input type="text" class="form-control" name="asal_bibit" value="{{ $pohon->tinggi_pohon }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Kematian</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                </div>
                                <input type="text"
                                    class="form-control" name="tgl_tanam" value="{{ $pohon->tgl_kematian }}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="d-block mb-2">Bukti Kematian</label>
                            @if($pohon->bukti_kematian)
                                <img src="{{ asset($pohon->bukti_kematian) }}" alt="Bukti Kematian" class="img-fluid mb-3">
                            @else
                                <span class="text-muted">Tidak ada bukti kematian</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" data-height="150" readonly>{{ $pohon->deskripsi }}</textarea>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a class="btn btn-success" href="/petugas"><i class="nav-icon fas fa-arrow-left"></i> Back</a>
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
