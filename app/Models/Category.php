<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table    = 'categories';
    protected $fillable = ['nama', 'deskripsi', 'status_id'];

    public function status()
    {
        return $this->belongsTo('App\Models\StatusDompet', 'status_id', 'id');
    }
}
