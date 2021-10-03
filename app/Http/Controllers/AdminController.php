<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\zone_tbl;
use App\Models\product_tbl;
use App\Models\region_tbl;
use App\Models\territory_tbl;
use Auth;


class AdminController extends Controller
{
    public function add_zone()
    {
        return view('admin.addzone');
    }

    public function add_region()
    {
        $zone = zone_tbl::where('remove_status', '0')->get();
        return view('admin.addregion')->with('zone', $zone);
    }

    public function add_territory()
    {
        $zone = zone_tbl::where('remove_status', '0')->get();
        $region = region_tbl::where('remove_status', '0')->get();
        return view('admin.addterritory')->with('zone', $zone)->with('region', $region);
    }

    public function add_product()
    {
        return view('admin.addproduct');
    }

    public function insert_zone(Request $request)
    {
        $zone_long_disc = $request->zone_long_disc;
        $short_disc = $request->short_disc;

        $errors = [
            'zone_long_disc.required' => 'Zone long discription is required.',
            'short_disc.required' => 'Short discription is required.',
            ];
      
            $this->validate($request, [
            'zone_long_disc' => 'required',
            'short_disc' => 'required',
            ],$errors);

        $zone_count = zone_tbl::count();
        $zone_count++;
        $zone_code = "Z".$zone_count;

        $zone[] = array(
            'zone_code' => $zone_code,
            'zone_long_disc' => $zone_long_disc,
            'short_disc' => $short_disc,
        );

        zone_tbl::insert($zone);
       
        return redirect()->back()->with('success', 'Zone details added successfully..!');

    }

    public function insert_region(Request $request)
    {
        $zonecode = $request->zonecode;
        $region_name = $request->region_name;

        $region_code = region_tbl::count();
        $region_code++;
        $region_code = "R".$region_code;

        $errors = [
            'zonecode.required' => 'Zone code is required.',
            'region_name.required' => 'Region name is required.',
            ];
      
            $this->validate($request, [
            'zonecode' => 'required',
            'region_name' => 'required',
            ],$errors);

        $region[] = array(
            'region_code' => $region_code,
            'zone' => $zonecode,
            'region_name' => $region_name,
        );

        region_tbl::insert($region);
       
        return redirect()->back()->with('success', 'Region details added successfully..!');

    }

    public function insert_territory(Request $request)
    {
        $zonecode = $request->zonecode;
        $region_code = $request->region_code;
        $territory_name = $request->territory_name;

        $errors = [
            'zonecode.required' => 'Zone code is required.',
            'region_code.required' => 'Region code is required.',
            'territory_name.required' => 'Territory name is required.',
            ];
      
            $this->validate($request, [
            'zonecode' => 'required',
            'region_code' => 'required',
            'territory_name' => 'required',
            ],$errors);


        $territory_code = territory_tbl::count();
        $territory_code++;
        $territory_code = "T".$territory_code;

        $territory[] = array(
            'territory_code' => $territory_code,
            'zone' => $zonecode,
            'region' => $region_code,
            'territory_name' => $territory_name,
        );

        territory_tbl::insert($territory);
       
        return redirect()->back()->with('success', 'Territory details added successfully..!');

    }

    public function insert_product(Request $request)
    {
        $sku_code = $request->sku_code;
        $sku_name = $request->sku_name;
        $mrp = $request->mrp;
        $dis_price = $request->dis_price;
        $weight = $request->weight;
        $volume = $request->volume;
        $weight_volume = $weight.$volume;

        $errors = [
            'sku_code.required' => 'SKU code is required.',
            'sku_name.required' => 'SKU name is required.',
            'mrp.required' => 'MRP is required.',
            'dis_price.required' => 'Distribution price is required.',
            'weight.required' => 'Weight is required.',
            'volume.required' => 'Volume is required.',
            ];
      
            $this->validate($request, [
            'sku_code' => 'required',
            'sku_name' => 'required',
            'mrp' => 'required',
            'dis_price' => 'required',
            'weight' => 'required',
            'volume' => 'required',
            ],$errors);

        $sku_id = product_tbl::count();
        $sku_id++;
        $sku_id = "Product".$sku_id;

        $product[] = array(
            'sku_id' => $sku_id,
            'sku_code' => $sku_code,
            'sku_name' => $sku_name,
            'MRP' => $mrp,
            'distribution_price' => $dis_price,
            'weight' => $weight,
            'volume' => $volume,
        );

        product_tbl::insert($product);

        return redirect()->back()->with('success', 'Product registration added successfully..!');


    }


}
