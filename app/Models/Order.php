<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'address',
        'phoneNumber',
        'client_id',
    ];

    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function dishes(){
        return $this->belongsToMany(Dish::class)->withPivot(['quantity']);
    }
}
