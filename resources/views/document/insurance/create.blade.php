@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
	            <div class="col-sm-6 col-md-6">
	                <h3>INSURANCE DETAILS </h3>
	            </div>
	            <div class="col-sm-6 col-md-6">
	                <a class="btn btn-inverse pull-right" href="{{route('insurance.index')}}">Back</a>
	            </div>
            <div id="add-city-form">
              <form enctype="multipart/form-data" class="well form-horizontal" method="post" 		action="{{route('insurance.store')}}">
              		{{csrf_field()}}
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                        	<div class="row">
	                        	<div class="col-md-3 col-xl-3 mt-2">
				                    <label class="">Select Vehicle</label>
				                     
			                       <select name="vch_id" class="selectpicker form-control" id="vehicle_no1">
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
				                    <label class="">Select Agent</label>
				                    
			                       <select name="agent_id" class="selectpicker form-control">
			                            <option value="0" selected=" true " disabled="true">Select..</option>
			                            @foreach($agent as $Agent)
			                               <option value="{{$Agent->id}}">{{$Agent->agent_name}}</option>
			                            @endforeach     
			                        </select>
			                        @error('agent_id')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Agent' }}</strong>
			                              </span>
			                          @enderror
				                </div>

				                <div class="col-md-3 col-xl-3 mt-2">
				                    <label class="">Select Insurance Company</label>
				                    
			                       <select name="ins_comp" class="selectpicker form-control">
			                            <option value="0" selected=" true " disabled="true">Select..</option>
			                            @foreach($ins_company as $company)
			                               <option value="{{$company->id}}">{{$company->comp_name}}</option>
			                            @endforeach     
			                        </select>
			                        @error('ins_comp')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Insurance Company' }}</strong>
			                              </span>
			                          @enderror
				                </div>

				                <div class="col-md-3 col-xl-3 mt-2">
				                    <label class="">Select Insurance Type</label>				                    
			                        <select name="ins_type" class="selectpicker form-control">
			                            <option value="0" selected=" true " disabled="true">Select..</option>
			                        </select>
			                        @error('ins_type')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Insurance Type' }}</strong>
			                              </span>
			                          @enderror
				                </div>
				            </div>

                            <div class='row'>
                            	<div class="col-md-4 col-xl-4 mt-2">
		                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Insured's Name</label>
		                                
		                                <input id="insured_name" class="form-control" name="insured_name" value="{{old('insured_name')}}" > 
		                                @error('insured_name')
				                            <span class="invalid-feedback d-block pull-right" role="alert">
				                               <strong>{{ 'Please enter policy number' }}</strong>
				                            </span>
				                         @enderror       
		                        </div>

	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Insurance Policy No</label>
	                                <input id="ins_policy_nopayment_mode" class="form-control" name="ins_policy_no" value="{{old('ins_policy_no')}}" > 
	                                @error('ins_policy_no')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please Enter Policy Number' }}</strong>
			                            </span>
			                         @enderror   
	                            </div>

	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Insurance Amount(p/m)</label>
	                                <input id="vehicle_no" class="form-control" name="ins_amt" value="{{old('ins_amt')}}" > 
	                                @error('ins_amt')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please Enter Insurance Amount' }}</strong>
			                            </span>
			                         @enderror   
	                            </div>
	                        </div>

	                        <div class="row">
	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Insurance Total Amount</label>
	                                <input id="vehicle_no" class="form-control" name="ins_total_amt" value="{{old('ins_total_amt')}}" > 
	                                @error('ins_total_amt')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please Enter Insurance Total Amount' }}</strong>
			                            </span>
			                         @enderror   
	                            </div>

	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Insurance Prev Policy No</label>
	                                <input id="vehicle_no" class="form-control" name="ins_pre_policy_no" value="{{old('ins_pre_policy_no')}}" > 
	                                @error('ins_pre_policy_no')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please Enter Insurance amount' }}</strong>
			                            </span>
			                         @enderror  
	                            </div>

	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">NCB Discount</label>
	                                <input id="vehicle_no" class="form-control" name="ncb_discount" value="{{old('ncb_discount')}}" > 
	                                @error('ncb_discount')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please Enter NCB Discount' }}</strong>
			                            </span>
			                         @enderror  
	                            </div>
		                    </div>


	                        <div class="row">
		                        <div class="col-md-4 col-xl-4 mt-2">
		                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Hypothecation Agreement</label>
		                                <input id="vehicle_no" class="form-control" 
		                                name="hypothecation_agreement" value="{{old('hypothecation_agreement')}}" > 
		                                @error('hypothecation_agreement')
				                            <span class="invalid-feedback d-block pull-right" role="alert">
				                               <strong>{{ 'Please Enter Hypothecation Agreement Field' }}</strong>
				                            </span>
				                         @enderror  
		                        </div>

		                        <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Valid From</label>
	                                <input id="email1" class="form-control datepicker" readonly="true" name="valid_from" value="{{old('valid_from')}}">
	                                 @error('valid_from')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please select valid from ' }}</strong>
			                            </span>
			                         @enderror	                               
		                        </div>

	                           	<div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Expiry Date</label>
	                                <input id="email1" class="form-control datepicker" readonly="true"  name="valid_till" value="{{old('valid_till')}}">
	                                 @error('valid_till')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Plesae select till date' }}</strong>
			                            </span>
			                         @enderror
	                            </div>
	                        </div>
	                        
	                        <div class="row">
	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Update Date</label>
	                                <input id="email1" class="form-control datepicker" readonly="true" name="update_dt" value="{{old('update_dt')}}">
	                                @error('update_dt')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ "Please select update date" }}</strong>
			                            </span>
			                         @enderror
	                            </div>

	                            <div class="col-md-4 col-xl-4 mt-2">
				                    <label class="">Payment mode</label>
				                      
			                        <select id="type" name="payment_mode" class=" form-control">
			                            <option selected="true" value="0">Mode</option>
			                            <option value="cash">Cash</option>
										<option value="cheque">Cheque</option>
										<option value="credit">Credit</option>
										<option value="dd">DD</option>
										<option value="rtgs">RTGS</option>
										<option value="neft">NEFT</option>  
			                        </select>
			                        @error('payment_mode')
			                              <span class="invalid-feedback d-block " role="alert">
			                                  <strong>{{ 'Please Select payment mode' }}</strong>
			                              </span>
			                          @enderror
				                </div>
				            </div>
				          
				                <div style="display: none" class="row cheque">
				                	<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Cheque No.</label>
	                               		 <input id="cheque_no" class="form-control  " name="cpay_no" value="{{old('pay_no')}}">
	                               		  @error('cpay_no')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ "Please enter cheque number" }}</strong>
				                            </span>
				                         @enderror
	                                </div>

	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Cheque Date</label>
	                               		 <input id="email1" class="form-control datepicker" readonly="true" name="cpay_dt" name="pay_dt" value="{{old('pay_dt')}}">
	                               		  @error('cpay_dt')
				                         <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ "Please enter cheque date" }}</strong>
				                            </span>
				                         @enderror
	                           		 </div>
	                           		
	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Bank Name</label>
	                               		 <input id="email1" class="form-control  " name="cpay_bank" value="{{old('pay_bank')}}">
	                               		  @error('cpay_bank')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter bank name' }}</strong>
				                            </span>
				                         @enderror
	                           		 </div>

	                           		 <div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Branch Name </label>
	                               		 <input id="email1" class="form-control  " name="cpay_branch" value="{{old('pay_branch')}}">
	                               		  @error('cpay_branch')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter bank branch' }}</strong>
				                            </span>
				                         @enderror
	                           		 </div>
	                           	</div>

	                           	<div style="display: none" class="row dd">
				                	<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">DD No</label>
	                               		 <input id="email1" class="form-control  " name="dpay_no" value="{{old('pay_no')}}">
	                               		  @error('dpay_no')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter DD number' }}</strong>
				                            </span>
				                         @enderror
	                                </div>

	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">DD Date</label>
	                               		 <input id="email1" class="form-control datepicker" readonly="true" name="dpay_dt" value="{{old('pay_dt')}}">
	                               		  @error('dpay_dt')
				                         <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter DD date' }}</strong>
				                            </span>
				                         @enderror
	                           		 </div>
	                           		
	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Bank Name</label>
	                               		 <input id="email1" class="form-control  " name="dpay_bank" value="{{old('pay_bank')}}">
	                               		 @error('dpay_bank')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter bank name' }}</strong>
				                            </span>
				                         @enderror
	                           		 </div>

	                           		 <div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Branch Name</label>
	                               		 <input id="email1" class="form-control  " name="dpay_branch" value="{{old('pay_branch')}}">
	                               		  @error('dpay_branch')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter bank branch' }}</strong>
				                            </span>
				                         @enderror
	                           		 </div>
	                           	</div>

	                           	<div style="display: none" class="row rtgs">
				                	<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">RTGS No.</label>
		                                @error('rpay_no')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter RTGS number' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="email1" class="form-control  " name="rpay_no" value="{{old('rpay_no')}}">
	                                </div>

	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">RTGS Date</label>
		                                @error('rpay_dt')
				                         <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter RTGS date' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="email1" class="form-control datepicker" readonly="true" name="rpay_dt" value="{{old('pay_dt')}}">
	                           		 </div>
	                           		
	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Bank Name </label>
		                                @error('rpay_bank')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter bank name' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="email1" class="form-control  " name="rpay_bank" value="{{old('rpay_bank')}}">
	                           		 </div>

	                           		 <div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Branch Name</label>
		                                @error('rpay_branch')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter branch name' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="email1" class="form-control  " name="rpay_branch" value="{{old('rpay_branch')}}">
	                           		 </div>
	                           	</div>

	                           	<div style="display: none" class="row neft">
				                	<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">NEFT No.</label>
		                                @error('nupdate_dt')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter NEFT number' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="email1" class="form-control  " name="npay_no" value="{{old('npay_no')}}">
	                                </div>

	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">NEFT Date</label>
		                                @error('npay_dt')
				                         <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter NEFT date' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="email1" class="form-control datepicker" readonly="true"  name="npay_dt" value="{{old('npay_dt')}}">
	                           		 </div>
	                           		
	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Bank Name</label>
		                                @error('npay_bank')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter bank name' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="email1" class="form-control  " name="npay_bank" value="{{old('npay_bank')}}">
	                           		 </div>

	                           		 <div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Branch Name</label>
		                                @error('npay_branch')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please enter branch name' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="email1" class="form-control  " name="npay_branch" value="{{old('npay_branch')}}">
	                           		 </div>
	                           	</div>

	                           	<div style="display: none" class="row vehicle">
	                           		
				                	<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Engine No.</label>
		                                @error('engine_no')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Engine No. Not Available' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="engine_no" class="form-control "
	                               		  name="engine_no" value="{{old('engine_no') }}">
	                                </div>

	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Chassis No">Chassis No</label>
		                                @error('chassis_no')
				                         <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Chassis No. Not Available' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="chassis_no" class="form-control" {{-- readonly="true" --}}  name="chassis_no" value="{{old('chassis_no') }}">
	                               
	                           		 </div>
	                           		
	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Manufacture Year</label>
		                                @error('manufacture_year')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please Enter Manufacture Year' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="manufacture_year" class="form-control" name="manufacture_year" value="{{old('manufacture_year') }}">
	                           		</div>
	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Type Of Body</label>
		                                @error('type_of_body')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please Enter Type Of Body' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="type_of_body" class="form-control  " 
	                               		 name="type_of_body" value="{{old('type_of_body')}}">
	                           		</div>

	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Type Of Fuel</label>
		                                @error('type_of_fuel')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please Enter Type Of Fuel' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="type_of_fuel" class="form-control  "
	                               		  name="type_of_fuel" value="{{old('type_of_fuel') }}">
	                           		</div>

	                           		<div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Seating Capacity(including Driver)</label>
		                                @error('seating_capacity')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please Enter Seating Capacity' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="seating_capacity" class="form-control  " name="seating_capacity" value="{{old('seating_capacity')}}">
	                           		</div>

	                           		 <div class="col-md-3 col-xl-3 mt-2">
	                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Cubic Capacity</label>
		                                @error('cubic_capacity')
				                            <span class="invalid-feedback d-block" role="alert">
				                               <strong>{{ 'Please Enter Cubic Capacity' }}</strong>
				                            </span>
				                         @enderror
	                               		 <input id="cubic_capacity" class="form-control  " 
	                               		 name="cubic_capacity" value="{{old('cubic_capacity') }}">
	                           		 </div>
	                           	</div>
                           	<div class=row>
				                <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="IMEI Number">Photo</label><br>
	                                <input type="file" id="image" name="doc_file" value="" class="image">
	                        	</div>
	                        
		                        <div class="col-md-2 col-xl-2 mt-5">
	                                <table class="table">
	                                  <tr>
	                                    <th><center>Insurance Image</center></th>
	                                  </tr>
	                                  <tr>
	                                    <td>
	                                      <div  class="image">
	                                      </div>
	                                    </td>
	                                  </tr>
	                                </table>
	                            </div>    
                            </div>

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
<script type="text/javascript">
  $(document).ready( function () {
    
    $(function() {
        $( ".datepicker" ).datepicker({format:'yyyy-mm-dd'});
    });

    $('#type').on('change',function(){
    	var type = $(this).val();
    	if(type == 'cheque'){
    		$('.cheque').show();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').hide();
    		$('#cheque_no').on('keyup',function(){
    			var chk = $(this).val();
    			if($.isNumeric(chk)){

    			}
    		})

    	}
    	else if(type == 'dd'){
    		$('.cheque').hide();
    		$('.dd').show();
    		$('.rtgs').hide();
    		$('.neft').hide();
    	}

    	else if(type == 'rtgs'){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').show();
    		$('.neft').hide();
    	}

    	else if(type == 'neft'){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').show();
    	}
    	else if( (type == 'cash') || (type == 'credit') || (type="") ){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').hide();	
    	}

    })

    	var type = "{{old('payment_mode')}}"
    	if(type == 'cheque'){
    		$('.cheque').show();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').hide();
      	}

    	else if(type == 'dd'){
    		$('.cheque').hide();
    		$('.dd').show();
    		$('.rtgs').hide();
    		$('.neft').hide();
    	}

    	else if(type == 'rtgs'){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').show();
    		$('.neft').hide();
    	}

    	else if(type == 'neft'){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').show();
    	}
    	else if( (type == 'cash') || (type == 'credit') || (type="0") ){
    		$('.cheque').hide();
    		$('.dd').hide();
    		$('.rtgs').hide();
    		$('.neft').hide();	
    	}




    $('#vehicle_no1').on('change',function(){
    	var id = $(this).val();
    	$.ajax({
    		type:'POST',
    		url:'/getDetails',
    		 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    		data:{id:id},
    		success:function(data){
    			$('.vehicle').show();
    			var parsed_result = JSON.parse(data);  //parsing here
    			console.log(parsed_result)
       	    	for (var key in parsed_result){
				    $('#engine_no').val(parsed_result['reg_engine_no'])
				    $('#chassis_no').val(parsed_result['reg_chassis_no'])
				    $('#manufacture_year').val(parsed_result['reg_manuf_year'])
				    $('#type_of_body').val(parsed_result['reg_type_of_body'])
				    $('#type_of_fuel').val(parsed_result['eng_fuel_type']);
				    $('#seating_capacity').val(parsed_result['reg_seating_capacity'])
				   // $('#cubic_capacity').val(parsed_result['tender_id']);
    			}
    		}
    	})
    })

    $(".image").change(function () {
        var img_id = $(this).attr('id');
        filePreview(this,img_id);
    });
});

function filePreview(input,img_id) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#'+img_id+' + img').remove();
            $('.'+img_id).html('<img src="'+e.target.result+'" width="100" height="100"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection