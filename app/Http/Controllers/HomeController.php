<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();

        return view('home', compact('kategori'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'kategorip' => 'required|max:30'
        ]);

        $name = $request->file('image')->getClientOriginalName();

        $request->image->move(public_path('images'), $name);

        dd('sukma dik');

        // $kategoris = new Kategori();

        // $kategoris->kategori = $request->kategorip;

        // $kategoris->save();

        // return redirect('/');
    }

    public function update($id, Request $request)
    {
        $kategoriy = [
            'kategori' =>$request->kategorip,
        ];

        Kategori::where('idkategori',$id)
        ->update($kategoriy);

        return redirect('/');
    }

    public function destroy($id)
    {
        Kategori::where('idkategori', $id)->delete();

        return redirect('/');
    }
}
