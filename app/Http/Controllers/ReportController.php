<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaksi;
 
use PDF;

class ReportController extends Controller
{
    public function index() {
    	$transaksi = DB::table('transaksi')->join('kamar', 'transaksi.tipe_kamar', 'kamar.id_kamar')->where('payment','Success')->get();
        $total = DB::table('transaksi')->sum('total');
    	return view('pages.report', compact('transaksi', 'total'));
    }
    public function cetak_pdf()
    {
    	$transaksi = DB::table('transaksi')->join('kamar', 'transaksi.tipe_kamar', 'kamar.id_kamar')->where('payment','Success')->get();
 
    	$pdf = PDF::loadview('cetak_pdf',compact('transaksi'));
    	return $pdf->download('laporan-transaksi-pdf');
    	
    }
}
