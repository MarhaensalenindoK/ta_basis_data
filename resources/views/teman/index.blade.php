@extends('layouts.app')

@section('title', 'Daftar Teman')

@section('content')
<div class="container">
    <h1>Daftar Teman</h1>
    <a href="{{ url('/teman/create') }}" class="btn btn-primary mb-3">Tambah Teman Baru</a>

    <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telepon</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $teman)
                <tr>
                    <td>{{ $teman->id }}</td>
                    <td>{{ $teman->nama }}</td>
                    <td>{{ $teman->alamat }}</td>
                    <td>{{ $teman->telepon }}</td>
                    <td>{{ $teman->email }}</td>
                    <td>
                        <a href="{{ url('/teman/' . $teman->id . '/edit') }}" class="btn btn-info">Edit</a>
                        <form action="{{ url('/teman/' . $teman->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus teman ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Tidak ada data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
