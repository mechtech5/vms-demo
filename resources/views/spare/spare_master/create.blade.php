@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>ADD SPARE DETAILS </h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('sparemaster.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" method="post" action="{{route('sparemaster.store')}}"  enctype="multipart/form-data">
              {{csrf_field()}}
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                                            
                            <div class='row'>                         

	                             <div class="col-md-4 col-xl-4 mt-2">
                               		<label for="vehicle_model ">Select Comapny</label>
                                   <select id="state_id" name="comp_id" class="selectpicker form-control">
                                        <option value="0">Select..</option>
                                        @foreach($comapny as $Comapny)
                                        	<option value="{{$Comapny->id}}">{{$Comapny->comp_name}}</option>
                                        @endforeach		
                                    </select>   
                                    @error('comp_id')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please select company' }}</strong>
		                            </span>
		                        	@enderror                                 
                             	</div>
	                             <div class="col-md-4 col-xl-4 mt-2">
                               		<label for="vehicle_model ">Select Type</label>
                                   <select id="state_id" name="type_id" class="selectpicker form-control">
                                        <option value="0">Select..</option>
                                        @foreach($type as $Type)
                                        	<option value="{{$Type->id}}">{{$Type->type_name}}</option>
                                        @endforeach		
                                    </select>    
                                     @error('type_id')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ "Plesae select spare type" }}</strong>
		                            </span>
		                        	@enderror                                  
                             	</div>
                             <div class="col-md-4 col-xl-4 mt-2">
                               <label for="vehicle_model ">Select Unit</label>
                                   <select id="state_id" name="unit_id" class="selectpicker form-control">
                                        <option value="0">Select..</option>
                                        @foreach($unit as $Unit)
                                        	<option value="{{$Unit->id}}">{{$Unit->unit_name}}</option>
                                        @endforeach		
                                    </select>     
                                    @error('unit_id')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please select spare unit' }}</strong>
		                            </span>
		                        	@enderror                                
                             </div>
                            </div> 
                        <div class="row">     
                            <div class="col-md-4 col-xl-4 mt-2">
                                 <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">Spare Name</label>
                                <input id="email" name="name" class="form-control  " value="{{old('phone')}}">
                                @error('name')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please select spare name' }}</strong>
		                            </span>
		                         @enderror
                                
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Opening Stk</label>
                                
                                <input id="email1" class="form-control  " name="stk_open" value="{{old('stk_open')}}">
                                @error('stk_open')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please enter spare stock open' }}</strong>
		                            </span>
		                         @enderror
                               
                            </div>
                        
                             <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="KM Reading">Current Stk </label>
                                  <input id="email1" class="form-control" name="stk_curr" value="{{old('stk_curr')}}">
                                  @error('stk_curr')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Pease enter spare current stock' }}</strong>
		                            </span>
		                         @enderror
                               
                            </div>
                            </div> 
                        <div class="row">

                            <div class="col-md-4 col-xl-4 mt-2">
                                <label for="Manufacturer Year"> Buffer Stock </label>
                                <input id="email" class="form-control" name="stk_buffer" value="{{old('stk_buffer')}}">
                                @error('stk_buffer')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{'Please enter buffer stock'}}</strong>
		                            </span>
		                         @enderror

                            </div>
                            <div class="col-md-4 col-xl-4 mt-2">
                                <label for="Regi. Date"> Rate</label>
                                <input id="email1"  class="form-control " name="rate" value="{{old('rate')}}">
                                @error('rate')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror

                            </div>  
                                                   

                            <div class="col-md-4 col-xl-4 mt-2">
                                <label for=" D. Tank Capacity">GST %</label>
                                <input id="email" name="gst" type="text" class="form-control  " value="{{old('gst')}}">
                                @error('gst')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror

                            </div>
                        </div>
                        <div class="row" >     

                            <div class="col-md-4 col-xl-4 mt-2">
                                <label for="IMEI Number">Value Of Stock</label><br>
                                <input class="form-control"  type="" id="email1"  name="stk_value" value="{{old('stk_value')}}">
                                @error('stk_value')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please enter stock value' }}</strong>
		                            </span>
		                         @enderror
                            </div>
                             <div class="col-md-4 col-xl-4 mt-2">
                                <label for="IMEI Number">Part No</label><br>
                                <input class="form-control"  type="" id="email1"  name="part_no" value="{{old('part_no')}}">
                                @error('part_no')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                            </div>
                             <div class="col-md-4 col-xl-4 mt-2">
                                <label for="IMEI Number">Sales Price</label><br>
                                <input class="form-control" type="" id="email1"  name="sales_prc" value="{{old('sales_prc')}}">
                                @error('sales_prc')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please enter sales price' }}</strong>
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


</script>
@endsection