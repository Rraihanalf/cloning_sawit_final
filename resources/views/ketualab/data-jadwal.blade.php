@extends('ketualab.layouts.app')

@section('title', 'Data Jadwal')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet"
        href="{{ asset('library/fullcalendar/dist/fullcalendar.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Jadwal</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
                    <div class="breadcrumb-item">Jadwal</div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    @include('layouts.alert')
                </div>
            </div>
            <div class="section-body">

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kalender</h4>
                                <button class="jadwal-btn btn btn-outline-primary" type="button"><i class="far fa-plus"></i> Tambah Jadwal</button>
                            </div>
                            
                            <div class="card-body">
                                <div class="fc-overflow">
                                    <div id="myEvent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/fullcalendar/dist/fullcalendar.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/modules-calendar.js') }}"></script>
    <script>
        document.querySelector('.jadwal-btn').addEventListener('click', function() {
            window.location.href = "{{ route('jadwal-create') }}";
        });
    </script>
@endpush
