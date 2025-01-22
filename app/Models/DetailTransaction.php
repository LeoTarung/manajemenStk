<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaction extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function stockTransaction()
    {
        return $this->belongsTo(StockTransaction::class, 'no_transaction', 'no_transaction');
    }
    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'no_sparepart', 'no_part');
    }
}
