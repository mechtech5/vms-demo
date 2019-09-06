@extends('state.main') 
@section('content')
<div class="container">
  <div id="ContentPlaceHolder1_PnlShow"  style="display: inline;">
    <div class="row">
      <div class="col-sm-12">
        <div class="box box-color orange box-condensed box-bordered">
          <div class="box-title">
            <div class="col-sm-6 col-md-6">
                <h3>CHANGE PASSWORD</h3>

            </div>
            <div class="col-sm-6 col-md-6">
                <a class="btn btn-inverse pull-right" href="{{route('dashboard.index')}}">Back</a>
            </div>
            <div id="add-city-form">
             <form enctype="multipart/form-data" class="well form-horizontal" method="post" action="{{route('dashboard.update',Auth::user()->id)}}">
              {{csrf_field()}}
              @method('PATCH')
                 <div class="card-body " >
                    <div class="row">

                        <div class="col-sm-12 col-md-12 col-xl-12" id="mytable1">
                            <div class="row">
                                <div class="col-md-4 col-xl-4 mt-2">
                                </div>
                                <?php if(Session::get('error')){ ?>
                                    <div class="col-md-4 col-xl-4 mt-2 alert alert-info" role="alert">
                                       <?php echo Session::get('error'); ?>
                                    </div>   
                              <?php  } ?>
                                
                            </div>
                        	<div class="row">                                
				                <div class="col-md-4 col-xl-4 mt-2 ">
	                                <label class="pull-right" for="Vehicle No."><span style="color: #FF0000;font-size:15px;">*</span>Old Password</label>
                                </div>
                            
                                <div class="col-md-4 col-xl-4 mt-2">	                                
	                                <input id="ins_policy_no" class="form-control" name="old_password" value="{{old('old_password')}}" > 
	                                @error('old_password')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror
	                            </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 col-xl-4 mt-2">
	                                <label class="pull-right" for="Vehicle No."><span style="color: #FF0000;font-size:15px;">*</span>New Password</label>
                                </div>
                            
                                <div class="col-md-4 col-xl-4 mt-2">	                                
	                                <input id="ins_policy_no" class="form-control" name="new_password" value="{{old('new_password')}}" > 
	                                @error('new_password')
			                            <span class="invalid-feedback d-block pull-right" role="alert">
			                               <strong>{{ $message }}</strong>
			                            </span>
			                         @enderror
	                            </div>
                            </div>    
				                
				            </div>
                           
                             <div class="col-md-12 text-center" style="margin-top: 24px;">
                             	<input  style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active ">
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