<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use \stdClass;
use App\Smsru;
use Illuminate\Support\Facades\Auth;


class SmsController extends Controller
{

    /*
     * Отправка смс сообщений
     * */
    public function send(Request $request)
    {

        $smsru = new Smsru(getenv('SMSRU_API_ID'));
        $post = new stdClass();

        // данные из формы браузера
        if (isset($request->post()['to'])) {
            $to = $request->post()['to'];
            $msg = $request->post()['msg'];
        } // данные из api
        else {

            $number = rand(1000, 9999);
            $msg = "Введите пожалуйска код:" . $number;
            $to = $request['to'];
        }

        // $to = 79202266563; // это номер из мануала smsru - работает

        $post->to = $to; // кому
        $post->text = $msg; //сообщение
        $post->test = 1; // Позволяет выполнить запрос в тестовом режиме без реальной отправки сообщения
        // $post->from = ''; // Если у вас уже одобрен буквенный отправитель, его можно указать здесь, в противном случае будет использоваться ваш отправитель по умолчанию
        // $post->time = time() + 7*60*60; // Отложить отправку на 7 часов
        // $post->translit = 1; // Перевести все русские символы в латиницу (позволяет сэкономить на длине СМС)
        // $post->partner_id = '1'; // Можно указать ваш ID партнера, если вы интегрируете код в чужую систему

        $sms = $smsru->send_one($post); // Отправка сообщения и возврат данных в переменную

        if ($sms->status == "OK") { // Запрос выполнен успешно
            $status = "Сообщение отправлено успешно. ";
            $status .= "ID сообщения: $sms->sms_id. ";

            if ($request->is('api/*'))
                return response()->json(['sms_id' => $sms->sms_id, 'result' => 1]);
//            $status = $sms->status_code;
        } else {
            $status = "Сообщение не отправлено. ";
            $status .= "Код ошибки: $sms->status_code. ";
            $status .= "Текст ошибки: $sms->status_text.";
            if ($request->is('api/*'))
                return response()->json(['error' => $status, 'result' => 2]);
        }

        if ($request->is('api/*'))
            return response()->json($sms);

        return view('sms/sent', [
            'status' => $status,
        ]);
    }

    /*
    * Простая форма без верстки для отправки сообщений фронтом
    * */
    public function form()
    {
        $number = rand(1000, 9999);
        $msg = "Введите пожалуйска код:" . $number;

        return view('sms/form', [
            'msg' => $msg,
        ]);
    }


}
