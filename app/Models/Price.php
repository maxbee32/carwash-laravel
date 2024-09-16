<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;


    // protected $table = 'prices';
    protected $fillable = [
        'description',
        'price',
    ];

// Define the inverse relationship
public function services()
{
    return $this->hasMany(Service::class);
}

}
