@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Product') }}</div>
                @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                    {{$message}}
                  </div>
                @endif

                <div class="card-body">
                   
                    <form action="{{route('insert_product')}}" method="POST">
                      @csrf
                        <div class="form-group row">
                          <label for="skuid" class="col-sm-4 col-form-label">SKU ID</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('skuid') is-invalid @enderror" id="skuid" placeholder="Automatically" readonly>
                          </div>

                          @error('skuid')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                        <div class="form-group row">
                          <label for="sku_code" class="col-sm-4 col-form-label">SKU Code</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('sku_code') is-invalid @enderror" id="sku_code" name="sku_code" placeholder="">
                          </div>

                          @error('sku_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-group row">
                            <label for="sku_name" class="col-sm-4 col-form-label">SKU Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control @error('sku_name') is-invalid @enderror" id="sku_name" name="sku_name" placeholder="">
                            </div>

                            @error('sku_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          </div>
                     
                        <div class="form-group row">
                          <label for="mrp" class="col-sm-4 col-form-label">MPR</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control @error('mrp') is-invalid @enderror" id="mrp" name="mrp" placeholder="">
                            </div>

                            @error('mrp')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-group row">
                          <label for="dis_price" class="col-sm-4 col-form-label">Distribution Price</label>
                            <div class="col-sm-4">
                              <input type="number" class="form-control @error('dis_price') is-invalid @enderror" id="dis_price" name="dis_price" placeholder="">
                            </div>

                            @error('dis_price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-group row">
                          <label for="weight" class="col-sm-4 col-form-label">Weight / Volume</label>
                            <div class="col-sm-4">
                              <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" placeholder="">
                            </div>
                            <div class="col-sm-2">
                              <select class="form-control @error('volume') is-invalid @enderror" id="volume" name="volume">
                                    <option value=""></option>
                                    <option value="Kg">Kg</option>
                                    <option value="g">g</option>
                              </select>
                            </div>

                            @error('weight')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>
                       
                        <div class="form-group row">
                          <div class="col-sm-10">
                            <button type="submit" class="btn btn-success">Save</button>
                          </div>
                        </div>
                      </form>





                </div>
            </div>
        </div>
    </div>
</div>
@endsection
