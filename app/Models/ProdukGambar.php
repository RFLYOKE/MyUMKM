<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukGambar extends Model
{
    use HasFactory;

    protected $fillable = [
        'produk_id',
        'gambar',
        'is_primary',
        'urutan',
    ];

    protected function casts(): array
    {
        return [
            'is_primary' => 'boolean',
        ];
    }

    // Relationships
    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}
