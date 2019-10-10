@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>UPDATE PETROL PUMP DETAILS</h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('petrolpump.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('petrolpump.update',$data->id)}}">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="card-body " >
                    <div class="row">
                    	
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                        	
			                <div class="row">    
			                	<div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Petrol Pump Name </label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="pump_name" value="{{old('pump_name') ?? $data->pump_name}}" > 
	                                @error('pump_name')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter petrol pump name' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	

		                        <div class="col-md-4 col-xl-4 mt-2">
	                               <label for="Vehicle No.">Pump Phone No</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="pump_phone" value="{{old('pump_phone') ?? $data->pump_phone}}" > 
	                                @error('pump_phone')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent email' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>    

		                        <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">GST No</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="pump_gst_no" value="{{old('pump_gst_no') ?? $data->pump_gst_no}}" > 
	                                @error('pump_gst_no')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter GST no.' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	
                                         
				            </div>
				             <div class="row">

			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="Vehicle No.">Contact Preson </label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="contact_name" value="{{old('contact_name') ?? $data->contact_name}}" > 
	                                @error('contact_name')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter preson name' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>   
			                	
			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="Vehicle No.">Mobile No</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="contact_phonw" value="{{old('contact_phonw') ?? $data->contact_phonw}}" > 
	                                @error('contact_phonw')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter person mobile number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                     
			                	<div class="col-md-4 col-xl-4 mt-2">
	                                <label for="Vehicle No.">Website</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="pump_website" value="{{old('pump_website') ?? $data->pump_website}}" > 
	                                @error('pump_website')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter petrol pump website' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	
	                         </div>

 							<div class="row">     
			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="Vehicle No.">Email ID</label>
	                                
	                                <input id="ins_policy_no" type="email" class="form-control" name="pump_email" value="{{old('pump_email') ?? $data->pump_email}}" > 
	                                @error('pump_email')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter email' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
	                         <div class="col-md-4 col-xl-4 mt-2">
				                    <label class=""><span style="color: #FF0000;font-size:15px;">*</span>Select State</label>		                    
			                       <select id="pump_state" name="pump_state" class="selectpicker form-control">
			                            <option value="0" >Select..</option>
			                            @foreach($state as $State)
			                               <option {{$State->id == $data->pump_state ? 'selected':''}} value="{{$State->id}}">{{$State->state_name}}</option>
			                            @endforeach     
			                        </select>
			                        @error('pump_state')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                                <strong>{{ 'Please Select state' }}</strong>
			                            </span>
			                          @enderror
				                </div>
				                <div class="col-md-4 col-xl-4 mt-2">
				                    <label class=""><span style="color: #FF0000;font-size:15px;">*</span>Select City</label>		                    
			                       <select id="pump_city" name="pump_city" class="selectpicker form-control">
			                            <option value="0" >Select..</option>
			                         </select>
			                        @error('pump_city')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select City' }}</strong>
			                              </span>
			                          @enderror
				                </div>
				            </div>

		                    <div class="row">    
		                        <div class="col-md-12 col-xl-12 mt-2">
	                                <label for="Vehicle No.">Address</label>
	                                
	                                <textarea id="ins_policy_no" class="form-control" name="note" value="" >{{old('note') ?? $data->note}}</textarea> 
	                                @error('note')
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
	$(document).ready(function(){
		$('#pump_state').on('change',function(){
        var vch_comp = $('#pump_state').val();
        $.ajax({
                url: "{{route('petrolpump.get_city')}}",
                type: 'POST',
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                data: {'id':vch_comp},
                success: function (data) {
                    $('#pump_city').html(data);
                }
            })
    })
	
})
</script>
@endsection