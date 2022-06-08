<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function getKategoriPage(){
        $kategoris = Kategori::all();

        return view('kategori',compact('kategoris'));
    }

    public function kategoriAddPage(){
        return view('addKategori');
    }

    public function addKategori(Request $request){

        Kategori::create([
            'name' => $request->name,
        ]);

        return redirect(route('manageKategori'));
    }

    public function kategoriEditPage($id){
        $kategori = Kategori::find($id);

        return view('editKategori',compact('kategori'));
    }

    public function editKategori(Request $request, $id){
        $kategori = Kategori::find($id);

        $kategori->update([
            'name' => $request->name
        ]);

        return redirect(route('manageKategori'));
    }

    public function deleteKategori($id){
        $kategori = Kategori::find($id);

        $kategori->delete();

        return redirect(route('manageKategori'));
    }
}
