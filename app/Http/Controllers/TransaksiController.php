<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


use Carbon\Carbon;
class TransaksiController extends Controller {
	
    public function index(){
        if(session('login')){ 
            $transaksi = DB::table('transaksi')->join('kamar', 'transaksi.tipe_kamar', 'kamar.id_kamar')->where('payment','Pending')->get();
            return view('transaksi.index', compact('transaksi'));	
        } else {
            return redirect()->route('login')->with('gagal','silahkan login');
        }

    }
    
    public function add(){
        $kode= $this->kode();
    	$kamar = DB::table('kamar')->select('id_kamar','tipe_kamar')->get();
    	return view('transaksi.add', compact('kamar', 'kode'));

    }

     public function detail($id){
        $transaksi = DB::table('transaksi')->join('kamar', 'transaksi.tipe_kamar', 'kamar.id_kamar')->where('no_trans', $id)->get();
        $tamu = DB::table('tamu')->where('no_trans', $id)->get();
        $total = DB::table('transaksi')->where('no_trans', $id)->sum('total');
        return view('transaksi.detail',compact('transaksi','total','tamu'));

    }

    public function insertdata(Request $request){
        $kamar = DB::table('kamar')->select('id_kamar','tipe_kamar', 'harga')->get();
        $ekstra = DB::table('ekstra')->get();
        $bed = DB::table('ekstra')->select('harga')->where('jenis_addons','Bed')->get();
        $towel = DB::table('ekstra')->select('harga')->where('jenis_addons','Towel')->get();
        $pillow = DB::table('ekstra')->select('harga')->where('jenis_addons','Pillow')->get();
        $tanggal= Carbon::now()->format('Y-m-d');

        // //validation
        $validateData = $request-> validate([
            'notrans' => 'required',
            'tglPesan' => 'required',
            'nama' => 'required',
            'jenisKelamin' =>'required',
            'alamat' => 'required',
            'email' => 'required',
            'contact' => 'required',
            'room' => 'required',
            'bed' => 'required',
            'towel' => 'required',
            'pillow' => 'required',
            'tglStart' => 'required',
            'tglEnd' => 'required',
            'guest' => 'required',

            
        ]);

        //hitung total
        $hargabed = 0;
        $hargatowel = 0;
        $hargapillow = 0;
        $hargakamar = 0;

        $total =0;

        //harga kamar
        if ($request->room != "") {
            foreach ($kamar as $data) {
                if ($request->room == $data->id_kamar) {
                    $hargakamar= $data->harga;
                }
            }
            
        } else {
            return redirect('transaksi/add')->with('gagal', 'Pilih Tipe Kamar');
        }

        //harga ektra
        if ($request->bed >= 0) {
            foreach ($bed as $data) {
                $hargabed = $data->harga*$request->bed;
            }
        } else {
           return redirect('transaksi/add')->with('gagal', 'Jumlah Bed minus');
        }

        if ($request->towel >= 0) {
            foreach ($towel as $data) {
                $hargatowel = $data->harga*$request->towel;
            }
        } else {
           return redirect('transaksi/add')->with('gagal', 'Jumlah Towel minus');
        }

        if ($request->pillow >= 0) {
            foreach ($pillow as $data) {
                $hargapillow = $data->harga*$request->pillow;
            }
        }  else {
           return redirect('transaksi/add')->with('gagal', 'Jumlah Pillow minus');
        }
        $total = $hargakamar + $hargabed + $hargatowel + $hargapillow;
            
        

       if ($request->tglStart >= $tanggal) {
        if($request->tglEnd >=$tanggal){
            // insert datake table tamu
            DB::table('tamu')->insert([
                'no_trans' => $request->notrans,
                'nama' => $request->nama,
                'email' => $request->email,
                'no_contact' => $request->contact,
                'jenis_kelamin' => $request->jenisKelamin,
                'alamat' => $request->alamat,
                'status' => "Confirm",
                
            ]);
            //insert data ke table transaksi
            DB::table('transaksi')->insert([
                'no_trans' => $request->notrans,
                'tgl_pesan' => $request->tglPesan,
                'nama' => $request->nama,
                'tipe_kamar' => $request->room,
                'bed' => $request->bed,
                'towel' => $request->towel,
                'pillow' => $request->pillow,
                'guest' => $request->guest,
                'note' => $request->note,
                'start' => $request->tglStart,
                'end' => $request->tglEnd,
                'total'=> $total,
                'payment' => "Pending"
                
            ]);
        
        //redirect ke kamar
        if (session('login')) {
            return redirect('transaksi')->with('sukses', 'Data berhasil ditambah');
        } else {
            return redirect('transaksi/add')->with('sukses', 'Data berhasil ditambah!, silahkan login untuk melihat data!');
        }
        // return $request->all();
    } else{
        return redirect('transaksi/add')->with('gagal', 'Tanggal check out lebih kecil dari tangal checkin!');
    }
        

        } else{
           return redirect('transaksi/add')->with('gagal', 'Tanggal checkin lebih kecil dari tangal sekarang!');
       }
        
        
    }

    public function editdata($id){
        $kamar = DB::table('kamar')->select('id_kamar','tipe_kamar')->get();
        // mengambil data tamu berdasarkan id yang dipilih
        $transaksi = DB::table('transaksi')->where('id',$id)->get();
    
        return view('/transaksi.edit',['transaksi'=>$transaksi, 'kamar'=>$kamar]);
    }

    public function update(Request $request){
        $kamar = DB::table('kamar')->select('id_kamar','tipe_kamar','harga')->get();
        $bed = DB::table('ekstra')->select('harga')->where('jenis_addons','Bed')->get();
        $towel = DB::table('ekstra')->select('harga')->where('jenis_addons','Towel')->get();
        $pillow = DB::table('ekstra')->select('harga')->where('jenis_addons','Pillow')->get();

        //validation
        $validateData = $request-> validate([
            'notrans' => 'required',
            'tglPesan' => 'required',
            'nama' => 'required',
            'room' => 'required',
            'bed' => 'required',
            'towel' => 'required',
            'pillow' => 'required',
            'tglStart' => 'required',
            'tglEnd' => 'required',
            'guest' => 'required',
        ]);
        //hitung total
        $hargabed = 0;
        $hargatowel = 0;
        $hargapillow = 0;
        $hargakamar = 0;

        $total =0;

        //harga kamar
        if ($request->room != "") {
            foreach ($kamar as $data) {
                if ($request->room == $data->id_kamar) {
                    $hargakamar= $data->harga;
                }
            }
            
        } else {
            return redirect('transaksi/add')->with('gagal', 'Pilih Tipe Kamar');
        }

        //harga ektra
        if ($request->bed >= 0) {
            foreach ($bed as $data) {
                $hargabed = $data->harga*$request->bed;
            }
        } else {
           return redirect('transaksi/add')->with('gagal', 'Jumlah Bed minus');
        }

        if ($request->towel >= 0) {
            foreach ($towel as $data) {
                $hargatowel = $data->harga*$request->towel;
            }
        } else {
           return redirect('transaksi/add')->with('gagal', 'Jumlah Towel minus');
        }

        if ($request->pillow >= 0) {
            foreach ($pillow as $data) {
                $hargapillow = $data->harga*$request->pillow;
            }
        }  else {
           return redirect('transaksi/add')->with('gagal', 'Jumlah Pillow minus');
        }
        $total = $hargakamar + $hargabed + $hargatowel + $hargapillow;
    // update data tamu
    DB::table('transaksi')->where('id',$request->id)->update([
        'no_trans' => $request->notrans,
        'nama' =>$request->nama,
        'tgl_pesan' => $request->tglPesan,
        'tipe_kamar' => $request->room,
        'bed' => $request->bed,
        'towel' => $request->towel,
        'pillow' => $request->pillow,
        'guest' => $request->guest,
        'note' => $request->note,
        'start' => $request->tglStart,
        'end' => $request->tglEnd,
        'total'=> $total,
    ]);
    // alihkan halaman ke halaman tamu
    // return $request->all();
    return redirect('/transaksi');
}
    public function bayar($id){
        $tglTrans = date('Y-m-d');
        $transaksi = DB::table('transaksi')->where('no_trans', $id)->get();
        return view('transaksi.bayar', compact('transaksi','tglTrans'));
    }
    public function getbayar(Request $request){
        //validation
         $validateData = $request-> validate([
            'noTrans' => 'required',
            'bayar' => 'required',
        ]);
         $transaksi = DB::table('transaksi')->where('no_trans', $request->noTrans)->get();
        foreach ($transaksi as $data => $value) {
                if($request->bayar < $value->total){
                return redirect('transaksi/bayar/'.$request->noTrans)->with('gagal', 'Uang anda kurang');
            }
        }
    // update data kamar
    DB::table('transaksi')->where('no_trans',$request->noTrans)->update([
        'payment' => 'Success'
    ]);
    // alihkan halaman ke halaman kamar
    return redirect('/transaksi')->with('sukses','Pembayaran berhasil!');
    // return $request->all();
    }

    public function delete($id){
        DB::table('transaksi')->where('id', $id)->delete();
        return redirect('/transaksi');
    }


//auto generate kode transaksi berdasarkan tanggal transaksi
    public function kodetrans() {
        echo $this->kode();
        $tanggal= Carbon::now()->format('Y-m-d');
        echo $tanggal;
    }
    protected function kode() {
        $kd="";
        $query = DB::table('transaksi')->select(DB::raw('MAX(RIGHT(no_trans,4)) as kd_max'))->whereDate('tgl_pesan',Carbon::today());
        if ($query->count()>0) {
            foreach ($query->get() as $key ) {
                $tmp = ((int)$key->kd_max)+1;
                $kd = sprintf("%04s", $tmp);
            }
        } else {
            $kd = "0001";
        }
        return  "TR-".date('dmy').$kd;
    }
}
