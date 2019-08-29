@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>PUC DOCUMENT DETAILS</h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('pucdetails.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('pucdetails.update',$data->id)}}">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                        	<div class="row">
	                        	<div class="col-md-4 col-xl-4 mt-2">
				                    <label class="">Select Vehicle</label>
				                     
			                       <select name="vch_id" class="selectpicker form-control">
			                            <option value="0" selected=" true " disabled="true">Select..</option>
			                            @foreach($vehicle as $vehicles)
			                               <option value="{{$vehicles->id}}" {{$vehicles->id == $data->vch_id ? 'selected':''}}>{{$vehicles->vch_no}}</option>
			                            @endforeach     
			                        </select>
			                         @error('vch_id')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Vehicle' }}</strong>
			                              </span>
			                          @enderror
			                    </div>


				                <div class="col-md-4 col-xl-4 mt-2">
				                    <label class="">Select Agent</label>
				                    
			                       <select name="agent_id" class="selectpicker form-control">
			                            <option value="0" selected=" true " disabled="true">Select..</option>
			                            @foreach($vehicle as $vehicles)
			                               <option value="{{$vehicles->id}}">{{$vehicles->vch_no}}</option>
			                            @endforeach     
			                        </select>
			                        @error('agent_id')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Agent' }}</strong>
			                              </span>
			                          @enderror
				                </div>
	                                                            
	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">PUC No</label>
	                                
	                                <input id="vehicle_no" class="form-control" name="puc_no" value="{{old('puc_no') ?? $data->puc_no}}" > 
	                                @error('puc_no')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter PUC number' }}</strong>
			                            </span>
			                         @enderror
	                                 
	                            </div>
	                        </div> 
	                        
	                        <div class="row">    
                                                       
	                            <div class="col-md-3 col-xl-3 mt-2">
	                                 <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">PUC Amount</label>
	                               
	                                <input id="email" name="puc_amt" class="form-control  " value="{{old('spec_grav') ?? $data->puc_amt}}">
	                                 @error('puc_amt')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please enter PUC amount' }}</strong>
			                            </span>
			                         @enderror
	                                
	                            </div>

	                            <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Valid From</label>
	                               
	                                <input id="email1" class="form-control" type="date" name="valid_from" value="{{old('valid_from') ?? $data->valid_from}}">
	                                 @error('valid_from')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please select valid from ' }}</strong>
			                            </span>
			                         @enderror
	                               
	                            </div>

	                           <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Expiry Date</label>
	                               
	                                <input id="email1" class="form-control" type="date" name="valid_till" value="{{old('valid_till') ?? $data->valid_till}}">
	                                 @error('valid_till')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Plesae select till date' }}</strong>
			                            </span>
			                         @enderror
	                               
	                            </div>

	                            <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Update Date</label>
	                                
	                                <input id="email1" class="form-control" type="date" name="update_dt" value="{{old('update_dt') ?? $data->update_dt}}">
	                                @error('update_dt')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ "Please select update date" }}</strong>
			                            </span>
			                         @enderror
	                               
	                            </div>
	                        </div>
	                        <div class="row">    
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
                               		  @error('pay_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ "Please enter cheque number" }}</strong>
			                            </span>
			                         @enderror
                                </div>
                           		<div class="col-md-3 col-xl-3 mt-2">
                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Cheque Date</label>
	                               
                               		 <input id="email1" class="form-control" type="date" name="cpay_dt" name="pay_dt" value="{{old('pay_dt')}}">
                               		  @error('pay_dt')
			                         <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ "Please enter cheque date" }}</strong>
			                            </span>
			                         @enderror
                               
                           		 </div>
                           		
                           		<div class="col-md-3 col-xl-3 mt-2">
                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Bank Name</label>
	                               
                               		 <input id="email1" class="form-control  " name="cpay_bank" value="{{old('pay_bank')}}">
                               		  @error('pay_bank')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please enter bank name' }}</strong>
			                            </span>
			                         @enderror
                               
                           		 </div>
                           		 <div class="col-md-3 col-xl-3 mt-2">
                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Branch Name </label>
	                               
                               		 <input id="email1" class="form-control  " name="cpay_branch" value="{{old('pay_branch')}}">
                               		  @error('pay_branch')
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
                               		  @error('pay_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please enter DD number' }}</strong>
			                            </span>
			                         @enderror
                                </div>
                           		<div class="col-md-3 col-xl-3 mt-2">
                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">DD Date</label>
	                               
                               		 <input id="email1" class="form-control" type="date" name="dpay_dt" value="{{old('pay_dt')}}">
                               		  @error('pay_dt')
			                         <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please enter DD date' }}</strong>
			                            </span>
			                         @enderror
                               
                           		 </div>
                           		
                           		<div class="col-md-3 col-xl-3 mt-2">
                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Bank Name</label>
	                                
                               		 <input id="email1" class="form-control  " name="dpay_bank" value="{{old('pay_bank')}}">
                               		 @error('pay_bank')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please enter bank name' }}</strong>
			                            </span>
			                         @enderror
                               
                           		 </div>
                           		 <div class="col-md-3 col-xl-3 mt-2">
                              	  <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Branch Name</label>
	                               
                               		 <input id="email1" class="form-control  " name="dpay_branch" value="{{old('pay_branch')}}">
                               		  @error('pay_branch')
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
                               		 <input id="email1" class="form-control  "type="date" name="rpay_dt" value="{{old('pay_dt')}}">
                               
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
                               		 <input id="email1" class="form-control" type="date" name="npay_dt" value="{{old('npay_dt')}}">
                               
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
                           	<div class=row>
				                 <div class="col-md-12 col-xl-12 mt-2">
	                                <label for="IMEI Number">Photo</label><br>
	                                <input type="file" id="image" name="doc_file" value="">
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
</div>    

<script type="text/javascript">
  $(document).ready( function () {
    
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

    	var type = "{{old('payment_mode') ?? $data->payment_mode}}"
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
      
	});

</script>
@endsection