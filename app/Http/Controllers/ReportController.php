<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Teman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function index()
    {

        $januaryData = Peminjaman::join('tb_dvd', 'tb_peminjaman.DVDID', '=', 'tb_dvd.DVDID')
            ->join('tb_teman', 'tb_peminjaman.TID', '=', 'tb_teman.TID')
            ->select('judul', 'nama', 'tgl_peminjaman')
            ->whereMonth('tb_peminjaman.tgl_peminjaman', '=', 1)
            ->get();

        $januaryQuery = 'select `judul`, `nama`, `tgl_peminjaman` from `tb_peminjaman` inner join `tb_dvd` on `tb_peminjaman`.`DVDID` = `tb_dvd`.`DVDID` inner join `tb_teman` on `tb_peminjaman`.`TID` = `tb_teman`.`TID` where month(`tb_peminjaman`.`tgl_peminjaman`) = `01`';

        DB::enableQueryLog();

        $mostTransaction = Peminjaman::join('tb_teman', 'tb_peminjaman.TID', '=', 'tb_teman.TID')
            ->select('nama', DB::raw('COUNT(tb_peminjaman.TID) as jumlah_peminjaman'))
            ->groupBy('tb_peminjaman.TID', 'tb_teman.nama')
            ->orderBy('jumlah_peminjaman', 'desc')
            ->limit(5)
            ->get();

        $mostTransactionQuery = DB::getQueryLog()[0]['query'];

        $lastTransaction = Peminjaman::join('tb_dvd', 'tb_peminjaman.DVDID', '=', 'tb_dvd.DVDID')
            ->select('judul', 'tgl_peminjaman')
            ->where('tb_dvd.judul', 'Die Another Day')
            ->orderBy('tgl_peminjaman', 'desc')
            ->first();

        $lastTransactionQuery = DB::getQueryLog()[1]['query'];

        return view('report.index')
            ->with('januaryData', $januaryData)
            ->with('januaryQuery', $januaryQuery)
            ->with('mostTransaction', $mostTransaction)
            ->with('mostTransactionQuery', $mostTransactionQuery)
            ->with('lastTransaction', $lastTransaction)
            ->with('lastTransactionQuery', $lastTransactionQuery);
    }
}
