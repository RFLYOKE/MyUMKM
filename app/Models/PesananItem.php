<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PesananItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'pesanan_id',
        'produk_id',
        'ukuran',
        'jumlah_beli',
        'harga_satuan',
        'sub_total',
    ];

    protected function casts(): array
    {
        return [
            'harga_satuan' => 'decimal:2',
            'sub_total' => 'decimal:2',
        ];
    }

    // Relationships
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

}
