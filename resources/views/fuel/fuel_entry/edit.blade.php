@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>ADD FUEL DETAILS</h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('fuelentry.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('fuelentry.update',$data->id)}}">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                        	<div class="row">

                        		<div class="col-md-4 col-xl-4 mt-2">
				                    <span style="color: #FF0000;font-size:15px;">*</span><label class="">Select Vehicle</label>		                    
			                       <select id="vch_id"  name="vch_id" class="selectpicker form-control">
			                            <option value="">Select..</option>
			                            @foreach($vehicle as $Vehicle)
			                               <option value="{{$Vehicle->id}}"{{$Vehicle->id == $data->vch_id ? 'selected':''}}>{{$Vehicle->vch_no}}</option>
			                            @endforeach     
			                        </select>
			                        @error('vch_id')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Agent' }}</strong>
			                              </span>
			                          @enderror
				                </div>
				                <div class="col-md-4 col-xl-4 mt-2">
				                  <span style="color: #FF0000;font-size:15px;">*</span>  <label class="">Select Pump</label>		                    
			                       <select id='pump_city' name="fuel_stn_id" class="selectpicker form-control">
			                            <option value="0" selected=" true " >Select..</option> 
			                            @foreach($pump as $Pump)
			                               <option value="{{$Pump->id}}"{{$Pump->id == $data->fuel_stn_id ? 'selected':''}}>{{$Pump->pump_name}}</option>
			                            @endforeach       
			                        </select>
			                        @error('fuel_stn_id')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Agent' }}</strong>
			                              </span>
			                          @enderror
				                </div>
				                <div class="col-md-4 col-xl-4 mt-2">
				                    <span style="color: #FF0000;font-size:15px;">*</span><label class="">Select Payment Mode</label>		                    
			                       <select id='pump_city' name="payment_mode" class="selectpicker form-control">
			                            <option  value="0" >Select..</option> 
			                            <option {{$data->payment_mode == 'cash' ? 'selected':''}}value="cash">Cash</option>
			                            <option {{$data->payment_mode == 'credit' ? 'selected':''}} value="credit">Credit</option>
			                       </select>
			                        @error('payment_mode')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Agent' }}</strong>
			                              </span>
			                          @enderror
				                </div>
				            </div>
                        
			                <div class="row">    
			                	 <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Date</label>
	                                
	                                <input id="ins_policy_no" class="form-control" type="date" name="date" value="{{old('date') ?? $data->date}}" > 
	                                @error('date')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent name' }}</strong>
			                            </span>
			                         @enderror
	                            </div>
				           
		                        <div class="col-md-4 col-xl-4 mt-2">
	                               <label for="Vehicle No.">Bill No</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="bill_no" value="{{old('bill_no') ?? $data->bill_no}}" > 
	                                @error('bill_no')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent email' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>    

		                        <div class="col-md-4 col-xl-4 mt-2">
	                               <label for="Vehicle No.">Opening KM</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="opening_km" value="{{old('opening_km') ?? $data->opening_km}}" > 
	                                @error('opening_km')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent name' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	
                                         
				            </div>
				             <div class="row">

			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="Vehicle No.">Current KM  </label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="current_km" value="{{old('current_km') ?? $data->current_km}}" > 
	                                @error('current_km')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent mobile number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>   
			                	
			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="Vehicle No.">KM Covered</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="km_covered" value="{{old('km_covered') ?? $data->km_covered}}" > 
	                                @error('km_covered')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent mobile number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                     
			                	<div class="col-md-4 col-xl-4 mt-2">

	                                <label for="Vehicle No.">Current Diesel Filled</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="current_diesel_filled" value="{{old('current_diesel_filled') ?? $data->current_diesel_filled}}" > 
	                                @error('current_diesel_filled')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent name' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	
	                         </div>

 							<div class="row"> 
 								<div class="col-md-4 col-xl-4 mt-2">
				                    <span style="color: #FF0000;font-size:15px;">*</span><label class="">Fuel Type</label>		                    
			                       <select id='pump_city' name="fuel_type" class="selectpicker form-control">
			                           <option value="0"> Fuel Type</option>
										<option value="ex/p">Ex/P</option>
										<option value="hsd">HSD</option>
										<option value="turbo">Turbo</option>
										<option value="ex_mile">Ex Mile</option>
										<option value="pre_petrol">Pre Petrol</option>
										<option value="lpg">LPG</option>
										<option value="cng">CNG</option>
			                       </select>
			                        @error('fuel_type')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Agent' }}</strong>
			                              </span>
			                          @enderror
				                </div>    
			                    <div class="col-md-4 col-xl-4 mt-2"> 
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Fuel Rate</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="fuel_rate" value="{{old('fuel_rate') ?? $data->fuel_rate}}" > 
	                                @error('fuel_rate')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent mobile number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>

		                        <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Total Fuel Amount</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="total_fuel_amt" value="{{old('total_fuel_amt') ?? $data->total_fuel_amt}}" > 
	                                @error('total_fuel_amt')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent mobile number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
	                        </div>
	                        <div class="row"> 
 								<div class="col-md-3 col-xl-3 mt-2">
				                   <span style="color: #FF0000;font-size:15px;">*</span> <label class="">Select Driver</label>		                    
			                       <select id='pump_city' name="driver_id" class="selectpicker form-control">
			                           <option value="0">Select</option>
									 @foreach($driver as $Driver)
									 	<option {{$data->driver_id  == $Driver->id ? 'selected':''}}  value="{{$Driver->id}}">{{$Driver->name}}</option>
									 @endforeach	
			                       </select>
			                        @error('driver_id ')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Agent' }}</strong>
			                              </span>
			                          @enderror
				                </div>    
			                    <div class="col-md-3 col-xl-3 mt-2"> 
	                                <label for="Vehicle No.">Fuel Consumed</label>
	                                
	                                <input id="ins_policy_no"  class="form-control" name="fuel_consumed" value="{{old('fuel_consumed') ?? $data->fuel_consumed}}" > 
	                                @error('fuel_consumed')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent mobile number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>

		                        <div class="col-md-3 col-xl-3 mt-2">
	                             	<label for="Vehicle No.">Average Obtained</label>
	                                
	                                <input id="ins_policy_no"  class="form-control" name="avg_obtained" value="{{old('avg_obtained') ?? $data->avg_obtained}}" > 
	                                @error('avg_obtained')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent mobile number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                        <div class="col-md-3 col-xl-3 mt-2">
	                                <label for="Vehicle No.">Last Filling Average </label>
	                                
	                                <input id="ins_policy_no"  class="form-control" name="last_filling_avg" value="{{old('last_filling_avg') ?? $data->last_filling_avg}}" > 
	                                @error('last_filling_avg')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent mobile number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
	                        </div>

		                    <div class="row">    
		                        <div class="col-md-12 col-xl-12 mt-2">
	                                <label for="Vehicle No.">Remarks</label>
	                                
	                                <textarea id="ins_policy_no" class="form-control" name="remarks" value="" >{{old('remarks') ?? $data->remarks}}</textarea> 
	                                @error('remarks')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter address' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>

	                        </div>
	                        
	                    </div>     
                         <div class="col-md-6" style="margin-top: 24px;">
                         	<input  style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right">
                       	</div>

                    		</div>
                    	</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
 </div>
</div>
</div>
</div>
<script type="text/javascript">
</script>
@endsection