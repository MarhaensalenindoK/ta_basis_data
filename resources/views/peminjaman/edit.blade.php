@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
<div class="container">
    <h1>Edit Peminjaman</h1>
    <form action="{{ url('/peminjaman/' . $peminjaman->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="TID">TID:</label>
            <input type="text" class="form-control" id="TID" name="TID" value="{{ $peminjaman->TID }}">
        </div>
        <div class="form-group">
            <label for="DVDID">DVDID:</label>
            <input type="text" class="form-control" id="DVDID" name="DVDID" value="{{ $peminjaman->DVDID }}">
        </div>
        <div class="form-group">
            <label for="tgl_peminjaman">Tanggal Peminjaman:</label>
            <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" value="{{ $peminjaman->tgl_peminjaman }}">
        </div>
        <div class="form-group">
            <label for="tgl_pengembalian">Tanggal Pengembalian:</label>
            <input type="date" class="form-control" id="tgl_pengembalian" name="tgl_pengembalian" value="{{ $peminjaman->tgl_pengembalian }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
