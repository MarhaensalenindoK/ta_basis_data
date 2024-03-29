<?php

namespace App\Http\Controllers;

use App\Models\Dvd;
use App\Models\Peminjaman;
use App\Services\DVDIDGenerator;
use Illuminate\Http\Request;

class DvdController extends Controller
{
    public function index()
    {
        $dvds = Dvd::all();

        return view('dvd.index')->with('dvds', $dvds);
    }

    public function create()
    {
        return view('dvd.create');
    }

    public function store(Request $request)
    {
        $dvd = new Dvd;
        $lastId = Dvd::orderBy('DVDID', 'desc')->get()->first()->DVDID;

        $dvd->DVDID = DVDIDGenerator::generateId($lastId);
        $dvd->judul = $request->judul;
        $dvd->nama_pemeran = $request->nama_pemeran;
        $dvd->save();

        return redirect('/product');
    }

    public function edit($id)
    {
        $dvd = Dvd::find($id)->toArray();

        return view('dvd.edit')->with('dvd', $dvd);
    }

    public function update(Request $request, $id)
    {
        $dvd = Dvd::find($id);
        $dvd->judul = $request->judul;
        $dvd->nama_pemeran = $request->nama_pemeran;
        $dvd->save();

        return redirect('/product');
    }

    public function destroy($id)
    {
        $dvd = Dvd::find($id);
        Peminjaman::where('DVDID', $dvd->DVDID)->delete();
        
        $dvd->delete();

        return redirect('/product');
    }
}
