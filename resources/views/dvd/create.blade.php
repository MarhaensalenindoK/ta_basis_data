@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Buat DVD Baru</h1>
    <form method="POST" action="{{ url('/product') }}">
        @csrf
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" name="judul" id="judul">
        </div>
        <div class="form-group">
            <label for="nama_pemeran">Nama Pemeran:</label>
            <input type="text" class="form-control" name="nama_pemeran" id="nama_pemeran">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
