@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Region') }}</div>
                @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                    {{$message}}
                  </div>
                @endif
                
                <div class="card-body">
                   
                    <form action="{{route('insert_region')}}" method="POST">
                      @csrf
                        <div class="form-group row">
                          <label for="zonecode" class="col-sm-4 col-form-label">Zone Code</label>
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
                        <div class="form-group row">
                          <label for="region_code" class="col-sm-4 col-form-label">Region Code</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('region_code') is-invalid @enderror" id="region_code" name="region_code" placeholder="Automatically" readonly>
                          </div>

                          @error('region_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                        </div>

                        <div class="form-group row">
                            <label for="region_name" class="col-sm-4 col-form-label">Region Name</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control @error('region_name') is-invalid @enderror" id="region_name" name="region_name" placeholder="Region Name">
                            </div>

                            @error('region_name')
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
