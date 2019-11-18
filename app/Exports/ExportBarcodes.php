<?php

namespace App\Exports;

use App\Barcode;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

//class ExportBarcodes implements FromCollection, WithHeadings, FromQuery
//FromQuery,
class ExportBarcodes implements FromCollection, WithHeadings, WithEvents
{
    use Exportable;

    public function __construct(string $tableName, int $product_id, int $count = null)
    {
        $this->tableName = $tableName;
        $this->product_id = $product_id;
        $this->count = (!empty($count)) ? $count : 0;
    }

    public function headings(): array
    {
        $headers = [
            'N.',
            'Код:',
//            'Номер товара:',
//            'Created at',
            'Время создания:',
//            'Updated at'
        ];

        $headers = mb_convert_encoding($headers, "UTF-8");
//        mb_convert_encoding();
        return $headers;
    }

    // freeze the first row with headings
    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->freezePane('A2', 'A2');
            },
        ];
    }


//    public function query()
//    {
//        if (strstr($this->tableName, "barcodes")){
//            $barcodes = Barcode::query()->select("*")->from("barcodes")->where('product_id', '=', $this->product_id)->orderBy("created_at");
//            if ($this->batch > 0)
//                $barcodes = $barcodes->where('batch', '=', $this->batch);
////            return $barcodes->select(['id', 'barcode', 'product_id', 'created_at', 'updated_at']);
//            $array = $barcodes->select(['barcode', 'product_id', 'created_at'])->where('product_id', '=', $this->product_id)->orderBy("created_at");
//            $f = $array->get('created_at')->where('product_id', '=', $this->product_id)->first;
//
//            $f = [
//                'id'=> 1,
//                'n' => 2
//            ];
//
////            $array->;
//
//            Excel::create();
//            // Define the Excel spreadsheet headers
//            $paymentsArray[] = ['id', 'customer','email','total','created_at'];
//
//
//            $payments = [];
//            // Convert each member of the returned collection into an array,
//            // and append it to the payments array.
//            foreach ($payments as $payment) {
//                $paymentsArray[] = $payment->toArray();
//            }
//
////            Excel::crea
//
//
//            // Generate and return the spreadsheet
//
//            Excel::store();
////
////            exit;
////            Excel::create('payments', function($excel) use ($invoicesArray) {
////
////                // Set the spreadsheet title, creator, and description
////                $excel->setTitle('Payments');
////                $excel->setCreator('Laravel')->setCompany('WJ Gilmore, LLC');
////                $excel->setDescription('payments file');
////
////                // Build the spreadsheet, passing in the payments array
////                $excel->sheet('sheet1', function($sheet) use ($paymentsArray) {
////                    $sheet->fromArray($paymentsArray, null, 'A1', false, false);
////                });
////
////            })->download('xlsx');
//
////            return $f;
////            var_dump($f);
////
//////            $f = ["4";"792398996";"1530092615";"2019-10-04 12:11:34";"2019-10-04 12:11:34";""];
////            return $f;
////            var_dump($f);
//exit;
//            return $array;
//            var_dump($f);
//            exit;
//            return $barcodes->select(['barcode', 'product_id', 'created_at']);
//        }
//
//    }

//    /**
//     * @return \Illuminate\Support\Collection
//     */
    public function collection($productId = null)
    {
//        if (!Auth::check())
//            return view('auth/login');

//        $barcodes = Barcode::all()->where('product_id', '=', $productId)->sortBy('created_at');
        //return Barcode::all();
        // the above code is the same as in 2.x was ..
//        $result = Company::whereHas('years', function ($q) {
//            $q->where('year_id', currentYearId());
//            $q->where('year_company.status', 1);
//        })
//            ->with(['company_datas', 'stands', 'co_companies' => function ($q) {
//                $q->with('co_company_datas');
//            }])
//            ->where('canceled', 0)
//            ->get();

//        $data = [];
//
//        foreach ($result as $r) {
//
//            $pending = ($r->first_step == 1) ? 'No' : 'Yes';
//
//            if (strlen(trim($r->company_datas[0]->flyer)) > 0) {
//                $flyer = $r->company_datas[0]->flyer;
//            } else {
//                $flyer = '';
//            }
//
//            if (isset($r->stands[0]) && strlen($r->stands[0]->code) > 0) {
//                $code = $r->stands[0]->code;
//            } else {
//                $code = '';
//            }
//
//            $data[] = [$r->name, $flyer, 'N', $code, $r->company_datas[0]->online_invitation_name, $pending];
//
//            if (isset($r->co_companies) && ! $r->co_companies->isEmpty()) {
//                foreach ($r->co_companies as $cco) {
//                    if (strlen(trim($cco->co_company_datas[0]->flyer)) > 0) {
//                        $flyer = $cco->co_company_datas[0]->flyer;
//                    } else {
//                        $flyer = '';
//                    }
//
//                    $data[] = [$cco->name, $flyer, 'Y', $code, '', ''];
//                }
//            }
//        }

//        $data[0] = ['1','2','3'];
//        $data[1] = ['4','5','6'];

//        if (strstr($this->tableName, "barcodes")){
        $barcodes = Barcode::query()->select("*")->from("barcodes")
            ->where('product_id', '=', $this->product_id)->limit($this->count)->orderByRaw("id DESC")
            ->get(["barcode"])->toArray();

        krsort($barcodes);

        $barcodeFormat = new Barcode();

        $codes = [];

        $i = 0;
        foreach ($barcodes as $barcode) {


            $created_at = $barcodeFormat->formatTime($barcode['created_at']);
//            $created_at = $barcode['created_at'];
////            var_dump($created_at);
////            exit;
//            $created_at = $barcode['created_at'];
//
////                echo $created_at."<br>";
//            //2019-10-16 06:16:16
////                exit;
//            $time = explode("-", $created_at);
//            $year = $time[0];
//            $year = substr($year, 2, 2);
//            $month = $time[1];
//
//            $next = $time[2];
//            $next = explode(" ", $next);
//            $day = $next [0];
//
//            $next = explode(":", $next[1]);
//            $hours = $next[0];
//            $min = $next[1];
//
//            $created_at = "" . $day . "." . $month . "." . $year . " " . $hours . ":" . $min;
//                    exit;
//                echo date("Y-m-d h:i:sa", $created_at);
//                exit;

            $codes[$i++] = [$i, $barcode['barcode'], $created_at];
//                $codes = [$i++]
//                foreach ($barcode as $barcode2){
//                    var_dump($barcode2);
//                    exit;
//                }
//                echo  "<hr>";

//                var_dump($barcode['barcode']);
//                exit;
        }
//
//            var_dump($barcodes);
//            exit;

//        $data = $barcodes;
        // ..but I return a collection from the built array data

//        $captions = ['Company name', 'Flyer name', 'Co Company', 'Stand', 'Online invitation', 'Pending'];

//        $this->export($data, 'flyer_data', $captions, $type);
//        $this->export($data, 'flyer_data', $captions, 'csv');


        $data = $codes;
        return collect($data);
    }

}
