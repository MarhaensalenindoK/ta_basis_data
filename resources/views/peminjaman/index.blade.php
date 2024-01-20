@extends('layouts.app')

@section('title', 'Daftar Peminjaman')

@section('content')
<div class="container">
    <h1>Daftar Peminjaman</h1>
    <a href="{{ url('/transaction/create') }}" class="btn btn-primary mb-3">Tambah Peminjaman</a>

    <table class="table table-striped table-bordered">
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
            @forelse($peminjaman as $pinjam)
                <tr>
                    <td>{{ $pinjam->PID }}</td>
                    <td>{{ $pinjam->TID }}</td>
                    <td>{{ $pinjam->DVDID }}</td>
                    <td>{{ Carbon\Carbon::parse($pinjam->tgl_peminjaman)->locale('id_ID')->format('Y-m-d') }}</td>
                    <td>{{ $pinjam->tgl_pengembalian ? Carbon\Carbon::parse($pinjam->tgl_pengembalian)->locale('id_ID')->format('Y-m-d') : 'Belum dikembalikan' }}</td>
                    <td>
                        <a href="{{ url('/transaction/' . $pinjam->PID . '/edit') }}" class="btn btn-info">Edit</a>
                        <form action="{{ url('/transaction/' . $pinjam->PID) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus peminjaman ini?')">Hapus</button>
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
