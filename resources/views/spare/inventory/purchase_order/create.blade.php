@extends('state.main') 
@section('content')
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
                <a class="btn btn-inverse pull-right" href="{{route('purchase_order.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form class="well form-horizontal" id="create_form" method="post" action="{{route('purchase_order.store')}}"  enctype="multipart/form-data">
              {{csrf_field()}}             
                 <div class="card-body " >
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">               
                            <div class='row'>        
                            	<div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">PO No</label>
	                                <input id="email" name="mtr_no" class="form-control  " value="{{old('mtr_no')}}">
	                                @error('mtr_no')
			                            <span class="invalid-feedback d-block" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror	                                
	                            </div>
	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">PO Date</label>
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
	                              <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">WITH MTR</label>
	                              <div class="roundedOne">
										                <input value="1" type="checkbox" value="None" id="is_mtr" name="check" >
										                <label for="roundedOne"></label>
									              </div>
	                              @error('mtr_no')
			                          <span class="invalid-feedback d-block" role="alert">
			                             <strong>{{ $message }}</strong>
			                          </span>
			                         @enderror	                                
	                            </div>
	                            <div class="col-md-4 col-xl-4 mt-2">
	                                <span style="color: #FF0000;font-size:15px;">*</span><label for="Chasis No">MTR NO</label>
                                  <select id="mtr_no" name="unit_id" disabled="true" class="selectpicker form-control">
							                       <option value="0">Select..</option>
							                    </select>
	                                @error('prep_by')
	                                <span class="invalid-feedback d-block" role="alert">
	                                  <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
	                                </span>
	                               @enderror                               
	                           	</div>
                           	</div>
                            <div class="row">
	                            <div class="col-md-12 text-center add_btn"  style="margin-top: 24px;">
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
                                                <th style="width: 200px;">RATE</th>
                                                <th style="width: 200px;">AMT</th>
                                                <th style="width: 200px;">DISC%</th>
                                                <th style="width: 200px;">DISC AMT</th>
                                                <th style="width: 200px;">IGST%</th>
                                                <th style="width: 200px;">IGST AMT</th>
                                                <th style="width: 200px;">CGST%</th>
                                                <th style="width: 200px;">CGST AMT</th>
                                                <th style="width: 200px;">SGST%</th>
                                                <th style="width: 200px;">SGST AMT</th>
                                                <th style="width: 200px;">NET AMT</th>
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
          										                 
            										              		  <tr data-id ="tr_{{$data['id']}}">
              										              		  <td style=" width:5% padding-left: 20px;">
                                                 				<a style="cursor: pointer;color: #ff0000" data="{{$id}}" id="trash"><i style="margin-right: 5px; " class="fas fa-trash" aria-hidden="true"></i></a>
                                                			</td>
                                                    	<input type='hidden' value="{{$data['id']}}" name = "id[]" >
              										                  	<td style=" width:25%; ">{{$data['name']}}</td>
              												          	    <td style=" width:25%; ">{{$comp->comp_name}}</td>
              												         	      <td style=" width:25%;">{{$type->type_name}}</td>
              												          	   <td style=" width:25%; ">{{$unit->unit_name}}</td>
              												          	   <td style=" width:25%; "><input class="form-control qty" type="number" id="qty_{{$data['id']}}" data-id = '{{$data['id']}}' name="qty[]" ></td>
                                                     <td style=" width:25%; "><input class="form-control rate" type="text" value="" id="rate_{{$data['id']}}" data-id = '{{$data['id']}}' name="rate[]"></td>
                                                      <td style=" width:25%; "><input readonly="true" class="form-control" type="text" id="amt_{{$data['id']}}" value="" name="amt[]"></td>
                                                      <td style=" width:25%; "><input class="form-control disc_pct" type="text" value="" data-id = '{{$data['id']}}' id="disc_pct_{{$data['id']}}" name="disc_pct[]"></td>
                                                      <td style=" width:25%; "><input class="form-control" type="text" value="" name="disc_amt[]" readonly="true" id="disc_amt_{{$data['id']}}"></td>
                                                      <td style=" width:25%; "><input class="form-control igst_pct" type="text" value="" id="igst_pct_{{$data['id']}}" data-id = '{{$data['id']}}'  name="igst_pct[]"></td>
                                                      <td style=" width:25%; "><input readonly="true" class="form-control" type="text" value="" name="igst_amt[]"></td>
                                                      <td style=" width:25%; "><input class="form-control" type="text" value="" name="cgst_pct[]"></td>
                                                      <td style=" width:25%; "><input class="form-control" type="text" value="" name="cgst_amt[]"></td>
                                                      <td style=" width:25%;"><input class="form-control" type="text" value="" name="sgst_pct[]"></td>
                                                      <td style=" width:25%;"><input class="form-control" type="text" value="" name="sgst_amt[]"></td>
                                                      <td style=" width:25%;"><input class="form-control" type="text" value="" name="net_amt[]"></td>
              												          	   <td style=" width:25%;"><input class="form-control" type="text" name="remark[]"></td>
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
                            	<div class="col-md-4 col-xl-4 mt-2">
                              	 <label class="" for="Chasis No">Total Qty</label>
                              	<input readonly="true" id="email" name='total_qty' class="form-control total" value="">
                                   @error('remarks')
      	                        <span class="invalid-feedback d-block" role="alert">
      	                            <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
      	                        </span>
                             		@enderror                          
                              </div>
                             <div class="col-md-4 col-xl-4 mt-2">
                              	 <label class="" for="Chasis No">Grand Total</label>
                              	<input  name='grand_total' class="form-control" value="">
                                   @error('remarks')
      	                        <span class="invalid-feedback d-block" role="alert">
      	                            <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
      	                        </span>
                             		@enderror                          
                              </div> 
                              <div class="col-md-4 col-xl-4 mt-2">
                              	 <label class="" for="Chasis No">Disc. Amount</label>
                              	<input  id="email" name='disc_amt' class="form-control  total" value="">
                                   @error('remarks')
      	                        <span class="invalid-feedback d-block" role="alert">
      	                            <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
      	                        </span>
                             		@enderror                          
                              </div> 
                          </div>
                          <div class="row">
                              	<div class="col-md-4 col-xl-4 mt-2">
                                	 <label class="" for="Chasis No">IGST Amount</label>
                                	<input  id="email" name='igst_amt' class="form-control  total" value="">
                                     @error('remarks')
        	                        <span class="invalid-feedback d-block" role="alert">
        	                            <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
        	                        </span>
                               		@enderror                          
                                </div>
                               <div class="col-md-4 col-xl-4 mt-2">
                                	 <label class="" for="Chasis No">CGST Amount</label>
                                	<input  id="email" name='cgst_amt' class="form-control  total" value="">
                                     @error('remarks')
        	                        <span class="invalid-feedback d-block" role="alert">
        	                            <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
        	                        </span>
                               		@enderror                          
                                </div> 
                                <div class="col-md-4 col-xl-4 mt-2">
                                	 <label class="" for="Chasis No">SGST Amount</label>
                                	<input id="email" name='sgst_amt' class="form-control  total" value="">
                                     @error('remarks')
        	                        <span class="invalid-feedback d-block" role="alert">
        	                            <strong>{{ 'Please enter prepared by name in alphabets' }}</strong>
        	                        </span>
                               		@enderror                          
                                </div> 
                            </div>
                          <div class="row">
                          	<div class="col-md-4 col-xl-4 mt-2">
                              	 <label class="" for="Chasis No">Net Amount</label>
                              	<input id="email" name='net_amt' class="form-control  total" value="">
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
           
                              <textarea id="email" name="remark" class="form-control  " value="">{{old('remarks') }}</textarea>
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
	   $('.chk:checked').each(function(i){
	    	id[i] = $(this).val();
	   	});
     alert(id)
    $.ajax({
          url: '{{route('purchase.purchase_order_session')}}',
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
          url: '{{route('purchase.purchase_order_remove')}}',
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

$(document).on('change','#is_mtr',function(){
	var id = $('#is_mtr:checked').val();
	if(id == 1){
		$.ajax({
	          url: '{{route('purchase.mtr_no')}}',
	          type: 'POST',
	          headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	          data: {'id':id},
	          success: function(data) {	       
	            $('#btnShowPopup').prop('disabled', true);
	            $('#mtr_no').prop('disabled', false);
	            $('#mtr_no').html(data);
	          }
	      });
	}
	else{
		$('#btnShowPopup').prop('disabled',false);
		$('#mtr_no').prop('disabled', true);
	}
})

$(document).on('change','#mtr_no',function(event){
	event.preventDefault()
 	var id = $('#mtr_no').val();
 	alert(id)
 	$.ajax({
	      url: '{{route('purchase.get_mtr_list')}}',
	      type: 'POST',
	      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	      data: {'id':id},
	      success: function(data) {
	      	$('.sup_table').html(data);      
	      }
	  });
})

function gteGst(price, percentage) {
    var calcPrice =  (price/100) * percentage ;
    var discountPrice = calcPrice.toFixed(2); 
    return discountPrice
}

$(document).on('keyup','.qty , .rate , .disc_pct,.igst_pct',function(){
  var pre_id     = $(this).attr('data-id');
  var qty        = $('#qty_'+pre_id).val();
  var rate       = $('#rate_'+pre_id).val();
  var percentage = $('#disc_pct_'+pre_id).val();
  var igst_pct   = $('#igst_pct_'+pre_id).val();
  var multi  = qty*rate;
  var disc_pct   = gteGst(rate,percentage);  
  if(multi !==''){
    $('#amt_'+ pre_id).val(multi);
    $('#disc_amt_'+ pre_id).val(disc_pct);
  }
 
})

</script>
@endsection