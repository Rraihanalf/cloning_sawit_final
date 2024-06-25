@extends('layouts.app')

@section('title', 'User Baru')

@push('style')
    
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>User Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">User Baru</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="/user/create/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>User Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Id Pegawai</label>
                                <select class="form-control @error('id_pegawai') is-invalid @enderror" name="id_pegawai">
                                    @foreach ($data as $data)
                                        <option value="{{ $data->id_pegawai }}" {{ old('id_pegawai') == $data->id_pegawai ? 'selected' : '' }}>{{ $data->nama_pegawai }}</option>
                                    @endforeach
                                </select>
                                @error('id_pegawai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="text" class="form-control" name="password">
                            </div>
                            <div class="form-group">
                                <label class="form-label">Level</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="level" value="1" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="level" value="2" class="selectgroup-input">
                                        <span class="selectgroup-button">Petugas Lab</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="level" value="3" class="selectgroup-input">
                                        <span class="selectgroup-button">Ketua Lab</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="level" value="4" class="selectgroup-input">
                                        <span class="selectgroup-button">Manager</span>
                                    </label>
                                </div>
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
