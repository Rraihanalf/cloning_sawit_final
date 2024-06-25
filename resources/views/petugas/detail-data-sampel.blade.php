@extends('petugas.layouts.app')

@section('title', 'Detail Sampel')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Detail Sampel</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form action="">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>ID Sampel</label>
                            <input type="text" class="form-control" name="id_sampel" value="{{ $sampel->id_sampel }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Lab</label>
                            <input type="text" class="form-control" name="id_lab" value="{{ $sampel->id_lab }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Jenis Bibit</label>
                            <input type="text" class="form-control" name="jenis_bibit" value="{{ $sampel->jenis_bibit }}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Asal Bibit</label>
                            <input type="text" class="form-control" name="asal_bibit" value="{{ $sampel->asal_bibit }}" readonly>
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <a class="btn btn-success" href="/sampel/petugas"><i class="nav-icon fas fa-arrow-left"></i> Back</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
@endsection
