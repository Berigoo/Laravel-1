<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Main extends Model
{
    use HasFactory;

    protected $table = 'item';
    protected $primaryKey = 'id';

    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'jenis',
        'harga',
    ];

}
