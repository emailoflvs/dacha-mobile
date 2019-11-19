<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;
use AnthonyMartin\GeoLocation\GeoPoint;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        $shops = Shop::all();
        return response()->json(['shops' => $shops, 'result' => 1]);
    }

    /*
     * Добавление магазина
     * */
    public function store(Request $request)
    {
        if ($request->get("address")) {
            $shop = Shop::create($request->all());
            return response()->json(['shop' => $shop, 'result' => 1], 201);
        }
        return response()->json(['error' => 'Не указан адрес магазина', 'result' => 2], 201);
    }

    /*
     * Подробное описание магазина
    * */
    public function show($id)
    {
        $shop = Shop::where('id', '=', $id)->get();

        if (!empty($shop))
            return response()->json(['shop' => $shop, 'result' => 1], 200);

        return response()->json(['error' => 'Нет такого магазина', 'result' => 2], 200);
    }

    /*
     * Обновление данных о магазине
     * */
    public function update($shop_id, Request $request)
    {
        $shop = Shop::where('id', '=', $shop_id)->first();

        $result = (!empty($shop)) ? $shop->update($request->all()) : 0;

        if ($request->is('api/*')) {
            if ($result)
                return response()->json(['shop' => $shop, 'result' => 1], 200);
            return response()->json(['error' => 'Такого магазина нет в нашей базе.', 'result' => 2]);
        }

        return view('shops', [
            'shops' => Shop::all()->sortBy('created_at')
        ]);
    }

    /*
     * Удаление магазина
     * */
    public function delete($shop_id, Request $request)
    {
        $shop = Shop::where('id', $shop_id)->first();

        $result = (!empty($shop->id)) ? $shop->delete() : 0;

        if ($request->is('api/*')) {
            if ($result)
                return response()->json(['result' => 1], 200);
            return response()->json(['error' => 'Такого магазина нет в базе.', 'result' => 2], 200);
        }

        return view('shops', [
            'shops' => Shop::all()->sortBy('created_at')
        ]);
    }


    /*
     * поиск в заданном радиусе , принимает гео-кооординаты текущего места и радиус в метрах
     *
     * @param Request $request
     * */
    public function geo(Request $request)
    {
        $shops = $this->geo($request);

        return response()->json(['shops' => $shops, 'result' => 1]);
    }

    /**
     * Поиск магазинов по любому из полей
     * Формат JSON {fieldname : value, fieldname : value}
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request)
    {
        $shops = Shop::search($request->all(), $request->get('search'))
            ->get();

        return response()->json(['shops' => $shops, 'result' => 1]);
    }


}
