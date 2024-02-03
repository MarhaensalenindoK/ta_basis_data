<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Teman;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {

        $reportPerMonth = Peminjaman::join('tb_dvd', 'tb_peminjaman.DVDID', '=', 'tb_dvd.DVDID')
            ->select(DB::raw('MONTH(tb_peminjaman.tgl_peminjaman) as month'), 
                    DB::raw('COUNT(*) as total'))
            ->groupBy('month')
            ->orderBy('month', 'asc')
            ->get();

        $reportPerMonth = $reportPerMonth->map(function ($item, $key) {
            $item->month = date('F', mktime(0, 0, 0, $item->month, 1));
            return $item;
        });

        $mostTransaction = Peminjaman::join('tb_teman', 'tb_peminjaman.TID', '=', 'tb_teman.TID')
            ->select('nama', DB::raw('COUNT(tb_peminjaman.TID) as jumlah_peminjaman'))
            ->groupBy('tb_peminjaman.TID', 'tb_teman.nama')
            ->orderBy('jumlah_peminjaman', 'desc')
            ->limit(5)
            ->get();

        $mostBorrowedDvds = Peminjaman::join('tb_dvd', 'tb_peminjaman.DVDID', '=', 'tb_dvd.DVDID')
            ->select('judul', DB::raw('COUNT(tb_dvd.DVDID) as jumlah_peminjaman'))
            ->groupBy('tb_peminjaman.DVDID', 'tb_dvd.judul')
            ->orderBy('jumlah_peminjaman', 'desc')
            ->limit(5)
            ->get();

        $unreturnedDvds = Peminjaman::join('tb_dvd', 'tb_peminjaman.DVDID', '=', 'tb_dvd.DVDID')
            ->join('tb_teman', 'tb_peminjaman.TID', '=', 'tb_teman.TID')
            ->select('tb_peminjaman.PID', 'judul', 'nama', 'tb_dvd.DVDID')
            ->whereNull('tgl_pengembalian')
            ->get();

        $lastTransactions = Teman::join('tb_peminjaman', 'tb_teman.TID', '=', 'tb_peminjaman.TID')
            ->select('tb_teman.TID','nama', 'tgl_peminjaman')
            ->whereBetween('tgl_peminjaman', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek()
            ])
            ->orderBy('tgl_peminjaman', 'desc')
            ->get();

        return view('dashboard')
            ->with('reportPerMonth', $reportPerMonth)
            ->with('mostTransaction', $mostTransaction)
            ->with('lastTransactions', $lastTransactions)
            ->with('mostBorrowedDvds', $mostBorrowedDvds)
            ->with('unreturnedDvds', $unreturnedDvds);
    }
}
