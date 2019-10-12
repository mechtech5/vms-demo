@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>BATTERY CHARGING DETAILS</h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('batterycharge.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" method="post" action="{{route('batterycharge.store')}}">
              {{csrf_field()}}
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">

                        	<div class="col-md-3 col-xl-3 mt-2">
			                    <label class="">Select Vehicle</label>
		                       <select name="vch_id" class="selectpicker form-control">
		                            <option value="0" selected=" true " disabled="true">Select..</option>
		                            @foreach($vehicle as $vehicles)
		                               <option value="{{$vehicles->id}}">{{$vehicles->vch_no}}</option>
		                            @endforeach     
		                        </select>
                                @error('vch_id')
                                  <span class="invalid-feedback d-block pull-right" role="alert">
                                      <strong>{{ 'Please Select Vehicle' }}</strong>
                                  </span>
                                @enderror
		                      
			                </div>
                                                            
                            <div class="col-md-3 col-xl-3 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">KM Reading</label>
                                <input id="vehicle_no" class="form-control" name="km_reading" value="{{old('km_reading')}}" > 
                                @error('km_reading')
                                  <span class="invalid-feedback d-block pull-right" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                                 
                            </div>
                                                       
                            <div class="col-md-3 col-xl-3 mt-2">
                                 <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">Specific Gravity</label>
                                <input id="email" name="spec_grav" class="form-control  " value="{{old('spec_grav')}}">
                                @error('spec_grav')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                                
                            </div>

                            <div class="col-md-3 col-xl-3 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Volt Reading</label>
                                <input id="email1" class="form-control  " name="volt_reading" value="{{old('volt_reading')}}">
                                @error('volt_reading')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                               
                            </div>

                           <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Battery Water</label>
                                <input id="email1" class="form-control  " name="batt_water" value="{{old('batt_water')}}">
                                @error('batt_water')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                               
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Battery Acid</label>
                                <input id="email1" class="form-control  " name="batt_acid" value="{{old('batt_acid')}}">
                                @error('batt_acid')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                               
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Charging By</label>
                                <input id="email1" class="form-control  " name="chr_by" value="{{old('chr_by')}}">
                                @error('chr_by')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                               
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Battery Condition</label>
                                <input id="email1" class="form-control  " name="batt_cond" value="{{old('batt_cond')}}">
                                @error('batt_cond')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                               
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Cost</label>
                                <input id="email1" class="form-control  " name="cost" value="{{old('cost')}}">
                                @error('cost')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                               
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Charging Date</label>
                                <input id="email1" class="form-control datepicker" readonly="true" name="date" value="{{old('date')}}">
                                @error('date')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                               
                            </div>

                             <div class="col-md-12 col-xl-12 mt-2">
                                <label for="Engine No">Remark</label>
                                <textarea id="email1" class="form-control  " name="remarks" value="">{{old('remarks')}}</textarea>
                                @error('remarks')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                                @enderror
                               
                            </div>
                        </div>     
                         <div class="col-md-6" style="margin-top: 24px;">
                         	<input  style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right">
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
    
    $(function() {
      $(".datepicker" ).datepicker({format:'yyyy-mm-dd'});
   })
      
	});

</script>
@endsection