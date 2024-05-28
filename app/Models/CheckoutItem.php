<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckoutItem extends Model
{
    use HasFactory;
    protected $guarded=['id'];


    public function product()
    {
        return $this->belongsTo(products::class);
    }
}
