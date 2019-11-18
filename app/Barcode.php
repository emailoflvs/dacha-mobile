<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Barcode extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'barcode', 'product_id', 'batch',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];

    public function formatTime($time)
    {
        $created_at = $time;

//                echo $created_at."<br>";
        //2019-10-16 06:16:16
//                exit;
        $time = explode("-", $created_at);
        $year = $time[0];
        $year = substr($year, 2, 2);
        $month = $time[1];

        $next = $time[2];
        $next = explode(" ", $next);
        $day = $next [0];

        $next = explode(":", $next[1]);
        $hours = $next[0];
        $min = $next[1];

        $time = "" . $day . "." . $month . "." . $year . " " . $hours . ":" . $min;

        return $time;
    }

}
