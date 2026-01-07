<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'price',
    ];

    //Alleen admin kan dit verwijderen
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
