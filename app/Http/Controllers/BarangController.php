<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kategori;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function getManagePage(Request $request){

        $kategoris = Kategori::all();
        $barangs = Barang::all();

        //Search
        if($request->input('search')){
            $barangs = Barang::where('name','like','%' .request('search'). '%')->get();
        }

        //Filter
        if($request->input('filter')){
            if($request->filter == 0){
                $barangs = Barang::all();
            }
            $barangs = Barang::where('kategori_id','=', request('filter'))->get();
        }

        return view('manage',compact('barangs','kategoris'));
    }

    public function getAddPage(){

        $kategoris = Kategori::all();

        return view('add', compact('kategoris'));
    }

    public function addBarang(Request $request){

        Barang::create([
            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return redirect(route('managePage'));
    }

    public function getUpdatePage($id){
        $barang = Barang::find($id);
        $kategoris = Kategori::all();

        return view('edit',compact('barang','kategoris'));
    }

    public function updateBarang(Request $request, $id){
        $barang = Barang::find($id);

        $barang->update([
            'kategori_id' => $request->kategori_id,
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return redirect(route('managePage'));
    }

    public function deleteBarang($id){
        $barang = Barang::find($id);

        $barang->delete();

        return redirect(route('managePage'));
    }
}
