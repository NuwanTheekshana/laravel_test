@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Zone') }}</div>

                @if ($message = Session::get('success'))
                  <div class="alert alert-success">
                    {{$message}}
                  </div>
                @endif
                <div class="card-body">
                    <form action="{{route('insert_zone')}}" method="POST">
                      @csrf

                        <div class="form-group row">
                          <label for="zonecode" class="col-sm-4 col-form-label">Zone Code</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" id="zonecode" placeholder="Automatically" readonly>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="zone_long_disc" class="col-sm-4 col-form-label">Zone Long Description</label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control @error('zone_long_disc') is-invalid @enderror" id="zone_long_disc" name="zone_long_disc" placeholder="Ex. Zone 1">
                          </div>

                          @error('zone_long_disc')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror

                        </div>

                        <div class="form-group row">
                            <label for="short_disc" class="col-sm-4 col-form-label">Short Description</label>
                            <div class="col-sm-8">
                              <input type="text" class="form-control @error('short_disc') is-invalid @enderror" id="short_disc" name="short_disc" placeholder="Ex. Z01">
                            </div>

                            @error('short_disc')
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
