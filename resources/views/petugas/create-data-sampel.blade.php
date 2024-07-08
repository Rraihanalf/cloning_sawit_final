@extends('petugas.layouts.app')

@section('title', 'Sampel Baru')

@push('style')
    
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Sampel Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Sampel Baru</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="/sampel/create/store/petugas" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Sampel Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Lab</label>
                                <select class="form-control @error('id_lab') is-invalid @enderror" name="id_lab">
                                    @foreach ($data as $lab)
                                        <option value="{{ $lab->id_lab }}" {{ old('id_lab') == $lab->id_lab ? 'selected' : '' }}>{{ $lab->nama_lab }}</option>
                                    @endforeach
                                </select>
                                @error('id_lab')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Jenis Bibit</label>
                                <input type="text" class="form-control @error('jenis_bibit') is-invalid @enderror" name="jenis_bibit">
                                @error('jenis_bibit')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Asal Bibit</label>
                                <input type="text" class="form-control @error('asal_bibit') is-invalid @enderror" name="asal_bibit">
                                @error('asal_bibit')
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
