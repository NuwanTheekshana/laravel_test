@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Purchase order view') }}</div>
                @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                    {{$message}}
                  </div>
                @endif
                
                <div class="card-body">
                   
                    <form id="search_po_form">

        
                        <div class="row mb-5">

                        <div class="col-3">
                            <div class="form-group row">
                                <label for="region_code" class="col-sm-4 col-form-label">Region</label>
                                <div class="col-sm-8">
                                  <select class="form-control form-control-sm @error('region_code') is-invalid @enderror" id="region_code" name="region_code">
                                    <option value="">Select Region</option>
                                    @foreach ($region as $region)
                                        <option value="{{$region->region_code}}">{{$region->region_code}}</option>
                                    @endforeach
                                  </select>
                                </div>
      
                              </div>
                        </div>

                        <div class="col-3">
                            <div class="form-group row">
                                <label for="territory" class="col-sm-4 col-form-label">Territory</label>
                                <div class="col-sm-8">
                                  <select class="form-control form-control-sm @error('territory') is-invalid @enderror" id="territory" name="territory">
                                    <option value="">Select Territory</option>
                                    @foreach ($territory as $territory)
                                        <option value="{{$territory->territory_code}}">{{$territory->territory_code}}</option>
                                    @endforeach
                                  </select>
                                </div>
      
                              </div>
                        </div>


                       <div class="col-3">
                        <div class="form-group row">
                            <label for="po_num" class="col-sm-5 col-form-label">PO Number</label>
                            <div class="col-sm-7">
                              <input type="text" class="form-control form-control-sm" name="po_num" id="po_num">
                            </div>
                        </div>
                       </div>

                       <div class="col-3">
                        <div class="form-group row">
                            <label for="from_date" class="col-sm-4 col-form-label">From</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control form-control-sm" name="from_date" id="from_date">
                            </div>
                        </div>
                       </div>

                       <div class="col-3">
                        <div class="form-group row">
                            <label for="to_date" class="col-sm-4 col-form-label">To</label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control form-control-sm" name="to_date" id="to_date">
                            </div>
                        </div>
                       </div>

                       <div class="col-3">
                        <div class="form-group row">
                            <button type="button" id="search_btn" class="btn btn-success btn-sm">Search</button>
                        </div>
                       </div>
                     

                    </div>


                {{-- table --}}
                <table id="po_view_tbl" class="table table-striped table-bordered mt-5" style="width:100%">
                    <thead>
                      <tr>
                        <th scope="col">REGION</th>
                        <th scope="col">TERRITORY</th>
                        <th scope="col">DISTRIBUTOR</th>
                        <th scope="col">PO NUMBER</th>
                        <th scope="col">DATE & TIME</th>
                        <th scope="col">TOTAL AMOUNT</th>
                        <th scope="col">VIEW PO</th>
                      </tr>
                    </thead>
                    <tbody>
                   
                    </tbody>
                  </table>

                {{-- table end --}}

                </div>


                      </div>
                       
            </div>
        </div>
    </div>
</div>

<script>
    $('#search_btn').click(function () 
    {
        var search_po_form = $('#search_po_form').serialize();

        $.ajax({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST',
            url:'{{url("find_po")}}',
            data:search_po_form,
            success:function(jsonData){
                
                $("#po_view_tbl").dataTable().fnDestroy();
                var myDataTable =  $('#po_view_tbl').DataTable({
                data  :  jsonData.data,
                columns : 
                [
                { data : "region" },
                { data : "territory" },
                { data : "distributor" },
                { data : "po_num" },
                { data : "datetime" },
                { data : "total_amount" },
                { data : "id" , render : function (data, type, row, meta, rowData) 
                {
                        return "<center><a href='{{url('export')}}/"+row.id+"'><button type='button' class='btn btn-success btn-sm btn_style' style='background-color:green;'><i class='fa fa-file'></i>&nbsp;&nbsp;View</button></a></center>"

                }},
                
                ],
           
            });




            }
        });
    });
</script>

@endsection
