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

    //Alleen seller en adin mogen dit aanpassen of verwijderen
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
