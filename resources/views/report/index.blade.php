
@extends('layouts.app')

@section('title', 'Report - Query')

@section('content')
<div class="container mt-4">
    <h2>Report Query Request</h2>
    <p class="mt-4">
        Query SQL Request dari yang diminta, sebagai berikut :
    </p>

    <hr class="shadow-lg bg-white">
    <section class="shadow-lg p-2 rounded section-report">
        <h4 class="text-white-50">
            Tampilkan data DVD dan nama peminjam untuk bulan Januari
        </h4>
        <p>
            <b>Query</b>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum aliquam repudiandae, explicabo quibusdam rem et. Id, ab debitis at beatae voluptate ipsam quia.
            </p>
        </p>

        <section class="mt-4">
            <!-- Tabel Transaksi -->
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Judul DVD</th>
                        <th>Peminjam</th>
                        <th>Tanggal Pinjam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>The Shawshank Redemption</td>
                        <td>John Doe</td>
                        <td>2024-01-10</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>

    <section class="mt-4 shadow-lg p-2 rounded section-report">
        <h4 class="text-white-50">
            Tampilkan nama-nama peminjam yang sering meminjam DVD dari Risa
        </h4>
        <p>
            <b>Query</b>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum aliquam repudiandae, explicabo quibusdam rem et. Id, ab debitis at beatae voluptate ipsam quia.
            </p>
        </p>

        <section class="mt-4">
            <!-- Tabel Transaksi -->
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Peminjam</th>
                        <th>Judul DVD</th>
                        <th>Tanggal Pinjam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>John Doe</td>
                        <td>The Shawshank Redemption</td>
                        <td>2024-01-10</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>

    <section class="mt-4 shadow-lg p-2 rounded section-report">
        <h4 class="text-white-50">
            Tampilkan tanggal peminjaman terakhir untuk DVD dengan judul “Die Another Day”
        </h4>
        <p>
            <b>Query</b>
            <p>
                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum aliquam repudiandae, explicabo quibusdam rem et. Id, ab debitis at beatae voluptate ipsam quia.
            </p>
        </p>

        <section class="mt-4">
            <!-- Tabel Transaksi -->
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Judul DVD</th>
                        <th>Tanggal Pinjam</th>
                        <th>Peminjam</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>The Shawshank Redemption</td>
                        <td>2024-01-10</td>
                        <td>John Doe</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>


</div>
@endsection

@push('script')
@endpush
