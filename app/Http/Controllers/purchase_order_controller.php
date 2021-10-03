<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\po_export;
use App\Models\zone_tbl;
use App\Models\product_tbl;
use App\Models\region_tbl;
use App\Models\territory_tbl;
use App\Models\po_item_tbl;
use App\Models\po_tbl;
use Auth;

class purchase_order_controller extends Controller
{
    public function add_po()
    {
        $zone = zone_tbl::where('remove_status', '0')->get();
        $region = region_tbl::where('remove_status', '0')->get();
        $territory = territory_tbl::where('remove_status', '0')->get();
        $product_tbl = product_tbl::where('remove_status', '0')->get();

        return view('po.add_po')
        ->with('zone', $zone)
        ->with('region', $region)
        ->with('territory', $territory)
        ->with('product_tbl', $product_tbl);
    }

    public function view_po()
    {
        $zone = zone_tbl::where('remove_status', '0')->get();
        $region = region_tbl::where('remove_status', '0')->get();
        $territory = territory_tbl::where('remove_status', '0')->get();
        $product_tbl = product_tbl::where('remove_status', '0')->get();

        return view('po.viewpo')
        ->with('zone', $zone)
        ->with('region', $region)
        ->with('territory', $territory)
        ->with('product_tbl', $product_tbl);
    }

    public function add_po_data(Request $request)
    {
        $zonecode = $request->zonecode;
        $region_code = $request->region_code;
        $territory = $request->territory;
        $distributor = $request->distributor;
        $date = $request->date;
        $remark = $request->remark;
        $remark = ($remark == null) ? "" : $remark ;
        $sku_code = $request->sku_code;
        $sku_name = $request->sku_name;
        $unit_price = $request->unit_price;
        $weight = $request->weight;
        $need_qty = $request->need_qty;
        $total = $request->total;
        $total_sum = array_sum($total);
        $need_unit = $request->need_unit;
        $date = date('Y-m-d H:i:s');
        $user_id = Auth::user()->id;
        
        $po_num = po_tbl::count();
        $po_num++;
        $po_num = "po".$po_num;

        $po_data = array(
            'po_num' => $po_num,
            'zone' => $zonecode,
            'region' => $region_code,
            'territory' => $territory,
            'distributor' => $distributor,
            'remark' => $remark,
            'total_amount' => $total_sum,
            'datetime' => $date,
            'created_user_id' => $user_id,
        );

        po_tbl::insert($po_data);

        foreach ($sku_code as $key => $value) 
        {
            $po_item_data[] = array(
                'po_num' => $po_num,
                'sku_code' => $sku_code[$key],
                'sku_name' => $sku_name[$key],
                'quntity' => $need_qty[$key],
                'unit_price' => $unit_price[$key],
                'unit_total_price' => $total[$key],
            );
        }

        po_item_tbl::insert($po_item_data);

        return redirect()->back()->with('success', 'Purchase order create successfully..!');

    }

    public function find_po(Request $request)
    {
        $from_date = $request->from_date;
        $to_date = $request->to_date;
        $po_num = $request->po_num;
        $region_code = $request->region_code;
        $territory = $request->territory;

        $quary = po_tbl::where('remove_status', '0');

        if ($from_date != null && $to_date != null) 
        {
            $quary->where('datetime', '>=', $from_date)->where('datetime', '<=', $to_date);
        }
        if ($po_num != null) 
        {
            $quary->where('po_num', $po_num);
        }
        if ($region_code != null) 
        {
            $quary->where('region', $region_code);
        }
        if ($territory != null) 
        {
            $quary->where('territory', $territory);
        }
        $data = $quary->orderBy('id','desc')->get();

        return response()->json(['data'=>$data]);
    }

    public function export($id) 
    {
        $find_po_num = po_tbl::find($id);
        $po_num = $find_po_num->po_num;
        $excel_name = "Purchase Order - ".$po_num.".xlsx";

        return Excel::download(new po_export($id), $excel_name);
    }
}
