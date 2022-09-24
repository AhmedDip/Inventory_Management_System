<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleInvoice extends Model
{
    use HasFactory;
    
    // public function user()
    // {
    //     return $this->belongsTo(SaleInvoice::class);
    // }

    public function items()
    {
        return $this->hasMany( SaleItem::class);
    }
}
