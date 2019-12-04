<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use stdClass;


class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'phone_code',
        'status',
        'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /*
     * Отправка СМС с кодом
     *
     * @param $phoneNumber
     * @return $string
     * */
    public function sendCode($phoneNumber)
    {
        $smsru = new Smsru(getenv('SMSRU_API_ID'));
        $post = new stdClass();

        $phone_code = rand(1000, 9999);
        $msg = "Введите пожалуйста код:" . $phone_code;

        $post->to = $phoneNumber;
        $post->text = $msg; //сообщение

        $post->test = 1; // Позволяет выполнить запрос в тестовом режиме без реальной отправки сообщения
        // $post->from = ''; // Если у вас уже одобрен буквенный отправитель, его можно указать здесь, в противном случае будет использоваться ваш отправитель по умолчанию
        // $post->translit = 1; // Перевести все русские символы в латиницу (позволяет сэкономить на длине СМС)

        $sms = $smsru->send_one($post); // Отправка сообщения и возврат данных в переменную

        $sms->phone_code = $phone_code;
        return $sms;
    }

    /*
    * Генерация токена
    *
    * @return $string
    * */
    public function generateToken()
    {
        $this->api_token = Str::random(60);
        $this->save();

        return $this->api_token;
    }


}
