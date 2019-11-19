<?php

namespace App\Exports;

use App\Barcode;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\AfterSheet;

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
            'Время создания:',
        ];

        $headers = mb_convert_encoding($headers, "UTF-8");
        return $headers;
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function (AfterSheet $event) {
                $event->sheet->freezePane('A2', 'A2');
            },
        ];
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection($productId = null)
    {
        $barcodes = Barcode::query()->select("*")->from("barcodes")
            ->where('product_id', $this->product_id)
            ->limit($this->count)
            ->orderByRaw("id DESC")
            ->get(["barcode"])
            ->toArray();

        krsort($barcodes);

        $barcodeFormat = new Barcode();

        $codes = [];
        $i = 0;
        foreach ($barcodes as $barcode)
            $codes[$i++] = [$i, $barcode['barcode'], $barcodeFormat->formatTime($barcode['created_at'])];

        return collect($codes);
    }
}
