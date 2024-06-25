@extends('layouts.app')

@section('title', 'Edit Pegawai')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Pegawai</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form action="{{ route('pegawai-update', $pegawai->id_pegawai) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control @error('nama_pegawai') is-invalid @enderror" name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}">
                            @error('nama_pegawai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror    
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item @error('jenis_kelamin') is-invalid @enderror">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" class="selectgroup-input" {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Laki-laki</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Perempuan</span>
                                </label>
                            </div>
                            @error('jenis_kelamin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Lab</label>
                            <input type="hidden" name="id_lab_old" value="{{ $pegawai->id_lab }}">
                            <select class="form-control @error('id_lab') is-invalid @enderror" name="id_lab">
                                @foreach ($labs as $lab)
                                    <option value="{{ $lab->id_lab }}" {{ $pegawai->id_lab == $lab->id_lab ? 'selected' : '' }}>{{ $lab->nama_lab }}</option>
                                @endforeach
                            </select>
                            @error('id_lab')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control @error('id_lab') is-invalid @enderror" name="email_pegawai" value="{{ $pegawai->email_pegawai }}">
                            @error('email_pegawai')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>No Handphone</label>
                            <input type="text" class="form-control @error('id_lab') is-invalid @enderror" name="no_hp_pegawai" value="{{ $pegawai->no_hp_pegawai }}">
                            @error('no_hp_pegawai')
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
