<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receipt extends Model
{
    use HasFactory;

    
    public function invoice()
    {
        return $this->belongsTo( SaleInvoice::class);
    }


    public function user()
    {
        return $this->belongsTo( User::class);
    }
}
