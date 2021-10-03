@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Add Individual Purchase Order') }}</div>
                @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                    {{$message}}
                  </div>
                @endif
                
                <div class="card-body">
                   
                    <form action="{{route('add_po_data')}}" method="POST">
                      @csrf
        
                        <div class="row">

                            <div class="col-3">

                                <div class="form-group row">
                                    <label for="zonecode" class="col-sm-4 col-form-label">Zone</label>
                                    <div class="col-sm-8">
                                      <select class="form-control @error('zonecode') is-invalid @enderror" id="zonecode" name="zonecode">
                                        <option>Select Zone</option>
                                        @foreach ($zone as $zone)
                                            <option value="{{$zone->zone_code}}">{{$zone->zone_code}}</option>
                                        @endforeach
                                      </select>
                                    </div>
          
                                    @error('zonecode')
                                      <span class="invalid-feedback" role="alert">
                                          <strong>{{ $message }}</strong>
                                      </span>
                                    @enderror
          
                                  </div>

                            </div>
                            

                        <div class="col-3">
                            <div class="form-group row">
                                <label for="region_code" class="col-sm-4 col-form-label">Region</label>
                                <div class="col-sm-8">
                                  <select class="form-control @error('region_code') is-invalid @enderror" id="region_code" name="region_code">
                                    <option>Select Region</option>
                                    @foreach ($region as $region)
                                        <option value="{{$region->region_code}}">{{$region->region_code}}</option>
                                    @endforeach
                                  </select>
                                </div>
      
                                @error('region_code')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label for="territory" class="col-sm-4 col-form-label">Territory</label>
                                <div class="col-sm-8">
                                  <select class="form-control @error('territory') is-invalid @enderror" id="territory" name="territory">
                                    <option>Select Territory</option>
                                    @foreach ($territory as $territory)
                                        <option value="{{$territory->territory_code}}">{{$territory->territory_code}}</option>
                                    @endforeach
                                  </select>
                                </div>
      
                                @error('territory')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                              </div>
                        </div>


                       <div class="col-3">
                        <div class="form-group row">
                            <label for="distributor" class="col-sm-5 col-form-label">Distributor</label>
                            <div class="col-sm-7">
                              <select class="form-control @error('distributor') is-invalid @enderror" id="distributor" name="distributor">
                                <option>Select</option>
                                    <option value="Distributor 1">Distributor 1</option>
                                    <option value="Distributor 2">Distributor 2</option>
                                    <option value="Distributor 3">Distributor 3</option>
                                    <option value="Distributor 4">Distributor 4</option>
                                    <option value="Distributor 5">Distributor 5</option>
                              </select>
                            </div>

                            @error('distributor')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                       </div>
                     

                    </div>


                    <div class="row justify-content-center">

                        <div class="col">

                            <div class="form-group row">
                                <label for="date" class="col-sm-4 col-form-label">Date</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="<?php echo(date('Y-m-d')); ?>" readonly>
                                </div>
      
                                @error('date')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
      
                              </div>

                        </div>
                        

                    <div class="col">
                        <div class="form-group row">
                            <label for="po_num" class="col-sm-4 col-form-label">PO No</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control @error('po_num') is-invalid @enderror" id="po_num" name="po_num" placeholder="Automatically" readonly>
                            </div>
  
                            @error('po_num')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror
                          </div>
                    </div>

                   <div class="col">
                    <div class="form-group row">
                        <label for="remark" class="col-sm-4 col-form-label">Remark</label>
                        <div class="col-sm-8">
                          <textarea type="text" class="form-control @error('remark') is-invalid @enderror" id="remark" name="remark"></textarea>
                        </div>

                        @error('remark')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                   </div>
                 
                </div>


                {{-- table --}}
                <table class="table table-bordered mt-5">
                    <thead>
                      <tr>
                        <th scope="col">SKU CODE</th>
                        <th scope="col">SKU NAME</th>
                        <th scope="col">UNIT PRICE</th>
                        <th scope="col">AVB QTY</th>
                        <th scope="col">ENTER QTY</th>
                        <th scope="col">UNITS</th>
                        <th scope="col">TOTAL PRICE</th>
                      </tr>
                    </thead>
                    <tbody>
                     @foreach ($product_tbl as $product)
                         <tr>
                             <td>{{$product->sku_code}} <input type="hidden" id="sku_code" name="sku_code[]" value="{{$product->sku_code}}"></td>
                             <td>{{$product->sku_name}} <input type="hidden" id="sku_name" name="sku_name[]" value="{{$product->sku_name}}"></td>
                             <td>{{$product->distribution_price}} <input type="hidden" id="unit_price" name="unit_price[]" value="{{$product->distribution_price}}"></td>
                             <td>{{$product->weight}} <input type="hidden" id="weight" name="weight[]" value="{{$product->weight}}"></td>
                             <td><input type="text" name="need_qty[]" id="need_qty"></td>
                             <td><input type="text" id="need_unit" name="need_unit[]" readonly></td>
                             <td><input type="text" name="total[]" id="total" readonly></td>
                         </tr>
                     @endforeach
                    </tbody>
                  </table>



                {{-- table end --}}
                       
                    <div class="row justify-content-center">
                        <div class="form-group row">

                              <button type="submit" class="btn btn-success">Add PO</button>
                     
                          </div>
                    </div>
                        
                      </form>

                </div>


                      </div>
                       
            </div>
        </div>
    </div>
</div>

<script>
    (function() {
  
      $("table").on("change", "input", function() {
        var row = $(this).closest("tr");
        var qty = parseFloat(row.find("#need_qty").val());
        var price = parseFloat(row.find("#unit_price").val());
        var total = qty * price;
        row.find("#total").val(isNaN(total) ? "" : total);
        row.find("#need_unit").val(isNaN(qty) ? "" : qty);
      });
    })();
  </script>

@endsection
