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
                            <input type="text" class="form-control" name="nama_pegawai" value="{{ $pegawai->nama_pegawai }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Laki-laki" class="selectgroup-input" {{ $pegawai->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Laki-laki</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="jenis_kelamin" value="Perempuan" class="selectgroup-input" {{ $pegawai->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Perempuan</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Lab</label>
                            <select class="form-control" name="id_lab">
                                @foreach ($labs as $lab)
                                    <option value="{{ $lab->id_lab }}" {{ $pegawai->id_lab == $lab->id_lab ? 'selected' : '' }}>{{ $lab->nama_lab }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email_pegawai" value="{{ $pegawai->email_pegawai }}">
                        </div>
                        <div class="form-group">
                            <label>No Handphone</label>
                            <input type="text" class="form-control" name="no_hp_pegawai" value="{{ $pegawai->no_hp_pegawai }}">
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
