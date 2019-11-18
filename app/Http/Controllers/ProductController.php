<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $products = Product::all();

        if ($request->is('api/*'))
            return response()->json(['products' => $products, 'result' => 1]);

        return view('products', [
            'products' => $products
        ]);
    }

    /*
     * Передает список товаров для фронта
     * */
    public function form(Request $request)
    {
        return response()->json(Product::all());
    }


    /*
     * Добавление товара
     * */
    public function store(Request $request)
    {
        if ($request->get("product_code")) {
            $product = Product::create($request->all());
            return response()->json(['product' => $product, 'result' => 1], 201);
        }
        return response()->json(['error' => 'Не указан код товара', 'result' => 2], 201);
    }

    /*
     * Подробное описание товара
    * */
    public function show($id)
    {
        $product = Product::where('id', '=', $id)->get();

        if (!empty($product))
            return response()->json(['product' => $product, 'result' => 1], 200);

        return response()->json(['error' => 'Нет такого товара', 'result' => 2], 200);
    }

    /*
     * Обновление данных о товаре
     * */
    public function update($product_id, Request $request)
    {
        $product = Product::where('id', '=', $product_id)->first();

        $result = (!empty($product->id)) ? $product->update($request->all()) : 0;

        if ($request->is('api/*')) {
            if ($result)
                return response()->json(['product' => $product, 'result' => 1], 200);
            return response()->json(['error' => 'Такого товара нет в нашей базе.', 'result' => 2]);
        }

        return view('products', [
            'products' => Product::all()->sortBy('created_at')
        ]);
    }

    public function delete($product_id, Request $request)
    {
        $product = Product::where('id', $product_id)->first();

        $result = (!empty($product->id)) ? $product->delete() : 0;

        if ($request->is('api/*')) {
            if ($result)
                return response()->json(['result' => 1], 200);
            return response()->json(['error' => 'Такого товара нет в базе.', 'result' => 2], 200);
        }

        return view('products', [
            'products' => Product::all()->sortBy('created_at')
        ]);
    }

}
