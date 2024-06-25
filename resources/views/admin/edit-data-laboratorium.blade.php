@extends('layouts.app')

@section('title', 'Edit Laboratorium')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Laboratorium</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Laboratorium</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('laboratorium-update', $labs->id_lab) }}" method="post">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Laboratorium</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama Laboratorium</label>
                                <input type="text" class="form-control @error('nama_lab') is-invalid @enderror" name="nama_lab" value="{{ $labs->nama_lab }}">
                                @error('nama_lab')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kapasitas</label>
                                <input type="text" class="form-control @error('kapasitas') is-invalid @enderror" name="kapasitas" value="{{ $labs->kapasitas }}">
                                @error('kapasitas')
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
