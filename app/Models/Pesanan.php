<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_pesanan',
        'user_id',
        'alamat_pengiriman_id',
        'total_harga',
        'total_ongkos_kirim',
        'biaya_jasa_aplikasi',
        'biaya_layanan',
        'total_biaya',
        'metode_pembayaran',
        'status_pesanan',
        'catatan',
    ];

    protected function casts(): array
    {
        return [
            'total_harga' => 'decimal:2',
            'total_ongkos_kirim' => 'decimal:2',
            'biaya_jasa_aplikasi' => 'decimal:2',
            'biaya_layanan' => 'decimal:2',
            'total_biaya' => 'decimal:2',
        ];
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function alamatPengiriman()
    {
        return $this->belongsTo(AlamatPengiriman::class, 'alamat_pengiriman_id');
    }

    public function pesananItems()
    {
        return $this->hasMany(PesananItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // Scopes
    public function scopePending($query)
    {
        return $query->where('status_pesanan', 'pending');
    }

    public function scopeSelesai($query)
    {
        return $query->where('status_pesanan', 'selesai');
    }

    // Boot method untuk generate kode pesanan
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode_pesanan)) {
                $model->kode_pesanan = 'ORD-' . date('Ymd') . '-' . str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
