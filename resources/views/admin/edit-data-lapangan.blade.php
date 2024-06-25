@extends('layouts.app')

@section('title', 'Edit Lapangan')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Lapangan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Edit Lapangan</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('lapangan-update', $lapangan->id_lapangan) }}" method="post">
                        @csrf
                        <div class="card-header">
                            <h4>Edit Lapangan</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Luas</label>
                                <input type="text" class="form-control @error('luas') is-invalid @enderror" name="luas" value="{{ $lapangan->luas }}">
                                @error('luas')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" class="form-control @error('lokasi') is-invalid @enderror" name="lokasi" value="{{ $lapangan->lokasi }}">
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Kondisi Tanah</label>
                                <input type="text" class="form-control @error('kondisi_tanah') is-invalid @enderror" name="kondisi_tanah" value="{{ $lapangan->kondisi_tanah }}">
                                @error('kondisi_tanah')
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
