<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dompet extends Model
{
    use HasFactory;
    protected $table    = 'dompets';
    protected $fillable = ['status_id', 'nama', 'deskripsi', 'referensi'];

    public function status()
    {
        return $this->belongsTo('App\Models\StatusDompet', 'status_id', 'id');
    }
}
