@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>VEHICLE COMPANY DETAILS </h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('vehicle.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" method="post" action="{{route('vehicle.update',$vehicle[0]->id)}}">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="row">
                  <div class="col-md-2 col-sm-2"></div>
                    <div class="col-md-2 col-sm-2">
                      <label class="control-label"><span style="color: #FF0000;font-size:15px;">*</span>Vehicle Company</label>
                    </div>
                    <div class="col-md-4 col-sm-4">                    
                        <input id="addressLine1" name="vehicle_company" class="form-control"  value="{{  
                          old('vehicle_company') ?? $vehicle[0]->comp_name }}" type="text">
                        @error('vehicle_company')
                          <span class="invalid-feedback d-block" role="alert">
                             <strong>{{ $message }}</strong>
                          </span>
                       @enderror
                  </div>
                </div>  
                <div class="row mt-2">
                  <div class="col-md-2 col-sm-2"></div>
                  <div class="col-md-2 col-sm-2">
                    <label class="control-label">Company Description</label>
                  </div>  
                    <div class="col-md-4">
                      <input id="addressLine1" name="company_description" class="form-control"  value="{{old('company_description') ?? $vehicle[0]->comp_desc }}" type="text">
                     
                    </div>
                  </div>
                 <div class="row text-center">
                    <div class="col-md-12 mt-3">
                      <input style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active"></input>
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