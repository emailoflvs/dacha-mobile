<?php

namespace App;

use AnthonyMartin\GeoLocation\GeoPoint;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Shop extends Model
{
    use Notifiable, Searchable;

    protected $table = 'shops';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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


    /*
     * Поиск магазинов в указанном месте и радиусе
     *
     * */
    public function geo(Request $request)
    {

        $latitude = floatval($request->get('latitude'));
        $longitude = floatval($request->get('longitude'));
        $radius = floatval($request->get('radius'));

        $unitOfMeasurement = $request->get('unit_of_measurement', 'kilometers');

        if ('meters' === $unitOfMeasurement) {
            $radius /= 1000;
        }

        $boundingBox = (new GeoPoint($latitude, $longitude))
            ->boundingBox($radius, 'kilometers');

        $latMax = $boundingBox->getMaxLatitude();
        $latMin = $boundingBox->getMinLatitude();
        $lonMax = $boundingBox->getMaxLongitude();
        $lonMin = $boundingBox->getMinLongitude();

        return Shop::whereBetween('latitude', [$latMin, $latMax])
            ->whereBetween('longitude', [$lonMin, $lonMax])
            ->get();
    }
}
