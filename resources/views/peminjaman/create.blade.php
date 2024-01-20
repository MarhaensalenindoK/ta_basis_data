@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
<div class="container">
    <h1>Tambah Peminjaman</h1>
    <form action="{{ url('/transaction') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>TID:</label>
            <select name="TID" class="form-control">
                <option value="-" disabled selected>Pilih teman</option>
                @foreach ($teman as $item)
                    <option value="{{$item['TID']}}">{{$item['nama']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>DVDID:</label>
            <select name="DVDID" class="form-control">
                <option value="-" selected>Pilih DVD</option>
                @foreach ($dvds as $item)
                    <option value="{{$item['DVDID']}}">{{$item['judul']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Tanggal Peminjaman:</label>
            <input type="date" class="form-control w-25" name="tgl_peminjaman">
        </div>
        <div class="form-group">
            <label>Tanggal Pengembalian:</label>
            <input type="date" class="form-control w-25" name="tgl_pengembalian">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
