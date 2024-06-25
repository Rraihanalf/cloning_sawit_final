@extends('layouts.app')

@section('title', 'Lapangan Baru')

@push('style')
    
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Lapangan Baru</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item">Lapangan Baru</div>
                </div>
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="/lapangan/create/store" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>Lapangan Baru</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Luas Lapangan</label>
                                <input type="text" class="form-control" name="luas" placeholder="Exp : 150.00">
                            </div>
                            <div class="form-group">
                                <label>Lokasi</label>
                                <input type="text" class="form-control" name="lokasi">
                            </div>
                            <div class="form-group">
                                <label>Kondisi Tanah</label>
                                <input type="text" class="form-control" name="kondisi_tanah">
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
