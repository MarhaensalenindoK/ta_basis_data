@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
<div class="container">
    <h1>Tambah Peminjaman</h1>
    <form action="{{ url('/peminjaman') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>TID:</label>
            <input type="text" class="form-control" name="TID">
        </div>
        <div class="form-group">
            <label>DVDID:</label>
            <input type="text" class="form-control" name="DVDID">
        </div>
        <div class="form-group">
            <label>Tanggal Peminjaman:</label>
            <input type="date" class="form-control" name="tgl_peminjaman">
        </div>
        <div class="form-group">
            <label>Tanggal Pengembalian:</label>
            <input type="date" class="form-control" name="tgl_pengembalian">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
