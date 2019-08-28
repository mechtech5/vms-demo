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
             <form class="well form-horizontal" method="post" action="{{route('batterycharge.update',$data->id)}}">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">

                        	<div class="col-md-3 col-xl-3 mt-2">
			                    <label class="">Select Vehicle</label>
			                      @error('vch_id')
		                              <span class="invalid-feedback d-block pull-right" role="alert">
		                                  <strong>{{ 'Please Select Vehicle' }}</strong>
		                              </span>
		                          @enderror

		                       <select name="vch_id" class="selectpicker form-control">
		                            <option value="0" selected="true" disabled="true" >Select..</option>
		                            @foreach($vehicle as $vehicles)
		                               <option value="{{$vehicles->id}}" {{$vehicles->id == $data->vch_id ? 'selected':'' }}>{{$vehicles->vch_no}}</option>
		                            @endforeach     
		                        </select>
		                      
			                </div>
                                                            
                            <div class="col-md-3 col-xl-3 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">KM Reading</label>
                                @error('km_reading')
		                            <span class="invalid-feedback d-block pull-right" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                                <input id="vehicle_no" class="form-control" name="km_reading" value="{{old('km_reading') ?? $data->km_reading}}" > 
                                 
                            </div>
                                                       
                            <div class="col-md-3 col-xl-3 mt-2">
                                 <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">Specific Gravity</label>
                                @error('spec_grav')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                                <input id="email" name="spec_grav" class="form-control  " value="{{old('spec_grav') ?? $data->spec_grav}}">
                                
                            </div>

                            <div class="col-md-3 col-xl-3 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Volt Reading</label>
                                @error('volt_reading')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                                <input id="email1" class="form-control  " name="volt_reading" value="{{old('volt_reading') ?? $data->volt_reading}}">
                               
                            </div>

                           <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Battery Water</label>
                                @error('batt_water')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                                <input id="email1" class="form-control  " name="batt_water" value="{{old('batt_water') ?? $data->batt_water}}">
                               
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Battery Acid</label>
                                @error('batt_acid')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                                <input id="email1" class="form-control  " name="batt_acid" value="{{old('batt_acid') ?? $data->batt_acid}}">
                               
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Charging By</label>
                                @error('chr_by')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                                <input id="email1" class="form-control  " name="chr_by" value="{{old('chr_by') ??  $data->chr_by}}">
                               
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Battery Condition</label>
                                @error('batt_cond')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                                <input id="email1" class="form-control  " name="batt_cond" value="{{old('batt_cond') ?? $data->batt_cond}}">
                               
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Cost</label>
                                @error('cost')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                                <input id="email1" class="form-control  " name="cost" value="{{old('cost') ?? $data->cost}}">
                               
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Charging Date</label>
                                @error('date')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                                <input id="email1" class="form-control" type="date" name="date" value="{{old('date') ?? $data->date}}">
                               
                            </div>

                             <div class="col-md-12 col-xl-12 mt-2">
                                <label for="Engine No">Remark</label>
                                @error('remarks')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                                <textarea id="email1" class="form-control  " name="remarks" value="">{{old('remarks') ?? $data->remarks}}</textarea>
                               
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
    $('#myTable').DataTable();
      
	});

</script>
@endsection