@extends('layouts.app')

@section('title', 'Pegawai Baru')

@push('style')
    
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Pegawai Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Pegawai Baru</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                <form action="/pegawai/create/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Pegawai Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" name="nama_pegawai" value="{{ old('nama_pegawai') }}">
                                @error('nama_pegawai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label">Jenis Kelamin</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jenis_kelamin" value="Laki-laki" class="selectgroup-input" {{ old('jenis_kelamin') == 'Laki-laki' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Laki-laki</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input" {{ old('jenis_kelamin') == 'Perempuan' ? 'checked' : '' }}>
                                        <span class="selectgroup-button">Perempuan</span>
                                    </label>
                                </div>
                            </div>
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
                                <label>Email</label>
                                <input type="email" class="form-control @error('email_pegawai') is-invalid @enderror" name="email_pegawai" value="{{ old('email_pegawai') }}">
                                @error('email_pegawai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No Handphone</label>
                                <input type="text" class="form-control @error('no_hp_pegawai') is-invalid @enderror" name="no_hp_pegawai" value="{{ old('no_hp_pegawai') }}">
                                @error('no_hp_pegawai')
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
