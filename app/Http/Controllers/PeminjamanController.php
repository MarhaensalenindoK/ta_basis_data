<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Services\PIDGenerator;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();

        return view('peminjaman.index')->with('peminjaman', $peminjaman);
    }

    public function create()
    {
        return view('peminjaman.create');
    }

    public function store(Request $request)
    {
        $peminjaman = new Peminjaman;
        $lastId = Peminjaman::orderBy('created_at', 'desc')->first()->PID;
        $peminjaman->PID = PIDGenerator::generateId($lastId);
        $peminjaman->TID = $request->TID;
        $peminjaman->DVDID = $request->DVDID;
        $peminjaman->tgl_peminjaman = $request->tgl_peminjaman;
        $peminjaman->tgl_pengembalian = $request->tgl_pengembalian;
        $peminjaman->save();

        return redirect('/peminjaman');
    }

    public function edit($id)
    {
        $peminjaman = Peminjaman::find($id);
        return view('peminjaman.edit', ['peminjaman' => $peminjaman]);
    }

    public function update(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($request->id);
        $peminjaman->TID = $request->TID;
        $peminjaman->DVDID = $request->DVDID;
        $peminjaman->tgl_peminjaman = $request->tgl_peminjaman;
        $peminjaman->tgl_pengembalian = $request->tgl_pengembalian;
        $peminjaman->save();

        return redirect('/peminjaman');
    }

    public function destroy($id)
    {
        Peminjaman::find($id)->delete();

        return redirect('/peminjaman');
    }
}
