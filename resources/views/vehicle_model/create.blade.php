@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3> MODEL DETAILS </h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('vehicleModel.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" method="post" action="{{route('vehicleModel.store')}}">
              {{csrf_field()}}
                 <div class="form-group">
                    <label class="col-md-3 control-label">Vehicle Company</label>
                    <div class="col-md-4 inputGroupContainer">
                       <div class="input-group">
                          <select name="vehicle_company" class="selectpicker form-control">
                             <option selected=" true " disabled="true">Select..</option>
                             @foreach($company as $companys)
                                <option value="{{$companys->id}}">{{$companys->comp_name}}</option>
                             @endforeach     
                          </select>
                        </div>
                         @error('state_id')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                    </div>
                 </div>

                   <div class="form-group">
                    <label class="col-md-3 control-label">Vehicle Model</label>
                    <div class="col-md-4 inputGroupContainer">
                       <div class="input-group">
                          <input id="addressLine1" name="model_name" class="form-control"  value="" type="text">
                          @error('vehicle_company')
                            <span class="invalid-feedback d-block" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                         @enderror

                        </div>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="col-md-3 control-label">Model Description</label>
                    <div class="col-md-4 inputGroupContainer">
                       <div class="input-group">
                          <input id="addressLine1" name="model_desc" class="form-control"  value="" type="text">
                          @error('vehicle_company')
                            <span class="invalid-feedback d-block" role="alert">
                               <strong>{{ $message }}</strong>
                            </span>
                         @enderror

                        </div>
                    </div>
                  </div>
                 <div class="form-group">
                    <div class="col-md-4">
                      <input style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right"></input>
                    </div>
                 </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>    

<script type="text/javascript">
  $(document).ready( function () {
    $('#myTable').DataTable();
} );

</script>
@endsection