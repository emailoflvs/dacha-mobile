<?php

namespace App\Http\Controllers;

use App;
use App\Barcode;
use App\Product;
use Carbon\carbon;
use Illuminate\Http\Request;

class   BarcodeController extends Controller
{

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/barcode';

    /*
     * Список кодов по номеру товара
     * */
    public function index(Request $request)
    {
        if (empty($request['product_id']))
            return response()->json(['error' => 'Не указан id товара', 'result' => 2]);

        $barcodes = Barcode::all()
            ->where('product_id', $request['product_id'])
            ->sortBy('created_at');

        $count = count($barcodes);
        if (!$count && $request->is('api/*'))
            return response()->json(['error' => 'У этого товара нет сгенерированных кодов', 'result' => 2]);

        if ($request->is('api/*'))
            return response()->json(['barcodes' => $barcodes, 'result' => 1]);

        $product = Product::where('id', '=', $request['product_id'])->first();

        return view('barcode/generated', [
            'barcodes' => $barcodes,
            'count' => $count,
            'product' => $product
        ]);
    }


    /*
     * Показывает форму с товарами для выбора кодов
     * */
    public function form()
    {
        return view('barcode/form');
    }

    public
    function show(Barcode $barcode)
    {
        return $barcode;
    }

    public
    function store(Request $request)
    {
        $barcode = Barcode::create($request->all());

        return response()->json($barcode, 201);
    }

    public
    function search(Request $request)
    {
        if (empty($request['barcode']))
            return response()->json(['error' => 'Не указан код для поиска', 'result' => 2]);


        $barcode = Barcode::where('barcode', '=', $request['barcode'])->get();
        if (!$barcode->isEmpty())
            return response()->json(['barcode' => $barcode, 'result' => 1], 200);

        return response()->json(['error' => 'Такого кода нет в базе', 'result' => 2]);
    }

    public
    function update($barcode, Request $request)
    {
        if (empty($barcode))
            return response()->json(['error' => 'Не указан код для поиска', 'result' => 2]);
        $barcode = Barcode::where('barcode', '=', $barcode)->first();

        $result = (!empty($barcode->id)) ? $barcode->update($request->all()) : 0;
        if ($result)
            return response()->json(['barcode' => $barcode, 'result' => 1], 200);
        return response()->json(['error' => 'Такого кода нет в нашей базе.', 'result' => 2]);
    }

    public
    function delete($barcode, Request $request)
    {
        $barcode = Barcode::where('barcode', $barcode)->first();
        $result = (!empty($barcode->id)) ? $barcode->delete() : 0;

        if ($result)
            return response()->json(['result' => 1], 200);
        return response()->json(['error' => 'Такого кода нет в базе.', 'result' => 2], 200);

    }

    public
    function delete_list(Request $request)
    {
        Barcode::where('batch', '=', $request['batch'])->delete();
        return response()->json(null, 204);
    }

}
