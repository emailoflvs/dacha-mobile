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

        //Вычисляем следующий номер партии
        $batch = $barcodeSelect->max('batch');
        $batch++;

        $i = 0;
        $timeStart = time();
        $barcodesForInsert = [];
        while (++$i <= $count) {
            $barcode = $productCode . '-' . $this->getBarcodeByAlgorithm($time);

            array_push($barcodesForInsert, [
                'barcode' => $barcode,
                'product_id' => $productId,
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

        //return json only after api request
        if ($request->is('api/*'))
            return response()->json(['barcodes' => $barcodesForInsert, 'result' => 1]);

        return view('barcode/generated', [
            'barcodes' => $barcodesForInsert,
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


    public function formatTime($time)
    {
        $created_at = $time;

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
