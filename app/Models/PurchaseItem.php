<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseItem extends Model
{
    use HasFactory;

    public function invoice()
    {
        return $this->belongsTo(PurchaseInvoice::class);
    }


    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
