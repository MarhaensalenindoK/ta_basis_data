@extends('layouts.app')

@section('title', 'Edit Teman')

@section('content')
<div class="container">
    <h1>Edit Teman</h1>
    <form action="{{ url('/user/' . $teman->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Nama:</label>
            <input type="text" class="form-control" name="nama" value="{{ $teman->nama }}">
        </div>
        <div class="form-group">
            <label>Alamat:</label>
            <input type="text" class="form-control" name="alamat" value="{{ $teman->alamat }}">
        </div>
        <div class="form-group">
            <label>Telepon:</label>
            <input type="text" class="form-control" name="telepon" value="{{ $teman->telepon }}">
        </div>
        <div class="form-group">
            <label>Email:</label>
            <input type="email" class="form-control" name="email" value="{{ $teman->email }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
