<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo( Category::class);
    }

    public function purchases()
    {
        return $this->hasMany( PurchaseItem::class);
    }

    public function sales()
    {
        return $this->hasMany( SaleItem::class);
    }
}
