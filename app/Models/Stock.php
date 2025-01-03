<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    Public function sparepart()
    {
        return $this->belongsTo(SparePart::class, 'no_sparepart', 'no_part');
    }
}
