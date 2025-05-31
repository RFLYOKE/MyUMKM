<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AlamatPengirim extends Model
{
     use HasFactory;

    protected $fillable = [
        'user_id',
        'nama_penerima',
        'no_hp_penerima',
        'alamat_lengkap',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'is_default',
    ];

    protected function casts(): array
    {
        return [
            'is_default' => 'boolean',
        ];
    }

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class, 'alamat_pengiriman_id');
    }

    // Accessors
    public function getAlamatLengkapFormatAttribute()
    {
        return $this->alamat_lengkap . ', ' . $this->kecamatan . ', ' . $this->kabupaten . ', ' . $this->provinsi . ' ' . $this->kode_pos;
    }
}
