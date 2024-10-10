<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pengeluaran',
        'jumlah_pengeluaran',
        'tanggal_pengeluaran',
        'keterangan',
        'foto_bukti_pengeluaran',
    ];

    protected $casts = [
        'tanggal_pengeluaran' => 'date',
    ];

    public function getFotoBuktiPengeluaranAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }

    
    
    // public function scopePengeluaran($query)
    // {
    //     return $query->where('tanggal_pengeluaran', now()->format('Y-m-d'));
    // }

    // get all pengeluaran
    public function scopePengeluaran($query)
    {
        return $query->where('tanggal_pengeluaran', now()->format('Y-m-d'));
    }
}
