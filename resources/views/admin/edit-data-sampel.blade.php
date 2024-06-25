@extends('layouts.app')

@section('title', 'Edit Sampel')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Sampel</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form action="{{ route('sampel-update', $sampel->id_sampel) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Lab</label>
                            <select class="form-control @error('id_lab') is-invalid @enderror" name="id_lab">
                                @foreach ($labs as $lab)
                                    <option value="{{ $lab->id_lab }}" {{ $sampel->id_lab == $lab->id_lab ? 'selected' : '' }}>{{ $lab->nama_lab }}</option>
                                @endforeach
                            </select>
                            @error('id_lab')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Jenis Bibit</label>
                            <input type="text" class="form-control @error('jenis_bibit') is-invalid @enderror" name="jenis_bibit" value="{{ $sampel->jenis_bibit }}">
                            @error('jenis_bibit')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Asal Bibit</label>
                            <input type="text" class="form-control @error('asal_bibit') is-invalid @enderror" name="asal_bibit" value="{{ $sampel->asal_bibit }}">
                            @error('asal_bibit')
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
