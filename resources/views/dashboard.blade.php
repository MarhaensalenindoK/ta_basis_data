@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h2>Dashboard Peminjaman DVD</h2>

    <p class="mt-4">
        <div class="row rounded shadow py-2">
            <div class="col-12 col-md-8 col-lg-8 d-flex align-items-center">
                Dashboard ini menampilkan transaksi peminjaman" mengacu pada sebuah antarmuka pengguna grafis yang dirancang khusus untuk memberikan gambaran umum serta informasi terperinci tentang transaksi peminjaman dalam suatu sistem. Fokus utama dashboard ini adalah menyajikan data terkait dengan peminjaman, baik itu peminjaman buku, DVD, peralatan, atau aset lainnya, tergantung pada konteks penggunaannya.
            </div>
            <div class="col-12 col-md-4 col-lg-4 d-flex justify-content-end">
                <img style="width: 300px;" src="{{asset('img/dashboard-logo.png')}}" alt="">
            </div>
        </div>
    </p>

    <!-- Pencarian dan Filter -->
    {{-- <div class="row my-4">
        <div class="col">
            <input type="text" class="form-control" placeholder="Cari DVD...">
        </div>
        <div class="col">
            <select class="form-control">
                <option>Status Peminjaman</option>
                <option>Dipinjam</option>
                <option>Dikembalikan</option>
            </select>
        </div>
    </div> --}}

    <section class="shadow p-2 mt-4">
        <!-- Tabel Transaksi -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Judul DVD</th>
                    <th>Peminjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>The Shawshank Redemption</td>
                    <td>John Doe</td>
                    <td>2024-01-10</td>
                    <td>2024-01-17</td>
                </tr>
            </tbody>
        </table>
    </section>

</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endpush
