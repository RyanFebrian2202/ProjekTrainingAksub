<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function getManagePage(Request $request){

        //Search
        if($request->input('search')){
            $barangs = Barang::where('name','like','%' .request('search'). '%')->get();
        } else{
            $barangs = Barang::all();
        }

        return view('manage',compact('barangs'));
    }

    public function getAddPage(){
        return view('add');
    }

    public function addBarang(Request $request){

        Barang::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return redirect(route('managePage'));
    }

    public function getUpdatePage($id){
        $barang = Barang::find($id);

        return view('edit',compact('barang'));
    }

    public function updateBarang(Request $request, $id){
        $barang = Barang::find($id);

        $barang->update([
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
