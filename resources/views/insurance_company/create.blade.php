@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>ADD INSURANCE COMPANY </h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('company.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('company.store')}}">
              {{csrf_field()}}
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                        	
			                <div class="row">    
			                	<div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Company Name</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="comp_name" value="{{old('comp_name')}}" > 
	                                @error('comp_name')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent name' }}</strong>
			                            </span>
			                         @enderror
	                            </div>	

			                    <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Company Mobile No.</label>
	                                
	                                <input id="ins_policy_no" class="form-control" name="comp_phone" value="{{old('comp_phone')}}" > 
	                                @error('comp_phone')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent mobile number' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>

		                        <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Company Email</label>
	                                
	                                <input id="ins_policy_no" type="email" class="form-control" name="comp_email" value="{{old('comp_email')}}" > 
	                                @error('comp_email')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ 'Please enter agent email' }}</strong>
			                            </span>
			                         @enderror
		                                 
		                        </div>                                             
				            </div>
		                    <div class="row">    
		                        <div class="col-md-12 col-xl-12 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Vehicle No.">Company Address</label>
	                                
	                                <textarea id="ins_policy_no" class="form-control" name="comp_addr" value="{{old('comp_addr')}}" ></textarea> 
	                                @error('comp_addr')
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