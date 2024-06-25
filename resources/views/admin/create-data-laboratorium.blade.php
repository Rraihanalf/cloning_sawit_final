@extends('layouts.app')

@section('title', 'Laboratorium Baru')

@push('style')
    
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Laboratorium Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Laboratorium Baru</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="/laboratorium/create/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Laboratorium Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Laboratorium</label>
                                <input type="text" class="form-control @error('nama_lab') is-invalid @enderror" name="nama_lab" placeholder="Laboratorium" value="{{ old('nama_lab') }}">
                                @error('nama_lab')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kapasitas</label>
                                <input type="text" class="form-control @error('kapasitas') is-invalid @enderror" name="kapasitas" value="{{ old('kapasitas') }}">
                                @error('kapasitas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
