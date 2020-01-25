<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = "transaksi";
 
    protected $fillable = ['no_trans','nama','tgl_pesan','tipe_kamar','bed','towel','pillow','guest','note','start','end','total','payment'];
}
