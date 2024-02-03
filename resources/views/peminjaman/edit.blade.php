@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
<div class="container">
    <h1>Edit Peminjaman</h1>
    <form action="{{ url('/transaction/' . $peminjaman->PID) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>TID:</label>
            <select name="TID" class="form-control">
                @foreach ($teman as $item)
                    <option  value="{{$item['TID']}}"
                    @if ($item['TID'] === $peminjaman->TID)
                    selected
                    @endif
                    >{{$item['nama']}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>DVDID:</label>
            <select name="DVDID" class="form-control">
                @foreach ($dvds as $item)
                    <option value="{{$item['DVDID']}}"
                    @if ($item['DVDID'] === $peminjaman->DVDID)
                    selected
                    @endif
                    >{{$item['judul']}}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="tgl_peminjaman">Tanggal Peminjaman:</label>
            <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" value="{{ \Carbon\Carbon::parse($peminjaman->tgl_peminjaman)->format('Y-m-d') }}">

        </div>
        <div class="form-group">
            <label for="tgl_pengembalian">Tanggal Pengembalian:</label>
            <input type="date" class="form-control" id="tgl_peminjaman" name="tgl_peminjaman" value="{{ \Carbon\Carbon::parse($peminjaman->tgl_pengembalian)->format('Y-m-d') }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
