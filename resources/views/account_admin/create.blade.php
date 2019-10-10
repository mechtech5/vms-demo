@extends('layouts.ACLadmin')
@section('title','Welcom: To Admin Panel')
@section('content')
<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i>ACL</h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item"><a href="#">ACL</a></li>
    </ul>
   </div>
	  <div class="row">
		<div class="col-md-12 m-auto">
			<div class="card">
				<div class="card-header">
					<div class="row">
						 <form style="width: 100%;padding-top: 17px;" class="form-horizontal" method="post" action="{{route('account.store')}}">
		             	 {{csrf_field()}}
		                 <div class="form-group">
		                    <label class="col-md-4 control-label">User List</label>
		                    <div class="col-md-4 inputGroupContainer">
		                       <div class="input-group">
		                          <select name="acc_owner" class="selectpicker form-control">
		                             <option selected=" true" value="0">Select..</option>
		                             @foreach($user as $users)
		                                <option value="{{$users->id}}">{{$users->name}}</option>
		                             @endforeach     
		                          </select>
		                        </div>
		                         @error('acc_owner')
		                              <span class="invalid-feedback d-block" role="alert">
		                                  <strong>{{ $message }}</strong>
		                              </span>
		                          @enderror
		                    </div>
		                 </div>

		                   <div class="form-group">
		                    <label class="col-md-4 control-label">Account Code</label>
		                    <div class="col-md-4 inputGroupContainer">
		                       <div class="input-group">
		                          <input id="addressLine1" name="acc_code" class="form-control"  value="{{old('acc_code')}}" type="text">
		                          <?php if(Session::get('acc_code_error')){ ?>
		                          	<span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ Session::get('acc_code_error') }}</strong>
		                            </span>                         	 		
		                          	 		
		                      <?php    	}?>
		                          @error('acc_code')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror

		                        </div>
		                    </div>
		                  </div>

		                  <div class="form-group">
		                    <label class="col-md-4 control-label">Owner Contact</label>
		                    <div class="col-md-4 inputGroupContainer">
		                       <div class="input-group">
		                          <input id="addressLine1" name="contact" class="form-control"  value="{{old('contact')}}" type="text">                   
		                          @error('contact')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ 'Please enter contact number (in digits)' }}</strong>
		                            </span>
		                         @enderror

		                        </div>
		                    </div>
		                  </div>

		                  <div class="form-group">
		                    <label class="col-md-4 control-label">Remarks</label>
		                    <div class="col-md-4 inputGroupContainer">
		                       <div class="input-group">
		                          <textarea id="addressLine1" name="remarks" class="form-control"  value="" type="text">{{old('fleet_desc')}}</textarea>
		                          @error('fleet_desc')
		                            <span class="invalid-feedback d-block" role="alert">
		                               <strong>{{ $message }}</strong>
		                            </span>
		                         @enderror

		                        </div>
		                    </div>
		                  </div>
		                 
		                 <div class="form-group">
		                    <div class="col-md-5">
		                      <input style="margin-right: -8px;" type="submit" value="Submit" class="btn btn-primary active pull-right"></input>
		                    </div>
		                 </div>
		                </form>
					</div>
				</div>
			</div>
		</div>
	</div>
</main>			

@endsection