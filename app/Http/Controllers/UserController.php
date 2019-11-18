<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/user';


    public function index(Request $request)
    {

//        $token = \Auth::guard('api')->getTokenForRequest();
        $users = User::all()->sortBy('created_at');

        if ($request->is('api/*'))
            return response()->json(['users' => $users, 'result' => 1]);

        return view('user/list', [
            'users' => $users
        ]);
    }

    /*
    * для API - при логине создается api_token, по которому отслеживается нахождение пользователя в базе
    * */
    public function login(Request $request)
    {

        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            $user = $this->guard()->user();

            $api_token = $user->generateToken();


//            return response()->json([
//                'data' => $user->toArray(),
//            ]);
            return response()->json(['message' => 'User is authorized. api_token=' . $api_token, 'result' => 1], 200);
        } else
            return response()->json(['error' => 'Login problem', 'result' => 2], 200);
    }


    /*
     * Логин пользователя мобильного приложения (через номер телефона):
     * 1. Проверяяется наличиче номера телефона
     * 2. На его номер отправляется СМС с кодом
     * */
    public function loginPhone(Request $request)
    {
        $storeData = $request->all();

        // проверка наличия номера в базе
        $user = User::where('phone', '=', $storeData['phone'])->first();

        if (empty($user->id))
            return response()->json(['error' => 'Пользователя с таким номером телефона нет в нашей базе', 'result' => 2]);

        // отправка кода на номер
        $userSMS = new User();
        $sms = $userSMS->sendCode($storeData['phone']);

        if ($sms->status == "OK") { // Запрос выполнен успешно
            $storeData['phone_code'] = $sms->phone_code;
            return response()->json(['sms' => $sms, 'result' => 1], 201);
        }

        return response()->json(['error' => 'Сообщение не отправлено. Код ошибки:' . $sms->status_code . 'Текст ошибки: ' . $sms->status_text, 'result' => 2]);
    }


    /*
     * Верифифкациця телефонного номера, согласно введенного кода и логин
     * */
    public function loginVerifyPhone(Request $request)
    {
        $user = User::where('phone', '=', $request->all(['phone']))
            ->where('phone_code', '=', $request->all(['phone_code']))->first();

        if (!empty($user->id)) {
            $user = new User();
            $api_token = $user->generateToken();
            return response()->json(['data' => 'User is authorized. api_token=' . $api_token, 'result' => '1'], 200);
        }

        return response()->json(['error' => 'Код из СМС не соответствует указанному номеру телефона.', 'result' => 2], 200);
    }


    /*
     * для API- logout происходит, когда в /api/users/logout передается post-ом api_token пользователя, хранящийся в базе
     * */
    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();
        if ($user) {
            $user->api_token = null;
            $user->save();
        }
        return response()->json(['data' => 'User logged out.', 'result' => 1], 200);
    }

    /*
     * Создание пользователя на основе email
     * для API, т.к. web делается аутентификацией Ларавел
     * */
    public function store(Request $request)
    {
        //name, email, password
        $storeData = $request->all();

        $user = User::where('email', '=', $storeData['email'])->first();
        if (!empty($user->id))
            return response()->json(['error' => "Пользователь с таким email уже есть в нашей базе", 'result' => 2], 200);

        if (Hash::needsRehash($storeData['password']))
            $storeData ['password'] = Hash::make($storeData['password']);

//      пока без подтверждения почты делаем
        $storeData['status'] = 1;

        $user = User::create($storeData);

        return response()->json([$user, 'result' => 1], 201);
    }


    /*
     * Создание пользователя мобильного приложения (через номер телефона):
     * 1. В базу добавляется пользователь со без активации
     * 2. На его номер отправляется СМС с кодом
     * 3. Этот код заносится в базу для активации пользователя
     * */
    public function storePhone(Request $request)
    {

        $storeData = $request->all();

        // проверка наличия номера в базе
        $user = User::where('phone', '=', $storeData['phone'])->first();
        if (!empty($user->id))
            return response()->json(['error' => "Пользователь с таким номером телефона уже есть в нашей базе", 'result' => 2], 200);

        // отправка кода на номер
        $userSMS = new User();
        $sms = $userSMS->sendCode($storeData['phone']);


        if ($sms->status == "OK") { // Запрос выполнен успешно
            $storeData['phone_code'] = $sms->phone_code;

            //создаем пользователя
            $user = User::create($storeData);

            return response()->json(['user' => $user, 'result' => 1], 201);
        }

        return response()->json(['error' => "Сообщение не отправлено. Код ошибки:" . $sms->status_code . "Текст ошибки: $sms->status_text.", 'result' => 2]);
    }


    /*
     * Верифифкациця телефонного номера, согласно введенного кода
     * */
    public function verifyPhone(Request $request)
    {
        $user = User::where('phone', '=', $request->all(['phone']))->where('phone_code', '=', $request->all(['phone_code']))->first();

        if (!empty($user->id)) {
            $user->update(['status' => '1']);

            return response()->json(['user' => $user, 'result' => 1], 200);
        }

        return response()->json(['error' => "Код из СМС не соответствует указанному номеру телефона.", 'result' => 2], 200);
    }


    /*
     * Показать данные пользователя
     * */
    public function show($user_id)
    {
        $user = User::where('id', '=', $user_id)->get();

        if (!$user->isEmpty())
            return response()->json(['user' => $user, 'result' => 1], 200);

        return response()->json(['error' => 'Такого пользователя не существует.', 'result' => 2]);
    }

    /*
     * Поиск пользователя по name, email
     * */
    public function search(Request $request)
    {
        $users = User::where('name', $request->get('name'))
            ->orWhere('email', $request->get('email'))
            ->get();

        if (!$users->isEmpty())
            return response()->json(['users' => $users, 'result' => 1], 200);

        return response()->json(['error' => 'Таких пользователей не существует.', 'result' => 2]);
    }


    /*
     * Обновить данные пользователя
     * */
    public function update($user_id, Request $request)
    {
        $user = User::where('id', $user_id)->first();

        $result = ($user) ? $user->update($request->all()) : 0;

        if ($request->is('api/*')) {
            if ($result)
                return response()->json(['user' => $user, 'result' => 1], 200);
            return response()->json(['error' => 'Такого пользователя не существует.', 'result' => 2]);
        }

        $users = User::all()->sortBy('created_at');

        return view('user/list', [
            'users' => $users]);
    }

    /*
     * Удаление пользователя
     * */
    public
    function delete($user_id, Request $request)
    {
        $user = User::where('id', $user_id)->first();

        $result = (!empty($user)) ? $user->delete() : 0;

        if ($request->is('api/*')) {
            if ($result)
                return response()->json(['result' => 1], 200);
            return response()->json(['error' => 'Таких пользователей не существует.', 'result' => 2], 200);
        }

        $users = User::all()->sortBy('created_at');
        return view('user/list', [
            'users' => $users]);
    }


    protected
    function sendFailedLoginResponse(Request $request)
    {
        $errors = ['error' => trans('auth.failed')];
        return response()->json($errors, 422);
    }

}
