<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
class TamuController extends Controller
{
    //list tamu
    public function index(){
        $tamu = DB::table('tamu')->get();
    	// $tamu = [
    	// 	[
    	// 		'nama'=>'dimas',
    	// 		'alamat'=> 'jimbaran',
    	// 		'jenis-kelamin' => 'laki-laki'
    	// 	],
    	// 	[
    	// 		'nama'=>'agam',
    	// 		'alamat'=> 'kedonganan',
    	// 		'jenis-kelamin' => 'laki-laki'
    	// 	]
    	// ];
        
        if(!Session::get('login')){
            return redirect('login')->with('gagal', 'Silahkan Login');
        }else {
    	   return view('tamu.index', compact('tamu'));
        }

    }
    public function add(){
        return view('/transaksi.add');
    }
    // public function edit(){
    //     return view('tamu.edit');
    // }


    public function insertdata(Request $request){
        //validation
        $validateData = $request-> validate([
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
        ]);
        //insert datake table tamu
        DB::table('tamu')->insert([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat
        ]);
        //redirect ke tamu
        return redirect('/tamu')->with('sukses','Data berhasil ditambah!');
        // return $request->all();
    }


    // method untuk edit data tamu
    public function editdata($id){
        // mengambil data tamu berdasarkan id yang dipilih
    $tamu = DB::table('tamu')->where('id_tamu',$id)->get();
    // passing data tamu yang didapat ke view edit.blade.php
    return view('tamu.edit',['tamu'=>$tamu]);
    }

    public function update(Request $request){
        //validation
        $validateData = $request-> validate([
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
        ]);
    // update data tamu
    DB::table('tamu')->where('id_tamu',$request->id)->update([
        'nama' => $request->nama,
        'jenis_kelamin' => $request->jk,
        'alamat' => $request->alamat
    ]);
    // alihkan halaman ke halaman tamu
    return redirect('/tamu')->with('sukses','Data berhasil diedit!');
}

      public function delete($id){
        DB::table('tamu')->where('id_tamu', $id)->delete();
        return redirect('/tamu')->with('sukses','Data berhasil dihapus!');
    }
  
}
