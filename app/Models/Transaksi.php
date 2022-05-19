<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $fillable = ['kode', 'deskripsi', 'tanggal', 'nilai', 'dompet_id', 'kategori_id', 'status_id'];

    public function dompet()
    {
        return $this->belongsTo('App\Models\Dompet', 'dompet_id', 'id');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\Category', 'kategori_id', 'id');
    }
}
