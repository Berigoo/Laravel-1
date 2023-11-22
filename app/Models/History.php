<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use mysql_xdevapi\Table;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';
    protected $primaryKey = 'id';
    protected $fillable = [
        'queue',
        'kode_barang',
        'nama_barang',
        'jenis_barang',
        'qty',
        'total_harga',
    ];
}
