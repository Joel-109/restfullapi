<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'price',
        'description',
        'imageUrl',
        'category',
    ];

    public function order(){
        return $this->belongsTo(Order::class)->withPivot(['quantity']);
    }
}
