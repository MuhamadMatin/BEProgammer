<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterBarang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kode_barang',
        'stock',
        'harga',
        'foto',
    ];
    // • Kode barang(varchar) dengan format BRG/YY/MM/00001 dimana 00001 adalah counter barang yang telah di input
}
