<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class KamarController extends Controller {
    //list kamar
    public function index(){
        if (session('login')){
            if(Auth::guard('admin')->check()){
                $kamar = DB::table('kamar')->get();
            } elseif (Auth::guard('user')->check()) {
                $kamar = DB::table('kamar')->where('status','Tersedia')->get();
            }
        }
    	// $kamar = [
    	// 	[
    	// 		'nomerKamar'=>'K001',
    	// 		'harga'=> '1.500.000',
    	// 		'tipeKamar' => 'Standar'
    	// 	],
    	// 	[
    	// 		'nomerKamar'=>'K002',
    	// 		'harga'=> '3.500.000',
    	// 		'tipeKamar' => 'Deluxe'
    	// 	]
    	// ];
           if(!Session::get('login')){
            return redirect('login')->with('gagal', 'Silahkan Login');
        }else {
           return view('kamar.index', compact('kamar'));
        }// 
    	
    }
    public function add(){
        return view('kamar.add');
    }

    public function insertdata(Request $request){
        //validation
        $validateData = $request-> validate([
            'nomer' => 'required',
            'tipeKamar' =>'required',
            'harga' => 'required',
            'status' => 'required',
        ]);
        // //insert datake table kamar
        DB::table('kamar')->insert([
            'id_kamar' => $request->nomer,
            'tipe_kamar' => $request->tipeKamar,
            'harga' => $request->harga,
            'status' => $request->status
        ]);
        //redirect ke kamar
        return redirect('/kamar')->with('sukses', 'Data berhasil ditambah');
        // return $request->all();
    }

    // method untuk edit data kamar
    public function editdata($id){
        // mengambil data kamar berdasarkan id yang dipilih
    $kamar = DB::table('kamar')->where('id_kamar',$id)->get();
    // passing data kamar yang didapat ke view edit.blade.php
    return view('kamar.edit',['kamar'=>$kamar]);
    }

    public function update(Request $request){
        //validation
         $validateData = $request-> validate([
            // 'tipeKamar' =>'required',
            'harga' => 'required',
            'status' => 'required',
        ]);
    // update data kamar
    DB::table('kamar')->where('id_kamar',$request->id)->update([
        // 'tipe_kamar' => $request->tipeKamar,
        'harga' => $request->harga,
        'status' => $request->status
    ]);
    // alihkan halaman ke halaman kamar
    return redirect('/kamar')->with('sukses','Data berhasil diedit!');
}

      public function delete($id){
        DB::table('kamar')->where('id_kamar', $id)->delete();
        return redirect('/kamar')->with('sukses','Data berhasil dihapus!');
    }
}
