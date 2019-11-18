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

        $barcodes = Barcode::all()->where('product_id', '=', $request['product_id'])->sortBy('created_at');
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
    * Функция генерации кодов и добавления их в базу
    * */
    public function generate(Request $request)
    {

        // максимально разрешенное кол-во кодов для хранения в базе
        $maxBarcodesCount = 999999;

        $all = $request->query->all();

        $count = (!empty($all['barcode_count'])) ? $all['barcode_count'] : 1;
        $time = (!empty($time)) ? $time : time();

        $productCode = $all['product_code'];
        $product = Product::where('product_code', '=', $productCode)->first();
        $productId = (!empty($product->id)) ? $product->id : rand();

        $barcodeSelect = Barcode::where('product_id', '=', $productId);

        $error = "";
        //возможное кол-во кодов, которое мы можем сделать
        //кол-во кодов существующих в базе
        if ($maxBarcodesCount < $barcodeSelect->count())
            $error = "Достигнуто максимальное количество кодов( " . $maxBarcodesCount . " шт.) для данного продукта.";
        elseif ($maxBarcodesCount < ($barcodeSelect->count() + $count))
            $error = "При генерации такого количества кодов, будет достигнуто максимальное количество кодов( " . $maxBarcodesCount . " шт.) для данного продукта.";

        if (!empty($error)) {
            if ($request->is('api/*'))
                return response()->json(['error' => $error, 'result' => 2]);
            return view('barcode/generated', [
                'count' => 0,
                'product' => $product,
                'error' => $error
            ]);
        }

//        $maxBarcodesForGenerate = $maxBarcodesCount - $barcodeSelect->count();

        //Вычисляем следующий номер партии
        $batch = $barcodeSelect->max('batch');
        $batch++;

        $i = 0;
        $timeStart = time();
//        //базовый вариант
//        while (++$i <= $count) {
//            $barcode[$i] = $product_code . '-' . $this->getBarcodeByAlgorithm($time);
//
//            Barcode::create([
//                'barcode' => $barcode[$i],
//                'product_id' => $productId,
////                'created_at' => "1",
////                'updated_at' => $time,
//                'batch' => $batch
//            ]);
//        }

//        //скоростной вариант Евгения
        $barcodesForInsert = [];
        while (++$i <= $count) {
            $barcode = $productCode . '-' . $this->getBarcodeByAlgorithm($time);

            array_push($barcodesForInsert, [
                'barcode' => $barcode,
                'product_id' => $productId,
//                'created_at' => $time,
                'created_at' => Carbon::parse($time)->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::parse($time)->format('Y-m-d H:i:s'),
                'batch' => $batch
            ]);

        }
        $result = Barcode::insert($barcodesForInsert);

        $timeFinish = time();
        $speed = $timeFinish - $timeStart;
//        echo "<small>Время на создание кодов:" . $speed . "сек. </small>";

        if (!$result) {
            if ($request->is('api/*'))
                return response()->json(['error' => "Ошибка добавления сгенерированных кодов в базу.", 'result' => 2]);

            return view('barcode/generated', [
                'count' => 0,
                'product' => $product,
                'error' => "Техническая ошибка при добавлении кодов в базу."
            ]);
        }

//        $this->generateBarcodes($product->id, $product->product_code, $count, $batch, date("d.m.Y H:i"));

        //Делает пока выборку по последним созданным кодам
        //потом можно сделать без повторного запроса к базе - сразу не нашел
//        $barcodes = Barcode::all()->where('product_id', '=', $product->id)
//            ->where('batch', '=', $batch)
//            ->sortBy('created_at');

        //return json only after api request
        if ($request->is('api/*'))
            return response()->json(['barcodes' => $barcodesForInsert, 'result' => 1]);

        return view('barcode/generated', [
            'barcodes' => $barcodesForInsert,
//            'barcodes' => $barcodes,
            'count' => $count,
            'product' => $product,
            'batch' => $batch,
            'error' => $error
        ]);
    }


    /*
     * Создает код по алгоритму
     * */
    protected function getBarcodeByAlgorithm()
    {
//        •	первые две цифры образуются из года выпуска данного товара.
        $year = rand(01, 19);


        //    •	3-4-5 (3 цифры) цифры служат для сигнатуры типа/категории товара, количество цифр выбирается от тиража данного типа/категории товара. чем меньше цифр тем меньшее количесвто цифр будет здесь задействовано.
        $signature = rand(1000, 9999);

//    •	оставшиеся цифры формируют уникальность экземпляра продукта, по которому и происходит проверка на контрафакт.
        $unique = rand(100000, 999999);

//    •	В отдельно выбранной ситуации 3-4-5 (3 цифры) цифры могут означать не тип, а к примеру какие-то логистические данные.
        $logistic = rand(1000, 9999);
//    Пример кода “1947654687”, из этого номера мы сразу видим, что:
//•	данный продукт был изготовлен и упакован в 2019 году
//•	категория товара номер 47 (здесь 2 цифры)
//•	оставшиеся цифры 654687 сформировали уникальность каждого товара данной категории.
// Как видим при использовании двух цифр в товаре на уникальность остается 6 цифр,
// что означает что тираж данного товара не должен превышать 999.999.

        //return $year . $signature . '-' . $unique . $logistic;
        return $unique;
    }


    /*
     * Старая функция генерации кодов, исходя из заданных параметров, и добавление их в базу
     * */
//    protected function generateBarcodes($product_id = null, $product_code, $count = null, $batch, $time = null)
//    {
//
//        $count = (!empty($count)) ? $count : 1;
//        $product_id = (!empty($product_id)) ? $product_id : rand();
//        $time = (!empty($time)) ? $time : time();
//
//        $i = 0;
//        while (++$i <= $count) {
//            $barcode[$i] = $product_code . '-' . $this->getBarcodeByAlgorithm($time);
//
//            $barcodes = Barcode::create([
//                'barcode' => $barcode[$i],
//                'product_id' => $product_id,
//                'created_at' => "1",
//                'updated_at' => $time,
//                'batch' => $batch
//            ]);
//        }
//        return response()->json($barcodes);
//    }

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

//        $barcode->delete();
//        return response()->json(null, 204);
    }

    public
    function delete_list(Request $request)
    {
        Barcode::where('batch', '=', $request['batch'])->delete();
        return response()->json(null, 204);
    }

}
