@extends('layouts.app')

@section('title', 'Tambah Teman Baru')

@section('content')
<div class="container">
    <h1>Tambah Teman Baru</h1>
    <form action="{{ url('/teman') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" class="form-control" name="nama">
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" class="form-control" name="alamat">
        </div>
        <div class="form-group">
            <label>Telepon:</label>
            <input type="text" class="form-control" name="telepon">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
