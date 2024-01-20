
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
                <code style="font-size: 18px;">
                    {{$januaryQuery}}
                </code>
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
                    @foreach ($januaryData as $item)
                        <tr>
                            <td>{{$item['judul']}}</td>
                            <td>{{$item['nama']}}</td>
                            <td>{{Carbon\Carbon::parse($item['tgl_peminjaman'])->format('Y-m-d')}}</td>
                        </tr>
                    @endforeach
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
                <code style="font-size: 18px;">
                    {{$mostTransactionQuery}}
                </code>
            </p>
        </p>

        <section class="mt-4">
            <!-- Tabel Transaksi -->
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Peminjam</th>
                        <th>Jumlah Pinjam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mostTransaction as $item)
                        <tr>
                            <td>{{$item['nama']}}</td>
                            <td>{{$item['jumlah_peminjaman']}}</td>
                        </tr>
                    @endforeach
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
                <code style="font-size: 18px;">
                    {{$lastTransactionQuery}}
                </code>
            </p>
        </p>

        <section class="mt-4">
            <!-- Tabel Transaksi -->
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>Judul DVD</th>
                        <th>Tanggal Pinjam Terakhir</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            {{$lastTransaction['judul']}}
                        </td>
                        <td>{{Carbon\Carbon::parse($item['tgl_peminjaman'])->format('Y-m-d')}}</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </section>


</div>
@endsection

@push('script')
@endpush
