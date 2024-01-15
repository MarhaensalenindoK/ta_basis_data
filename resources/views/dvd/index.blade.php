@extends('layouts.app')

@section('title', 'Daftar DVD')

@section('content')
<div class="container">
    <h1>Daftar DVD</h1>
    <a href="{{ url('/product/create') }}" class="btn btn-primary mb-3">Tambah DVD Baru</a>

    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Judul</th>
                <th scope="col">Nama Pemeran</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($dvds as $dvd)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $dvd->judul }}</td>
                    <td>{{ $dvd->nama_pemeran }}</td>
                    <td>
                        <a href="{{ url('/product/' . $dvd->id . '/edit') }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ url('/product/' . $dvd->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
