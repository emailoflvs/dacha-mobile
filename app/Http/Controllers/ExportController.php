<?php

namespace App\Http\Controllers;

use App\Barcode;
use App\Exports\ExportBarcodes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Auth;

class ExportController extends Controller
{

    /**
     * Export кодов в файлы - для Web (функция скачивания в нужном формате)
     *
     * @return \Illuminate\Support\Collection
     */
    public function export($tableName, $fileType, $productId, $batch = 0)
    {

//        $ExportBarcodes = new ExportBarcodes($tableName, $productId, $batch);
//        $ExportBarcodes->headings();
//        return Excel::download($ExportBarcodes, 'barcodes.' . $fileType);
//        return (new ExportBarcodes($productId))->download('invoices2.csv', \Maatwebsite\Excel\Excel::CSV);


        return Excel::download(new ExportBarcodes($tableName, $productId, $batch), $tableName . '.' . $fileType);
    }

    /*
     * Export кодов в файлы - для API
     * */
    public function exportApi(Request $request)
    {

        $tableName = "barcodes";
//        $tableName = $request->all()['tableName'];
        $fileType = $request->all()['fileType'];
        $productId = $request->all()['productId'];
        $count = !empty($request->all()['count']) ? $request->all()['count'] : 0;
        $fileName = $tableName . '-' . $productId . '-' . date("jnYGi") . '-' . $count . '.' . $fileType;

        $exportBarcodes = new ExportBarcodes($tableName, $productId, $count);
        //Создания файла для экспорта
        $exportBarcodes->queue("download/" . $fileName);

        $filePath = "/storage/app/download/" . $fileName;

        $result = [
            'result' => 1,
            'filePath' => $filePath
        ];
//        $url = url("/storage/download/" . $fileName);

        return response()->json($result);

    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function importExport()
    {
        return view('import');
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function import()
    {
        Excel::import(new ImportUsers, request()->file('file'));

        return back();
    }
}
