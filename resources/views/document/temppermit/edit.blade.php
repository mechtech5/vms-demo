@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>UPDATE TEMPORARY PERMIT DETAILS </h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('temppermit.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('temppermit.update',$data->id)}}">
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
			                               <option value="{{$vehicles->id}}"{{$vehicles->id == $data->vch_id ? 'selected':''}}>{{$vehicles->vch_no}}</option>
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
			                            @foreach($state_list as $state)
			                               <option value="{{$state->id}}">{{$state->state_name}}</option>
			                            @endforeach     
			                        </select>
			                         @error('agent_id')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Agent' }}</strong>
			                              </span>
			                          @enderror
			                    </div>

			                    <div class="col-md-4 col-xl-4 mt-2">
				                    <label class="">Permit For State</label>
				                     
			                       <select name="tp_state_id" class="selectpicker form-control">
			                            <option value="0" selected=" true " disabled="true">Select..</option>
			                            @foreach($state_list as $state)
			                               <option value="{{$state->id}}"{{$state->id == $data->tp_state_id ?'selected':''}}>{{$state->state_name}}</option>
			                            @endforeach     
			                        </select>
			                         @error('tp_state_id')
			                              <span class="invalid-feedback d-block pull-right" role="alert">
			                                  <strong>{{ 'Please Select Agent' }}</strong>
			                              </span>
			                          @enderror
			                    </div>
			                </div>
			                <div class="row">    
			                	<div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Current location/File Name</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="curr_loc" value="{{old('curr_loc') ?? $data->curr_loc}}" > 
	                                @error('curr_loc')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter draft number' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	

	                              <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Transfer to location sitename</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="trans_loc" value="{{old('trans_loc') ?? $data->trans_loc}}" > 
	                                @error('trans_loc')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter draft date' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>

			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Temporary Permit No</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="tp_permit_no" value="{{old('tp_permit_no') ?? $data->tp_permit_no}}" > 
	                                @error('tp_permit_no')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter permit number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>                 	
	                                           
				            </div>
	                         <div class="row">	                    

	                           <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Total days</label>
	                               
	                                <input id="email1" class="form-control" name="tp_total_days" value="{{old('tp_total_days') ?? $data->tp_total_days}}">
	                                 @error('tp_total_days')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Plesae select expiry date' }}</strong>
			                            </span>
			                         @enderror
	                               
	                            </div>

	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Road Tax No </label>
	                                
	                                <input id="email1" class="form-control"  name="tp_roadtax_no" value="{{old('tp_roadtax_no') ?? $data->tp_roadtax_no}}">
	                                @error('tp_roadtax_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ "Please select update date" }}</strong>
			                            </span>
			                         @enderror
	                               
	                            </div>
	                           	<div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Road Tax Amt</label>
	                                
	                                <input id="ins_policy_no" checked="true"  class="form-control" name="tp_tax_amt" value="{{old('tp_tax_amt') ?? $data->tp_tax_amt}}" > 
	                                @error('tp_tax_amt')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter All India Permit No' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                    </div>
		                    <div class="row">
		                    	<div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Formalities Complete</label><br>
	                                
	                                <input {{$data->forms_cmpl == 1 ? 'checked':''}} id="ins_policy_no" type="radio"  name="forms_cmpl" value="1" >Yes
	                                <input {{$data->forms_cmpl == 0 ? 'checked':''}} id="ins_policy_no" type="radio" name="forms_cmpl" value="0" >No 
	                                @error('forms_cmpl')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter All India Permit No' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                        <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Formalities Start date</label>
	                                
	                                <input id="ins_policy_no" type='date' class="form-control" name="forms_start_dt" value="{{old('forms_start_dt') ?? $data->forms_start_dt}}" > 
	                                @error('forms_start_dt')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter All India Permit No' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                        <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">End Date</label>
	                                
	                                <input id="ins_policy_no" type="date"  class="form-control" name="forms_end_dt" value="{{old('forms_end_dt') ?? $data->forms_end_dt}}" > 
	                                @error('forms_end_dt')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter All India Permit No' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                        <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Total days</label>
	                                
	                                <input id="ins_policy_no" checked="true"  class="form-control" name="forms_total_days" value="{{old('forms_total_days') ?? $data->forms_total_days}}" > 
	                                @error('forms_total_days')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter All India Permit No' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                    </div>
	                        <div class="row">    
		                        <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Permit Start date</label>
	                                
	                                <input id="ins_policy_no" type='date' class="form-control" name="tp_permit_start_dt" value="{{old('tp_permit_start_dt') ?? $data->tp_permit_start_dt}}" > 
	                                @error('tp_permit_start_dt')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter permit amout' }}</strong>
			                            </span>
			                         @enderror
	                                 
	                            </div>
	                            <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Permit End Date</label>
	                               
	                                <input id="email1" class="form-control" type="date" name="tp_permit_end_dt" value="{{old('tp_permit_end_dt') ?? $data->tp_permit_end_dt}}">
	                                 @error('tp_permit_end_dt')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please select valid from ' }}</strong>
			                            </span>
			                         @enderror	                               
		                        </div>
		                        <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Road Tax Start date</label>
	                                
	                                <input id="ins_policy_no" checked="true" type="date" class="form-control" name="tp_roadtax_start_dt" value="{{old('tp_roadtax_start_dt') ?? $data->tp_roadtax_start_dt}}" > 
	                                @error('tp_roadtax_start_dt')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter All India Permit No' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                        <div class="col-md-3 col-xl-3 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">End Date</label>
	                                
	                                <input id="ins_policy_no" checked="true" type="date"  class="form-control" name="tp_roadtax_end_dt" value="{{old('tp_roadtax_end_dt') ?? $data->tp_roadtax_end_dt}}" > 
	                                @error('tp_roadtax_end_dt')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter All India Permit No' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                    </div>
		                    <div class="row">    
		                        <div class="col-md-12 col-xl-12 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Remarks</label>
	                                
	                                <textarea id="ins_policy_no" checked="true"  class="form-control" name="remarks" value="" >{{old('remarks') ?? $data->remarks}}</textarea> 
	                                @error('remarks')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter All India Permit No' }}</strong>
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
      
	});

</script>
@endsection