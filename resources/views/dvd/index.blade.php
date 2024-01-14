@extends('layouts.app')

@section('title', 'Daftar DVD')

@section('content')
<div class="container">
    <h1>Daftar DVD</h1>
    <a href="{{ url('/dvd/create') }}" class="btn btn-primary mb-3">Tambah DVD Baru</a>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Nama Pemeran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($dvds as $dvd)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $dvd->judul }}</td>
                    <td>{{ $dvd->nama_pemeran }}</td>
                    <td>
                        <a href="{{ url('/dvd/' . $dvd->id . '/edit') }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ url('/dvd/' . $dvd->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection