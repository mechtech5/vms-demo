@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>ADD AGENT </h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('agent.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('agent.update',$data->id)}}">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                        	
			                <div class="row">    
			                	<div class="col-md-6 col-xl-6 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Agent Name</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="agent_name" value="{{old('agent_name') ?? $data->agent_name}}" > 
	                                @error('agent_name')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent name in characters' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	

	                              <div class="col-md-6 col-xl-6 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Agent Code</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="agent_code" value="{{old('agent_code') ?? $data->agent_code}}" > 
	                                @error('agent_code')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent code (in number)' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>
		                    </div>
		                    <div class="row">

			                    <div class="col-md-6 col-xl-6 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Agent Mobile No.</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="agent_phone" value="{{old('agent_phone') ?? $data->agent_phone}}" > 
	                                @error('agent_phone')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent mobile number (enter only number)' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>

		                        <div class="col-md-6 col-xl-6 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Agent Email</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="agent_email" value="{{old('agent_email') ?? $data->agent_email}}" > 
	                                @error('agent_email')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent email' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>                                             
				            </div>
		                    <div class="row">    
		                        <div class="col-md-12 col-xl-12 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Agent Address</label>
	                                
	                                <textarea id="ins_policy_no" checked="true"  class="form-control" name="agent_address" value="" >{{old('agent_address') ?? $data->agent_address}}</textarea> 
	                                @error('agent_address')
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

@endsection