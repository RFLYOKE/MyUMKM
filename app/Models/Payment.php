<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'pesanan_id',
        'kode_pembayaran',
        'no_ewallet',
        'total_pembayaran',
        'status_bayar',
        'tanggal_bayar',
        'bukti_pembayaran',
    ];

    protected function casts(): array
    {
        return [
            'total_pembayaran' => 'decimal:2',
            'tanggal_bayar' => 'datetime',
        ];
    }

    // Relationships
    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }

    // Boot method untuk generate kode pembayaran
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->kode_pembayaran)) {
                $model->kode_pembayaran = 'PAY-' . date('Ymd') . '-' . str_pad(static::count() + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }
}
