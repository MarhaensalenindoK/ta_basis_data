@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="container mt-4">
    <h2>Dashboard Peminjaman DVD</h2>

    <p class="mt-4">
        <div class="row rounded shadow py-2">
            <div class="col-12 col-md-8 col-lg-8">
                Dashboard ini menampilkan transaksi peminjaman" mengacu pada sebuah antarmuka pengguna grafis yang dirancang khusus untuk memberikan gambaran umum serta informasi terperinci tentang transaksi peminjaman dalam suatu sistem. Fokus utama dashboard ini adalah menyajikan data terkait dengan peminjaman, baik itu peminjaman buku, DVD, peralatan, atau aset lainnya, tergantung pada konteks penggunaannya.
            </div>
            <div class="col-12 col-md-4 col-lg-4 d-flex justify-content-end">
                <svg xmlns="http://www.w3.org/2000/svg" width="200" height="200" viewBox="0 0 256 256" class="mt-2 mt-md-0 mt-lg-0">
                    <g fill="none"><rect width="256" height="256" fill="#242938" rx="60"/><path fill="#FF2D20" fill-rule="evenodd" d="M215.846 78.314c.064.243.098.494.098.747v39.199c0 .503-.131.997-.379 1.432a2.838 2.838 0 0 1-1.037 1.047l-32.446 18.942v37.545a2.873 2.873 0 0 1-1.409 2.48l-67.728 39.535c-.155.089-.324.146-.493.207c-.064.022-.123.061-.19.079a2.81 2.81 0 0 1-1.445 0c-.077-.022-.148-.065-.222-.093c-.155-.057-.317-.107-.465-.193l-67.714-39.535a2.848 2.848 0 0 1-1.036-1.047a2.893 2.893 0 0 1-.38-1.433V59.629c0-.258.035-.508.099-.75c.02-.083.07-.158.098-.24c.053-.15.102-.303.18-.443c.053-.093.13-.168.194-.253c.08-.115.155-.233.25-.333c.08-.082.187-.143.278-.214c.102-.086.194-.179.31-.247h.004L76.27 37.382a2.796 2.796 0 0 1 2.819 0l33.859 19.767h.007c.112.072.208.161.31.243c.091.072.193.136.274.215c.099.103.17.221.254.336c.06.085.141.16.19.253c.081.143.127.293.184.443c.028.082.077.157.098.243c.065.244.098.495.099.747v73.45l28.214-16.473v-37.55c0-.25.035-.503.099-.742c.025-.086.07-.161.099-.243c.056-.15.105-.304.183-.443c.053-.093.13-.168.19-.254c.085-.114.155-.232.254-.332c.081-.082.183-.143.275-.215c.105-.085.197-.178.31-.246h.004l33.862-19.768a2.789 2.789 0 0 1 2.818 0l33.859 19.768c.12.072.211.16.317.243c.088.071.19.136.271.214c.099.104.169.222.254.336c.063.086.141.16.19.254c.081.14.127.293.183.443c.032.082.078.157.099.243m-5.546 38.292V84.009l-11.849 6.916l-16.369 9.557v32.597l28.221-16.473zm-33.859 58.966v-32.618l-16.101 9.325l-45.979 26.609v32.925zM46.644 64.577v110.995l62.073 36.238v-32.919l-32.428-18.61l-.01-.007l-.015-.007c-.109-.064-.2-.157-.303-.236c-.088-.071-.19-.128-.267-.207l-.007-.01c-.092-.09-.156-.2-.233-.301c-.07-.096-.155-.178-.211-.278l-.004-.011c-.064-.107-.103-.236-.148-.357c-.046-.107-.106-.207-.134-.322v-.004c-.035-.135-.042-.278-.057-.418c-.014-.107-.042-.214-.042-.321V81.051L58.493 71.49l-11.849-6.91zm31.04-21.415L49.474 59.63l28.203 16.466l28.207-16.47l-28.207-16.463zm14.671 102.764l16.366-9.553V64.577l-11.85 6.917l-16.368 9.556v71.797zm86.909-83.332l-28.208 16.467l28.208 16.466l28.203-16.47zm-2.823 37.888l-16.369-9.557l-11.848-6.916v32.597l16.365 9.553l11.852 6.92zm-64.905 73.458l41.373-23.952l20.682-11.968l-28.186-16.456l-32.453 18.946l-29.578 17.267z" clip-rule="evenodd"/></g>
                </svg>
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