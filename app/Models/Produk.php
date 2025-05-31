<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'lokasi',
        'jumlah_terjual',
        'kategori_id',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'harga' => 'decimal:2',
            'is_active' => 'boolean',
        ];
    }

    // Relationships
    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function detailProduks()
    {
        return $this->hasMany(DetailProduk::class);
    }

    public function produkGambars()
    {
        return $this->hasMany(ProdukGambar::class)->orderBy('urutan');
    }

    public function gambarUtama()
    {
        return $this->hasOne(ProdukGambar::class)->where('is_primary', true);
    }

    public function keranjangs()
    {
        return $this->hasMany(Keranjang::class);
    }

    public function pesananItems()
    {
        return $this->hasMany(PesananItem::class);
    }

    // Accessors
    public function getTotalStokAttribute()
    {
        return $this->detailProduks->sum('stok');
    }

    public function getUkuranTersediaAttribute()
    {
        return $this->detailProduks->where('stok', '>', 0)->pluck('ukuran')->toArray();
    }

    // Images
    public function getGambarUtamaAttribute()
    {
        return $this->gambarUtama()->first()?->gambar;
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeTerlaris($query)
    {
        return $query->orderBy('jumlah_terjual', 'desc');
    }
}
