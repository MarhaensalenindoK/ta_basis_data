<?php

namespace App\Http\Controllers;

use App\Models\Dvd;
use App\Models\Peminjaman;
use App\Models\Teman;
use App\Services\PIDGenerator;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::join('tb_teman', 'tb_peminjaman.TID', '=', 'tb_teman.TID')
        ->join('tb_dvd', 'tb_peminjaman.DVDID', '=', 'tb_dvd.DVDID')
        ->select('tb_peminjaman.*', 'tb_teman.nama as nama_teman', 'tb_dvd.judul as judul_dvd')
        ->get();

        return view('peminjaman.index')->with('peminjaman', $peminjaman);
    }

    public function create()
    {
        $dvds = Dvd::select('DVDID', 'judul')->get();
        $teman = Teman::select('TID', 'nama')->get();

        return view('peminjaman.create')
            ->with('dvds', $dvds)
            ->with('teman', $teman);
    }

    public function store(Request $request)
    {
        $peminjaman = new Peminjaman;
        $lastId = Peminjaman::orderBy('created_at', 'desc')->first()->PID ?? null;
        $peminjaman->PID = PIDGenerator::generateId($lastId);
        $peminjaman->TID = $request->TID;
        $peminjaman->DVDID = $request->DVDID;
        $peminjaman->tgl_peminjaman = Carbon::parse($request->tgl_peminjaman)->startOfDay();
        $peminjaman->tgl_pengembalian = Carbon::parse($request->tgl_pengembalian)->endOfDay();
        $peminjaman->save();

        return redirect('/transaction');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);
        $dvds = Dvd::select('DVDID', 'judul')->get();
        $teman = Teman::select('TID', 'nama')->get();

        return view('peminjaman.edit')
        ->with('peminjaman', $peminjaman)
        ->with('dvds', $dvds)
        ->with('teman', $teman);
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($request->id);
        $peminjaman->TID = $request->TID;
        $peminjaman->DVDID = $request->DVDID;
        $peminjaman->tgl_peminjaman = Carbon::parse($request->tgl_peminjaman)->startOfDay();
        $peminjaman->tgl_pengembalian = Carbon::parse($request->tgl_pengembalian)->endOfDay();
        $peminjaman->save();

        return redirect('/transaction');
    }

    public function destroy($id)
    {
        Peminjaman::find($id)->delete();

        return redirect('/transaction');
    }
}
