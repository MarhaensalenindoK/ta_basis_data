@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit DVD</h1>
    <form method="POST" action="{{ url('/dvd/' . $dvd->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="judul">Judul:</label>
            <input type="text" class="form-control" name="judul" id="judul" value="{{ $dvd->judul }}">
        </div>
        <div class="form-group">
            <label for="nama_pemeran">Nama Pemeran:</label>
            <input type="text" class="form-control" name="nama_pemeran" id="nama_pemeran" value="{{ $dvd->nama_pemeran }}">
        </div>
        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>
@endsection