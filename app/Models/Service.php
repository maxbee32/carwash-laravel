<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    use HasFactory;

    // protected $table ='services';

    protected $fillable = [
        'price_id',
        'service',

    ];


     // Define the relationship between Service and Price
     public function price():BelongsTo
     {
         return $this->belongsTo(Price::class);
     }
}
