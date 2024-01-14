@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<div class="container">
    <h1>Daftar Peminjaman</h1>
    <a href="{{ url('/peminjaman/create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>TID</th>
                <th>DVDID</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($peminjaman as $pinjam)
                <tr>
                    <td>{{ $pinjam->id }}</td>
                    <td>{{ $pinjam->TID }}</td>
                    <td>{{ $pinjam->DVDID }}</td>
                    <td>{{ $pinjam->tgl_peminjaman }}</td>
                    <td>{{ $pinjam->tgl_pengembalian }}</td>
                    <td>
                        <a href="{{ url('/peminjaman/' . $pinjam->id . '/edit') }}" class="btn btn-info">Edit</a>
                        <form action="{{ url('/peminjaman/' . $pinjam->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus peminjaman ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection