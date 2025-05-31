<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailProduk extends Model
{
     use HasFactory;

    protected $fillable = [
        'produk_id',
        'ukuran',
        'stok',
    ];

    // Relationships
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    // Scopes
    public function scopeTersedia($query)
    {
        return $query->where('stok', '>', 0);
    }
}
