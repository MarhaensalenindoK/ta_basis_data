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

    <div class="d-flex">
        <section class="shadow w-50 p-2 mt-4">
            <h3 class="text-center">Peminjam Paling Sering</h3>
            <canvas id="frequent-borrower"></canvas>
        </section>
        <section class="shadow w-50 p-2 mt-4">
            <h3 class="text-center">DVD Paling Sering Dipinjam</h3>
            <canvas id="frequent-borrowed-dvd"></canvas>
        </section>
    </div>

    <section class="shadow w-100 p-2 mt-4">
        <h3 class="text-center">Laporan Peminjaman Per Bulan</h3>
        <canvas id="reports-per-month"></canvas>
    </section>
    
    <div class="d-flex">
        <section class="shadow w-50 p-2 mt-4">
            <h3 class="text-center">DVD Belum Dikembalikan</h3>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>DVDID</th>
                        <th>Judul</th>
                        <th>Peminjam</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($unreturnedDvds as $item)
                    <tr>
                        <td>{{ $item->DVDID }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->nama }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
        
        <section class="shadow w-50 p-2 mt-4">
            <h3 class="text-center">Peminjam Terbaru</h3>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>TID</th>
                        <th>Nama</th>
                        <th>Tanggal Peminjaman</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $lastTransactions as $item)
                    <tr>
                        <td>{{ $item->TID }}</td>
                        <td>{{ $item->nama }}</td>
                        <td>{{ Carbon\Carbon::parse($item->tgl_peminjaman)->locale('id_ID')->format('Y-m-d') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    </div>

</div>
@endsection

@push('script')
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var frequentBorrower = document.getElementById('frequent-borrower').getContext('2d');
    new Chart(frequentBorrower, {
        type: 'bar', // or 'line', 'pie', etc.
        data: {
            labels: {!! $mostTransaction->pluck('nama') !!},
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: {!! $mostTransaction->pluck('jumlah_peminjaman') !!},
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    ticks: {
                        color: 'white',
                    },
                },
                y: { 
                    ticks: {
                        color: 'white',
                    },
                },
            }
        }
    });

    var frequentBorrowedDvd = document.getElementById('frequent-borrowed-dvd').getContext('2d');
    new Chart(frequentBorrowedDvd, {
        type: 'bar', // or 'line', 'pie', etc.
        data: {
            labels: {!! $mostBorrowedDvds->pluck('judul') !!},
            datasets: [{
                label: 'Jumlah Peminjaman',
                data: {!! $mostBorrowedDvds->pluck('jumlah_peminjaman') !!},
                backgroundColor: 'rgba(0, 123, 255, 0.5)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
            
        },
        options: {
            scales: {
                x: {
                    ticks: {
                        color: 'white',
                    },
                },
                y: { 
                    ticks: {
                        color: 'white',
                    },
                },
            }
        }
    });

    var reportsPerMonth = document.getElementById('reports-per-month').getContext('2d');
    new Chart(reportsPerMonth, {
        type: 'line',
        data: {
            labels: {!! $reportPerMonth->pluck('month')->toJson() !!},
            datasets: [{
                label: 'Total Peminjaman per Month',
                data: {!! $reportPerMonth->pluck('total')->toJson() !!},
                backgroundColor: 'rgba(0, 123, 255, 0.3)',
                borderColor: 'rgba(0, 123, 255, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                x: {
                    ticks: {
                        color: 'white',
                    },
                },
                y: { 
                    ticks: {
                        color: 'white',
                    },
                    beginAtZero: true,
                },
            }
        }
    });
          
</script>
@endpush
