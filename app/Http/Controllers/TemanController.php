<?php

namespace App\Http\Controllers;

use App\Models\Teman;
use App\Services\TIDGenerator;
use Illuminate\Http\Request;

class TemanController extends Controller
{

    public function index()
    {
        $data = Teman::all();

        return view('teman.index')->with('data', $data);
    }

    public function create()
    {
        return view('teman.create');
    }

    public function store(Request $request)
    {
        $teman = new Teman;
        $lastId = Teman::orderBy('TID', 'desc')->first()->TID;
        $teman->TID = TIDGenerator::generateId($lastId);
        $teman->nama = $request->nama;
        $teman->alamat = $request->alamat;
        $teman->telepon = $request->telepon;
        $teman->email = $request->email;
        $teman->save();

        return redirect('/user');
    }

    public function destroy($id)
    {
        $teman = Teman::find($id);
        $teman->delete();

        return redirect('/user');
    }

    public function edit($id)
    {
        $teman = Teman::find($id)->toArray();

        return view('teman.edit', ['teman' => $teman]);
    }

    public function update(Request $request)
    {
        $teman = Teman::find($request->id);
        $teman->nama = $request->nama;
        $teman->alamat = $request->alamat;
        $teman->telepon = $request->telepon;
        $teman->email = $request->email;
        $teman->save();

        return redirect('/user');
    }
}
