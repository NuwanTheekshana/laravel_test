<?php

namespace App\Exports;

use App\Models\po_tbl;
use App\Models\po_item_tbl;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class po_export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    protected $id;

    function __construct($id) {
            $this->id = $id;
    }


    public function collection()
    {
        $find_po_num = po_tbl::find($this->id);
        $po_num = $find_po_num->po_num;
        $find_data = po_item_tbl::select('po_num', 'sku_code', 'sku_name', 'quntity', 'unit_price', 'unit_total_price')->where('po_num', $po_num)->where('remove_status', '0')->get();
        return $find_data;
    }

    public function headings(): array
    {
        return [
            'Purchase Order Number',
            'SKU Code',
            'SKU Name',
            'Quntity',
            'Unit Price',
            'Unit Total Price',
        ];
    }
}
