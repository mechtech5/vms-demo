@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>UPDATE SPARE DETAILS </h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('sparemaster.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" method="post" action="{{route('sparemaster.update',$data->id)}}"  enctype="multipart/form-data">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                                                            
                            <div class='row'>                         

	                             <div class="col-md-4 col-xl-4 mt-2">
                               		<label for="vehicle_model ">Select Comapny</label>
                                   <select id="state_id" name="comp_id" class="selectpicker form-control">
                                        <option value="0">Select..</option>
                                        @foreach($comapny as $Comapny)
                                        	<option {{$data->comp_id == $Comapny->id ? 'selected':''}} value="{{$Comapny->id}}">{{$Comapny->comp_name}}</option>
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
                                        	<option {{$data->type_id == $Type->id ? 'selected':''}} value="{{$Type->id}}">{{$Type->type_name}}</option>
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
                                        	<option {{$Unit->id == $data->unit_id ? 'selected':''}} value="{{$Unit->id}}">{{$Unit->unit_name}}</option>
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
                                <input id="email" name="name" class="form-control  " value="{{old('name') ?? $data->name}}">
                                @error('name')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please select spare name' }}</strong>
		                            </span>
		                         @enderror
                                
                            </div>

                            <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Engine No">Opening Stk</label>
                                
                                <input id="email1" class="form-control  " name="stk_open" value="{{old('stk_open') ?? $data->stk_open}}">
                                @error('stk_open')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please enter spare stock open' }}</strong>
		                            </span>
		                         @enderror
                               
                            </div>
                        
                             <div class="col-md-4 col-xl-4 mt-2">
                                <span style="color: #FF0000;font-size:15px;">*</span><label for="KM Reading">Current Stk </label>
                                  <input id="email1" class="form-control" name="stk_curr" value="{{old('stk_curr') ?? $data->stk_curr}}">
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
                                <input id="email" class="form-control" name="stk_buffer" value="{{old('stk_buffer') ?? $data->stk_buffer}}">
                                @error('stk_buffer')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{'Please enter buffer stock'}}</strong>
		                            </span>
		                         @enderror

                            </div>
                            <div class="col-md-4 col-xl-4 mt-2">
                                <label for="Regi. Date"> Rate</label>
                                <input id="email1"  class="form-control " name="rate" value="{{old('rate') ?? $data->rate}}">
                                @error('rate')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror

                            </div>  
                                                   

                            <div class="col-md-4 col-xl-4 mt-2">
                                <label for=" D. Tank Capacity">GST %</label>
                                <input id="email" name="gst" type="text" class="form-control  " value="{{old('gst') ?? $data->gst}}">
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
                                <input class="form-control"  type="" id="email1"  name="stk_value" value="{{old('stk_value') ?? $data->stk_value}}">
                                @error('stk_value')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please enter stock value' }}</strong>
		                            </span>
		                         @enderror
                            </div>
                             <div class="col-md-4 col-xl-4 mt-2">
                                <label for="IMEI Number">Part No</label><br>
                                <input class="form-control"  type="" id="email1"  name="part_no" value="{{old('part_no') ?? $data->part_no}}">
                                @error('part_no')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror
                            </div>
                             <div class="col-md-4 col-xl-4 mt-2">
                                <label for="IMEI Number">Sales Price</label><br>
                                <input class="form-control" type="" id="email1"  name="sales_prc" value="{{old('sales_prc') ?? $data->sales_prc}}">
                                @error('sales_prc')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please enter sales price' }}</strong>
		                            </span>
		                         @enderror
                            </div>

                        </div>
                      <div class="row">       
                         <div class="col-md-12 text-center"  style="margin-top: 24px;">
                         	<input  style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active ">
                       	</div>
                    </div>      	
                       	<div class="row">
                       		<div class="col-sm-2">
                       			
                       		</div>
                            <div class="col-sm-8">
                                <div class="box box-color orange box-condensed box-bordered">
                                    <div class="box-title">
                                        <h3>SUPPLIER INFORMATION FOR ABOVE SPARE</h3>
                                    </div>
                                         <div class="box-content nopadding" style="height: 305px;overflow: scroll;" align="center">
                                         	<div id="ContentPlaceHolder1_Panel5" style="background-color:Transparent;height:auto;width:90%;padding-top: 22px;">
                                            	<div id="ContentPlaceHolder1_UpdatePanel86">
                                            	   <div class='row'>

	                                            	   <div class="col-md-4 col-xl-4 mt-2">
						                               		<label for="vehicle_model ">Select Vendor</label>
						                                   <select id="vendor_id" name="type_id" class="selectpicker form-control">
						                                        <option value="0">Select..</option>
						                                        @foreach($vendor as $Vendor)
						                                        	<option value="{{$Vendor->id}}">{{$Vendor->name}}</option>
						                                        @endforeach		
						                                    </select>    
						                                     @error('type_id')
								                            <span class="invalid-feedback d-block" role="alert">
								                               <strong>{{ "Plesae select spare type" }}</strong>
								                            </span>
								                        	@enderror                                  
						                             	</div>                         

							                             <div class="col-md-4 col-xl-4 mt-2">
						                               		<label for="vehicle_model ">Select Comapny</label>
						                                   <select id="comp_id" name="comp_id" class="selectpicker form-control">
						                                        <option value="0">Select..</option>
						                                        @foreach($comapny as $Comapny)
						                                        	<option {{$data->comp_id == $Comapny->id ? 'selected':''}} value="{{$Comapny->id}}">{{$Comapny->comp_name}}</option>
						                                        @endforeach		
						                                    </select>   
						                                    @error('comp_id')
								                            <span class="invalid-feedback d-block" role="alert">
								                               <strong>{{ 'Please select company' }}</strong>
								                            </span>
								                        	@enderror                                 
						                             	</div>
							                             
						                             <div class="col-md-4 col-xl-4 mt-2">
						                                <label for="IMEI Number">Rate</label><br>
						                                <input  pattern="[0-9]*" class="form-control" type="" id="rate"   name="rate" value="{{old('sales_prc')}}">
						                                @error('sales_prc')
								                            <span class="invalid-feedback d-block" role="alert">
								                               <strong>{{ 'Please enter sales price' }}</strong>
								                            </span>
								                         @enderror
								                         <span class="error" style="color: red; display: none">* Input digits (0 - 9) and not empty</span>
						                            </div>
					                            </div> 
					                             <div class="row">    
					                             	<input type="hidden" value="{{$data->id}}" id="eid" name="">
							                         <div class="col-md-12" style="margin-top: 24px;">
							                         	<button id="submitven" disabled="disabled" style="margin-right: -8px;" value="Submit" class="btn btn-primary active text-center">Submit</button>
							                       	</div>
							                    </div>   
					                            <div class="row sup_table" style="padding-top: 21px;">
					                            	 <table id="myTable" >
										              <thead>
										                <tr >
										                  <th style="width: 10px;">SR NO.</th>
										                  <th style="width: 200px;">VENDOR NAME</th>
										                  <th style="width: 200px;">SPARE COMPANY</th>
										                  <th style="width: 200px;">SPARE PRICE</th>        
										                </tr>
										              </thead>
										              
										              <?php $count = 0; ?>
										              @foreach($suppliers as $Suppliers) 
										              @php ($vdr = App\Models\SpareVendor::find($Suppliers->vendor_id))
										              @php ($comp = App\Models\SpareCompany::find($Suppliers->spare_comp_id))
										                 
										                <tr>
										                  <td style=" width:5%; padding-left: 20px;">{{++$count}}</td>
										                  <td style=" width:5%; padding-left: 20px">{{$vdr->name}}</td>
										                  <td style=" width:5%; padding-left: 20px">{{$comp->comp_name}}</td>
										                  <td style=" width:5%; padding-left: 20px">{{$Suppliers->rate}}</td>
										                 
										                </tr>
										                @endforeach
										      
										              </tbody>
										            </table>
					                            </div>
											</div>
										</div>
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
  </div>
</div>    

<script type="text/javascript">
	 $(document).ready( function () {
 	
 	   $("#rate").bind("keypress", function (e) {
 	   	var rate =$('#rate').val();
 	   	alert(rate)
        var keyCode = e.which ? e.which : e.keyCode
	      if (!(keyCode >= 48 && keyCode <= 57) ) {
            $(".error").css("display", "inline");
            $('#submitven').css('disabled','false');
            return false;
          }else{
            $(".error").css("display", "none");
          }
        
      });

    $('#myTable').DataTable();
    $('#file').change(function() {
       $('#target').submit();
      });

    $('#submitven').on('click',function(){
    var vendor_id = $('#vendor_id').val();
    var comp_id   = $('#comp_id').val();
    var rate      = $('#rate').val();
    var eid       = $('#eid').val();
  
    $.ajax({
          url: '{{route('sparemaster.suppliers')}}',
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {'vendor_id':vendor_id,comp_id:comp_id,rate:rate,spare_id:eid},
          success: function (data) {
        
              $('.sup_table').html(data);
          }
      });
  })

} );
 </script>
@endsection