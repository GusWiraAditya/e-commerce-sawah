<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        'nama_produk',
        'deskripsi_produk',
        'harga_produk',
        'gambar_produk',
        'stok_produk',
    ];

    public function getHargaProdukAttribute($value)
    {
        return number_format($value, 2, ',', '.');
    }
}