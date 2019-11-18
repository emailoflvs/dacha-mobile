<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Product extends Model
{
    use Notifiable;

    protected $table = 'products';
    protected $fillable = [
        'product_code', 'product_name', 'product_photo', 'product_rating'
    ];
}
