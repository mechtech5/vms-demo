@extends('state.main') 
@section('content')
<style type="text/css">
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  float:right;
}
input.danger:checked + .slider {
  background-color: #f44336;
}
</style>
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>SPARE MATERIAL REQUEST </h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('material_request.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" id="create_form" method="post" action="{{route('material_request.store')}}"  enctype="multipart/form-data">
              {{csrf_field()}}             
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">               
                            <div class='row'>        
                            	<div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">MTR No</label>
	                                <input id="email" name="mtr_no" class="form-control  " value="{{old('mtr_no')}}">
	                                @error('mtr_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror	                                
	                            </div>
	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">MTR Date</label>
	                                <input id="email" name="mtr_date" class="form-control datepicker" readonly="true" value="{{old('mtr_date') }}">
	                                @error('mtr_date')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ 'Please select mtr date' }}</strong>
			                            </span>
			                         @enderror	                                
	                            </div>
                                <div class="col-md-4 col-xl-4 mt-2">
                                    <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">Supplier Name</label>
                                    <select id="" name="unit_id" class="selectpicker form-control">
							            <option value="0">Select..</option>
							             @foreach($supplier as $Supplier)
							              	<option value="{{$Supplier->id}}">{{$Supplier->name}}</option>
							               @endforeach		
							        </select>
                                  @error('prep_by')
                                  <span class="invalid-feedback d-block" role="alert">
                                     <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
                                  </span>
                               @enderror                                  
                              </div>
                            </div>
                            <div class="row">
                            	<div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">MTR No</label>
	                               <input type="checkbox" class="default">
          							<span class="slider round"></span>
	                                @error('mtr_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror	                                
	                            </div>
	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">Supplier Name</label>
                                    <select id="" name="unit_id" class="selectpicker form-control">
							            <option value="0">Select..</option>
							             @foreach($supplier as $Supplier)
							              	<option value="{{$Supplier->id}}">{{$Supplier->name}}</option>
							               @endforeach		
							        </select>
	                                  @error('prep_by')
	                                  <span class="invalid-feedback d-block" role="alert">
	                                     <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
	                                  </span>
	                               @enderror                               
	                           	</div>
                           	</div>
                            <div class="row">
	                            <div class="col-md-12 text-center"  style="margin-top: 24px;">
                             		<input  id="btnShowPopup" value="Add Item"  style="margin-right: -8px;" type="submit" value="button" class="btn btn-primary active ">
                       			</div>
                   		    </div>      	
                       		<div class="row">
	                       		<div class="col-sm-2">
	                       			
	                       		</div>
                          		<div class="col-sm-8">
                                    <div class="text-center">
                                		<span class="qty_error" style="color: #FF0000;font-size:15px;"></span>
                              		</div>  
                                	<div class="box box-color orange box-condensed box-bordered">
                                    <div class="box-title">
                                        <h3>SPARES</h3>
                                    </div>
                                    <div class="box-content nopadding" style="height: 305px;overflow: scroll;" align="center">
                                      <div id="ContentPlaceHolder1_Panel5" style="background-color:Transparent;height:auto;width:90%;padding-top: 22px;">
                                         	<div id="ContentPlaceHolder1_UpdatePanel86">                      
        					                    <div class="row sup_table" style="padding-top: 21px;">
        					                       <table id="myTable" >
        										        <thead>
        										            <tr>
        												        <th style="width: 20px;">#</th>
        												        <th style="width: 200px;">NAME</th>
        												        <th style="width: 200px;">SPARE COMPANY</th>
        												        <th style="width: 200px;">SPARE TYPE</th>
        												        <th style="width: 200px;">SPARE UNIT</th>
        												        <th style="width: 200px;">ORDERED QTY.</th>
        												        <th style="width: 200px;">REMARKS</th>
        												    </tr>
        										        </thead>
        										        <tbody>
          										            <?php $count = 0; ?>
          										            <?php $ids   = session('ids') ? session('ids'):array(); ?>
                                            				@foreach($ids as $id)
                                            					<?php  $id = $id[$count]; ?>
                                            					<?php $data1  = session('data') ? session('data')[$id] :array();?>

          										             	@foreach($data1 as $data) 
          										              		@php ($type = App\Models\SpareType::find($data['type_id']))
          												          	@php ($unit = App\Models\SpareUnit::find($data['unit_id']))
          												          	@php ($comp = App\Models\SpareCompany::find($data['comp_id']))
          										                 
          										              		<tr>
            										              		<td style=" width:5% padding-left: 20px;">
                                               									 <a style="cursor: pointer;color: #ff0000" data="{{$id}}" id="trash"><i style="margin-right: 5px; " class="fas fa-trash" aria-hidden="true"></i></a>
                                              							</td>
                                                  						<input type='hidden' value="{{$data['id']}}" name = "id[]" >
            										                  	<td style=" width:25%; padding-left: 20px">{{$data['name']}}</td>
            												          	<td style=" width:25%; padding-left: 20px">{{$comp->comp_name}}</td>
            												         	<td style=" width:25%; padding-left: 20px">{{$type->type_name}}</td>
            												          	<td style=" width:25%; padding-left: 20px">{{$unit->unit_name}}</td>
            												          	<td style=" width:25%; padding-left: 20px"><input class="form-control qty" type="number" name="qty[]" ></td>
            												          	<td style=" width:25%; padding-left: 20px"><input class="form-control" type="text" name="remark[]"></td>
          										                 
          										             		</tr>
          										             	@endforeach
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
                    <div class="row">
                      	<div class="col-md-2 col-xl-2 mt-2">
                        	 <label class="pull-right" for="Chasis No">Total Qty</label>
                      	</div>   
                      	<div class="col-md-2 col-xl-2 mt-2">
                        	<input readonly="true" id="email" name='' class="form-control  total" value="">
                             @error('remarks')
	                        <span class="invalid-feedback d-block" role="alert">
	                            <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
	                        </span>
                       		@enderror                          
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12 col-xl-12 mt-2">
                        <label for="Chasis No">Remarks</label>
     
                        <textarea id="email" name="remarks" class="form-control  " value="">{{old('remarks') }}</textarea>
                       	@error('remarks')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
                        </span>
                        @enderror                          
                    	</div>                      
                    </div>
        			<div class="row">       
                       	<div class="col-md-12 text-center"  style="margin-top: 24px;">
                       		<input  style="margin-right: -8px;" type="submit" id="submit1" value="Submit" class="btn btn-primary active ">
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

<div id="MyPopup" class="modal fade" style="padding-top: 164px;" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
            	
               	<button type="button" class="close" data-dismiss="modal">
                    &times;</button>
   		    </div>
            <div class="modal-body">
            	
            	
            </div>
            <div class="modal-footer">
            	 <button type="button" class="btn btn-danger" id="submit">
                    Submit</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">
                    Close</button>               
            </div>
        </div>
    </div>
  </div>
<script type="text/javascript">

	 $(document).ready( function () {

    $(function() {
        $( ".datepicker" ).datepicker({format: 'yyyy-mm-dd' });
    
      });
 
    $('#myTable').DataTable();
    $('#file').change(function() {
       //$('#target').submit();
      });

    $('#myTable1').DataTable({
    	"searching": false,
    	"bPaginate": false,
    });
 
  $("#btnShowPopup").click(function (event) {
  	 event.preventDefault()
     var title = "Greetings";
     var body = "Welcome to ASPSnippets.com";

      $.ajax({
          url: '{{route('purchase.model')}}',
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},          
          success: function (data) {
            $("#MyPopup .modal-body").html(data);
            $("#MyPopup").modal("show");
          }
      });
 });


$('#submit').click(function(){
    	var id = [];   
	   $(':checkbox:checked').each(function(i){
	    	id[i] = $(this).val();
	   	});
    $.ajax({
          url: '{{route('material.save_in_session')}}',
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {'id':id},
          success: function(data) {
           	$("#MyPopup").modal("show");
             location.reload();
          }
      });

	});
  
});

$(document).on("change", ".qty", function() {
    var sum = 0;
    $("input[class *= 'qty']").each(function(){
        sum += +$(this).val();
    });
    $(".total").val(sum);
});

$(document).on("click", "#trash", function() {
    var id = $(this).attr('data');
    $.ajax({
          url: '{{route('material.remove_session')}}',
          type: 'POST',
          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
          data: {'id':id},
          success: function(data) {
           location.reload();
          }
      });
});

$(document).on('click','#submit1',function(event) {
  event.preventDefault();
   var hasNoValue;
    $('.qty').each(function(i) {
        if ($(this).val() == '') {
              hasNoValue = true;
        }
    });
    if (hasNoValue) {
        $('.qty_error').text('Please Enter Quantity For Every Spare ')
    }
    if(!hasNoValue){
     $('#create_form').submit();
    }
})

</script>
@endsection