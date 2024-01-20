
@extends('layouts.app')

@section('title', 'Report - Query')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/styles/default.min.css">
<style>
    /* Style untuk kontainer kode */
    .pre-container {
        position: relative;
        background: #fff;
        padding: 10px;
        border-radius: 8px;
        color: #333;
    }

    /* Style untuk tombol copy */
    .copy-button {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #333;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    /* Style untuk tag <code> */
    code {
        white-space: pre;
        overflow-x: auto;
        font-size: 1.4rem !important;
    }

    /* Menonaktifkan overflow-x default highlight.js */
    .hljs {
        white-space: pre-wrap;
    }
</style>
@endsection

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
            <div class="pre-container pre-container-1">
                <button class="copy-button" onclick="copyToClipboard(1)">Copy</button>
                <pre><code class="sql hljs">{{$januaryQuery ?? '-'}}</code></pre>
            </div>
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
                    @forelse($januaryData as $item)
                        <tr>
                            <td>{{$item['judul']}}</td>
                            <td>{{$item['nama']}}</td>
                            <td>{{Carbon\Carbon::parse($item['tgl_peminjaman'])->format('Y-m-d')}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
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
            <div class="pre-container pre-container-2">
                <button class="copy-button" onclick="copyToClipboard(2)">Copy</button>
                <pre><code class="sql hljs">{{$mostTransactionQuery ?? '-'}}</code></pre>
            </div>
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
                    @forelse ($mostTransaction as $item)
                        <tr>
                            <td>{{$item['nama']}}</td>
                            <td>{{$item['jumlah_peminjaman']}}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="text-center">Tidak ada data</td>
                        </tr>
                    @endforelse
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
            <div class="pre-container pre-container-3">
                <button class="copy-button" onclick="copyToClipboard(3)">Copy</button>
                <pre><code class="sql hljs">{{$lastTransactionQuery ?? '-'}}</code></pre>
            </div>
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
                @if ($lastTransaction)
                    <tr>
                        <td>
                            {{$lastTransaction['judul']}}
                        </td>
                        <td>{{Carbon\Carbon::parse($item['tgl_peminjaman'])->format('Y-m-d')}}</td>
                    </tr>
                @else
                    <tr>
                        <td colspan="2" class="text-center">Tidak ada data</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </section>
    </section>


</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.4.0/highlight.min.js"></script>
<script>
    hljs.highlightAll();

    function copyToClipboard(field) {
        const textToCopy = document.querySelector(`.pre-container-${field} code`).innerText;
        navigator.clipboard.writeText(textToCopy).then(() => {
            alert('Kode berhasil disalin!');
        }, (err) => {
            alert('Gagal menyalin kode: ', err);
        });
    }
</script>
@endpush
