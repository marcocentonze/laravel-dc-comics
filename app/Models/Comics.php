<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comics extends Model
{
    use HasFactory;

    protected $casts = [
        'artists' => 'array',
        'writers' => 'array'
    ];
     
    //lo richiede perchè ho fatto assegnazione di massa(::all)
    protected $fillable = ['title', 'description', 'price', 'thumb'];
}


