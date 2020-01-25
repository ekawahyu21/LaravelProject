<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function toast(){
        return view('pages.testtoast');
    }
    
    //dashboard
    public function homepage() {

        $tanggal = date("d-m-Y");
            date_default_timezone_set("Asia/Kuala_Lumpur");
            $jam = date ("H:i:s");
            $a = date ("H");
            if (($a>=6) && ($a<=11)) {
              $salam = "Selamat Pagi !! ";
            }else if(($a>=11) && ($a<=15)){
              $salam = "Selamat  Siang !! ";
            }elseif(($a>15) && ($a<=18)){
              $salam = "Selamat Sore !! ";
            }else{
              $salam = "Selamat Malam !! ";
            }

        $transaksi = DB::table('transaksi')->where('payment','Success')->sum('total');
        $reservasi = DB::table('transaksi')->where('payment','Success')->count('no_trans');
    	//cek session login
    	if (session('login')) {
    		if(Auth::guard('admin')->check()) {
	    	$datakamar = DB::table('kamar')->count('id_kamar');
	    	$admin = DB::table('admin')->count('id');
            $user = DB::table('users')->count('id');
            $datauser = $admin+$user;

	    } elseif (Auth::guard('user')->check()) {
	    	$datauser ="0";
	    	$datakamar = DB::table('kamar')->where('status','Tersedia')->count('id_kamar');

    	}
    	
    	} elseif(!session('login') or !Auth::guard('user')->check() or !Auth::guard('admin')->check()){
    		$datakamar = DB::table('kamar')->where('status','Tersedia')->count('id_kamar');
    		$datauser ='0';

    	}
    	// $datakamar = DB::table('kamar')->count('id_kamar');
    	// $admin = DB::table('admin')->count('id');
    	// $user = DB::table('users')->count('id');
    	// $datauser = $admin + $user;
        
        //data chart
        $pendapatan =  DB::table('transaksi')->select(DB::raw('DATE(tgl_pesan) as tgl'), DB::raw('SUM(total) as total'))->where('payment','Success')->groupBy('tgl')->get();
        // if(date('m',strtotime($transaksi1->tgl_pesan))==1){
        //     $tgl="Jan";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==2){
        //     $tgl="Feb";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==3){
        //     $tgl="Mar";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==4){
        //     $tgl="Apr";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==5){
        //     $tgl="May";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==6){
        //     $tgl="Jun";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==7){
        //     $tgl="Jul";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==8){
        //     $tgl="Aug";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==9){
        //     $tgl="Sep";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==10){
        //     $tgl="Oct";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==11){
        //     $tgl="Nov";
        // }else if(date('m',strtotime($transaksi1->tgl_pesan))==12){
        //     $tgl="Dec";
        // }
        // 
        $pendapatan = json_decode($pendapatan);
        $tgl=[];
        $hasil=[];
        foreach ($pendapatan as $data) {
            $tgl[] = date('m',strtotime($data->tgl));
            $hasil[] = (int)$data->total;
        }
        // dd(json_decode($pendapatan));
    	return view('pages.dashboard', compact('datakamar','datauser','transaksi','reservasi','tanggal','jam','salam', 'tgl', 'hasil'));
		
	}
    //login user
    public function user(){
        return view('pages.user');
    }
}
