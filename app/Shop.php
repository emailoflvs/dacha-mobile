<?php

namespace App;

use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shop extends Model
{
    use Notifiable, Searchable;

    protected $table = 'shops';
    protected $fillable = [
        'address',
        'phone',
        'latitude',   //широта
        'longitude',   //долгота
        'region',  // Название города или области магазина
        'opening_time', //Время открытия магазина
        'closing_phone'
    ];

    protected $searchable = [
        'address',
        'phone',
        'region'
    ];
}
