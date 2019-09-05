@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>UPDATE SPARE SUPPLIER DETAILS </h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('sparevendor.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" method="post" action="{{route('sparevendor.update',$data->id)}}"  enctype="multipart/form-data">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                                            
                            
	                        <div class="row">     
	                            <div class="col-md-4 col-xl-4 mt-2">
	                                 <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">Supplier Name</label>
	                                <input id="email" name="name" class="form-control  " value="{{old('name') ?? $data->name}}">
	                                @error('name')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please select name' }}</strong>
			                            </span>
			                         @enderror
	                                
	                            </div>

	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <label for="Engine No">Contact Person</label>
	                                
	                                <input id="email1" class="form-control  " name="contact_person_name" value="{{old('contact_person_name') ?? $data->contact_person_name}}">
	                                @error('contact_person_name')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please enter contact person name' }}</strong>
			                            </span>
			                         @enderror
	                               
	                            </div>
	                        
	                             <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="KM Reading">Phone No </label>
	                                  <input id="email1" class="form-control" name="phone" value="{{old('phone') ??$data->phone}}">
	                                  @error('phone')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message  }}</strong>
			                            </span>
			                         @enderror
	                               
	                            </div>
                            </div> 
                             <div class="row">     
                              <div class="col-md-4 col-xl-4 mt-2">
                                   <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">GST No</label>
                                  <input id="email" name="gst" class="form-control  " value="{{old('gst') ?? $data->gst}}">
                                  @error('gst')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ 'Please enter gst no.' }}</strong>
                                  </span>
                               @enderror
                                  
                              </div>

                              <div class="col-md-4 col-xl-4 mt-2">
                                  <label for="Engine No">Mobile No </label>
                                  
                                  <input id="email1" class="form-control" name="mobile" value="{{old('mobile') ?? $data->mobile}}">
                                  @error('mobile')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message }}</strong>
                                  </span>
                               @enderror
                                 
                              </div>
                          
                               <div class="col-md-4 col-xl-4 mt-2">
                                  <label for="KM Reading">Email ID </label>
                                    <input id="email1" class="form-control" type="email" name="email" value="{{old('email') ?? $data->email}}">
                                    @error('email')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message  }}</strong>
                                  </span>
                               @enderror
                                 
                              </div>
                            </div> 

                            <div class='row'>   
                               <div class="col-md-3 col-xl-3 mt-2">
                                 <label for="KM Reading">Person Phone </label>
                                    <input id="email1" class="form-control" name="contact_person_phone" value="{{old('contact_person_phone') ?? $data->contact_person_phone}}">
                                    @error('contact_person_phone')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message  }}</strong>
                                  </span>
                               @enderror
                                 
                              </div>  

                               <div class="col-md-3col-xl-3 mt-2">
                                 <label for="KM Reading">Website </label>
                                    <input id="email1" class="form-control" name="website" value="{{old('website') ?? $data->website}}">
                                    @error('website')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ $message  }}</strong>
                                  </span>
                               @enderror
                                 
                              </div>                      

	                             <div class="col-md-3 col-xl-3 mt-2">
                               		<span style="color: #FF0000;font-size:15px;">*</span><label for="vehicle_model ">Select State</label>
                                   <select id="state_id" name="state_id" class="selectpicker form-control">
                                        <option value="0">Select..</option>
                                        @foreach($state as $State)
                                        	<option {{ $State->id == $data->state_id ? 'selected':''}} value="{{$State->id}}">{{$State->state_name}}</option>
                                        @endforeach		
                                    </select>   
                                    @error('comp_id')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{$message }}</strong>
		                            </span>
		                        	@enderror                                 
                             	</div>
	                             <div class="col-md-3 col-xl-3 mt-2">
                               		<span style="color: #FF0000;font-size:15px;">*</span><label for="vehicle_model ">Select Type</label>
                                   <select id="city_id" name="city_id" class="selectpicker form-control">
                                        <option value="0">Select..</option>
                                    </select>    
                                     @error('city_id')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please select city'  }}</strong>
		                            </span>
		                        	@enderror                                  
                             	</div>
                            </div> 
                            <div class="row">
                                 <div class="col-md-12 col-xl-12 mt-2">
                                      <label for="KM Reading">Address</label>
                                        <textarea id="email1" class="form-control" name="addr" {{old('addr') ?? $data->addr}}></textarea>
                                        @error('addr')
                                      <span class="invalid-feedback d-block" role="alert">
                                         <strong>{{ 'Pease enter address' }}</strong>
                                      </span>
                                   @enderror
                                     
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
$(document).ready(function(){
  $('#state_id').on('change',function(){
    var s_id = $(this).val();
    
    $.ajax({
          url: '{{route('sparevendor.get_city')}}',
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {'id':s_id},
          success: function (data) {
           
              $('#city_id').html(data);
          },
          error: function (data) {
              alert(data.responseText);
          }
      });
  })
})

</script>
@endsection