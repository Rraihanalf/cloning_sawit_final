@extends('layouts.app')

@section('title', 'Edit User')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit User</h1>
        </div>
        <div class="section-body">
            <div class="card">
                <form action="{{ route('user-update', $user->id) }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" name="username" value="{{ $user->username }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="selectgroup w-100">
                                <label class="selectgroup-item">
                                    <input type="radio" name="level" value="1" class="selectgroup-input" {{ $user->level == '1' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Admin</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="level" value="2" class="selectgroup-input" {{ $user->level == '2' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Petugas Lab</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="level" value="3" class="selectgroup-input" {{ $user->level == '3' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Ketua Lab</span>
                                </label>
                                <label class="selectgroup-item">
                                    <input type="radio" name="level" value="4" class="selectgroup-input" {{ $user->level == '4' ? 'checked' : '' }}>
                                    <span class="selectgroup-button">Manager</span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Password (Biarkan kosong jika tidak ingin merubah)</label>
                            <input type="password" class="form-control" name="password">
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
