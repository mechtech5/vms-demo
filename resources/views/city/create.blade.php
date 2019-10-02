@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3> CITY DETAILS </h3>
            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('city.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" method="post" action="{{route('city.store')}}">
              {{csrf_field()}}
                 <div class="form-group">
                    <label class="col-md-3 control-label"><span style="color: #FF0000; font-size:20px;">*</span>State</label>
                    <div class="col-md-7 inputGroupContainer">
                       <div class="input-group">
                          <select name="state_id" class="selectpicker form-control">
                             <option value="0" selected=" true " disabled="true">Select..</option>
                             @foreach($state as $states)
                                <option value="{{$states->id}}">{{$states->state_name}}</option>
                             @endforeach     
                          </select>
                        </div>
                         @error('state_id')
                              <span class="invalid-feedback d-block" role="alert">
                                  <strong>{{ 'Please select state' }}</strong>
                              </span>
                          @enderror
                    </div>
                 </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><span style="color: #FF0000; font-size:20px;">*</span>City Name</label>
                    <div class="col-md-7 inputGroupContainer">
                       <div class="input-group">
                          <input id="addressLine1" name="city_name" class="form-control"  value="" type="text">
                          @error('city_name')
                            <span class="invalid-feedback d-block" role="alert">
                               <strong>{{ 'Please enter city name in characters' }}</strong>
                            </span>
                         @enderror

                        </div>
                    </div>
                  </div>
                 <div class="form-group">
                    <label class="col-md-3 control-label"><span style="color: #FF0000; font-size:20px;">*</span>City Short Name</label>
                    <div class="col-md-7 inputGroupContainer">
                       <div class="input-group">
                          <input id="city" name="city_code" class="form-control"  value="" type="text">
                           @error('city_code')
                            <span class="invalid-feedback d-block" role="alert">
                               <strong>{{ 'Please enter city short name in characters (maximum length 3)' }}</strong>
                            </span>
                         @enderror
                        </div>
                    </div>
                 </div>
                  <div class="form-group">
                    <div class="col-md-12 text-center">
                      <input style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active "></input>
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